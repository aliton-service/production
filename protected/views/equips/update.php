<?php
/* @var $this EquipsController */
/* @var $model Equips */
$this->title = 'Изменить оборудование';
$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equips'=>array('index'),
	$model->Equip_id=>array('view','id'=>$model->Equip_id),
	'Редактировать',
);

$this->setPageTitle('Изменить оборудование');
?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
//$this->menu=array(
//
//	array('label'=>'Создать Equips', 'url'=>array('create')),
//
//	array('label'=>'Редактирование Equips', 'url'=>array('index')),
//	array('label'=>'Удалить Equips', 'url'=>array('delete&id='.$id)),
//);


?>
