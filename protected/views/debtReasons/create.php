<?php
/* @var $this DebtReasonsController */
/* @var $model DebtReasons */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Причина долга'=>array('index'),
	'Создать',
);

?>
<h1>Создать Причина долга</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Причина долга', 'url'=>array('create')),
	array('label'=>'Редактировать Причина долга', 'url'=>array('index')),
	array('label'=>'Удалить Причина долга', 'url'=>array('#')),
);
	?>
</div>