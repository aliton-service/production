<?php
/**
 *
 * @var EventsController $this
 */

$this->title = "Карточка события";

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'events-form',
	'htmlOptions'=>array(
		'class'=>'form-inline'
	),
	'enableAjaxValidation' => true,
	'enableClientValidation' => true,
));

?>

<div class="field pull-left">
	<label>Плановая дата</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
		'id' => 'plandate',
		'Value' => DateTimeManager::YiiDateToAliton($model->date_plan),
		'Name' => 'Events[date_plan]',
	));
	?>
</div>
<div class="field pull-left">
	<label>Интервал</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'periods',
		'Stretch' => true,
		'ModelName' => 'Periods',
		'Height' => 300,
		'Width' => 180,
		'KeyField' => 'code',
		'FieldName' => 'periodname',
		'KeyValue' => $model->prds_id,
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
</div>

<div class="clearfix"></div>

<div class="field pull-left">
	<label>Мастер</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'master',
		'Width' => 370,
		'Type' => 'String',
		'Value' => $model->master,
		'ReadOnly' => true,
	));
	?>
</div>

<div class="field pull-left">
	<label>Адрес</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'address',
		'Width' => 370,
		'Type' => 'String',
		'Value' => $model->addr,
		'ReadOnly' => true,
	));
	?>
</div>

<div class="field pull-left">
	<label>Тариф</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'serviceType',
		'Width' => 180,
		'Type' => 'String',
		'Value' => $model->ServiceType,
		'ReadOnly' => true,
	));
	?>
</div>

<div class="clearfix"></div>

<div class="field pull-left">
	<label>Исполнитель</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'executor',
		'Stretch' => true,
		'ModelName' => 'Employees',
		'Height' => 300,
		'Width' => 200,
		'KeyField' => 'Employee_id',
		'FieldName' => 'EmployeeName',
		'KeyValue' => $model->empl_id,
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
</div>

<div class="field pull-left">
	<label>Составитель</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'emplcreate',
		'Width' => 180,
		'Type' => 'String',
		'Value' => $model->emplcreate,
		'ReadOnly' => true,
	));
	?>
</div>

<div class="clearfix"></div>

<div class="field pull-left">
	<label>Примечание</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.memo.almemo', array(
		'id' => 'note',
		'Width' => 400,
		'Type' => 'String',
		'Value' => $model->note,
		'Name' => 'Events[note]',
	));
	?>
</div>

<div class="field pull-left">

</div>

<div class="clearfix"></div>

<?php
//$this->widget('application.extensions.alitonwidgets.tabs.altabs', array(
//	'reload' => false,
//	'header' => array(
//		array(
//			'name' => 'Прдложения по модернизации',
////			'ajax'=>true,
//			'options'=>array(
//				'url'=>'',
//			),
//		),
//		array(
//			'name' => 'Комплексное обслуживание',
////			'ajax'=>true,
//			'options'=>array(
//				'url'=>'',
//			),
//		),
//		array(
//			'name' => 'Другие предложения',
////			'ajax'=>true,
//			'options'=>array(
//				'url'=>'',
//			),
//		),
//	),
//	'content' => array(
//		array(
//			'id' => 'modern',
//		),
//
//		array(
//			'id' => 'complex',
//		),
//
//		array(
//			'id' => 'other',
//		)
//	),
//
//));
?>

<?php
$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
	'id' => 'eventid',
	'Width' => 200,
	'Value' =>$model->evnt_id,
	'Type' => 'String',
	'ReadOnly'=>true,
	'Visible'=>false,
));
$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
	'id' => 'offertype',
	'Width' => 200,
	'Value' =>1,
	'Type' => 'String',
	'ReadOnly'=>true,
	'Visible'=>false,
));
?>
<div class="btn-group offer-types">
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'modern',
		'Height' => 30,
		'Text' => 'Предложение по модернизации',
		'Type' => 'none',
		'OnAfterClick' => '$("#offertype").aledit("SetValue", 1); $("#ListEventOffers").algridajax("LoadData");',
	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'complex',
		'Height' => 30,
		'Text' => 'Комплексное обслуживание',
		'Type' => 'none',
		'OnAfterClick' => '$("#offertype").aledit("SetValue", 2); $("#ListEventOffers").algridajax("LoadData");',
	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'other',
		'Height' => 30,
		'Text' => 'Другие предложения',
		'Type' => 'none',
		'OnAfterClick' => '$("#offertype").aledit("SetValue", 3); $("#ListEventOffers").algridajax("LoadData");',
	));
	?>
</div>
<?php

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'ListEventOffers',
	'Stretch' => true,
	'Key' => 'Reference_EventOffers_Index_Grid_1',
	'ModelName' => 'EventOffers',
	'ShowFilters' => true,
	'Height' => 300,
	'Width' => 500,

	'Columns' => array(
		'offertype' => array(
			'Name' => 'Наименование предложения',
			'FieldName' => 'offertype',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'ot.offertype Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'ot.offertype desc',
				'Down' => 'ot.offertype',
			),
		),

		'resultname' => array(
			'Name' => 'Результат предложения',
			'FieldName' => 'resultname',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'r.resultname Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'r.resultname desc',
				'Down' => 'r.resultname',
			),
		),

		'note' => array(
			'Name' => 'Примечание',
			'FieldName' => 'note',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'eo.note Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'eo.note desc',
				'Down' => 'eo.note',
			),
		),

		'demand' => array(
			'Name' => 'Заявки',
			'FieldName' => 'demand',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'demand Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'demand desc',
				'Down' => 'demand',
			),
		),

		'prev_date' => array(
			'Name' => 'Дата (предыдущая)',
			'FieldName' => 'prev_date',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'dbo.truncdate(prev_date) = dbo.truncdate(\':Value%\')',
			),
			'Sort' => array(
				'Up' => 'prev_date desc',
				'Down' => 'prev_date',
			),
		),

		'prev_resultname' => array(
			'Name' => 'Результат (предыдущий)',
			'FieldName' => 'prev_resultname',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'prev_resultname Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'prev_resultname desc',
				'Down' => 'prev_resultname',
			),
		),

		'prev_note' => array(
			'Name' => 'Примечание (предыдущее)',
			'FieldName' => 'prev_note',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'prev_note Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'prev_note desc',
				'Down' => 'prev_note',
			),
		),

	)
));
?>

<div class="btn-group">
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'create',
		'Height' => 30,
		'Text' => 'Создать',
		'Type' => 'none',
		'OnAfterClick' => 'createEventOffers()',
	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'update',
		'Height' => 30,
		'Text' => 'Изменить',
		'Type' => 'none',
		'OnAfterClick' => 'updateEventOffers()',
	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'delete',
		'Height' => 30,
		'Text' => 'Удалить',
		'Type' => 'none',
		'OnAfterClick' => "aliton.form.delete('eventOffers/delete', algridajaxSettings.ListEventOffers.CurrentRow['code'], function(){
	 $('#ListEventOffers').algridajax('LoadData')
	 })"
	));
	?>
</div>

<br>
<label>Дата выполнения</label>
<?php
$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
	'id' => 'dateexec',
	'Name' => 'Events[date_exec]',
	'Width' => 160,
	'Value' => DateTimeManager::YiiDateToAliton($model->date_exec),
));
?>

<div class="field pull-left" style="padding-left: 0">
	<label>Форма отчетности</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'reportform',
		'Stretch' => true,
		'ModelName' => 'ReportForms',
		'Height' => 300,
		'Width' => 200,
		'KeyField' => 'rpfr_id',
		'FieldName' => 'ReportForm',
		'KeyValue' => $model->rpfr_id,
		'Name' => 'Events[rpfr_id]',
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => 'rf.ReportForm like \':Value%\'',
		),
		'Columns' => array(
			'ReportForm' => array(
				'Name' => 'Форма отчетности',
				'FieldName' => 'ReportForm',
				'Width' => 200,

			),
		),
	));
	?>
</div>

<div class="field pull-left">
	<label>Перед кем отчитался</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'who_reported',
		'Width' => 200,
		'Value' =>$model->who_reported,
		'Type' => 'String',
		'Name' => 'Events[who_reported]',
	));
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'whoreport',
		'Stretch' => true,
		'ModelName' => 'ContactInfo',
		'Height' => 300,
		'Width' => 200,
		'KeyField' => 'FIO',
		'FieldName' => 'FIO',

		'Filters' => array(
			array(
				'Type' => 'Internal',
				'Control' => 'Form',
				'Condition' => 'ci.ObjectGr_id = ' . $model->objectgr_id,
				'Value' => '',
				'Name' => 'Form1',
			),
		),

		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => 'ci.FIO like \':Value%\'',
		),
		'Columns' => array(
			'CustomerName' => array(
				'Name' => 'Контактное лицо',
				'FieldName' => 'FIO',
				'Width' => 200,

			),
		),
		'OnAfterChange' => 'alcomboboxajaxSettings.whoreport.CurrentRow ? $("#who_reported").aledit("SetValue",alcomboboxajaxSettings.whoreport.CurrentRow["FIO"]) : ""'
	));
	?>
</div>

<div class="field pull-left">
	<label>Дата прихода акта по ТО</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
		'id' => 'date_act',
		'Name' => 'Events[date_act]',
		'Width' => 160,
		'Value' => DateTimeManager::YiiDateToAliton($model->date_act),
	));
	?>
</div>

<div class="clearfix"></div>
<label>Итоги оценки</label>
<?php
$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
	'id' => 'evaluation',
	'Width' => 350,
	'Value' => $model->evaluation,
	'Type' => 'String',
	'Name' => 'Events[evaluation]',
));
?>

<div id="eventoffers-edit" class="hover"></div>
<style>
	.ui-dialog {
		overflow: visible;
	}
	.ui-dialog .ui-dialog-content {
		overflow: visible;
	}
</style>

<div class="btn-group">
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'BtnSave',
		'Width' => 124,
		'Height' => 30,
		'Text' => 'Сохранить',
		'Type' => 'AjaxForm',
		'Href' => Yii::app()->createUrl('events/update',array('id'=>$model->evnt_id)),
		'FormName' => 'events-form',
		'OnAfterAjaxSuccess' => 'alert("Сохранено")',
	));
	?>
</div>

<?php $this->endWidget(); ?>

<script>

	$(document).on('click', '.btn-group.offer-types .albutton', function() {
		$('.btn-group.offer-types .albutton').removeClass('selected')
		$(this).addClass('selected')
	})

	var event_offers = false
	var action_save = ''


	function createEventOffers() {
		//eqip_gr = algridajaxSettings.ListEquipGroups.CurrentRow['grp_id']
		action_save = 'create'
		$('#eventoffers-edit').load('/?r=eventOffers/create')
		$('#eventoffers-edit').dialog({
			minWidth:400,
			minHeight: 350,
		})
	}

	function updateEventOffers() {
		event_offers = algridajaxSettings.ListEventOffers.CurrentRow['code']
		action_save = 'update'
		$('#eventoffers-edit').load('/?r=eventOffers/update&id='+event_offers)
//		$('#name-eqiptree').val($('#equips-tree li span.text.selected').text())
		$('#eventoffers-edit').dialog({
			minWidth:400,
			minHeight: 350,
		})
	}

	function saveEventOffers(){
		var data = {
			EventOffers: {
				oftp_id: alcomboboxajaxSettings["offertype-eventoffer"].CurrentRow["code"],
				note: almemoSettings["note-eventoffer"].Value,
				situation: almemoSettings["situation-eventoffer"].Value,
				rslt_id: alcomboboxajaxSettings["rslt_id-eventoffer"].CurrentRow["rslt_id"],
				evnt_id: '<?php echo $model->evnt_id ?>',
			}
		}
		var update_query = ''
		if(action_save === 'update') {
			data.EventOffers.code = event_offers
			update_query = '&id='+event_offers
		}
		console.log(data)
		$.ajax({
			url: '/?r=eventOffers/'+action_save+update_query,
			type: 'post',
			data: data,
			dataType: 'json',
			success: function (r) {
				if(r.status !== 'ok') {
					// error
					$('#eventoffers-edit').html($(r.responseText))
				}
				$('#ListEventOffers').algridajax('LoadData')
				alert('success')
			},
			error: function (r) {
				if(r.status == 200) {
					$('#eventoffers-edit').html($(r.responseText))
				} else {
					alert('Произошла непридвиденная ошибка, повторите попытку позже')
				}
			}
		})
	}



	Aliton.Links = [
		{
			Out: "eventid",
			In: "ListEventOffers",
			TypeControl: "Grid",
			Condition: "eo.evnt_id = :Value",
			//Field: "Employee_id",
			Name: "Edit1_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false

		},
		{
			Out: "offertype",
			In: "ListEventOffers",
			TypeControl: "Grid",
			Condition: "ot.offergroup = :Value",
			//Field: "Employee_id",
			Name: "Edit2_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false

		},
	]
</script>

