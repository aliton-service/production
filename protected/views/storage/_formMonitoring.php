<div class="form form-options">
	<div>

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'repairs-form',
			'htmlOptions'=>array(
				'class'=>'form-inline'
			),
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			'enableAjaxValidation'=>false,
		)); ?>



		<?php
		$this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
			'id' => 'cmb-demand-priors',
			'popupid' => 'cmb-demand-priors-grid',
			'data' =>MonitoringDemandPriors::getData(),
			'label' => 'Приоритет',
			'fieldname' => 'Prior',
			'keyfield' => '$DemandPrior_id',
			'name' => 'MonitoringDemands[Prior]',
			'width' => -1,
			'popupwidth' => 300,
			'showcolumns' => true,

			'columns' => array(
				'Address' => array(
					'name' => 'Приоритет',
					'fieldname' => 'Prior',
					'width' => 300,
					'height' => 23,
				),
			),

		));
		?>

		<?php
		$this->widget('application.extensions.alitonwidgets.datepicker.aldatepicker', array(
			'name' => 'MonitoringDemands[WishDate]',
			'label' => 'Желаемая дата: ',
		));
		?>
	</div>
	<hr>
	<div>
		<?php echo $form->labelEx($model, 'Примечание') ?>
		<?php echo $form->textArea($model,'Note',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'Note'); ?>
	</div>

	<?php $this->endWidget(); ?>