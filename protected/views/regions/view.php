<?php
/* @var $this RegionsController */
/* @var $model Regions */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Regions'=>array('index'),
	$model->Region_id,
);

$this->menu=array(
	array('label'=>'Список Regions', 'url'=>array('index')),
	array('label'=>'Создать Regions', 'url'=>array('create')),
	array('label'=>'Изменить Regions', 'url'=>array('update', 'id'=>$model->Region_id)),
	array('label'=>'Удалить Regions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Region_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View Regions #<?php echo $model->Region_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Region_id',
		'RegionName',
		'Sort',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplDel',
		'DateChange',
		'EmplChange',
		'DelDate',
	),
)); ?>
