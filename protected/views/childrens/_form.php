<script>
    
</script>

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Childrens',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
	'enableAjaxValidation'=>false,
    )); 
?>

<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'edChildren_id',
        'Width' => 100,
        'Type' => 'String',
        'Name' => 'Childrens[Children_id]',
        'Value' => $model->Children_id,
        'ReadOnly' => true,
        'Visible' => false,
    ));
?>

<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'edEmployee_id',
        'Width' => 100,
        'Type' => 'String',
        'Name' => 'Childrens[Employee_id]',
        'Value' => $model->Employee_id,
        'ReadOnly' => true,
        'Visible' => false,
    ));
?>

<div style="float: left; width: 200px">ФИО Ребенка</div>
<div style="float: left; ">
<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edChildrenName',
            'Width' => 280,
            'Type' => 'String',
            'Value' => $model->ChildrenName,
            'Name' => 'Childrens[ChildrenName]',
    ));
?>
</div>
<div><?php echo $form->error($model, 'ChildrenName'); ?></div>
<div style="clear: both"></div>
<div style="float: left; width: 200px; margin-top: 6px">Дата рождения</div>
<div style="float: left; margin-top: 6px">
<?php
    $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
            'id' => 'edBirthDay',
            'Width' => 120,
            'Value' => DateTimeManager::YiiDateToAliton($model->BirthDay),
            'Name' => 'Childrens[BirthDay]',
    ));
?>
</div>
<div><?php echo $form->error($model, 'BirthDay'); ?></div>
<div style="clear: both"></div>
<div style="float: left; margin-top: 6px;">
    <div style="float: left;">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'SaveChildren',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Сохранить',
                'FormName' => 'Childrens',
                'Type' => 'Form',
            ));
        ?>
    </div> 
</div>
<?php $this->endWidget(); ?>









