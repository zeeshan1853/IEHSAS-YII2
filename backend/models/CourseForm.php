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

    public function rules() {
        return [
                [['name', 'detail', 'duration', 'course_type', 'mode_of_study'], 'required'],
                [['name', 'detail', 'duration', 'course_type', 'mode_of_study'], 'string'],
                [['name', 'detail', 'duration', 'course_type', 'mode_of_study', 'fee'], 'trim'],
                [['fee', 'c_id'], 'safe'],
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

}
