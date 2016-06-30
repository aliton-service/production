<br>
<?php
/* @var $this EquipGroupsController */
/* @var $model EquipGroups */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Equip Groups'=>array('index'),
	'Создать',
);
$this->title = 'Создать группу ТМЦ';
$this->setPageTitle('Создать группу ТМЦ');
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

