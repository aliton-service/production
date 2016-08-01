<?php
/* @var $this SystemStatementsController */
/* @var $model SystemStatements */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Состояние системы'=>array('index'),
	'Создать',
);

?>
<h1>Создать Состояние системы</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать состояние системы', 'url'=>array('create')),
	array('label'=>'Редактировать состояние системы', 'url'=>array('index')),
	array('label'=>'Удалить состояние системы', 'url'=>array('#')),
);
	?>
</div>