<?php
/* @var $this WorkTypesController */
/* @var $model WorkTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Work Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список WorkTypes', 'url'=>array('index')),
	array('label'=>'Создать WorkTypes', 'url'=>array('create')),
	array('label'=>'Изменить WorkTypes', 'url'=>array('update', 'id'=>$model->wrtp_id)),
	array('label'=>'Удалить WorkTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->wrtp_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View WorkTypes #<?php echo $model->wrtp_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'wrtp_id',
		'name',
		'user_create',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'EmplDel',
		'DelDate',
	),
)); ?>
