<?php
/* @var $this ConfirmCancelsController */
/* @var $model ConfirmCancels */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Confirm Cancels'=>array('index'),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список ConfirmCancels', 'url'=>array('index')),
	array('label'=>'Редактировать ConfirmCancels', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#confirm-cancels-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Confirm Cancels</h1>

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
	'id'=>'confirm-cancels-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ConfirmCancel_id',
		'ConfirmCancelName',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplChange',
		/*
		'DateChange',
		'EmplDel',
		'DelDate',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
