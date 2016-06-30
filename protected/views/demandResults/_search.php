<?php
/* @var $this DemandResultsController */
/* @var $model DemandResults */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Result_id'); ?>
		<?php echo $form->textField($model,'Result_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ResultName'); ?>
		<?php echo $form->textField($model,'ResultName',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->