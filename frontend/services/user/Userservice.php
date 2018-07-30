<?php

namespace frontend\services\user;

use frontend\models\UserRegister;
use frontend\models\repository\Userrepository;
use common\models\activerecord\User;
use Yii;

class Userservice
{
    private $userRepository;
    private $userActiveRecord;


    public function __construct(User $userActiveRecord, Userrepository $userRepository) 
    {
        $this->userActiveRecord = $userActiveRecord;
        $this->userRepository = $userRepository;
    }

    public function registerCustomer(UserRegister $user)
    {
        $userInDbIsset = $this->userRepository->checkExistEmailInDb($user->email);
        if (!$userInDbIsset) {
            $this->userActiveRecord->saveUserAfterRegister($user->name, $user->email, $user->password);
        } else {
            throw new \DomainException('Error saving user.');
        }     
    }
    
    public function loginCustomer(UserRegister $user)
    {
        $userId = $this->userRepository->checkUserData($user->email, $user->password);
        if ($userId) {
            Yii::$app->session['user'] = $userId;
        } else {
            throw new \DomainException('Acess denided? wrong data.');
        }
    }
}
