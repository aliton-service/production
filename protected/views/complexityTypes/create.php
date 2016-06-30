<?php
/* @var $this ComplexityTypesController */
/* @var $model ComplexityTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Статус клиента'=>array('index'),
	'Создать',
);

?>
<h1>Создать Статус клиента</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Статус клиента', 'url'=>array('create')),
	array('label'=>'Редактировать Статус клиента', 'url'=>array('index')),
	array('label'=>'Удалить Статус клиента', 'url'=>array('#')),
);
	?>
</div>