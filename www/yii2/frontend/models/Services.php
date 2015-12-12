<?php

namespace app\models;

use Yii;

class Services extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'status';
    }
	
    public function rules()
    {
        return [
            [['message', 'created_at', 'updated_at'], 'required'],
            [['message'], 'string'],
            [['permissions', 'created_at', 'updated_at'], 'integer']
        ];
    }
	
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message' => 'Message',
            'permissions' => 'Permissions',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
