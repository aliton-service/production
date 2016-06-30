<?php
/* @var $this DemandPriorsController */
/* @var $model DemandPriors */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Demand Priors'=>array('index'),
	$model->DemandPrior_id,
);

$this->menu=array(
	array('label'=>'Список DemandPriors', 'url'=>array('index')),
	array('label'=>'Создать DemandPriors', 'url'=>array('create')),
	array('label'=>'Изменить DemandPriors', 'url'=>array('update', 'id'=>$model->DemandPrior_id)),
	array('label'=>'Удалить DemandPriors', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->DemandPrior_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View DemandPriors #<?php echo $model->DemandPrior_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'DemandPrior_id',
		'DemandPrior',
		'ExceedType',
		'ExceedDays',
		'for_wh',
		'Sort',
		'Malfunction_id',
		'for_dd',
		'for_id',
		'for_d',
		'for_pd',
		'for_md',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'EmplDel',
		'DelDate',
	),
)); ?>
