<?php
/* @var $this AreasController */
/* @var $model Areas */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Районы'=>array('index'),
	$model->Area_id=>array('view','id'=>$model->Area_id),
	'Редактировать',
);


?>

<h1>Изменить Районы <?php echo $model->Area_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Районы', 'url'=>array('create')),
	
	array('label'=>'Редактирование Районы', 'url'=>array('index')),
	array('label'=>'Удалить Районы', 'url'=>array('delete&id='.$id)),
);


?>
</div>
