<?php

$config = [
    'id' => 'app',
    'defaultRoute' => 'site/index',
    'components' => [
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['admin/default/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
        ],
        'request' => [
            'class' => 'app\components\LangRequest'
        ],
        'urlManager' => [
            'class' => 'app\components\LangUrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                '<action:(about|contacts)>' => 'site/<action>',
                '<action:(login|signup|logout)>' => 'admin/default/<action>',
                'images/<size:(big|normal|small|slider)>/<id:\d+>.jpg' => 'image/photo', // /image/big/1.jpg
                'property/<id:\d+>' => 'property/index',
                'offer/<code:([a-z0-9]+?)>' => 'offer/index'
            ],
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
