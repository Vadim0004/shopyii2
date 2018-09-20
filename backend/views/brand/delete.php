<?php

use backend\assets\AdminAsset;
use yii\helpers\Url;

/* @var $this yii\web\View */

AdminAsset::register($this);

$this->title = 'E-shopper';
$this->registerMetaTag([
    'name' => 'E-shopper',
    'content' => 'E-shopper main page',
]);
?>

<section>
    <div class="container">
        <a href="<?php echo Url::to(['brand/delete', 'id' => $brandItem->id]); ?>" title="Удалить" class="modalButton">Удалить</a>
    </div>
</section>