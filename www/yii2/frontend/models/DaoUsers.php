<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property integer $FB_id
 * @property integer $VK_id
 * @property string $name
 * @property string $email
 * @property string $pass
 * @property string $image
 * @property integer $access
 * @property string $link
 * @property integer $created
 * @property integer $updated
 *
 * @property Events[] $events
 * @property Likes[] $likes
 */
class DaoUsers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FB_id', 'VK_id', 'access', 'created', 'updated'], 'integer'],
//            [['name', 'email', 'pass', 'image', 'link', 'created'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 50],
            [['pass'], 'string', 'max' => 32],
            [['image', 'link'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'FB_id' => 'Fb ID',
            'VK_id' => 'Vk ID',
            'name' => 'Name',
            'email' => 'Email',
            'pass' => 'Pass',
            'image' => 'Image',
            'access' => 'Access',
            'link' => 'Link',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Events::className(), ['FK_organizer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Likes::className(), ['FK_user_id' => 'id']);
    }
}
