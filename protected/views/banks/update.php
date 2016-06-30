<br>
<?php
/* @var $this BanksController */
/* @var $model Banks */

$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Банки'=>array('index'),
	$model->Bank_id=>array('view','id'=>$model->Bank_id),
	'Редактировать',
);
$this->title = 'Изменить Банк';
$this->setPageTitle('Изменить Банк');
?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>


<?php
//$this->menu=array(
//
//	array('label'=>'Создать Банки', 'url'=>array('create')),
//
//	array('label'=>'Редактирование Банки', 'url'=>array('index')),
//	array('label'=>'Удалить Банки', 'url'=>array('delete&id='.$id)),
//);


?>
</div>
