<?php
/* @var $this DemandPriorsController */
/* @var $model DemandPriors */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Demand Priors'=>array('index'),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список DemandPriors', 'url'=>array('index')),
	array('label'=>'Редактировать DemandPriors', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#demand-priors-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Demand Priors</h1>

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
	'id'=>'demand-priors-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'DemandPrior_id',
		'DemandPrior',
		'ExceedType',
		'ExceedDays',
		'for_wh',
		'Sort',
		/*
		'Malfunction_id',
		'for_dd',
		'for_id',
		'for_d',
		'for_pd',
		'for_md',
		'Lock',
		'EmplLock',
		'DateLock',
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
