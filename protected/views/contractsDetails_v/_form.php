<script type="text/javascript">
        $(document).ready(function () {
            var ContractsDetails_v = {
                csdt_id: '<?php echo $model->csdt_id; ?>',
                ContrS_id: '<?php echo $model->ContrS_id; ?>',
                ItemName: '<?php echo $model->ItemName; ?>',
                Equip: '<?php echo $model->Equip_id; ?>',
                um_name: '<?php echo $model->um_name; ?>',
            };
            
            var DataEquip = new $.jqx.dataAdapter(Sources.SourceListEquipsMin);
           
            
            $("#ItemName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 540 }));
            $("#Equip").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEquip, displayMember: "EquipName", valueMember: "Equip_id", width: 540 }));
            $("#um_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 80 }));
//            $("#").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 65, readOnly: true, symbol: "", symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
         
            if (ContractsDetails_v.ItemName != '') $("#ItemName").jqxInput('val', ContractsDetails_v.ItemName);
            if (ContractsDetails_v.Equip != '') $("#Equip").jqxComboBox('val', ContractsDetails_v.Equip);

        });
</script> 

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'ContractsDetails_v',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<input type="hidden" name="ContractsDetails_v[csdt_id]" value="<?php echo $model->csdt_id; ?>">
<input type="hidden" name="ContractsDetails_v[ContrS_id]" value="<?php echo $model->ContrS_id; ?>">

<div class="row"><div class="row-column">Наименование: <input id="ItemName" type="text" name="ContractsDetails_v[ItemName]"><?php echo $form->error($model, 'ItemName'); ?></div></div>
<div class="row"><div class="row-column">Оборудование: </div><div class="row-column"><div id='Equip' name="ContractsDetails_v[Equip_id]"></div><?php echo $form->error($model, 'Equip_id'); ?></div></div>
<div class="row"><div class="row-column">Ед.изм.: <input id="um_name" type="text" name="ContractsDetails_v[um_name]"><?php echo $form->error($model, 'um_name'); ?></div></div>



<?php $this->endWidget(); ?>