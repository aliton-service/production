<?php
/* @var $this EmployeesController */
/* @var $model Employees */

$this->breadcrumbs=array(
	'Управление пользователями'=>array('index'),
	'Редактирование пользователя',
);

$this->menu=array(
	array('label'=>'List Employees', 'url'=>array('index')),
	array('label'=>'Create Employees', 'url'=>array('create')),
	array('label'=>'View Employees', 'url'=>array('view', 'id'=>$model->Employee_id)),
	array('label'=>'Manage Employees', 'url'=>array('admin')),
);
?>

<?php
    echo '<script type="text/javascript">'
. 'var $time;'
. 'var $StartFrom ='.$locktime*60
. '</script>'
?>
    
<script type="text/javascript">
    
    //var $time;
    //var $StartFrom = 15;
    
    $(document).ready(function(){
        $time = $('#time span');
        
        StartTime();
    });
    
    
    function StartTime(){
        
        $time.text($StartFrom);
        timer = setInterval(function(){
            $time.text(--$StartFrom);
                if ($StartFrom <= 0)
                {
                    $time.text('Требуется обновить страницу');
                }
            }, 1000);
    }
        
    
</script>

<h1>
    Редактирование пользователя <?php echo $model->Employee_id; ?>
    <div id='time'> Осталось:<span></span></div>
</h1>

<?php
    $this->renderPartial('_form', array('model'=>$model)); 
    //echo CHtml::submitButton('Отмена', array('submit'=>Yii::app()->createUrl('admin/employees/cancel', array('id'=>$model->Employee_id))));
?>
