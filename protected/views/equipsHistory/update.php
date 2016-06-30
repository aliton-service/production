<?php
/* @var $this EquipsHistoryController */
/* @var $model EquipsHistory */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equips Histories'=>array('index'),
	$model->eqhs_id=>array('view','id'=>$model->eqhs_id),
	'Редактировать',
);


?>

<h1>Изменить EquipsHistory <?php echo $model->eqhs_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать EquipsHistory', 'url'=>array('create')),
	
	array('label'=>'Редактирование EquipsHistory', 'url'=>array('index')),
	array('label'=>'Удалить EquipsHistory', 'url'=>array('delete&id='.$id)),
);


?>
</div>
