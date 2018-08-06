<?php

namespace frontend\services\cabinet;

use frontend\models\repository\AddressBookRepository as AddressBookRepository;
use common\models\activerecord\AddressBook;
use frontend\models\repository\CountriesRepository;
use Yii;

class CabinetService
{
    private $addressBookRepository;
    private $countriesRepository;
    private $addressBook;

    public function __construct(
        AddressBook $addressBook,
        AddressBookRepository $addressBookRepository,
        CountriesRepository $countriesRepository)
    {
        $this->addressBookRepository = $addressBookRepository;
        $this->countriesRepository = $countriesRepository;
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

    public function editCustomerDetails(int $userId,  $form)
    {
        $addressBook = $this->addressBookRepository->getAddressBook($userId);
        $addressBookUpdate = $this->addressBook->saveAddressBookAfterEdite($addressBook, $form);
        $addressBookSave = $this->addressBookRepository->save($addressBookUpdate);
        if ($addressBookSave) {
            return Yii::$app->getSession()->setFlash('success', 'Данные сохранены');
        }
    }

    public function countriesListAll()
    {
        $countriesList = $this->countriesRepository->getAllCountries();
        return $countriesList;
    }

    public function getListAddressBook(int $userId)
    {
        $addressBook = $this->addressBookRepository->getAddressBook($userId);
        return $addressBook;
    }
}