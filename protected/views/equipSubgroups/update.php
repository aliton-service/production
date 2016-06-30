<?php
/* @var $this EquipSubgroupsController */
/* @var $model EquipSubgroups */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Subgroups'=>array('index'),
	$model->name=>array('view','id'=>$model->sgrp_id),
	'Редактировать',
);


?>

<h1>Изменить EquipSubgroups <?php echo $model->sgrp_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

