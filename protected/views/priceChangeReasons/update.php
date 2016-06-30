<?php
/* @var $this PriceChangeReasonsController */
/* @var $model PriceChangeReasons */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Причина смены тарифа'=>array('index'),
	$model->Reason_Id=>array('view','id'=>$model->Reason_Id),
	'Редактировать',
);


?>

<h1>Изменить Причина смены тарифа <?php echo $model->Reason_Id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Причина смены тарифа', 'url'=>array('create')),
	
	array('label'=>'Редактирование Причина смены тарифа', 'url'=>array('index')),
	array('label'=>'Удалить Причина смены тарифа', 'url'=>array('delete&id='.$id)),
);


?>
</div>
