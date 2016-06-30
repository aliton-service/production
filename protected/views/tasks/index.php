<?php
/**
 *
 * @var TasksController $this
 */

$this->title = "Задачи";

?>
<div class="field pull-left">
	<label>Постановщик</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'emplCreate',
		'Stretch' => true,
		'ModelName' => 'Employees',
		'Height' => 300,
		'Width' => 150,
		'KeyField' => 'Employee_id',
		'FieldName' => 'EmployeeName',
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => 'e.EmployeeName like \':Value%\'',
		),
		'Columns' => array(
			'EmployeeName' => array(
				'Name' => 'Постанвщик',
				'FieldName' => 'EmployeeName',
				'Width' => 180,

			),
		),
	));
	?>
</div>
<div class="field pull-left">
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
</div>
<div class="clearfix"></div>
<div class="filter">
	<ul class="filter field border">
		<div class="title">Отбор по параметрам</div>
		<li>
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'allTask',
				'Width' => 200,
				'Checked' => false,
				'Label' => "Все задачи",
			));
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'iTask',
				'Width' => 200,
				'Checked' => false,
				'Label' => "Задачи поставленные мной",
			));
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'meTask',
				'Width' => 200,
				'Checked' => true,
				'Label' => "Задачи поставленные мне",
			));
			?>
		</li>
		<li>
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'taskTaken',
				'Width' => 200,
				'Checked' => false,
				'Label' => "Принятые",
			));
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'taskNotTaken',
				'Width' => 200,
				'Checked' => true,
				'Label' => "Непринятые",
			));
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'taskExec',
				'Width' => 200,
				'Checked' => false,
				'Label' => "Выполненные",
			));
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'tascCanceled',
				'Width' => 200,
				'Checked' => false,
				'Label' => "Отмененные",
			));
			?>
		</li>
		<li>
			<div>
				<div class="field pull-left">
					<label>Номер</label>
					<?php
					$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
						'id' => 'taskId',
						'Width' => 80
					));
					?>
				</div>
				<div class="field pull-left">
					<label>Дата</label>
					<?php
					$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
						'id' => 'taskDate',
						'Width' => 150
					));
					?>
				</div>
				<div class="field pull-left">
					<label>Поиск по тексту</label>
					<?php
					$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
						'id' => 'taskTextSearch',
						'Width' => 150
					));
					?>
				</div>
				<div class="clearfix"></div>
			</div>
			<div>
				<div class="field pull-left">
					<div id="taskTypeTree" class="droplist pull-left">
						<?php
						$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
							'id' => 'taskType',
							'Visible' => false
						));
						?>
						<label>Направление</label>
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
				</div>

				<div class="field pull-left">
					<label>Приоритет</label>
					<?php
					$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
						'id' => 'taskPrior',
						'Stretch' => true,
						'ModelName' => 'TaskPrior',
						'Height' => 300,
						'Width' => 150,
						'KeyField' => 'Taskprior_id',
						'FieldName' => 'TaskpriorName',
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
					?>
				</div>
				<div class="clearfix"></div>
			</div>
		</li>

		<li>
			<div>
				<div><label>Срок установленный руководителем</label></div>
				<div>
					<div class="field pull-left">
						От
					</div>
					<div class="field pull-left">
						<?php
						$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
							'id' => 'leaderTime1',
							'Width' => 150
						));
						?>
					</div>
					<div class="field pull-left">
						До
					</div>
					<div class="field pull-left">
						<?php
						$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
							'id' => 'leaderTime2',
							'Width' => 150
						));
						?>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div>
				<div><label>Дата следующего шага</label></div>
				<div>
					<div class="field pull-left">
						От
					</div>
					<div class="field pull-left">
						<?php
						$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
							'id' => 'nextDate1',
							'Width' => 150
						));
						?>
					</div>
					<div class="field pull-left">
						До
					</div>
					<div class="field pull-left">
						<?php
						$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
							'id' => 'nextDate2',
							'Width' => 150
						));
						?>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div>
				<div><label>Планируемая дата завершения задачи</label></div>
				<div>
					<div class="field pull-left">
						От
					</div>
					<div class="field pull-left">
						<?php
						$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
							'id' => 'planDateExec1',
							'Width' => 150
						));
						?>
					</div>
					<div class="field pull-left">
						До
					</div>
					<div class="field pull-left">
						<?php
						$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
							'id' => 'planDateExec2',
							'Width' => 150
						));
						?>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</li>
	</ul>
</div>
<?php

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'ListTasks',
	'Stretch' => true,
	'Key' => 'Tasks_Grid_1',
	'ModelName' => 'Tasks',
	'ShowFilters' => true,
	'Height' => 300,
	'Width' => 500,

	'Columns' => array(
		'Task_id' => array(
			'Name' => 'Номер',
			'FieldName' => 'Task_id',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 't.Task_id = :Value',
			),
			'Sort' => array(
				'Up' => 't.Task_id desc',
				'Down' => 't.Task_id',
			),
		),
		'status' => array(
			'Name' => 'Статус',
			'FieldName' => 'status',
			'Width' => 100,
			'Filter' => array(
				'Condition' => "status like '%:Value%'",
			),
			'Sort' => array(
				'Up' => 'status desc',
				'Down' => 'status',
			),
		),
		'TaskText' => array(
			'Name' => 'Содержание',
			'FieldName' => 'TaskText',
			'Width' => 100,

		),
		'creator' => array(
			'Name' => 'Постановщик',
			'FieldName' => 'creator',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 't.creator = :Value',
			),
			'Sort' => array(
				'Up' => 't.creator desc',
				'Down' => 't.creator',
			),
		),
		'employee' => array(
			'Name' => 'Исполнитель',
			'FieldName' => 'employee',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 't.employee = :Value',
			),
			'Sort' => array(
				'Up' => 't.employee desc',
				'Down' => 't.employee',
			),
		),
		'Deadline' => array(
			'Name' => 'Срок исполнения',
			'FieldName' => 'Deadline',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'dbo.truncdate(t.Deadline) = dbo.truncdate(\':Value\')',
			),
			'Sort' => array(
				'Up' => 't.Deadline desc',
				'Down' => 't.Deadline',
			),
		),
		'TasktypeName' => array(
			'Name' => 'Направление',
			'FieldName' => 'TasktypeName',
			'Width' => 100,
			'Filter' => array(
				'Condition' => "tt.TasktypeName like '%:Value%'",
			),
			'Sort' => array(
				'Up' => 'tt.TasktypeName desc',
				'Down' => 'tt.TasktypeName',
			),
		),
		'TaskpriorName' => array(
			'Name' => 'Приоритет',
			'FieldName' => 'TaskpriorName',
			'Width' => 100,
			'Filter' => array(
				'Condition' => "tp.TaskpriorName like '%:Value%'",
			),
			'Sort' => array(
				'Up' => 'tp.TaskpriorName desc',
				'Down' => 'tp.TaskpriorName',
			),
		),
		'Hours' => array(
			'Name' => 'Времязатратность',
			'FieldName' => 'Hours',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 't.Hours = :Value',
			),
			'Sort' => array(
				'Up' => 't.Hours desc',
				'Down' => 't.Hours',
			),
		),
		'DateExec' => array(
			'Name' => 'Дата выполнения',
			'FieldName' => 'DateExec',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'dbo.truncdate(t.DateExec) = dbo.truncdate(\':Value\')',
			),
			'Sort' => array(
				'Up' => 't.DateExec desc',
				'Down' => 't.DateExec',
			),
		),
		'DateCancel' => array(
			'Name' => 'Дата отмены',
			'FieldName' => 'DateCancel',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'dbo.truncdate(t.DateCancel) = dbo.truncdate(\':Value\')',
			),
			'Sort' => array(
				'Up' => 't.DateCancel desc',
				'Down' => 't.DateCancel',
			),
		),
	),
));
?>
<div class="field pull-left">
	<label>Постановка задачи</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.memo.almemo', array(
		'id' => 'taskText',
		'Width' => 450,
		'Height' => 200,
	));
	?>
</div>

<div class="field pull-left">
		<label>Соисполнители</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
			'id' => 'taskExecutors',
			'Stretch' => true,
			'Key' => 'TaskExecutors_Grid_1',
			'ModelName' => 'TaskExecutors',
			'ShowFilters' => false,
			'Height' => 150,
			'Width' => 500,

			'Columns' => array(
				'CreateDate' => array(
					'Name' => 'Дата',
					'FieldName' => 'CreateDate',
					'Width' => 100,
					'Filter' => array(
						'Condition' => 'te.CreateDate = :Value',
					),
					'Sort' => array(
						'Up' => 'te.CreateDate desc',
						'Down' => 'te.CreateDate',
					),
				),

				'EmployeeName' => array(
					'Name' => 'Исполнитель',
					'FieldName' => 'EmployeeName',
					'Width' => 100,
					'Filter' => array(
						'Condition' => 'e.EmployeeName like \'%:Value%\'',
					),
					'Sort' => array(
						'Up' => 'e.EmployeeName desc',
						'Down' => 'e.EmployeeName',
					),
				),

				'Note' => array(
					'Name' => 'Примечание',
					'FieldName' => 'Note',
					'Width' => 100,
					'Filter' => array(
						'Condition' => 'e.Note like \'%:Value%\'',
					),
					'Sort' => array(
						'Up' => 'e.Note desc',
						'Down' => 'e.Note',
					),
				),

			),
		));
		?>
</div>

<div class="clearfix"></div>

<div>
	<label>Ход работы</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
		'id' => 'taskNotes',
		'Stretch' => true,
		'Key' => 'TaskNotes_Grid_1',
		'ModelName' => 'TaskNotes',
		'ShowFilters' => true,
		'Height' => 300,
		'Width' => 500,

		'Columns' => array(
			'DateCreate' => array(
				'Name' => 'Дата',
				'FieldName' => 'DateCreate',
				'Width' => 100,
				'Filter' => array(
					'Condition' => 'dbo.truncdate(tn.DateCreate) = dbo.truncdate(\':Value\')',
				),
				'Sort' => array(
					'Up' => 'tn.DateCreate desc',
					'Down' => 'tn.DateCreate',
				),
			),
			'EmployeeName' => array(
				'Name' => 'Исполнитель',
				'FieldName' => 'EmployeeName',
				'Width' => 100,
				'Filter' => array(
					'Condition' => 'e.EmployeeName like \':Value%\'',
				),
				'Sort' => array(
					'Up' => 'e.EmployeeName desc',
					'Down' => 'e.EmployeeName',
				),
			),
			'NoteText' => array(
				'Name' => 'Содержание',
				'FieldName' => 'NoteText',
				'Width' => 100,
				'Filter' => array(
					'Condition' => 'tn.NoteText like \'%:Value%\'',
				),
				'Sort' => array(
					'Up' => 'tn.NoteText desc',
					'Down' => 'tn.NoteText',
				),
			),
			'DatePlanned' => array(
				'Name' => 'Дата след. шага',
				'FieldName' => 'DatePlanned',
				'Width' => 100,
				'Filter' => array(
					'Condition' => 'dbo.truncdate(tn.DatePlanned) = dbo.truncdate(\':Value\')',
				),
				'Sort' => array(
					'Up' => 'tn.DatePlanned desc',
					'Down' => 'tn.DatePlanned',
				),
			),
			'DateExec' => array(
				'Name' => 'Факт. время выполнения',
				'FieldName' => 'DateExec',
				'Width' => 100,
				'Filter' => array(
					'Condition' => 'dbo.truncdate(tn.DateExec) = dbo.truncdate(\':Value\')',
				),
				'Sort' => array(
					'Up' => 'tn.DateExec desc',
					'Down' => 'tn.DateExec',
				),
			),
		),
	))
	?>
</div>

<script>
	$('#taskTypeTree li').on('click', function(){
		$('#taskTypeTree .dxic').text($(this).find('span.text').eq(0).text())
		$('#taskType').aledit('SetValue', ($(this).attr('data-id')))
		$('#ListTasks').algridajax('LoadData')
		return false
	})

	Aliton.Links = [
		{
			Out: "taskPrior",
			In: "ListTasks",
			TypeControl: "Grid",
			Condition: "t.Taskprior_id = :Value",
			Name: "cmbTaslPrior_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "taskId",
			In: "ListTasks",
			TypeControl: "Grid",
			Condition: "t.Task_id = :Value",
			Name: "taskId_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "taskTextSearch",
			In: "ListTasks",
			TypeControl: "Grid",
			Condition: "t.Task_id like '%:Value%'",
			Name: "taskText_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "taskType",
			In: "ListTasks",
			TypeControl: "Grid",
			Condition: "t.Tasktype_id = :Value",
			Name: "Tasktype_id_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "taskTaken",
			In: "ListTasks",
			TypeControl: "Grid",
			Condition: "t.acceptdate is not null",
			ConditionFalse: "t.acceptdate is null",
			Name: "taskTaken_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "taskNotTaken",
			In: "ListTasks",
			TypeControl: "Grid",
			Condition: "t.acceptdate is null",
			ConditionFalse: "t.acceptdate is not null",
			Name: "taskNotTaken_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "taskExec",
			In: "ListTasks",
			TypeControl: "Grid",
			Condition: "t.dateexec is not null",
			ConditionFalse: "t.dateexec is null",
			Name: "taskExec_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
//		{
//			Out: "taskCanceled",
//			In: "ListTasks",
//			TypeControl: "Grid",
//			Condition: "t.DateCancel is not null",
//			ConditionFalse: "t.DateCancel is null",
//			Name: "taskCanceled_Filter1",
//			TypeFilter: "Internal",
//			TypeLink: "Filter",
//			isNullRun: false
//		},
		{
			Out: "ListTasks",
			In: "taskNotes",
			TypeControl: "Grid",
			Condition: "tn.Task_id = :Value",
			Field: "Task_id",
			Name: "taskNotes_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
		},
		{
			Out: "ListTasks",
			In: "taskExecutors",
			TypeControl: "Grid",
			Condition: "te.Task_Id = :Value",
			Field: "Task_id",
			Name: "taskExecutors_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
		},
		{
			Out: "ListTasks",
			In: "taskText",
			TypeControl: "Edit",
			Condition: ":Value",
			Field: "TaskText",
			Name: "TaskText_Filter2",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "taskDate",
			In: "ListTasks",
			TypeControl: "Grid",
			Condition: "dbo.truncdate(t.DateCreate) = dbo.truncdate(':Value')",
			Field: "DateCreate",
			Name: "DateEdit1_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},
		{
			Out: "emplCreate",
			In: "ListTasks",
			TypeControl: "Grid",
			Condition: "t.EmplCreate = :Value",
			Name: "cmbTaskEmplCreate_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "executor",
			In: "ListTasks",
			TypeControl: "Grid",
			Condition: "t.Empl_id = :Value",
			Name: "cmbTaskExecutor_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "allTask",
			In: "ListTasks",
			TypeControl: "Grid",
			Condition: "",
			ConditionFalse: "",
			Name: "allTask_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "iTask",
			In: "ListTasks",
			TypeControl: "Grid",
			Condition: "t.EmplCreate = <?php echo Yii::app()->user->Employee_id ?>",
			ConditionFalse: "",
			Name: "iTask_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "meTask",
			In: "ListTasks",
			TypeControl: "Grid",
			Condition: "t.Empl_id = <?php echo Yii::app()->user->Employee_id ?>",
			ConditionFalse: "",
			Name: "meTask_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},

		{
			Out: "leaderTime1",
			In: "ListTasks",
			TypeControl: "Grid",
			Condition: "dbo.truncdate(t.Deadline) >= dbo.truncdate(':Value')",
			Field: "DateCreate",
			Name: "DateEdit2_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},
		{
			Out: "leaderTime2",
			In: "ListTasks",
			TypeControl: "Grid",
			Condition: "dbo.truncdate(t.Deadline) <= dbo.truncdate(':Value')",
			Field: "DateCreate",
			Name: "DateEdit3_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},
		{
			Out: "nextDate1",
			In: "ListTasks",
			TypeControl: "Grid",
			Condition: "dbo.truncdate(tn.DatePlanned) >= dbo.truncdate(':Value')",
			Field: "DateCreate",
			Name: "DateEdit4_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},
		{
			Out: "nextDate2",
			In: "ListTasks",
			TypeControl: "Grid",
			Condition: "dbo.truncdate(tn.DatePlanned) <= dbo.truncdate(':Value')",
			Field: "DateCreate",
			Name: "DateEdit5_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},
		{
			Out: "planDateExec1",
			In: "ListTasks",
			TypeControl: "Grid",
			Condition: "dbo.truncdate(t.DatePlanned) >= dbo.truncdate(':Value')",
			Field: "DateCreate",
			Name: "DateEdit6_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},
		{
			Out: "planDateExec2",
			In: "ListTasks",
			TypeControl: "Grid",
			Condition: "dbo.truncdate(t.DatePlanned) <= dbo.truncdate(':Value')",
			Field: "DateCreate",
			Name: "DateEdit7_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},

	]
</script>