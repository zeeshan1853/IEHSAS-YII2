<?php

use yii\helpers\BaseUrl;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$baseUrl = BaseUrl::base();

?>
<h1>Add New Course</h1>

<?php
$form = ActiveForm::begin([
            'id' => 'courseForm',
            'action' => $baseUrl . '/course/new-course',
            'enableAjaxValidation' => true,
            'validateOnBlur' => true,
            'validationUrl' => Yii::$app->urlManager->createUrl("course/validate"),
            'validateOnChange' => false,
            //'enableClientValidation' => true,
            'fieldConfig' => ['template' => "{input}{error}"],
//            'options' => ['enctype' => 'multipart/form-data']
        ]);
?>

<?= $form->field($model, 'name', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Course Name']])->textInput()->label(true); ?>
<?= $form->field($model, 'course_type', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Course Type']])->textInput()->label(true); ?>
<?= $form->field($model, 'duration', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Course Duration']])->textInput()->label(true); ?>
<?= $form->field($model, 'fee', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Course Fee']])->textInput()->label(true); ?>
<?= $form->field($model, 'mode_of_study', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Mode of study']])->textInput()->label(true); ?>
<?= $form->field($model, 'detail', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Course Detail']])->textarea(['rows' => '6'])->label(true); ?>

<?= Html::submitButton('Submit', ['class' => 'btn']) ?>

<?php $form->end(); ?>