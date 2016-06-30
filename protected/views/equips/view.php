<?php
/* @var $this EquipsController */
/* @var $model Equips */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equips'=>array('index'),
	$model->Equip_id,
);

$this->menu=array(
	array('label'=>'Список Equips', 'url'=>array('index')),
	array('label'=>'Создать Equips', 'url'=>array('create')),
	array('label'=>'Изменить Equips', 'url'=>array('update', 'id'=>$model->Equip_id)),
	array('label'=>'Удалить Equips', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Equip_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View Equips #<?php echo $model->Equip_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Equip_id',
		'EquipName',
		'UnitMeasurement_Id',
		'Supplier_id',
		'Description',
		'GroupGood_Id',
		'SubGroupGood_Id',
		'CategoryGood_Id',
		'EquipImage',
		'actp_id',
		'ctgr_id',
		'grp_id',
		'sgrp_id',
		'discontinued',
		'SystemType_id',
		'ServicingTime',
		'AddressSystem_id',
		'rate',
		'must_instruction',
		'there_instruction',
		'must_photo',
		'there_photo',
		'must_analog',
		'there_analog',
		'must_producer',
		'there_producer',
		'must_supplier',
		'there_supplier',
		'note',
		'group_id',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplCreate',
		'DateCreate',
		'EmplChange',
		'DateChange',
		'EmplDel',
		'DelDate',
	),
)); ?>
