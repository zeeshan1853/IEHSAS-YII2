<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\controllers;

use common\models\Trainings;
use Yii;
use yii\web\Controller;

/**
 * Description of TrainingController
 *
 * @author WhiteHat
 */
class TrainingController extends Controller {

    public function actionIndex() {
        $trainings = Trainings::find()->all();
        return $this->render('index', ['trainings' => $trainings]);
    }
    
    public function actionDetail() {
        $this->layout = 'course-detail-layout';
        $request = Yii::$app->request;
        $training_id = $request->get('id');
        $training = Trainings::findOne($training_id);
        return $this->render('detail', ['training' => $training]);
    }

}
