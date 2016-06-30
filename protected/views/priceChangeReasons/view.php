<?php
/* @var $this PriceChangeReasonsController */
/* @var $model PriceChangeReasons */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Price Change Reasons'=>array('index'),
	$model->Reason_Id,
);

$this->menu=array(
	array('label'=>'Список PriceChangeReasons', 'url'=>array('index')),
	array('label'=>'Создать PriceChangeReasons', 'url'=>array('create')),
	array('label'=>'Изменить PriceChangeReasons', 'url'=>array('update', 'id'=>$model->Reason_Id)),
	array('label'=>'Удалить PriceChangeReasons', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Reason_Id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View PriceChangeReasons #<?php echo $model->Reason_Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Reason_Id',
		'ReasonName',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'EmplDel',
		'DelDate',
	),
)); ?>
