<?php
/* @var $this EquipRateDetailsController */
/* @var $model EquipRateDetails */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Rate Details'=>array('index'),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список EquipRateDetails', 'url'=>array('index')),
	array('label'=>'Редактировать EquipRateDetails', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#equip-rate-details-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Equip Rate Details</h1>

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
	'id'=>'equip-rate-details-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'rtdt_id',
		'eqrt_id',
		'eqip_id',
		'eqip_quant',
		'price',
		'Lock',
		/*
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
