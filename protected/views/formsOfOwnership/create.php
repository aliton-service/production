<?php
/* @var $this FormsOfOwnershipController */
/* @var $model FormsOfOwnership */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Типы организаций'=>array('index'),
	'Создать',
);

?>
<h1>Создать Типы организаций</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Типы организаций', 'url'=>array('create')),
	array('label'=>'Редактировать Типы организаций', 'url'=>array('index')),
	array('label'=>'Удалить Типы организаций', 'url'=>array('#')),
);
	?>
</div>