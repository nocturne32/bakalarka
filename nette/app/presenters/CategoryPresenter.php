<?php

namespace App\Presenters;

use App\Forms\CategoryFormFactory;
use App\Model\CategoryFacade;
use Nette;
use Nette\Application\UI\Form;


class CategoryPresenter extends BasePresenter
{
    /** @var CategoryFacade @inject */
    public $categoryFacade;
    /** @var CategoryFormFactory @inject */
    public $categoryFormFactory;

    /**
     * @throws Nette\Application\AbortException
     */
    public function renderAdd(): void
    {
        if (!$this->isUserAdmin()) {
            $this->noPermissionRedirect();
        }
    }

    /**
     * @param int $id
     * @throws Nette\Application\AbortException
     */
    public function renderEdit(int $id): void
    {
        $category = $this->categoryFacade->getCategory($id);
        if (!$category) {
            $this->flashMessage('Category does not exist.', 'alert-warning');
            $this->redirect('CategoryList:default');
        }
        $this['editForm']->setDefaults($category);
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
            $this->redirect('CategoryList:default');
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

    /**
     * @return Form
     * @throws \Exception
     */
    protected function createComponentAddForm(): Form
    {
        return $this->categoryFormFactory->create(function ($form, $values) {
            $this->categoryFacade->insertCategory($values);
            $this->flashMessage("Category \"{$values->label}\" has been created!", 'alert-success');
            $this->redirect('CategoryList:default');
        });
    }

    /**
     * @return Form
     * @throws \Exception
     */
    protected function createComponentEditForm(): Form
    {
        return $this->categoryFormFactory->create(function ($form, $values) {
            $category = $this->categoryFacade->getCategory($values->id);
            $category->update($values);
            $this->flashMessage("Category \"{$category->label}\" has been edited!", 'alert-warning');
            $this->redirect('CategoryList:default');
        });
    }
}
