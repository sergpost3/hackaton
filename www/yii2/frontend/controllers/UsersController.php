<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\User;
use frontend\models\Users;

/**
 * User controller
 */
class UsersController extends Controller
{
	/**
	 * Sign in page and signing in
	 */
	public function actionSignin () {
		if (Users::getRights() > 0) {
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
				$users = new Users;
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
		if (\frontend\models\Users::getRights() > 0) {
			return $this->redirect('/');
		}

		if ($post = Yii::$app->request->post()) {
			$error = ''; $email = ''; $pass = ''; $name = '';
			if (isset($post['email']) && !empty($post['email']))
				$email = $post['email'];
			else
				$error = 'Введіть, будь ласка, email';
			if (isset($post['pass']) && !empty($post['pass']))
				$pass = $post['pass'];
			else
				$error = 'Введіть, будь ласка, пароль';
			if (isset($post['name']) && !empty($post['name']))
				$name = $post['name'];
			else
				$error = 'Введіть, будь ласка, своє ім\'я';

			if (empty ($error)) {
				$users = new \frontend\models\Users;
				$users->email = $email;
				$users->name  = $name;
				$users->pass  = $pass;
				if ($users->signup()) {
					return $this->redirect('/');
				} else
					$error = 'На жаль, неможливо зареєструватися через помилку введення даних.';
			}
			if (!empty ($error)){

				$client_id = '5186189';
				$client_secret = 'WtAeG2nAnSHRaAzIojap';
				$redirect_uri = 'http://epulari/vk-auth';
				$url = 'http://oauth.vk.com/authorize';

				$params = array(
					'client_id'     => $client_id,
					'redirect_uri'  => $redirect_uri,
					'response_type' => 'code'
				);

				$vkAuthLink = $url . '?' . urldecode(http_build_query($params));


				return  $this->render('signup', [
					'email' => $email,
					'pass'  => $pass,
					'name'  => $name,
					'error' => $error,
					'vk_link' => $vkAuthLink
				]);
			}
		}
		return $this->render('signup');
	}

	public function actionVkAuth () {
		$client_id = '5186189';
		$client_secret = 'WtAeG2nAnSHRaAzIojap';
		$redirect_uri = 'http://epulari/vk-auth';
		$url = 'http://oauth.vk.com/authorize';

		$params = array(
			'client_id'     => $client_id,
			'redirect_uri'  => $redirect_uri,
			'response_type' => 'code'
		);

		$vkAuthLink = $url . '?' . urldecode(http_build_query($params));
	}

	/**
	 * Signs out the user
	 */
	public function actionSignout () {
		\frontend\models\Users::logout();
		return $this->redirect('/');
	}

    /**
     * Displays current user edit page.
     *
     * @return mixed
     */
    public function actionEdit()
    {
	    if (Users::getRights() > 0) {
		    return $this->redirect('/');
	    }
	    $url = Yii::$app->request->get('userurl');
	    $error = '';
	    if ($post = Yii::$app->request->post()) {
		    if (isset($post['email']) && !empty($post['email']))
			    $email = $post['email'];
		    else
			    $error = 'Введіть, будь ласка, email';
		    if (isset($post['pass']) && !empty($post['pass']))
			    $pass = $post['pass'];
		    else
			    $error = 'Введіть, будь ласка, пароль';

		    if (isset($post['name']) && !empty($post['name']))
			    $name = $post['name'];
		    else
			    $error = 'Введіть, будь ласка, своє ім\'я';

		    if (empty ($error)) {
			    $users = new Users;
			    $users->email = $email;
			    $users->name  = $name;
			    $users->pass  = $pass;
			    if ($users->editUsersData($url)) {
//				    return $this->redirect('/events');
			    } else
				    $error = 'На жаль, неможливо увійти через помилку у введенні email та/або паролю.';
		    }
	    }
	    return $this->render('edit', ['user' => (new Users ())->getUsersData($url),'error' => $error]);
    }

	/**
	 * Renders the users page
	 *
	 * Input:
	 * useremail
	 */
	public function actionShow () {
		$url = Yii::$app->request->get('userurl');
		return $this->render('userpage', ['user' => (new Users ())->getUsersData($url)]);
	}


	public function actionIndex()
	{
		return $this->render('index', ['users' => (new Users ())->getUsersList()]);
	}

}
