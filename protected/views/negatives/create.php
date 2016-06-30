<?php
/* @var $this NegativesController */
/* @var $model Negatives */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Возражения клиентов'=>array('index'),
	'Создать',
);

?>
<h1>Создать Возражения клиентов</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Возражения клиентов', 'url'=>array('create')),
	array('label'=>'Редактировать Возражения клиентов', 'url'=>array('index')),
	array('label'=>'Удалить Возражения клиентов', 'url'=>array('#')),
);
	?>
</div>