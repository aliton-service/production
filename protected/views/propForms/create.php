<?php
/* @var $this PropFormsController */
/* @var $model PropForms */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Организации'=>array('index'),
	'Создать',
);

?>
<?php $this->setPageTitle('Организации - создание'); ?>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

