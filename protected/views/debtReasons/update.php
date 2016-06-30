<?php
/* @var $this DebtReasonsController */
/* @var $model DebtReasons */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Причина долга'=>array('index'),
	$model->name=>array('view','id'=>$model->drsn_Id),
	'Редактировать',
);


?>

<h1>Изменить Причина долга <?php echo $model->drsn_Id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Причина долга', 'url'=>array('create')),
	
	array('label'=>'Редактирование Причина долга', 'url'=>array('index')),
	array('label'=>'Удалить Причина долга', 'url'=>array('delete&id='.$id)),
);


?>
</div>
