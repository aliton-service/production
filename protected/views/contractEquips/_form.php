<script type="text/javascript">
        $(document).ready(function () {
            var ContractEquips = {
                creq_id: '<?php echo $model->creq_id; ?>',
                contrs_id: '<?php echo $model->contrs_id; ?>',
                Equip: '<?php echo $model->eqip_id; ?>',
                um_name: '<?php echo $model->um_name; ?>',
                Quant: '<?php echo $model->quant; ?>',
                price: '<?php echo $model->price; ?>',
            };
            
            var DataEquip = new $.jqx.dataAdapter(Sources.SourceListEquipsMin);
            
            $("#Equip").on('bindingComplete', function(){
                if (ContractEquips.Equip != '') {
                    $("#Equip").jqxComboBox('val', ContractEquips.Equip);
                }
            });
            
            $("#Equip").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEquip, displayMember: "EquipName", valueMember: "Equip_id", width: 540 }));
            $("#NameUM").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 80 }));
            $("#Quant").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 80, symbol: "", symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
            $("#price").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 140, symbol: "", symbolPosition: 'right', min: 0, decimalDigits: 2, spinButtons: true }));
            
            
            if (ContractEquips.um_name != '') $("#NameUM").jqxComboBox('val', ContractEquips.um_name);
            if (ContractEquips.Quant != '') $("#Quant").jqxNumberInput('val', ContractEquips.Quant);
            if (ContractEquips.price != '') $("#price").jqxNumberInput('val', ContractEquips.price);
            
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
        'id' => 'ContractEquips',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<input type="hidden" name="ContractEquips[creq_id]" value="<?php echo $model->creq_id; ?>">
<input type="hidden" name="ContractEquips[contrs_id]" value="<?php echo $model->contrs_id; ?>">

<div class="row"><div class="row-column">Оборудование: </div><div class="row-column"><div id='Equip' name="ContractEquips[eqip_id]"></div><?php echo $form->error($model, 'eqip_id'); ?></div></div>
<div class="row">
    <div class="row-column">Ед.изм.: <input id="NameUM" type="text"></div>
    <div class="row-column" style="padding-top: 3px;">Количество: </div><div class="row-column"><div id="Quant" name="ContractEquips[quant]"></div><?php echo $form->error($model, 'quant'); ?></div>
    <div class="row-column" style="padding-top: 3px;">Цена: </div><div class="row-column"><div id="price" name="ContractEquips[price]"></div><?php echo $form->error($model, 'price'); ?></div>
</div>
<div class="row">
</div>


<?php $this->endWidget(); ?>