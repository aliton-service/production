<?php
/* @var $this ConfirmCancelsController */
/* @var $model ConfirmCancels */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Подтверждение отмены накладной'=>array('index'),
	$model->ConfirmCancel_id=>array('view','id'=>$model->ConfirmCancel_id),
	'Редактировать',
);


?>

<h1>Изменить Подтверждение отмены накладной <?php echo $model->ConfirmCancel_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Подтверждение отмены накладной', 'url'=>array('create')),
	
	array('label'=>'Редактирование Подтверждение отмены накладной', 'url'=>array('index')),
	array('label'=>'Удалить Подтверждение отмены накладной', 'url'=>array('delete&id='.$id)),
);


?>
</div>
