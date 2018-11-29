<?php

namespace App\Presenters;

use App\Forms\ArticleFormFactory;
use App\Forms\CategoryFormFactory;
use App\Model\ArticleFacade;
use App\Model\CategoryFacade;
use Nette;
use Nette\Application\UI\Form;


class CategoryListPresenter extends BasePresenter
{
    /** @var CategoryFacade @inject */
    public $categoryFacade;

    public function renderDefault(): void
    {
        $this->template->categories = $this->categoryFacade->findAllCategories();
    }

    /**
     * @secured
     * @param int $id
     * @throws Nette\Application\AbortException
     */
    public function handleDelete(int $id): void
    {
        $category = $this->categoryFacade->getCategory($id);
        if (!$category) {
            $this->flashMessage('Category does not exist.', 'alert-warning');
            $this->redirect('ArticleList:default');
        }
        $label = $category->label;
        try {
            $category->delete();
            $this->flashMessage("Category \"{$label}\" has been deleted!", 'alert-danger');
        } catch (Nette\Database\ConstraintViolationException $e) {
            $this->flashMessage("Cannot delete '{$label}', 
            there are still articles in this category.", 'alert-danger');
        }
        $this->redirect('CategoryList:default');
    }
}
