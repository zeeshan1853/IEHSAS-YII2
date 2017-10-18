<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\controllers;

use common\models\Consultancies;
use common\models\Trainings;
use Yii;
use yii\web\Controller;

/**
 * Description of ConsultancyController
 *
 * @author WhiteHat
 */
class ConsultancyController extends Controller {

    public function actionIndex() {
        $consultancies = Consultancies::find()->all();
        return $this->render('index', ['consultancies' => $consultancies]);
    }
    
    public function actionDetail() {
        $this->layout = 'course-detail-layout';
        $request = Yii::$app->request;
        $consultancy_id = $request->get('id');
        $consultancy = Consultancies::findOne($consultancy_id);
        return $this->render('detail', ['consultancy' => $consultancy]);
    }

}
