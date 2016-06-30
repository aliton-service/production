<?php
/* @var $this ServiceTypesController */
/* @var $model ServiceTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Service Types'=>array('index'),
	$model->ServiceType_id,
);

$this->menu=array(
	array('label'=>'Список ServiceTypes', 'url'=>array('index')),
	array('label'=>'Создать ServiceTypes', 'url'=>array('create')),
	array('label'=>'Изменить ServiceTypes', 'url'=>array('update', 'id'=>$model->ServiceType_id)),
	array('label'=>'Удалить ServiceTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ServiceType_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View ServiceTypes #<?php echo $model->ServiceType_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ServiceType_id',
		'ServiceType',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
	),
)); ?>
