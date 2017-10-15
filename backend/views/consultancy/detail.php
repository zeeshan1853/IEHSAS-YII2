<?php

use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$baseUrl = BaseUrl::base();

if (!isset($model->banner_img) || $model->banner_img === NULL || $model->banner_img === '') {
    $banner_url = Url::to('@web/images/default_banner.png');
} else {
    $banner_url = Url::to('@web/uploads/' . $model->banner_img);
}
if (!isset($model->thumbnail_img) || $model->thumbnail_img === NULL || $model->thumbnail_img === '') {
    $thumbnail_url = Url::to('@web/images/default_thumbnail.png');
} else {
    $thumbnail_url = Url::to('@web/uploads/' . $model->thumbnail_img);
}
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
            'options' => ['enctype' => 'multipart/form-data']
        ]);
?>
<img src="<?= $banner_url ?>" class="img-responsive"  alt="" id="banner_img_preview"/>
<label for="logo">Upload Banner</label>
<?= $form->field($model, 'banner_img', ['inputOptions' => ['id' => 'banner_img', 'onchange' => 'banner_change(this)']])->fileInput() ?>
<img src="<?= $thumbnail_url ?>" class="img-responsive"  alt="" id="thumbnail_img_preview"/>
<label for="thumbnail_img">Upload Thumbnail Image</label>
<?= $form->field($model, 'thumbnail_img', ['inputOptions' => ['id' => 'thumbnail_img', 'onchange' => 'thumbnail_change(this)']])->fileInput() ?>
<?= $form->field($model, 'name', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Consultancy Name']])->textInput()->label(true); ?>
<?= $form->field($model, 'consultancy_type', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Consultancy Type']])->textInput()->label(true); ?>
<?= $form->field($model, 'detail', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Consultancy Detail']])->textarea(['rows' => '6'])->label(true); ?>
<?= $form->field($model, 'cons_id', ['inputOptions' => ['class' => 'form-control', 'placeholder' => 'Consultancy id']])->hiddenInput(); ?>

<?= Html::submitButton('Submit', ['class' => 'btn']) ?>

<?php $form->end(); ?>