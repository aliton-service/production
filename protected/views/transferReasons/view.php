<?php
/* @var $this TransferReasonsController */
/* @var $model TransferReasons */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Transfer Reasons'=>array('index'),
	$model->TransferReason_id,
);

$this->menu=array(
	array('label'=>'Список TransferReasons', 'url'=>array('index')),
	array('label'=>'Создать TransferReasons', 'url'=>array('create')),
	array('label'=>'Изменить TransferReasons', 'url'=>array('update', 'id'=>$model->TransferReason_id)),
	array('label'=>'Удалить TransferReasons', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->TransferReason_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View TransferReasons #<?php echo $model->TransferReason_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'TransferReason_id',
		'TransferReason',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'EmplDel',
		'DelDate',
	),
)); ?>
