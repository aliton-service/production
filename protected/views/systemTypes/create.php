<?php
/* @var $this SystemTypesController */
/* @var $model SystemTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Тип системы'=>array('index'),
	'Создать',
);

?>
<h1>Создать Тип системы</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Тип системы', 'url'=>array('create')),
	array('label'=>'Редактировать Тип системы', 'url'=>array('index')),
	array('label'=>'Удалить Тип системы', 'url'=>array('#')),
);
	?>
</div>