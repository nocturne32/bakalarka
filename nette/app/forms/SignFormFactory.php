<?php
declare(strict_types=1);


namespace App\Forms;


use Nette\Application\UI\Form;

class SignFormFactory
{
    public const USERNAME_PATTERN = '^[a-zA-Z0-9_]*$';

    /** @var BaseFormFactory */
    private $formFactory;

    /**
     * SignFormFactory constructor.
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
    public function createUp(callable $onSuccess = null): Form
    {
        $form = $this->formFactory->create();
        $form->addText('username', 'Username:')
            ->setRequired()
            ->addRule(Form::PATTERN, 'Alphanumeric characters only', self::USERNAME_PATTERN);
        $form->addText('fullname', 'Full name:')
            ->setNullable();
        $form->addEmail('email', 'Email:')
            ->setNullable();
        $form->addPassword('password', 'Password:')
            ->setRequired()
            ->addRule(Form::MIN_LENGTH, 'At least %d characters.', 5);
        $form->addPassword('password2', 'Re-enter password:')
            ->setRequired()
            ->addRule(Form::EQUAL, 'Passwords have to match.', $form['password'])
            ->setOmitted();
        $form->onSuccess[] = function ($form, $values) use ($onSuccess) {
            $values->roles = 'user';
            $values->registered_at = new \DateTimeImmutable('now');
            $onSuccess($form, $values);
        };
        $form->addSubmit('submit', 'Sign up');
        return $form;
    }


    /**
     * @param callable $onSuccess
     * @return Form
     * @throws \Exception
     */
    public function createIn(callable $onSuccess = null): Form
    {
        $form = $this->formFactory->create();
        $form->addText('username', 'Username:')
            ->setRequired();
        $form->addPassword('password', 'Password:')
            ->setRequired();
        $form->onSuccess[] = function ($form, $values) use ($onSuccess) {
            $onSuccess($form, $values);
        };
        $form->addSubmit('submit', 'Sign in');
        return $form;
    }

}