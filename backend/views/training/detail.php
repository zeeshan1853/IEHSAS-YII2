<?php

use yii\helpers\BaseUrl;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$baseUrl = BaseUrl::base();

?>
<h1>Add New Training</h1>

<?php
$form = ActiveForm::begin([
            'id' => 'trainingForm',
            'action' => $baseUrl . '/training/detail',
            'enableAjaxValidation' => true,
            'validateOnBlur' => true,
            'validationUrl' => Yii::$app->urlManager->createUrl("training/validate"),
            'validateOnChange' => false,
            //'enableClientValidation' => true,
            'fieldConfig' => ['template' => "{input}{error}"],
//            'options' => ['enctype' => 'multipart/form-data']
        ]);
?>

<?= $form->field($model, 'name', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Training Name']])->textInput()->label(true); ?>
<?= $form->field($model, 'training_type', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Training Type']])->textInput()->label(true); ?>
<?= $form->field($model, 'duration', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Training Duration']])->textInput()->label(true); ?>
<?= $form->field($model, 'fee', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Training Fee']])->textInput()->label(true); ?>
<?= $form->field($model, 'mode_of_training', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Mode of Training']])->textInput()->label(true); ?>
<?= $form->field($model, 'detail', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Training Detail']])->textarea(['rows' => '6'])->label(true); ?>
<?= $form->field($model, 't_id', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'training id']])->hiddenInput(); ?>

<?= Html::submitButton('Submit', ['class' => 'btn']) ?>

<?php $form->end(); ?>