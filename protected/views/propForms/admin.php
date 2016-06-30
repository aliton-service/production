<?php
/* @var $this PropFormsController */
/* @var $model PropForms */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Prop Forms'=>array('index'),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список PropForms', 'url'=>array('index')),
	array('label'=>'Редактировать PropForms', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#prop-forms-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Prop Forms</h1>

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
	'id'=>'prop-forms-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Form_id',
		'FormName',
		'fown_id',
		'lph_id',
		'TaxNumber',
		'SettlementAccount',
		/*
		'City',
		'bank_id',
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
		'telephone',
		'post_index',
		'region_name',
		'froom',
		'jroom',
		'DEBT',
		'VIP',
		'sum_price',
		'sum_appz_price',
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
