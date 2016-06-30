<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'$label'=>array('index'),
	'Создать',
);\n";
?>

?>
<h1>Создать <?php echo $this->modelClass; ?></h1>
<div class='span-left'>
<?php echo "<?php \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
</div>

<div class='span-left'>
<?php echo "<?php\n"; ?>
$this->menu=array(
	array('label'=>'Создать <?php echo $this->modelClass; ?>', 'url'=>array('create')),
	array('label'=>'Редактировать <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	array('label'=>'Удалить <?php echo $this->modelClass; ?>', 'url'=>array('#')),
);
	?>
</div>