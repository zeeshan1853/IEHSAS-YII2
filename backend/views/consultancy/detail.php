<?php

use yii\helpers\BaseUrl;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$baseUrl = BaseUrl::base();

?>
<h1>Add New Consultancy</h1>

<?php
$form = ActiveForm::begin([
            'id' => 'consultancyForm',
            'action' => $baseUrl . '/consultancy/detail',
            'enableAjaxValidation' => true,
            'validateOnBlur' => true,
            'validationUrl' => Yii::$app->urlManager->createUrl("consultancy/validate"),
            'validateOnChange' => false,
            //'enableClientValidation' => true,
            'fieldConfig' => ['template' => "{input}{error}"],
//            'options' => ['enctype' => 'multipart/form-data']
        ]);
?>

<?= $form->field($model, 'name', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Consultancy Name']])->textInput()->label(true); ?>
<?= $form->field($model, 'consultancy_type', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Consultancy Type']])->textInput()->label(true); ?>
<?= $form->field($model, 'detail', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Consultancy Detail']])->textarea(['rows' => '6'])->label(true); ?>
<?= $form->field($model, 'cons_id', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Consultancy id']])->hiddenInput(); ?>

<?= Html::submitButton('Submit', ['class' => 'btn']) ?>

<?php $form->end(); ?>