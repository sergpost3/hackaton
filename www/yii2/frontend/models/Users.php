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
		if (\frontend\models\Validator::cyryillic($this->name) &&
			\frontend\models\Validator::email($this->email) &&
			\frontend\models\Validator::login($this->pass)) {
			$user = new Users();
			$user->access = 1;
			$user->image = '';
			$user->name = $this->name;
			$user->pass = md5($this->pass);
			$user->email = $this->email;
			$user->link = (new \frontend\models\Transliterate())->convert($this->name);
			$user->created = time ();
			if ($user->save()) {
				$this->login = $user->email;
				$this->pass = $user->pass;
				$this->signin();
				return true;
			}
			echo 222;
			return false;
		}

		return false;
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
		if (!isset ($split [0]) || !is_numeric($split [0]))
			return $result;
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
