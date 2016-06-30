<?php
/* @var $this SystemTypesController */
/* @var $model SystemTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Тип системы'=>array('index'),
	$model->SystemType_Id=>array('view','id'=>$model->SystemType_Id),
	'Редактировать',
);


?>

<h1>Изменить Тип системы <?php echo $model->SystemType_Id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Тип системы', 'url'=>array('create')),
	
	array('label'=>'Редактирование Тип системы', 'url'=>array('index')),
	array('label'=>'Удалить Тип системы', 'url'=>array('delete&id='.$id)),
);


?>
</div>
