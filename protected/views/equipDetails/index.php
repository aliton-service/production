<?php
/* @var $this EquipDetailsController */
/* @var $model EquipDetails */

$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
	'id' => 'equipId',
	'Value' => $_GET['id'],
	'Visible' => false,
));

$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
	'id' => 'equipType',
	'Value' => $_GET['type'],
	'Visible' => false,
));

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'ListEquipDetails',
	'Stretch' => true,
	'Key' => 'Equip_Details_Grid_1',
	'ModelName' => 'EquipDetails',
	'ShowFilters' => true,
	'Height' => 300,
	'Width' => 500,

	'Columns' => array(
		'EquipName' => array(
			'Name' => 'Наименование',
			'FieldName' => 'EquipName',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'e.EquipName = :Value',
			),
			'Sort' => array(
				'Up' => 'e.EquipName desc',
				'Down' => 'e.EquipName',
			),
		),
	),
));

?>

<div class="btn-group">
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'create',
		'Height' => 30,
		'Text' => 'Добавить',
		'Type' => 'none',
		'OnAfterClick' => "createEquipDetails()"
	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'update',
		'Height' => 30,
		'Text' => 'Изменить',
		'Type' => 'none',
		'OnAfterClick' => "updateEquipDetails()"
	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'delete',
		'Height' => 30,
		'Text' => 'Удалить',
		'Type' => 'none',
		'OnAfterClick' => "aliton.form.delete('equipDetails/delete', algridajaxSettings.ListEquipDetails.CurrentRow['eqdt_id'],
		function(){ $('#ListEquipDetails').algridajax('LoadData'); })"
	));

	?>
</div>

<div id="equipDetailsEdit" class="hidden"></div>
<style>
	.ui-dialog {
		overflow: visible;
	}
	.ui-dialog .ui-dialog-content {
		overflow: visible;
	}
</style>
<script>
	var eqdt_id = false
	function createEquipDetails() {
		//eqip_gr = algridajaxSettings.ListEquipGroups.CurrentRow['grp_id']
		action_save = 'create'
		$('#equipDetailsEdit').load('/?r=equipDetails/create')
		$('#equipDetailsEdit').dialog({
			minWidth:400,
			minHeight:120
		})
	}

	function updateEquipDetails() {
		eqdt_id = algridajaxSettings.ListEquipDetails.CurrentRow['equip_id']
		action_save = 'update'
		$('#equipDetailsEdit').load('/?r=equipDetails/update&id='+eqdt_id)
//		$('#name-eqiptree').val($('#equips-tree li span.text.selected').text())
		$('#equipDetailsEdit').dialog({
			minWidth:400,
			minHeight:120
		})
	}

	function saveEquipDetails(){
		var data = {
			EquipDetails: {
				item: alcomboboxajaxSettings.itemId.CurrentRow['Equip_id'],
				equip_id: aleditSettings.equipId.Value,
				type: aleditSettings.equipType.Value
			}
		}
		var update_query = ''
		if(action_save === 'update') {
			//data.EquipDetails.eqdt_id = algridajaxSettings.ListEquipDetails.CurrentRow['eqdt_id']
			update_query = '&id='+algridajaxSettings.ListEquipDetails.CurrentRow['eqdt_id']
		}
		//console.log(data)
		$.ajax({
			url: '/?r=equipDetails/'+action_save+update_query,
			type: 'post',
			data: data,
			dataType: 'json',
			success: function (r) {
				if(r.status !== 'ok') {
					// error
				}
				$('#ListEquipDetails').algridajax('LoadData')
				alert('Сохранено')
			},
			error: function (r) {
				if(r.status == 200) {
					$('#equipDetailsEdit').html($(r.responseText))
				} else {
					alert('Произошла непридвиденная ошибка, повторите попытку позже')
				}
			}
		})
	}

	Aliton.Links = [
		{
			Out: "equipId",
			In: "ListEquipDetails",
			TypeControl: "Grid",
			Condition: "ed.equip_id = :Value",
			Name: "Edit1_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "equipType",
			In: "ListEquipDetails",
			TypeControl: "Grid",
			Condition: "ed.type = :Value",
			Name: "Edit2_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		}
	]

</script>

<?php


//$this->breadcrumbs=array(
//	'Справочники'=>array('/reference/index'),
//	'Equip Details'=>array('index'),
//
//);
//
//$this->menu=array(
//	array('label'=>'Создать EquipDetails', 'url'=>array('create')),
//	array('label'=>'Редактировать EquipDetails', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'update')),
//	array('label'=>'Удалить EquipDetails', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'delete')),
//);
//
//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//	$('.search-form').toggle();
//	return false;
//});
//$('.search-form form').submit(function(){
//	$('#equip-details-grid').yiiGridView('update', {
//		data: $(this).serialize()
//	});
//	return false;
//});
//");
//?>
<!---->
<!--<h1>Редактирование Equip Details</h1>-->
<!---->
<!---->
<!---->
<!---->
<!---->
<!--<div class="search-form" style="display:none">-->
<?php //$this->renderPartial('_search',array(
//	'model'=>$model,
//)); ?>
<!--</div><!-- search-form -->
<!---->
<?php //$this->widget('zii.widgets.grid.CGridView', array(
//	'id'=>'equip-details-grid',
//	'dataProvider'=>$model->search(),
//	'cssFile'=>'css/reference/gridview/styles.css',
//	'pager'=>array('cssFile'=>'css/reference/gridview/pager.css', ),
//	'filter'=>$model,
//	'columns'=>array(
//		'eqdt_id',
//		'equip_id',
//		'item',
//		'type',
//		'date_create',
//		'user_create',
//		/*
//		'Lock',
//		'EmplLock',
//		'DateLock',
//		'EmplCreate',
//		'DateCreate',
//		'EmplChange',
//		'DateChange',
//		'EmplDel',
//		'DelDate',
//		*/
//		array(
//			'class'=>'CButtonColumn',
//		),
//	),
//));
//?>
<!---->
<!--<script type="text/javascript">-->
<!--	$('body').on('click','.items tbody tr', function(){-->
<!--		-->
<!--		var link = $(this).find('td.button-column a.update').attr('href');-->
<!--		$('li[data-action=update] a').attr('href', link);-->
<!---->
<!--		link = $(this).find('td.button-column a.delete').attr('href');-->
<!--		$('li[data-action=delete] a').attr('href', link);-->
<!---->
<!--	});-->
<!---->
<!--	$('body').on('click','li[data-action=delete] a',function(){-->
<!--		$.ajax({-->
<!--			type: 'post',-->
<!--			url: $(this).attr('href'),-->
<!--			data: 'EquipDetails=EquipDetails',-->
<!--			success: function() {-->
<!---->
<!--			}-->
<!--		})-->
<!--	})-->
<!--</script>-->




