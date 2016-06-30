<?php
/* @var $this ConfirmCancelsController */
/* @var $model ConfirmCancels */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Confirm Cancels'=>array('index'),
	$model->ConfirmCancel_id,
);

$this->menu=array(
	array('label'=>'Список ConfirmCancels', 'url'=>array('index')),
	array('label'=>'Создать ConfirmCancels', 'url'=>array('create')),
	array('label'=>'Изменить ConfirmCancels', 'url'=>array('update', 'id'=>$model->ConfirmCancel_id)),
	array('label'=>'Удалить ConfirmCancels', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ConfirmCancel_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View ConfirmCancels #<?php echo $model->ConfirmCancel_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ConfirmCancel_id',
		'ConfirmCancelName',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'EmplDel',
		'DelDate',
	),
)); ?>
