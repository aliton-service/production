<?php
/* @var $this PaymentTypesController */
/* @var $model PaymentTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Виды оплат'=>array('index'),
	'Создать',
);

?>
<h1>Создать Виды оплат</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Виды оплат', 'url'=>array('create')),
	array('label'=>'Редактировать Виды оплат', 'url'=>array('index')),
	array('label'=>'Удалить Виды оплат', 'url'=>array('#')),
);
	?>
</div>