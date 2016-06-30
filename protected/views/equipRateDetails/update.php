<?php
/* @var $this EquipRateDetailsController */
/* @var $model EquipRateDetails */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Rate Details'=>array('index'),
	$model->rtdt_id=>array('view','id'=>$model->rtdt_id),
	'Редактировать',
);


?>

<h1>Изменить EquipRateDetails <?php echo $model->rtdt_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать EquipRateDetails', 'url'=>array('create')),
	
	array('label'=>'Редактирование EquipRateDetails', 'url'=>array('index')),
	array('label'=>'Удалить EquipRateDetails', 'url'=>array('delete&id='.$id)),
);


?>
</div>
