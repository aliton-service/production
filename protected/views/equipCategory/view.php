<?php
/* @var $this EquipCategoryController */
/* @var $model EquipCategory */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Categories'=>array('index'),
	$model->eqct_id,
);

$this->menu=array(
	array('label'=>'Список EquipCategory', 'url'=>array('index')),
	array('label'=>'Создать EquipCategory', 'url'=>array('create')),
	array('label'=>'Изменить EquipCategory', 'url'=>array('update', 'id'=>$model->eqct_id)),
	array('label'=>'Удалить EquipCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->eqct_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View EquipCategory #<?php echo $model->eqct_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'eqct_id',
		'eqct_name',
		'eqct_price',
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
