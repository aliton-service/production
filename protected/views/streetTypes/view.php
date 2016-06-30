<?php
/* @var $this StreetTypesController */
/* @var $model StreetTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Street Types'=>array('index'),
	$model->StreetType_id,
);

$this->menu=array(
	array('label'=>'Список StreetTypes', 'url'=>array('index')),
	array('label'=>'Создать StreetTypes', 'url'=>array('create')),
	array('label'=>'Изменить StreetTypes', 'url'=>array('update', 'id'=>$model->StreetType_id)),
	array('label'=>'Удалить StreetTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->StreetType_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View StreetTypes #<?php echo $model->StreetType_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'StreetType_id',
		'StreetType',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'DelDate',
		'EmplDel',
	),
)); ?>
