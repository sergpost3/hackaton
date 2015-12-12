<?php

namespace frontend\models;

class Transliterate {
private $type;
private $phrase;
private static $obj;
/**
* 1 - from rus to eng
* 2 - from eng to rus
*
* @param $type
*/
public function __construct ($type = 1) {
$this->type = $type;
}
public function convert ($phrase) {
$this->phrase = $phrase;
$func = ($this->type == 1) ? 'fromRusToLat' : 'fromLatToRus';
return $this->$func ();
}
/**
* transliterate cyrillic to latin
*
* @param $phrase
*
* @return mixed
*/
public static function rusEncode ($phrase) {
if (self::$obj === NULL)
self::$obj = new Transliterate (1);
return self::$obj->convert($phrase);
}
/**
* @return mixed|string
*/
private function fromRusToLat () {
$str = $this->rus2translit();
$str = strtolower($str);
$str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
$str = trim($str, "-");
return $str;
}
/**
* @return mixed
*/
private function fromLatToRus () {
# @TODO
return $this->phrase;
}
/**
* @return string
*/
function rus2translit() {
$converter = array(
'а' => 'a',   'б' => 'b',   'в' => 'v',
'г' => 'g',   'д' => 'd',   'е' => 'e',
'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
'и' => 'i',   'й' => 'y',   'к' => 'k',
'л' => 'l',   'м' => 'm',   'н' => 'n',
'о' => 'o',   'п' => 'p',   'р' => 'r',
'с' => 's',   'т' => 't',   'у' => 'u',
'ф' => 'f',   'х' => 'h',   'ц' => 'c',
'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
'і' => 'i',   'ї' => 'i',
'А' => 'A',   'Б' => 'B',   'В' => 'V',
'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
'И' => 'I',   'Й' => 'Y',   'К' => 'K',
'Л' => 'L',   'М' => 'M',   'Н' => 'N',
'О' => 'O',   'П' => 'P',   'Р' => 'R',
'С' => 'S',   'Т' => 'T',   'У' => 'U',
'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
'І' => 'I',   'Ї' => 'I'
);
return strtr($this->phrase, $converter);
}
function transliterate($str) {
}
}
?>