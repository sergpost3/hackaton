<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use frontend\models\Cabinet;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * User controller
 */
class UsersController extends Controller
{
	/**
	 * Sign in page and signing in
	 */
	public function actionSignin () {
		if (Yii::$app->request->isPost || false) {
			$error = '';
			if (!empty(Yii::$app->request->getQueryParam('email')))
				$email = Yii::$app->request->getQueryParam('email');
			else
				$error = 'Введіть, будь ласка, email';
			if (!empty(Yii::$app->request->getQueryParam('password')))
				$pass = Yii::$app->request->getQueryParam('password');
			else
				$error = 'Введіть, будь ласка, пароль';

			if (empty ($error)) {
				$users = new \app\models\Users;
				if ($users->signin()) {
					return $this->redirect('/events');
				} else
					$error = 'На жаль, не можливо увійти через помилку у введенні email та/або паролю.';
			}
			if (!empty ($error)){
				return  $this->render('signin', [
					'email' => $email,
					'pass'  => $pass,
					'error' => $error,
				]);
			}
		}
		return $this->render('signin');
	}

	/**
	 * Sign up page and signing up
	 */
	public function actionSignup () {
		return $this->render('signup');
	}

	/**
	 * Signs out the user
	 */
	public function actionSignout () {
		return $this->render('signout');
	}

    /**
     * Displays current user edit page.
     *
     * @return mixed
     */
    public function actionEdit()
    {
        return $this->render('edit');
    }

	/**
	 * Renders the users page
	 *
	 * Input:
	 * useremail
	 */
	public function actionShow () {
		return $this->render('userpage');
	}


	public function actionIndex()
	{
		return $this->render('index');
	}

}
