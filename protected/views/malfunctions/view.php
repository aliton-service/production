<?php
/* @var $this MalfunctionsController */
/* @var $model Malfunctions */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Malfunctions'=>array('index'),
	$model->Malfunction_id,
);

$this->menu=array(
	array('label'=>'Список Malfunctions', 'url'=>array('index')),
	array('label'=>'Создать Malfunctions', 'url'=>array('create')),
	array('label'=>'Изменить Malfunctions', 'url'=>array('update', 'id'=>$model->Malfunction_id)),
	array('label'=>'Удалить Malfunctions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Malfunction_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View Malfunctions #<?php echo $model->Malfunction_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Malfunction_id',
		'Malfunction',
		'EquipType_id',
		'DateCreate',
		'EmplCreate',
		'DateChange',
		'EmplChange',
		'DelDate',
		'Sort',
		'EmplDel',
		'Lock',
		'EmplLock',
		'DateLock',
	),
)); ?>
