<?php
declare(strict_types=1);


namespace App\Forms;


use App\Model\ArticleFacade;
use App\Model\CategoryFacade;
use Nette\Application\UI\Form;

class CategoryFormFactory
{
    public const USERNAME_PATTERN = '^[a-zA-Z0-9_]*$';

    /** @var BaseFormFactory */
    private $formFactory;

    /**
     * ArticleFormFactory constructor.
     * @param BaseFormFactory $formFactory
     */
    public function __construct(BaseFormFactory $formFactory)
    {
        $this->formFactory = $formFactory;
    }


    /**
     * @param callable $onSuccess
     * @return Form
     * @throws \Exception
     */
    public function create(callable $onSuccess = null): Form
    {
        $form = $this->formFactory->create();
        $form->addHidden('id');
        $form->addText('label', 'Label:')
            ->setRequired();
        $form->addTextArea('description', 'Description:');
        $form->onSuccess[] = function ($form, $values) use ($onSuccess) {
            if (!$values->id) {
                unset($values->id);
            }
            $onSuccess($form, $values);
        };
        $form->addSubmit('submit', 'Submit');
        return $form;
    }


}