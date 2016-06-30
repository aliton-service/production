<?php
/* @var $this EquipsHistoryController */
/* @var $model EquipsHistory */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equips Histories'=>array('index'),
	'Создать',
);

?>
<h1>Создать EquipsHistory</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать EquipsHistory', 'url'=>array('create')),
	array('label'=>'Редактировать EquipsHistory', 'url'=>array('index')),
	array('label'=>'Удалить EquipsHistory', 'url'=>array('#')),
);
	?>
</div>