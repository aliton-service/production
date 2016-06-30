<?php
/* @var $this EquipAnalogController */
/* @var $model EquipAnalog */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Analogs'=>array('index'),
	'Создать',
);

?>
<h1>Создать EquipAnalog</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать EquipAnalog', 'url'=>array('create')),
	array('label'=>'Редактировать EquipAnalog', 'url'=>array('index')),
	array('label'=>'Удалить EquipAnalog', 'url'=>array('#')),
);
	?>
</div>