<?php
/* @var $this JuridicalsController */
/* @var $model Juridicals */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Юридические лица'=>array('index'),
	
);

$this->menu=array(
	array('label'=>'Создать Юридические лица', 'url'=>array('create')),
	array('label'=>'Редактировать Юридические лица', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'update')),
	array('label'=>'Удалить Юридические лица', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'delete')),
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

<h1>Редактирование Юридические лица</h1>


 


<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'juridicals-grid',
	'dataProvider'=>$dataProvider,
	'cssFile'=>'css/reference/gridview/styles.css',
	'pager'=>array('cssFile'=>'css/reference/gridview/pager.css', ),
	'filter'=>$model,
	'columns'=>array(
		'Jrdc_Id'=>array(
			'name'=>'Jrdc_Id',
			'value'=>'$data["Jrdc_Id"]',
			'htmlOptions'=>array('role'=>'id','style'=>'width:5px'),
			'header'=>''
			),
		'JuridicalPerson'=>array('name'=>'JuridicalPerson', 'header'=>'Юр. лицо'),
		'Identification'=>array('name'=>'Identification', 'header'=>'Identification'),
		'RegionName' =>array(
			'name'=>'RegionName',
			'value'=>'$data["RegionName"]',
			'header'=>'Регион'
			),
		'AreaName'=>array(
			'name'=>'AreaName',
			'value'=>'$data["AreaName"]',
			'header'=>'Район'),
		
		'StreetName' =>array(
			'name'=>'StreetName',
			'value'=>'$data["StreetName"]',
			'header'=>'Улица'
			),
		'jhouse'=>array('name'=>'jhouse', 'header'=>'Дом'),
		'jcorp'=>array('name'=>'jcorp', 'header'=>'Корпус'),
		'freg' =>array(
			'name'=>'freg',
			'value'=>'$data["freg"]',
			'header'=>'Фактический регион'
			),
		'far' =>array(
			'name'=>'far',
			'value'=>'$data["far"]',
			'header'=>'Фактический район'
			),
		'fstreet'=>array('name'=>'fstreet', 'header'=>'Фактическая улица'),
		'fhouse'=>array('name'=>'fhouse', 'header'=>'Фактический дом'),
		'fcorp'=>array('name'=>'fcorp', 'header'=>'Фактический корпус'),
		'inn'=>array('name'=>'inn', 'header'=>'ИНН'),
		'kpp'=>array('name'=>'kpp', 'header'=>'КПП'),
		'account'=>array('name'=>'account', 'header'=>'Счет'),
		'ogrn'=>array('name'=>'ogrn', 'header'=>'ОГРН'),
		'okpo'=>array('name'=>'okpo', 'header'=>'ОКПО'),
		'telephone'=>array('name'=>'telephone', 'header'=>'Номер телефона'),
		'post_index',
		/*
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
		// array(
		// 	'class'=>'CButtonColumn',
		// ),
	),
)); 
?>

<script type="text/javascript">
	$('body').on('click','.items tbody tr', function(){
		
		var link = $(this).find('td.button-column a.update').attr('href');
		var id = $(this).find('td[role=id]').text();
		$('li[data-action=update] a').attr('href', '/index.php?r=juridicals/update&id='+id);

		link = $(this).find('td.button-column a.delete').attr('href');
		$('li[data-action=delete] a').attr('href', '/index.php?r=juridicals/delete&id='+id);

	});

	$('body').on('click','li[data-action=delete] a',function(){
		$.ajax({
			type: 'post',
			url: $(this).attr('href'),
			data: 'Juridicals=Juridicals',
			success: function() {

			}
		})
	})
</script>




