<?php
/**
 *
 * @var EmployeesController $this
 */


?>

<?php $form=$this->beginWidget('CActiveForm', array(

)); ?>

<div class="field pull-left">
<?php
echo $form->labelEx($model, 'Address');
$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
	'id' => 'address',
	'Width' => 200,
	'Type' => 'String',
	//'Mode' => "Auto",
));

echo $form->labelEx($model, 'Tel_home');
$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
	'id' => 'phone-home',
	'Width' => 200,
	'Type' => 'String',
	//'Mode' => "Auto",
));

echo $form->labelEx($model, 'Tel_other');
$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
	'id' => 'phone-other',
	'Width' => 200,
	'Type' => 'String',
	//'Mode' => "Auto",
));

echo $form->labelEx($model, 'Email');
$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
	'id' => 'email',
	'Width' => 200,
	'Type' => 'String',
	//'Mode' => "Auto",
));
?>
</div>

<div class="field pull-left">
	<?php
	echo $form->labelEx($model, 'Address');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'address-new',
		'Width' => 200,
		'Type' => 'String',
		//'Mode' => "Auto",
	));

	echo $form->labelEx($model, 'Tel_work');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'phone-work',
		'Width' => 200,
		'Type' => 'String',
		//'Mode' => "Auto",
	));

	echo $form->labelEx($model, 'WorkEmail');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'email-work',
		'Width' => 200,
		'Type' => 'String',
		//'Mode' => "Auto",
	));
	?>
</div>
<div class="field pull-left">
	<?php
	echo $form->labelEx($model, 'Note');
	$this->widget('application.extensions.alitonwidgets.memo.almemo', array(
		'id' => 'note',
		'Width' => 300,
		'Type' => 'String',
		//'Mode' => "Auto",
	));
	?>
</div>
<div class="clearfix"></div>
<div class="field pull-left">
	<?php
	echo $form->labelEx($model, 'Information');
	$this->widget('application.extensions.alitonwidgets.memo.almemo', array(
		'id' => 'information',
		'Width' => 300,
		'Type' => 'String',
		//'Mode' => "Auto",
	));
	?>
</div>
<div class="field pull-left">
	<?php
	echo $form->labelEx($model, 'Documents');
	$this->widget('application.extensions.alitonwidgets.memo.almemo', array(
		'id' => 'documents',
		'Width' => 412,
		'Type' => 'String',
		//'Mode' => "Auto",
	));
	?>
</div>
</div>
<div class="clearfix"></div>

<?php $this->endWidget(); ?>


<script>
//	Aliton.Links = [
//		{
//			Out: "EmployeesGrid",
//			In: "note",
//			TypeControl: "Edit",
//			Condition: ":Value",
//			Field: "Note",
//			Name: "TestGrid1_Filter1",
//			TypeFilter: "Internal",
//			TypeLink: "Filter",
//			isNullRun: false
//		},
//		{
//			Out: "EmployeesGrid",
//			In: "documents",
//			TypeControl: "Edit",
//			Condition: ":Value",
//			Field: "Documents",
//			Name: "TestGrid1_Filter1",
//			TypeFilter: "Internal",
//			TypeLink: "Filter",
//			isNullRun: false
//		},
//		{
//			Out: "EmployeesGrid",
//			In: "address",
//			TypeControl: "Edit",
//			Condition: ":Value",
//			Field: "Address",
//			Name: "TestGrid1_Filter1",
//			TypeFilter: "Internal",
//			TypeLink: "Filter",
//			isNullRun: false
//		},
//		{
//			Out: "EmployeesGrid",
//			In: "phone-home",
//			TypeControl: "Edit",
//			Condition: ":Value",
//			Field: "Tel_home",
//			Name: "TestGrid1_Filter1",
//			TypeFilter: "Internal",
//			TypeLink: "Filter",
//			isNullRun: false
//		},
//		{
//			Out: "EmployeesGrid",
//			In: "phone-other",
//			TypeControl: "Edit",
//			Condition: ":Value",
//			Field: "Tel_other",
//			Name: "TestGrid1_Filter1",
//			TypeFilter: "Internal",
//			TypeLink: "Filter",
//			isNullRun: false
//		},
//		{
//			Out: "EmployeesGrid",
//			In: "email",
//			TypeControl: "Edit",
//			Condition: ":Value",
//			Field: "Email",
//			Name: "TestGrid1_Filter1",
//			TypeFilter: "Internal",
//			TypeLink: "Filter",
//			isNullRun: false
//		},
//		{
//			Out: "EmployeesGrid",
//			In: "phone-work",
//			TypeControl: "Edit",
//			Condition: ":Value",
//			Field: "Tel_work",
//			Name: "TestGrid1_Filter1",
//			TypeFilter: "Internal",
//			TypeLink: "Filter",
//			isNullRun: false
//		},
//		{
//			Out: "EmployeesGrid",
//			In: "email-work",
//			TypeControl: "Edit",
//			Condition: ":Value",
//			Field: "WorkEmail",
//			Name: "TestGrid1_Filter1",
//			TypeFilter: "Internal",
//			TypeLink: "Filter",
//			isNullRun: false
//		},
//		{
//			Out: "EmployeesGrid",
//			In: "information",
//			TypeControl: "Edit",
//			Condition: ":Value",
//			Field: "Information",
//			Name: "TestGrid1_Filter1",
//			TypeFilter: "Internal",
//			TypeLink: "Filter",
//			isNullRun: false
//		},
////		{
////			Out: "EmployeesGrid",
////			In: "address",
////			TypeControl: "Edit",
////			Condition: ":Value",
////			Field: "Address",
////			Name: "TestGrid1_Filter1",
////			TypeFilter: "Internal",
////			TypeLink: "Filter",
////			isNullRun: false
////		},
//	];
</script>