<?php

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Акты утилизации'=>array('index'),
	'Редактировать',
);

?>
<?php $this->setPageTitle('Акт утилизации - редактирование'); ?>
<div class='span-left'><?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

