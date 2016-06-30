<?php
/**
 *
 * @var EventsController $this
 */

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'autoevents-form',
	'htmlOptions'=>array(
		'class'=>'form-inline'
	),
	'enableAjaxValidation' => true,
	'enableClientValidation' => true,
));
?>


<label>Направление</label>
<?php
$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
	'id' => 'reportform',
	'Stretch' => true,
	'ModelName' => 'EventTypes',
	'Height' => 300,
	'Width' => 200,
	'KeyField' => 'evtp_id',
	'FieldName' => 'EventType',
	'Name' => 'Events[evtp_id]',
	'Type' => array(
		'Mode' => 'Filter',
		'Condition' => 'et.EventType like \':Value%\'',
	),
	'Columns' => array(
		'ReportForm' => array(
			'Name' => 'Направление',
			'FieldName' => 'EventType',
			'Width' => 200,

		),
	),
));
?>

<label>Интервал</label>
<?php
$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
	'id' => 'periods',
	'Stretch' => true,
	'ModelName' => 'Periods',
	'Height' => 300,
	'Width' => 200,
	'KeyField' => 'code',
	'FieldName' => 'periodname',
	'Name' => 'Events[prds_id]',
	'Type' => array(
		'Mode' => 'Filter',
		'Condition' => 'p.periodname like \':Value%\'',
	),
	'Columns' => array(
		'periodname' => array(
			'Name' => 'Интервал',
			'FieldName' => 'periodname',
			'Width' => 200,

		),
	),
));
?>

<label>Исполнитель</label>
<?php
$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
	'id' => 'executor-ae',
	'Stretch' => true,
	'ModelName' => 'Employees',
	'Height' => 300,
	'Width' => 200,
	'KeyField' => 'Employee_id',
	'FieldName' => 'EmployeeName',
	'Name' => 'Events[empl_id]',
	'Type' => array(
		'Mode' => 'Filter',
		'Condition' => 'e.EmployeeName like \':Value%\'',
	),
	'Columns' => array(
		'EmployeeName' => array(
			'Name' => 'Исполнитель',
			'FieldName' => 'EmployeeName',
			'Width' => 200,

		),
	),
));
?>

<div class="field pull-left" style="padding-left: 0">
	<label>Период с</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
		'id' => 'datebegin-ae',
		'Name' => 'Events[datestart]',
	));
	?>
</div>


<div class="field pull-left">
	<label>По</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
		'id' => 'dateend-ae',
		'Name' => 'Events[dateend]',
	));
	?>
</div>

<div class="clearfix"></div>

	<div class="btn-group">
		<?php
		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'BtnSave',
			'Width' => 124,
			'Height' => 30,
			'Text' => 'Сохранить',
			'Type' => 'AjaxForm',
			'Href' => Yii::app()->createUrl('events/create',array('objgr_id'=>$objgr_id)),
			'FormName' => 'autoevents-form',
			'OnAfterAjaxSuccess' => '$("#ListEvents").algridajax("LoadData");
			alert("Выполнено");
			',
		));
		?>
	</div>

<?php $this->endWidget(); ?>