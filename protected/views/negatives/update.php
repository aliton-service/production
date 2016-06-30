<?php
/* @var $this NegativesController */
/* @var $model Negatives */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Возражения клиентов'=>array('index'),
	$model->ngtv_id=>array('view','id'=>$model->ngtv_id),
	'Редактировать',
);


?>

<h1>Изменить Возражения клиентов <?php echo $model->ngtv_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Возражения клиентов', 'url'=>array('create')),
	
	array('label'=>'Редактирование Возражения клиентов', 'url'=>array('index')),
	array('label'=>'Удалить Возражения клиентов', 'url'=>array('delete&id='.$id)),
);


?>
</div>
