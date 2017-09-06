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
            'date_created',
            'date_updated',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['name', 'detail', 'consultancy_type', 'date_created', 'date_updated'], 'safe'],
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
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
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
