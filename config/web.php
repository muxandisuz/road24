<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'container' => [
        'singletons' => [
            \yii\mail\MailerInterface::class => [
                'class' => \yii\symfonymailer\Mailer::class,
                // send all mails to a file by default.
                'useFileTransport' => true,
                'viewPath' => '@app/mail',
            ],
        ],
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '7X7pWDNASp79HjqvV2faTphlbRMbwaFI',
            'enableCsrfValidation' => false,
            'parsers' => [
                'application/json' => [
                    'class' => 'yii\web\JsonParser',
                    'asArray' => true,
                ],
            ],
        ],
        'response' => [
            'format' => \yii\web\Response::FORMAT_JSON,
        ],
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'user' => [
            'identityClass' => \app\models\User::class,
            'enableAutoLogin' => false,
            'enableSession' => false,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\symfonymailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'dsn' => 'smtp://'
                    . rawurlencode('muxandisuz@gmail.com')
                    . ':'
                    . rawurlencode('ybdxpilwosmzcnsw')
                    . '@smtp.gmail.com:587',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'user',
                        'car',
                        'brand',
                        'model',
                        'color'
                    ],
                ],
                [
                    'class' => 'yii\web\UrlRule',
                    'pattern' => 'reference/<slug:[a-z-]+>',
                    'route' => 'reference/index',
                    'verb' => ['GET'],
                ],
                [
                    'class' => 'yii\web\UrlRule',
                    'pattern' => 'reference/<slug:[a-z-]+>',
                    'route' => 'reference/create',
                    'verb' => ['POST'],
                ],
                [
                    'class' => 'yii\web\UrlRule',
                    'pattern' => 'reference/<slug:[a-z-]+>/<id:\d+>',
                    'route' => 'reference/view',
                    'verb' => ['GET'],
                ],
                [
                    'class' => 'yii\web\UrlRule',
                    'pattern' => 'reference/<slug:[a-z-]+>/<id:\d+>',
                    'route' => 'reference/update',
                    'verb' => ['PUT', 'PATCH'],
                ],
                [
                    'class' => 'yii\web\UrlRule',
                    'pattern' => 'reference/<slug:[a-z-]+>/<id:\d+>',
                    'route' => 'reference/delete',
                    'verb' => ['DELETE'],
                ],
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
        'class' => \yii\gii\Module::class,
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
