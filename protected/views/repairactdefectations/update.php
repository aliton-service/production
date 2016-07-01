<?php

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Акты дефектации'=>array('index'),
	'Редактировать',
);

?>
<?php $this->setPageTitle('Акт дефектации - редактирование'); ?>
<div class='span-left'><?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

