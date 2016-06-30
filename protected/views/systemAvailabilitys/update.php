<?php
/* @var $this SystemAvailabilitysController */
/* @var $model SystemAvailabilitys */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Наличие систем'=>array('index'),
	$model->code_id=>array('view','id'=>$model->code_id),
	'Редактировать',
);


?>

<h1>Изменить Наличие систем <?php echo $model->code_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Наличие систем', 'url'=>array('create')),
	
	array('label'=>'Редактирование Наличие систем', 'url'=>array('index')),
	array('label'=>'Удалить Наличие систем', 'url'=>array('delete&id='.$id)),
);


?>
</div>
