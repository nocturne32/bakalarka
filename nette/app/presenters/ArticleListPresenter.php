<?php

namespace App\Presenters;

use App\Forms\ArticleFormFactory;
use App\Model\ArticleFacade;
use Nette\Application\UI\Form;


class ArticleListPresenter extends BasePresenter
{
    /** @var ArticleFacade @inject */
    public $articleFacade;
    /** @var ArticleFormFactory @inject */
    public $articleFormFactory;

    public function renderDefault(): void
    {
        if ($this->isUserAdmin()) {
            $articles = $this->articleFacade->findAllArticles();
        } else {
            $articles = $this->articleFacade->findArticlesBy([
                'user.id' => $this->user->getId()
            ]);
        }
        $this->template->articles = $articles;
    }

    /**
     * @secured
     * @param int $id
     * @throws \Nette\Application\AbortException
     */
    public function handleDelete(int $id): void
    {
        $article = $this->articleFacade->getArticle($id);
        $this->flashMessage("Article \"{$article->title}\" has been deleted!", 'alert-danger');
        $article->delete();
        $this->redirect('ArticleList:default');
    }


    /**
     * @return Form
     */
    protected function createComponentDelete(): Form
    {
        return $this->articleFormFactory->delete(function ($form, $values) {
            $article = $this->articleFacade->getArticle($values->id);
            $this->flashMessage("Article \"{$article->title}\" has been deleted!", 'alert-danger');
            $article->delete();
            $this->redirect('ArticleList:default');
        });
    }
}
