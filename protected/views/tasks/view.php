<?php
/**
 *
 * @var TasksController $this
 * @var \Tasks $model
 */

$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
	'id' => 'taskCreatorId',
	'Width' => 150,
	'Value' => $model->EmplCreate,
	'ReadOnly' => true,
	'Visible' => false,
));
$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
	'id' => 'taskExecutorId',
	'Width' => 150,
	'Value' => $model->Empl_id,
	'ReadOnly' => true,
	'Visible' => false,
));

$this->title = 'Задача № ' . $model->Task_id;
?>
<div>
	<div class="field pull-left">
		<label>Номер</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id' => 'taskId',
			'Width' => 150,
			'Value' => $model->Task_id,
			'ReadOnly' => true,
		));
		?>
	</div>
	<div class="field pull-left">
		<label>Постановщик</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id' => 'taskCreator',
			'Width' => 150,
			'Value' => $model->creator,
		));
		?>
	</div>
	<div class="field pull-left">
		<label>Исполнитель</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id' => 'taskExecutor',
			'Width' => 150,
			'Value' => $model->employee,
		));
		?>
	</div>
	<div class="clearfix"></div>
</div>

<div>
	<div class="field pull-left">
		<label>Дата создания</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id' => 'taskDateCreate',
			'Width' => 150,
			'Value' => $model->DateCreate,
		));
		?>
	</div>
	<div class="field pull-left">
		<label>Направление</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id' => 'taskType',
			'Width' => 150,
			'Value' => $model->TasktypeName,
		));
		?>
	</div>
	<div class="field pull-left">
		<label>Приоритет</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id' => 'taskPrior',
			'Width' => 150,
			'Value' => $model->TaskpriorName,
		));
		?>
	</div>
	<div class="clearfix"></div>
</div>

<div>
	<div class="field pull-left">
		<label>Срок исполнения</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id' => 'taskDeadLine',
			'Width' => 150,
			'Value' => $model->Deadline,
		));
		?>
	</div>
	<div class="field pull-left">
		<label>Времязатратность</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id' => 'taskTime',
			'Width' => 150,
			'Value' => $model->HoursExec,
		));
		?>
	</div>
	<div class="clearfix"></div>
</div>

<div class="field">
	<label>Постановка задачи</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.memo.almemo', array(
		'id' => 'taskText',
		'Width' => 600,
		'Height' => 100,
		'Value' => $model->TaskText,
	));
	?>
</div>


<div class="field pull-left">
	<label>Причина отмены</label>
	<div class="clearfix"></div>
	<div class="pull-left">
		<?php
			$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
				'id' => 'taskCancelReason',
				'Width' => 500,
				'Value' => '',
			));
		?>
	</div>
	<div class="pull-left" style="margin-left: 7px;">
		<?php
		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'taskCancel',
			'Text' => 'Отменить',
			'Type' => 'none'
		));
		?>
	</div>
	<div class="clearfix"></div>
</div>
<div class="clearfix"></div>

<div>
	<?php

	$this->widget('application.extensions.alitonwidgets.tabs.altabs', array(
		'reload' => false,
		'header' => array(
			array(
				'name' => 'Ход работы',
				'ajax'=>true,
				'options'=>array(
					'url'=>$this->createUrl('taskNotes/index',array('id'=>$model->Task_id)),
				),
			),

			array(
				'name' => 'Соисполнители',
				'ajax'=>true,
				'options'=>array(
					'url'=>$this->createUrl('taskExecutors/index',array('id'=>$model->Task_id)),
				),
			),

			array(
				'name' => 'Файлы',
				'ajax'=>true,
				'options'=>array(
					'url'=>$this->createUrl('Tasks/files'),
				),
			),

		),
		'content' => array(
			array(
				'id' => 'TabProceess',
			),

			array(
				'id' => 'TabExecutors',
			),

			array(
				'id' => 'TabFiles',
			),
		),
		//'afterLoad' => 'binSendNote()'
	));

	?>
	<div class="clearfix"></div>
</div>

<div class="btn-group btn-exec green">
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'taskAccept',
		'Text' => 'Принять'
	));
	?>
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'taskExec',
		'Text' => 'Выполнить'
	));
	?>
</div>

<script>

	$('#taskCancel').on('click', function(){
		var data = {
			Tasks: {
				delreason: aleditSettings.taskCancelReason.Value
			}
		}
		$.ajax({
			url: '<?php echo Yii::app()->createUrl('tasks/cancel', array('id'=>$model->Task_id)) ?>',
			data: data,
			type:'post',
			dataType:'json',
			success: function(r){
				if(r.status != 'ok') {
					alert('Произошла непридведенная ошибка. Повторите попытку позднее.')
					return false
				}
				alert('ok')
			}
		})
	})

	Aliton.Links = [
		{
			Out: "taskId",
			In: "taskNotes",
			TypeControl: "Grid",
			Condition: "tn.Task_id = :Value",
			Name: "taskId_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "taskId",
			In: "taskExecutors",
			TypeControl: "Grid",
			Condition: "te.Task_id = :Value",
			Name: "taskId_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},

	]
</script>