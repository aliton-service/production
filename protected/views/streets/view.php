<?php
/* @var $this StreetsController */
/* @var $model Streets */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Streets'=>array('index'),
	$model->Street_id,
);

$this->menu=array(
	array('label'=>'Список Streets', 'url'=>array('index')),
	array('label'=>'Создать Streets', 'url'=>array('create')),
	array('label'=>'Изменить Streets', 'url'=>array('update', 'id'=>$model->Street_id)),
	array('label'=>'Удалить Streets', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Street_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View Streets #<?php echo $model->Street_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Street_id',
		'Region_id',
		'StreetType_id',
		'StreetName',
		'user_change',
		'date_change',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'DelDate',
		'EmplDel',
	),
)); ?>
