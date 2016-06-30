<?php
/* @var $this PropFormsController */
/* @var $model PropForms */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Prop Forms'=>array('index'),
	$model->Form_id,
);

$this->menu=array(
	array('label'=>'Список PropForms', 'url'=>array('index')),
	array('label'=>'Создать PropForms', 'url'=>array('create')),
	array('label'=>'Изменить PropForms', 'url'=>array('update', 'id'=>$model->Form_id)),
	array('label'=>'Удалить PropForms', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Form_id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View PropForms #<?php echo $model->Form_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Form_id',
		'FormName',
		'fown_id',
		'lph_id',
		'TaxNumber',
		'SettlementAccount',
		'City',
		'bank_id',
		'jregion',
		'jarea',
		'jstreet',
		'jhouse',
		'jcorp',
		'fregion',
		'farea',
		'fstreet',
		'fhouse',
		'fcorp',
		'inn',
		'kpp',
		'account',
		'telephone',
		'post_index',
		'region_name',
		'froom',
		'jroom',
		'DEBT',
		'VIP',
		'sum_price',
		'sum_appz_price',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'EmplDel',
		'DelDate',
	),
)); ?>
