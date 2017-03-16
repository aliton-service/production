<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Insert') echo 'true'; else echo 'false'; ?>;
        
        var Document = {
            ContrS_id: '<?php echo $model->ContrS_id; ?>',
            ContrNumS: '<?php echo $model->ContrNumS; ?>',
            ObjectGr_id: '<?php echo $model->ObjectGr_id; ?>',
            JuridicalPerson: '<?php echo $model->Jrdc_id; ?>',
            ContrDateS: Aliton.DateConvertToJs('<?php echo $model->ContrDateS; ?>'),
            date_doc: Aliton.DateConvertToJs('<?php echo $model->date_doc; ?>'),
            ContactType: '<?php echo $model->crtp_id; ?>',
            Annex: <?php echo json_encode($model->Annex); ?>,
            Debtor: <?php echo json_encode($model->Debtor); ?>,
            DocNumber: '<?php echo $model->DocNumber; ?>',
            DocDate: Aliton.DateConvertToJs('<?php echo $model->DocDate; ?>'),
            PaymentType: <?php echo json_encode($model->PaymentType_id); ?>,
            Price: '<?php echo $model->Price; ?>',
            CalcSum: '<?php echo $model->CalcSum; ?>',
            PrePayment: '<?php echo $model->PrePayment; ?>',
            empl: '<?php echo $model->empl_id; ?>',
            dmnd_id: '<?php echo $model->dmnd_id; ?>',
            DateExec: Aliton.DateConvertToJs('<?php echo $model->DateExec; ?>'),
            date_act: Aliton.DateConvertToJs('<?php echo $model->date_act; ?>'),
            SpecialCondition: <?php echo json_encode($model->SpecialCondition); ?>,
            ContactInfo: '<?php echo $model->Info; ?>',
            ExecDay: '<?php echo $model->ExecDay; ?>',
            Garant: '<?php echo $model->Garant; ?>',
            Note: <?php echo json_encode($model->Note); ?>,
            ContrSDateStart: Aliton.DateConvertToJs('<?php echo $model->ContrSDateStart; ?>'),
            ContrSDateEnd: Aliton.DateConvertToJs('<?php echo $model->ContrSDateEnd; ?>'),
            DialogId: <?php echo json_encode($DialogId); ?>,
            BodyDialogId: <?php echo json_encode($BodyDialogId); ?>,
        };

        if (Document.DialogId == '' || Document.DialogId == null) {
            Document.DialogId = 'NewContractDialog';
            Document.BodyDialogId = 'NewContractBodyDialog';
        }
            
        var DataJuridical = new $.jqx.dataAdapter(Sources.SourceJuridicalsMin);
        var DataContractTypes = new $.jqx.dataAdapter(Sources.SourceContractTypes);
        var DataEmployees = new $.jqx.dataAdapter(Sources.SourceListEmployees);
        var DataPaymentTypes = new $.jqx.dataAdapter(Sources.SourcePaymentTypes);
        var DataContactInfo = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContactInfo, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["ci.ObjectGr_id = " + Document.ObjectGr_id],
                });
                return data;
            },
        });

        $("#ContrNumS4").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130, value: "-Авто-" }));
        $("#ContrDateS4").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 102}));
        $("#date_doc4").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 102, value: null }));
        $("#ContrSDateStart4").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 102}));
        $("#ContrSDateEnd4").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 102}));
        $("#JuridicalPerson4").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataJuridical, displayMember: "JuridicalPerson", valueMember: "Jrdc_Id", width: 200, autoDropDownHeight: true }));
        $("#ContactType4").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataContractTypes, displayMember: "name", valueMember: "crtp_id", width: 130, autoDropDownHeight: true }));
        $("#empl4").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, displayMember: "ShortName", valueMember: "Employee_id", width: 180 }));
        
        $("#Annex4").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {}));
        $("#Debtor4").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {}));
        $("#DocNumber4").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#DocDate4").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Document.DocDate, width: 102}));
        $("#PaymentType4").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataPaymentTypes, displayMember: "PaymentTypeName", valueMember: "PaymentType_Id", width: 130, autoDropDownHeight: true }));
        
        $("#Price4").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, symbolPosition: 'right', min: 0, decimalDigits: 2 }));
        $("#CalcSum4").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, symbolPosition: 'right', min: 0, decimalDigits: 2 }));
        $("#PrePayment4").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, symbolPosition: 'right', min: 0, decimalDigits: 2 }));
        $("#dmnd_id4").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 112 }));
        $("#DateExec4").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Document.DateExec, width: 102}));
        $("#date_act4").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Document.date_act, width: 102}));
        $("#SpecialCondition4").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 420 }));
        $("#ContactInfo4").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataContactInfo, displayMember: "FIO", valueMember: "Info_id", width:360, autoDropDownHeight: true }));
        
        $("#ExecDay4").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 65, symbol: "", symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
        $("#Garant4").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 65, symbol: "", symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
        $("#Note4").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 830 }));
        $("#NewContractBtnOk").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#NewContractBtnCancel").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $("#NewContractBtnCancel").on('click', function () {
            $('#' + Document.DialogId).jqxWindow('close');
        });
        
        
        $("#NewContractBtnOk").on('click', function () {
            var Url = <?php echo json_encode(Yii::app()->createUrl('Documents/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('Documents/Insert')); ?>;
            var Data = $('#Documents').serialize();
            Data = Data + "&DocType_Name=" + "Счет" + "&DialogId=" + Document.DialogId + "&BodyDialogId=" + Document.BodyDialogId;
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    if (Res == '1' || Res == 1) {
                        $('#' + Document.DialogId).jqxWindow('close');
                        if (Document.DialogId == 'NewContractDialog') {
                            if (StateInsert) {
                                $("#ContractsGrid").jqxGrid('updatebounddata');
                                $("#ContractsGrid").jqxGrid('selectrow', 0);
                            } else {
                                location.reload();
                            }
                        }
                        if (Document.DialogId == 'CostCalculationsDialog')
                            $('#RefreshCostCalcDocuments').click();
                        
                    } else {
                        $('#' + Document.BodyDialogId).html(Res);
                    }
                }
            });
        });
        
        if (Document.ContrNumS != '') $("#ContrNumS4").jqxInput('val', Document.ContrNumS);
        if (Document.ContrDateS !== null) $("#ContrDateS4").jqxDateTimeInput('val', Document.ContrDateS);
        if (Document.JuridicalPerson != '') $("#JuridicalPerson4").jqxComboBox('val', Document.JuridicalPerson);
        if (Document.date_doc != '') $("#date_doc4").jqxDateTimeInput('val', Document.date_doc);
        if (Document.ContrSDateStart !== null) $("#ContrSDateStart4").jqxDateTimeInput('val', Document.ContrSDateStart);
        if (Document.ContrSDateEnd !== null) $("#ContrSDateEnd4").jqxDateTimeInput('val', Document.ContrSDateEnd);
        if (Document.ContactType != '') $("#ContactType4").jqxComboBox('val', Document.ContactType);
        if (Document.empl != '') $("#empl4").jqxComboBox('val', Document.empl);
        if (Document.Annex != '') $("#Annex4").jqxCheckBox({checked: Boolean(Number(Document.Annex))});
        if (Document.Debtor != '') $("#Debtor4").jqxCheckBox({checked: Boolean(Number(Document.Debtor))});
        if (Document.DocNumber != '') $("#DocNumber4").jqxInput('val', Document.DocNumber);
        if (Document.PaymentType != '') $("#PaymentType4").jqxComboBox('val', Document.PaymentType);
        if (Document.Price != '') $("#Price4").jqxNumberInput('val', Document.Price);
        if (Document.CalcSum != '') $("#CalcSum4").jqxNumberInput('val', Document.CalcSum);
        if (Document.PrePayment != '') $("#PrePayment4").jqxNumberInput('val', Document.PrePayment);
        if (Document.dmnd_id != '') $("#dmnd_id4").jqxInput('val', Document.dmnd_id);
        if (Document.SpecialCondition != '') $("#SpecialCondition4").jqxTextArea('val', Document.SpecialCondition);
        if (Document.ContactInfo != '') $("#ContactInfo4").jqxComboBox('val', Document.ContactInfo);
        if (Document.ExecDay != '') $("#ExecDay4").jqxNumberInput('val', Document.ExecDay);
        if (Document.Garant != '') $("#Garant4").jqxNumberInput('val', Document.Garant);
        if (Document.Note != '') $("#Note4").jqxTextArea('val', Document.Note);
        
       
    });
    
        
</script>

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'Documents',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<input type="hidden" name="Documents[ContrS_id]" value="<?php echo $model->ContrS_id; ?>">
<input type="hidden" name="Documents[ObjectGr_id]" value="<?php echo $model->ObjectGr_id; ?>">
<input type="hidden" name="Documents[DocType_id]" value="<?php echo $model->DocType_id; ?>">
<input type="hidden" name="Documents[Calc_id]" value="<?php echo $model->Calc_id; ?>">

<div class="row">
    <div class="row-column">Номер: <input id="ContrNumS4" name="Documents[ContrNumS]" type="text"><?php echo $form->error($model, 'ContrNumS'); ?></div>
    <div class="row-column" style="padding-top: 3px;">Дата: </div><div class="row-column"><div id="ContrDateS4"  name="Documents[ContrDateS]" type="text"></div><?php echo $form->error($model, 'ContrDateS'); ?></div>
    <div class="row-column" style="padding-top: 3px;">Дата выполнения работ по акту: </div><div class="row-column"><div id="date_doc4" name="Documents[date_doc]" type="text"></div><?php echo $form->error($model, 'date_doc'); ?></div>
</div>

<div class="row">
    <div class="row-column" style="padding-top: 3px;">Срок действия с: </div><div class="row-column"><div id="ContrSDateStart4" name="Documents[ContrSDateStart]" type="text"></div><?php echo $form->error($model, 'ContrSDateStart'); ?></div>
    <div class="row-column" style="padding-top: 3px;">по: </div><div class="row-column"><div id="ContrSDateEnd4" name="Documents[ContrSDateEnd]" type="text"></div><?php echo $form->error($model, 'ContrSDateEnd'); ?></div>
    <div class="row-column" style="padding-top: 3px;">Приложение: </div><div class="row-column"><div id="Annex4" name="Documents[Annex]" type="checkbox"></div><?php echo $form->error($model, 'Annex'); ?></div>
    <div class="row-column" style="padding-top: 3px;">Долг: </div><div class="row-column"><div id="Debtor4" name="Documents[Debtor]" type="checkbox"></div><?php echo $form->error($model, 'Debtor'); ?></div>
</div>

<div class="row">
    <div class="row-column">
        <div class="row-column">Юр. лицо: </div>
        <div class="row-column"><div id="JuridicalPerson4" name="Documents[Jrdc_id]" type="text"></div></div><?php echo $form->error($model, 'Jrdc_id'); ?>
    </div>
    <div class="row-column">
        <div class="row-column">Тип контракта: </div>
        <div class="row-column"><div id="ContactType4" name="Documents[crtp_id]" type="text"></div></div><?php echo $form->error($model, 'crtp_id'); ?>
    </div>
    <div class="row-column">
        <div class="row-column">Менеджер: </div>
        <div class="row-column"><div id="empl4" name="Documents[empl_id]" type="text"></div></div><?php echo $form->error($model, 'empl_id'); ?>
    </div>
</div>

<div class="row">
    <div class="row-column">Номер договора: <input id="DocNumber4" name="Documents[DocNumber]" type="text"><?php echo $form->error($model, 'DocNumber'); ?></div>
    <div class="row-column" style="padding-top: 3px;">Дата договора: </div><div class="row-column"><div id="DocDate4" name="Documents[DocDate]"></div><?php echo $form->error($model, 'DocDate'); ?></div>
    <div class="row-column">Вид оплаты: </div><div class="row-column"><div id="PaymentType4" name="Documents[PaymentType_id]" type="text"></div><?php echo $form->error($model, 'PaymentType_id'); ?></div>
</div>

<div class="row">
    <div class="row-column">Сумма начислений: </div><div class="row-column"><div id="Price4" name="Documents[Price]" type="text"></div><?php echo $form->error($model, 'Price'); ?></div>
    <div class="row-column">Предварительная сумма: </div><div class="row-column"><div id="CalcSum4" name="Documents[CalcSum]" type="text"></div><?php echo $form->error($model, 'CalcSum'); ?></div>
    <div class="row-column">Аванс: </div><div class="row-column"><div id="PrePayment4" name="Documents[PrePayment]" type="text"></div><?php echo $form->error($model, 'PrePayment'); ?></div>
</div>

<div class="row" style="padding: 0 10px 10px 10px; width: 815px; border: 1px solid #ddd; background-color: #eee;">
    <div style="overflow: hidden;">
        <div class="row-column" style="margin: 0 0 10px 0; width: 100%; font-weight: 500;">Выполненные работы</div>
        <div class="row-column">Заявка: <input id="dmnd_id4" name="Documents[dmnd_id]" type="text"><?php echo $form->error($model, 'dmnd_id'); ?></div>
        <div class="row-column" style="padding-top: 3px;">Дата выполнения работ: </div><div class="row-column"><div id="DateExec4" name="Documents[DateExec]"></div><?php echo $form->error($model, 'DateExec'); ?></div>
        <div class="row-column" style="padding-top: 3px;">Дата прихода оригинала акта: </div><div class="row-column"><div id="date_act4" name="Documents[date_act]"></div><?php echo $form->error($model, 'date_act'); ?></div>
        <div class="row-column" style="padding-top: 10px;">Перечень работ: <textarea id="SpecialCondition4" name="Documents[SpecialCondition]"></textarea><?php echo $form->error($model, 'SpecialCondition'); ?></div>

        <div class="row-column" style="padding-top: 10px;">Контактное лицо: <div id="ContactInfo4" name="Documents[Info]" type="text"></div><?php echo $form->error($model, 'Info'); ?></div>

        <div class="row-column" style="padding-top: 18px; ">
            <div class="row-column">Срок: </div><div class="row-column"><div id="ExecDay4" name="Documents[ExecDay]" type="text"></div><?php echo $form->error($model, 'ExecDay'); ?></div>
            <div class="row-column">Гарантия: </div><div class="row-column"><div id="Garant4" name="Documents[Garant]" type="text"></div><?php echo $form->error($model, 'Garant'); ?></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="row-column">Примечание: <textarea id="Note4" name="Documents[Note]"></textarea><?php echo $form->error($model, 'Note'); ?></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='NewContractBtnOk' /></div>
    <div style="float: right; margin-right: 20px;" class="row-column"><input type="button" value="Отменить" id='NewContractBtnCancel' /></div>
</div>

<?php $this->endWidget(); ?>