<?php
/* @var $this DemandPriorsController */
/* @var $model DemandPriors */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Приоритет заявок'=>array('index'),
	'Создать',
);

?>
<h1>Создать Приоритет заявок</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Приоритет заявок', 'url'=>array('create')),
	array('label'=>'Редактировать Приоритет заявок', 'url'=>array('index')),
	array('label'=>'Удалить Приоритет заявок', 'url'=>array('#')),
);
	?>
</div>