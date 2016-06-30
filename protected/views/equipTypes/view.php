<?php
/* @var $this EquipTypesController */
/* @var $model EquipTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Types'=>array('index'),
	$model->EquipType_id,
);

$this->menu=array(
	array('label'=>'Список EquipTypes', 'url'=>array('index')),
	array('label'=>'Создать EquipTypes', 'url'=>array('create')),
	array('label'=>'Изменить EquipTypes', 'url'=>array('update', 'id'=>$model->EquipType_id)),
	array('label'=>'Удалить EquipTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->EquipType_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View EquipTypes #<?php echo $model->EquipType_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'EquipType_id',
		'EquipType',
		'SystemType_id',
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
