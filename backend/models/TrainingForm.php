<?php

namespace backend\models;

use common\models\Trainings;
use yii\base\Model;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TrainingForm extends Model {

    public $name;
    public $detail;
    public $duration;
    public $training_type;
    public $mode_of_training;
    public $fee;
    public $banner_img;
    public $thumbnail_img;
    public $t_id;
    
    public function rules() {
        return [
            [ ['name', 'detail', 'duration', 'training_type', 'mode_of_training'],'required' ],
            [ ['name', 'detail', 'duration', 'training_type', 'mode_of_training'],'string' ],
            [ ['name', 'detail', 'duration', 'training_type', 'mode_of_training', 'fee'],'trim' ],
            [['banner_img', 'thumbnail_img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [ ['fee','t_id'],'safe' ],
            [ ['fee'],'double' ],
            [ 'name', 'validateTrainingName']
        ];
        
    }
    
    public function validateTrainingName($attribute, $params) {
        if (isset($this->t_id) && !empty($this->t_id)) {
            $whereParams = ['AND', ['not', '_id', new \MongoDB\BSON\ObjectID($this->t_id)], ['name' => $this->name]];
        } else {
            $whereParams = ['name' => $this->name];
        }
        $model = Trainings::find()->andWhere($whereParams)->all();
        if (count($model) > 0) {
            $this->addError($attribute, 'This Training name (' . $this->name . ') already exist');
        }
    }
    
    public function upload($image_type = '') {
        $img_base_name = '';
        if ($this->validate()) {
//            if ($this->banner_img == null && $this->thumbnail_img == null) {
//                return true;
//            }
            if ($image_type == 'banner') {
                $image_name = 't_' . str_replace(' ', '_', $this->name) . '_' . $image_type . '_' . str_replace(' ', '_', $this->banner_img->baseName) . '.' . $this->banner_img->extension;
                $this->banner_img->saveAs('uploads/' . $image_name);
                return $image_name;
            } elseif ($image_type == 'thumbnail') {
                $image_name ='t_' . str_replace(' ', '_', $this->name) . '_' . $image_type . '_' . str_replace(' ', '_', $this->thumbnail_img->baseName) . '.' . $this->thumbnail_img->extension;
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
