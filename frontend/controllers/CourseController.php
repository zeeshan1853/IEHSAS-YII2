<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\controllers;

use yii\mongodb\Connection;
use yii\web\Controller;

/**
 * Description of CoursesController
 *
 * @author WhiteHat
 */
class CourseController extends Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionTemp() {
//        $connection = new Connection([
//            'dsn' => 'mongodb://localhost:27017/iehsas',
//        ]);
//        if($connection->open()){
//            echo 'connection khul gya';
//        }else{
//            echo 'connection nai khulya';
//        }
    }

}
