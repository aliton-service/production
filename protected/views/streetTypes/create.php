<?php
/* @var $this StreetTypesController */
/* @var $model StreetTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Типы улиц'=>array('index'),
	'Создать',
);

?>
<h1>Создать Типы улиц</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Типы улиц', 'url'=>array('create')),
	array('label'=>'Редактировать Типы улиц', 'url'=>array('index')),
	array('label'=>'Удалить Типы улиц', 'url'=>array('#')),
);
	?>
</div>