<?php

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Типы оборудования'=>array('index'),
	'Создать',
);

?>

<div class='span-left'>
<?php $this->setPageTitle('Тип оборудования - создание'); ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

