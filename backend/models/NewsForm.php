<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\models;

use yii\base\Model;

/**
 * Description of NewsForm
 *
 * @author WhiteHat
 */
class NewsForm extends Model {

    public $detail;
    public $news_date;
    public $link;
    public $status;
    public $priority;
    public $n_id;

    public function rules() {
        return [
                ['detail', 'required'],
                [['news_date', 'link', 'status', 'priority', 'n_id'], 'safe'],
                [['detail', 'link', 'status', 'date'], 'string'],
                ['priority', 'integer']
        ];
    }

}
