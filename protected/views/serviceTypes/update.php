<?php

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Тарифы обслуживания'=>array('index'),
	'Редактировать',
);

?>
<?php $this->setPageTitle('Тарифы обслуживания - редактирование'); ?>
<div class='span-left'><?php $this->renderPartial('_form', array('model'=>$model)); ?></div>
