<?php
/* @var $this ObjectTypesController */
/* @var $model ObjectTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Виды объектов'=>array('index'),
	$model->ObjectType_Id=>array('view','id'=>$model->ObjectType_Id),
	'Редактировать',
);


?>

<h1>Изменить Виды объектов <?php echo $model->ObjectType_Id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Виды объектов', 'url'=>array('create')),
	
	array('label'=>'Редактирование Виды объектов', 'url'=>array('index')),
	array('label'=>'Удалить Виды объектов', 'url'=>array('delete&id='.$id)),
);


?>
</div>
