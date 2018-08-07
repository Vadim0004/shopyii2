<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

?>
<section>
	<div class="container">
		<div class="row">
            <?php echo '<b>' . 'Привет' . ' ' . $userData->name . '</b>'; ?>
		</div>
		<div class="row">
			<div class="col-sm-3">
                <?= Html::beginForm([Url::to('cabinet/addaddressbook')], 'post'); ?>

                <?php echo $formAttrLable['lastname']; ?>
                	<?= Html::activeInput('varchar', $form, 'lastname', ['class' => 'form-control']) . '<br>'; ?>
                		<?php if ($form->hasErrors()): ?>
                    		<?= Html::error($form, 'lastname', ['class' => 'alert alert-danger']) ?>
                		<?php endif; ?>

                <?php echo $formAttrLable['gender']; ?>
                	<?= Html::activeInput('varchar', $form, 'gender', ['class' => 'form-control']) . '<br>'; ?>
                		<?php if ($form->hasErrors()): ?>
                    		<?= Html::error($form, 'gender', ['class' => 'alert alert-danger']) ?>
                		<?php endif; ?>

                <?php echo $formAttrLable['company']; ?>
                	<?= Html::activeInput('varchar', $form, 'company', ['class' => 'form-control']) . '<br>'; ?>
                		<?php if ($form->hasErrors()): ?>
                    		<?= Html::error($form, 'company', ['class' => 'alert alert-danger']) ?>
                		<?php endif; ?>
			</div>

			<div class="col-sm-3">
                <?php echo $formAttrLable['street_address']; ?>
                	<?= Html::activeInput('varchar', $form, 'street_address', ['class' => 'form-control']) . '<br>'; ?>
                		<?php if ($form->hasErrors()): ?>
                    		<?= Html::error($form, 'street_address', ['class' => 'alert alert-danger']) ?>
                		<?php endif; ?>

                <?php echo $formAttrLable['postcode']; ?>
					<?= Html::activeInput('varchar', $form, 'postcode', ['class' => 'form-control']) . '<br>'; ?>
						<?php if ($form->hasErrors()): ?>
                    		<?= Html::error($form, 'postcode', ['class' => 'alert alert-danger']) ?>
                		<?php endif; ?>

                <?php echo $formAttrLable['city']; ?>
                	<?= Html::activeInput('varchar', $form, 'city', ['class' => 'form-control']) . '<br>'; ?>
                		<?php if ($form->hasErrors()): ?>
                    		<?= Html::error($form, 'city', ['class' => 'alert alert-danger']) ?>
                		<?php endif; ?>
			</div>

			<div class="col-sm-3 padding-right">
                <?php echo $formAttrLable['state']; ?>
                	<?= Html::activeInput('varchar', $form, 'state', ['class' => 'form-control']) . '<br>'; ?>
                		<?php if ($form->hasErrors()): ?>
                    		<?= Html::error($form, 'state', ['class' => 'alert alert-danger']) ?>
                		<?php endif; ?>

                <?php echo $formAttrLable['country_id']; ?>
                <?= Html::activeDropDownList($form, 'country_id', ArrayHelper::map($countriesList, 'id', 'countries_name'), ['class' => 'form-control']) . '<br>' ?>
			</div>
		</div>
		<div class="row">
            <?= Html::submitButton('Подтвердить', ['class' => 'btn btn-primary']); ?>

            <?= Html::endForm(); ?>
		</div>
	</div>
</section>