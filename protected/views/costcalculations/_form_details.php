<script type="text/javascript">
    $(document).ready(function () {
        
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        
        var CostCalc = {
            calc_id: <?php echo json_encode($model->calc_id); ?>,
            sum_materials_low: <?php echo json_encode($model->sum_materials_low); ?>,
            sum_materials_high: <?php echo json_encode($model->sum_materials_high); ?>,
            starting_work_low: <?php echo json_encode($model->starting_work_low); ?>,
            koef_indirect: <?php echo json_encode($model->koef_indirect); ?>,
            discount: <?php echo json_encode($model->discount); ?>,
            starting_work: <?php echo json_encode($model->starting_work); ?>,
            total_work: <?php echo json_encode($model->total_work); ?>,
            expences: <?php echo json_encode($model->expences); ?>,
            sum_full: <?php echo json_encode($sum_full); ?>,
            sum_works_high: <?php echo json_encode($model->sum_works_high); ?>
        };
        
        $('#CostCalculationDetails').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        $("#edSumMaterialsLowEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, min: 0, decimalDigits: 2 }));
        $("#edSumMaterialsHighEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, min: 0, decimalDigits: 2 }));
        $("#edStartingWorkLowEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 200, min: 0, decimalDigits: 2 }));
        $("#edKoefIndirectEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 200, min: 0, decimalDigits: 2 }));
        $("#edDiscountEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 200, min: 0, decimalDigits: 2 }));
        $("#edStartingWorkEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 200, min: 0, decimalDigits: 2 }));
        $("#edTotalWorkEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 200, min: 0, decimalDigits: 2 }));
        $("#edExpencesEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 200, min: 0, decimalDigits: 2 }));
        $("#edItogoEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 200, min: 0, decimalDigits: 2 }));
        $("#edDiffStartingWorkEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, min: 0, decimalDigits: 2, spinButtonsStep: 0 }));
        $("#edFullDiffEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, min: 0, decimalDigits: 2, readOnly: true, spinButtonsStep: 0 }));
        $("#edDiffTotalWorkEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, min: 0, decimalDigits: 2, readOnly: true, spinButtonsStep: 0 }));
        $("#edDiffExpencesEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, min: 0, decimalDigits: 2, readOnly: true, spinButtonsStep: 0 }));
        
        $('#btnSaveCostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnCancelCostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
        $('#btnCancelCostCalculations').on('click', function(){
            $('#CostCalculationsDialog').jqxWindow('close');
        });
        
        $('#btnSaveCostCalculations').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('CostCalculations/Update')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#CostCalculations').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        $('#CostCalculationsDialog').jqxWindow('close');
                        CostCalculations.Refresh(); 
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
        
            
        if (CostCalc.sum_materials_low !== '') $("#edSumMaterialsLowEdit").jqxNumberInput('val', CostCalc.sum_materials_low);
        if (CostCalc.sum_materials_high !== '') $("#edSumMaterialsHighEdit").jqxNumberInput('val', CostCalc.sum_materials_high);
        if (CostCalc.starting_work_low !== '') $("#edStartingWorkLowEdit").jqxNumberInput('val', CostCalc.starting_work_low);
        if (CostCalc.koef_indirect !== '') $("#edKoefIndirectEdit").jqxNumberInput('val', CostCalc.koef_indirect);
        if (CostCalc.discount !== '') $("#edDiscountEdit").jqxNumberInput('val', CostCalc.discount);
        if (CostCalc.starting_work !== '') $("#edStartingWorkEdit").jqxNumberInput('val', CostCalc.starting_work);
        if (CostCalc.total_work !== '') $("#edTotalWorkEdit").jqxNumberInput('val', CostCalc.total_work);
        if (CostCalc.expences !== '') $("#edExpencesEdit").jqxNumberInput('val', CostCalc.expences);
        
        var Calc = function() {
            var SW = $("#edStartingWorkEdit").val();
            var TW = $("#edTotalWorkEdit").val();
            var EX = $("#edExpencesEdit").val();
            var FULL = SW + TW + EX;
            
            var FULL_DIFF = CostCalc.sum_works_high - FULL;
            var SW_DIFF = SW + FULL_DIFF;
            var TW_DIFF = TW + FULL_DIFF;
            var EX_DIFF = EX + FULL_DIFF;
            
            $("#edItogoEdit").val(FULL);
            $("#edFullDiffEdit").val(FULL_DIFF);
            $("#edDiffStartingWorkEdit").val(SW_DIFF);
            $("#edDiffTotalWorkEdit").val(TW_DIFF);
            $("#edDiffExpencesEdit").val(EX_DIFF);
        }
        
        $("#edStartingWorkEdit").on('change', function(){
            Calc();
        });
        $("#edTotalWorkEdit").on('change', function(){
            Calc();
        });
        $("#edExpencesEdit").on('change', function(){
            Calc();
        });
        
        $("#edSumMaterialsLowEdit").on('change', function() {
            $("#edSumMaterialsHighEdit").jqxNumberInput('val', $("#edSumMaterialsLowEdit").jqxNumberInput('val')*$("#edKoefIndirectEdit").jqxNumberInput('val'));
        });
        
        
        Calc();
    });
</script>        



<?php 
    $form=$this->beginWidget('CActiveForm', array(
        'id'=>'CostCalculations',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
    
    
?>
<input type="hidden" name="CostCalculations[calc_id]" value="<?php echo $model->calc_id; ?>"/>


<div class="row" style="border-bottom: 1px solid #e0e0e0">
    <div style="float: left">
        <div class="row-column" >Расходные материалы</div>
        <div class="row-column" ><div id="edSumMaterialsLowEdit" name="CostCalculations[sum_materials_low]"></div></div>
    </div>
    <div style="float: right">
        <div class="row-column" >Для клиента</div>
        <div class="row-column" ><div id="edSumMaterialsHighEdit" name="CostCalculations[sum_materials_high]"></div></div>
    </div>
</div>
<div class="row" style="margin-top: 10px;">
    <div class="row-column" style="width: 250px">Пусконаладочные работы</div>
    <div class="row-column"><div id="edStartingWorkLowEdit" name="CostCalculations[starting_work_low]"></div></div>
</div>
<div class="row">
    <div class="row-column" style="width: 250px">Коэффициент наценки на ФОТ</div>
    <div class="row-column"><div id="edKoefIndirectEdit" name="CostCalculations[koef_indirect]"></div></div>
</div>
<div class="row">
    <div class="row-column" style="width: 250px">Скидка (%)</div>
    <div class="row-column"><div id="edDiscountEdit" name="CostCalculations[discount]"></div></div>
</div>
<div class="row" style="border: 1px solid #e0e0e0; background-color: #e0e0e0;">
    <div><div class="row-column"><b>Цены для клиента</b></div></div>
    <div style="clear: both"></div>
    <div>
        <div class="row-column" style="width: 250px">Пусконаладочные работы</div>
        <div class="row-column"><div id="edStartingWorkEdit" name="CostCalculations[starting_work]"></div></div>
        <div class="row-column"><div id="edDiffStartingWorkEdit"></div></div>
    </div>
    <div style="clear: both"></div>
    <div>
        <div class="row-column" style="width: 250px">Монтажные работы</div>
        <div class="row-column"><div id="edTotalWorkEdit" name="CostCalculations[total_work]"></div></div>
        <div class="row-column"><div id="edDiffTotalWorkEdit"></div></div>
    </div>
    <div style="clear: both"></div>
    <div>
        <div class="row-column" style="width: 250px">Накладные и транспортные расходы</div>
        <div class="row-column"><div id="edExpencesEdit" name="CostCalculations[expences]"></div></div>
        <div class="row-column"><div id="edDiffExpencesEdit"></div></div>
    </div>
    <div>
        <div class="row-column" style="width: 250px; text-align: right;"><b>Итого</b></div>
        <div class="row-column"><div id="edItogoEdit"></div></div>
        <div class="row-column"><div id="edFullDiffEdit"></div></div>
    </div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveCostCalculations'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelCostCalculations'/></div>
</div>
<?php $this->endWidget(); ?>
