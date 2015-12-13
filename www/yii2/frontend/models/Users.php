<?php

namespace app\models;

use common\models\User;
use Yii;

class Users extends DaoUsers
{

	public $login;
	public $username;
	public $email;
	public $password;

	/**
	 * Signs user in
	 *
	 * Inputs:
	 * @param string $login <email>
	 * @param $password <md5 hash>
	 *
	 * @return bool
	 */
	function signin() {
		$login = $this->login;
		$password = $this->password;
		$rows = $this->findAll([
			'email' => $login
		]);

		$result = (md5($this->password) == $rows [0]->pass);
		if ($result) {
//			echo 'Woo Hoo!';
			$auth = $rows [0]->id . '[;]' . md5($login . $rows [0]->pass);
			setcookie('auth', $auth, time () + 10000000);
			$_COOKIE ['auth'] = $auth;
		}
		return $result;
	}

	/**
	 * Signs user up.
	 *
	 * @return DaoUsers|null the saved model or null if saving fails
	 */
	public function signup()
	{
		if ($this->validate()) {
			$user = new User();
			$user->username = $this->username;
			$user->email = $this->email;
			$user->setPassword($this->password);
			$user->generateAuthKey();
			if ($user->save()) {
				return $user;
			}
		}

		return null;
	}

	/**
	 * -1 - not auth, 0 - non activated; 1 - activated user (via email or social networks),
	 * 2 - manager, 4 - moderator, 7 - administrator
	 *
	 * @return int|mixed
	 */
	public static function getRights () {
		if (!is_null(self::current()))
			return self::current()->access;
		else
			return -1;
	}

	private static $currentUserCache = null;

	/**
	 * Returns current user, or false if user is not auth
	 *
	 * @return NULL|User
	 */
	public static function current () {
		if (!is_null(self::$currentUserCache))
			return self::$currentUserCache;
		$result = null;
		$split = explode('[;]', $_COOKIE ['auth']);
		$user = (new User())->findOne(['id' => $split [0]]);
		if (md5($user->email . $user->pass) == $split [1]) {
			$result = $user;
			self::$currentUserCache = $result;
		}
		return $result;
	}

	/**
	 * Remove current user session
	 */
	public static function logout () {
		setcookie('auth', '', 0);
		unset ($_COOKIE ['auth']);
	}

	public function getUsersList () {

	}

	public function getUsersDetails () {

	}

	public function editUsersDetails () {

	}

	public function editUsersData () {

	}
}
