<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use frontend\models\Cabinet;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\User;

/**
 * User controller
 */
class UsersController extends Controller
{
	/**
	 * Sign in page and signing in
	 */
	public function actionSignin () {
		if (\app\models\Users::getRights() > 0) {
			return $this->redirect('/');
		}
		if ($post = Yii::$app->request->post()) {
			$error = '';
			if (isset($post['email']) && !empty($post['email']))
				$email = $post['email'];
			else
				$error = 'Введіть, будь ласка, email';
			if (isset($post['password']) && !empty($post['password']))
				$pass = $post['password'];
			else
				$error = 'Введіть, будь ласка, пароль';

			if (empty ($error)) {
				$users = new \app\models\Users;
				$users->login = $email;
				$users->pass  = $pass;
				if ($users->signin()) {
					return $this->redirect('/events');
				} else
					$error = 'На жаль, неможливо увійти через помилку у введенні email та/або паролю.';
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
		if (\app\models\Users::getRights() > 0) {
			return $this->redirect('/');
		}
		if ($post = Yii::$app->request->post()) {

		}
		return $this->render('signup');
	}

	/**
	 * Signs out the user
	 */
	public function actionSignout () {
		\app\models\Users::logout();
		return $this->redirect('/');
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
