<?php
/* @var $this ResultsController */
/* @var $model Results */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Результат контакта'=>array('index'),
	$model->Result_Id=>array('view','id'=>$model->Result_Id),
	'Редактировать',
);


?>

<h1>Изменить Результат контакта <?php echo $model->Result_Id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Результат контакта', 'url'=>array('create')),
	
	array('label'=>'Редактирование Результат контакта', 'url'=>array('index')),
	array('label'=>'Удалить Результат контакта', 'url'=>array('delete&id='.$id)),
);


?>
</div>
