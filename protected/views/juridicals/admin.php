<?php
/* @var $this JuridicalsController */
/* @var $model Juridicals */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Juridicals'=>array('index'),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список Juridicals', 'url'=>array('index')),
	array('label'=>'Редактировать Juridicals', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#juridicals-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Juridicals</h1>

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
	'id'=>'juridicals-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Jrdc_Id',
		'JuridicalPerson',
		'Identification',
		'jregion',
		'jarea',
		'jstreet',
		/*
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
		'ogrn',
		'okpo',
		'telephone',
		'post_index',
		'empl_id',
		'bank_id',
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
