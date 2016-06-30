<?php
/* @var $this ResultsController */
/* @var $model Results */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Results'=>array('index'),
	$model->Result_Id,
);

$this->menu=array(
	array('label'=>'Список Results', 'url'=>array('index')),
	array('label'=>'Создать Results', 'url'=>array('create')),
	array('label'=>'Изменить Results', 'url'=>array('update', 'id'=>$model->Result_Id)),
	array('label'=>'Удалить Results', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Result_Id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View Results #<?php echo $model->Result_Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Result_Id',
		'ResultName',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'EmplDel',
		'DelDate',
	),
)); ?>
