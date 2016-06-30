<?php
/* @var $this DemandResultsController */
/* @var $model DemandResults */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Demand Results'=>array('index'),
	$model->Result_id,
);

$this->menu=array(
	array('label'=>'Список DemandResults', 'url'=>array('index')),
	array('label'=>'Создать DemandResults', 'url'=>array('create')),
	array('label'=>'Изменить DemandResults', 'url'=>array('update', 'id'=>$model->Result_id)),
	array('label'=>'Удалить DemandResults', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Result_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View DemandResults #<?php echo $model->Result_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Result_id',
		'ResultName',
	),
)); ?>
