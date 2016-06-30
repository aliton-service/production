<?php
/* @var $this EquipRatesController */
/* @var $model EquipRates */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Rates'=>array('index'),
	'Создать',
);

?>
<h1>Создать EquipRates</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать EquipRates', 'url'=>array('create')),
	array('label'=>'Редактировать EquipRates', 'url'=>array('index')),
	array('label'=>'Удалить EquipRates', 'url'=>array('#')),
);
	?>
</div>