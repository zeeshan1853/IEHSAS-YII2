<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\controllers;

use backend\models\ConsultancyForm;
use common\models\Consultancies;
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
class ConsultancyController extends Controller {

    public function actionIndex() {

        $consultancies = Consultancies::find()->all();

        return $this->render('index', ['consultancies' => $consultancies]);
    }

    public function actionDetail() {

        $model = new ConsultancyForm();
        $request = Yii::$app->request;
        
        if ($request->isPost) {

            $model->load($request->post());

            if (isset($model->cons_id) && $model->cons_id !== NULL && $model->cons_id !== '') { //update case
                $consultancy = Consultancies::findOne($model->cons_id);
                $image_name = $consultancy->banner_img;
                $thumbnail_img_name = $consultancy->thumbnail_img;
                $model->banner_img = UploadedFile::getInstance($model, 'banner_img');
                $model->thumbnail_img = UploadedFile::getInstance($model, 'thumbnail_img');
                if (isset($model->banner_img) && $model->banner_img !== NULL && !empty($model->banner_img)) {
                   $image_name = $model->upload('banner');
                }
                if (isset($model->thumbnail_img) && $model->thumbnail_img !== NULL && !empty($model->thumbnail_img)) {
                    $thumbnail_img_name = $model->upload('thumbnail');
                }
                $consultancy->attributes = $model->attributes;
                $consultancy->banner_img = $image_name;
                $consultancy->thumbnail_img = $thumbnail_img_name;
                
                if ($consultancy->update()) {
                    Yii::$app->getSession()->setFlash('success', 'Consultancy has been updated.');
                    return $this->redirect(['index']);
                } else {
                    Yii::$app->getSession()->setFlash('error', 'Nothing has changed');
                }
            } else {
                $model->banner_img = UploadedFile::getInstance($model, 'banner_img');
                $model->thumbnail_img = UploadedFile::getInstance($model, 'thumbnail_img');
                $consultancy = new Consultancies();
                $consultancy->attributes = $model->attributes;
                if (isset($model->banner_img)) {
                    $image_name = $model->upload('banner');
                    $consultancy->banner_img = $image_name;
                    $model->banner_img = $consultancy->banner_img;
                }
                if (isset($model->thumbnail_img)) {
                    $thumbnail_img_name = $model->upload('thumbnail');
                    $consultancy->thumbnail_img = $thumbnail_img_name; 
                    $model->thumbnail_img = $consultancy->thumbnail_img;
                }
                $consultancy->save() ? Yii::$app->getSession()->setFlash('success', 'Consultancy has been added.') : Yii::$app->getSession()->setFlash('error', 'training has not been added.');
                return $this->redirect(['index']);
            }
        } else if ($request->get('id') !== NULL) {
            $consultancy_id = $request->get('id');
            $consultancy = Consultancies::findOne($consultancy_id);
            if (isset($consultancy)) {
                $model->attributes = $consultancy->attributes;
                $model->cons_id = $consultancy->_id;
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

        $consultancy_id = $request->post('id');
        $consultancy = Consultancies::findOne($consultancy_id);
        if ($consultancy->delete()) {
            return ['msgType' => 'SUC', 'msg' => 'Consultancy has been deleted'];
        } else {
            return ['msgType' => 'ERR', 'msg' => 'Can not delete this Consultancy'];
        }
    }

    public function actionValidate() {
        $model = new ConsultancyForm();
        $request = \Yii::$app->getRequest();
        if ($request->isAjax && $model->load($request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

}
