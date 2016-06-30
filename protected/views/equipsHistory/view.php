<?php
/* @var $this EquipsHistoryController */
/* @var $model EquipsHistory */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equips Histories'=>array('index'),
	$model->eqhs_id,
);

$this->menu=array(
	array('label'=>'Список EquipsHistory', 'url'=>array('index')),
	array('label'=>'Создать EquipsHistory', 'url'=>array('create')),
	array('label'=>'Изменить EquipsHistory', 'url'=>array('update', 'id'=>$model->eqhs_id)),
	array('label'=>'Удалить EquipsHistory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->eqhs_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View EquipsHistory #<?php echo $model->eqhs_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'eqhs_id',
		'equip_id',
		'achs_id',
		'ac_date',
		'objc_id',
		'docm_id',
		'dctp_id',
		'quant',
		'used',
		'mstr_id',
		'direct',
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
