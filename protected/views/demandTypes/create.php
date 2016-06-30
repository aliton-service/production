<?php
/* @var $this DemandTypesController */
/* @var $model DemandTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Типы заявок'=>array('index'),
	'Создать',
);

?>
<h1>Создать Типы заявок</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Типы заявок', 'url'=>array('create')),
	array('label'=>'Редактировать Типы заявок', 'url'=>array('index')),
	array('label'=>'Удалить Типы заявок', 'url'=>array('#')),
);
	?>
</div>