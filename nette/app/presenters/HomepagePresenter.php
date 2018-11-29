<?php

namespace App\Presenters;


use App\Model\ArticleFacade;

class HomepagePresenter extends BasePresenter
{
    /** @var ArticleFacade @inject */
    public $articleFacade;

    public function renderDefault(): void
    {
        $articles = $this->articleFacade->findAllArticles();
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
