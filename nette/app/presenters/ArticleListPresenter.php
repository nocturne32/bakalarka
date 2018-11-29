<?php

namespace App\Presenters;

use App\Model\ArticleFacade;
use App\Model\ArticleListFacade;


class ArticleListPresenter extends BasePresenter
{
    /** @var ArticleFacade @inject */
    public $articleFacade;

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
}
