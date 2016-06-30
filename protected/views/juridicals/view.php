<?php
/* @var $this JuridicalsController */
/* @var $model Juridicals */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Juridicals'=>array('index'),
	$model->Jrdc_Id,
);

$this->menu=array(
	array('label'=>'Список Juridicals', 'url'=>array('index')),
	array('label'=>'Создать Juridicals', 'url'=>array('create')),
	array('label'=>'Изменить Juridicals', 'url'=>array('update', 'id'=>$model->Jrdc_Id)),
	array('label'=>'Удалить Juridicals', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Jrdc_Id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View Juridicals #<?php echo $model->Jrdc_Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Jrdc_Id',
		'JuridicalPerson',
		'Identification',
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
		'ogrn',
		'okpo',
		'telephone',
		'post_index',
		'empl_id',
		'bank_id',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'DelDate',
		'EmplDel',
	),
)); ?>
