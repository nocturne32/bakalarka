<?php

namespace App\Presenters;


use App\Forms\SignFormFactory;
use App\Model\UserFacade;
use Nette\Application\UI\Form;
use Nette\Database\UniqueConstraintViolationException;
use Nette\Security\AuthenticationException;
use Nette\Security\User;

class SignPresenter extends BasePresenter
{
    /** @var SignFormFactory @inject */
    public $signFormFactory;
    /** @var UserFacade @inject */
    public $userFacade;

    /**
     * @throws \Nette\Application\AbortException
     */
    public function actionOut(): void
    {
        $this->user->logout(true);
        $this->flashMessage('You were successfully signed out', 'alert-info');
        $this->redirect('Homepage:default');
    }

    /**
     * @return Form
     * @throws \Exception
     */
    protected function createComponentSignUpForm(): Form
    {
        return $this->signFormFactory->createUp(function ($form, $values) {
            try {
                $this->userFacade->addUser($values);
            } catch (UniqueConstraintViolationException $e) {
                $this->flashMessage($e->getMessage(), 'alert-danger');
                return;
            }

            $this->flashMessage('You were successfully signed up! You can sign in now', 'alert-success');
            $this->redirect('Sign:in');
        });
    }

    /**
     * @return Form
     * @throws \Exception
     */
    protected function createComponentSignInForm(): Form
    {
        return $this->signFormFactory->createIn(function ($form, $values) {
            try {
                $this->user->login($values->username, $values->password);
            } catch (AuthenticationException $e) {
                $this->flashMessage($e->getMessage(), 'alert-warning');
                return;
            }

            $this->flashMessage('You were successfully signed in!', 'alert-success');
            $this->redirect('Homepage:default');
        });
    }

}
