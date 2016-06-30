<?php
/* @var $this EquipRateDetailsController */
/* @var $model EquipRateDetails */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Rate Details'=>array('index'),
	'Создать',
);

?>
<h1>Создать EquipRateDetails</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать EquipRateDetails', 'url'=>array('create')),
	array('label'=>'Редактировать EquipRateDetails', 'url'=>array('index')),
	array('label'=>'Удалить EquipRateDetails', 'url'=>array('#')),
);
	?>
</div>