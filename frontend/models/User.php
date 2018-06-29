<?php

namespace frontend\models;

use Yii;

class User
{
    /**
     * Запоминаем пользователя
     * @param integer $userId <p>id пользователя</p>
     */
    public static function auth($userId)
    {
        // Записываем идентификатор пользователя в сессию
        $_SESSION['user'] = $userId;
    }

    /**
     * Возвращает идентификатор пользователя, если он авторизирован.<br/>
     * Иначе перенаправляет на страницу входа
     * @return string <p>Идентификатор пользователя</p>
     */
    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset(Yii::$app->session['user'])) {
            return Yii::$app->session['user'];
        } else {
            Yii::$app->response->redirect(['user/login']);
        }
    }

    /**
     * Проверяет является ли пользователь гостем
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Удаляем из сессии id пользователя
     * и перенаправляем на главную
     */
    public static function checkLogout()
    {
        unset($_SESSION['user']);
        Yii::$app->response->redirect(['/']);
    }
    
}