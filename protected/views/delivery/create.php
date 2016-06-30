<?php
/* @var $this StreetsController */
/* @var $model Streets */

$this->breadcrumbs=array(
	
	'Заявки на доставку'=>array('index'),
	'Создать',
);

?>
<h1>Создать Заявку на доставку</h1>
<?php $this->setPageTitle('Создать Заявку на доставку') ?>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model,'action'=>'create','ajax'=>isset($ajax) ? $ajax : false)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Заявку', 'url'=>array('create')),
	array('label'=>'Редактировать Заявку', 'url'=>array('index')),
	array('label'=>'Удалить Заявку', 'url'=>array('#')),
);
	?>
</div>