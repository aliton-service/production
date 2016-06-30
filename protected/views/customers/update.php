<?php
/* @var $this CustomersController */
/* @var $model Customers */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Должности'=>array('index'),
	$model->Customer_Id=>array('view','id'=>$model->Customer_Id),
	'Редактировать',
);


?>

<h1>Изменить Должности <?php echo $model->Customer_Id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Должности', 'url'=>array('create')),
	
	array('label'=>'Редактирование Должности', 'url'=>array('index')),
	array('label'=>'Удалить Должности', 'url'=>array('delete&id='.$id)),
);


?>
</div>
