<?php
/* @var $this SystemComplexitysController */
/* @var $model SystemComplexitys */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Сложность системы'=>array('index'),
	'Создать',
);

?>
<h1>Создать Сложность системы</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать сложность системы', 'url'=>array('create')),
	array('label'=>'Редактировать сложность системы', 'url'=>array('index')),
	array('label'=>'Удалить сложность системы', 'url'=>array('#')),
);
	?>
</div>