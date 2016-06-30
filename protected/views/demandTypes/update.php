<?php
/* @var $this DemandTypesController */
/* @var $model DemandTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Типы заявок'=>array('index'),
	$model->DemandType_id=>array('view','id'=>$model->DemandType_id),
	'Редактировать',
);


?>

<h1>Изменить Типы заявок <?php echo $model->DemandType_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Типы заявок', 'url'=>array('create')),
	
	array('label'=>'Редактирование Типы заявок', 'url'=>array('index')),
	array('label'=>'Удалить Типы заявок', 'url'=>array('delete&id='.$id)),
);


?>
</div>
