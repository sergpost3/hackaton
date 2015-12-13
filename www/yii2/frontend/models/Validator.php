<?php

namespace frontend\models;

abstract class Validator {
	/**
	 * check filename
	 *
	 * @param $str
	 *
	 * @return bool
	 */
	public static function fname($str){
		if (preg_match("|^[.A-Za-z0-9_-]+$|",$str)) {
			return true;
		} else {
			return false;
		}
	}
	/**
	 * check filename with "/"
	 *
	 * @param $str
	 *
	 * @return bool
	 */
	public static function urlname($str){
		if (preg_match("|^[\/.A-Za-z0-9_-]+$|",$str)) {
			return true;
		} else {
			return false;
		}
	}
	/**
	 * check e-mail
	 *
	 * @param $var
	 *
	 * @return bool
	 */
	public static function email($var){
		if (preg_match("/[^(\w)|(\@)|(\.)|(\-)]/",$var)){
			return false;
		} else {
			return true;
		}
	}
	/**
	 * check mobile number
	 *
	 * @param $var
	 *
	 * @return bool
	 */
	public static function mobile_number ($var){
		if (preg_match("|^[\(\)\-+\ 0-9]+$|",$var)) {
			return true;
		} else {
			return false;
		}
	}
	/**
	 * check login-type data
	 *
	 * @param $var
	 *
	 * @return bool
	 */
	public static function login ($var){
		if (preg_match("|^[A-Za-z0-9_-]+$|",$var)) {
			return true;
		} else {
			return false;
		}
	}
	/**
	 * check is number
	 *
	 * @param $var
	 *
	 * @return bool
	 */
	public static function number ($var){
		if (preg_match("|^[\d]+$|",$var)) {
			return true;
		} else {
			return false;
		}
	}
	/**
	 * check cyrillic-type data
	 *
	 * @param $var
	 *
	 * @return bool
	 */
	public static function cyryillic ($var){
		if (!preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/",$var)) {
			return true;
		} else {
			return false;
		}
	}
	/**
	 * check is number
	 *
	 * @param $var
	 *
	 * @return bool
	 */
	public static function isDate ($var){
		if (preg_match("/[0-9]{4}-[0-9]{2}-[0-9]{2}/",$var)) {
			return true;
		} else {
			return false;
		}
	}
	/**
	 * return cyrillic string length
	 *
	 * @param $var
	 *
	 * @return int
	 */
	public static function length ($var){
		$result = iconv_strlen($var, 'UTF-8');
		return $result;
	}
}