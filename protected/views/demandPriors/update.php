<?php
/* @var $this DemandPriorsController */
/* @var $model DemandPriors */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Приоритет заявок'=>array('index'),
	$model->DemandPrior_id=>array('view','id'=>$model->DemandPrior_id),
	'Редактировать',
);


?>

<h1>Изменить Приоритет заявок <?php echo $model->DemandPrior_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Приоритет заявок', 'url'=>array('create')),
	
	array('label'=>'Редактирование Приоритет заявок', 'url'=>array('index')),
	array('label'=>'Удалить Приоритет заявок', 'url'=>array('delete&id='.$id)),
);


?>
</div>
