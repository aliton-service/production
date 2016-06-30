<?php
/* @var $this ReceiptReasonsController */
/* @var $model ReceiptReasons */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Receipt Reasons'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список ReceiptReasons', 'url'=>array('index')),
	array('label'=>'Создать ReceiptReasons', 'url'=>array('create')),
	array('label'=>'Изменить ReceiptReasons', 'url'=>array('update', 'id'=>$model->rcrs_id)),
	array('label'=>'Удалить ReceiptReasons', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rcrs_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View ReceiptReasons #<?php echo $model->rcrs_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rcrs_id',
		'name',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'EmplDel',
		'DelDate',
	),
)); ?>
