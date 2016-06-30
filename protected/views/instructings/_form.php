<?php
/**
 *
 */
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'instruct-form',
	'htmlOptions'=>array(
		'class'=>'form-inline'
	),
	'enableAjaxValidation' => true,
	'enableClientValidation' => true,
));

echo $form->labelEx($model, 'Date');
$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
	'id' => 'Date',
	'Name' => 'Instructings[Date]',
	'Value' => DateTimeManager::YiiDateToAliton($model->Date),
	'Width'=>197,
));
echo $form->error($model, 'Date');

echo $form->labelEx($model, 'UserExec');
$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
	'id' => 'UserExec',
	'Stretch' => true,
	'ModelName' => 'Employees',
	'Height' => 300,
	'Width' => 250,
	'KeyField' => 'Employee_id',
	'KeyValue' => $model->UserExec,
	'FieldName' => 'EmployeeName',
	'Name' => 'Instructings[UserExec]',
	'Type' => array(
		'Mode' => 'Filter',
		'Condition' => 'e.EmployeeName like \':Value%\'',
	),
	'Columns' => array(
		'group_name' => array(
			'Name' => 'Сотрудник',
			'FieldName' => 'EmployeeName',
			'Width' => 300,
		),
	),
));
echo $form->error($model, 'Name');


	echo $form->labelEx($model, 'Name');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'Name',
		'Width' => 250,
		'Type' => 'String',
		'Value' => $model->Name,
		'Name' => 'Instructings[Name]',
		//'Mode' => "Auto",
	));
	echo $form->error($model, 'Name');



echo $form->labelEx($model, 'Note');
$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
	'id' => 'Note',
	'Width' => 250,
	'Type' => 'String',
	'Value' => $model->Note,
	'Name' => 'Instructings[Note]',
	//'Mode' => "Auto",
));
echo $form->error($model, 'Note');


$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'save-equipGr',
	'Height' => 30,
	'Text' => 'Сохранить',
	'Type' => 'none',
	'OnAfterClick' => 'saveInstruct()'
));

?>



<?php $this->endWidget(); ?>
