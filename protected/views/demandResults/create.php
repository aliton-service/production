<?php
/* @var $this DemandResultsController */
/* @var $model DemandResults */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Demand Results'=>array('index'),
	'Создать',
);

?>
<h1>Создать DemandResults</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать DemandResults', 'url'=>array('create')),
	array('label'=>'Редактировать DemandResults', 'url'=>array('index')),
	array('label'=>'Удалить DemandResults', 'url'=>array('#')),
);
	?>
</div>