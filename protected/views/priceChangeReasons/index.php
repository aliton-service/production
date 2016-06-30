<?php
/* @var $this PriceChangeReasonsController */
/* @var $model PriceChangeReasons */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Причина смены тарифа'=>array('index'),
	
);

$this->menu=array(
	array('label'=>'Создать Причина смены тарифа', 'url'=>array('create')),
	array('label'=>'Редактировать Причина смены тарифа', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'update')),
	array('label'=>'Удалить Причина смены тарифа', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'delete')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#price-change-reasons-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Редактирование Причина смены тарифа</h1>





<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'price-change-reasons-grid',
	'dataProvider'=>$model->search(),
	'cssFile'=>'css/reference/gridview/styles.css',
	'pager'=>array('cssFile'=>'css/reference/gridview/pager.css', ),
	'filter'=>$model,
	'columns'=>array(
		// 'Reason_Id',
		'ReasonName'=>array('name'=>'ReasonName', 'header'=>'Причина смены тарифа'),
		// 'Lock',
		// 'EmplLock',
		// 'DateLock',
		// 'EmplChange',
		/*
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
			data: 'PriceChangeReasons=PriceChangeReasons',
			success: function() {

			}
		})
	})
</script>




