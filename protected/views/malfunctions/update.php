<?php
/* @var $this MalfunctionsController */
/* @var $model Malfunctions */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Malfunctions'=>array('index'),
	$model->Malfunction_id=>array('view','id'=>$model->Malfunction_id),
	'Редактировать',
);


?>

<h1>Изменить Malfunctions <?php echo $model->Malfunction_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Malfunctions', 'url'=>array('create')),
	
	array('label'=>'Редактирование Malfunctions', 'url'=>array('index')),
	array('label'=>'Удалить Malfunctions', 'url'=>array('delete&id='.$id)),
);


?>
</div>
