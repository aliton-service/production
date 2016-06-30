<?php
/* @var $this DocTypesController */
/* @var $model DocTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Типы документов'=>array('index'),
	'Создать',
);

?>
<h1>Создать Типы документов</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Типы документов', 'url'=>array('create')),
	array('label'=>'Редактировать Типы документов', 'url'=>array('index')),
	array('label'=>'Удалить Типы документов', 'url'=>array('#')),
);
	?>
</div>