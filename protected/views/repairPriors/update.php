<?php
/* @var $this RepairPriorsController */
/* @var $model RepairPriors */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Repair Priors'=>array('index'),
	$model->prtp_id=>array('view','id'=>$model->prtp_id),
	'Редактировать',
);


?>

<h1>Изменить RepairPriors <?php echo $model->prtp_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать RepairPriors', 'url'=>array('create')),
	
	array('label'=>'Редактирование RepairPriors', 'url'=>array('index')),
	array('label'=>'Удалить RepairPriors', 'url'=>array('delete&id='.$id)),
);


?>
</div>
