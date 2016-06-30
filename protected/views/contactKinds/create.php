<?php
/* @var $this ContactKindsController */
/* @var $model ContactKinds */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Тема контакта'=>array('index'),
	'Создать',
);

?>
<h1>Создать Тема контакта</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Тема контакта', 'url'=>array('create')),
	array('label'=>'Редактировать Тема контакта', 'url'=>array('index')),
	array('label'=>'Удалить Тема контакта', 'url'=>array('#')),
);
	?>
</div>