<?php

namespace App\Presenters;

use Nette;
use Nextras\Application\UI\SecuredLinksPresenterTrait;


abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    use SecuredLinksPresenterTrait;

    /**
     * @throws Nette\Application\AbortException
     */
    protected function startup(): void
    {
        parent::startup();

        if (!$this->user->isAllowed($this->getName(), $this->getAction())) {
            $this->noPermissionRedirect();
        }
    }

    /**
     * @return bool
     */
    protected function isUserAdmin(): bool
    {
        return $this->user->isInRole('admin');
    }

    /**
     * @throws Nette\Application\AbortException
     */
    protected function noPermissionRedirect(): void
    {
        $this->flashMessage('No permission', 'alert-danger');
        $this->redirect('Homepage:');
    }
}
