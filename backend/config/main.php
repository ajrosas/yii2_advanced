<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            'class' => 'yii\web\DbSession',
            'writeCallback' => function ($session) {  
                return [ 
                   'user_id' => Yii::$app->user->id, 
                   'ip' => Yii::$app->request->getUserIp(),
                ];
            },
            // 'timeout' => 60 * 60 * 24 * 30 * 1, //session expire
            // 'sessionTable' => 'session', 

            'name' => 'advanced-backend', // this is the name of the session cookie used for login on the backend
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'assetManager' => [
            'forceCopy' => false,
            'linkAssets' => true,
            'appendTimestamp' => false,
            'class' => 'yii\web\AssetManager',
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'jsOptions' => ['position' => \yii\web\View::POS_HEAD],
                    'sourcePath' => '@backend/themes/keen_demo_1/assets/assetsfiles/plugins/global/', // to access Keen Theme core resources
                    'js' => ['plugins.bundle.js']
                ],  
                'yii\bootstrap4\BootstrapAsset' => [
                    'sourcePath' => '@backend/themes/keen_demo_1/assets/assetsfiles/plugins/global/', // to access Keen Theme core resources
                    'css' => ['plugins.bundle.css'],
                ],
            ]
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@backend/views' => [
                        '@backend/themes/keen_demo_1/views', 
                    ],
                    '@backend/widgets' => [
                        '@backend/themes/keen_demo_1/widgets', 
                    ],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'site/index',

                '<controller>/<action>/<id>' => '<controller>/<action>',
                '<controller>/<action>/' => '<controller>/<action>',
            ],
        ],
    ],
    'params' => $params,
];
