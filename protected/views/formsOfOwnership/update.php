<?php
/* @var $this FormsOfOwnershipController */
/* @var $model FormsOfOwnership */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Типы организаций'=>array('index'),
	$model->name=>array('view','id'=>$model->fown_id),
	'Редактировать',
);


?>

<h1>Изменить Типы организаций <?php echo $model->fown_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Типы организаций', 'url'=>array('create')),
	
	array('label'=>'Редактирование Типы организаций', 'url'=>array('index')),
	array('label'=>'Удалить Типы организаций', 'url'=>array('delete&id='.$id)),
);


?>
</div>
