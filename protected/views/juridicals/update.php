<?php
/* @var $this JuridicalsController */
/* @var $model Juridicals */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Юридические лица'=>array('index'),
	$model->Jrdc_Id=>array('view','id'=>$model->Jrdc_Id),
	'Редактировать',
);


?>

<h1>Изменить Юридические лица <?php echo $model->Jrdc_Id; ?></h1>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Юридические лица', 'url'=>array('create')),
	
	array('label'=>'Редактирование Юридические лица', 'url'=>array('index')),
	array('label'=>'Удалить Юридические лица', 'url'=>array('delete&id='.$id)),
);


?>
</div>
