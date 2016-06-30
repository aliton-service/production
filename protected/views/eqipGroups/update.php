<br>
<?php
/* @var $this EqipGroupsController */
/* @var $model EqipGroups */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Eqip Groups'=>array('index'),
	$model->group_id=>array('view','id'=>$model->group_id),
	'Редактировать',
);
$this->title='Изменить структурное дерево оборудования';
$this->setPageTitle('Изменить структурное дерево оборудования');
?>

<br>

<!--<div class='span-left'>-->
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<!--</div>-->
<!---->
<!--<div class='span-left'>-->
<?php
//$this->menu=array(
//
//	array('label'=>'Создать EqipGroups', 'url'=>array('create')),
//
//	array('label'=>'Редактирование EqipGroups', 'url'=>array('index')),
//	array('label'=>'Удалить EqipGroups', 'url'=>array('delete&id='.$id)),
//);
//
//
//?>
<!--</div>-->
