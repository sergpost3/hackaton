<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users_events".
 *
 * @property integer $id
 * @property integer $FK_user_id
 * @property integer $FK_event_id
 * @property integer $created
 * @property integer $org_action
 * @property integer $user_action
 * @property integer $invited
 */
class UsersEvents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users_events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FK_user_id', 'FK_event_id', 'created', 'org_action', 'user_action', 'invited'], 'required'],
            [['FK_user_id', 'FK_event_id', 'created', 'org_action', 'user_action', 'invited'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'FK_user_id' => 'Fk User ID',
            'FK_event_id' => 'Fk Event ID',
            'created' => 'Created',
            'org_action' => 'Org Action',
            'user_action' => 'User Action',
            'invited' => 'Invited',
        ];
    }
}
