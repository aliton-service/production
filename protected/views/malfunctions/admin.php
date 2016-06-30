<?php
/* @var $this MalfunctionsController */
/* @var $model Malfunctions */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Malfunctions'=>array('index'),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список Malfunctions', 'url'=>array('index')),
	array('label'=>'Редактировать Malfunctions', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#malfunctions-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Malfunctions</h1>

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
	'id'=>'malfunctions-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Malfunction_id',
		'Malfunction',
		'EquipType_id',
		'DateCreate',
		'EmplCreate',
		'DateChange',
		/*
		'EmplChange',
		'DelDate',
		'Sort',
		'EmplDel',
		'Lock',
		'EmplLock',
		'DateLock',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
