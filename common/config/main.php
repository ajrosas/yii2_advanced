<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ], 
        'AccessControl' => [
            'class' => 'common\components\AccessControl'
        ], 
        'Navigation' => [
            'class' => 'common\components\Navigation'
        ], 
    ],
];
