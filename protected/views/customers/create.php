<?php
/* @var $this CustomersController */
/* @var $model Customers */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Должности'=>array('index'),
	'Создать',
);

?>
<h1>Создать Должности</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Должности', 'url'=>array('create')),
	array('label'=>'Редактировать Должности', 'url'=>array('index')),
	array('label'=>'Удалить Должности', 'url'=>array('#')),
);
	?>
</div>