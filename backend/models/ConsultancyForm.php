<?php

namespace backend\models;

use common\models\Consultancies;
use yii\base\Model;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ConsultancyForm extends Model {

    public $name;
    public $detail;
    public $consultancy_type;
    public $cons_id;
    public $banner_img;
    public $thumbnail_img;
    
    public function rules() {
        return [
            [ ['name', 'detail', 'consultancy_type'],'required' ],
            [ ['name', 'detail', 'consultancy_type'],'string' ],
            [ ['name', 'detail', 'consultancy_type'],'trim' ],
            [['banner_img', 'thumbnail_img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [ ['cons_id'],'safe' ],
            [ 'name', 'validateConsultancyName']
        ];
        
    }
    
    public function validateConsultancyName($attribute, $params) {
        if (isset($this->cons_id) && !empty($this->cons_id)) {
            $whereParams = ['AND', ['not', '_id', new \MongoDB\BSON\ObjectID($this->cons_id)], ['name' => $this->name]];
        } else {
            $whereParams = ['name' => $this->name];
        }
        $model = Consultancies::find()->andWhere($whereParams)->all();
        if (count($model) > 0) {
            $this->addError($attribute, 'This Consultancy name (' . $this->name . ') already exist');
        }
    }
    
    public function upload($image_type = '') {
        if ($this->validate()) {
            if ($image_type == 'banner') {
                $image_name = 'cons_' . str_replace(' ', '_', $this->name) . '_' . $image_type . '_' . str_replace(' ', '_', $this->banner_img->baseName) . '.' . $this->banner_img->extension;
                $this->banner_img->saveAs('uploads/' . $image_name);
                return $image_name;
            } elseif ($image_type == 'thumbnail') {
                $image_name ='cons_' . str_replace(' ', '_', $this->name) . '_' . $image_type . '_' . str_replace(' ', '_', $this->thumbnail_img->baseName) . '.' . $this->thumbnail_img->extension;
                $this->thumbnail_img->saveAs('uploads/' . $image_name );
                return $image_name;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    

}
