<br><?php
/* @var $this EquipsController */
/* @var $model Equips */
$this->title = 'Оборудования';
$this->setPageTitle('Оборудования');
$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equips'=>array('index'),
	
);
?>
<div class="hidden">
	<?php
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'cat-list',

		'Type' => 'String',
		'Mode' => "Auto",
	));
	?>
</div>
<div class="pull-left" style="width:20%;height: 400px;overflow: auto;border: 1px solid #000;margin: 15px 25px 15px 5px">
	<div id="equips-tree">

		<?php
		$this->widget('CTreeView', array(
			'collapsed'=>true,
			'control'=>'treecontrol',
			'animated'=>'fast',
			'cssFile'=>'css/treeview/treeview.css',
			'htmlOptions'=>array(

				'class'=>'treeview-red'),
			'data'=>Tree::getTree('EqipGroups',0, array(
				'id'=>'group_id',
				'parent'=>'parent_group_id',
				'name'=>'group_name',
				'notDel'=>'DelDate Is Null',
			))

		));
		?>
	</div>
</div>
<div class="pull-left" style="width: 75%">
	<?php
$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'ListEquips',
	'Stretch' => true,
	'Key' => 'Reference_Equips_Index_Grid_1',
	'ModelName' => 'Equips',
	'ShowFilters' => true,
	'Height' => 300,
	'Width' => 500,
	'Columns' => array(
		'EquipName' => array(
			'Name' => 'Наименование',
			'FieldName' => 'EquipName',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'e.EquipName Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'e.EquipName desc',
				'Down' => 'e.EquipName',
			),
		),
		'full_group_name' => array(
			'Name' => 'Ветка',
			'FieldName' => 'full_group_name',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'eg.full_group_name Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'eg.full_group_name desc',
				'Down' => 'eg.full_group_name',
			),
		),
		'NameUnitMeasurement' => array(
			'Name' => 'Ед. изм.',
			'FieldName' => 'NameUnitMeasurement',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'm.NameUnitMeasurement Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'm.NameUnitMeasurement desc',
				'Down' => 'm.NameUnitMeasurement',
			),
		),
		'NameSupplier' => array(
			'Name' => 'Производитель',
			'FieldName' => 'NameSupplier',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 's.NameSupplier Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 's.NameSupplier desc',
				'Down' => 's.NameSupplier',
			),
		),
		'discontinued' => array(
			'Name' => 'Снят с производства',
			'FieldName' => 'discontinued',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'e.discontinued = :Value%',
			),
			'Sort' => array(
				'Up' => 'e.discontinued desc',
				'Down' => 'e.discontinued',
			),
		),
		'actp_name' => array(
			'Name' => 'Тип учета',
			'FieldName' => 'actp_name',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'at.actp_name Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'at.actp_name desc',
				'Down' => 'at.actp_name',
			),
		),
		'ctgr_name' => array(
			'Name' => 'Категория',
			'FieldName' => 'ctgr_name',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'c.name Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'c.name desc',
				'Down' => 'c.name',
			),
		),
		'grp_name' => array(
			'Name' => 'Группа',
			'FieldName' => 'grp_name',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'g.name Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'g.name desc',
				'Down' => 'g.name',
			),
		),
		'sgrp_name' => array(
			'Name' => 'Подгруппа',
			'FieldName' => 'sgrp_name',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'sg.name Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'sg.name desc',
				'Down' => 'sg.name',
			),
		),
		'SystemTypeName' => array(
			'Name' => 'Тип системы',
			'FieldName' => 'SystemTypeName',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'st.SystemTypeName Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'st.SystemTypeName desc',
				'Down' => 'st.SystemTypeName',
			),
		),
		'ServicingTime' => array(
			'Name' => 'Время ТО',
			'FieldName' => 'ServicingTime',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'e.ServicingTime Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'e.ServicingTime desc',
				'Down' => 'e.ServicingTime',
			),
		),
		'AddressSys' => array(
			'Name' => 'Адрес',
			'FieldName' => 'AddressSys',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'AddressSys Like \':Value%\'',
			),
		),
		'EquipDetailsType1' => array(
			'Name' => 'Аналоги',
			'FieldName' => 'EquipDetailsType1',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'EquipDetailsType1 Like \':Value%\'',
			),
		),
		'EquipDetailsType0' => array(
			'Name' => 'Комплекты',
			'FieldName' => 'EquipDetailsType0',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'EquipDetailsType0 Like \':Value%\'',
			),
		),
		'EquipDetailsTyp21' => array(
			'Name' => 'Аналоги',
			'FieldName' => 'EquipDetailsType2',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'EquipDetailsType2 Like \':Value%\'',
			),
		),



	),
	'OnDblClick' => '$("#update").albutton("BtnClick")',




));
?><div class="btn-group"><?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'create',
		'Height' => 30,
		'Text' => 'Создать',
		'Type' => 'NewWindow',
		'Href' => Yii::app()->createUrl('equips/create')

	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'update',
		'Height' => 30,
		'Text' => 'Изменить',
		'Type' => 'none',
		'OnAfterClick' => "window.open('/?r=equips/update&id='+algridajaxSettings.ListEquips.CurrentRow['Equip_id'])"
	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'analog',
		'Height' => 30,
		'Text' => 'Аналоги',
		'Type' => 'none',
		'OnAfterClick' => "window.open('/?r=equipDetails&id='+algridajaxSettings.ListEquips.CurrentRow['Equip_id']+'&type=". EquipDetails::TYPE_ANALOG . "')"
	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'merge',
		'Height' => 30,
		'Text' => 'Объединить',
		'Type' => 'none',
		'OnAfterClick' => "window.open('/?r=equips/merge&id='+algridajaxSettings.ListEquips.CurrentRow['Equip_id'])"
	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'delete',
		'Height' => 30,
		'Text' => 'Удалить',
		'Type' => 'none',
		'OnAfterClick' => "aliton.form.delete('equips/delete', algridajaxSettings.ListEquips.CurrentRow['Equip_id'], function(){
		 $('#ListEquips').algridajax('LoadData')
		 })"
	));
?></div>
	</div>
<div class="clearfix"></div>


<script>
//	$('#update').on('click', function (e) {
//		e.preventDefault()
//		window.open('/?r=equips/update&id='+algridajaxSettings.ListEquips.CurrentRow['Equip_id'])
//	})

	Aliton.Links = [{
		Out: "cat-list",
		In: "ListEquips",
		TypeControl: "Grid",
		Condition: "e.group_id = :Value",
		//Field: "Employee_id",
		Name: "Edit1_Filter1",
		TypeFilter: "Internal",
		TypeLink: "Filter",
		isNullRun: false

	}];
	$('#equips-tree li').on('click', function(e){

		$('#cat-list').aledit('SetValue', ($(this).attr('data-id')))
		return false
	})
</script>