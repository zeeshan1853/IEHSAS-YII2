<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\models;

use yii\mongodb\ActiveRecord;
/**
* @property \MongoDB\BSON\ObjectID|string $_id
 * @property string $name
 * @property mixed $detail
 * @property mixed $duration
 * @property string $training_type
 * @property string $mode_of_training
 * @property double $fee
 * @property string $banner_img
 * @property string $thumbnail_img
 * 
 */

class Trainings extends ActiveRecord {

    public static function collectionName() {
        return ['iehsas', 'trainings'];
    }
    
    public function attributes() {
        return [
            '_id',
            'name',
            'detail',
            'duration',
            'training_type',
            'mode_of_training',
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
            [['name', 'detail', 'duration', 'training_type', 'mode_of_training', 'fee' ,'banner_img' ,'thumbnail_img' ,'created_at', 'updated_at'], 'safe'],
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
            'duration' => 'Training Duration',
            'training_type' => 'Training Type',
            'mode_of_training' => 'Mode of Training',
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
