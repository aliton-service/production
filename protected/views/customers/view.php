<?php
/* @var $this CustomersController */
/* @var $model Customers */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Customers'=>array('index'),
	$model->Customer_Id,
);

$this->menu=array(
	array('label'=>'Список Customers', 'url'=>array('index')),
	array('label'=>'Создать Customers', 'url'=>array('create')),
	array('label'=>'Изменить Customers', 'url'=>array('update', 'id'=>$model->Customer_Id)),
	array('label'=>'Удалить Customers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Customer_Id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View Customers #<?php echo $model->Customer_Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Customer_Id',
		'CustomerName',
		'Reduction',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'EmplDel',
		'DelDate',
	),
)); ?>
