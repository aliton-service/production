<?php

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Подразделения'=>array('index'),
	'Создать',
);

?>

<div class='span-left'>
<?php $this->setPageTitle('Подразделения - создание'); ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

