<?php
/* @var $this ContactKindsController */
/* @var $model ContactKinds */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Contact Kinds'=>array('index'),
	$model->Kind_id,
);

$this->menu=array(
	array('label'=>'Список ContactKinds', 'url'=>array('index')),
	array('label'=>'Создать ContactKinds', 'url'=>array('create')),
	array('label'=>'Изменить ContactKinds', 'url'=>array('update', 'id'=>$model->Kind_id)),
	array('label'=>'Удалить ContactKinds', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Kind_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View ContactKinds #<?php echo $model->Kind_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Kind_id',
		'Kind_name',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'EmplDel',
		'DelDate',
	),
)); ?>
