<?php
/**
 *
 * @var TaskNotesController $this
 */

?>
<div class="field pull-left">
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
	));

	?>
</div>
<div class="field pull-left">
	<div><label>Отправить письмо с ходом работ</label></div>
	<div style="margin-top: 15px;">
		<?php
		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'taskNotesSendCreator',
			'Text' => 'Постановщику',
			'Type' => 'none'
		));
		?>
	</div>
	<div style="margin-top: 30px;">
		<?php
		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'taskNotesSendExecutor',
			'Text' => 'Исполнителю',
			'Type' => 'none'
		));
		?>
	</div>
</div>
<div class="clearfix"></div>
<form id="form-tasknotes">
	<div class="field">
		<label>Содержание</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id' => 'taskNotesText',
			'Width' => 600,
			'Name' => 'TaskNotes[NoteText]'
		));
		?>
	</div>
	<div class="field pull-left">
		<label>Дата следуещего шага</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
			'id' => 'taskNotesNextDate',
			'Width' => 150,
			'Name' => 'TaskNotes[DatePlanned]'
		));
		?>
	</div>
	<div class="field pull-left" style="margin-top: 18px;">
		<?php
		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'taskNotesAdd',
			'Text' => 'Добавить',
			'Type' => 'AjaxForm',
			'Href' => Yii::app()->createUrl('taskNotes/create', array('task_id' => $id)),
			'FormName' => 'form-tasknotes',
			'OnAfterAjaxSuccess' => '$("#taskNotes").algridajax("Load");',
		));
		?>
	</div>
	<div class="field pull-left" style="margin-top: 18px;">
		<?php
		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'taskNotesTagExec',
			'Text' => 'Отметка о выполнении',
			'Type' => 'none'
		));
		?>
	</div>
	<div class="clearfix"></div>
</form>



<script>
	$('#taskNotesTagExec').on('click', function(){
		var data = $('#form-tasknotes').serialize()
		$.ajax({
			url: '/?r=taskNotes/update&id='+algridajaxSettings.taskNotes.CurrentRow['Tasknote_id'],
			type: 'post',
			data: data,
			dateType: 'json',
			success: function(r) {
				r = JSON.parse(r)
				if(r.status != 'ok') {
					alert('Произошла непридведенная ошибка. Повторите попытку позднее')
					return false
				}
				$("#taskNotes").algridajax("Load")
				alert('ok')
			}
		})
	})

	$('#taskNotesSendCreator').on('click', function(){
		sendTaskNotes(aleditSettings.taskCreatorId.Value)
	})

	$('#taskNotesSendExecutor').on('click', function(){
		sendTaskNotes(aleditSettings.taskExecutorId.Value)
	})

	function sendTaskNotes(recipient) {
		var data = {
			TaskNotes: {
				Empl_id: recipient,
				Task_id: aleditSettings.taskId.Value
			}
		}
		$.ajax({
			url: '/?r=taskNotes/sendTaskNotes',
			type: 'post',
			data: data,
			dataType: 'json',
			success: function(r) {
				if(r.status != 'ok') {
					alert(r.data.msg)
					return false
				}
				alert('Сообщение отправлено')
			}
		})
	}
</script>