<?php
/* @var $this FormsOfOwnershipController */
/* @var $model FormsOfOwnership */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Типы организаций'=>array('index'),
	
);

$this->menu=array(
	array('label'=>'Создать Типы организаций', 'url'=>array('create')),
	array('label'=>'Редактировать Типы организаций', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'update')),
	array('label'=>'Удалить Типы организаций', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'delete')),
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

<h1>Редактирование Типы организаций</h1>





<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'forms-of-ownership-grid',
	'dataProvider'=>$model->search(),
	'cssFile'=>'css/reference/gridview/styles.css',
	'pager'=>array('cssFile'=>'css/reference/gridview/pager.css', ),
	'filter'=>$model,
	'columns'=>array(
		// 'fown_id',
		'name'=>array('name'=>'name', 'header'=>'Тип организации'),
		// 'Lock',
		// 'DateLock',
		// 'EmplLock',
		// 'DateChange',
		/*
		'EmplChange',
		'DateDel',
		'EmplDel',
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
			data: 'FormsOfOwnership=FormsOfOwnership',
			success: function() {

			}
		})
	})
</script>




