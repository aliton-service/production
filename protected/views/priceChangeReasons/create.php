<?php
/* @var $this PriceChangeReasonsController */
/* @var $model PriceChangeReasons */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Причина смены тарифа'=>array('index'),
	'Создать',
);

?>
<h1>Создать Причина смены тарифа</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Причина смены тарифа', 'url'=>array('create')),
	array('label'=>'Редактировать Причина смены тарифа', 'url'=>array('index')),
	array('label'=>'Удалить Причина смены тарифа', 'url'=>array('#')),
);
	?>
</div>