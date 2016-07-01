<?php

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Накладные'=>array('index'),
	'Редактировать',
);

?>
<?php $this->setPageTitle('Накладная - редактирование'); ?>
<div class='span-left'><?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

