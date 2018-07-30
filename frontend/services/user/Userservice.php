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
            $user = $this->userActiveRecord->saveUserAfterRegister($user->name, $user->email, $user->password);
            $this->userRepository->save($user);
        } else {
            throw new \DomainException('This user already exist, please try another email');
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

    public function getUserBySession()
    {
	    $userId = \frontend\models\User::checkLogged();
	    $userData = $this->userRepository->getUserById($userId);

	    if ($userData) {
	    	return $userData;
	    } else {
		    throw new \DomainException('Acess denided? dont find user.');
	    }
    }

    public function editeUserAndSave(int $userId, UserRegister $user)
    {
	    $userResult = $this->userActiveRecord->saveUserAfterEdite($userId, $user->name, $user->password);

	    return $userResult;
    }
}
