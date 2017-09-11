<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\controllers;

use backend\models\NewsForm;
use common\models\News;
use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\Response;

/**
 * Description of NewsController
 *
 * @author WhiteHat
 */
class NewsController extends Controller {

    public function actionIndex() {
        $news = News::find()->all();
        return $this->render('index', ['news' => $news]);
    }
    
    public function actionDetail() {

        $model = new NewsForm();
        $request = Yii::$app->request;
        if ($request->isPost) {

            $model->load($request->post());


            if (isset($model->n_id) && $model->n_id !== NULL && $model->n_id !== '') { //update case
                $news = News::findOne($model->n_id);
                $news->attributes = $model->attributes;
                if ($news->update()) {
                    Yii::$app->getSession()->setFlash('success', 'News has been updated.');
                    return $this->redirect(['index']);
                } else {
                    Yii::$app->getSession()->setFlash('error', 'Nothing has changed');
                }
            } else {
                $news = new News();
                $news->attributes = $model->attributes;
                $news->save() ? Yii::$app->getSession()->setFlash('success', 'News has been added.') : Yii::$app->getSession()->setFlash('error', 'News has not been added.');
                return $this->redirect(['index']);
            }
        } else if ($request->get('id') !== NULL) {
            $news_id = $request->get('id');
            $news = News::findOne($news_id);
            if (isset($news)) {
                $model->attributes = $news->attributes;
                $model->n_id = $news->_id;
            }
        }
        return $this->render('detail', ['model' => $model]);
    }
    
     public function actionDelete(){
        
        Yii::$app->response->format = Response::FORMAT_JSON;
        
        $request = Yii::$app->request;
        
        if (!($request->isPost && $request->isAjax)) {
            throw new ForbiddenHttpException("You are not allowed to access this page.");
        }
       
        
            $news_id = $request->post('id');
            $news = News::findOne($news_id);
            if( $news->delete() ){
                return ['msgType' => 'SUC', 'msg' => 'News has been deleted'];
            }else{
                return ['msgType' => 'ERR', 'msg' => 'Can not delte this News'];
            }
        
    }

}
