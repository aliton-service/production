<br><?php
/* @var $this EquipGroupsController */
/* @var $model EquipGroups */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Groups'=>array('index'),
	$model->name=>array('view','id'=>$model->grp_id),
	'Редактировать',
);
$this->title = 'Изменить группу ТМЦ';
$this->setPageTitle('Изменить группу ТМЦ');
?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>

