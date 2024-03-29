<?php

use yii\caching\FileCache;
use yii\swiftmailer\Mailer;
use yii\log\FileTarget;
use yii\gii\Module;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'EpRlMxmn_MurR5isCxObXqr8BH_iXb_H',
        ],
        'cache' => [
            'class' => FileCache::class,
        ],
        'user' => [
            'identityClass' => \app\models\User::class,
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'error/error',
        ],
        'mailer' => [
            'class' => Mailer::class,
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'homepage/index',
                'login' => 'security/login',
                'register' => 'security/register',
                'logout' => 'security/logout',

                'articles/<id:\d+>/edit' => 'article/update',
                'articles/<id:\d+>/delete' => 'article/delete',
                'articles/<id:\d+>' => 'article/view',
                'articles/create' => 'article/create',
                'articles' => 'article/index',
                
                'categories/<id:\d+>/edit' => 'category/update',
                'categories/<id:\d+>/delete' => 'category/delete',
                'categories/create' => 'category/create',
                'categories' => 'category/index',

//                'POST <controller:[\w-]+>' => '<controller>/create',
//                '<controller:[\w-]+>s' => '<controller>/index',
//                'PUT <controller:[\w-]+>/<id:\d+>'    => '<controller>/update',
//                'DELETE <controller:[\w-]+>/<id:\d+>' => '<controller>/delete',
//                '<controller:[\w-]+>/<id:\d+>'        => '<controller>/view',
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => \yii\debug\Module::class,
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => Module::class,
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
