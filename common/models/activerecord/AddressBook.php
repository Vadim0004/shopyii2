<?php

namespace common\models\activerecord;

use frontend\models\AddressBook as AddressBookModel;

/**
 * This is the model class for table "address_book".
 *
 * @property int $id
 * @property int $customer_id
 * @property string $lastname
 * @property string $gender
 * @property string $company
 * @property string $street_address
 * @property string $postcode
 * @property string $city
 * @property string $state
 * @property int $country_id
 * @property string $_api_time_modified
 */
class AddressBook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{address_book}}';
    }

    /**
     * @param int $userId
     * @param AddressBookModel $addressBook
     * @return AddressBook
     */
    public function saveCustomerAddressBook(int $userId, AddressBookModel $addressBook): self
    {
        $saveAddressBook = new static();
        $saveAddressBook->customer_id = $userId;
        $saveAddressBook->lastname = $addressBook->lastname;
        $saveAddressBook->gender = $addressBook->gender;
        $saveAddressBook->company = $addressBook->company;
        $saveAddressBook->street_address = $addressBook->street_address;
        $saveAddressBook->postcode = $addressBook->postcode;
        $saveAddressBook->city = $addressBook->city;
        $saveAddressBook->state = $addressBook->state;
        $saveAddressBook->country_id = $addressBook->country_id;

        return $saveAddressBook;
    }

    public function saveAddressBookAfterEdite(AddressBook $addressBook, AddressBookModel $addressBookModel):self
    {
        $addressBook->lastname = $addressBookModel->lastname;
        $addressBook->gender = $addressBookModel->gender;
        $addressBook->company = $addressBookModel->company;
        $addressBook->street_address = $addressBookModel->street_address;
        $addressBook->postcode = $addressBookModel->postcode;
        $addressBook->city = $addressBookModel->city;
        $addressBook->state = $addressBookModel->state;
        $addressBook->country_id = $addressBookModel->country_id;

        return $addressBook;
    }
}
