<?php
/* @var $this DemandResultsController */
/* @var $model DemandResults */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Demand Results'=>array('index'),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список DemandResults', 'url'=>array('index')),
	array('label'=>'Редактировать DemandResults', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#demand-results-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Demand Results</h1>

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
	'id'=>'demand-results-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Result_id',
		'ResultName',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
