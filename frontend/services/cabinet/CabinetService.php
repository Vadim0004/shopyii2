<?php

namespace frontend\services\cabinet;

use frontend\models\repository\AddressBookRepository as AddressBookRepository;
use common\models\activerecord\AddressBook;
use Yii;

class CabinetService
{
    private $addressBookRepository;
    private $addressBook;

    public function __construct(
        AddressBook $addressBook,
        AddressBookRepository $addressBookRepository)
    {
        $this->addressBookRepository = $addressBookRepository;
        $this->addressBook = $addressBook;
    }

    public function addCustomerDetails(int $userId,  $form)
    {
        $form = $this->addressBook->saveCustomerAddressBook($userId, $form);
        $formSave = $this->addressBookRepository->save($form);
        if ($formSave) {
            return Yii::$app->getSession()->setFlash('success', 'Данные сохранены');
        }
    }
}