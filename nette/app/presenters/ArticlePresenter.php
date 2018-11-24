<?php

namespace App\Presenters;

use App\Forms\ArticleFormFactory;
use App\Model\ArticleFacade;
use Nette\Application\UI\Form;


class ArticlePresenter extends BasePresenter
{
    /** @var ArticleFacade @inject */
    public $articleFacade;
    /** @var ArticleFormFactory @inject */
    public $articleFormFactory;

    public function renderDefault(int $id): void
    {
        $this->template->article = $this->articleFacade->getArticle($id);
    }

    public function renderAdd(): void
    {

    }

    public function renderEdit(int $id): void
    {
        $article = $this->articleFacade->getArticle($id);
        if (!$article) {
            $this->flashMessage('Article does not exist.', 'alert-warning');
            $this->redirect('ArticleList:default');
        }
        if (!$this->isUserAdmin() && $article->user->id !== $this->user->getId()) {
            $this->noPermissionRedirect();
        }
        $this['editForm']->setDefaults($article);
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

    /**
     * @return Form
     * @throws \Exception
     */
    protected function createComponentAddForm(): Form
    {
        return $this->articleFormFactory->create(function ($form, $values) {
            $values->created_at = new \DateTimeImmutable('now');
            $values->user_id = $this->user->getId();
            $this->articleFacade->insertArticle($values);
            $this->flashMessage("Article \"{$values->title}\" has been created!", 'alert-success');
            $this->redirect('ArticleList:default');
        });
    }
    /**
     * @return Form
     * @throws \Exception
     */
    protected function createComponentEditForm(): Form
    {
        return $this->articleFormFactory->create(function ($form, $values) {
            $article = $this->articleFacade->getArticle($values->id);
            $article->update($values);
            $this->flashMessage("Article \"{$article->title}\" has been edited!", 'alert-success');
            $this->redirect('Article:edit');
        });
    }
}
