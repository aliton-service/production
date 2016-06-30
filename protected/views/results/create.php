<?php
/* @var $this ResultsController */
/* @var $model Results */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Результат контакта'=>array('index'),
	'Создать',
);

?>
<h1>Создать Результат контакта</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Результат контакта', 'url'=>array('create')),
	array('label'=>'Редактировать Результат контакта', 'url'=>array('index')),
	array('label'=>'Удалить Результат контакта', 'url'=>array('#')),
);
	?>
</div>