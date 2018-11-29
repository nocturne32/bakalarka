<?php
declare(strict_types=1);


namespace App\Forms;


use App\Model\ArticleFacade;
use App\Model\CategoryFacade;
use Nette\Application\UI\Form;

class ArticleFormFactory
{
    public const USERNAME_PATTERN = '^[a-zA-Z0-9_]*$';

    /** @var BaseFormFactory */
    private $formFactory;
    /** @var CategoryFacade */
    private $categoryFacade;

    /**
     * ArticleFormFactory constructor.
     * @param BaseFormFactory $formFactory
     * @param CategoryFacade $categoryFacade
     */
    public function __construct(BaseFormFactory $formFactory, CategoryFacade $categoryFacade)
    {
        $this->formFactory = $formFactory;
        $this->categoryFacade = $categoryFacade;
    }


    /**
     * @param callable $onSuccess
     * @return Form
     * @throws \Exception
     */
    public function create(callable $onSuccess = null): Form
    {
        $form = $this->formFactory->create();
        $form->addText('title', 'Title:')
            ->setRequired();
        $form->addSelect('category_id', 'Category:')
            ->setItems($this->categoryFacade->findAllCategories()->fetchPairs('id', 'label'))
            ->setRequired();
        $form->addTextArea('content', 'Content:')
            ->setRequired();
        $form->onSuccess[] = function ($form, $values) use ($onSuccess) {
            $onSuccess($form, $values);
        };
        $form->addSubmit('submit', 'Submit');
        return $form;
    }


}