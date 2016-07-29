<?php
/* @var $this TerritoryController */
/* @var $model Territory */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Участки'=>array('index'),
	$model->Territ_Id=>array('view','id'=>$model->Territ_Id),
	'Редактировать',
);


?>

<h1>Изменить Участки <?php echo $model->Territ_Id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>

</div>
