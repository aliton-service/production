<?php
/* @var $this StreetsController */
/* @var $model Streets */

$this->breadcrumbs=array(
	'Объекты',
	'Контакты'=>array('index'),
	'Создать',
);

?>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model,'ObjectGr_id'=>$model->ObjectGr_id)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Контакт', 'url'=>array('create')),
	array('label'=>'Редактировать Контакт', 'url'=>array('index')),
	array('label'=>'Удалить Контакт', 'url'=>array('#')),
);
	?>
</div>