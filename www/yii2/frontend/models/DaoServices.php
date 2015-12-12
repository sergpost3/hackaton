<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property integer $id
 * @property integer $FK_user_id
 * @property string $name
 * @property string $desc
 * @property string $full_desc
 * @property string $link
 * @property integer $price
 * @property string $image
 * @property integer $created
 * @property integer $updated
 *
 * @property Likes[] $likes
 */
class DaoServices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FK_user_id', 'name', 'desc', 'full_desc', 'link', 'image', 'created'], 'required'],
            [['FK_user_id', 'price', 'created', 'updated'], 'integer'],
            [['full_desc'], 'string'],
            [['name', 'link', 'image'], 'string', 'max' => 150],
            [['desc'], 'string', 'max' => 250]
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
            'name' => 'Name',
            'desc' => 'Desc',
            'full_desc' => 'Full Desc',
            'link' => 'Link',
            'price' => 'Price',
            'image' => 'Image',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Likes::className(), ['FK_service_id' => 'id']);
    }
}
