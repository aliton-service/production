<?php
/**
 *
 * @var \Tasks $model
 */


$form = $this->beginWidget('CActiveForm', array(
	'id' => 'form-task',
	'htmlOptions'=>array(
		'class'=>'form-inline'
	),
	'enableAjaxValidation' => true,
	'enableClientValidation' => true,
));

echo $form->labelEx($model,'Empl_id');
$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
	'id' => 'task-executor',
	'Stretch' => true,
	'ModelName' => 'Employees',
	'Height' => 300,
	'Width' => 150,
	'KeyField' => 'Employee_id',
	'FieldName' => 'EmployeeName',
	'KeyValue' => $model->Empl_id,
	'Name' => 'Tasks[Empl_id]',
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
echo $form->error($model,'Empl_id');


echo $form->labelEx($model,'Tasktype_id');
?>
<div id="" class="droplist">
	<?php
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'task-type',
		'Visible' => false,
		'Name' => 'Tasks[Tasktype_id]'
	));
	?>
	<div style="position: relative; width: 240px;">
		<table class="alcomboboxajax" style="width: 100%; height: 24px;">
			<tbody>
			<tr>
				<td class="dxic" style="width:100%;"></td>
				<td class="toggler alComboboxAjaxButton" style="-khtml-user-select:none;">
					<img id="alComboboxAjaxButtonImg_taskType" class="alcomboboxajaxButtonImg" alt="v" src="/images/whitepixel.gif">
				</td>
			</tr>
			</tbody>

		</table>
		<div id="droplist" class="list">
			<?php
			$this->widget('CTreeView', array(
				'collapsed'=>true,
				'control'=>'treecontrol',
				'animated'=>'fast',
				'cssFile'=>'css/treeview/treeview.css',
				'htmlOptions'=>array(

					'class'=>'treeview-red'),
					'data'=>Tree::getTree('TaskTypesTree',0, array(
					'id'=>'Tasktype_id',
					'parent'=>'Parent_id',
					'name'=>'Tasktypename',
					'notDel'=>'DelDate Is Null',
				))

			));
			?>
		</div>
	</div>
</div>
<?php
echo $form->error($model,'Tasktype_id');


?>
<div>
	<div class="field pull-left">
		<?php
		echo $form->labelEx($model,'Taskprior_id');
		$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
			'id' => 'taskPrior',
			'Stretch' => true,
			'ModelName' => 'TaskPrior',
			'Height' => 300,
			'Width' => 150,
			'KeyField' => 'Taskprior_id',
			'FieldName' => 'TaskpriorName',
			'Name' => 'Tasks[Taskprior_id]',
			'Type' => array(
				'Mode' => 'Filter',
				'Condition' => 'tp.TaskpriorName like \':Value%\'',
			),
			'Columns' => array(
				'TaskpriorName' => array(
					'Name' => 'Приоритет',
					'FieldName' => 'TaskpriorName',
					'Width' => 180,

				),
			),
		));
		echo $form->error($model,'Taskprior_id');
		?>
	</div>

	<div class="field pull-left">
		<?php
		echo $form->labelEx($model,'Deadline');
		$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
			'id' => 'plan-date-exec',
			'Width' => 150,
			'Name' => 'Tasks[Deadline]'
		));
		echo $form->error($model,'Deadline');
		?>
	</div>
	<div class="clearfix"></div>
</div>

<div>
	<div class="field pull-left">
		<?php
		echo $form->labelEx($model,'HoursExec');
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id' => 'hours-exec',
			'Width' => 150,
			'Name' => 'Tasks[HoursExec]'
		));
		echo $form->error($model,'HoursExec');
		?>
	</div>

	<div class="field pull-left">
		<?php
		$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
			'id' => 'not-deadline',
			'Width' => 200,
			'Checked' => false,
			'Label' => "Не устанавливать срок",
		));
		$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
			'id' => 'hidden',
			'Width' => 200,
			'Checked' => false,
			'Label' => "Скрыть",
			'Name' => 'Tasks[Hidden]'
		));
		?>
	</div>
	<div class="clearfix"></div>
</div>

<label>Содержание</label>
<?php
$this->widget('application.extensions.alitonwidgets.memo.almemo', array(
	'id' => 'task-text',
	'Width' => 400,
	'Height' => 60,
	'Name' => 'Tasks[TaskText]'
));
?>

<div class="btn-group">
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'task-save',
		'Width' => 124,
		'Height' => 30,
		'Text' => 'Сохранить',
		'FormName' => 'form-task',
		'Type' => 'Form',
	));
	?>
</div>

<?php $this->endWidget(); ?>
