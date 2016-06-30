<?php
/* @var $this ContactTypesController */
/* @var $model ContactTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Contact Types'=>array('index'),
	$model->Contact_id,
);

$this->menu=array(
	array('label'=>'Список ContactTypes', 'url'=>array('index')),
	array('label'=>'Создать ContactTypes', 'url'=>array('create')),
	array('label'=>'Изменить ContactTypes', 'url'=>array('update', 'id'=>$model->Contact_id)),
	array('label'=>'Удалить ContactTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Contact_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View ContactTypes #<?php echo $model->Contact_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Contact_id',
		'ContactName',
		'Visible',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'EmplDel',
		'DelDate',
	),
)); ?>
