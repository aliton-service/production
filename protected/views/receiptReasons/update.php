<?php
/* @var $this ReceiptReasonsController */
/* @var $model ReceiptReasons */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Основания для получения'=>array('index'),
	$model->name=>array('view','id'=>$model->rcrs_id),
	'Редактировать',
);


?>

<h1>Изменить Основания для получения <?php echo $model->rcrs_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Основания для получения', 'url'=>array('create')),
	
	array('label'=>'Редактирование Основания для получения', 'url'=>array('index')),
	array('label'=>'Удалить Основания для получения', 'url'=>array('delete&id='.$id)),
);


?>
</div>
