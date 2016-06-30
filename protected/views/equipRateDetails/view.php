<?php
/* @var $this EquipRateDetailsController */
/* @var $model EquipRateDetails */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Rate Details'=>array('index'),
	$model->rtdt_id,
);

$this->menu=array(
	array('label'=>'Список EquipRateDetails', 'url'=>array('index')),
	array('label'=>'Создать EquipRateDetails', 'url'=>array('create')),
	array('label'=>'Изменить EquipRateDetails', 'url'=>array('update', 'id'=>$model->rtdt_id)),
	array('label'=>'Удалить EquipRateDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rtdt_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View EquipRateDetails #<?php echo $model->rtdt_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rtdt_id',
		'eqrt_id',
		'eqip_id',
		'eqip_quant',
		'price',
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
