<?php
/* @var $this MalfunctionsController */
/* @var $model Malfunctions */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Malfunctions'=>array('index'),
	'Создать',
);

?>
<h1>Создать Malfunctions</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Malfunctions', 'url'=>array('create')),
	array('label'=>'Редактировать Malfunctions', 'url'=>array('index')),
	array('label'=>'Удалить Malfunctions', 'url'=>array('#')),
);
	?>
</div>