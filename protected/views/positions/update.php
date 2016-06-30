<?php

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Должности'=>array('index'),
	'Редактировать',
);

?>
<?php $this->setPageTitle('Должности - редактирование'); ?>
<div class='span-left'><?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

