<br>
<?php
/* @var $this EqipGroupsController */
/* @var $model EqipGroups */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Eqip Groups'=>array('index'),
	'Создать',
);
$this->title = 'Создать структурное дерево оборудования';
$this->setPageTitle('Создать структурное дерево оборудования');
?>
<br>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
//$this->menu=array(
//	array('label'=>'Создать EqipGroups', 'url'=>array('create')),
//	array('label'=>'Редактировать EqipGroups', 'url'=>array('index')),
//	array('label'=>'Удалить EqipGroups', 'url'=>array('#')),
//);
	?>
