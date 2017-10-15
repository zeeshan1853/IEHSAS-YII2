<?php

namespace common\models;

use yii\mongodb\ActiveRecord;

/**
 * This is the model class for collection "courses".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property string $name
 * @property mixed $detail
 * @property mixed $duration
 * @property string $course_type
 * @property string $mode_of_study
 * @property double $fee
 * @property string $banner_img
 * @property string $thumbnail_img
 */
class Courses extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['iehsas', 'courses'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'name',
            'detail',
            'duration',
            'course_type',
            'mode_of_study',
            'fee',
            'banner_img',
            'thumbnail_img',
            'created_at',
            'updated_at',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'detail', 'duration', 'course_type', 'mode_of_study', 'fee' , 'banner_img' , 'thumbnail_img', 'created_at', 'updated_at'], 'safe'],
            [ 'name', 'unique'],
//            [ 'name', 'unique', 'on' => 'create'],
//            [['name'], 'unique', 'on'=> 'update', 'when' => function($model){ return $model->isAttributeChanged('name');}],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'name' => 'Name',
            'detail' => 'Detail',
            'duration' => 'Course Duration',
            'course_type' => 'Course Type',
            'mode_of_study' => 'Mode of study',
            'fee' => 'Fee',
            'banner_img' => 'Banner Image',
            'thumbnail_img' => 'Thumbnail Image'
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new \MongoDB\BSON\UTCDateTime(round(microtime(true) * 1000)),
            ]
        ];
    }
}
