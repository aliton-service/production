<?php
/* @var $this JuridicalsController */
/* @var $model Juridicals */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Юридические лица'=>array('index'),
	'Создать',
);

?>
<h1>Создать Юридические лица</h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	array('label'=>'Создать Юридические лица', 'url'=>array('create')),
	array('label'=>'Редактировать Юридические лица', 'url'=>array('index')),
	array('label'=>'Удалить Юридические лица', 'url'=>array('#')),
);
	?>
</div>