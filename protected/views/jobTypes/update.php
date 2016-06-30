<?php
/* @var $this JobTypesController */
/* @var $model JobTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Виды работ'=>array('index'),
	$model->JobType_Id=>array('view','id'=>$model->JobType_Id),
	'Редактировать',
);


?>

<h1>Изменить Виды работ <?php echo $model->JobType_Id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Виды работ', 'url'=>array('create')),
	
	array('label'=>'Редактирование Виды работ', 'url'=>array('index')),
	array('label'=>'Удалить Виды работ', 'url'=>array('delete&id='.$id)),
);


?>
</div>
