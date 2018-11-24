<?php

namespace App\Presenters;

use App\Model\ArticleListFacade;


class ArticleListPresenter extends BasePresenter
{
    /** @var ArticleListFacade @inject */
    public $articleListFacade;

    public function renderDefault(): void
    {
        if ($this->isUserAdmin()) {
            $articles = $this->articleListFacade->findAllArticles();
        } else {
            $articles = $this->articleListFacade->findArticlesBy([
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
        $article = $this->articleListFacade->getArticle($id);
        $this->flashMessage("Article \"{$article->title}\" has been deleted!", 'alert-danger');
        $article->delete();
        $this->redirect('ArticleList:default');
    }
}
