<?php

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Улицы'=>array('index'),
	'Редактировать',
);

?>
<?php $this->setPageTitle('Улицы -редактирование'); ?>
<div class='span-left'><?php $this->renderPartial('_form', array('model'=>$model)); ?></div>
