<?php
/* @var $this EquipsController */
/* @var $model Equips */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equips'=>array('index'),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список Equips', 'url'=>array('index')),
	array('label'=>'Редактировать Equips', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#equips-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Equips</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<p><?php echo CHtml::link('Продвинутый поиск','#',array('class'=>'search-button')); ?></p>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'equips-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Equip_id',
		'EquipName',
		'UnitMeasurement_Id',
		'Supplier_id',
		'Description',
		'GroupGood_Id',
		/*
		'SubGroupGood_Id',
		'CategoryGood_Id',
		'EquipImage',
		'actp_id',
		'ctgr_id',
		'grp_id',
		'sgrp_id',
		'discontinued',
		'SystemType_id',
		'ServicingTime',
		'AddressSystem_id',
		'rate',
		'must_instruction',
		'there_instruction',
		'must_photo',
		'there_photo',
		'must_analog',
		'there_analog',
		'must_producer',
		'there_producer',
		'must_supplier',
		'there_supplier',
		'note',
		'group_id',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplCreate',
		'DateCreate',
		'EmplChange',
		'DateChange',
		'EmplDel',
		'DelDate',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
