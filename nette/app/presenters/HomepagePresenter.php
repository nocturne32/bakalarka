<?php

namespace App\Presenters;


use App\Model\ArticleListFacade;

class HomepagePresenter extends BasePresenter
{
    /** @var ArticleListFacade @inject */
    public $articleListFacade;

    public function renderDefault(): void
    {
        $articles = $this->articleListFacade->findAllArticles();
        $query = $this->getHttpRequest()->getQuery();
        if (isset($query['author'])) {
            $articles->where('user.id', $query['author']);
        }
        if (isset($query['category'])) {
            $articles->where('category.id', $query['category']);
        }

        $this->template->articles = $articles;
    }

}
