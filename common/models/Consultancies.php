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
 * @property string $consultancy_type
 * @property string $banner_img
 * @property string $thumbnail_img
 *
 */
class Consultancies extends ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function collectionName() {
        return ['iehsas', 'consultancies'];
    }

    /**
     * @inheritdoc
     */
    public function attributes() {
        return [
            '_id',
            'name',
            'detail',
            'consultancy_type',
            'banner_img',
            'thumbnail_img',
            'created_at',
            'updated_at',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['name', 'detail', 'consultancy_type','banner_img' ,'thumbnail_img' , 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            '_id' => 'ID',
            'name' => 'Name',
            'detail' => 'Detail',
            'banner_img' => 'Banner Image',
            'thumbnail_img' => 'Thumbnail Image',
            'created_at' => 'Date Created',
            'updated_at' => 'Date Updated',
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
