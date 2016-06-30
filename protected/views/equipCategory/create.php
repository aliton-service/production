<?php
/* @var $this EquipCategoryController */
/* @var $model EquipCategory */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Categories'=>array('index'),
	'Создать',
);

?>
<h1>Создать EquipCategory</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать EquipCategory', 'url'=>array('create')),
	array('label'=>'Редактировать EquipCategory', 'url'=>array('index')),
	array('label'=>'Удалить EquipCategory', 'url'=>array('#')),
);
	?>
</div>