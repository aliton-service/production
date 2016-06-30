<?php
/* @var $this StreetTypesController */
/* @var $model StreetTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Типы улиц'=>array('index'),
	$model->StreetType_id=>array('view','id'=>$model->StreetType_id),
	'Редактировать',
);


?>

<h1>Изменить Типы улиц <?php echo $model->StreetType_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Типы улиц', 'url'=>array('create')),
	
	array('label'=>'Редактирование Типы улиц', 'url'=>array('index')),
	array('label'=>'Удалить Типы улиц', 'url'=>array('delete&id='.$id)),
);


?>
</div>
