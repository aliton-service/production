<?php
/* @var $this EmployeesController */
/* @var $model Employees */

$this->breadcrumbs=array(
	'Управление пользователями'=>array('index'),
	'Создание пользователя',
);

$this->menu=array(
	array('label'=>'List Employees', 'url'=>array('index')),
	array('label'=>'Manage Employees', 'url'=>array('admin')),
);
?>

<h1>Create Employees</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>