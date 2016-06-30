<?php
/* @var $this RepairPriorsController */
/* @var $model RepairPriors */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Repair Priors'=>array('index'),
	'Создать',
);

?>
<h1>Создать RepairPriors</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать RepairPriors', 'url'=>array('create')),
	array('label'=>'Редактировать RepairPriors', 'url'=>array('index')),
	array('label'=>'Удалить RepairPriors', 'url'=>array('#')),
);
	?>
</div>