<?php

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Поставщики\Производители'=>array('index'),
	'Создать',
);

?>
<?php $this->setPageTitle('Поставщики - создание'); ?>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>