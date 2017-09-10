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
                $training->attributes = $model->attributes;
                if ($training->update()) {
                    Yii::$app->getSession()->setFlash('success', 'training has been updated.');
                    return $this->redirect(['index']);
                } else {
                    Yii::$app->getSession()->setFlash('error', 'Nothing has changed');
                }
            } else {
                $training = new Trainings();
                $training->attributes = $model->attributes;
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
