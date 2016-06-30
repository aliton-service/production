<?php
/* @var $this DemandPriorsController */
/* @var $model DemandPriors */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Приоритет заявок'=>array('index'),
	
);

$this->menu=array(
	array('label'=>'Создать Приоритет заявок', 'url'=>array('create')),
	array('label'=>'Редактировать Приоритет заявок', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'update')),
	array('label'=>'Удалить Приоритет заявок', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'delete')),
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

<h1>Редактирование Приоритет заявок</h1>





<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'demand-priors-grid',
	'dataProvider'=>$model->search(),
	'cssFile'=>'css/reference/gridview/styles.css',
	'pager'=>array('cssFile'=>'css/reference/gridview/pager.css', ),
	'filter'=>$model,
	'columns'=>array(
		'DemandPrior_id',
		'DemandPrior'=>array('name'=>'DemandPrior', 'header'=>'Приоритет заявки'),
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
			data: 'DemandPriors=DemandPriors',
			success: function() {

			}
		})
	})
</script>




