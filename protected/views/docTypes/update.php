<?php
/* @var $this DocTypesController */
/* @var $model DocTypes */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Типы документов'=>array('index'),
	$model->DocType_Id=>array('view','id'=>$model->DocType_Id),
	'Редактировать',
);


?>

<h1>Изменить Типы документов <?php echo $model->DocType_Id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Типы документов', 'url'=>array('create')),
	
	array('label'=>'Редактирование Типы документов', 'url'=>array('index')),
	array('label'=>'Удалить Типы документов', 'url'=>array('delete&id='.$id)),
);


?>
</div>
