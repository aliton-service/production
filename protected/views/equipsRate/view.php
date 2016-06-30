<?php
/* @var $this EquipsRateController */
/* @var $model EquipsRate */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equips Rates'=>array('index'),
	$model->eqrt_id,
);

$this->menu=array(
	array('label'=>'Список EquipsRate', 'url'=>array('index')),
	array('label'=>'Создать EquipsRate', 'url'=>array('create')),
	array('label'=>'Изменить EquipsRate', 'url'=>array('update', 'id'=>$model->eqrt_id)),
	array('label'=>'Удалить EquipsRate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->eqrt_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View EquipsRate #<?php echo $model->eqrt_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'eqrt_id',
		'eqip_id',
		'price',
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
