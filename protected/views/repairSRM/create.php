<?php

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Накладная'=>array('index'),
	'Создать',
);

?>
<?php $this->setPageTitle('Реестр сопроводительных накладных'); ?>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>
