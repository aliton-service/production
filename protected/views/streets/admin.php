<?php
/* @var $this StreetsController */
/* @var $model Streets */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Streets'=>array('index'),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список Streets', 'url'=>array('index')),
	array('label'=>'Редактировать Streets', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#streets-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Streets</h1>

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
	'id'=>'streets-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Street_id',
		'Region_id',
		'StreetType_id',
		'StreetName',
		'user_change',
		'date_change',
		/*
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		'DateChange',
		'DelDate',
		'EmplDel',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
