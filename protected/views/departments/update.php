<?php

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Отделы'=>array('index'),
	'Редактировать',
);

?>
<?php $this->setPageTitle('Отделы - редактирование'); ?>
<div class='span-left'><?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

