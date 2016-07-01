<?php

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Акты'=>array('index'),
	'Создать',
);

?>
<?php $this->setPageTitle('Реестр актов дефектации'); ?>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>
