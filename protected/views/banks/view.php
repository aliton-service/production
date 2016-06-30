<?php
/* @var $this BanksController */
/* @var $model Banks */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Banks'=>array('index'),
	$model->Bank_id,
);

$this->menu=array(
	array('label'=>'Список Banks', 'url'=>array('index')),
	array('label'=>'Создать Banks', 'url'=>array('create')),
	array('label'=>'Изменить Banks', 'url'=>array('update', 'id'=>$model->Bank_id)),
	array('label'=>'Удалить Banks', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Bank_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View Banks #<?php echo $model->Bank_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Bank_id',
		'bank_name',
		'cor_account',
		'bik',
		'City',
		'Department',
		'Status',
		'DateCreate',
		'UserCreate',
		'DateChange',
		'EmplChange',
		'DelDate',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplDel',
	),
)); ?>
