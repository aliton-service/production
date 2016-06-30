<?php
/* @var $this AddressSystemsController */
/* @var $model AddressSystems */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Адресная система'=>array('index'),
	'Редактировать',
);
$this->setPageTitle('Изменить Адресную систему');

?>



<div><?php $this->renderPartial('_form', array('model'=>$model)); ?></div>


