<?php
/* @var $this EqipGroupsController */
/* @var $model EqipGroups */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Eqip Groups'=>array('index'),
	$model->group_id,
);

$this->menu=array(
	array('label'=>'Список EqipGroups', 'url'=>array('index')),
	array('label'=>'Создать EqipGroups', 'url'=>array('create')),
	array('label'=>'Изменить EqipGroups', 'url'=>array('update', 'id'=>$model->group_id)),
	array('label'=>'Удалить EqipGroups', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->group_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View EqipGroups #<?php echo $model->group_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'group_id',
		'parent_group_id',
		'code',
		'group_name',
		'full_group_name',
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
