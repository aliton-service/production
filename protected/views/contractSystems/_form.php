<script type="text/javascript">
        $(document).ready(function () {
            var ContractSystemsForm = {
                ContractSystem_id: '<?php echo $model->ContractSystem_id; ?>',
                ContrS_id: '<?php echo $model->ContrS_id; ?>',
                SystemType: '<?php echo $model->SystemType_id; ?>',
            };
            
            var DataContractSystems = new $.jqx.dataAdapter(Sources.SourceSystemTypesMin);
            
            $("#SystemType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataContractSystems, displayMember: "SystemTypeName", valueMember: "SystemType_Id", width: 300 }));

            if (ContractSystemsForm.SystemType != '') $("#SystemType").jqxComboBox('val', ContractSystemsForm.SystemType);
            
            
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

<div class="row"><div class="row-column">Тип подсистемы: </div><div class="row-column"><div id='SystemType' name="ContractSystems[SystemType_id]"></div><?php echo $form->error($model, 'SystemType_id'); ?></div></div>

<?php $this->endWidget(); ?>