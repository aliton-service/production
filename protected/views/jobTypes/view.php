<?php
/* @var $this JobTypesController */
/* @var $model JobTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Job Types'=>array('index'),
	$model->JobType_Id,
);

$this->menu=array(
	array('label'=>'Список JobTypes', 'url'=>array('index')),
	array('label'=>'Создать JobTypes', 'url'=>array('create')),
	array('label'=>'Изменить JobTypes', 'url'=>array('update', 'id'=>$model->JobType_Id)),
	array('label'=>'Удалить JobTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->JobType_Id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View JobTypes #<?php echo $model->JobType_Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'JobType_Id',
		'JobType_Name',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'EmplDel',
		'DelDate',
	),
)); ?>
