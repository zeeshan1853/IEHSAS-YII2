<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\models;

use yii\base\Model;

/**
 * Description of TrainingForm
 *
 * @author WhiteHat
 */
class TrainingForm extends Model {

    public $name;
    public $detail;
    public $start_date;
    public $end_date;

    public function rules() {
        return [
            // name, email, subject and body are required
            [['name','detail','start_date','end_date'],'safe'],
            [['name', 'detail'], 'required'],
            // email has to be a valid email address
            [ ['start_date', 'end_date'], 'date'],
        ];
    }

}
