<?php

namespace App\AdminModule\Presenters;

use App\Forms;
use Nette\Application\UI\Form;
use Nette;

class SignPresenter extends Nette\Application\UI\Presenter
{
  /** @var Forms\SignInFormFactory */
  private $signInFactory;

  public function __construct(Forms\SignInFormFactory $signInFactory)
  {
    $this->signInFactory = $signInFactory;
  }

  public function actionDefault ()
  {
    if ($this->getUser()->isLoggedIn()) {
        $this->redirect('Dashboard:');
    }
  }


  /**
   * Sign-in form factory.
   * @return Nette\Application\UI\Form
   */
  protected function createComponentSignInForm()
  {
    return $this->signInFactory->create(function () {
      $this->redirect('Dashboard:');
    });
  }


  public function actionOut()
  {
    $this->getUser()->logout();
  }
}
