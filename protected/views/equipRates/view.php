<?php
/* @var $this EquipRatesController */
/* @var $model EquipRates */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Rates'=>array('index'),
	$model->eqrt_id,
);

$this->menu=array(
	array('label'=>'Список EquipRates', 'url'=>array('index')),
	array('label'=>'Создать EquipRates', 'url'=>array('create')),
	array('label'=>'Изменить EquipRates', 'url'=>array('update', 'id'=>$model->eqrt_id)),
	array('label'=>'Удалить EquipRates', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->eqrt_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View EquipRates #<?php echo $model->eqrt_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'eqrt_id',
		'date_start',
		'date_end',
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
