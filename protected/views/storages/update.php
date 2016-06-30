<?php
/* @var $this StoragesController */
/* @var $model Storages */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Склад'=>array('index'),
	$model->storage_id=>array('view','id'=>$model->storage_id),
	'Редактировать',
);


?>

<h1>Изменить Склад <?php echo $model->storage_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Склад', 'url'=>array('create')),
	
	array('label'=>'Редактирование Склад', 'url'=>array('index')),
	array('label'=>'Удалить Склад', 'url'=>array('delete&id='.$id)),
);


?>
</div>
