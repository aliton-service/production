<?php
/* @var $this EquipDetailsController */
/* @var $model EquipDetails */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'equip-details-form',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation' => true,
	'enableClientValidation' => true,
)); ?>

	<?php
	echo $form->labelEx($model,'item');
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'itemId',
		'Stretch' => true,
		'ModelName' => 'Equips',
		'Height' => 300,
		'Width' => 300,
		'KeyField' => 'Equip_id',
		'KeyValue' => $model->item,
		'FieldName' => 'EquipName',
		'Name' => 'EquipDetails[item]',
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => 'e.EquipName like \':Value%\'',
		),
		'Columns' => array(
			'EquipName' => array(
				'Name' => 'Наименование',
				'FieldName' => 'EquipName',
				'Width' => 300,

			),
		),
	));
	echo $form->error($model,'item');
	?>

	<div class="btn-group">
		<?php
		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'saveEqD',
			'Height' => 30,
			'Text' => 'Сохранить',
			'Type' => 'none',
			'OnAfterClick' => "saveEquipDetails()"
		));
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->