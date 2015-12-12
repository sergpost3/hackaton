<?php

namespace app\models;

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
		$result = false;
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

	public function getUsersList () {

	}

	public function getUsersDetails () {

	}

	public function editUsersDetails () {

	}

	public function editUsersData () {

	}
}
