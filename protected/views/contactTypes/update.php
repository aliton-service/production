<?php
/* @var $this ContactTypesController */
/* @var $model ContactTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Тип совершенного контакта'=>array('index'),
	$model->Contact_id=>array('view','id'=>$model->Contact_id),
	'Редактировать',
);


?>

<h1>Изменить Тип совершенного контакта <?php echo $model->Contact_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Тип совершенного контакта', 'url'=>array('create')),
	
	array('label'=>'Редактирование Тип совершенного контакта', 'url'=>array('index')),
	array('label'=>'Удалить Тип совершенного контакта', 'url'=>array('delete&id='.$id)),
);


?>
</div>
