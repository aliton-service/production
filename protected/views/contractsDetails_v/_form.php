<script type="text/javascript">
        $(document).ready(function () {
            var ContractsDetails_v = {
                csdt_id: '<?php echo $model->csdt_id; ?>',
                ContrS_id: '<?php echo $model->ContrS_id; ?>',
                Name: '<?php echo $model->Name; ?>',
                Equip: '<?php echo $model->Equip_id; ?>',
                um_name: '<?php echo $model->um_name; ?>',
                Quant: '<?php echo $model->Quant; ?>',
                price: '<?php echo $model->price; ?>',
                CDNote: '<?php echo $model->Note; ?>',
            };
            
            var DataEquip = new $.jqx.dataAdapter(Sources.SourceListEquipsMin);
            
            $("#Equip").on('bindingComplete', function(){
                if (ContractsDetails_v.Equip != '') {
                    $("#Equip").jqxComboBox('val', ContractsDetails_v.Equip);
                }
            });
            
            $("#Name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 540 }));
            $("#Equip").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEquip, displayMember: "EquipName", valueMember: "Equip_id", width: 540 }));
            $("#NameUM").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 80 }));
            $("#Quant").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 80, symbol: "", symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
            $("#price").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 140, symbol: "", symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
            $("#CDNote").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 650 }));
            
            if (ContractsDetails_v.Name != '') $("#Name").jqxInput('val', ContractsDetails_v.Name);
            
            if (ContractsDetails_v.um_name != '') $("#NameUM").jqxComboBox('val', ContractsDetails_v.um_name);
            if (ContractsDetails_v.Quant != '') $("#Quant").jqxNumberInput('val', ContractsDetails_v.Quant);
            if (ContractsDetails_v.price != '') $("#price").jqxNumberInput('val', ContractsDetails_v.price);
            if (ContractsDetails_v.CDNote != '') $("#CDNote").jqxTextArea('val', ContractsDetails_v.CDNote);
            
            $('#Equip').on('select', function (event) 
            {
                var args = event.args;
                if (args) {
                    var item = args.item;
                    var itemVal = item.originalItem.NameUM;
                    if (itemVal != '') $("#NameUM").jqxInput('val', itemVal);
                }
            }); 
            
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

<div class="row"><div class="row-column">Наименование: <input id="Name" type="text" name="ContractsDetails_v[Name]"><?php echo $form->error($model, 'Name'); ?></div></div>
<div class="row"><div class="row-column">Оборудование: </div><div class="row-column"><div id='Equip' name="ContractsDetails_v[Equip_id]"></div><?php echo $form->error($model, 'Equip_id'); ?></div></div>
<div class="row">
    <div class="row-column">Ед.изм.: <input id="NameUM" type="text"></div>
    <div class="row-column" style="padding-top: 3px;">Количество: </div><div class="row-column"><div id="Quant" name="ContractsDetails_v[Quant]"></div><?php echo $form->error($model, 'Quant'); ?></div>
    <div class="row-column" style="padding-top: 3px;">Цена: </div><div class="row-column"><div id="price" name="ContractsDetails_v[price]"></div><?php echo $form->error($model, 'price'); ?></div>
</div>
<div class="row">
    <div class="row-column">Примечание: <textarea id="CDNote" name="ContractsDetails_v[Note]"></textarea></div>
</div>


<?php $this->endWidget(); ?>