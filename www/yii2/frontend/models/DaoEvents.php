<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property integer $id
 * @property string $name
 * @property double $geo_x
 * @property double $geo_y
 * @property integer $geo_zoom
 * @property string $geo_name
 * @property string $geo_google_maps_link
 * @property string $desc
 * @property string $datetime
 * @property string $full_desc
 * @property integer $people_count
 * @property integer $max_people_count
 * @property string $image
 * @property integer $type
 * @property integer $private
 * @property string $link
 * @property integer $FK_organizer_id
 * @property integer $created
 * @property integer $updated
 *
 * @property Users $fKOrganizer
 * @property Likes[] $likes
 */
class DaoEvents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'geo_x', 'geo_y', 'geo_zoom', 'geo_name', 'geo_google_maps_link', 'desc', 'datetime', 'full_desc', 'image', 'link', 'FK_organizer_id', 'created'], 'required'],
            [['geo_x', 'geo_y'], 'number'],
            [['geo_zoom', 'people_count', 'max_people_count', 'type', 'private', 'FK_organizer_id', 'created', 'updated'], 'integer'],
            [['datetime'], 'safe'],
            [['full_desc'], 'string'],
            [['name', 'geo_name', 'geo_google_maps_link', 'desc'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 150],
            [['link'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'geo_x' => 'Geo X',
            'geo_y' => 'Geo Y',
            'geo_zoom' => 'Geo Zoom',
            'geo_name' => 'Geo Name',
            'geo_google_maps_link' => 'Geo Google Maps Link',
            'desc' => 'Desc',
            'datetime' => 'Datetime',
            'full_desc' => 'Full Desc',
            'people_count' => 'People Count',
            'max_people_count' => 'Max People Count',
            'image' => 'Image',
            'type' => 'Type',
            'private' => 'Private',
            'link' => 'Link',
            'FK_organizer_id' => 'Fk Organizer ID',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFKOrganizer()
    {
        return $this->hasOne(Users::className(), ['id' => 'FK_organizer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Likes::className(), ['FK_event_id' => 'id']);
    }
}
