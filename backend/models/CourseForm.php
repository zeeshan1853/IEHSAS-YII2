<?php

namespace backend\models;

use common\models\Courses;
use yii\base\Model;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CourseForm extends Model {

    public $name;
    public $detail;
    public $duration;
    public $course_type;
    public $mode_of_study;
    public $fee;
    public $c_id;
    public $banner_img;
    public $thumbnail_img;

    public function rules() {
        return [
                [['name', 'detail', 'duration', 'course_type', 'mode_of_study'], 'required'],
                [['name', 'detail', 'duration', 'course_type', 'mode_of_study'], 'string'],
                [['name', 'detail', 'duration', 'course_type', 'mode_of_study', 'fee'], 'trim'],
                [['banner_img', 'thumbnail_img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
                [['thumbnail_img'], 'file', 'skipOnEmpty' => true, 'mimeTypes' => 'image/jpeg, image/png', 'extensions' => 'png, jpg'],
                [['fee', 'c_id', 'thumbnail_img'], 'safe'],
                [['fee'], 'double'],
                ['name', 'validateCourseName']
//            [ 'name', 'unique', 'on' => 'create' , 'targetClass' => '\common\models\Courses', 'message' => 'This Course Already been registered' ],
//            [['name'], 'unique', 'on'=> 'update', 'when' => function($model){ return $model->isAttributeChanged('name');}],
        ];
    }

    public function validateCourseName($attribute, $params) {
        if (isset($this->c_id) && !empty($this->c_id)) {
            $whereParams = ['AND', ['not', '_id', new \MongoDB\BSON\ObjectID($this->c_id)], ['name' => $this->name]];
        } else {
            $whereParams = ['name' => $this->name];
        }
        $model = Courses::find()->andWhere($whereParams)->all();
        if (count($model) > 0) {
            $this->addError($attribute, 'This Course name (' . $this->name . ') already exist');
        }
    }

    public function upload($image_type = '') {
        $img_base_name = '';
        if ($this->validate()) {
            if ($this->banner_img == null && $this->thumbnail_img == null) {
                return true;
            }
            if ($image_type == 'banner') {
                $image_name = str_replace(' ', '_', $this->name) . '_' . $image_type . '_' . str_replace(' ', '_', $this->banner_img->baseName);
                $this->banner_img->saveAs('uploads/' . $image_name . '.' . $this->banner_img->extension);
                return true;
            } elseif ($image_type == 'thumbnail') {
                $image_name = str_replace(' ', '_', $this->name) . '_' . $image_type . '_' . str_replace(' ', '_', $this->thumbnail_img->baseName);
                $this->thumbnail_img->saveAs('uploads/' . $image_name . '.' . $this->thumbnail_img->extension);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
