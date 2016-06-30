<?php
   
    //echo $this->title;
    
    $form=$this->beginWidget('CActiveForm', array(
            'id'=>'ContactInfo',
            'action'=> $this->action_url,
            'enableClientValidation'=>true,
            'enableAjaxValidation'=>true,
    ));
    
    echo '<input name="ContactInfo[ObjectGr_id]" id="ContactInfo_ObjectGr_id" type="text" style="display: none;" value="' . $model->ObjectGr_id . '"/>';
    echo '<input name="ContactInfo[Info_id]" id="ContactInfo_Info_id" type="text" style="display: none;" value="' . $model->Info_id . '"/>';
    
    
?>    

<div style="float: left; width:150px">
    <?php echo $form->labelEx($model,'FIO'); ?>
</div>
<div>
    <?php 
        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'FIO',
            'Width' => 200,
            'Value' => $model->FIO,
            'Type' => 'String',
            'Name' => 'ContactInfo[FIO]',
        ));
    ?>
</div>
<div><?php echo $form->error($model,'FIO'); ?></div>
<div style="float: left; width:150px">
    <?php echo $form->labelEx($model,'Birthday'); ?>
</div>
<div>            
    <?php
        echo DateTimeManager::YiiDateToAliton($model->Birthday);
        $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
            'id' => 'Birthday',
            'Value' => DateTimeManager::YiiDateToAliton($model->Birthday),
            'Name' => 'ContactInfo[Birthday]',
            
        ));
    
    echo $form->error($model,'Birthday');
    ?>
</div>           
<div style="float: left; width:250px">
    
    <?php
        
        $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
            'id' => 'Main',
            'Width' => 200,
            'Checked' => $model->Main,
            'Label' => "Лицо принимающее решение",
            'Name' => 'ContactInfo[Main]',
        ));
    ?>
    <div><?php echo $form->error($model,'Main'); ?></div>
</div>   
<div>
    <?php
        $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
            'id' => 'ForReport',
            'Width' => 200,
            'Checked' => $model->ForReport,
            'Label' => "Для отчетов",
            'Name' => 'ContactInfo[ForReport]',
        ));
    ?>
    <div><?php echo $form->error($model,'ForReport'); ?></div>
</div>
<div style="float: left; width:150px"><?php echo $form->labelEx($model,'Telephone'); ?></div>
<div>          
<?php 
        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'Telephone',
            'Width' => 200,
            'Value' => $model->Telephone,
            'Type' => 'String',
            'Name' => 'ContactInfo[Telephone]',
        ));
    ?>
<div><?php echo $form->error($model,'Telephone'); ?></div>
</div> 
<div style="float: left; width:150px"><?php echo $form->labelEx($model,'CTelephone'); ?></div>
<div>          
<?php 
        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'CTelephone',
            'Width' => 200,
            'Value' => $model->CTelephone,
            'Type' => 'String',
            'Name' => 'ContactInfo[CTelephone]',
        ));
    ?>
<div><?php echo $form->error($model,'CTelephone'); ?></div>
</div>
<div style="float: left; width:150px"><?php echo $form->labelEx($model,'Cstm_id'); ?></div>
<div>
    <?php
        
        $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
            'id' => 'cmbCustomer',
            'ModelName' => 'Customers',
            'Name' => 'ContactInfo[Cstm_id]',
            'FieldName' => 'CustomerName',
            'KeyField' => 'Customer_Id',
            'KeyValue' => $model->Cstm_id,
            'Width' => 200,
            'Type' => array(
                'Mode' => 'Filter',
                'Condition' => "c.CustomerName like ':Value%'"
            ),
            'Columns' => array(
                'CustomerName' => array(
                    'Name' => 'Должность',
                    'FieldName' => 'CustomerName',
                    'Width' => 150,
                ),
            ),
        ));
    ?>
<div><?php echo $form->error($model,'Cstm_id'); ?></div>
</div>            
<div style="float: left; width:150px"><?php echo $form->labelEx($model,'Email'); ?></div>    
<div>           
    <?php 
        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'Email',
            'Width' => 200,
            'Value' => $model->Email,
            'Name' => 'ContactInfo[Email]',
            'Type' => 'String',
        ));
    ?>
    <div><?php echo $form->error($model,'Email'); ?></div>
</div>
<div>
    <?php
        $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
            'id' => 'NoSend',
            'Width' => 200,
            'Checked' => $model->NoSend,
            'Name' => 'ContactInfo[NoSend]',
            'Label' => "Эл. почту не отправлять",
        ));
    ?>
    <div><?php echo $form->error($model,'NoSend'); ?></div>
</div> 


            
            
            
            
       
                <br>
                <?php
                    $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                        'id' => 'Save',
                        'Width' => 114,
                        'Height' => 30,
                        'Type' => 'Form',
                        'Text' => 'Сохранить',
                        'FormName' => 'ContactInfo',
                        'Href' => $this->action_url,
                    ));
                ?>
           

    
<?php
    $this->endWidget();
?>