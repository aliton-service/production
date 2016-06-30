<?php
/* @var $this FormsOfOwnershipController */
/* @var $model FormsOfOwnership */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Forms Of Ownerships'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список FormsOfOwnership', 'url'=>array('index')),
	array('label'=>'Создать FormsOfOwnership', 'url'=>array('create')),
	array('label'=>'Изменить FormsOfOwnership', 'url'=>array('update', 'id'=>$model->fown_id)),
	array('label'=>'Удалить FormsOfOwnership', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->fown_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View FormsOfOwnership #<?php echo $model->fown_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'fown_id',
		'name',
		'Lock',
		'DateLock',
		'EmplLock',
		'DateChange',
		'EmplChange',
		'DateDel',
		'EmplDel',
	),
)); ?>
