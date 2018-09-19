<?php

use backend\assets\AdminAsset;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model backend\models\CategoryForm */

AdminAsset::register($this);

$this->title = 'E-shopper';
$this->registerMetaTag([
    'name' => 'E-shopper',
    'content' => 'E-shopper main page',
]);
?>

<section>
    <div class="container">
        <div class="breadcrumbs">
            <?php echo Breadcrumbs::widget([
                'itemTemplate' => "<li>{link}</li>\n",
                'links' => [
                    ['label' => 'Админпанель', 'url' => ['/']],
                    [
                        'label' => 'Редактирование бренда',
                        'class' => 'breadcrumb',
                    ],
                ],
            ]);
            ?>
        </div>

        <?= $this->render('_form', [
            'model' => $model,
        ]);
        ?>

    </div>
</section>