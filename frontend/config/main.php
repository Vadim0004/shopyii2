<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'common\bootstrap\Setup',
        ],
    'language' => 'ru',
    'controllerNamespace' => 'frontend\controllers',
    'homeUrl' => '/',
    'components' => [
        'request' => [
            'baseUrl' => '',
            'csrfParam' => '_csrf-frontend',
            //'enableCsrfValidation' => false,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
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
        /*
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js'=>[]
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js'=>[]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
            ],
        ],
         * 
         */
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // Корзина:
                'cart/delete/<id:\d+>' => 'cart/delete', // actionDelete в CartController
                'cart/addajax/<id:\d+>' => 'cart/addajax', // actionAddAjax в CartController
                'cart/checkout' => 'cart/checkout', // actionCheckout in CartController
                'cart' => 'cart/index', // actionIndex в CartController
                // О магазине:
                'blog/<id:\d+>' => 'blog/view', // actionViews in BlogController
                'blog' => 'blog/index', // actionIndex in BlogController
                'about' => 'site/about', // actionAbout in SiteController 
                'contacts' => 'site/contact', // actionContact в SiteController
                // Пользователь: 
                'user/register' => 'user/register', // actionRegister в UserController
                'user/login' => 'user/login', // actionLogin в UserController
                'user/logout' => 'user/logout', // actionLogout в UserController
                'cabinet/editAddress' => 'cabinet/editaddressbook', // actionEditeAddressbook in CabinetController
                'cabinet/book' => 'cabinet/addaddressbook', // actionФddaddressbook in CabinetController
                'cabinet/history' => 'cabinet/history', // actionHistory in CabinetController
                'cabinet/edit' => 'cabinet/edit', // actionEdit в CabinetController
                'cabinet' => 'cabinet/index', // actionIndex в CabinetController
                // Продукты
                'product/<id:\d+>' => 'product/index', // ProductController in actionIndex
                // Категории товаров:
                'category/<categoryId:\d+>/page-<page:\d+>' => 'syte/category', // actionCategory в CatalogController
                'category' => 'catalog/index', // actionIndex в CatalogController
                // Главная страница:
                '/page/<page:\d+>/' => 'syte/index', // SyteController in actionIndex
                '/' => 'syte/index', // SyteController in actionIndex
            ],
        ],
    ],
    'params' => $params,
    'aliases' => [
        '@images' => '/frontend/web/upload/images/products',
    ] 
];
