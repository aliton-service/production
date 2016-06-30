<?php
/* @var $this StreetsController */
/* @var $model Streets */

$this->breadcrumbs=array(
	'Объекты',
	'Заявки на доставку'=>array('index'),
	
	'Редактировать',
);


?>
<?php
if(!isset($ajax)) {
	?>
	<h1>Изменить Заявку <?php echo $model->dldm_id; ?></h1>
	<?php $this->setPageTitle('Изменить Заявку' . $model->dldm_id);
}
?>
<div class='span-left'>
<?php $this->renderPartial('_form', array('model'=>$model,'action'=>'update','ajax'=>isset($ajax) ? $ajax : false)); ?></div>

<div class='span-left'>
<?php
$this->menu=array(
	
	array('label'=>'Создать Заявку', 'url'=>array('create')),
	
	array('label'=>'Редактирование Заявку', 'url'=>array('index')),
	array('label'=>'Удалить Заявку', 'url'=>array('#')),
);


?>
</div>
