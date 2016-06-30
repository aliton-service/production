<?php
/* @var $this DelayReasonsController */
/* @var $model DelayReasons */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Delay Reasons'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список DelayReasons', 'url'=>array('index')),
	array('label'=>'Создать DelayReasons', 'url'=>array('create')),
	array('label'=>'Изменить DelayReasons', 'url'=>array('update', 'id'=>$model->dlrs_id)),
	array('label'=>'Удалить DelayReasons', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->dlrs_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View DelayReasons #<?php echo $model->dlrs_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'dlrs_id',
		'name',
		'd',
		'dd',
		'treb',
		'id',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'EmplDel',
		'DelDate',
	),
)); ?>
