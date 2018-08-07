<?php
namespace frontend\models;

use yii\base\Model;

class AddressBook extends Model
{
    public $id;
    public $customer_id;
    public $lastname;
    public $gender;
    public $company;
    public $street_address;
    public $postcode;
    public $city;
    public $state;
    public $country_id;
    public $_api_time_modified;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_id', 'customer_id'], 'integer'],
            [['_api_time_modified'], 'safe'],
            [['lastname', 'gender'], 'string', 'min' => 1],
            [['company', 'city', 'state'], 'string', 'max' => 32],
            [['street_address'], 'string', 'max' => 64],
            [['postcode'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'lastname' => 'Lastname',
            'gender' => 'Gender',
            'company' => 'Company',
            'street_address' => 'Street Address',
            'postcode' => 'Postcode',
            'city' => 'City',
            'state' => 'State',
            'country_id' => 'Country ID',
            '_api_time_modified' => 'Api Time Modified',
        ];
    }
}
