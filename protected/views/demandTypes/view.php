<?php
/* @var $this DemandTypesController */
/* @var $model DemandTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Demand Types'=>array('index'),
	$model->DemandType_id,
);

$this->menu=array(
	array('label'=>'Список DemandTypes', 'url'=>array('index')),
	array('label'=>'Создать DemandTypes', 'url'=>array('create')),
	array('label'=>'Изменить DemandTypes', 'url'=>array('update', 'id'=>$model->DemandType_id)),
	array('label'=>'Удалить DemandTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->DemandType_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View DemandTypes #<?php echo $model->DemandType_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'DemandType_id',
		'DemandType',
		'Visible',
		'Sort',
		'dd',
		'id',
		'd',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'EmplDel',
		'DelDate',
	),
)); ?>
