<?php
/* @var $this FormsOfOwnershipController */
/* @var $model FormsOfOwnership */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Forms Of Ownerships'=>array('index'),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список FormsOfOwnership', 'url'=>array('index')),
	array('label'=>'Редактировать FormsOfOwnership', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#forms-of-ownership-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Forms Of Ownerships</h1>

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
	'id'=>'forms-of-ownership-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'fown_id',
		'name',
		'Lock',
		'DateLock',
		'EmplLock',
		'DateChange',
		/*
		'EmplChange',
		'DateDel',
		'EmplDel',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
