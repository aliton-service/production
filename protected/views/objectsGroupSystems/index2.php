<?php
    
    $action =  Yii::app()->controller->action->id;
    
    if ($action === 'insert')
        $url = Yii::app()->createUrl('ObjectsGroupSystems/'.$action, array('ObjectGr_id' => $model->ObjectGr_id));
    
    if ($action === 'update')
        $url = Yii::app()->createUrl('ObjectsGroupSystems/'.$action, array('ObjectsGroupSystem_id' => $model->ObjectsGroupSystem_id));
    
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ObjectsGroupSystems',
        'action'=> $url,
	'enableClientValidation'=>true,
        'enableAjaxValidation'=>true,
    )); 
      
?>

<?php echo '<input name="ObjectsGroupSystems[ObjectsGroupSystem_id]" id="ObjectsGroupSystems_ObjectsGroupSystem_id" type="text" style="display: none;" value="' . $model->ObjectsGroupSystem_id . '"/>'; ?>
<?php echo '<input name="ObjectsGroupSystems[ObjectGr_id]" id="ObjectsGroupSystems_ObjectGr_id" type="text" style="display: none;" value="' . $model->ObjectGr_id . '"/>'; ?>

<?php

?>


<br>
<?php echo $form->labelEx($model,'Sttp_id'); ?>
<?php echo $form->dropDownList($model,'Sttp_id', SystemTypes::all(), array('empty'=>'')); ?>
<?php echo $form->error($model,'Sttp_id'); ?>
<br>
<?php echo $form->labelEx($model,'Availability_id'); ?>
<?php echo $form->dropDownList($model,'Availability_id', SystemAvailabilitys::all(), array('empty'=>'')); ?>
<?php echo $form->error($model,'Availability_id'); ?>
<br>
<?php echo $form->labelEx($model,'Desc'); ?>
<?php echo $form->textArea($model,'Desc'); ?>
<?php echo $form->error($model,'Desc'); ?>
<br>
<?php echo $form->labelEx($model,'Condition'); ?>
<?php echo $form->textArea($model,'Condition'); ?>
<?php echo $form->error($model,'Condition'); ?>
<br>
<?php echo $form->labelEx($model,'Count'); ?>
<?php echo $form->textField($model,'Count'); ?>
<?php echo $form->error($model,'Count'); ?>

<br>

<?php echo CHtml::submitButton('Сохранить'); ?>

<?php $this->endWidget(); ?>
