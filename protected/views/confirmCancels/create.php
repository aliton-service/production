<?php
/* @var $this ConfirmCancelsController */
/* @var $model ConfirmCancels */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Подтверждение отмены накладной'=>array('index'),
	'Создать',
);

?>
<h1>Создать Подтверждение отмены накладной</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Подтверждение отмены накладной', 'url'=>array('create')),
	array('label'=>'Редактировать Подтверждение отмены накладной', 'url'=>array('index')),
	array('label'=>'Удалить Подтверждение отмены накладной', 'url'=>array('#')),
);
	?>
</div>