<?php
/* @var $this EquipAnalogController */
/* @var $model EquipAnalog */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Analogs'=>array('index'),
	$model->Analog_id=>array('view','id'=>$model->Analog_id),
	'Редактировать',
);


?>

<h1>Изменить EquipAnalog <?php echo $model->Analog_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать EquipAnalog', 'url'=>array('create')),
	
	array('label'=>'Редактирование EquipAnalog', 'url'=>array('index')),
	array('label'=>'Удалить EquipAnalog', 'url'=>array('delete&id='.$id)),
);


?>
</div>
