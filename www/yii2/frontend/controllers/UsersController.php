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
}
