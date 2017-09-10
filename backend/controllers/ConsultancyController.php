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
                $consultancy->attributes = $model->attributes;
                if ($consultancy->update()) {
                    Yii::$app->getSession()->setFlash('success', 'Consultancy has been updated.');
                    return $this->redirect(['index']);
                } else {
                    Yii::$app->getSession()->setFlash('error', 'Nothing has changed');
                }
            } else {
                $consultancy = new Consultancies();
                $consultancy->attributes = $model->attributes;
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
