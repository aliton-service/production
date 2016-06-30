<?php
/* @var $this ContactTypesController */
/* @var $model ContactTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Тип совершенного контакта'=>array('index'),
	
);

$this->menu=array(
	array('label'=>'Создать Тип совершенного контакта', 'url'=>array('create')),
	array('label'=>'Редактировать Тип совершенного контакта', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'update')),
	array('label'=>'Удалить Тип совершенного контакта', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'delete')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#contact-types-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Редактирование Тип совершенного контакта</h1>





<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'contact-types-grid',
	'dataProvider'=>$model->search(),
	'cssFile'=>'css/reference/gridview/styles.css',
	'pager'=>array('cssFile'=>'css/reference/gridview/pager.css', ),
	'filter'=>$model,
	'columns'=>array(
		// 'Contact_id',
		'ContactName'=>array('name'=>'ContactName', 'header'=>'Тип контакта'),
		'Visible',
		// 'Lock',
		// 'EmplLock',
		// 'DateLock',
		/*
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
			data: 'ContactTypes=ContactTypes',
			success: function() {

			}
		})
	})
</script>




