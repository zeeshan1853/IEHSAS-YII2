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
 * @property mixed $detail
 * @property date $new_date
 * @property string $link
 * @property string $status
 * @property int $priority
 *
 */
class News extends ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function collectionName() {
        return ['iehsas', 'news'];
    }

    /**
     * @inheritdoc
     */
    public function attributes() {
        return [
            '_id',
            'detail',
            'news_date',
            'link',
            'status',
            'priority',
            'created_at',
            'updated_at',
        ];
    }

    public function rules() {
        return [
                [['detail', 'date', 'link', 'status', 'priority'], 'safe'],
                [['detail', 'link', 'status','news_date'], 'string'],
                ['priority', 'integer']
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
