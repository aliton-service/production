<?php
/* @var $this RegionsController */
/* @var $model Regions */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Регионы'=>array('index'),
	$model->Region_id=>array('view','id'=>$model->Region_id),
	'Редактировать',
);


?>

<h1>Изменить Регионы <?php echo $model->Region_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Регионы', 'url'=>array('create')),
	
	array('label'=>'Редактирование Регионы', 'url'=>array('index')),
	array('label'=>'Удалить Регионы', 'url'=>array('delete&id='.$id)),
);


?>
</div>
