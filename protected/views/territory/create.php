<?php
/* @var $this TerritoryController */
/* @var $model Territory */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Участки'=>array('index'),
	'Создать',
);

?>
<h1>Создать Участки</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Участки', 'url'=>array('create')),
	array('label'=>'Редактировать Участки', 'url'=>array('index')),
	array('label'=>'Удалить Участки', 'url'=>array('#')),
);
	?>
</div>