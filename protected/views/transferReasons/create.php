<?php
/* @var $this TransferReasonsController */
/* @var $model TransferReasons */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Причина перемещения'=>array('index'),
	'Создать',
);

?>
<h1>Создать Причина перемещения</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Причина перемещения', 'url'=>array('create')),
	array('label'=>'Редактировать Причина перемещения', 'url'=>array('index')),
	array('label'=>'Удалить Причина перемещения', 'url'=>array('#')),
);
	?>
</div>