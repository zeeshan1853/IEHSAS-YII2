<?php

namespace backend\models;

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
    
    public function rules() {
        return [
            [ ['name', 'detail', 'duration', 'course_type', 'mode_of_study'],'required' ],
            [ ['name', 'detail', 'duration', 'course_type', 'mode_of_study'],'string' ],
            [ ['name', 'detail', 'duration', 'course_type', 'mode_of_study', 'fee'],'trim' ],
            [ ['fee'],'safe' ],
            [ ['fee'],'double' ],
            [ 'name', 'unique', 'targetClass' => '\common\models\Courses', 'message' => 'This Course Already been registered' ]
        ];
        
    }

}
