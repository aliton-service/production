<?php
/* @var $this LoyaltyTypesController */
/* @var $model LoyaltyTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Loyalty Types'=>array('index'),
	$model->LoyaltyType_Id,
);

$this->menu=array(
	array('label'=>'Список LoyaltyTypes', 'url'=>array('index')),
	array('label'=>'Создать LoyaltyTypes', 'url'=>array('create')),
	array('label'=>'Изменить LoyaltyTypes', 'url'=>array('update', 'id'=>$model->LoyaltyType_Id)),
	array('label'=>'Удалить LoyaltyTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->LoyaltyType_Id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View LoyaltyTypes #<?php echo $model->LoyaltyType_Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'LoyaltyType_Id',
		'LoyaltyTypeName',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'EmplDel',
		'DelDate',
	),
)); ?>
