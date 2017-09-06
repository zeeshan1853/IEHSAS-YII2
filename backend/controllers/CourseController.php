<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\controllers;

use backend\models\CourseForm;
use common\models\Courses;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\widgets\ActiveForm;

class CourseController extends Controller {

    public function actionIndex() {
        
        return $this->render('index');
        
    }

    public function actionNewCourse() {

        $model = new CourseForm();
        $request = Yii::$app->request;
        if ($request->isPost) {

            $model->load($request->post());
            $course = new Courses();
            $course->attributes = $model->attributes;
            if ($course->save()) {
                Yii::$app->getSession()->setFlash('success', 'course has been added.');
                return $this->redirect(['index']);
            } else {
                Yii::$app->getSession()->setFlash('error', 'course has not been added.');
            }
        }
        return $this->render('add-course', ['model' => $model]);
    }

    public function actionValidate() {
        $model = new CourseForm();
        $request = \Yii::$app->getRequest();
        if ($request->isAjax && $model->load($request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

}
