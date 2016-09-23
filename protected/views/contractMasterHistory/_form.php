<script type="text/javascript">
        $(document).ready(function () {
            var ContractMasterHistory = {
                History_id: '<?php echo $model->History_id; ?>',
                ContrS_id: '<?php echo $model->ContrS_id; ?>',
                Master: '<?php echo $model->Master; ?>',
                WorkDateStart: Aliton.DateConvertToJs('<?php echo $model->WorkDateStart; ?>'),
                WorkDateEnd: Aliton.DateConvertToJs('<?php echo $model->WorkDateEnd; ?>'),
            };
            
            var DataEmployees4 = new $.jqx.dataAdapter(Sources.SourceListEmployees);
            
            $("#Master2").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees4, displayMember: "EmployeeName", valueMember: "Employee_id", width: 300 }));
            $("#WorkDateStart4").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 102 }));
            $("#WorkDateEnd4").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 102 }));
            
            if (ContractMasterHistory.Master != '') $("#Master2").jqxComboBox('val', ContractMasterHistory.Master);
            if (ContractMasterHistory.WorkDateStart !== null) $("#WorkDateStart4").jqxDateTimeInput('val', ContractMasterHistory.WorkDateStart);
            if (ContractMasterHistory.WorkDateEnd !== null) $("#WorkDateEnd4").jqxDateTimeInput('val', ContractMasterHistory.WorkDateEnd);
            
        });
</script> 

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'ContractMasterHistory',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<input type="hidden" name="ContractMasterHistory[History_id]" value="<?php echo $model->History_id; ?>">
<input type="hidden" name="ContractMasterHistory[ContrS_id]" value="<?php echo $model->ContrS_id; ?>">

<div class="row">
    <div class="row-column">Мастер: </div><div class="row-column"><div id="Master2" name="ContractMasterHistory[Master]"></div><?php echo $form->error($model, 'Master'); ?></div>
</div>
<div class="row" style="padding: 0 10px 10px 10px; width: 90%; border: 1px solid #ddd; background-color: #eee;">
    <div class="row-column" style="margin: 0 0 10px 0; width: 100%;">Период работы:</div>
    <div class="row-column" style="padding-top: 3px;">с </div><div class="row-column"><div id="WorkDateStart4" name="ContractMasterHistory[WorkDateStart]"></div><?php echo $form->error($model, 'WorkDateStart'); ?></div>
    <div class="row-column" style="padding-top: 3px;">по </div><div class="row-column"><div id="WorkDateEnd4" name="ContractMasterHistory[WorkDateEnd]"></div><?php echo $form->error($model, 'WorkDateEnd'); ?></div>
</div>


<?php $this->endWidget(); ?>