<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Description of HomeAssests
 *
 * @author WhiteHat
 */
class DetailAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/easy-responsive-tabs.css',
        'css/detail.css',
        'font-awesome-4.7.0/css/font-awesome.min.css',
    ];
    public $js = [
        'js/responsiveslides.min.js',
        'js/easy-responsive-tabs.js',
        'js/jquery.flexslider.js',
        'js/detail.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}
