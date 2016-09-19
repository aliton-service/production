<?php
/* @var $this EquipTypesController */
/* @var $model EquipTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Types'=>array('index'),
	'Создать',
);

?>
<h1>Создать EquipTypes</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать EquipTypes', 'url'=>array('create')),
	array('label'=>'Редактировать EquipTypes', 'url'=>array('index')),
	array('label'=>'Удалить EquipTypes', 'url'=>array('#')),
);
	?>
</div>