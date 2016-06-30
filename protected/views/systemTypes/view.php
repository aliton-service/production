<?php
/* @var $this SystemTypesController */
/* @var $model SystemTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'System Types'=>array('index'),
	$model->SystemType_Id,
);

$this->menu=array(
	array('label'=>'Список SystemTypes', 'url'=>array('index')),
	array('label'=>'Создать SystemTypes', 'url'=>array('create')),
	array('label'=>'Изменить SystemTypes', 'url'=>array('update', 'id'=>$model->SystemType_Id)),
	array('label'=>'Удалить SystemTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->SystemType_Id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View SystemTypes #<?php echo $model->SystemType_Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'SystemType_Id',
		'SystemTypeName',
		'Sort',
		'Visible',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'EmplDel',
		'DelDate',
	),
)); ?>
