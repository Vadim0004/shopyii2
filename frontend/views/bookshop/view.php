<?php
/* @var $this yii\web\View */
/* @book[] frontend\models\Book Model ActiveRecord*/
?>

<?php foreach ($book as $bookItem): ?>
    <h4><?php echo $bookItem->name; ?></h4>
    <p><?php echo $bookItem->isbn; ?></p>
    <p><?php echo $bookItem->getDatePublish(); ?></p>
    <p><?php echo $bookItem->getPublisherName(); ?></p>
    <p><?php echo $bookItem->getFullName(); ?></p>
    <?php var_dump($bookItem->getFullName())?>
    <hr>
<?php endforeach; ?>