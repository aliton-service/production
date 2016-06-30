<?php
/* @var $this EquipAnalogController */
/* @var $model EquipAnalog */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Analogs'=>array('index'),
	$model->Analog_id,
);

$this->menu=array(
	array('label'=>'Список EquipAnalog', 'url'=>array('index')),
	array('label'=>'Создать EquipAnalog', 'url'=>array('create')),
	array('label'=>'Изменить EquipAnalog', 'url'=>array('update', 'id'=>$model->Analog_id)),
	array('label'=>'Удалить EquipAnalog', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Analog_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View EquipAnalog #<?php echo $model->Analog_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Analog_id',
		'Equip_id',
		'AnalogEquip_id',
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
