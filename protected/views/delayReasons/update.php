<?php
/* @var $this DelayReasonsController */
/* @var $model DelayReasons */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Причина просрочки'=>array('index'),
	$model->name=>array('view','id'=>$model->dlrs_id),
	'Редактировать',
);


?>

<h1>Изменить Причина просрочки <?php echo $model->dlrs_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Причина просрочки', 'url'=>array('create')),
	
	array('label'=>'Редактирование Причина просрочки', 'url'=>array('index')),
	array('label'=>'Удалить Причина просрочки', 'url'=>array('delete&id='.$id)),
);


?>
</div>
