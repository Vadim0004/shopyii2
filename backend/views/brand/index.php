<?php

use backend\assets\AdminAsset;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\bootstrap\Modal;

AdminAsset::register($this);


/* @var $this yii\web\View */
/* @var $brand backend\controllers\BrandController array ActiveRecord*/

$this->registerJsFile('@web/js/brand/popup.js', ['depends' => [
    AdminAsset::className()
]]);

$this->title = 'E-shopper';
$this->registerMetaTag([
    'name' => 'E-shopper',
    'content' => 'E-shopper main page',
]);
?>

<section>

    <?php
    Modal::begin([
        'header' => '<h2>Hello world</h2>',
        'id' => 'modal',
        'size' => 'modal-lg',
    ]);

    echo "<div id='modalContent'></div>";

    Modal::end();

    ?>

    <div class="breadcrumbs">
    <?php echo Breadcrumbs::widget([
        'itemTemplate' => "<li>{link}</li>\n",
        'links' => [
            ['label' => 'Админпанель', 'url' => ['/']],
            [
                'label' => 'Управление брендами',
                'class' => 'breadcrumb',
            ],
        ],
    ]);
    ?>
    </div>

    <a href="<?php echo Url::to(['brand/create'])?>" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить Бранд</a>

    <h4>Список брендов</h4>

    <br>

    <div class="row">
        <table class="table-bordered table-striped table">
            <tr>
                <th>Id бренда</th>
                <th>Название бренда</th>
                <th>Slug</th>
                <th>SEO title</th>
                <th>SEO keywords</th>
                <th>SEO description</th>
                <th>Редактирвоание</th>
                <th>Удаление</th>
            </tr>
            <?php foreach ($brand as $brandItem): ?>
            <tr>
                <td><?php echo $brandItem->id; ?></td>
                <td><?php echo $brandItem->name; ?></td>
                <td><?php echo $brandItem->slug; ?></td>
                <td><?php echo $brandItem->meta->title; ?></td>
                <td><?php echo $brandItem->meta->keywords; ?></td>
                <td><?php echo $brandItem->meta->description; ?></td>
                <td><a href="<?php echo Url::to(['brand/update', 'id' => $brandItem->id]); ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                <td><a href="<?php echo Url::to(['brand/delete', 'id' => $brandItem->id]); ?>" title="Удалить" id="openPopup"><i class="fa fa-times"></i></a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</section>
