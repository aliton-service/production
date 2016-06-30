<?php
/* @var $this EquipsRateController */
/* @var $model EquipsRate */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equips Rates'=>array('index'),
	$model->eqrt_id=>array('view','id'=>$model->eqrt_id),
	'Редактировать',
);


?>

<h1>Изменить EquipsRate <?php echo $model->eqrt_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать EquipsRate', 'url'=>array('create')),
	
	array('label'=>'Редактирование EquipsRate', 'url'=>array('index')),
	array('label'=>'Удалить EquipsRate', 'url'=>array('delete&id='.$id)),
);


?>
</div>
