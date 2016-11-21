<script type="text/javascript">
    $(document).ready(function () {
        
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
            PaymentType: '<?php echo $model->PaymentType_id; ?>',
            Price: '<?php echo $model->Price; ?>',
            CalcSum: '<?php echo $model->CalcSum; ?>',
            PrePayment: '<?php echo $model->PrePayment; ?>',
            empl: '<?php echo $model->empl_id; ?>',
            dmnd_id: '<?php echo $model->dmnd_id; ?>',
            DateExec: Aliton.DateConvertToJs('<?php echo $model->ContrDateS; ?>'),
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

        $("#ContrNumS5").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130, value: "-Авто-" }));
        $("#ContrDateS5").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 102}));
        $("#date_doc5").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 102, value: null }));
        $("#ContrSDateStart5").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 102}));
        $("#ContrSDateEnd5").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 102}));
        $("#JuridicalPerson5").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataJuridical, displayMember: "JuridicalPerson", valueMember: "Jrdc_Id", width: 200, autoDropDownHeight: true }));
        $("#ContactType5").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataContractTypes, displayMember: "name", valueMember: "crtp_id", width: 130, autoDropDownHeight: true }));
        $("#empl5").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, displayMember: "ShortName", valueMember: "Employee_id", width: 180 }));
        
        $("#Annex5").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {}));
        $("#Debtor5").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {}));
        $("#DocNumber5").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#DocDate5").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Document.DocDate, width: 102}));
        $("#PaymentType5").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataPaymentTypes, displayMember: "PaymentTypeName", valueMember: "PaymentType_Id", width: 130, autoDropDownHeight: true }));
        
        $("#Price5").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#CalcSum5").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#PrePayment5").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#dmnd_id5").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 112 }));
        $("#DateExec5").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Document.DateExec, width: 102}));
        $("#date_act5").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Document.date_act, width: 102}));
        $("#SpecialCondition5").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 420 }));
        $("#ContactInfo5").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataContactInfo, displayMember: "FIO", valueMember: "Info_id", width:360, autoDropDownHeight: true }));
        
        $("#ExecDay5").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 65, symbol: "", symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
        $("#Garant5").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 65, symbol: "", symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
        $("#Note5").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 840 }));
        $("#NewContractBtnOk").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#NewContractBtnCancel").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $("#NewContractBtnCancel").on('click', function () {
            $('#' + Document.DialogId).jqxWindow('close');
        });
        
        
        $("#NewContractBtnOk").on('click', function () {
            var Data = $('#Documents').serialize();
            Data = Data + "&DocType_Name=" + "Счет" + "&DialogId=" + Document.DialogId + "&BodyDialogId=" + Document.BodyDialogId;
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('Documents/Insert');?>",
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    if (Res == '1' || Res == 1) {
                        $('#' + Document.DialogId).jqxWindow('close');
                        if (Document.DialogId == 'NewContractDialog') {
                            $("#ContractsGrid").jqxGrid('updatebounddata');
                            $("#ContractsGrid").jqxGrid('selectrow', 0);
                        }
                        if (Document.DialogId == 'CostCalculationsDialog')
                            $('#RefreshCostCalcDocuments').click();
                        
                    } else {
                        $('#' + Document.BodyDialogId).html(Res);
                    }
                }
            });
        });
        
        if (Document.ContrNumS != '') $("#ContrNumS5").jqxInput('val', Document.ContrNumS);
        if (Document.ContrDateS !== null) $("#ContrDateS5").jqxDateTimeInput('val', Document.ContrDateS);
        if (Document.JuridicalPerson != '') $("#JuridicalPerson5").jqxComboBox('val', Document.JuridicalPerson);
        if (Document.date_doc != '') $("#date_doc5").jqxDateTimeInput('val', Document.date_doc);
        if (Document.ContrSDateStart !== null) $("#ContrSDateStart5").jqxDateTimeInput('val', Document.ContrSDateStart);
        if (Document.ContrSDateEnd !== null) $("#ContrSDateEnd5").jqxDateTimeInput('val', Document.ContrSDateEnd);
        
        if (Document.ContactType != '') $("#ContactType5").jqxComboBox('val', Document.ContactType);
        if (Document.empl != '') $("#empl5").jqxComboBox('val', Document.empl);
        if (Document.Annex != '') $("#Annex5").jqxCheckBox({checked: Boolean(Number(Document.Annex))});
        if (Document.Debtor != '') $("#Debtor5").jqxCheckBox({checked: Boolean(Number(Document.Debtor))});
        if (Document.DocNumber != '') $("#DocNumber5").jqxInput('val', Document.DocNumber);
        if (Document.PaymentType != '') $("#PaymentType5").jqxComboBox('val', Document.PaymentType);
        if (Document.Price != '') $("#Price5").jqxNumberInput('val', Document.Price);
        if (Document.CalcSum != '') $("#CalcSum5").jqxNumberInput('val', Document.CalcSum);
        if (Document.PrePayment != '') $("#PrePayment5").jqxNumberInput('val', Document.PrePayment);
        if (Document.dmnd_id != '') $("#dmnd_id5").jqxInput('val', Document.dmnd_id);
        if (Document.SpecialCondition != '') $("#SpecialCondition5").jqxTextArea('val', Document.SpecialCondition);
        if (Document.ContactInfo != '') $("#ContactInfo5").jqxComboBox('val', Document.ContactInfo);
        if (Document.ExecDay != '') $("#ExecDay5").jqxNumberInput('val', Document.ExecDay);
        if (Document.Garant != '') $("#Garant5").jqxNumberInput('val', Document.Garant);
        if (Document.Note != '') $("#Note5").jqxTextArea('val', Document.Note);
        
       
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
    <div class="row-column">Номер: <input id="ContrNumS5" name="Documents[ContrNumS]" type="text"></div>
    <div class="row-column" style="padding-top: 3px;">Дата: </div><div class="row-column"><div id="ContrDateS5"  name="Documents[ContrDateS]" type="text"></div></div>
    <div class="row-column" style="padding-top: 3px;">Дата прихода оригинала документа: </div><div class="row-column"><div id="date_doc5" name="Documents[date_doc]" type="text"></div></div>
</div>

<div class="row">
    <div class="row-column" style="padding-top: 3px;">Срок действия с: </div><div class="row-column"><div id="ContrSDateStart5" name="Documents[ContrSDateStart]" type="text"></div></div>
    <div class="row-column" style="padding-top: 3px;">по: </div><div class="row-column"><div id="ContrSDateEnd5" name="Documents[ContrSDateEnd]" type="text"></div></div>
    <div class="row-column" style="padding-top: 3px;">Приложение: </div><div class="row-column"><div id="Annex5" name="Documents[Annex]" type="checkbox"></div></div>
    <div class="row-column" style="padding-top: 3px;">Долг: </div><div class="row-column"><div id="Debtor5" name="Documents[Debtor]" type="checkbox"></div></div>
</div>

<div class="row">
    <div class="row-column">Юр. лицо: </div><div class="row-column"><div id="JuridicalPerson5" name="Documents[Jrdc_id]" type="text"></div></div>
    <div class="row-column">Тип контракта: </div><div class="row-column"><div id="ContactType5" name="Documents[crtp_id]" type="text"></div></div>
    <div class="row-column">Менеджер: </div><div class="row-column"><div id="empl5" name="Documents[empl_id]" type="text"></div></div>
</div>

<div class="row">
    <div class="row-column">Номер договора: <input id="DocNumber5" name="Documents[DocNumber]" type="text"></div>
    <div class="row-column" style="padding-top: 3px;">Дата договора: </div><div class="row-column"><div id="DocDate5" name="Documents[DocDate]"></div></div>
    <div class="row-column">Вид оплаты: </div><div class="row-column"><div id="PaymentType5" name="Documents[PaymentType_id]" type="text"></div></div>
</div>

<div class="row">
    <div class="row-column">Сумма начислений: </div><div class="row-column"><div id="Price5" name="Documents[Price]" type="text"></div></div>
    <div class="row-column">Предварительная сумма: </div><div class="row-column"><div id="CalcSum5" name="Documents[CalcSum]" type="text"></div></div>
    <div class="row-column">Аванс: </div><div class="row-column"><div id="PrePayment5" name="Documents[PrePayment]" type="text"></div></div>
</div>

<div class="row" style="padding: 0 10px 10px 10px; width: 815px; border: 1px solid #ddd; background-color: #eee;">
    <div style="overflow: hidden;">
        <div class="row-column" style="margin: 0 0 10px 0; width: 100%; font-weight: 500;">Выполненные работы</div>
        <div class="row-column">Заявка: <input id="dmnd_id5" name="Documents[dmnd_id]" type="text"></div>
        <div class="row-column" style="padding-top: 3px;">Дата выполнения работ: </div><div class="row-column"><div id="DateExec5" name="Documents[DateExec]"></div></div>
        <div class="row-column" style="padding-top: 3px;">Дата прихода оригинала акта: </div><div class="row-column"><div id="date_act5" name="Documents[date_act]"></div></div>
        <div class="row-column" style="padding-top: 10px;">Перечень работ: <textarea id="SpecialCondition5" name="Documents[SpecialCondition]"></textarea></div>

        <div class="row-column" style="padding-top: 10px;">Контактное лицо: <div id="ContactInfo5" name="Documents[Info]" type="text"></div></div>

        <div class="row-column" style="padding-top: 18px; ">
            <div class="row-column">Срок: </div><div class="row-column"><div id="ExecDay5" name="Documents[ExecDay]" type="text"></div></div>
            <div class="row-column">Гарантия: </div><div class="row-column"><div id="Garant5" name="Documents[Garant]" type="text"></div></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="row-column">Примечание: <textarea id="Note5" name="Documents[Note]"></textarea></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='NewContractBtnOk' /></div>
    <div style="float: right; margin-right: 10px;" class="row-column"><input type="button" value="Отменить" id='NewContractBtnCancel' /></div>
</div>

<?php $this->endWidget(); ?>