<?php

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Тарифы обслуживания'=>array('index'),
	'Создать',
);

?>

<div class='span-left'>
<?php $this->setPageTitle('Тарифы обслуживания - создание'); ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>