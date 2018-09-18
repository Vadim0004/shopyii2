<?php

use backend\assets\AdminAsset;

AdminAsset::register($this);


// @var $this yii\web\View
$this->title = 'E-shopper';
$this->registerMetaTag([
    'name' => 'E-shopper',
    'content' => 'E-shopper main page',
]);
?>

<section>
    <div class="row">
        <?php foreach ($brand as $brandItem): ?>
            <p><?php echo $brandItem->name; ?></p>
            <p><?php echo $brandItem->slug; ?></p>
            <h5>SEO</h5>
            <p><?php echo $brandItem->meta->title; ?></p>
            <p><?php echo $brandItem->meta->description; ?></p>
            <p><?php echo $brandItem->meta->keywords; ?></p>
        <?php endforeach; ?>
    </div>
</section>
