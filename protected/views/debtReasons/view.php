<?php
/* @var $this DebtReasonsController */
/* @var $model DebtReasons */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Debt Reasons'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список DebtReasons', 'url'=>array('index')),
	array('label'=>'Создать DebtReasons', 'url'=>array('create')),
	array('label'=>'Изменить DebtReasons', 'url'=>array('update', 'id'=>$model->drsn_Id)),
	array('label'=>'Удалить DebtReasons', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->drsn_Id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View DebtReasons #<?php echo $model->drsn_Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'drsn_Id',
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
