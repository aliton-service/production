<?php
/* @var $this EquipRatesController */
/* @var $model EquipRates */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Rates'=>array('index'),
	$model->eqrt_id=>array('view','id'=>$model->eqrt_id),
	'Редактировать',
);


?>

<h1>Изменить EquipRates <?php echo $model->eqrt_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать EquipRates', 'url'=>array('create')),
	
	array('label'=>'Редактирование EquipRates', 'url'=>array('index')),
	array('label'=>'Удалить EquipRates', 'url'=>array('delete&id='.$id)),
);


?>
</div>
