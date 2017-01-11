<script type="text/javascript">
    $(document).ready(function () {
        
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        
        var CostCalcWork = {
            ccwr_id: '<?php echo $model->ccwr_id; ?>',
            calc_id: '<?php echo $model->calc_id; ?>',
            cceq_id: <?php echo json_encode($model->cceq_id); ?>,
            cwdt_id: '<?php echo $model->cwdt_id; ?>',
            koef: '<?php echo $model->koef; ?>',
            price: '<?php echo $model->price; ?>',
            price_low: '<?php echo $model->price_low; ?>',
            quant: '<?php echo $model->quant; ?>',
            note: '<?php echo $model->note; ?>',
            cw_name: '<?php echo $model->cw_name; ?>',
            eqip_name: '<?php echo $eqip_name; ?>',
        };
        
        $('#CostCalcWorks').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        var WorkTypeDetailsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceCalcWorkTypeDetails, {async: true}), {
            formatData: function (data) {
                    var Value = $('#edWorkFilter').val();
                    var Filters = [];
                    Filters[0] = "cwdt.name like '%" + Value + "%'"
                    $.extend(data, {
                        Filters: Filters
                    });
                    return data;
                },
        });
        
        
        $("#jqxToggleButtonCCW").jqxToggleButton($.extend(true, {}, ToggleButtonDefaultSettings, { width: '280px', toggled: true }));

        var toggled;
        
        $("#jqxToggleButtonCCW").on('click', function () {
            toggled = $("#jqxToggleButtonCCW").jqxToggleButton('toggled');
            if (toggled) {
                $("#jqxToggleButtonCCW")[0].value = 'Добавить еще одну позицию';
                
            }
            else $("#jqxToggleButtonCCW")[0].value = 'Не добавлять больше позиций';
        });
                
        $("#edWorkFilter").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 400 }));
        $("#edWorkFilter").on('change', function(e){
            WorkTypeDetailsDataAdapter.dataBind();
        });
        $("#CСWorkTypeDetails").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: WorkTypeDetailsDataAdapter, displayMember: "name", valueMember: "cwdt_id", searchMode: 'contains', width: 400 }));
        $("#QuantCCW").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 80, min: 0, decimalDigits: 2 }));
        $("#KoefCCW").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 90, min: 0, decimalDigits: 2, readOnly: true }));
        $("#PriceCCW").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 120, min: 0, decimalDigits: 2 }));
        $("#PriceLowCCW").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 120, min: 0, decimalDigits: 2 }));
        $("#EquipsCCW").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 600 }));
        $("#cw_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 400 }));
        $("#NoteCCW").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 600, height: 90 }));
        $("#EquipQuantCCW").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 80, min: 0, decimalDigits: 2 }));
        
        $('#btnSaveCostCalcWork').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnCancelCostCalcWork').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#btnCancelCostCalcWork').on('click', function(){
            $('#CostCalculationsDialog').jqxWindow('close');
        });
        
        $('#btnSaveCostCalcWork').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('CostCalcWorks/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('CostCalcWorks/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#CostCalcWorks').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('ccwr_id', Res.id, '#CostCalcWorksGrid', true);
                        
                        if ($('#RefreshCostCalcEquips').length>0)
                            $('#RefreshCostCalcEquips').click();
                        
                        CostCalcDetails.DetailsRefresh();
                        if (toggled && StateInsert) {
                            $("#CСWorkTypeDetails").jqxComboBox('clearSelection');
                            $("#KoefCCW").jqxNumberInput('val', null);
                            $("#QuantCCW").jqxNumberInput('val', null);
                            $("#PriceCCW").jqxNumberInput('val', null);
                            $("#PriceLowCCW").jqxNumberInput('val', null);
                            $("#EquipsCCE").jqxComboBox('clearSelection');
                            $('#NoteCCW').jqxTextArea('val', '');
                        } else {
                            $('#CostCalculationsDialog').jqxWindow('close');
                        }
                    }
                    else {
                        $('#BodyCostCalculationsDialog').html(Res.html);
                        //HideQuant();
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        $("#CСWorkTypeDetails").on('bindingComplete', function(){
            if (CostCalcWork.cwdt_id != '') {
                $("#CСWorkTypeDetails").jqxComboBox('val', CostCalcWork.cwdt_id);
            }
        });
            
        if (CostCalcWork.quant != '') {
            $("#QuantCCW").jqxNumberInput('val', CostCalcWork.quant);
            $("#EquipQuantCCW").jqxNumberInput('val', CostCalcWork.quant);
        }
        if (CostCalcWork.price != '') $("#PriceCCW").jqxNumberInput('val', CostCalcWork.price);
        if (CostCalcWork.price_low != '') $("#PriceLowCCW").jqxNumberInput('val', CostCalcWork.price_low);
        if (CostCalcWork.note != '') $("#NoteCCW").jqxTextArea('val', CostCalcWork.note);
        if (CostCalcWork.eqip_name != '') $("#EquipsCCW").jqxInput('val', CostCalcWork.eqip_name);
        if (CostCalcWork.cw_name != '') $("#cw_name").jqxInput('val', CostCalcWork.cw_name);
        if (CostCalcWork.koef != '') $("#KoefCCW").jqxNumberInput('val', CostCalcWork.koef);
        
        var HideQuant = function() {
            if (CostCalcWork.cceq_id != '' &&  CostCalcWork.cceq_id != null) {
                $("#QuantCCW").jqxNumberInput({disabled: true});
                $("#Block1").css('display', 'none');
            } else {
                $("#EquipQuantCCW").jqxNumberInput({disabled: true});
                $("#Block2").css('display', 'none');
            }
        }
        HideQuant();
        
        var ReCalc = function() {
            var Val = $('#PriceLowCCW').val();
            var Koef = $('#KoefCCW').val();
            //var Count = $('#QuantCCW').val();
            $('#PriceCCW').jqxNumberInput('val', Val*Koef);
        };
        
        $('#PriceLowCCW').on('keyup', function() {
            ReCalc();
        });
        
        $('#QuantCCW').on('keyup', function() {
            ReCalc();
        });
        
        $('#EquipQuantCCW').on('keyup', function() {
            ReCalc();
        });
        
        
        $('#CСWorkTypeDetails').on('select', function (event) 
        {
            var args = event.args;
            if (args) {
                var item = args.item;
                var value = item.value;
                var priceCCW = 0;
                
                for (var i = 0; i < WorkTypeDetailsDataAdapter.records.length; i++){
                    if (WorkTypeDetailsDataAdapter.records[i].cwdt_id == value) {
                        priceCCW = WorkTypeDetailsDataAdapter.records[i].Price;
                        break;
                    }
                }
                $("#PriceLowCCW").jqxNumberInput('val', priceCCW);
                $("#PriceCCW").jqxNumberInput('val', priceCCW*$("#KoefCCW").jqxNumberInput('val'));
                
            }
            
            
        });
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'CostCalcWorks',
	'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<input type="hidden" name="CostCalcWorks[ccwr_id]" value="<?php echo $model->ccwr_id; ?>"/>
<input type="hidden" name="CostCalcWorks[calc_id]" value="<?php echo $model->calc_id; ?>"/>
<input type="hidden" name="CostCalcWorks[cceq_id]" value="<?php echo $model->cceq_id; ?>"/>

<div class="row" style="margin-top: 0px; padding-top: 0px; border-bottom: 1px solid #e0e0e0;">
    <div class="row-column"><input type="button" value="Добавить еще одну позицию" id='jqxToggleButtonCCW' /></div>
</div>
<div class="row" style="margin-top: 10px;">
    <div class="row-column" style="width: 110px;">Фильтр</div>
    <div class="row-column"><input type="text" id="edWorkFilter"></div>
</div>
<div class="row">
    <div class="row-column" style="width: 110px;">Доп. наимен.:</div>
    <div class="row-column"><input type="text" id="cw_name" name="CostCalcWorks[cw_name]"><?php echo $form->error($model, 'cw_name'); ?></div>
</div>

<div class="row">
    <div class="row-column" style="width: 110px;">Вид работ:</div>
    <div class="row-column"><div id="CСWorkTypeDetails" name="CostCalcWorks[cwdt_id]"></div><?php echo $form->error($model, 'cwdt_id'); ?></div>
</div>

<div class="row">
    <div class="row-column">
        <div>Коэффициент:</div>
        <div style="clear: both"></div>
        <div><div id="KoefCCW"></div></div>
    </div>
    <div class="row-column" style="margin-left: 10px;">
        <div>Цена:</div>
        <div style="clear: both"></div>
        <div><div id="PriceCCW" name="CostCalcWorks[price]"></div><?php echo $form->error($model, 'price'); ?></div>
    </div>
    <div class="row-column" style="margin-left: 10px;">
        <div>Себестоимость:</div>
        <div style="clear: both"></div>
        <div><div id="PriceLowCCW" name="CostCalcWorks[price_low]"></div><?php echo $form->error($model, 'price_low'); ?></div>
    </div>
    <div class="row-column" id="Block1" style="margin-left: 10px;">
        <div>Количество:</div>
        <div style="clear: both"></div>
        <div><div id="QuantCCW" name="CostCalcWorks[quant]"></div><?php echo $form->error($model, 'quant'); ?></div>
    </div>
</div>

<div class="row" id="Block2">
    <div>
        <div class="row-column">Оборудование: <input readonly type="text" id="EquipsCCW"></div>
    </div>
    <div style="clear: both"></div>
    <div style="margin-top: 4px;">
        <div class="row-column">Количество:</div>
        <div class="row-column"><div id="EquipQuantCCW" name="CostCalcWorks[quant]"></div><?php echo $form->error($model, 'quant'); ?></div>
    </div>
</div>

<div class="row" style="margin-top: 0;">
    <div class="row-column">Примечание: <textarea id="NoteCCW" name="CostCalcWorks[note]"></textarea><?php echo $form->error($model, 'note'); ?></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveCostCalcWork'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelCostCalcWork'/></div>
</div>
<?php $this->endWidget(); ?>



