<?php

namespace backend\models;

use common\models\Trainings;
use yii\base\Model;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TrainingForm extends Model {

    public $name;
    public $detail;
    public $duration;
    public $training_type;
    public $mode_of_training;
    public $fee;
    public $t_id;
    
    public function rules() {
        return [
            [ ['name', 'detail', 'duration', 'training_type', 'mode_of_training'],'required' ],
            [ ['name', 'detail', 'duration', 'training_type', 'mode_of_training'],'string' ],
            [ ['name', 'detail', 'duration', 'training_type', 'mode_of_training', 'fee'],'trim' ],
            [ ['fee','t_id'],'safe' ],
            [ ['fee'],'double' ],
            [ 'name', 'validateTrainingName']
        ];
        
    }
    
    public function validateTrainingName($attribute, $params) {
        if (isset($this->t_id) && !empty($this->t_id)) {
            $whereParams = ['AND', ['not', '_id', new \MongoDB\BSON\ObjectID($this->t_id)], ['name' => $this->name]];
        } else {
            $whereParams = ['name' => $this->name];
        }
        $model = Trainings::find()->andWhere($whereParams)->all();
        if (count($model) > 0) {
            $this->addError($attribute, 'This Training name (' . $this->name . ') already exist');
        }
    }
    

}
