<?php
/* @var $this DocTypesController */
/* @var $model DocTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Doc Types'=>array('index'),
	$model->DocType_Id,
);

$this->menu=array(
	array('label'=>'Список DocTypes', 'url'=>array('index')),
	array('label'=>'Создать DocTypes', 'url'=>array('create')),
	array('label'=>'Изменить DocTypes', 'url'=>array('update', 'id'=>$model->DocType_Id)),
	array('label'=>'Удалить DocTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->DocType_Id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View DocTypes #<?php echo $model->DocType_Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'DocType_Id',
		'DocType_Name',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'DelDate',
		'EmplDel',
	),
)); ?>
