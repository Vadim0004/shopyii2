<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

?>

<div class="row">
    <div class="col-sm-3">
        <?= Html::beginForm([Url::to('cabinet/editaddressbook')], 'post'); ?>
        <?php echo $formAttrLable['lastname']; ?>
        <?= Html::input('varchar', 'lastname', $addressBook->lastname, ['class' => 'form-control']) . '<br>' ?>
        <?php echo $formAttrLable['gender']; ?>
        <?= Html::input('varchar', 'gender', $addressBook->gender, ['class' => 'form-control']) . '<br>' ?>
        <?php echo $formAttrLable['company']; ?>
        <?= Html::input('varchar', 'company', $addressBook->company, ['class' => 'form-control']) . '<br>' ?>
    </div>
    <div class="col-sm-3">
        <?php echo $formAttrLable['street_address']; ?>
        <?= Html::input('varchar', 'street_address', $addressBook->street_address, ['class' => 'form-control']) . '<br>' ?>
        <?php echo $formAttrLable['postcode']; ?>
        <?= Html::input('varchar', 'postcode', $addressBook->postcode, ['class' => 'form-control']) . '<br>' ?>
        <?php echo $formAttrLable['city']; ?>
        <?= Html::input('varchar', 'city', $addressBook->city, ['class' => 'form-control']) . '<br>' ?>
    </div>
    <div class="col-sm-3">
        <?php echo $formAttrLable['state']; ?>
        <?= Html::input('varchar', 'state', $addressBook->state, ['class' => 'form-control']) . '<br>' ?>
        <?php echo $formAttrLable['country_id']; ?>
        <?= Html::DropDownList('country_id', $countriesList, ArrayHelper::map($countriesList, 'id', 'countries_name'), ['class' => 'form-control']) . '<br>' ?>
    </div>
</div>
<div class="row">
    <?= Html::submitButton('Подтвердить', ['class' => 'btn btn-primary']); ?>
    <?= Html::endForm(); ?>
</div>


