<?php
/* @var $this WorkTypesController */
/* @var $model WorkTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Тип работ'=>array('index'),
	'Создать',
);

?>
<h1>Создать Тип работ</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Тип работ', 'url'=>array('create')),
	array('label'=>'Редактировать Тип работ', 'url'=>array('index')),
	array('label'=>'Удалить Тип работ', 'url'=>array('#')),
);
	?>
</div>