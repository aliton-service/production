<?php
/* @var $this CompetitorsController */
/* @var $model Competitors */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Конкуренты'=>array('index'),
	$model->cmtr_id=>array('view','id'=>$model->cmtr_id),
	'Редактировать',
);


?>

<h1>Изменить Конкуренты <?php echo $model->cmtr_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Конкуренты', 'url'=>array('create')),
	
	array('label'=>'Редактирование Конкуренты', 'url'=>array('index')),
	array('label'=>'Удалить Конкуренты', 'url'=>array('delete&id='.$id)),
);


?>
</div>
