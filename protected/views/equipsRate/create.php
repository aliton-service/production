<?php
/* @var $this EquipsRateController */
/* @var $model EquipsRate */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equips Rates'=>array('index'),
	'Создать',
);

?>
<h1>Создать EquipsRate</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать EquipsRate', 'url'=>array('create')),
	array('label'=>'Редактировать EquipsRate', 'url'=>array('index')),
	array('label'=>'Удалить EquipsRate', 'url'=>array('#')),
);
	?>
</div>