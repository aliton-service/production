<?php
/* @var $this RepairPriorsController */
/* @var $model RepairPriors */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Repair Priors'=>array('index'),
	$model->prtp_id,
);

$this->menu=array(
	array('label'=>'Список RepairPriors', 'url'=>array('index')),
	array('label'=>'Создать RepairPriors', 'url'=>array('create')),
	array('label'=>'Изменить RepairPriors', 'url'=>array('update', 'id'=>$model->prtp_id)),
	array('label'=>'Удалить RepairPriors', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->prtp_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View RepairPriors #<?php echo $model->prtp_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'prtp_id',
		'RepairPrior',
		'Sort',
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
