<?php

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Отделы'=>array('index'),
	'Создать',
);

?>

<div class='span-left'>
<?php $this->setPageTitle('Отделы - создание'); ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

