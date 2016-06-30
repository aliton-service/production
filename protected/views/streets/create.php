<?php

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Улицы'=>array('index'),
	'Создать',
);

?>

<div class='span-left'>
<?php $this->setPageTitle('Улицы - создание'); ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>