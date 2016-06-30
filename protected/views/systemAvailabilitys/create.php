<?php
/* @var $this SystemAvailabilitysController */
/* @var $model SystemAvailabilitys */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Наличие систем'=>array('index'),
	'Создать',
);

?>
<h1>Создать Наличие систем</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Наличие систем', 'url'=>array('create')),
	array('label'=>'Редактировать Наличие систем', 'url'=>array('index')),
	array('label'=>'Удалить Наличие систем', 'url'=>array('#')),
);
	?>
</div>