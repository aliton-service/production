<?php
/* @var $this PropFormsController */
/* @var $model PropForms */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Организации'=>array('index'),
	$model->Form_id=>array('view','id'=>$model->Form_id),
	'Редактировать',
);


?>

<div class='span-left'>
<?php $this->setPageTitle('Организации - редактирование'); ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>


