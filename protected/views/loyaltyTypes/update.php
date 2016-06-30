<?php
/* @var $this LoyaltyTypesController */
/* @var $model LoyaltyTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Удовлетворенность клиента'=>array('index'),
	$model->LoyaltyType_Id=>array('view','id'=>$model->LoyaltyType_Id),
	'Редактировать',
);


?>

<h1>Изменить Удовлетворенность клиента <?php echo $model->LoyaltyType_Id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Удовлетворенность клиента', 'url'=>array('create')),
	
	array('label'=>'Редактирование Удовлетворенность клиента', 'url'=>array('index')),
	array('label'=>'Удалить Удовлетворенность клиента', 'url'=>array('delete&id='.$id)),
);


?>
</div>
