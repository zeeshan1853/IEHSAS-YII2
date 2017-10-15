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
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

class CourseController extends Controller {

    public function actionIndex() {

        $courses = Courses::find()->all();

        return $this->render('index', ['courses' => $courses]);
    }

    public function actionDetail() {

        $model = new CourseForm();
        $request = Yii::$app->request;
        if ($request->isPost) {

            $model->load($request->post());

            if (isset($model->c_id) && $model->c_id !== NULL && $model->c_id !== '') { //update case
                $course = Courses::findOne($model->c_id);

                $image_name = $course->banner_img;
                $thumbnail_img_name = $course->thumbnail_img;
                $model->banner_img = UploadedFile::getInstance($model, 'banner_img');
                $model->thumbnail_img = UploadedFile::getInstance($model, 'thumbnail_img');
                if (isset($model->banner_img) && $model->banner_img !== NULL && !empty($model->banner_img)) {
                    $image_name = str_replace(' ', '_', $model->name);
                    $model->upload('banner');
                    $image_name = $image_name . '_banner_' . str_replace(' ', '_', $model->banner_img->baseName) . '.' . $model->banner_img->extension;
                }
                if (isset($model->thumbnail_img) && $model->thumbnail_img !== NULL && !empty($model->thumbnail_img)) {
                    $thumbnail_img_name = str_replace(' ', '_', $model->name);
                    $model->upload('thumbnail');
                    $thumbnail_img_name = $thumbnail_img_name . '_thumbnail_' . str_replace(' ', '_', $model->thumbnail_img->baseName) . '.' . $model->thumbnail_img->extension;
                }
                $course->attributes = $model->attributes;
                $course->banner_img = $image_name;
                $course->thumbnail_img = $thumbnail_img_name;

                if ($course->update()) {
                    Yii::$app->getSession()->setFlash('success', 'course has been updated.');
                    return $this->redirect(['index']);
                } else {
                    Yii::$app->getSession()->setFlash('error', 'Nothing has changed');
                }
            } else {
                $model->banner_img = UploadedFile::getInstance($model, 'banner_img');
                $model->thumbnail_img = UploadedFile::getInstance($model, 'thumbnail_img');
                $course = new Courses();
                $course->attributes = $model->attributes;
                $image_name = str_replace(' ', '_', $model->name);
                if (isset($model->banner_img) && $model->upload('banner')) {
                    $course->banner_img = $image_name . '_banner_' . str_replace(' ', '_', $model->banner_img->baseName) . '.' . $model->banner_img->extension;
                    $model->banner_img = $course->banner_img;
                }
                if (isset($model->thumbnail_img) && $model->upload('thumbnail')) {
                    $course->thumbnail_img = $image_name . '_thumbnail_' . str_replace(' ', '_', $model->thumbnail_img->baseName) . '.' . $model->thumbnail_img->extension;
                    $model->thumbnail_img = $course->thumbnail_img;
                }
                $course->save() ? Yii::$app->getSession()->setFlash('success', 'course has been added.') : Yii::$app->getSession()->setFlash('error', 'course has not been added.');
                return $this->redirect(['index']);
            }
        } else if ($request->get('id') !== NULL) {
            $course_id = $request->get('id');
            $course = Courses::findOne($course_id);
            if (isset($course)) {
                $model->attributes = $course->attributes;
                $model->c_id = $course->_id;
            }
        }
        return $this->render('detail', ['model' => $model]);
    }

    public function actionDelete() {

        Yii::$app->response->format = Response::FORMAT_JSON;

        $request = Yii::$app->request;

        if (!($request->isPost && $request->isAjax)) {
            throw new ForbiddenHttpException("You are not allowed to access this page.");
        }


        $course_id = $request->post('id');
        $course = Courses::findOne($course_id);
        if ($course->delete()) {
            return ['msgType' => 'SUC', 'msg' => 'Course has been deleted'];
        } else {
            return ['msgType' => 'ERR', 'msg' => 'Can not delte this course'];
        }
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
