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
    'bootstrap' => [
        'log',
        'common\bootstrap\Setup',
        ],
    'language' => 'ru',
    'modules' => [],
    'homeUrl' => '/admin',
    'components' => [
        'request' => [
            'baseUrl'=>'/admin',
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-frontend',
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // Админ заказы :
                '/order/view/<id:\d+>' => 'order/view',
                '/order/delete/<id:\d+>' => 'order/delete',
                '/order/create' => 'order/create',
                '/order' => 'order/index',
                // Админ категории :
                '/category/deleteAjax' => 'category/delete-ajax',
                '/category/delete/<id:\d+>' => 'category/delete',
                '/category/update/<id:\d+>' => 'category/update',
                '/category/create' => 'category/create',
                '/category' => 'category/index',
                // Админ бренды :
                '/brand/update/<id:\d+>' => 'brand/update',
                '/brand/create' => 'brand/create',
                '/brand' => 'brand/index',
                // Админ товары :
                '/product/deleteAjax' => 'product/delete-ajax',
                '/product/delete/<id:\d+>' => 'product/delete',
                '/product/update/<id:\d+>' => 'product/update',
                '/product/create' => 'product/create',
                '/product/page/<page:\d+>' => 'product/index',
                '/product' => 'product/index',
                // Админ панель:
                '/' => 'site/index',
            ],
        ],
    ],
    'params' => $params,
    'aliases' => [
        '@images' => '/frontend/web/upload/images/products',
    ]
];
