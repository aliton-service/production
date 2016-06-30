<?php
/* @var $this CompetitorsController */
/* @var $model Competitors */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Конкуренты'=>array('index'),
	'Создать',
);

?>
<h1>Создать Конкуренты</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Конкуренты', 'url'=>array('create')),
	array('label'=>'Редактировать Конкуренты', 'url'=>array('index')),
	array('label'=>'Удалить Конкуренты', 'url'=>array('#')),
);
	?>
</div>