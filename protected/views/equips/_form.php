<?php
/* @var $this EquipsController */
/* @var $model Equips */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'equips-form',
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
	echo $form->labelEx($model,'group_id');
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'eqipGroup',
		'Stretch' => true,
		'ModelName' => 'EqipGroups',
		'Height' => 300,
		'Width' => 300,
		'KeyField' => 'group_id',
		'KeyValue' => $model->group_id,
		'FieldName' => 'full_group_name',
		'Name' => 'Equips[group_id]',
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => 'eg.full_group_name like \':Value%\'',
		),
		'Columns' => array(
			'group_name' => array(
				'Name' => 'Наименование',
				'FieldName' => 'full_group_name',
				'Width' => 300,

			),
		),
	));
	echo $form->error($model,'group_id');

	echo $form->labelEx($model,'EquipName');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'EquipName',
		'Width' => 250,
		'Value' => $model->EquipName,
		'Type' => 'String',
		'Name' => 'Equips[EquipName]'
	));
	echo $form->error($model,'EquipName');

	echo $form->labelEx($model,'UnitMeasurement_Id');
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'ums',
		'Stretch' => true,
		'ModelName' => 'UnitMeasurement',
		'Height' => 300,
		'Width' => 300,
		'KeyField' => 'UnitMeasurement_Id',
		'KeyValue' => $model->UnitMeasurement_Id,
		'FieldName' => 'NameUnitMeasurement',
		'Name' => 'Equips[UnitMeasurement_Id]',
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => 'um.NameUnitMeasurement like \':Value%\'',
		),
		'Columns' => array(
			'group_name' => array(
				'Name' => 'Наименование',
				'FieldName' => 'NameUnitMeasurement',
				'Width' => 300,

			),
		),
	));
	echo $form->error($model,'UnitMeasurement_Id');

	echo $form->labelEx($model,'ServicingTime');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'ServicingTime',
		'Width' => 250,
		'Value' => $model->ServicingTime,
		'Type' => 'String',
		'Name' => 'Equips[ServicingTime]'
	));
	echo $form->error($model,'ServicingTime');

	echo $form->labelEx($model,'Supplier_id');
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'Suppliers',
		'Stretch' => true,
		'ModelName' => 'Suppliers',
		'Height' => 300,
		'Width' => 300,
		'KeyField' => 'Supplier_id',
		'KeyValue' => $model->Supplier_id,
		'FieldName' => 'NameSupplier',
		'Name' => 'Equips[Supplier_id]',
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => 's.NameSupplier like \':Value%\'',
		),
		'Columns' => array(
			'group_name' => array(
				'Name' => 'Наименование',
				'FieldName' => 'NameSupplier',
				'Width' => 300,

			),
		),
	));
	echo $form->error($model,'Supplier_id');

	echo $form->labelEx($model,'actp_id');
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'AccountingTypes',
		'Stretch' => true,
		'ModelName' => 'AccountingTypes',
		'Height' => 300,
		'Width' => 300,
		'KeyField' => 'actp_id',
		'KeyValue' => $model->actp_id,
		'FieldName' => 'name',
		'Name' => 'Equips[actp_id]',
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => 'at.name like \':Value%\'',
		),
		'Columns' => array(
			'group_name' => array(
				'Name' => 'Наименование',
				'FieldName' => 'name',
				'Width' => 300,

			),
		),
	));
	echo $form->error($model,'actp_id');

	echo $form->labelEx($model,'ctgr_id');
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'Categories',
		'Stretch' => true,
		'ModelName' => 'Categories',
		'Height' => 300,
		'Width' => 300,
		'KeyField' => 'ctgr_id',
		'KeyValue' => $model->ctgr_id,
		'FieldName' => 'name',
		'Name' => 'Equips[ctgr_id]',
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => 'c.name like \':Value%\'',
		),
		'Columns' => array(
			'group_name' => array(
				'Name' => 'Наименование',
				'FieldName' => 'name',
				'Width' => 300,

			),
		),
	));
	echo $form->error($model,'ctgr_id');

	echo $form->labelEx($model,'grp_id');
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'equipGroup',
		'Stretch' => true,
		'ModelName' => 'EquipGroups',
		'Height' => 300,
		'Width' => 300,
		'KeyField' => 'grp_id',
		'KeyValue' => $model->grp_id,
		'FieldName' => 'name',
		'Name' => 'Equips[grp_id]',
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => 'eg.name like \':Value%\'',
		),
		'Columns' => array(
			'group_name' => array(
				'Name' => 'Наименование',
				'FieldName' => 'name',
				'Width' => 300,

			),
		),
	));
	echo $form->error($model,'grp_id');

	echo $form->labelEx($model,'sgrp_id');
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'EquipSubgroups',
		'Stretch' => true,
		'ModelName' => 'EquipSubgroups',
		'Height' => 300,
		'Width' => 300,
		'KeyField' => 'sgrp_id',
		'KeyValue' => $model->sgrp_id,
		'FieldName' => 'name',
		'Name' => 'Equips[sgrp_id]',
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => 'esg.name like \':Value%\'',
		),
		'Columns' => array(
			'group_name' => array(
				'Name' => 'Наименование',
				'FieldName' => 'name',
				'Width' => 300,

			),
		),
	));
	echo $form->error($model,'discontinued');

	echo $form->labelEx($model,'discontinued');
	$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
		'id' => 'discontinued',
		'Name' => 'Equips[discontinued]',
		'Value' => DateTimeManager::YiiDateToAliton($model->discontinued),
	));
	echo $form->error($model,'discontinued');

	echo $form->labelEx($model,'SystemType_id');
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'SystemTypes',
		'Stretch' => true,
		'ModelName' => 'SystemTypes',
		'Height' => 300,
		'Width' => 300,
		'KeyField' => 'SystemType_Id',
		'KeyValue' => $model->SystemType_id,
		'FieldName' => 'SystemTypeName',
		'Name' => 'Equips[SystemType_id]',
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => 'st.SystemTypeName like \':Value%\'',
		),
		'Columns' => array(
			'group_name' => array(
				'Name' => 'Наименование',
				'FieldName' => 'SystemTypeName',
				'Width' => 300,

			),
		),
	));
	echo $form->error($model,'SystemType_id');

	echo $form->labelEx($model,'Description');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'description',
		'Width' => 300,
		'Value' => $model->Description,
		'Type' => 'String',
		'Name' => 'Equips[Description]'
	));
	echo $form->error($model,'Description');

	?>

<!--	<p class="note">Fields with <span class="required">*</span> are required.</p>-->
<!---->
<!--	--><?php //echo $form->errorSummary($model); ?>
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'EquipName'); ?>
<!--		--><?php //echo $form->textField($model,'EquipName',array('class'=>'form-control','size'=>60,'maxlength'=>200)); ?>
<!--		--><?php //echo $form->error($model,'EquipName'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'UnitMeasurement_Id'); ?>
<!--		--><?php //echo $form->textField($model,'UnitMeasurement_Id'); ?>
<!--		--><?php //echo $form->error($model,'UnitMeasurement_Id'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'Supplier_id'); ?>
<!--		--><?php //echo $form->textField($model,'Supplier_id'); ?>
<!--		--><?php //echo $form->error($model,'Supplier_id'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'Description'); ?>
<!--		--><?php //echo $form->textField($model,'Description',array('class'=>'form-control','size'=>60,'maxlength'=>1000)); ?>
<!--		--><?php //echo $form->error($model,'Description'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'GroupGood_Id'); ?>
<!--		--><?php //echo $form->textField($model,'GroupGood_Id'); ?>
<!--		--><?php //echo $form->error($model,'GroupGood_Id'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'SubGroupGood_Id'); ?>
<!--		--><?php //echo $form->textField($model,'SubGroupGood_Id'); ?>
<!--		--><?php //echo $form->error($model,'SubGroupGood_Id'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'CategoryGood_Id'); ?>
<!--		--><?php //echo $form->textField($model,'CategoryGood_Id',array('class'=>'form-control','size'=>19,'maxlength'=>19)); ?>
<!--		--><?php //echo $form->error($model,'CategoryGood_Id'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'EquipImage'); ?>
<!--		--><?php //echo $form->textField($model,'EquipImage',array('size'=>60,'maxlength'=>250)); ?>
<!--		--><?php //echo $form->error($model,'EquipImage'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'actp_id'); ?>
<!--		--><?php //echo $form->textField($model,'actp_id'); ?>
<!--		--><?php //echo $form->error($model,'actp_id'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'ctgr_id'); ?>
<!--		--><?php //echo $form->textField($model,'ctgr_id'); ?>
<!--		--><?php //echo $form->error($model,'ctgr_id'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'grp_id'); ?>
<!--		--><?php //echo $form->textField($model,'grp_id'); ?>
<!--		--><?php //echo $form->error($model,'grp_id'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'sgrp_id'); ?>
<!--		--><?php //echo $form->textField($model,'sgrp_id'); ?>
<!--		--><?php //echo $form->error($model,'sgrp_id'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'discontinued'); ?>
<!--		--><?php //echo $form->textField($model,'discontinued'); ?>
<!--		--><?php //echo $form->error($model,'discontinued'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'SystemType_id'); ?>
<!--		--><?php //echo $form->textField($model,'SystemType_id'); ?>
<!--		--><?php //echo $form->error($model,'SystemType_id'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'ServicingTime'); ?>
<!--		--><?php //echo $form->textField($model,'ServicingTime'); ?>
<!--		--><?php //echo $form->error($model,'ServicingTime'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'AddressSystem_id'); ?>
<!--		--><?php //echo $form->textField($model,'AddressSystem_id'); ?>
<!--		--><?php //echo $form->error($model,'AddressSystem_id'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'rate'); ?>
<!--		--><?php //echo $form->textField($model,'rate',array('size'=>19,'maxlength'=>19)); ?>
<!--		--><?php //echo $form->error($model,'rate'); ?>
<!--	</div>-->
<!---->
	<div class="field border pull-left">
		<p class="title">Инструкция</p>
		<div class="pull-left">
			<?php //echo $form->labelEx($model,'must_instruction'); ?>
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'Edit1',
				'Width' => 200,
				'Checked' => $model->must_instruction,
				'Label' => "Нужна",
				'Name' => 'Equips[must_instruction]',
			));
			?>
			<?php //echo $form->checkBox($model,'must_instruction'); ?>
			<?php echo $form->error($model,'must_instruction'); ?>
		</div>

		<div class="pull-left">
<!--			--><?php //echo $form->labelEx($model,'there_instruction'); ?>
<!--			--><?php //echo $form->checkBox($model,'there_instruction'); ?>
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'Edit2',
				'Width' => 200,
				'Checked' => $model->there_instruction,
				'Label' => "Есть",
				'Name' => 'Equips[there_instruction]',
			));
			?>
			<?php echo $form->error($model,'there_instruction'); ?>
		</div>
		<div class="clearfix"></div>
	</div>

	<div class="field border pull-left">
		<p class="title">Фотография</p>
		<div class="pull-left">
<!--			--><?php //echo $form->labelEx($model,'must_photo'); ?>
<!--			--><?php //echo $form->checkBox($model,'must_photo'); ?>
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'Edit3',
				'Width' => 200,
				'Checked' => $model->must_photo,
				'Label' => "Нужна",
				'Name' => 'Equips[must_photo]',
			));
			?>
			<?php echo $form->error($model,'must_photo'); ?>
		</div>

		<div class="pull-left">
<!--			--><?php //echo $form->labelEx($model,'there_photo'); ?>
<!--			--><?php //echo $form->checkBox($model,'there_photo'); ?>
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'Edit4',
				'Width' => 200,
				'Checked' => $model->there_photo,
				'Label' => "Есть",
				'Name' => 'Equips[there_photo]',
			));
			?>
			<?php echo $form->error($model,'there_photo'); ?>
		</div>
		<div class="clearfix"></div>
	</div>

	<div class="field border pull-left">
		<p class="title">Аналог</p>
		<div class="pull-left">
<!--			--><?php //echo $form->labelEx($model,'must_analog'); ?>
<!--			--><?php //echo $form->checkBox($model,'must_analog'); ?>
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'Edit5',
				'Width' => 200,
				'Checked' => $model->must_analog,
				'Label' => "Нужна",
				'Name' => 'Equips[must_analog]',
			));
			?>
			<?php echo $form->error($model,'must_analog'); ?>
		</div>

		<div class="pull-left">
<!--			--><?php //echo $form->labelEx($model,'there_analog'); ?>
<!--			--><?php //echo $form->checkBox($model,'there_analog'); ?>
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'Edit6',
				'Width' => 200,
				'Checked' => $model->there_analog,
				'Label' => "Есть",
				'Name' => 'Equips[there_analog]',
			));
			?>
			<?php echo $form->error($model,'there_analog'); ?>
		</div>
		<div class="clearfix"></div>
	</div>

	<div class="field border pull-left">
		<p class="title">Производители</p>
		<div class="pull-left">
<!--			--><?php //echo $form->labelEx($model,'must_producer'); ?>
<!--			--><?php //echo $form->checkBox($model,'must_producer'); ?>
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'Edit7',
				'Width' => 200,
				'Checked' => $model->must_producer,
				'Label' => "Нужна",
				'Name' => 'Equips[must_producer]',
			));
			?>
			<?php echo $form->error($model,'must_producer'); ?>
		</div>

		<div class="pull-left">
<!--			--><?php //echo $form->labelEx($model,'there_producer'); ?>
<!--			--><?php //echo $form->checkBox($model,'there_producer'); ?>
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'Edit8',
				'Width' => 200,
				'Checked' => $model->there_producer,
				'Label' => "Есть",
				'Name' => 'Equips[there_producer]',
			));
			?>
			<?php echo $form->error($model,'there_producer'); ?>
		</div>
		<div class="clearfix"></div>
	</div>

	<div class="field border pull-left">
		<p class="title">Поставщики</p>
		<div class="pull-left">
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'Edit9',
				'Width' => 200,
				'Checked' => $model->must_supplier,
				'Label' => "Нужна",
				'Name' => 'Equips[must_supplier]',
			));
			?>
			<?php echo $form->error($model,'must_supplier'); ?>
		</div>

		<div class="pull-left">
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'Edit10',
				'Width' => 200,
				'Checked' => $model->there_supplier,
				'Label' => "Есть",
				'Name' => 'Equips[there_supplier]',
			));
			?>
			<?php echo $form->error($model,'there_supplier'); ?>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>

	<?php
	echo $form->labelEx($model,'note');
	$this->widget('application.extensions.alitonwidgets.memo.almemo', array(
		'id' => 'note',
		'Width' => 300,
		'Value' => $model->note,
		'Type' => 'String',
		'Name' => 'Equips[note]'
	));
	echo $form->error($model,'note');
	?>

<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'note'); ?>
<!--		--><?php //echo $form->textField($model,'note',array('size'=>-1,'maxlength'=>-1)); ?>
<!--		--><?php //echo $form->error($model,'note'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'group_id'); ?>
<!--		--><?php //echo $form->textField($model,'group_id'); ?>
<!--		--><?php //echo $form->error($model,'group_id'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'Lock'); ?>
<!--		--><?php //echo $form->checkBox($model,'Lock'); ?>
<!--		--><?php //echo $form->error($model,'Lock'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'EmplLock'); ?>
<!--		--><?php //echo $form->textField($model,'EmplLock'); ?>
<!--		--><?php //echo $form->error($model,'EmplLock'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'DateLock'); ?>
<!--		--><?php //echo $form->textField($model,'DateLock'); ?>
<!--		--><?php //echo $form->error($model,'DateLock'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'EmplCreate'); ?>
<!--		--><?php //echo $form->textField($model,'EmplCreate'); ?>
<!--		--><?php //echo $form->error($model,'EmplCreate'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'DateCreate'); ?>
<!--		--><?php //echo $form->textField($model,'DateCreate'); ?>
<!--		--><?php //echo $form->error($model,'DateCreate'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'EmplChange'); ?>
<!--		--><?php //echo $form->textField($model,'EmplChange'); ?>
<!--		--><?php //echo $form->error($model,'EmplChange'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'DateChange'); ?>
<!--		--><?php //echo $form->textField($model,'DateChange'); ?>
<!--		--><?php //echo $form->error($model,'DateChange'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'EmplDel'); ?>
<!--		--><?php //echo $form->textField($model,'EmplDel'); ?>
<!--		--><?php //echo $form->error($model,'EmplDel'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'DelDate'); ?>
<!--		--><?php //echo $form->textField($model,'DelDate'); ?>
<!--		--><?php //echo $form->error($model,'DelDate'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row buttons">-->
<!--		--><?php //echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'btn btn-primary')); ?>
<!--	</div>-->

	<input type="submit" value="Сохранить" style="margin-top: 7px">

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
	Aliton.Links = [{
		Out: "equipGroup",
		In: "EquipSubgroups",
		TypeControl: "Combobox",
		Condition: "esg.grp_id = :Value",
		Field: "grp_id",
		Name: "TestCombobox4_Filter1",
		TypeFilter: "Internal",
		TypeLink: "Filter",
	}];
</script>