<?php

namespace frontend\models;

use Yii;
use frontend\models\Users;

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

    public function getUsers() {
        return $this->hasOne(Users::className(), ['id' => 'FK_organizer_id']);
    }
}
