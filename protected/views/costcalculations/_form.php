<script type="text/javascript">
    $(document).ready(function () {
        
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        
        var CostCalc = {
            calc_id: '<?php echo $model->calc_id; ?>',
            cgrp_id: <?php echo json_encode($model->calc_id); ?>,
            date: Aliton.DateConvertToJs('<?php echo $model->date; ?>'),
            regs_id: '<?php echo $model->regs_id; ?>',
            name: '<?php echo $model->name; ?>',
            ccwt_id: '<?php echo $model->ccwt_id; ?>',
            PaymentType_id: '<?php echo $model->PaymentType_id; ?>',
            ObjectGr_id: '<?php echo $model->ObjectGr_id; ?>',
            info_id: '<?php echo $model->info_id; ?>',
            empl_id: '<?php echo $model->empl_id; ?>',
            jrdc_id: '<?php echo $model->jrdc_id; ?>',
            Demand_id: '<?php echo $model->Demand_id; ?>',
            ContrNumS: <?php echo json_encode($model->ContrNumS); ?>,
            ContrDateS: Aliton.DateConvertToJs('<?php echo $model->ContrDateS; ?>'),
            spec_condt: <?php echo json_encode($model->spec_condt); ?>,
            note: <?php echo json_encode($model->note); ?>,
            GarantMail: Boolean(Number(<?php echo json_encode($model->GarantMail); ?>)),
        };
        
        $('#CostCalculationDetails').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        
        $("#DateCC").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CostCalc.date, formatString: 'dd.MM.yyyy HH:mm', showTimeButton: true, width: 180}));
        $("#group_nameCC").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 400 }));

        var RegistrationsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceRegistrations));
        $("#regsCC").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: RegistrationsDataAdapter, displayMember: "RegistrationName", valueMember: "Registration_id", autoDropDownHeight: true, width: 180 }));
        
        var CostCalcWorkTypesDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceCostCalcWorkTypes));
        $("#workCC").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: CostCalcWorkTypesDataAdapter, displayMember: "ccwt_name", valueMember: "ccwt_id", autoDropDownHeight: true, width: 240 }));
        
        var PaymentTypesDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourcePaymentTypes));
        $("#PaymentTypeCC").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: PaymentTypesDataAdapter, displayMember: "PaymentTypeName", valueMember: "PaymentType_Id", autoDropDownHeight: true, width: 130 }));
        
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
        
        $("#Demand_idCC").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 140 }));
        $('#btnFindDemand').on('click', function(){
            $('#FindDemandDialog').jqxWindow({width: 800, height: 550, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Demands/FindDemand')) ?>,
                type: 'POST',
                async: false,
                data: {
                    Demand_id: CostCalc.Demand_id,
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyFindDemandDialog").html(Res.html);
                    $('#FindDemandDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
            
        
        });
        
        $('#FindDemandDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {}));
        $("#ContrNumCC").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 120}));
        $("#ContrDateCC").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CostCalc.ContrDateS, formatString: 'dd.MM.yyyy H:mm', showTimeButton: true, width: 180}));
        $("#spec_condtCC").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 600, height: 100 }));
        $("#noteCC").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 600, height: 100 }));
        $("#chbGarantMailEdit").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 200 }));
        $('#btnSaveCostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnCancelCostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
        $('#btnCancelCostCalculations').on('click', function(){
            if ($('#CostCalculationsDialog').length>0)
                $('#CostCalculationsDialog').jqxWindow('close');
            if ($('#RepairsDialog').length>0)
                $('#RepairsDialog').jqxWindow('close');
        });
        
        $('#btnSaveCostCalculations').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('CostCalculations/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('CostCalculations/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#CostCalculations').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        if ($('#CostCalculationsDialog').length>0)
                            $('#CostCalculationsDialog').jqxWindow('close');
                        if ($('#RepairsDialog').length>0)
                            $('#RepairsDialog').jqxWindow('close');
                        
                        if (typeof(CostCalculations.Refresh) != 'undefined')
                            CostCalculations.Refresh(); 
                        
                        if (typeof(Repairs) != 'undefined') {
                            Repairs.Refresh(); 
                            if ($('#GridDocuments').length>0)
                                $('#GridDocuments').jqxGrid('updatebounddata');
                        }
                        
                        if (typeof(OpenCostCalc) != 'undefined')
                            if (OpenCostCalc == true)
                                window.open(<?php echo json_encode(Yii::app()->createUrl('CostCalculations/Index')); ?> + '&calc_id=' + Res.id);
                    }
                    else {
                        if ($('#CostCalculationsDialog').length>0)
                            $('#BodyCostCalculationsDialog').html(Res.html);
                        if ($('#RepairsDialog').length>0)
                            $('#BodyRepairsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
            
        if (CostCalc.name !== '') $("#group_nameCC").jqxInput('val', CostCalc.name);
        if (CostCalc.regs_id !== '') $("#regsCC").jqxComboBox('val', CostCalc.regs_id);
        if (CostCalc.ccwt_id !== '') $("#workCC").jqxComboBox('val', CostCalc.ccwt_id);
        if (CostCalc.PaymentType_id !== '') $("#PaymentTypeCC").jqxComboBox('val', CostCalc.PaymentType_id);
        if (CostCalc.info_id !== '') $("#infoCC").jqxComboBox('val', CostCalc.info_id);
        if (CostCalc.empl_id !== '') $("#empl_nameCC").jqxComboBox('val', CostCalc.empl_id);
        if (CostCalc.jrdc_id !== '') $("#jrdc_nameCC").jqxComboBox('val', CostCalc.jrdc_id);
        if (CostCalc.Demand_id !== '') $("#Demand_idCC").jqxInput('val', CostCalc.Demand_id);
        if (CostCalc.ContrNumS !== '') $("#ContrNumCC").jqxInput('val', CostCalc.ContrNumS);
        if (CostCalc.spec_condt !== '') $("#spec_condtCC").jqxTextArea('val', CostCalc.spec_condt);
        if (CostCalc.note !== '') $("#noteCC").jqxTextArea('val', CostCalc.note);
        $("#chbGarantMailEdit").jqxCheckBox('val', CostCalc.GarantMail);
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
<input type="hidden" name="CostCalculations[cgrp_id]" value="<?php echo $model->cgrp_id; ?>"/>
<input type="hidden" name="CostCalculations[ObjectGr_id]" value="<?php echo $model->ObjectGr_id; ?>"/>
<input type="hidden" name="CostCalculations[repr_id]" value="<?php echo $model->repr_id; ?>"/>
<input type="hidden" name="CostCalculations[koef_indirect]" value="<?php echo $model->koef_indirect; ?>"/>

<div class="row">
    <div class="row-column" style="margin-top: 2px; width: 115px;">Дата: </div>
    <div class="row-column"><div id='DateCC' name="CostCalculations[date]"></div><?php echo $form->error($model, 'date'); ?></div>
</div>

<div class="row">
    <div class="row-column" style="width: 115px;">Наименование:</div> 
    <div class="row-column"><input id='group_nameCC' type="text" name="CostCalculations[name]"><?php echo $form->error($model, 'name'); ?></div>
</div>
<div class="row">
    <div class="row-column" style="margin-top: 2px; width: 115px;">Оформление: </div>
    <div class="row-column"><div id='regsCC' name="CostCalculations[regs_id]"></div><?php echo $form->error($model, 'regs_id'); ?></div>
</div>

<div class="row">
    <div class="row-column" style="margin-top: 2px; width: 115px;">Вид работ:</div>
    <div class="row-column"><div id='workCC' name="CostCalculations[ccwt_id]"></div><?php echo $form->error($model, 'ccwt_id'); ?></div>
    <div class="row-column" style="margin-top: 2px;">Вид оплаты: </div>
    <div class="row-column"><div id='PaymentTypeCC' name="CostCalculations[PaymentType_id]"></div><?php echo $form->error($model, 'PaymentType_id'); ?></div>
</div>

<div class="row">
    <div class="row-column" style="margin-top: 2px; width: 115px;">Контактное лицо:</div>
    <div class="row-column"><div id='infoCC' name="CostCalculations[info_id]"></div><?php echo $form->error($model, 'info_id'); ?></div>
</div>

<div class="row">
    <div class="row-column" style="margin-top: 2px; width: 115px;">Сотрудник:</div>
    <div class="row-column"><div id='empl_nameCC' name="CostCalculations[empl_id]"></div><?php echo $form->error($model, 'empl_id'); ?></div>
    <div class="row-column"><div id="chbGarantMailEdit" name="CostCalculations[GarantMail]">Гарантийное письмо</div></div>
</div>

<div class="row">
    <div class="row-column" style="margin-top: 2px; width: 115px;">Юр. лицо: </div><div class="row-column"><div id='jrdc_nameCC' name="CostCalculations[jrdc_id]"></div><?php echo $form->error($model, 'jrdc_id'); ?></div>
    <div class="row-column" style="margin-top: 2px;">Заявка:</div>
    <div class="row-column">
        <div id="Demand_idCC" name="CostCalculations[Demand_id]" readonly="readonly">
            <input type="text" name="CostCalculations[Demand_id]" readonly="readonly" />
            <input type="button" id="btnFindDemand" style="height: 100%; width: 25px;" value="..." />
        </div>
        <?php echo $form->error($model, 'Demand_id'); ?>
    </div>
</div>
<div class="row">
    <div class="row-column" style="margin-top: 2px; width: 115px;">№ Договора:</div>
    <div class="row-column"><input id='ContrNumCC' name="CostCalculations[ContrNumS]" /><?php echo $form->error($model, 'ContrNumS'); ?></div>
    <div class="row-column" style="margin-top: 2px;">Дата договора:</div>
    <div class="row-column"><div id='ContrDateCC' name="CostCalculations[ContrDateS]"></div><?php echo $form->error($model, 'ContrDateS'); ?></div>
</div>

<div class="row" style="margin-top: 7px;"><div class="row-column">Техническое задание: <textarea id="spec_condtCC" name="CostCalculations[spec_condt]"></textarea></div></div>
<div class="row" style="margin-top: 0;"><div class="row-column">Примечание: <textarea id="noteCC" name="CostCalculations[note]"></textarea></div></div>


<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveCostCalculations'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelCostCalculations'/></div>
</div>
<?php $this->endWidget(); ?>



<div id="FindDemandDialog" style="display: none;">
    <div id="FindDemandDialogHeader">
        <span id="FindDemandHeaderText">Поиск заявки</span>
    </div>
    <div style="padding: 10px;" id="DialogFindDemandContent">
        <div style="" id="BodyFindDemandDialog"></div>
    </div>
</div> 

