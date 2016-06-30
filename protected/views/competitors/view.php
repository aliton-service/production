<?php
/* @var $this CompetitorsController */
/* @var $model Competitors */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Competitors'=>array('index'),
	$model->cmtr_id,
);

$this->menu=array(
	array('label'=>'Список Competitors', 'url'=>array('index')),
	array('label'=>'Создать Competitors', 'url'=>array('create')),
	array('label'=>'Изменить Competitors', 'url'=>array('update', 'id'=>$model->cmtr_id)),
	array('label'=>'Удалить Competitors', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cmtr_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View Competitors #<?php echo $model->cmtr_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cmtr_id',
		'Competitor',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplCreate',
		'DateCreate',
		'EmplChange',
		'DateChange',
		'EmplDel',
		'DelData',
	),
)); ?>
