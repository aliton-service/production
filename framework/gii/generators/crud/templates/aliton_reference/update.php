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
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'$label'=>array('index'),
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	'Редактировать',
);\n";
?>


?>

<h1>Изменить <?php echo $this->modelClass." <?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>
<div class='span-left'>
<?php echo "<?php \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
</div>

<div class='span-left'>
<?php echo "<?php\n"; ?>
$this->menu=array(
	
	array('label'=>'Создать <?php echo $this->modelClass; ?>', 'url'=>array('create')),
	
	array('label'=>'Редактирование <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	array('label'=>'Удалить <?php echo $this->modelClass; ?>', 'url'=>array('delete&id='.$id)),
);


?>
</div>
