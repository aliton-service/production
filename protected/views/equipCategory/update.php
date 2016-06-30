<?php
/* @var $this EquipCategoryController */
/* @var $model EquipCategory */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Categories'=>array('index'),
	$model->eqct_id=>array('view','id'=>$model->eqct_id),
	'Редактировать',
);


?>

<h1>Изменить EquipCategory <?php echo $model->eqct_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать EquipCategory', 'url'=>array('create')),
	
	array('label'=>'Редактирование EquipCategory', 'url'=>array('index')),
	array('label'=>'Удалить EquipCategory', 'url'=>array('delete&id='.$id)),
);


?>
</div>
