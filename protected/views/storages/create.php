<?php
/* @var $this StoragesController */
/* @var $model Storages */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Склад'=>array('index'),
	'Создать',
);

?>
<h1>Создать Склад</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Склад', 'url'=>array('create')),
	array('label'=>'Редактировать Склад', 'url'=>array('index')),
	array('label'=>'Удалить Склад', 'url'=>array('#')),
);
	?>
</div>