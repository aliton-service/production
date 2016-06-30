<?php
/* @var $this BanksController */
/* @var $model Banks */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Banks'=>array('index'),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список Banks', 'url'=>array('index')),
	array('label'=>'Редактировать Banks', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#banks-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Banks</h1>

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
	'id'=>'banks-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Bank_id',
		'bank_name',
		'cor_account',
		'bik',
		'City',
		'Department',
		/*
		'Status',
		'DateCreate',
		'UserCreate',
		'DateChange',
		'EmplChange',
		'DelDate',
		'Lock',
		'EmplLock',
		'DateLock',
		'EmplDel',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
