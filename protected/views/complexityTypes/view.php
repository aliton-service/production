<?php
/* @var $this ComplexityTypesController */
/* @var $model ComplexityTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Complexity Types'=>array('index'),
	$model->Complexity_Id,
);

$this->menu=array(
	array('label'=>'Список ComplexityTypes', 'url'=>array('index')),
	array('label'=>'Создать ComplexityTypes', 'url'=>array('create')),
	array('label'=>'Изменить ComplexityTypes', 'url'=>array('update', 'id'=>$model->Complexity_Id)),
	array('label'=>'Удалить ComplexityTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Complexity_Id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View ComplexityTypes #<?php echo $model->Complexity_Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Complexity_Id',
		'ComplexityName',
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
