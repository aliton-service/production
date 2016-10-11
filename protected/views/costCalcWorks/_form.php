<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var CostCalcWork = {
            ccwr_id: '<?php echo $model->ccwr_id; ?>',
            calc_id: '<?php echo $model->calc_id; ?>',
            cceq_id: '<?php echo $model->cceq_id; ?>',
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
        
        var WorkTypeDetailsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceCalcWorkTypeDetails, {async: true}));
        
        
        $("#jqxToggleButtonCCW").jqxToggleButton($.extend(true, {}, ToggleButtonDefaultSettings, { width: '50px', toggled: false }));

        var toggled;
        
        $("#jqxToggleButtonCCW").on('click', function () {
            toggled = $("#jqxToggleButtonCCW").jqxToggleButton('toggled');
            if (toggled) {
                $("#jqxToggleButtonCCW")[0].value = 'вкл.';
                
            }
            else $("#jqxToggleButtonCCW")[0].value = 'выкл.';
        });
                
        $("#CСWorkTypeDetails").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: WorkTypeDetailsDataAdapter, displayMember: "name", valueMember: "cwdt_id", searchMode: 'contains', width: 600 }));
        $("#QuantCCW").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 80, min: 0, decimalDigits: 0 }));
        $("#KoefCCW").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 90, min: 0, decimalDigits: 1, readOnly: true }));
        $("#PriceCCW").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 120, min: 0, decimalDigits: 2 }));
        $("#PriceLowCCW").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 120, min: 0, decimalDigits: 0 }));
        $("#EquipsCCW").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 600 }));
        $("#cw_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 600 }));
        $("#NoteCCW").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 600, height: 90 }));
        
        $('#btnSaveCostCalcWork').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnCancelCostCalcWork').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#btnCancelCostCalcWork').on('click', function(){
            $('#CostCalcDetailsDialog').jqxWindow('close');
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
                        if (toggled) {
                            $("#CСWorkTypeDetails").jqxComboBox('clearSelection');
                            $("#KoefCCW").jqxNumberInput('val', null);
                            $("#QuantCCW").jqxNumberInput('val', null);
                            $("#PriceCCW").jqxNumberInput('val', null);
                            $("#PriceLowCCW").jqxNumberInput('val', null);
                            $("#EquipsCCE").jqxComboBox('clearSelection');
                            $('#NoteCCW').jqxTextArea('val', '');
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
        
        $("#CСWorkTypeDetails").on('bindingComplete', function(){
            if (CostCalcWork.cwdt_id != '') {
                $("#CСWorkTypeDetails").jqxComboBox('val', CostCalcWork.cwdt_id);
            }
        });
            
        if (CostCalcWork.quant != '') $("#QuantCCW").jqxNumberInput('val', CostCalcWork.quant);
        if (CostCalcWork.price != '') $("#PriceCCW").jqxNumberInput('val', CostCalcWork.price);
        if (CostCalcWork.price_low != '') $("#PriceLowCCW").jqxNumberInput('val', CostCalcWork.price_low);
        if (CostCalcWork.note != '') $("#NoteCCW").jqxTextArea('val', CostCalcWork.note);
        if (CostCalcWork.eqip_name != '') $("#EquipsCCW").jqxInput('val', CostCalcWork.eqip_name);
        
        
        $('#CСWorkTypeDetails').on('select', function (event) 
        {
            var args = event.args;
            if (args) {
                var item = args.item;
                console.log(item);
                if(item) {
                    var value = item.value;
                    console.log('value = '+ value);
                    if(value) {
                        var CalcWorkTypesDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceCalcWorkTypeDetails), {
                            formatData: function (data) {
                                $.extend(data, {
                                    Filters: ["cwdt.cwdt_id = " + value],
                                });
                                return data;
                            },
                        });
                        CalcWorkTypesDataAdapter.dataBind();
                        var priceCCW = CalcWorkTypesDataAdapter.records[0].Price;
                        console.log(priceCCW);
                        $("#PriceLowCCW").jqxNumberInput('val', priceCCW);
                    }
                }
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

<div class="row" style="margin-top: 5px;">
    <div class="row-column" style="margin-top: 2px;">Добавить несколько позиций: </div>
    <div class="row-column"><input type="button" value="выкл." id='jqxToggleButtonCCW' /></div>
</div>

<div class="row">
    <div class="row-column">Доп. наимен.: <input type="text" id="cw_name" name="CostCalcWorks[cw_name]"></div>
</div>

<div class="row">
    <div class="row-column">Вид работ: <div id="CСWorkTypeDetails" name="CostCalcWorks[cwdt_id]"></div></div>
</div>

<div class="row">
    <div class="row-column">Коэффициент: <div id="KoefCCW"></div></div>
    <div class="row-column" style="margin-left: 10px;">Цена: <div id="PriceCCW" name="CostCalcWorks[price]"></div><?php echo $form->error($model, 'price'); ?></div>
    <div class="row-column" style="margin-left: 10px;">Себестоимость: <div id="PriceLowCCW" name="CostCalcWorks[price_low]"></div></div>
    <div class="row-column" style="margin-left: 10px;">Количество: <div id="QuantCCW" name="CostCalcWorks[quant]"></div><?php echo $form->error($model, 'quant'); ?></div>
</div>

<div class="row">
    <div class="row-column">Оборудование: <input readonly type="text" id="EquipsCCW"></div>
</div>

<div class="row" style="margin-top: 0;">
    <div class="row-column">Примечание: <textarea id="NoteCCW" name="CostCalcWorks[note]"></textarea></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveCostCalcWork'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelCostCalcWork'/></div>
</div>
<?php $this->endWidget(); ?>



