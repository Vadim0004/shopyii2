<?php

namespace common\bootstrap;

use frontend\services\syte\SyteService;
use yii\base\BootstrapInterface;

class SetUp implements BootstrapInterface
{
    public function bootstrap($app) 
    {
        $container = \Yii::$container;
        $container->setSingleton(SyteService::class, [], [
            $app->params['adminEmail'],
            $app->params['letterTheme'],
        ]);
    }
}
