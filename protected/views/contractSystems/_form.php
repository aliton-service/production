<script type="text/javascript">
        $(document).ready(function () {
            var ContractSystemsForm = {
                ContractSystem_id: '<?php echo $model->ContractSystem_id; ?>',
                ContrS_id: '<?php echo $model->ContrS_id; ?>',
                SystemType: '<?php echo $model->SystemType_id; ?>',
            };
            
            var DataContractSystems = new $.jqx.dataAdapter(Sources.SourceSystemTypesMin);
            
            $("#SystemType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataContractSystems, displayMember: "SystemTypeName", valueMember: "SystemType_Id", width: 'calc(100% - 2px)' }));

            if (ContractSystemsForm.SystemType != '') $("#SystemType").jqxComboBox('val', ContractSystemsForm.SystemType);
            
            
            $("#BtnOkDialogContractSystems").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#BtnCancelDialogContractSystems").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            
            $("#BtnOkDialogContractSystems").on('click', function() {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('ContractSystems/Insert')) ?>,
                    type: 'POST',
                    async: false,
                    data: $('#ContractSystems').serialize(),
                    success: function(Res) {
                        if (Res == '1' || Res == 1) {
                            $('#EditDialogContractSystems').jqxWindow('close');
                            $("#ContractSystemsGrid").jqxGrid('updatebounddata');
                        } else {
                            $('#BodyDialogContractSystems').html(Res);
                        }

                    }
                });
            });
            
            $("#BtnCancelDialogContractSystems").on('click', function () {
                $('#EditDialogContractSystems').jqxWindow('close');
            });
            
        });
</script> 

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'ContractSystems',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<input type="hidden" name="ContractSystems[ContractSystem_id]" value="<?php echo $model->ContractSystem_id; ?>">
<input type="hidden" name="ContractSystems[ContrS_id]" value="<?php echo $model->ContrS_id; ?>">

<div class="al-row">
    <div class="al-row-column">Тип подсистемы: </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: calc(100% - 6px)"><div id='SystemType' name="ContractSystems[SystemType_id]"></div><?php echo $form->error($model, 'SystemType_id'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Сохранить" id='BtnOkDialogContractSystems' /></div>
    <div style="float: right;" class="al-row-column"><input type="button" value="Отменить" id='BtnCancelDialogContractSystems' /></div>
    <div style="clear: both"></div>
</div>                            
<?php $this->endWidget(); ?>