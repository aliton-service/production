<?php
/* @var $this DemandResultsController */
/* @var $model DemandResults */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Demand Results'=>array('index'),
	$model->Result_id=>array('view','id'=>$model->Result_id),
	'Редактировать',
);


?>

<h1>Изменить DemandResults <?php echo $model->Result_id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать DemandResults', 'url'=>array('create')),
	
	array('label'=>'Редактирование DemandResults', 'url'=>array('index')),
	array('label'=>'Удалить DemandResults', 'url'=>array('delete&id='.$id)),
);


?>
</div>
