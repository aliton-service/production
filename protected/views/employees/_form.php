<?php
/**
 *
 * @var EmployeesController $this
 * @var \Employees $model
 */


$form=$this->beginWidget('CActiveForm', array(
	'id'=>'equips-form',
	'htmlOptions'=>array(
		'class'=>'form-inline'
	),
	'enableAjaxValidation' => true,
	'enableClientValidation' => true,
));
?>
<div class="field">
	<?php
	echo $form->labelEx($model, 'EmployeeName');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'EmployeeName',
		'Width' => 300,
		'Type' => 'String',
		'Value' => $model->EmployeeName,
		'Name' => 'Employees[EmployeeName]',
		//'Mode' => "Auto",
	));
	echo $form->error($model, 'EmployeeName');
	?>
</div>
<?php


?><div class="field pull-left"><?php
	echo $form->labelEx($model, 'Position_id');
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'position',
		'Stretch' => true,
		'ModelName' => 'Positions',
		'Height' => 300,
		'Width' => 300,
		'KeyField' => 'Position_id',
		'KeyValue' => $model->Position_id,
		'FieldName' => 'PositionName',
		'Name' => 'Employees[Position_id]',
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => 'p.PositionName like \':Value%\'',
		),
		'Columns' => array(
			'group_name' => array(
				'Name' => 'Должность',
				'FieldName' => 'PositionName',
				'Width' => 300,

			),
		),
	));
	echo $form->error($model, 'Position_id');


	echo $form->labelEx($model,'DateStart');
	$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
		'id' => 'DateStart',
		'Name' => 'Employees[DateStart]',
		'Value' => DateTimeManager::YiiDateToAliton($model->DateStart),
		'Width'=>300,
	));
	echo $form->error($model,'DateStart');

	echo $form->labelEx($model, 'Jrdc_id');
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'Jrdc',
		'Stretch' => true,
		'ModelName' => 'Juridicals',
		'Height' => 300,
		'Width' => 300,
		'KeyField' => 'Jrdc_Id',
		'KeyValue' => $model->Jrdc_id,
		'FieldName' => 'JuridicalPerson',
		'Name' => 'Employees[Jrdc_id]',
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => 'jur.JuridicalPerson like \':Value%\'',
		),
		'Columns' => array(
			'group_name' => array(
				'Name' => 'Юр. лицо',
				'FieldName' => 'JuridicalPerson',
				'Width' => 300,
			),
		),
	));
	echo $form->error($model, 'Jrdc_id');

	echo $form->labelEx($model,'DateBegin');
	$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
		'id' => 'DateBegin',
		'Name' => 'Employees[DateBegin]',
		'Value' => DateTimeManager::YiiDateToAliton($model->DateBegin),
		'Width'=>300,
	));
	echo $form->error($model,'DateBegin');
?></div><?php


?><div class="field pull-left"><?php

	echo $form->labelEx($model,'DateEnd');
	$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
		'id' => 'DateEnd',
		'Name' => 'Employees[DateEnd]',
		'Value' => DateTimeManager::YiiDateToAliton($model->DateEnd),
		'Width'=>300,
	));
	echo $form->error($model,'DateEnd');


	echo $form->labelEx($model,'Birthday');
	$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
		'id' => 'Birthday',
		'Name' => 'Employees[Birthday]',
		'Value' => DateTimeManager::YiiDateToAliton($model->Birthday),
		'Width'=>300,
	));
	echo $form->error($model,'Birthday');


	echo $form->labelEx($model,'CerDateIn');
	$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
		'id' => 'CerDateIn',
		'Name' => 'Employees[CerDateIn]',
		'Value' => DateTimeManager::YiiDateToAliton($model->CerDateIn),
		'Width'=>300,
	));
	echo $form->error($model,'CerDateIn');

	echo $form->labelEx($model,'CerDateOut');
	$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
		'id' => 'CerDateOut',
		'Name' => 'Employees[CerDateOut]',
		'Value' => DateTimeManager::YiiDateToAliton($model->CerDateOut),
		'Width'=>300,
	));
	echo $form->error($model,'CerDateOut');
?></div><div class="clearfix"></div><?php


?>
<div class="field">
	<?php
	echo $form->labelEx($model, 'Section_id');
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'section',
		'Stretch' => true,
		'ModelName' => 'Sections',
		'Height' => 300,
		'Width' => 300,
		'KeyField' => 'Section_id',
		'KeyValue' => $model->Section_id,
		'FieldName' => 'SectionName',
		'Name' => 'Employees[Section_id]',
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => 's.SectionName like \':Value%\'',
		),
		'Columns' => array(
			'group_name' => array(
				'Name' => 'Служба',
				'FieldName' => 'SectionName',
				'Width' => 300,
			),
		),
	));
	echo $form->error($model, 'Section_id');


	echo $form->labelEx($model, 'Dep_id');
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'Departments',
		'Stretch' => true,
		'ModelName' => 'Departments',
		'Height' => 300,
		'Width' => 300,
		'KeyField' => 'Dep_id',
		'KeyValue' => $model->Dep_id,
		'FieldName' => 'DepName',
		'Name' => 'Employees[Dep_id]',
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => 'dp.DepName like \':Value%\'',
		),
		'Columns' => array(
			'group_name' => array(
				'Name' => 'Отдел',
				'FieldName' => 'DepName',
				'Width' => 300,
			),
		),
	));
	echo $form->error($model, 'Dep_id');
	?>
</div>

<div class="field pull-left">

<?php


	echo $form->labelEx($model, 'Territ_Id');
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'Territory',
		'Stretch' => true,
		'ModelName' => 'Territory',
		'Height' => 300,
		'Width' => 300,
		'KeyField' => 'Territ_Id',
		'KeyValue' => $model->Territ_Id,
		'FieldName' => 'Territ_Name',
		'Name' => 'Employees[Territ_Id]',
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => 't.Territ_Name like \':Value%\'',
		),
		'Columns' => array(
			'group_name' => array(
				'Name' => 'Отдел',
				'FieldName' => 'Territ_Name',
				'Width' => 300,
			),
		),
	));
	echo $form->error($model, 'Territ_Id');

?>
</div>

<div class="field pull-left">
	<?php
	echo $form->labelEx($model, 'Tel_home');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'Tel_home',
		'Width' => 300,
		'Type' => 'String',
		'Value' => $model->Tel_home,
		'Name' => 'Employees[Tel_home]',
		//'Mode' => "Auto",
	));
	echo $form->error($model, 'Tel_home');
	?>
</div>
<div class="clearfix"></div>
<div class="field pull-left">
	<?php
	echo $form->labelEx($model, 'Tel_other');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'Tel_other',
		'Width' => 300,
		'Type' => 'String',
		'Value' => $model->Tel_other,
		'Name' => 'Employees[Tel_other]',
		//'Mode' => "Auto",
	));
	echo $form->error($model, 'Tel_other');
	?>
</div>
<div class="field pull-left">
	<?php
	echo $form->labelEx($model, 'Tel_work');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'Tel_work',
		'Width' => 300,
		'Type' => 'String',
		'Value' => $model->Tel_work,
		'Name' => 'Employees[Tel_work]',
		//'Mode' => "Auto",
	));
	echo $form->error($model, 'Tel_work');
	?>
</div>
<div class="clearfix"></div>
<div class="field pull-left">
	<?php
	echo $form->labelEx($model, 'WorkEmail');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'WorkEmail',
		'Width' => 300,
		'Type' => 'String',
		'Value' => $model->WorkEmail,
		'Name' => 'Employees[WorkEmail]',
		//'Mode' => "Auto",
	));
	echo $form->error($model, 'WorkEmail');
	?>
</div>
<div class="field pull-left">
	<?php
	echo $form->labelEx($model, 'Email');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'Email',
		'Width' => 300,
		'Type' => 'String',
		'Value' => $model->Tel_home,
		'Name' => 'Employees[Email]',
		//'Mode' => "Auto",
	));
	echo $form->error($model, 'Email');
	?>
</div>

<div class="clearfix"></div>
<div class="field pull-left">
	<?php
	echo $form->labelEx($model, 'DateTrial');
	$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
		'id' => 'DateTrial',
		'Name' => 'Employees[DateTrial]',
		'Value' => DateTimeManager::YiiDateToAliton($model->DateTrial),
		'Width'=>300,
	));
	echo $form->error($model, 'DateTrial');
	?>
</div>
<div class="field pull-left">
	<?php
	echo $form->labelEx($model, 'Address');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'Address',
		'Width' => 300,
		'Type' => 'String',
		'Value' => $model->Address,
		'Name' => 'Employees[Address]',
		//'Mode' => "Auto",
	));
	echo $form->error($model, 'Address');
	?>
</div>

<div class="clearfix"></div>
<div class="field pull-left">
	<?php
	echo $form->labelEx($model, 'Prior_result');
	$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
		'id' => 'Prior_result',
		'Name' => 'Employees[Prior_result]',
		'Value' => DateTimeManager::YiiDateToAliton($model->Prior_result),
		'Width'=>197,
	));
	echo $form->error($model, 'Prior_result');
	?>
</div>
<div class="field pull-left">
	<?php
	echo $form->labelEx($model, 'BypassList');
	$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
		'id' => 'BypassList',
		'Name' => 'Employees[BypassList]',
		'Value' => DateTimeManager::YiiDateToAliton($model->BypassList),
		'Width'=>197,
	));
	echo $form->error($model, 'BypassList');
	?>
</div>
<div class="field pull-left">
	<?php
	echo $form->labelEx($model, 'Date_motivation');
	$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
		'id' => 'Date_motivation',
		'Name' => 'Employees[Date_motivation]',
		'Value' => DateTimeManager::YiiDateToAliton($model->Date_motivation),
		'Width'=>197,
	));
	echo $form->error($model, 'Date_motivation');
	?>
</div>
<div class="clearfix"></div>

<div class="field pull-left">
	<?php
	echo $form->labelEx($model, 'Region_id');
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'Region_id',
		'Stretch' => true,
		'ModelName' => 'Regions',
		'Height' => 300,
		'Width' => 120,
		'KeyField' => 'Region_id',
		'KeyValue' => $model->Region_id,
		'FieldName' => 'RegionName',
		'Name' => 'Employees[Region_id]',
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => 'r.RegionName like \':Value%\'',
		),
		'Columns' => array(
			'group_name' => array(
				'Name' => 'Регион',
				'FieldName' => 'RegionName',
				'Width' => 300,
			),
		),
	));
	echo $form->error($model, 'Territ_Id');
	?>
</div>

<div class="field pull-left">
	<?php
	echo $form->labelEx($model, 'Area_id');
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'Area_id',
		'Stretch' => true,
		'ModelName' => 'Areas',
		'Height' => 300,
		'Width' => 120,
		'KeyField' => 'Area_id',
		'KeyValue' => $model->Area_id,
		'FieldName' => 'AreaName',
		'Name' => 'Employees[Area_id]',
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => 'a.AreaName like \':Value%\'',
		),
		'Columns' => array(
			'group_name' => array(
				'Name' => 'Район',
				'FieldName' => 'AreaName',
				'Width' => 300,
			),
		),
	));
	echo $form->error($model, 'Area_id');
	?>
</div>

<div class="field pull-left">
	<?php
	echo $form->labelEx($model, 'Street_id');
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'Street_id',
		'Stretch' => true,
		'ModelName' => 'Streets',
		'Height' => 300,
		'Width' => 140,
		'KeyField' => 'Street_id',
		'KeyValue' => $model->Street_id,
		'FieldName' => 'StreetName',
		'Name' => 'Employees[Street_id]',
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => 'st.StreetName like \':Value%\'',
		),
		'Columns' => array(
			'group_name' => array(
				'Name' => 'Улица',
				'FieldName' => 'StreetName',
				'Width' => 300,
			),
		),
	));
	echo $form->error($model, 'Street_id');
	?>
</div>

<div class="field pull-left">
	<?php
	echo $form->labelEx($model, 'House');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'House',
		'Width' => 60,
		'Type' => 'String',
		'Value' => $model->House,
		'Name' => 'Employees[House]',
		//'Mode' => "Auto",
	));
	echo $form->error($model, 'House');
	?>
</div>

<div class="field pull-left">
	<?php
	echo $form->labelEx($model, 'Corp');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'Corp',
		'Width' => 50,
		'Type' => 'String',
		'Value' => $model->Corp,
		'Name' => 'Employees[Corp]',
		//'Mode' => "Auto",
	));
	echo $form->error($model, 'Corp');
	?>
</div>

<div class="field pull-left">
	<?php
	echo $form->labelEx($model, 'Apartment');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'Apartment',
		'Width' => 70,
		'Type' => 'String',
		'Value' => $model->Apartment,
		'Name' => 'Employees[Apartment]',
		//'Mode' => "Auto",
	));
	echo $form->error($model, 'Apartment');
	?>
</div>
<div class="clearfix"></div>

<div class="field">
	<?php
	echo $form->labelEx($model, 'Documents');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'Documents',
		'Width' => 610,
		'Type' => 'String',
		'Value' => $model->Documents,
		'Name' => 'Employees[Documents]',
		//'Mode' => "Auto",
	));
	echo $form->error($model, 'Documents');
	?>
</div>


<div class="field">
	<?php
	echo $form->labelEx($model, 'Note');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'Note',
		'Width' => 610,
		'Type' => 'String',
		'Value' => $model->Note,
		'Name' => 'Employees[Note]',
		//'Mode' => "Auto",
	));
	echo $form->error($model, 'Note');
	?>
</div>


<div class="field">
	<?php
	echo $form->labelEx($model, 'Information');
	$this->widget('application.extensions.alitonwidgets.memo.almemo', array(
		'id' => 'Information',
		'Width' => 610,
		'Type' => 'String',
		'Value' => $model->Information,
		'Name' => 'Employees[Information]',
		//'Mode' => "Auto",
	));
	echo $form->error($model, 'Information');
	?>
</div>

<input type="submit" style="margin-top: 7px;margin-left: 5px" value="Сохранить">

<?php $this->endWidget(); ?>


<script>
	Aliton.Links = [{
		Out: "Region_id",
		In: "Street_id",
		TypeControl: "Combobox",
		Condition: "st.Region_id = :Value",
		Field: "Region_id",
		Name: "TestCombobox4_Filter1",
		TypeFilter: "Internal",
		TypeLink: "Filter",
	}];
</script>