<?php
/**
 *
 * @var TaskExecutorsController $this
 * @var #A#M#C\Controller.actionIndex.0|? $id
 */
?>
<div class="field pull-left">
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

<div class="field pull-left" style="margin-top: 20px">
	<div class="field">
		<?php
		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'taskExecutorsAdd',
			'Text' => 'Добавить в список',
			'Type' => 'none'
		));
		?>
	</div>
	<div class="field">
		<?php
		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'taskExecutorsDel',
			'Text' => 'Удалить из списка',
			'Type' => 'none',
			'OnAfterClick' => "aliton.form.delete('taskExecutors/delete', algridajaxSettings.taskExecutors.CurrentRow['Taskexecutor_Id'],
													function(){ $('#taskExecutors').algridajax('LoadData'); })"
		));
		?>
	</div>
</div>
<div class="clearfix"></div>

<div id="formAddExecutor" class="hidden"></div>

<script>
	$('#taskExecutorsAdd').on('click', function () {
		$('#formAddExecutor').load('<?php echo Yii::app()->createUrl('taskExecutors/create') ?>').dialog()
	})

	function addTaskExecutors() {
		var data = $('#form-addexecutors').serializeArray()
		data.push({name:'TaskExecutors[Task_Id]',value:aleditSettings.taskId.Value})
		$.ajax({
			url:'<?php echo Yii::app()->createUrl('taskExecutors/create') ?>',
			data:data,
			type:'post',
			dataType: 'json',
			success: function (r) {
				if(r.status != 'ok') {
					alert('Произошла непредвиденная ошибка. Повторите попытку позднее.')
					return false
				}
				$('#taskExecutors').algridajax('Load')
				alert('ok')
			}
		})
	}
</script>
