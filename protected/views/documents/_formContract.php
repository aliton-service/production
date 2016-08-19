<script type="text/javascript">
    $(document).ready(function () {
        
        var Document = {
            ContrS_id: '<?php echo $model->ContrS_id; ?>',
            ContrNumS: '<?php echo $model->ContrNumS; ?>',
            ObjectGr_id: '<?php echo $model->ObjectGr_id; ?>',
            JuridicalPerson: '<?php echo $model->Jrdc_id; ?>',
            ContrDateS: Aliton.DateConvertToJs('<?php echo $model->ContrDateS; ?>'),
            DateExecuting: Aliton.DateConvertToJs('<?php echo $model->DateExecuting; ?>'),
            DatePay: Aliton.DateConvertToJs('<?php echo $model->DatePay; ?>'),
            date_doc: Aliton.DateConvertToJs('<?php echo $model->date_doc; ?>'),
            ContactType: '<?php echo $model->crtp_id; ?>',
            Prolong: <?php echo json_encode($model->Prolong); ?>,
            Debtor: <?php echo json_encode($model->Debtor); ?>,
            PaymentType: '<?php echo $model->PaymentType_id; ?>',
            PaymentPeriod: '<?php echo $model->PaymentPeriod_id; ?>',
            Price: '<?php echo $model->Price; ?>',
            empl: '<?php echo $model->empl_id; ?>',
            SpecialCondition: <?php echo json_encode($model->SpecialCondition); ?>,
            Note: <?php echo json_encode($model->Note); ?>,
            ContrSDateStart: '<?php echo $model->ContrSDateStart; ?>',
            ContrSDateEnd: '<?php echo $model->ContrSDateEnd; ?>',
            PriceMonth: '<?php echo $model->PriceMonth; ?>',
            Master: '<?php echo $model->Master; ?>',
            ServiceType: '<?php echo $model->ServiceType_id; ?>',
        };
            
        var DataJuridical3 = new $.jqx.dataAdapter(Sources.SourceJuridicalsMin);
        var DataContractTypes3 = new $.jqx.dataAdapter(Sources.SourceContractTypes);
        var DataEmployees3 = new $.jqx.dataAdapter(Sources.SourceListEmployees);
        var DataPaymentTypes3 = new $.jqx.dataAdapter(Sources.SourcePaymentTypes);
        var DataPaymentPeriods3 = new $.jqx.dataAdapter(Sources.SourcePaymentPeriods);
        var DataServiceTypes = new $.jqx.dataAdapter(Sources.SourceServiceTypes);
        

        $("#ContrNumS").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#ContrDateS3").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 102, value: null}));
        $("#DateExecuting3").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 102, value: null }));
        $("#DatePay3").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 102, value: null }));
        $("#date_doc2").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 102, value: null }));
        $("#ContrSDateStart3").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 102, value: null }));
        $("#ContrSDateEnd3").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 102, value: null }));
        $("#JuridicalPerson2").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataJuridical3, displayMember: "JuridicalPerson", valueMember: "Jrdc_Id", width: 200, autoDropDownHeight: true }));
        $("#ContactType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataContractTypes3, displayMember: "name", valueMember: "crtp_id", width: 130, autoDropDownHeight: true }));
        $("#empl").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees3, displayMember: "ShortName", valueMember: "Employee_id", width: 180 }));
        $("#Prolong3").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {}));
        $("#Debtor2").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {}));
        $("#PaymentType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataPaymentTypes3, displayMember: "PaymentTypeName", valueMember: "PaymentType_Id", width: 130, autoDropDownHeight: true }));
        $("#PaymentPeriod").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataPaymentPeriods3, displayMember: "PaymentName", valueMember: "PaymentPeriod_Id", width: 130, autoDropDownHeight: true }));
        $("#Master").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees3, displayMember: "ShortName", valueMember: "Employee_id", width: 180 }));
        $("#ServiceType3").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataServiceTypes, displayMember: "ServiceType", valueMember: "ServiceType_id", width: 320 }));
        
        $("#Price2").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#SpecialCondition3").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 420 }));
        
        $("#Note2").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 830 }));
        $("#PriceMonth3").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, symbol: "", symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        
        if (Document.ContrNumS != '') $("#ContrNumS").jqxInput('val', Document.ContrNumS);
        if (Document.JuridicalPerson != '') $("#JuridicalPerson2").jqxComboBox('val', Document.JuridicalPerson);
        if (Document.ContrDateS != '') $("#ContrDateS3").jqxDateTimeInput('val', Document.ContrDateS);
        if (Document.ContrSDateStart != '') $("#ContrSDateStart3").jqxDateTimeInput('val', Document.ContrSDateStart);
        if (Document.ContrSDateEnd != '') $("#ContrSDateEnd3").jqxDateTimeInput('val', Document.ContrSDateEnd);
        
        if (Document.DateExecuting != '') $("#DateExecuting3").jqxDateTimeInput('val', Document.DateExecuting);
        if (Document.DatePay != '') $("#DatePay3").jqxDateTimeInput('val', Document.DatePay);
        if (Document.date_doc != '') $("#date_doc2").jqxDateTimeInput('val', Document.date_doc);
        
        if (Document.ContactType != '') $("#ContactType").jqxComboBox('val', Document.ContactType);
        if (Document.empl != '') $("#empl").jqxComboBox('val', Document.empl);
        if (Document.Master != '') $("#Master").jqxComboBox('val', Document.Master);
        if (Document.ServiceType != '') $("#ServiceType3").jqxComboBox('val', Document.ServiceType);
        
        if (Document.Prolong != '') $("#Prolong3").jqxCheckBox({checked: Boolean(Number(Document.Prolong))});
        if (Document.Debtor != '') $("#Debtor2").jqxCheckBox({checked: Boolean(Number(Document.Debtor))});
        if (Document.PaymentType != '') $("#PaymentType").jqxComboBox('val', Document.PaymentType);
        if (Document.PaymentPeriod != '') $("#PaymentPeriod").jqxComboBox('val', Document.PaymentPeriod);
        if (Document.Price != '') $("#Price2").jqxNumberInput('val', Document.Price);
        if (Document.SpecialCondition != '') $("#SpecialCondition3").jqxTextArea('val', Document.SpecialCondition);
        if (Document.Note != '') $("#Note2").jqxTextArea('val', Document.Note);
        if (Document.PriceMonth != '') $("#PriceMonth3").jqxNumberInput('val', Document.PriceMonth);
       
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

<div class="row">
    <div class="row-column">Номер: <input id="ContrNumS" name="Documents[ContrNumS]" type="text"></div>
    <div class="row-column" style="padding-top: 3px;">Дата: </div><div class="row-column"><div id="ContrDateS3"  name="Documents[ContrDateS]"></div></div>
    <div class="row-column" style="padding-top: 3px;">Дата проводки через ВЦКП: </div><div class="row-column"><div id="DateExecuting3" name="Documents[DateExecuting]"></div></div>
</div>

<div class="row">
    <div class="row-column" style="padding-top: 3px;">Срок действия с: </div><div class="row-column"><div id="ContrSDateStart3" name="Documents[ContrSDateStart]"></div></div>
    <div class="row-column" style="padding-top: 3px;">по: </div><div class="row-column"><div id="ContrSDateEnd3" name="Documents[ContrSDateEnd]"></div></div>
    <div class="row-column" style="padding-top: 3px;">Приложение: </div><div class="row-column"><div id="Prolong3" name="Documents[Prolong]" type="checkbox"></div></div>
    <div class="row-column" style="padding-top: 3px;">Долг: </div><div class="row-column"><div id="Debtor2" name="Documents[Debtor]" type="checkbox"></div></div>
</div>

<div class="row">
    <div class="row-column">Юр. лицо: </div><div class="row-column"><div id="JuridicalPerson2" name="Documents[Jrdc_id]"></div></div>
    <div class="row-column">Тип контракта: </div><div class="row-column"><div id="ContactType" name="Documents[crtp_id]"></div></div>
</div>

<div class="row">
    <div class="row-column">Периодичность оплаты: </div><div class="row-column"><div id="PaymentPeriod" name="Documents[PaymentPeriod_id]"></div></div>
    <div class="row-column">Вид оплаты: </div><div class="row-column"><div id="PaymentType" name="Documents[PaymentType_id]"></div></div>
</div>

<div class="row">
    <div class="row-column">Ежемесячные начисления: </div><div class="row-column"><div id="PriceMonth3" name="Documents[PriceMonth]"></div></div>
    <div class="row-column">Расценка: </div><div class="row-column"><div id="Price2" name="Documents[Price]"></div></div>
    <div class="row-column" style="padding-top: 3px;">Оплачено по: </div><div class="row-column"><div id="DatePay3" name="Documents[DatePay]"></div></div>
</div>

<div class="row">
    <div class="row-column">Мастер: </div><div class="row-column"><div id="Master" name="Documents[Master]"></div></div>
    <div class="row-column">Тариф: </div><div class="row-column"><div id="ServiceType3" name="Documents[ServiceType_id]"></div></div>
</div>

<div class="row">
    <div class="row-column" style="padding-top: 3px;">Дата прихода оригинала документа: </div><div class="row-column"><div id="date_doc2" name="Documents[date_doc]"></div></div>
    <div class="row-column">Менеджер: </div><div class="row-column"><div id="empl" name="Documents[empl_id]"></div></div>
</div>

<div class="row">
    <div class="row-column" style="padding-top: 10px;">Особые договоренности: <textarea id="SpecialCondition3" name="Documents[SpecialCondition]"></textarea></div>
</div>

<div class="row">
    <div class="row-column">Примечание: <textarea id="Note2" name="Documents[Note]"></textarea></div>
</div>

<?php $this->endWidget(); ?>