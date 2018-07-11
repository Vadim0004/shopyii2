<?php

namespace common\bootstrap;

use frontend\services\syte\SyteService;
use yii\base\BootstrapInterface;
use frontend\models\Contact;

class SetUp implements BootstrapInterface
{
    public function bootstrap($app) 
    {
        $container = \Yii::$container;
        $container->setSingleton(SyteService::class, [], [
            $app->params['adminEmail'], 
            \yii\di\Instance::of(Contact::class), 
            $app->params['letterTheme'],
        ]);
    }
}
