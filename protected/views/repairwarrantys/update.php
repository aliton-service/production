<?php

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Гарантийные талоны'=>array('index'),
	'Редактировать',
);

?>
<?php $this->setPageTitle('Гарантийный талон - редактирование'); ?>
<div class='span-left'><?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

