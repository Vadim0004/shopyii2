<?php

namespace frontend\models\repository;

use common\models\activerecord\Countries;

class CountriesRepository
{
    /**
     * @return Countries[] ActiveQuery
     */
    public function getAllCountries()
    {
        $countries = Countries::find()->asArray()->all();
        return $countries;
    }
}