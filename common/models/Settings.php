<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\models;

use yii\mongodb\ActiveRecord;

class Settings extends ActiveRecord {

    public static function collectionName() {
        return ['iehsas', 'settings'];
    }
    
    public function attributes() {
        return [
            '_id',
            'home_slides',
            'affliations',
            'clients',
            'phone',
            'email',
            'address',
            'created_at',
            'updated_at',
        ];
    }

}
