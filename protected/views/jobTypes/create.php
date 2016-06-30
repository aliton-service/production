<?php
/* @var $this JobTypesController */
/* @var $model JobTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Виды работ'=>array('index'),
	'Создать',
);

?>
<h1>Создать Виды работ</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Виды работ', 'url'=>array('create')),
	array('label'=>'Редактировать Виды работ', 'url'=>array('index')),
	array('label'=>'Удалить Виды работ', 'url'=>array('#')),
);
	?>
</div>