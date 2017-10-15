<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\controllers;

use backend\models\TrainingForm;
use common\models\Trainings;
use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

/**
 * Description of Training
 *
 * @author WhiteHat
 */
class TrainingController extends Controller {

    public function actionIndex() {

        $trainings = Trainings::find()->all();

        return $this->render('index', ['trainings' => $trainings]);
    }

    public function actionDetail() {

        $model = new TrainingForm();
        $request = Yii::$app->request;
        if ($request->isPost) {

            $model->load($request->post());


            if (isset($model->t_id) && $model->t_id !== NULL && $model->t_id !== '') { //update case
                $training = Trainings::findOne($model->t_id);
                
                $image_name = $training->banner_img;
                $thumbnail_img_name = $training->thumbnail_img;
                $model->banner_img = UploadedFile::getInstance($model, 'banner_img');
                $model->thumbnail_img = UploadedFile::getInstance($model, 'thumbnail_img');
                if (isset($model->banner_img) && $model->banner_img !== NULL && !empty($model->banner_img)) {
                   $image_name = $model->upload('banner');
                }
                if (isset($model->thumbnail_img) && $model->thumbnail_img !== NULL && !empty($model->thumbnail_img)) {
                    $thumbnail_img_name = $model->upload('thumbnail');
                }
                $training->attributes = $model->attributes;
                $training->banner_img = $image_name;
                $training->thumbnail_img = $thumbnail_img_name;
                
                if ($training->update()) {
                    Yii::$app->getSession()->setFlash('success', 'training has been updated.');
                    return $this->redirect(['index']);
                } else {
                    Yii::$app->getSession()->setFlash('error', 'Nothing has changed');
                }
            } else {
                $model->banner_img = UploadedFile::getInstance($model, 'banner_img');
                $model->thumbnail_img = UploadedFile::getInstance($model, 'thumbnail_img');
                $training = new Trainings();
                $training->attributes = $model->attributes;
                if (isset($model->banner_img)) {
                    $image_name = $model->upload('banner');
                    $training->banner_img = $image_name;
                    $model->banner_img = $training->banner_img;
                }
                if (isset($model->thumbnail_img)) {
                    $thumbnail_img_name = $model->upload('thumbnail');
                    $training->thumbnail_img = $thumbnail_img_name; 
                    $model->thumbnail_img = $training->thumbnail_img;
                }
                $training->save() ? Yii::$app->getSession()->setFlash('success', 'training has been added.') : Yii::$app->getSession()->setFlash('error', 'training has not been added.');
                return $this->redirect(['index']);
            }
        } else if ($request->get('id') !== NULL) {
            $training_id = $request->get('id');
            $training = Trainings::findOne($training_id);
            if (isset($training)) {
                $model->attributes = $training->attributes;
                $model->t_id = $training->_id;
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
        $training = Trainings::findOne($course_id);
        if ($training->delete()) {
            return ['msgType' => 'SUC', 'msg' => 'Training has been deleted'];
        } else {
            return ['msgType' => 'ERR', 'msg' => 'Can not delte this Training'];
        }
    }
    
    public function actionValidate() {
        $model = new TrainingForm();
        $request = \Yii::$app->getRequest();
        if ($request->isAjax && $model->load($request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

}
