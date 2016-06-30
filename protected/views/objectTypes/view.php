<?php
/* @var $this ObjectTypesController */
/* @var $model ObjectTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Object Types'=>array('index'),
	$model->ObjectType_Id,
);

$this->menu=array(
	array('label'=>'Список ObjectTypes', 'url'=>array('index')),
	array('label'=>'Создать ObjectTypes', 'url'=>array('create')),
	array('label'=>'Изменить ObjectTypes', 'url'=>array('update', 'id'=>$model->ObjectType_Id)),
	array('label'=>'Удалить ObjectTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ObjectType_Id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View ObjectTypes #<?php echo $model->ObjectType_Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ObjectType_Id',
		'ObjectType',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'EmplCreate',
		'DateCreate',
		'EmplDel',
		'DelDate',
	),
)); ?>
