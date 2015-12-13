<?php

namespace frontend\models;

use Yii;

class Events extends DaoEvents
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function get_event_list() {
        $sql = "SELECT `id` FROM `events` WHERE 1 SORT BY `updated` DESC LIMIT 0, 6";
        $posts = $this->model()->findAllBySql($sql);
    }

	public function add() {

    }
}
