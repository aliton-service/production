<?php
/* @var $this DelayReasonsController */
/* @var $model DelayReasons */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Причина просрочки'=>array('index'),
	'Создать',
);

?>
<h1>Создать Причина просрочки</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Причина просрочки', 'url'=>array('create')),
	array('label'=>'Редактировать Причина просрочки', 'url'=>array('index')),
	array('label'=>'Удалить Причина просрочки', 'url'=>array('#')),
);
	?>
</div>