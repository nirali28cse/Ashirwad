<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Ashirvad extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/ashirvad';
	

    public $css = [
        'css/bootstrap.css',
        'css/flexslider.css',
        'css/font-awesome.css',
        'css/style.css',
        'css/chocolat.css',
    ];
    public $js = [

/* 	    'js/jquery-2.1.4.min.js',
		'js/bootstrap-3.1.1.min.js',  */
	    'js/responsiveslides.min.js',
	    'js/modernizr.custom.79639.js',
	    'js/jquery.chocolat.js',
	    'js/jquery.flexslider.js',
	    'js/move-top.js',
		'js/easing.js',
		'js/jarallax.js',
		'js/SmoothScroll.min.js',
		'js/ashirvad.js',
    ];
/*     public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ]; */
}
