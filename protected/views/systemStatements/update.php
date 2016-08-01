<?php

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Состояние системы'=>array('index'),
	'Редактировать',
);

?>
<?php $this->setPageTitle('Состояние системы - редактирование'); ?>
<div class='span-left'><?php $this->renderPartial('_form', array('model'=>$model)); ?></div>
