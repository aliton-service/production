<?php
/**
 *
 * @var TaskExecutorsController $this
 * @var \TaskExecutors $model
 */
?>
<form id="form-addexecutors">

	<label>Исполнитель</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'executor',
		'Stretch' => true,
		'ModelName' => 'Employees',
		'Height' => 300,
		'Width' => 150,
		'KeyField' => 'Employee_id',
		'FieldName' => 'EmployeeName',
		'KeyValue' => $model->Employee_id,
		'Name' => 'TaskExecutors[Employee_id]',
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => 'e.EmployeeName like \':Value%\'',
		),
		'Columns' => array(
			'EmployeeName' => array(
				'Name' => 'Исполнитель',
				'FieldName' => 'EmployeeName',
				'Width' => 180,

			),
		),
	));
	?>

	<label>Причина добавления</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'addNote',
		'Width' => 150,
		'Value' => $model->Addnote,
		'Name' => 'TaskExecutors[Addnote]'
	));

	?>

	<div class="btn-group">
		<?php
		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'createTaskExecutor',
			'Text' => 'Сохранить',
			'Type' => 'none',
			'OnAfterClick' => 'addTaskExecutors()',
		));
		?>
	</div>
</form>
<style>
	.ui-dialog {
		overflow: visible;
	}
	.ui-dialog .ui-dialog-content {
		overflow: visible;
	}
</style>
