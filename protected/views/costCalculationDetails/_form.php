<script type="text/javascript">
    $(document).ready(function () {
        
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        
        var CostCalc = {
            calc_id: '<?php echo $model->calc_id; ?>',
            date: Aliton.DateConvertToJs('<?php echo $model->date; ?>'),
            regs_id: '<?php echo $model->regs_id; ?>',
            group_name: '<?php echo $model->group_name; ?>',
            ccwt_id: '<?php echo $model->ccwt_id; ?>',
            PaymentType_id: '<?php echo $model->PaymentType_id; ?>',
            ObjectGr_id: '<?php echo $model->ObjectGr_id; ?>',
            info_id: '<?php echo $model->info_id; ?>',
            empl_id: '<?php echo $model->empl_id; ?>',
            jrdc_id: '<?php echo $model->jrdc_id; ?>',
            Demand_id: '<?php echo $model->Demand_id; ?>',
            ContrNumS: '<?php echo $model->ContrNumS; ?>',
            ContrDateS: Aliton.DateConvertToJs('<?php echo $model->ContrDateS; ?>'),
            
            spec_condt: <?php echo json_encode($model->spec_condt); ?>,
            note: <?php echo json_encode($model->note); ?>,
        };
        
        $('#CostCalculationDetails').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        $("#DateCC").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CostCalc.date, formatString: 'dd.MM.yyyy H:mm', showTimeButton: true, width: 180}));
        $("#group_nameCC").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 200 }));

        var RegistrationsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceRegistrations));
        $("#regsCC").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: RegistrationsDataAdapter, displayMember: "RegistrationName", valueMember: "Registration_id", autoDropDownHeight: true, width: 180 }));
        
        var CostCalcWorkTypesDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceCostCalcWorkTypes));
        $("#workCC").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: CostCalcWorkTypesDataAdapter, displayMember: "ccwt_name", valueMember: "ccwt_id", autoDropDownHeight: true, width: 240 }));
        
        var PaymentTypesDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourcePaymentTypes));
        $("#PaymentTypeCC").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: PaymentTypesDataAdapter, displayMember: "PaymentTypeName", valueMember: "PaymentType_Id", autoDropDownHeight: true, width: 130 }));
        
        console.log('CostCalc.ObjectGr_id = ' + CostCalc.ObjectGr_id);
        
        var ContactInfoForCostCalcDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContactInfoForCostCalc), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["i.ObjectGr_id = " + CostCalc.ObjectGr_id],
                });
                return data;
            },
        });
        $("#infoCC").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: ContactInfoForCostCalcDataAdapter, displayMember: "FIO", valueMember: "info_id", autoDropDownHeight: true, width: 320 }));
        
        var EmployeesDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees));
        $("#empl_nameCC").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: EmployeesDataAdapter, displayMember: "ShortName", valueMember: "Employee_id", width: 200 }));
        
        var JuridicalsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceJuridicalsMin));
        $("#jrdc_nameCC").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: JuridicalsDataAdapter, displayMember: "JuridicalPerson", valueMember: "Jrdc_Id", autoDropDownHeight: true, width: 260 }));
        
        $("#Demand_idCC").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 110, min: 0, decimalDigits: 0 }));
        $("#ContrNumCC").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 120, min: 0, decimalDigits: 0 }));
        
        $("#ContrDateCC").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CostCalc.ContrDateS, formatString: 'dd.MM.yyyy H:mm', showTimeButton: true, width: 180}));
        
        $("#spec_condtCC").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 600, height: 120 }));
        $("#noteCC").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 600, height: 120 }));
       
       
        $('#btnSaveCostCalcDetails').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnCancelCostCalcDetails').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#btnCancelCostCalcDetails').on('click', function(){
            $('#CostCalcDetailsDialog').jqxWindow('close');
        });
        
        $('#btnSaveCostCalcDetails').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('CostCalculationDetails/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('CostCalculationDetails/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#CostCalcDetails').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        $('#CostCalcDetailsDialog').jqxWindow('close');
                         window.location.reload();
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
        
            
        if (CostCalc.group_name !== '') $("#group_nameCC").jqxInput('val', CostCalc.group_name);
        if (CostCalc.regs_id !== '') $("#regsCC").jqxComboBox('val', CostCalc.regs_id);
        if (CostCalc.ccwt_id !== '') $("#workCC").jqxComboBox('val', CostCalc.ccwt_id);
        if (CostCalc.PaymentType_id !== '') $("#PaymentTypeCC").jqxComboBox('val', CostCalc.PaymentType_id);
        if (CostCalc.info_id !== '') $("#infoCC").jqxComboBox('val', CostCalc.info_id);
        if (CostCalc.empl_id !== '') $("#empl_nameCC").jqxComboBox('val', CostCalc.empl_id);
        if (CostCalc.jrdc_id !== '') $("#jrdc_nameCC").jqxComboBox('val', CostCalc.jrdc_id);
        if (CostCalc.Demand_id !== '') $("#Demand_idCC").jqxNumberInput('val', CostCalc.Demand_id);
        if (CostCalc.ContrNumS !== '') $("#ContrNumCC").jqxNumberInput('val', CostCalc.ContrNumS);
        
        
        if (CostCalc.spec_condt !== '') $("#spec_condtCC").jqxTextArea('val', CostCalc.spec_condt);
        if (CostCalc.note !== '') $("#noteCC").jqxTextArea('val', CostCalc.note);
        
        
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'CostCalcDetails',
	'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<input type="hidden" name="CostCalcDetails[calc_id]" value="<?php echo $model->calc_id; ?>"/>

<div class="row">
    <div class="row-column" style="margin-top: 2px;">Дата: </div><div class="row-column"><div id='DateCC' name="CostCalcDetails[date]"></div></div>
</div>

<div class="row">
    <div class="row-column">Наименование: <input id='group_nameCC' type="text" name="CostCalcDetails[group_name]"></div>
    <div class="row-column" style="margin-top: 2px;">Оформление: </div><div class="row-column"><div id='regsCC' name="CostCalcDetails[regs_id]"></div></div>
</div>

<div class="row">
    <div class="row-column" style="margin-top: 2px;">Вид работ: </div><div class="row-column"><div id='workCC' name="CostCalcDetails[ccwt_id]"></div></div>
    <div class="row-column" style="margin-top: 2px;">Вид оплаты: </div><div class="row-column"><div id='PaymentTypeCC' name="CostCalcDetails[PaymentType_id]"></div></div>
</div>

<div class="row">
    <div class="row-column" style="margin-top: 2px;">Контактное лицо: </div><div class="row-column"><div id='infoCC' name="CostCalcDetails[info_id]"></div></div>
</div>

<div class="row">
    <div class="row-column" style="margin-top: 2px;">Сотрудник: </div><div class="row-column"><div id='empl_nameCC' name="CostCalcDetails[empl_id]"></div></div>
</div>

<div class="row">
    <div class="row-column" style="margin-top: 2px;">Юр. лицо: </div><div class="row-column"><div id='jrdc_nameCC' name="CostCalcDetails[jrdc_id]"></div></div>
    <div class="row-column" style="margin-top: 2px;">Номер заявки: </div><div class="row-column"><div  id='Demand_idCC' name="CostCalcDetails[Demand_id]"></div></div>
</div>

<div class="row">
    <div class="row-column" style="margin-top: 2px;">№ Договора: </div><div class="row-column"><div id='ContrNumCC' name="CostCalcDetails[ContrNumS]"></div></div>
    <div class="row-column" style="margin-top: 2px;">Дата договора: </div><div class="row-column"><div id='ContrDateCC' name="CostCalcDetails[ContrDateS]"></div></div>
</div>

<div class="row" style="margin-top: 7px;"><div class="row-column">Техническое задание: <textarea id="spec_condtCC" name="CostCalcDetails[spec_condt]"></textarea></div></div>
<div class="row" style="margin-top: 0;"><div class="row-column">Примечание: <textarea id="noteCC" name="CostCalcDetails[note]"></textarea></div></div>


<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveCostCalcDetails'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelCostCalcDetails'/></div>
</div>
<?php $this->endWidget(); ?>



