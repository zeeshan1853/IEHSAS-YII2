<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\controllers;

use common\models\Courses;
use Yii;
use yii\web\Controller;

/**
 * Description of CoursesController
 *
 * @author WhiteHat
 */
class CourseController extends Controller {

    public function actionIndex() {
        $courses = Courses::find()->all();
        return $this->render('index', ['courses' => $courses]);
    }

    public function actionDetail() {
        $this->layout = 'course-detail-layout';
        $request = Yii::$app->request;
        $course_id = $request->get('id');
        $course = Courses::findOne($course_id);
        return $this->render('detail', ['course' => $course]);
    }

}
