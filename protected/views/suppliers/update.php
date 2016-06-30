<?php

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Поставщики\Производители'=>array('index'),
	'Редактировать',
);

?>
<?php $this->setPageTitle('Поставщики - редактирование'); ?>
<div class='span-left'><?php $this->renderPartial('_form', array('model'=>$model)); ?></div>
