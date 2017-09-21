<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Description of HomeAssests
 *
 * @author WhiteHat
 */
class HomeAssets extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/home.css',
        'font-awesome-4.7.0/css/font-awesome.min.css',
        'css/owl.carousel.css',
        'css/formats.css',
        'css/animate.min.css',
        'limarquee/css/liMarquee.css',
    ];
    public $js = [
        'limarquee/js/jquery.liMarquee.js',
        'js/owl.carousel.js',
        'js/home.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
