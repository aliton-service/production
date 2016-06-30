<?php
/* @var $this EquipDetailsController */
/* @var $model EquipDetails */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Details'=>array('index'),
	$model->eqdt_id,
);

$this->menu=array(
	array('label'=>'Список EquipDetails', 'url'=>array('index')),
	array('label'=>'Создать EquipDetails', 'url'=>array('create')),
	array('label'=>'Изменить EquipDetails', 'url'=>array('update', 'id'=>$model->eqdt_id)),
	array('label'=>'Удалить EquipDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->eqdt_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View EquipDetails #<?php echo $model->eqdt_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'eqdt_id',
		'equip_id',
		'item',
		'type',
		'date_create',
		'user_create',
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
