<?php
/* @var $this BanksController */
/* @var $model Banks */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Банки'=>array('index'),
	'Создать',
);
$this->title = 'Создать банк';
$this->setPageTitle('Создать Банк');
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>


<?php
//$this->menu=array(
//	array('label'=>'Создать Банки', 'url'=>array('create')),
//	array('label'=>'Редактировать Банки', 'url'=>array('index')),
//	array('label'=>'Удалить Банки', 'url'=>array('#')),
//);
	?>
</div>