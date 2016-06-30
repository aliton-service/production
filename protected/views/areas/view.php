<?php
/* @var $this AreasController */
/* @var $model Areas */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Areases'=>array('index'),
	$model->Area_id,
);

$this->menu=array(
	array('label'=>'Список Areas', 'url'=>array('index')),
	array('label'=>'Создать Areas', 'url'=>array('create')),
	array('label'=>'Изменить Areas', 'url'=>array('update', 'id'=>$model->Area_id)),
	array('label'=>'Удалить Areas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Area_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View Areas #<?php echo $model->Area_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Area_id',
		'AreaName',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'DelDate',
		'EmplDel',
	),
)); ?>
