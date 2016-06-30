<?php
/* @var $this StoragesController */
/* @var $model Storages */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Storages'=>array('index'),
	$model->storage_id,
);

$this->menu=array(
	array('label'=>'Список Storages', 'url'=>array('index')),
	array('label'=>'Создать Storages', 'url'=>array('create')),
	array('label'=>'Изменить Storages', 'url'=>array('update', 'id'=>$model->storage_id)),
	array('label'=>'Удалить Storages', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->storage_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View Storages #<?php echo $model->storage_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'storage_id',
		'storage',
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
