<?php
/* @var $this ContactKindsController */
/* @var $model ContactKinds */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Тема контакта'=>array('index'),
	$model->Kind_id=>array('view','id'=>$model->Kind_id),
	'Редактировать',
);


?>

<h1>Изменить Тема контакта <?php echo $model->Kind_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Тема контакта', 'url'=>array('create')),
	
	array('label'=>'Редактирование Тема контакта', 'url'=>array('index')),
	array('label'=>'Удалить Тема контакта', 'url'=>array('delete&id='.$id)),
);


?>
</div>
