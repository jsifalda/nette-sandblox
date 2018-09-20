<?php

namespace App\AdminModule\Presenters;

use Nette;

/**
 * Base presenter for all application presenters.
 */
abstract class AuthPresenter extends Nette\Application\UI\Presenter
{

  protected function startup ()
  {
    parent::startup();
    if (!$this->getUser()->isLoggedIn()) {
        $this->redirect('Sign:');
    }
  }

  public function actionLogout ()
  {
    $this->getUser()->logout();
    $this->flashMessage('You have been signed out.');
    $this->redirect('Sign:');
  }
}
