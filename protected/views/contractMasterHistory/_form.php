<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Insert') echo 'true'; else echo 'false'; ?>;
        console.log(StateInsert);
        var ContractMasterHistory = {
            History_id: '<?php echo $model->History_id; ?>',
            ContrS_id: '<?php echo $model->ContrS_id; ?>',
            Master: '<?php echo $model->Master; ?>',
            WorkDateStart: Aliton.DateConvertToJs('<?php echo $model->WorkDateStart; ?>'),
            WorkDateEnd: Aliton.DateConvertToJs('<?php echo $model->WorkDateEnd; ?>'),
        };

        var DataEmployees4 = new $.jqx.dataAdapter(Sources.SourceListEmployees);

        $("#Master2").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees4, displayMember: "EmployeeName", valueMember: "Employee_id", width: 300 }));
        $("#WorkDateStart4").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy' }));
        $("#WorkDateEnd4").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy' }));
        $("#BtnOkDialogContractMasterHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#BtnCancelDialogContractMasterHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $("#BtnCancelDialogContractMasterHistory").on('click', function () {
            $('#MastersEditDialog').jqxWindow('close');
        });

        if (ContractMasterHistory.Master !== null) $("#Master2").jqxComboBox('val', ContractMasterHistory.Master);
        if (ContractMasterHistory.WorkDateStart !== null) $("#WorkDateStart4").jqxDateTimeInput('val', ContractMasterHistory.WorkDateStart);
        if (ContractMasterHistory.WorkDateEnd !== null) $("#WorkDateEnd4").jqxDateTimeInput('val', ContractMasterHistory.WorkDateEnd);


        $("#BtnOkDialogContractMasterHistory").on('click', function () {
            var Url = <?php echo json_encode(Yii::app()->createUrl('ContractMasterHistory/Update')); ?>;
            if (StateInsert) {
                Url = <?php echo json_encode(Yii::app()->createUrl('ContractMasterHistory/Insert')); ?>;
            }
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: $('#ContractMasterHistory').serialize(),
                success: function(Res) {
                    if (Res == '1' || Res == 1) {
                        $('#MastersEditDialog').jqxWindow('close');
                        $("#MastersGrid").jqxGrid('updatebounddata');
                    } else {
                        $('#MastersBodyDialog').html(Res);
                    }
                }
            });
        });
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
<div class="al-row">
    <div class="row-column"><input type="button" value="Сохранить" id='BtnOkDialogContractMasterHistory' /></div>
    <div style="float: right; margin-right: 20px;" class="row-column"><input type="button" value="Отменить" id='BtnCancelDialogContractMasterHistory' /></div>
</div>

<?php $this->endWidget(); ?>
