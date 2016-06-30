<?php
/* @var $this AddressSystemsController */
/* @var $model AddressSystems */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Address Systems'=>array('index'),
	$model->AddressSystem_id,
);

$this->menu=array(
	array('label'=>'Список AddressSystems', 'url'=>array('index')),
	array('label'=>'Создать AddressSystems', 'url'=>array('create')),
	array('label'=>'Изменить AddressSystems', 'url'=>array('update', 'id'=>$model->AddressSystem_id)),
	array('label'=>'Удалить AddressSystems', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->AddressSystem_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View AddressSystems #<?php echo $model->AddressSystem_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'AddressSystem_id',
		'AddressSystem',
		'Note',
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
