<?php

use frontend\assets\MyShopAsset;

MyShopAsset::register($this);

// @var $this yii\web\View
$this->title = 'Blog';
$this->registerMetaTag([
    'name' => 'Blog',
    'content' => 'description of the page',
]);
?>

<div class="page">
    <div class="container">
        <div class="row">
            <?php foreach ($blogList as $blogItem): ?>
                <div class="post">
                    <h2 class="title"><a href="<?php echo Yii::$app->urlManager->createUrl(['blog/view', 'id' => $blogItem['id']]); ?>"><?php echo '# ' . $blogItem['id'] . ' ' .$blogItem['title']; ?></a></h2>
                    <p class="byline"><?php echo $blogItem['date']; ?></p>
                    <div class="entry">
                        <p><?php echo $blogItem['short_content']; ?></p>
                    </div>
                    <div class="meta">
                        <p class="links"><a href="<?php echo Yii::$app->urlManager->createUrl(['blog/view', 'id' => $blogItem['id']]); ?>" class="comments">Read more</a></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>        
    </div>