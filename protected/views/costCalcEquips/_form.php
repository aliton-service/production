<script type="text/javascript">
    $(document).ready(function () {
        
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var First = true;
        var CostCalcEquip = {
            eqip_id: <?php echo json_encode($model->eqip_id); ?>,
            eqip_name: <?php echo json_encode($model->eqip_name); ?>,
            quant: <?php echo json_encode($model->quant); ?>,
            price: <?php echo json_encode($model->price); ?>,
            price_low: <?php echo json_encode($model->price_low); ?>,
            note: <?php echo json_encode($model->note); ?>,
        };
        
        $('#CostCalcEquips').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        
        $("#jqxToggleButtonCCE").jqxToggleButton($.extend(true, {}, ToggleButtonDefaultSettings, { width: '280px', toggled: true }));

        var toggled = true;
        
        $("#jqxToggleButtonCCE").on('click', function () {
            toggled = $("#jqxToggleButtonCCE").jqxToggleButton('toggled');
            if (toggled) 
                $("#jqxToggleButtonCCE")[0].value = 'Добавить еще одну позицию';
            else $("#jqxToggleButtonCCE")[0].value = 'Не добавлять больше позиций';
        });
        
        var EquipsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEquipsMin, {async: true}), {
                formatData: function (data) {
                    var Value = $('#FilterEquipsCCE').val();
                    var Filters = [];
                    Filters[0] = "c.ctgr_id <> 7";
                    Filters[1] = "e.equipname like '%" + Value + "%'"
                    Filters[2] = "e.discontinued is null"
                    $.extend(data, {
                        Filters: Filters
                    });
                    return data;
                },
            });
        
        
        $("#FilterEquipsCCE").jqxInput($.extend(true, {}, InputDefaultSettings, { width: '524px'}));
        
        if (CostCalcEquip.eqip_name != null) {
            if (CostCalcEquip.eqip_name.length < 6)
                $("#FilterEquipsCCE").val(CostCalcEquip.eqip_name.substring(0, CostCalcEquip.eqip_name.length));
            else
                $("#FilterEquipsCCE").val(CostCalcEquip.eqip_name.substring(0, 6));
            
        }
        
        
        $("#FilterEquipsCCE").on('change', function(e){
            EquipsDataAdapter.dataBind();
        });
        
        $("#EquipsCCE").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, {
            displayMember: "EquipName",
            source: EquipsDataAdapter,
            valueMember: "Equip_id",
            searchMode: 'startswithignorecase',
            width: 490,
        }));
        $("#UnitMeasurementCCE").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 50 } ));
        $("#QuantCCE").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 80, min: 0, decimalDigits: 2 }));
        $("#PriceCCE").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 120, min: 0, decimalDigits: 2 }));
        $("#PriceLowCCE").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 120, min: 0, decimalDigits: 2, readOnly: true, spinButtonsStep: 0 }));
        $("#NoteCCE").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: '100%', height: 90 }));
        
        $('#btnSaveCostCalcEquip').jqxButton($.extend(true, {}, ButtonDefaultSettings, {disabled: true}));
        $('#btnCancelCostCalcEquip').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#btnCancelCostCalcEquip').on('click', function(){
            $('#CostCalculationsDialog').jqxWindow('close');
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
                        CostCalcDetails.DetailsRefresh();
                        if (toggled && StateInsert) {
                            $(".errorMessage").html('');
                            $("#EquipsCCE").jqxComboBox('clearSelection');
                            $("#EquipsCCE input").val('');
                            $("#UnitMeasurementCCE").jqxInput('val', null);
                            $("#QuantCCE").jqxNumberInput('val', null);
                            $("#PriceCCE").jqxNumberInput('val', null);
                            $("#PriceLowCCE").jqxNumberInput('val', null);
                            $('#NoteCCE').jqxTextArea('val', '');
                        } else {
                            $('#CostCalculationsDialog').jqxWindow('close');
                        }
                    }
                    else {
                        $('#BodyCostCalculationsDialog').html(Res.html);
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
                First = false;
            }
            $('#btnSaveCostCalcEquip').jqxButton({disabled: false});
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
                        for (var i = 0; i < EquipsDataAdapter.records.length; i++) {
                            if (EquipsDataAdapter.records[i].Equip_id == value)
                                $("#UnitMeasurementCCE").jqxInput('val', EquipsDataAdapter.records[i].NameUM);
                        }
                        var PriceListDetailsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourcePriceListDetails, {}), {
                            formatData: function (data) {
                                $.extend(data, {
                                    Filters: ["p.eqip_id = " + value],
                                });
                                return data;
                            },
                        });
                        PriceListDetailsDataAdapter.dataBind();
                        if (PriceListDetailsDataAdapter.records.length > 0) {
                            var PriceLowCCE = PriceListDetailsDataAdapter.records[0].price_low;
                            $("#PriceLowCCE").jqxNumberInput('val', PriceLowCCE);
                            if (!First) {
                                var PriceCCE = PriceListDetailsDataAdapter.records[0].price_high;
                                $("#PriceCCE").jqxNumberInput('val', PriceCCE);
                            }
                        } else {
                            if (!First) {
                                $("#PriceLowCCE").jqxNumberInput('val', null);
                                $("#PriceCCE").jqxNumberInput('val', null);
                            }
                        }
                            
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

<div class="row" style="margin-top: 0px; padding-top: 0px; border-bottom: 1px solid #e0e0e0;">
    <div class="row-column"><input type="button" value="Добавить еще одну позицию" id='jqxToggleButtonCCE' /></div>
</div>

<div class="row" style="margin-top: 4px;">
    <div class="row-column">Фильтр: <input id="FilterEquipsCCE" /></div>
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
    <div class="row-column" style="width: 100%">Примечание: <textarea id="NoteCCE" name="CostCalcEquips[note]"></textarea></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveCostCalcEquip'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelCostCalcEquip'/></div>
</div>
<?php $this->endWidget(); ?>



