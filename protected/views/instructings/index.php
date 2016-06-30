<?php
/**
 *
 * @var InstructingsController $this
 */

$this->title = 'Инструктаж';

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'InstructingsGrid',
	'Stretch' => true,
	'Key' => 'Site_Index_InstructingsGrid_1',
	'ModelName' => 'Instructings',
	'ShowFilters' => true,
	'Height' => 300,
	'Width' => 500,
	'Columns' => array(
		'Date' => array(
			'Name' => 'Дата проведения',
			'FieldName' => 'Date',
			'Width' => 100,
			'Filter' => array(
				'Condition' => "i.Date = :Value",
			),
			'Sort' => array(
				'Up' => 'i.Date desc',
				'Down' => 'i.Date',
			),
		),
		'Name' => array(
			'Name' => 'Название',
			'FieldName' => 'Name',
			'Width' => 100,
			'Filter' => array(
				'Condition' => "i.Name like ':Value%'",
			),
			'Sort' => array(
				'Up' => 'i.Name desc',
				'Down' => 'i.Name',
			),
		),
		'EmployeeName' => array(
			'Name' => 'Исполнитель',
			'FieldName' => 'EmployeeName',
			'Width' => 100,
			'Filter' => array(
				'Condition' => "EmployeeName like ':Value%'",
			),
			'Sort' => array(
				'Up' => 'EmployeeName desc',
				'Down' => 'EmployeeName',
			),
		),'Note' => array(
			'Name' => 'Название',
			'FieldName' => 'Note',
			'Width' => 100,
			'Filter' => array(
				'Condition' => "i.Note like ':Value%'",
			),
			'Sort' => array(
				'Up' => 'i.Note desc',
				'Down' => 'i.Note',
			),
		),


	),
	'OnDblClick' => '$("#update-instruct").albutton("BtnClick");'
));

?>
<div class="btn-group"><?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'create-instruct',
		'Height' => 30,
		'Text' => 'Создать',
		'Type' => 'none',
		'OnAfterClick' => 'createInstruct()',

	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'update-instruct',
		'Height' => 30,
		'Text' => 'Изменить',
		'Type' => 'none',
		//'OnAfterClick' => "window.open('/?r=instructings/update&id='+algridajaxSettings.InstructingsGrid.CurrentRow['Instructing_id'])"
		'OnAfterClick' => 'updateInstruct()',
	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'delete-instruct',
		'Height' => 30,
		'Text' => 'Удалить',
		'Type' => 'none',
		'OnAfterClick' => "aliton.form.delete('instructings/delete', algridajaxSettings.InstructingsGrid.CurrentRow['Instructing_id'], function(){
		 $('#InstructingsGrid').algridajax('LoadData')
		 })"
	));
	?></div>
<div id="instruct-edit" class="hidden"></div>
<style>
	.ui-dialog {
		overflow: visible;
	}
	.ui-dialog .ui-dialog-content {
		overflow: visible;
	}
</style>
<script>
	var instr_id = 1
	var action_save = ''


	function createInstruct() {
		//instr_id = algridajaxSettings.Listinstructings.CurrentRow['grp_id']
		action_save = 'create'
		$('#instruct-edit').load('/?r=instructings/create')
		$('#instruct-edit').dialog()
	}

	function updateInstruct() {
		instr_id = algridajaxSettings.InstructingsGrid.CurrentRow['Instructing_id']
		action_save = 'update'
		$('#instruct-edit').load('/?r=instructings/update&id='+instr_id)
//		$('#name-eqiptree').val($('#equips-tree li span.text.selected').text())
		$('#instruct-edit').dialog()
	}

	function saveInstruct(){
		var data = {
			Instructings: {
				Name: $('#instruct-form input[name="Instructings[Name]"]').val(),
				Note: $('#instruct-form input[name="Instructings[Note]"]').val(),
				Date: $('#instruct-form input[name="Instructings[Date]"]').val(),
				UserExec: $('#instruct-form input[name="Instructings[UserExec]"]').val(),
				Employee_id: algridajaxSettings.EmployeesGrid.CurrentRow['Employee_id'],
			}
		}
		var update_query = ''
		if(action_save === 'update') {
			update_query = '&id='+instr_id
		}
		console.log(data)
		$.ajax({
			url: '/?r=instructings/'+action_save+update_query,
			type: 'post',
			data: data,
			dataType: 'json',
			success: function (r) {
				if(r.status !== 'ok') {
					// error
				}
				$('#InstructingsGrid').algridajax('LoadData')
				alert(r.data.msg)
			},
			error: function (r) {
				if(r.status == 200) {
					$('#instruct-edit').html($(r.responseText))
				} else {
					alert('Произошла непридвиденная ошибка, повторите попытку позже')
				}
			}
		})
	}



</script>

<script>
//	Aliton.Links.push({
//		Out: "EmployeesGrid",
//		In: "InstructingsGrid",
//		TypeControl: "Grid",
//		Condition: "i.Employee_id = :Value",
//		Field: "Employee_id",
//		Name: "instrFilter",
//		TypeFilter: "Internal",
//		TypeLink: "Filter",
//	});
</script>