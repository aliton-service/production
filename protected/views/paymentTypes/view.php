<?php
/* @var $this PaymentTypesController */
/* @var $model PaymentTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Payment Types'=>array('index'),
	$model->PaymentType_Id,
);

$this->menu=array(
	array('label'=>'Список PaymentTypes', 'url'=>array('index')),
	array('label'=>'Создать PaymentTypes', 'url'=>array('create')),
	array('label'=>'Изменить PaymentTypes', 'url'=>array('update', 'id'=>$model->PaymentType_Id)),
	array('label'=>'Удалить PaymentTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->PaymentType_Id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View PaymentTypes #<?php echo $model->PaymentType_Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'PaymentType_Id',
		'PaymentTypeName',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'EmplDel',
		'DelDate',
	),
)); ?>
