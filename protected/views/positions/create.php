<?php

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Должности'=>array('index'),
	'Создать',
);

?>

<div class='span-left'>
<?php $this->setPageTitle('Должности - создание'); ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

