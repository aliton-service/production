<?php
/* @var $this WorkTypesController */
/* @var $model WorkTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Work Types'=>array('index'),
	$model->name=>array('view','id'=>$model->wrtp_id),
	'Редактировать',
);


?>

<h1>Изменить WorkTypes <?php echo $model->wrtp_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать WorkTypes', 'url'=>array('create')),
	
	array('label'=>'Редактирование WorkTypes', 'url'=>array('index')),
	array('label'=>'Удалить WorkTypes', 'url'=>array('delete&id='.$id)),
);


?>
</div>
