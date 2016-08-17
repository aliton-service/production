<script type="text/javascript">
    $(document).ready(function () {
        
        var Document = {
            ContrS_id: '<?php echo $model->ContrS_id; ?>',
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
            ContrSDateStart: '<?php echo $model->ContrSDateStart; ?>',
            ContrSDateEnd: '<?php echo $model->ContrSDateEnd; ?>',
        };
            
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

        $("#ContrS_id2").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#ContrDateS2").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Document.ContrDateS, width: 102}));
        $("#date_doc2").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Document.date_doc, width: 102}));
        $("#ContrSDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Document.ContrSDateStart, width: 102}));
        $("#ContrSDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Document.ContrSDateEnd, width: 102}));
        $("#JuridicalPerson2").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataJuridical, displayMember: "JuridicalPerson", valueMember: "Jrdc_Id", width: 200, autoDropDownHeight: true }));
        $("#ContactType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataContractTypes, displayMember: "name", valueMember: "crtp_id", width: 130, autoDropDownHeight: true }));
        $("#empl").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, displayMember: "ShortName", valueMember: "Employee_id", width: 180 }));
        
        $("#Annex2").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {}));
        $("#Debtor2").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {}));
        $("#DocNumber2").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#DocDate2").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Document.DocDate, width: 102}));
        $("#PaymentType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataPaymentTypes, displayMember: "PaymentTypeName", valueMember: "PaymentType_Id", width: 130, autoDropDownHeight: true }));
        
        $("#Price2").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#CalcSum2").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#PrePayment2").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#dmnd_id2").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 112 }));
        $("#DateExec2").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Document.DateExec, width: 102}));
        $("#date_act2").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Document.date_act, width: 102}));
        $("#SpecialCondition2").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 420 }));
        $("#ContactInfo").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataContactInfo, displayMember: "FIO", valueMember: "Info_id", width:360, autoDropDownHeight: true }));
        
        $("#ExecDay2").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 65, symbol: "", symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
        $("#Garant2").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 65, symbol: "", symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
        $("#Note2").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 830 }));
        
        
        if (Document.ContrS_id != '') $("#ContrS_id2").jqxInput('val', Document.ContrS_id);
        if (Document.JuridicalPerson != '') $("#JuridicalPerson2").jqxComboBox('val', Document.JuridicalPerson);
        if (Document.ContactType != '') $("#ContactType").jqxComboBox('val', Document.ContactType);
        if (Document.empl != '') $("#empl").jqxComboBox('val', Document.empl);
        if (Document.Annex != '') $("#Annex2").jqxCheckBox({checked: Boolean(Number(Document.Annex))});
        if (Document.Debtor != '') $("#Debtor2").jqxCheckBox({checked: Boolean(Number(Document.Debtor))});
        if (Document.DocNumber != '') $("#DocNumber2").jqxInput('val', Document.DocNumber);
        if (Document.PaymentType != '') $("#PaymentType").jqxComboBox('val', Document.PaymentType);
        if (Document.Price != '') $("#Price2").jqxNumberInput('val', Document.Price);
        if (Document.CalcSum != '') $("#CalcSum2").jqxNumberInput('val', Document.CalcSum);
        if (Document.PrePayment != '') $("#PrePayment2").jqxNumberInput('val', Document.PrePayment);
        if (Document.dmnd_id != '') $("#dmnd_id2").jqxInput('val', Document.dmnd_id);
        if (Document.SpecialCondition != '') $("#SpecialCondition2").jqxTextArea('val', Document.SpecialCondition);
        if (Document.ContactInfo != '') $("#ContactInfo").jqxComboBox('val', Document.ContactInfo);
        if (Document.ExecDay != '') $("#ExecDay2").jqxNumberInput('val', Document.ExecDay);
        if (Document.Garant != '') $("#Garant2").jqxNumberInput('val', Document.Garant);
        if (Document.Note != '') $("#Note2").jqxTextArea('val', Document.Note);
        
       
                
        $("#EditDocument").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#СonfirmDocument").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
    });
    
        
</script>


<div style="background-color: #F2F2F2;">
    <div class="row">
        <div class="row-column">Номер: <input id="ContrS_id2" type="text"></div>
        <div class="row-column" style="padding-top: 3px;">Дата: </div><div class="row-column"><div id="ContrDateS2" type="text"></div></div>
        <div class="row-column" style="padding-top: 3px;">Дата выполнения работ по акту: </div><div class="row-column"><div id="date_doc2" type="text"></div></div>
    </div>
    
    <div class="row">
        <div class="row-column" style="padding-top: 3px;">Срок действия с: </div><div class="row-column"><div id="ContrSDateStart" type="text"></div></div>
        <div class="row-column" style="padding-top: 3px;">по: </div><div class="row-column"><div id="ContrSDateEnd" type="text"></div></div>
        <div class="row-column" style="padding-top: 3px;">Приложение: </div><div class="row-column"><div id="Annex2" type="checkbox"></div></div>
        <div class="row-column" style="padding-top: 3px;">Долг: </div><div class="row-column"><div id="Debtor2" type="checkbox"></div></div>
    </div>

    <div class="row">
        <div class="row-column">Юр. лицо: </div><div class="row-column"><div id="JuridicalPerson2" type="text"></div></div>
        <div class="row-column">Тип контракта: </div><div class="row-column"><div id="ContactType" type="text"></div></div>
        <div class="row-column">Менеджер: </div><div class="row-column"><div id="empl" type="text"></div></div>
    </div>
    
    <div class="row">
        <div class="row-column">Номер договора: <input id="DocNumber2" type="text"></div>
        <div class="row-column" style="padding-top: 3px;">Дата договора: </div><div class="row-column"><div id="DocDate2"></div></div>
        <div class="row-column">Вид оплаты: </div><div class="row-column"><div id="PaymentType" type="text"></div></div>
    </div>
    
    <div class="row">
        <div class="row-column">Сумма начисления: </div><div class="row-column"><div id="Price2" type="text"></div></div>
        <div class="row-column">Предварительная сумма: </div><div class="row-column"><div id="CalcSum2" type="text"></div></div>
        <div class="row-column">Аванс: </div><div class="row-column"><div id="PrePayment2" type="text"></div></div>
    </div>
    
    <div class="row" style="padding: 0 10px 10px 10px; width: 815px; border: 1px solid #ddd; background-color: #eee;">
        <div style="overflow: hidden;">
            <div class="row-column" style="margin: 0 0 10px 0; width: 100%; font-weight: 500;">Выполненные работы</div>
            <div class="row-column">Заявка: <input id="dmnd_id2" type="text"></div>
            <div class="row-column" style="padding-top: 3px;">Дата выполнения работ: </div><div class="row-column"><div id="DateExec2"></div></div>
            <div class="row-column" style="padding-top: 3px;">Дата прихода оригинала акта: </div><div class="row-column"><div id="date_act2"></div></div>
            <div class="row-column" style="padding-top: 10px;">Перечень работ: <textarea id="SpecialCondition2" ></textarea></div>
       
            <div class="row-column" style="padding-top: 10px;">Контактное лицо: <div id="ContactInfo" type="text"></div></div>
            
            <div class="row-column" style="padding-top: 18px; ">
                <div class="row-column">Срок: </div><div class="row-column"><div id="ExecDay2" type="text"></div></div>
                <div class="row-column">Гарантия: </div><div class="row-column"><div id="Garant2" type="text"></div></div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="row-column">Примечание: <textarea id="Note2" ></textarea></div>
    </div>

    <div class="row">
        <div class="row-column"><input type="button" value="Изменить" id='EditDocument' /></div>
        
        <div class="row-column"><input type="button" value="Утвердить" id='СonfirmDocument' /></div>
    </div>
</div>
