<?php

namespace backend\themes\keen_demo_1\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class ThemeAsset extends AssetBundle
{
    // public $basePath = '@webroot'; 
    public $sourcePath = '@backend/themes/keen_demo_1/assets/assetsfiles';
    public $baseUrl = '@web';
    public $css = [   
        'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700',
        'plugins/custom/prismjs/prismjs.bundle.css',
        'css/style.bundle.css',

        'css/themes/layout/header/base/dark.css',
        'css/themes/layout/header/menu/dark.css',
        'css/themes/layout/brand/dark.css',
        'css/themes/layout/aside/dark.css',

        'custom/custom.css',

    ];
    public $js = [    
        'plugins/custom/prismjs/prismjs.bundle.js',
        'js/scripts.bundle.js', 
                
        'custom/custom.js',

    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ]; 

    // public $jsOptions = [
    //     'position' => \yii\web\View::POS_HEAD,  
    //     // 'defer' => 'defer',
    //     // 'async' => 'async',
    // ];
}
