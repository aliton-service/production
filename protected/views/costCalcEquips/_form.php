<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var CostCalcEquip = {
            eqip_id: '<?php echo $model->eqip_id; ?>',
            quant: '<?php echo $model->quant; ?>',
            price: '<?php echo $model->price; ?>',
            price_low: '<?php echo $model->price_low; ?>',
            note: '<?php echo $model->note; ?>',
        };
        
        $('#CostCalcEquips').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        var EquipsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEquipsMin, {async: true}));
        
        
        $("#jqxToggleButtonCCE").jqxToggleButton($.extend(true, {}, ToggleButtonDefaultSettings, { width: '50px', toggled: false }));

        var toggled;
        
        $("#jqxToggleButtonCCE").on('click', function () {
            toggled = $("#jqxToggleButtonCCE").jqxToggleButton('toggled');
            if (toggled) {
                $("#jqxToggleButtonCCE")[0].value = 'вкл.';
                
            }
            else $("#jqxToggleButtonCCE")[0].value = 'выкл.';
        });
                
        $("#EquipsCCE").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: EquipsDataAdapter, displayMember: "EquipName", valueMember: "Equip_id", searchMode: 'contains', width: 490 }));
        $("#UnitMeasurementCCE").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 50 } ));
        $("#QuantCCE").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 80, min: 0, decimalDigits: 0 }));
        $("#PriceCCE").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 120, min: 0, decimalDigits: 2 }));
        $("#PriceLowCCE").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 120, min: 0, decimalDigits: 2 }));
        $("#NoteCCE").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 560, height: 90 }));
        
        $('#btnSaveCostCalcEquip').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnCancelCostCalcEquip').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#btnCancelCostCalcEquip').on('click', function(){
            $('#CostCalcDetailsDialog').jqxWindow('close');
        });
        
        $('#btnSaveCostCalcEquip').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('CostCalcEquips/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('CostCalcEquips/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#CostCalcEquips').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('cceq_id', Res.id, '#CostCalcEquipsGrid', true);
                        if (toggled) {
                            $("#EquipsCCE").jqxComboBox('clearSelection');
                            $("#UnitMeasurementCCE").jqxInput('val', null);
                            $("#QuantCCE").jqxNumberInput('val', null);
                            $("#PriceCCE").jqxNumberInput('val', null);
                            $("#PriceLowCCE").jqxNumberInput('val', null);
                            $('#NoteCCE').jqxTextArea('val', '');
                        } else {
                            $('#CostCalcDetailsDialog').jqxWindow('close');
                        }
                    }
                    else {
                        $('#BodyCostCalcDetailsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        $("#EquipsCCE").on('bindingComplete', function(){
            if (CostCalcEquip.eqip_id != '') {
                $("#EquipsCCE").jqxComboBox('val', CostCalcEquip.eqip_id);
            }
        });
            
        if (CostCalcEquip.quant != '') $("#QuantCCE").jqxNumberInput('val', CostCalcEquip.quant);
        if (CostCalcEquip.price != '') $("#PriceCCE").jqxNumberInput('val', CostCalcEquip.price);
        if (CostCalcEquip.price_low != '') $("#PriceLowCCE").jqxNumberInput('val', CostCalcEquip.price_low);
        if (CostCalcEquip.note != '') $("#NoteCCE").jqxTextArea('val', CostCalcEquip.note);
        
        
        $('#EquipsCCE').on('select', function (event) 
        {
            var args = event.args;
            if (args) {
                var item = args.item;
                if(item) {
                    var value = item.value;
                    if(value) 
                    {
                        var UnitMeasurementDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEquipsMin, {}), {
                            formatData: function (data) {
                                $.extend(data, {
                                    Filters: ["e.Equip_id = " + value],
                                });
                                return data;
                            },
                        });
                        UnitMeasurementDataAdapter.dataBind();
                        var nameUM = UnitMeasurementDataAdapter.records[0].NameUM;
                        $("#UnitMeasurementCCE").jqxInput('val', nameUM);
                        
                        var PriceListDetailsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourcePriceListDetails, {}), {
                            formatData: function (data) {
                                $.extend(data, {
                                    Filters: ["p.eqip_id = " + value],
                                });
                                return data;
                            },
                        });
                        PriceListDetailsDataAdapter.dataBind();
                        var PriceLowCCE = PriceListDetailsDataAdapter;
                        console.log(PriceLowCCE);
                        var PriceLowCCE = PriceListDetailsDataAdapter.records[0].price_low;
                        $("#PriceLowCCE").jqxNumberInput('val', PriceLowCCE);
                        var PriceCCE = PriceListDetailsDataAdapter.records[0].price_high;
                        $("#PriceCCE").jqxNumberInput('val', PriceCCE);
                    }
                }
            }
        });
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'CostCalcEquips',
	'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<input type="hidden" name="CostCalcEquips[cceq_id]" value="<?php echo $model->cceq_id; ?>"/>
<input type="hidden" name="CostCalcEquips[calc_id]" value="<?php echo $model->calc_id; ?>"/>

<div class="row" style="margin-top: 5px;">
    <div class="row-column" style="margin-top: 2px;">Добавить несколько позиций: </div>
    <div class="row-column"><input type="button" value="выкл." id='jqxToggleButtonCCE' /></div>
</div>

<div class="row">
    <div class="row-column">Оборудование: <div id="EquipsCCE" name="CostCalcEquips[eqip_id]"></div><?php echo $form->error($model, 'eqip_id'); ?></div>
    <div class="row-column">Ед.изм.: <br><input readonly id='UnitMeasurementCCE' type="text" /></div>
</div>

<div class="row">
    <div class="row-column">Количество: <div id="QuantCCE" name="CostCalcEquips[quant]"></div><?php echo $form->error($model, 'quant'); ?></div>
    <div class="row-column" style="margin-left: 10px;">Цена: <div id="PriceCCE" name="CostCalcEquips[price]"></div><?php echo $form->error($model, 'price'); ?></div>
    <div class="row-column" style="margin-left: 10px;">Себестоимость: <div id="PriceLowCCE" name="CostCalcEquips[price_low]"></div><?php echo $form->error($model, 'price_low'); ?></div>
</div>

<div class="row" style="margin-top: 0;">
    <div class="row-column">Примечание: <textarea id="NoteCCE" name="CostCalcEquips[note]"></textarea></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveCostCalcEquip'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelCostCalcEquip'/></div>
</div>
<?php $this->endWidget(); ?>



