<?php
/* @var $this EquipTypesController */
/* @var $model EquipTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Types'=>array('index'),
	$model->EquipType_id=>array('view','id'=>$model->EquipType_id),
	'Редактировать',
);


?>

<h1>Изменить EquipTypes <?php echo $model->EquipType_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать EquipTypes', 'url'=>array('create')),
	
	array('label'=>'Редактирование EquipTypes', 'url'=>array('index')),
	array('label'=>'Удалить EquipTypes', 'url'=>array('delete&id='.$id)),
);


?>
</div>
