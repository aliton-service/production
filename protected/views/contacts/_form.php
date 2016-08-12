<script type="text/javascript">
        $(document).ready(function () {
            var Contact = {
                ObjectGr_id: <?php echo $model->ObjectGr_id; ?>,
                cont_id: '<?php echo $model->cont_id; ?>',
                Kind: '<?php echo $model->Kind; ?>',
                note2: <?php echo json_encode($model->note); ?>,
                date: Aliton.DateConvertToJs('<?php echo $model->date; ?>'),
                cntp_id: '<?php echo $model->cntp_id; ?>',
                empl_id: '<?php echo $model->empl_id; ?>',
                info_id: '<?php echo $model->info_id; ?>',
                text: <?php echo json_encode($model->text); ?>,
                drsn_id: '<?php echo $model->drsn_id; ?>',
                SourceInfo_id: '<?php echo $model->SourceInfo_id; ?>',
                pay_date: Aliton.DateConvertToJs('<?php echo $model->pay_date; ?>'),
                rslt_id: '<?php echo $model->rslt_id; ?>',
                PaySum: '<?php echo $model->PaySum; ?>',
                Telephone: '<?php echo $model->Telephone; ?>',
                time_length: '<?php echo $model->time_length; ?>',
                empl_name: '<?php echo $model->empl_name; ?>',
                next_date: Aliton.DateConvertToJs('<?php echo $model->next_date; ?>'),
                next_cntp_id: '<?php echo $model->next_cntp_id; ?>',
                next_info_id: '<?php echo $model->next_info_id; ?>',
            };
            
            var DataContactKinds = new $.jqx.dataAdapter(Sources.SourceContactKinds);
            var DataContactTypes = new $.jqx.dataAdapter(Sources.SourceContactTypes);
            DataContactTypes.dataBind();
            var DataEmpl = new $.jqx.dataAdapter(Sources.SourceListEmployees);
            
            var DataContactInfo = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContactInfo, {}), {
                formatData: function (data) {
                    $.extend(data, {
                        Filters: ["ci.ObjectGr_id = " + Contact.ObjectGr_id],
                    });
                    return data;
                },
            });
            DataContactInfo.dataBind();
            var DataDebtReasons = new $.jqx.dataAdapter(Sources.SourceDebtReasons);
            var DataSourceInfo = new $.jqx.dataAdapter(Sources.SourceSourceInfo);
            var DataResults = new $.jqx.dataAdapter(Sources.SourceResults);
            
            $("#ContactKinds").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataContactKinds, displayMember: "Kind_name", valueMember: "Kind_id", width:300 }));
            $("#date").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { formatString: 'dd.MM.yyyy HH:mm', showTimeButton: true, height: '25', width: '180' }));
            $("#ContactTypes").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataContactTypes.records, displayMember: "ContactName", valueMember: "Contact_id", width:255 }));
            $("#empl").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmpl, displayMember: "EmployeeName", valueMember: "Employee_id", width:250 }));
            $("#ContactInfo").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataContactInfo, displayMember: "contact", valueMember: "Info_id", width:500 }));
            $("#textField2").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 760 }));
            $("#DebtReasons").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataDebtReasons, displayMember: "name", valueMember: "drsn_Id", width:250 }));
            $("#SourceInfo").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSourceInfo, displayMember: "SourceInfo_name", valueMember: "SourceInfo_id", width:220 }));
            $("#pay").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { formatString: 'dd-MM-yyyy', value: null, height: '25', width: '180' }));
            $("#Results").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataResults, displayMember: "ResultName", valueMember: "Result_Id", width:320 }));
            $("#PaySum").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 190, symbol: "", min: 0, decimalDigits: 0 }));
            $("#Telephone").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 250}));
            $("#time_length").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 90, symbol: "", min: 0,  spinButtons: true, decimalDigits: 0, digits: 3 }));
            $("#note2").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 760 }));
            $("#next_date").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { formatString: 'dd.MM.yyyy HH:mm', showTimeButton: true, value: null, height: '25', width: '180' }));
            $("#nextContactTypes").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataContactTypes.records, displayMember: "ContactName", valueMember: "Contact_id", width:300 }));
            $("#nextContactInfo").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataContactInfo, displayMember: "contact", valueMember: "Info_id", width:600 }));
            
//            console.log(Contact.date);
            if (Contact.Kind != '') $("#ContactKinds").jqxComboBox('val', Contact.Kind);
            if (Contact.date !== null) $("#date").jqxDateTimeInput('val', Contact.date);
            if (Contact.cntp_id != '') $("#ContactTypes").jqxComboBox('val', Contact.cntp_id);
            if (Contact.empl_id != '') $("#empl").jqxComboBox('val', Contact.empl_id);
            if (Contact.info_id != '') $("#ContactInfo").jqxComboBox('val', Contact.info_id);
            if (Contact.text != '') $("#textField2").jqxTextArea('val', Contact.text);
            if (Contact.drsn_id != '') $("#DebtReasons").jqxComboBox('val', Contact.drsn_id);
            if (Contact.SourceInfo_id != '') $("#SourceInfo").jqxComboBox('val', Contact.SourceInfo_id);
            if (Contact.pay_date != '') $("#pay").jqxDateTimeInput('val', Contact.pay_date);
            if (Contact.rslt_id != '') $("#Results").jqxComboBox('val', Contact.rslt_id);
            if (Contact.PaySum != '') $("#PaySum").jqxNumberInput('val', Contact.PaySum);
            if (Contact.Telephone != '') $("#Telephone").jqxInput('val', Contact.Telephone);
            if (Contact.time_length != '') $("#time_length").jqxNumberInput('val', Contact.time_length);
            if (Contact.note2 != '') $("#note2").jqxTextArea('val', Contact.note2);
            if (Contact.next_date != '') $("#next_date").jqxDateTimeInput('val', Contact.next_date);
            if (Contact.next_cntp_id != '') $("#nextContactTypes").jqxComboBox('val', Contact.next_cntp_id);
            if (Contact.next_info_id != '') $("#nextContactInfo").jqxComboBox('val', Contact.next_info_id);
        });
</script> 
<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'Contacts',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<input type="hidden" name="Contacts[ObjectGr_id]" value="<?php echo $model->ObjectGr_id; ?>">
<input type="hidden" name="Contacts[cont_id]" value="<?php echo $model->cont_id; ?>">

<div class="" style="margin-top: 0; overflow: hidden;">
    <div class="row-column">Тема: <div id='ContactKinds' name="Contacts[Kind]"></div><?php echo $form->error($model, 'ContactKinds'); ?></div>
    <div class="row-column">Дата и время: <div id='date' name="Contacts[date]"></div></div>
    <div class="row-column">Тип: <div id='ContactTypes' name="Contacts[cntp_id]"></div><?php echo $form->error($model, 'ContactTypes'); ?></div>
</div>

<div class="" style="margin-top: 10px; overflow: hidden;">
    <div class="row-column">Исполнитель: <div id='empl' name="Contacts[empl_id]"></div><?php echo $form->error($model, 'empl_id'); ?></div>
    <div class="row-column">Контактное лицо: <div id='ContactInfo' name="Contacts[info_id]"></div><?php echo $form->error($model, 'info_id'); ?></div>
</div>

<div class="" style="margin-top: 10px; overflow: hidden;">
    <div class="row-column">Содержание: <textarea id="textField2" name="Contacts[text]"></textarea></div>
</div>

<div class="" style="margin-top: 10px; overflow: hidden;">
    <div class="row-column">Причина долга: <div id='DebtReasons' name="Contacts[drsn_id]"></div></div>
    <div class="row-column">Источник информации о фирме: <div id='SourceInfo' name="Contacts[SourceInfo_id]"></div></div>
    <div class="row-column">Дата согласованной оплаты: <div id='pay' name="Contacts[pay_date]"></div></div> 
</div>

<div class="" style="margin-top: 10px; overflow: hidden;">
    <div class="row-column">Результат: <div id='Results' name="Contacts[rslt_id]" value="4"></div></div>
    <div class="row-column">Сумма согласованной оплаты: <br><div id="PaySum" name="Contacts[PaySum]" type="text"></div></div>
</div>

<div class="" style="margin-top: 10px; overflow: hidden;">
    <div class="row-column">Телефоны: <br><input id="Telephone" name="Contacts[Telephone]" type="text"></div>
    <div class="row-column">Времязатр.(м): <br><input id="time_length" name="Contacts[time_length]" type="text"></div>
    <div class="row-column" style="margin-top: 22px;">Контакт создал(а): <?php echo $model->empl_name; ?></div>
</div>


<div class="" style="margin-top: 10px; overflow: hidden;">
    <div class="row-column">Примечание: <textarea id="note2" name="Contacts[note]"></textarea></div>
</div>


<div class="row" style="padding: 10px; width: 950px; border: 1px solid #ddd;">
    <div class="row-column" style="margin: 0 0 15px 0; width: 100%;">Следующий контакт</div>
    <div class="row-column">Дата и время: <div id='next_date' name="Contacts[next_date]"></div><?php echo $form->error($model, 'next_date'); ?></div>
    <div class="row-column">Тип: <div id='nextContactTypes' name="Contacts[next_cntp_id]"></div><?php echo $form->error($model, 'next_cntp_id'); ?></div>
    <div class="row-column" style="margin-top: 10px;">Контактное лицо: <div id='nextContactInfo' name="Contacts[next_info_id]"></div><?php echo $form->error($model, 'next_info_id'); ?></div>
</div>


<?php $this->endWidget(); ?>