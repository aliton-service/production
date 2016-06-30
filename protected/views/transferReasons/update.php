<?php
/* @var $this TransferReasonsController */
/* @var $model TransferReasons */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Причина перемещения'=>array('index'),
	$model->TransferReason_id=>array('view','id'=>$model->TransferReason_id),
	'Редактировать',
);


?>

<h1>Изменить Причина перемещения <?php echo $model->TransferReason_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Причина перемещения', 'url'=>array('create')),
	
	array('label'=>'Редактирование Причина перемещения', 'url'=>array('index')),
	array('label'=>'Удалить Причина перемещения', 'url'=>array('delete&id='.$id)),
);


?>
</div>
