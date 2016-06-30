<?php
/* @var $this SystemAvailabilitysController */
/* @var $model SystemAvailabilitys */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'System Availabilitys'=>array('index'),
	$model->code_id,
);

$this->menu=array(
	array('label'=>'Список SystemAvailabilitys', 'url'=>array('index')),
	array('label'=>'Создать SystemAvailabilitys', 'url'=>array('create')),
	array('label'=>'Изменить SystemAvailabilitys', 'url'=>array('update', 'id'=>$model->code_id)),
	array('label'=>'Удалить SystemAvailabilitys', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->code_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View SystemAvailabilitys #<?php echo $model->code_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'code_id',
		'availability',
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
