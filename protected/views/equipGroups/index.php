
<br>
<?php
/* @var $this EquipGroupsController */
/* @var $model EquipGroups */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Groups'=>array('index'),
	
);
$this->title = 'Группы ТМЦ';
$this->setPageTitle('Группы ТМЦ');
$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'ListEquipGroups',
	'Stretch' => true,
	'Key' => 'Reference_EquipGroups_Index_Grid_1',
	'ModelName' => 'EquipGroups',
	//'ShowFilters' => true,
	'Height' => 300,
	'Width' => 500,
	'Columns' => array(
		'name' => array(
			'Name' => 'Название',
			'FieldName' => 'name',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'eg.name Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'eg.name desc',
				'Down' => 'eg.name',
			),
		),

	),
	'OnDblClick' => '$("#update").albutton("BtnClick")',


));
?>
<div class="btn-group">
<?php
$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'create',
	'Height' => 30,
	'Text' => 'Создать',
	'Type' => 'none',
//	'Href' => Yii::app()->createUrl('EquipGroups/create')
	'OnAfterClick' => 'createEquipGroup()'
));

$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'update',
	'Height' => 30,
	'Text' => 'Изменить',
	'Type' => 'none',
	'OnAfterClick' => 'updateEquipGroup()'
));

$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'delete',
	'Height' => 30,
	'Text' => 'Удалить',
	'Type' => 'none',
	'OnAfterClick' => "aliton.form.delete('equipGroups/delete', algridajaxSettings.ListEquipGroups.CurrentRow['grp_id'], function(){
	 $('#ListEquipGroups').algridajax('LoadData')
	 })"
));

?></div"><div class="clearfix"></div><br>
<?php

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'ListEquipSubgroups',
	'Stretch' => true,
	'Key' => 'Reference_EquipSubgroups_Index_Grid_1',
	'ModelName' => 'EquipSubgroups',
	//'ShowFilters' => true,
	'Height' => 300,
	'Width' => 500,
	'Columns' => array(
		'name' => array(
			'Name' => 'Название',
			'FieldName' => 'name',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'esg.name Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'esg.name desc',
				'Down' => 'esg.name',
			),
		),


	),
	'OnDblClick' => '$("#updateSub").albutton("BtnClick")',


));
?><div class="btn-group"><?php
$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'createSub',
	'Height' => 30,
	'Text' => 'Создать',
	'Type' => 'none',
//	'Href' => Yii::app()->createUrl('EquipSubgroups/create')
	'OnAfterClick' => 'createSubEquipGroup()'
));

$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'updateSub',
	'Height' => 30,
	'Text' => 'Изменить',
	'Type' => 'none',
	'OnAfterClick' => 'updateSubEquipGroup()'
));

$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'deleteSub',
	'Height' => 30,
	'Text' => 'Удалить',
	'Type' => 'none',
	'OnAfterClick' => "aliton.form.delete('equipSubgroups/delete', algridajaxSettings.ListEquipSubgroups.CurrentRow['sgrp_id'], function(){
	 $('#ListEquipSubgroups').algridajax('LoadData')
	 })"
));
?></div><?php
//$this->menu=array(
//	array('label'=>'Создать EquipGroups', 'url'=>array('create')),
//	array('label'=>'Редактировать EquipGroups', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'update')),
//	array('label'=>'Удалить EquipGroups', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'delete')),
//);
//
//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//	$('.search-form').toggle();
//	return false;
//});
//$('.search-form form').submit(function(){
//	$('#equip-groups-grid').yiiGridView('update', {
//		data: $(this).serialize()
//	});
//	return false;
//});
//");
//?>
<!---->
<!--<h1>Редактирование Equip Groups</h1>-->
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
//	'id'=>'equip-groups-grid',
//	'dataProvider'=>$model->search(),
//	'cssFile'=>'css/reference/gridview/styles.css',
//	'pager'=>array('cssFile'=>'css/reference/gridview/pager.css', ),
//	'filter'=>$model,
//	'columns'=>array(
//		// 'grp_id',
//		'name',
//		// 'Lock',
//		// 'EmplLock',
//		// 'DateLock',
//		// 'EmplCreate',
//		/*
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
<!--			data: 'EquipGroups=EquipGroups',-->
<!--			success: function() {-->
<!---->
<!--			}-->
<!--		})-->
<!--	})-->
<!--</script>-->
<!---->
<!---->
<div id="eqip-edit"></div>
<script>
	Aliton.Links = [{
		Out: "ListEquipGroups",
		In: "ListEquipSubgroups",
		TypeControl: "Grid",
		Condition: "esg.grp_id = :Value",
		Field: "grp_id",
		Name: "TestGrid2_Filter1",
		TypeFilter: "Internal",
		TypeLink: "Filter",
	}];
</script>

<script>
	var eqip_gr = 1
	var action_save = ''


	function createEquipGroup() {
		//eqip_gr = algridajaxSettings.ListEquipGroups.CurrentRow['grp_id']
		action_save = 'create'
		$('#eqip-edit').load('/?r=equipGroups/create')
		$('#eqip-edit').dialog()
	}

	function updateEquipGroup() {
		eqip_gr = algridajaxSettings.ListEquipGroups.CurrentRow['grp_id']
		action_save = 'update'
		$('#eqip-edit').load('/?r=equipGroups/update&id='+eqip_gr)
//		$('#name-eqiptree').val($('#equips-tree li span.text.selected').text())
		$('#eqip-edit').dialog()
	}

	function saveEquipGr(){
		var data = {
			EquipGroups: {
				name: $('#equip-groups-form input[name="EquipGroups[name]"]').val()
			}
		}
		var update_query = ''
		if(action_save === 'update') {
			data.EquipGroups.grp_id = eqip_gr
			update_query = '&id='+eqip_gr
		}
		console.log(data)
		$.ajax({
			url: '/?r=equipGroups/'+action_save+update_query,
			type: 'post',
			data: data,
			dataType: 'json',
			success: function (r) {
				if(r.status !== 'ok') {
					// error
				}
				$('#ListEquipGroups').algridajax('LoadData')
				alert('success')
			},
			error: function (r) {
				if(r.status == 200) {
					$('#eqip-edit').html($(r.responseText))
				} else {
					alert('Произошла непридвиденная ошибка, повторите попытку позже')
				}
			}
		})
	}



var equip_subgr = false

	function createSubEquipGroup() {
		eqip_gr = algridajaxSettings.ListEquipGroups.CurrentRow['grp_id']
		//equip_subgr = algridajaxSettings.ListEquipSubgroups.CurrentRow['sgrp_id']
		action_save = 'create'
		$('#eqip-edit').load('/?r=equipSubgroups/create')
		$('#eqip-edit').dialog()
	}

	function updateSubEquipGroup() {
		eqip_gr = algridajaxSettings.ListEquipGroups.CurrentRow['grp_id']
		equip_subgr = algridajaxSettings.ListEquipSubgroups.CurrentRow['sgrp_id']
		action_save = 'update'
		$('#eqip-edit').load('/?r=equipSubgroups/update&id='+equip_subgr)
//		$('#name-eqiptree').val($('#equips-tree li span.text.selected').text())
		$('#eqip-edit').dialog()
	}

	function saveSubEquipGr(){
		var data = {
			EquipSubgroups: {
				name: $('#equip-subgroups-form input[name="EquipSubgroups[name]"]').val()
			}
		}
		data.EquipSubgroups.grp_id = eqip_gr
		var update_query = ''
		if(action_save === 'update') {
			data.EquipSubgroups.grp_id = eqip_gr
			update_query = '&id='+equip_subgr
		}
		console.log(data)
		$.ajax({
			url: '/?r=equipSubgroups/'+action_save+update_query,
			type: 'post',
			data: data,
			dataType: 'json',
			success: function (r) {
				if(r.status !== 'ok') {
					// error
				}
				$('#ListEquipSubgroups').algridajax('LoadData')
				alert('success')
			},
			error: function (r) {
				if(r.status == 200) {
					$('#eqip-edit').html($(r.responseText))
				} else {
					alert('Произошла непридвиденная ошибка, повторите попытку позже')
				}
			}
		})
	}


</script>