<?php
/* @var $this EmployeesController */
/* @var $model Employees */

$this->breadcrumbs=array(
    'Управление пользователями'=>array('index'),
);

$this->menu=array(
	array('label'=>'Управление пользователями', 'url'=>array('index')),
	array('label'=>'Создание пользователя', 'url'=>array('create')),
        array('label'=>'Редактирование пользователя', 'url'=>array('update', 'id'=>''), 'itemOptions'=>array('id'=>'update')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#employees-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

echo date('d.m.y H:i:s');
echo '<div id="url">url</div>';
?>

<!--
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
-->

<div id='grid-container'>
    
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employees-grid',
	'dataProvider'=>$model->search(),
	'htmlOptions'=>array('style'=>'width:774px'),
        'filter'=>$model,
        'enablePagination' => 'false',
	'cssFile'=>'css/gridview/styles.css',
        'selectionChanged'=>'userClicks',
        'columns'=>array(
		'Employee_id' => array(
                    'name' => 'Employee_id',
                    'htmlOptions'=>array('width'=>'10px'),
                ),
		'EmployeeName' => array(
                    'name' => 'EmployeeName',
                    'htmlOptions'=>array('width'=>'250px'),
                ),
		'Alias' => array(
                    'name' => 'Alias',
                    'htmlOptions'=>array('width'=>'80px'),
                ),
		'RemoteAlias' => array(
                    'name' => 'RemoteAlias',
                    'htmlOptions'=>array('width'=>'80px'),
                ),
		'Banned' => array(
                    'name'=> 'Banned',
                    'htmlOptions'=>array('width'=>'80px'),
                ),
		'Lock' => array(
                    'name'=> 'Lock',
                    'htmlOptions'=>array('width'=>'80px'),
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
?>
    

</div><!-- grid-container -->


<script type="text/javascript">
    
    var $link='';
    
    function userClicks(name) {
        $('#update a').attr('href', $link + $.fn.yiiGridView.getSelection(name));
    }
    
    $(document).ready(function(){
        $link = $('#update a').attr('href');
        
        $("#employees-grid").click(function() {
            alert($('#employees-grid').yiiGridView().getSelection());
        });
    });
</script>