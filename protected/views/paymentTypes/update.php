<?php
/* @var $this PaymentTypesController */
/* @var $model PaymentTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Виды оплат'=>array('index'),
	$model->PaymentType_Id=>array('view','id'=>$model->PaymentType_Id),
	'Редактировать',
);


?>

<h1>Изменить Виды оплат <?php echo $model->PaymentType_Id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Виды оплат', 'url'=>array('create')),
	
	array('label'=>'Редактирование Виды оплат', 'url'=>array('index')),
	array('label'=>'Удалить Виды оплат', 'url'=>array('delete&id='.$id)),
);


?>
</div>
