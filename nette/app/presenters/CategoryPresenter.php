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
        $name = $category->name;
        try {
            $category->delete();
            $this->flashMessage("Category \"{$name}\" has been deleted!", 'alert-danger');
        } catch (Nette\Database\ConstraintViolationException $e) {
            $this->flashMessage("Cannot delete '{$name}', 
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
            $this->flashMessage("Category \"{$values->name}\" has been created!", 'alert-success');
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
            $this->flashMessage("Category \"{$category->name}\" has been edited!", 'alert-warning');
            $this->redirect('CategoryList:default');
        });
    }
}
