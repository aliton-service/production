<?php

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Типы заявок'=>array('index'),
	'Создать',
);

?>

<div class='span-left'>
<?php $this->setPageTitle('Тип заявки - создание'); ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

