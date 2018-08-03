<?php

namespace frontend\models\repository;
use common\models\activerecord\AddressBook;

class AddressBookRepository
{
    public function save(AddressBook $addressBook)
    {
        if (!$addressBook->save()) {
            throw new \RuntimeException('Saving error. AddressBook');
        } else {
            return true;
        }
    }
}