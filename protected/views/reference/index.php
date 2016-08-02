<?php
/* @var $this RegionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'Справочники',
);

?>

<h1>Справочники</h1>

<?php 
$this->menu=array(
    array('label'=>'Регионы', 'url'=>array('/regions/index')),
    array('label'=>'Улицы', 'url'=>array('/streets/index')),
    array('label'=>'Юридические лица', 'url'=>array('/juridicals/index')),
    array('label'=>'Типы улиц', 'url'=>array('/StreetTypes/index')),
    array('label'=>'Типы тарифов', 'url'=>array('/ServiceTypes/index')),
    array('label'=>'Типы документов', 'url'=>array('/DocTypes/index')),
);
 ?>


