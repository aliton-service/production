<?php

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Сложность системы'=>array('index'),
	'Редактировать',
);

?>
<?php $this->setPageTitle('Сложность системы - редактирование'); ?>
<div class='span-left'><?php $this->renderPartial('_form', array('model'=>$model)); ?></div>
