<?php
/* @var $this DemandTypesController */
/* @var $model DemandTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Типы заявок'=>array('index'),
	
);

$this->menu=array(
	array('label'=>'Создать Типы заявок', 'url'=>array('create')),
	array('label'=>'Редактировать Типы заявок', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'update')),
	array('label'=>'Удалить Типы заявок', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'delete')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#demand-types-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Редактирование Типы заявок</h1>





<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'demand-types-grid',
	'dataProvider'=>$model->search(),
	'cssFile'=>'css/reference/gridview/styles.css',
	'pager'=>array('cssFile'=>'css/reference/gridview/pager.css', ),
	'filter'=>$model,
	'columns'=>array(
		'DemandType_id',
		'DemandType'=>array('name'=>'DemandType', 'header'=>'Тип заявки'),
		'Visible',
		'Sort',
		'dd',
		'id',
		/*
		'd',
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
)); 
?>

<script type="text/javascript">
	$('body').on('click','.items tbody tr', function(){
		
		var link = $(this).find('td.button-column a.update').attr('href');
		$('li[data-action=update] a').attr('href', link);

		link = $(this).find('td.button-column a.delete').attr('href');
		$('li[data-action=delete] a').attr('href', link);

	});

	$('body').on('click','li[data-action=delete] a',function(){
		$.ajax({
			type: 'post',
			url: $(this).attr('href'),
			data: 'DemandTypes=DemandTypes',
			success: function() {

			}
		})
	})
</script>




