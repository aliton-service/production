<?php
/* @var $this AreasController */
/* @var $model Areas */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Районы'=>array('index'),
	'Создать',
);

?>
<h1>Создать Areas</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Районы', 'url'=>array('create')),
	array('label'=>'Редактировать Районы', 'url'=>array('index')),
	array('label'=>'Удалить Районы', 'url'=>array('#')),
);
	?>
</div>