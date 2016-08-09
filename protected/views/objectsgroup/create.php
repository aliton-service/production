<?php
/* @var $this RegionsController */
/* @var $model Regions */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Регионы'=>array('index'),
	'Создать',
);

?>
<h1>Создать Регионы</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Регионы', 'url'=>array('create')),
	array('label'=>'Редактировать Регионы', 'url'=>array('index')),
	array('label'=>'Удалить Регионы', 'url'=>array('#')),
);
	?>
</div>