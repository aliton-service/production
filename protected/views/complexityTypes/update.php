<?php
/* @var $this ComplexityTypesController */
/* @var $model ComplexityTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Статус клиента'=>array('index'),
	$model->Complexity_Id=>array('view','id'=>$model->Complexity_Id),
	'Редактировать',
);


?>

<h1>Изменить Статус клиента <?php echo $model->Complexity_Id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Статус клиента', 'url'=>array('create')),
	
	array('label'=>'Редактирование Статус клиента', 'url'=>array('index')),
	array('label'=>'Удалить Статус клиента', 'url'=>array('delete&id='.$id)),
);


?>
</div>
