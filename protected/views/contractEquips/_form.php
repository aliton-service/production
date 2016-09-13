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
            
            $("#Equip2").on('bindingComplete', function(){
                if (ContractEquips.Equip != '') {
                    $("#Equip2").jqxComboBox('val', ContractEquips.Equip);
                }
            });
            
            $("#Equip2").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEquip, displayMember: "EquipName", valueMember: "Equip_id", width: 540 }));
            $("#NameUM2").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 80 }));
            $("#Quant2").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 80, symbol: "", symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
            $("#price2").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 140, symbol: "", symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
            
            
            if (ContractEquips.um_name != '') $("#NameUM2").jqxComboBox('val', ContractEquips.um_name);
            if (ContractEquips.Quant != '') $("#Quant2").jqxNumberInput('val', ContractEquips.Quant);
            if (ContractEquips.price != '') $("#price2").jqxNumberInput('val', ContractEquips.price);
            
            $('#Equip2').on('select', function (event) 
            {
                var args = event.args;
                if (args) {
                    var item = args.item;
                    var itemVal = item.originalItem.NameUM;
                    if (itemVal != '') $("#NameUM2").jqxInput('val', itemVal);
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

<div class="row"><div class="row-column">Оборудование: </div><div class="row-column"><div id='Equip2' name="ContractEquips[eqip_id]"></div><?php echo $form->error($model, 'eqip_id'); ?></div></div>
<div class="row">
    <div class="row-column">Ед.изм.: <input id="NameUM2" type="text"></div>
    <div class="row-column" style="padding-top: 3px;">Количество: </div><div class="row-column"><div id="Quant2" name="ContractEquips[quant]"></div><?php echo $form->error($model, 'quant'); ?></div>
    <div class="row-column" style="padding-top: 3px;">Цена: </div><div class="row-column"><div id="price2" name="ContractEquips[price]"></div><?php echo $form->error($model, 'price'); ?></div>
</div>
<div class="row">
</div>


<?php $this->endWidget(); ?>