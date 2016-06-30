<?php
/* @var $this StreetsController */
/* @var $model Streets */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Улицы'=>array('index'),
	'Создать',
);

?>
<h1>Создать Улицы</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Улицы', 'url'=>array('create')),
	array('label'=>'Редактировать Улицы', 'url'=>array('index')),
	array('label'=>'Удалить Улицы', 'url'=>array('#')),
);
	?>
</div>