<?php
/* @var $this CompetitorsController */
/* @var $model Competitors */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Конкуренты'=>array('index'),
	
);

$this->menu=array(
	array('label'=>'Создать Конкуренты', 'url'=>array('create')),
	array('label'=>'Редактировать Конкуренты', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'update')),
	array('label'=>'Удалить Конкуренты', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'delete')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#competitors-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Редактирование Конкуренты</h1>





<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'competitors-grid',
	'dataProvider'=>$model->search(),
	'cssFile'=>'css/reference/gridview/styles.css',
	'pager'=>array('cssFile'=>'css/reference/gridview/pager.css', ),
	'filter'=>$model,
	'columns'=>array(
		// 'cmtr_id',
		'Competitor'=>array('name'=>'Competitor', 'header'=>'Конкурент'),
		// 'Lock',
		// 'EmplLock',
		// 'DateLock',
		// 'EmplCreate',
		/*
		'DateCreate',
		'EmplChange',
		'DateChange',
		'EmplDel',
		'DelData',
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
			data: 'Competitors=Competitors',
			success: function() {

			}
		})
	})
</script>




