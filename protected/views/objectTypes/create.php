<?php
/* @var $this ObjectTypesController */
/* @var $model ObjectTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Виды объектов'=>array('index'),
	'Создать',
);

?>
<h1>Создать Виды объектов</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Виды объектов', 'url'=>array('create')),
	array('label'=>'Редактировать Виды объектов', 'url'=>array('index')),
	array('label'=>'Удалить Виды объектов', 'url'=>array('#')),
);
	?>
</div>