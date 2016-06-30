<?php
/* @var $this StreetsController */
/* @var $model Streets */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Улицы'=>array('index'),
	$model->Street_id=>array('view','id'=>$model->Street_id),
	'Редактировать',
);


?>

<h1>Изменить Улицы <?php echo $model->Street_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Улицы', 'url'=>array('create')),
	
	array('label'=>'Редактирование Улицы', 'url'=>array('index')),
	array('label'=>'Удалить Улицы', 'url'=>array('delete&id='.$id)),
);


?>
</div>
