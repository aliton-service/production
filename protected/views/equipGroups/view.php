<?php
/* @var $this EquipGroupsController */
/* @var $model EquipGroups */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Groups'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список EquipGroups', 'url'=>array('index')),
	array('label'=>'Создать EquipGroups', 'url'=>array('create')),
	array('label'=>'Изменить EquipGroups', 'url'=>array('update', 'id'=>$model->grp_id)),
	array('label'=>'Удалить EquipGroups', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->grp_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View EquipGroups #<?php echo $model->grp_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
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
