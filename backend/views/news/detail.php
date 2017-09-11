<?php

use yii\helpers\BaseUrl;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$baseUrl = BaseUrl::base();

?>
<h1>Add New News</h1>

<?php
$form = ActiveForm::begin([
            'id' => 'newsForm',
            'action' => $baseUrl . '/news/detail',
            'enableAjaxValidation' => false,
            'validateOnBlur' => true,
            'validateOnChange' => false,
            //'enableClientValidation' => true,
            'fieldConfig' => ['template' => "{input}{error}"],
//            'options' => ['enctype' => 'multipart/form-data']
        ]);
?>

<?= $form->field($model, 'detail', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'News detail']])->textInput(); ?>
<?= $form->field($model, 'news_date', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'News date']])->textInput(); ?>
<?= $form->field($model, 'link', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Link of news']])->textInput(); ?>
<?= $form->field($model, 'n_id')->hiddenInput(); ?>

<?= Html::submitButton('Submit', ['class' => 'btn']) ?>

<?php $form->end(); ?>