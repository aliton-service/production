<?php
/* @var $this EquipSubgroupsController */
/* @var $model EquipSubgroups */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Subgroups'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список EquipSubgroups', 'url'=>array('index')),
	array('label'=>'Создать EquipSubgroups', 'url'=>array('create')),
	array('label'=>'Изменить EquipSubgroups', 'url'=>array('update', 'id'=>$model->sgrp_id)),
	array('label'=>'Удалить EquipSubgroups', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->sgrp_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View EquipSubgroups #<?php echo $model->sgrp_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sgrp_id',
		'grp_id',
		'name',
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
