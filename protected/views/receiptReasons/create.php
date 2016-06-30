<?php
/* @var $this ReceiptReasonsController */
/* @var $model ReceiptReasons */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Основания для получения'=>array('index'),
	'Создать',
);

?>
<h1>Создать Основания для получения</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Основания для получения', 'url'=>array('create')),
	array('label'=>'Редактировать Основания для получения', 'url'=>array('index')),
	array('label'=>'Удалить Основания для получения', 'url'=>array('#')),
);
	?>
</div>