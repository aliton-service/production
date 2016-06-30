<?php
/* @var $this ContactTypesController */
/* @var $model ContactTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Тип совершенного контакта'=>array('index'),
	'Создать',
);

?>
<h1>Создать Тип совершенного контакта</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Тип совершенного контакта', 'url'=>array('create')),
	array('label'=>'Редактировать Тип совершенного контакта', 'url'=>array('index')),
	array('label'=>'Удалить Тип совершенного контакта', 'url'=>array('#')),
);
	?>
</div>