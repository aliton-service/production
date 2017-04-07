<script type="text/javascript">
    $(document).ready(function () {
        var First = true;
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var DocmAchsDetail = {
            dadt_id: <?php echo json_encode($model->dadt_id); ?>,
            eqip_id: <?php echo json_encode($model->eqip_id); ?>,
            docm_quant: <?php echo json_encode($model->docm_quant); ?>,
            fact_quant: <?php echo json_encode($model->fact_quant); ?>,
            price: <?php echo json_encode($model->price); ?>,
            used: <?php echo json_encode($model->used); ?>,
            ToProduction: <?php echo json_encode($model->ToProduction); ?>,
            no_price_list: <?php echo json_encode($model->no_price_list); ?>,
            sum: <?php echo json_encode($model->sum); ?>
        };
        
        $('#DocmAchsDetails').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        var EquipsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEquipsMin, {async: true}), {
            formatData: function (data) {
                var Value = $('#FilterEquipsDAD').val();
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
        
        
        $("#FilterEquipsDAD").jqxInput($.extend(true, {}, InputDefaultSettings, { width: '524px'}));
        
//        if (CostCalcEquip.eqip_name != null) {
//            if (CostCalcEquip.eqip_name.length < 6)
//                $("#FilterEquipsDAD").val(CostCalcEquip.eqip_name.substring(0, CostCalcEquip.eqip_name.length));
//            else
//                $("#FilterEquipsDAD").val(CostCalcEquip.eqip_name.substring(0, 6));
//            
//        }
        
        
        $("#FilterEquipsDAD").on('change', function(e){
            EquipsDataAdapter.dataBind();
        });
        
        $("#EquipsDAD").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, {
            displayMember: "EquipName",
            source: EquipsDataAdapter,
            valueMember: "Equip_id",
//            searchMode: 'startswithignorecase',
            width: 430,
            dropDownWidth: 650
        }));
        
        $("#UnitMeasurementDAD").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 50 } ));
        $("#edQuantEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px'}));
        $("#edPriceEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '90px', decimalDigits: 2}));
        $("#edFactQuantEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '90px'}));
        $("#edSumEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '130px', disabled: false, readOnly: true, spinMode: 'simple', spinButtonsStep: 0}));
        $("#edInvQuant").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '90px', disabled: false, readOnly: true, spinMode: 'simple', spinButtonsStep: 0}));
        $("#edInvQuantUsed").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '90px', disabled: false, readOnly: true, spinMode: 'simple', spinButtonsStep: 0}));
        
        $("#edUsedEdit").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: '50px'}));
        $("#edToProductionEdit").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: '130px'}));
        $("#edNoPriceListEdit").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: 170}));
        $('#btnSaveDocmAchsDetail').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: true }));
        $('#btnCancelDocmAchsDetail').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#EquipsDAD').on('select', function (event) {
            var args = event.args;
            if (args) {
                var item = args.item;
                if(item) {
                    var value = item.value;
                    if(value) {
                        var Row = Aliton.FindArray(EquipsDataAdapter.records, 'Equip_id', value);
                        if (Row != null) {
                            $("#UnitMeasurementDAD").val(Row.NameUM);
                            if (Row.EmplChangeInventory != null) {
                                $("#edInvQuant input").css({'background-color': '#00FF00'});
                                $("#edInvQuantUsed input").css({'background-color': '#00FF00'});
                            }
                            else {
                                $("#edInvQuant input").css({'background-color': 'white'});
                                $("#edInvQuantUsed input").css({'background-color': 'white'});
                            }
                        }
                        SetInvInfo(value, 1);
                        
                        
//                        for (var i = 0; i < EquipsDataAdapter.records.length; i++) {
//                            if (EquipsDataAdapter.records[i].Equip_id == value)
//                                $("#UnitMeasurementDAD").jqxInput('val', EquipsDataAdapter.records[i].NameUM);
//                        }
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
                            if (!First) {
                                var edPriceEdit = PriceListDetailsDataAdapter.records[0].price_high;
                                $("#edPriceEdit").jqxNumberInput('val', edPriceEdit);
                            }
                        } else {
                            if (!First) {
                                $("#edPriceEdit").jqxNumberInput('val', null);
                            }
                        }
                            
                    }
                }
            }
        });
        
        var SetInvInfo = function(Equip_id, Strg_id) {
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Equips/GetInvInfo')); ?>,
                type: 'POST',
                data: {
                    Equip_id: Equip_id,
                    Strg_id: Strg_id
                },
                async: true,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    if (Res.result = 1) {
                        $("#edInvQuant").jqxNumberInput('val', Res.inv_quant);
                        $("#edInvQuantUsed").jqxNumberInput('val', Res.inv_quant_used);
                    }
                },
                error: function(Res) {
                    //Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        };
        
        $("#EquipsDAD").on('bindingComplete', function(){
            $("#EquipsDAD").jqxComboBox('val', DocmAchsDetail.eqip_id);
            First = false;
            $('#btnSaveDocmAchsDetail').jqxButton({disabled: false});
        });
        
        $('#btnCancelDocmAchsDetail').on('click', function(){
            $('#WHDocumentsDialog').jqxWindow('close');
        });
        
        $('#btnSaveDocmAchsDetail').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('DocmAchsDetails/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('DocmAchsDetails/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#DocmAchsDetails').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        if ($('#GridDetails').length>0) {
                            if ($('#btnRefreshDetails').length>0)
                                $('#btnRefreshDetails').click();
                            else
                                Aliton.SelectRowById('dadt_id', Res.id, '#GridDetails', true);
                        }
                        $('#WHDocumentsDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyWHDocumentsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        var CalcSum = function() {
            var Quant = $("#edQuantEdit").jqxNumberInput('val');
            var Quant2 = $("#edFactQuantEdit").jqxNumberInput('val');
            if (Quant2 !== '')
                   Quant = parseFloat(Quant2);
               
            var Price = $("#edPriceEdit").jqxNumberInput('val');
            $("#edSumEdit").jqxNumberInput('val', Quant*Price);
            
        };
        
        if (DocmAchsDetail.docm_quant != null) {
            $("#edQuantEdit").jqxNumberInput('val', DocmAchsDetail.docm_quant);
        } else {
            $("#edQuantEdit").jqxNumberInput('val', 1);
        }
        if (DocmAchsDetail.price != '') $("#edPriceEdit").jqxNumberInput('val', DocmAchsDetail.price);
        if (DocmAchsDetail.used != '') $("#edUsedEdit").jqxCheckBox('val', Boolean(Number(DocmAchsDetail.used)));
        if (DocmAchsDetail.ToProduction != '') $("#edToProductionEdit").jqxCheckBox('val', Boolean(Number(DocmAchsDetail.ToProduction)));
        if (DocmAchsDetail.no_price_list != '') $("#edNoPriceListEdit").jqxCheckBox('val', Boolean(Number(DocmAchsDetail.no_price_list)));
        if (DocmAchsDetail.fact_quant != '') $("#edFactQuantEdit").jqxNumberInput('val', DocmAchsDetail.fact_quant);
        if (DocmAchsDetail.sum != '') $("#edSumEdit").jqxNumberInput('val', DocmAchsDetail.sum);
        
        $('#edQuantEdit').on('valueChanged', function (event) {
            CalcSum();
        });
        
        $("#edFactQuantEdit").on('valueChanged', function(event) {
            CalcSum();
        });
        
        $('#edPriceEdit').on('valueChanged', function (event) {
            CalcSum();
        });
    });
</script>        

<?php
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'DocmAchsDetails',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="DocmAchsDetails[dadt_id]" value="<?php echo $model->dadt_id; ?>"/>
<input type="hidden" name="DocmAchsDetails[docm_id]" value="<?php echo $model->docm_id; ?>"/>

<div class="row" style="margin: 0;">
    <div class="row-column">Фильтр: <input id="FilterEquipsDAD" /></div>
</div>

<div class="row" style="margin: 0;">
    <div class="row-column">Оборудование: <div id="EquipsDAD" name="DocmAchsDetails[eqip_id]"></div><?php echo $form->error($model, 'eqip_id'); ?></div>
    <div class="row-column">Ед.изм.: <br><input readonly id='UnitMeasurementDAD' type="text" /></div>
    
    <div class="row-column">
        <div><div class="row-column">Количество</div></div>
        <div style="clear: both"></div>
        <div><div class="row-column"><div id="edQuantEdit" name="DocmAchsDetails[docm_quant]"></div><?php echo $form->error($model, 'docm_quant'); ?></div></div>
    </div>
    <div class="row-column" style="float: right">
        <div><div class="row-column">Цена</div></div>
        <div style="clear: both"></div>
        <div><div class="row-column"><div id="edPriceEdit" name="DocmAchsDetails[price]"></div><?php echo $form->error($model, 'price'); ?></div></div>
    </div>
</div>
<div class="row">
    <div class="row-column"><div id="edUsedEdit" name="DocmAchsDetails[used]">Б\У</div><?php echo $form->error($model, 'price'); ?></div>
    <div class="row-column"><div id="edToProductionEdit" name="DocmAchsDetails[ToProduction]">В производство</div><?php echo $form->error($model, 'ToProduction'); ?></div>
    <div class="row-column"><div id="edNoPriceListEdit" name="DocmAchsDetails[no_price_list]">Не учитывать цену</div><?php echo $form->error($model, 'no_price_list'); ?></div>
    <div style="float: right">
        <div class="row-column">Факт. кол-во:</div>
        <div class="row-column"><div id="edFactQuantEdit" name="DocmAchsDetails[fact_quant]"></div><?php echo $form->error($model, 'fact_quant'); ?></div>
    </div>
</div>
<div class="row">
    <div style="float: left">
        <div class="row-column">Наличие:</div>
        <div class="row-column"><div type="text" id="edInvQuant"></div></div>
        <div class="row-column">Б\У:</div>
        <div class="row-column"><div type="text" id="edInvQuantUsed"></div></div>
    </div>
    <div style="float: right">
        <div class="row-column">Сумма:</div>
        <div class="row-column"><div type="text" id="edSumEdit" name="DocmAchsDetails[sum]"></div><?php echo $form->error($model, 'sum'); ?></div>
    </div>
</div>    
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveDocmAchsDetail'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelDocmAchsDetail'/></div>
</div>
<?php $this->endWidget(); ?>



