<?php
/* @var $this StreetsController */
/* @var $model Streets */

$this->breadcrumbs=array(
	
	'Заявки'=>array('index'),
	'Создать',
);

?>

<div class='span-left'>
<?php $this->renderPartial('_form2', array('model'=>$model,'action'=>'create', 'ObjectsGroup' => $ObjectsGroup, 'Objects' => $Objects, 'ReadOnly' => $ReadOnly)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Заявку', 'url'=>array('create')),
	array('label'=>'Редактировать Заявку', 'url'=>array('index')),
	array('label'=>'Удалить Заявку', 'url'=>array('#')),
);
	?>
</div>