<?php
/* @var $this StreetsController */
/* @var $model Streets */

$this->breadcrumbs=array(
	'Объекты',
	'Контакты'=>array('index'),
	$model->cont_id=>array('view','id'=>$model->cont_id),
	'Редактировать',
);


?>


<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model,'obj_gr'=>1)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Контакт', 'url'=>array('create')),
	
	array('label'=>'Редактирование Контакт', 'url'=>array('index')),
	array('label'=>'Удалить Контакт', 'url'=>array('#')),
);


?>
</div>
