<?php
/* @var $this LoyaltyTypesController */
/* @var $model LoyaltyTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Удовлетворенность клиента'=>array('index'),
	'Создать',
);

?>
<h1>Создать Удовлетворенность клиента</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Удовлетворенность клиента', 'url'=>array('create')),
	array('label'=>'Редактировать Удовлетворенность клиента', 'url'=>array('index')),
	array('label'=>'Удалить Удовлетворенность клиента', 'url'=>array('#')),
);
	?>
</div>