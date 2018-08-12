<?php

namespace frontend\services\user;

use frontend\models\UserRegister;
use frontend\models\repository\UserRepository;
use common\models\activerecord\User;
use frontend\models\repository\ProductRepository;
use frontend\models\repository\AddressBookRepository;
use Yii;

class UserService
{
    private $userRepository;
    private $userActiveRecord;
    private $productRepository;
    private $addressBookRepository;

    public function __construct(User $userActiveRecord,
                                UserRepository $userRepository,
                                ProductRepository $productRepository,
                                AddressBookRepository $addressBookRepository)
    {
        $this->productRepository = $productRepository;
        $this->userActiveRecord = $userActiveRecord;
        $this->userRepository = $userRepository;
        $this->addressBookRepository = $addressBookRepository;
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

    /**
     * @return array activeRecord
     */
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
        $customer = $this->userRepository->getUserById($userId);
        $userResult = $this->userActiveRecord->saveUserAfterEdite($customer, $user);
        $userSave = $this->userRepository->save($userResult);

        return $userSave;
    }

    public function getOrders(int $orderId)
    {
        $result = $this->userRepository->getOrdersById($orderId);

        return $result;
    }

    public function getProductsJsDecode(array $products)
    {
        $productArray = [];

        foreach ($products as $item) {
            foreach ($item['productOrdersById'] as $value) {
                $decode = json_decode($value['products'], true);
                $product = array_keys($decode);
                $productArray[$value['id']] = $this->productRepository->getAllProductById($product);
            }
        }

        return $productArray;
    }

    public function getDecodeProducts(array $products)
    {
        $decode = [];
        foreach ($products as $item) {
            foreach ($item['productOrdersById'] as $value) {
                $decode[$value['id']] = json_decode($value['products'], true);
            }
        }

        return $decode;
    }

    public function getAddressBook(User $user)
    {
        $addressBook = $this->addressBookRepository->getAddressBook($user->id);
        return $addressBook;
    }
}
