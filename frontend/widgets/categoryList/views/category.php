<?php 
$categoryServerId = end(explode('/', $_SERVER['REQUEST_URI']));
?>

<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Каталог</h2>
        <div class="panel-group category-products">
            <?php foreach ($categories as $categoryItem): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="<?php echo Yii::$app->urlManager->createUrl(['syte/category', 'categoryId' => $categoryItem['id']]); ?>" 
                               class="<?php if ($categoryServerId == $categoryItem['id']) echo 'active'; ?>"
                               >
                                <?php echo $categoryItem['name']; ?>
                            </a>
                        </h4>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>