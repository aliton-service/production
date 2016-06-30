<?php
/* @var $this EquipsController */
/* @var $model Equips */
$this->title = 'Создать оборудование';
$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equips'=>array('index'),
	'Создать',
);
$this->setPageTitle('Создать оборудование');
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>


<?php
//$this->menu=array(
//	array('label'=>'Создать Equips', 'url'=>array('create')),
//	array('label'=>'Редактировать Equips', 'url'=>array('index')),
//	array('label'=>'Удалить Equips', 'url'=>array('#')),
//);
	?>
