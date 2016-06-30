<?php

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Подразделения'=>array('index'),
	'Редактировать',
);

?>
<?php $this->setPageTitle('Подразделения - редактирование'); ?>
<div class='span-left'><?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

