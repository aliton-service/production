<?php
/* @var $this NegativesController */
/* @var $model Negatives */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Negatives'=>array('index'),
	$model->ngtv_id,
);

$this->menu=array(
	array('label'=>'Список Negatives', 'url'=>array('index')),
	array('label'=>'Создать Negatives', 'url'=>array('create')),
	array('label'=>'Изменить Negatives', 'url'=>array('update', 'id'=>$model->ngtv_id)),
	array('label'=>'Удалить Negatives', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ngtv_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View Negatives #<?php echo $model->ngtv_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ngtv_id',
		'NegativeName',
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
