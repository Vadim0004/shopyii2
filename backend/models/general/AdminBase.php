<?php

namespace backend\models\general;

use frontend\models\User;
use frontend\models\repository\UserRepository;
use Yii;

trait AdminBase
{
    public static function checkAdmin()
    {
        $userId = User::checkLogged();
        if ($userId) {
            $userGet = new UserRepository();
            $user = $userGet->getUserById($userId);
            if ($user['role'] == 'admin') {
                return true;
            } else {
                die('Access denied');
            }
        } else {
            die('Access denied');
        }
    }
}