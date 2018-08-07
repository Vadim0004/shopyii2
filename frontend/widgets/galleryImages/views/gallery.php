<?php
use yii\helpers\Url;
$path = Url::base(true)
?>

<div class="row">
	<div class="jcarousel-wrapper">
		<div class="jcarousel">
			<ul>
				<li><img src="<?php echo $path . '/frontend/web/upload/images/products/33.jpg'?>" width="1000" height="500" alt=""></li>
				<li><img src="<?php echo $path . '/frontend/web/upload/images/products/34.jpg'?>" width="1000" height="500" alt=""></li>
				<li><img src="<?php echo $path . '/frontend/web/upload/images/products/35.jpg'?>" width="1000" height="500" alt=""></li>
			</ul>
		</div>

		<p class="photo-credits">
			Photos by <a href="http://www.mw-fotografie.de">Marc Wiegelmann</a>
		</p>

		<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
		<a href="#" class="jcarousel-control-next">&rsaquo;</a>

		<p class="jcarousel-pagination">

		</p>
	</div>
</div>