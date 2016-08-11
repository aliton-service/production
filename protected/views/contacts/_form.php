<script type="text/javascript">
        $(document).ready(function () {
            var Contact = {
                ObjectGr_id: <?php echo $model->ObjectGr_id; ?>,
                cont_id: '<?php echo $model->cont_id; ?>',
                Kind: '<?php echo $model->Kind; ?>',
                rslt_name: '<?php echo $model->rslt_name; ?>',
                note: '<?php echo $model->note; ?>',
                date: '<?php echo $model->date; ?>',
                cntp_id: '<?php echo $model->cntp_id; ?>',
                empl_id: '<?php echo $model->empl_id; ?>',
                info_id: '<?php echo $model->info_id; ?>',
                pay_date: '<?php echo $model->pay_date; ?>',
                text: '<?php echo $model->text; ?>',
                drsn_id: '<?php echo $model->drsn_id; ?>',
            };
            
            console.log('<?php echo $model->date; ?>');
            
            var DataContactKinds = new $.jqx.dataAdapter(Sources.SourceContactKinds);
            var DataContactTypes = new $.jqx.dataAdapter(Sources.SourceContactTypes);
            var DataEmpl = new $.jqx.dataAdapter(Sources.SourceListEmployees);
            
            var DataContactInfo = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContactInfo, {}), {
                formatData: function (data) {
                    $.extend(data, {
                        Filters: ["ci.ObjectGr_id = " + Contact.ObjectGr_id],
                    });
                    return data;
                },
            });
            var DataDebtReasons = new $.jqx.dataAdapter(Sources.SourceDebtReasons);
            
            $("#ContactKinds").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataContactKinds, displayMember: "Kind_name", valueMember: "Kind_id", width:300 }));
            $("#date").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { formatString: 'dd.MM.yyyy HH:mm', showTimeButton: true, height: '25', width: '180' }));
            $("#ContactTypes").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataContactTypes, displayMember: "ContactName", valueMember: "Contact_id", width:255 }));
            $("#empl").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmpl, displayMember: "EmployeeName", valueMember: "Employee_id", width:250 }));
            $("#ContactInfo").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataContactInfo, displayMember: "contact", valueMember: "Info_id", width:500 }));
            $("#textField2").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 760 }));
            $("#DebtReasons").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataDebtReasons, displayMember: "name", valueMember: "drsn_Id", width:250 }));

            $("#pay").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { formatString: 'dd-MM-yyyy', value: null, height: '25', width: '180' }));
            
            if (Contact.Kind != '') $("#ContactKinds").jqxComboBox('val', Contact.Kind);
            if (Contact.date != '') $("#date").jqxDateTimeInput('val', Contact.date);
            if (Contact.cntp_id != '') $("#ContactTypes").jqxComboBox('val', Contact.cntp_id);
            if (Contact.empl_id != '') $("#empl").jqxComboBox('val', Contact.empl_id);
            if (Contact.info_id != '') $("#ContactInfo").jqxComboBox('val', Contact.info_id);
            if (Contact.text != '') $("#textField2").jqxTextArea('val', Contact.text);
            if (Contact.drsn_id != '') $("#DebtReasons").jqxComboBox('val', Contact.drsn_id);

            
            if (Contact.pay_date != '') $("#pay").jqxDateTimeInput('val', Contact.pay_date);
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
<input type="hidden" name="Contacts[ObjectGr_id]" value="<?php // echo $model->ObjectGr_id; ?>">
<input type="hidden" name="Contacts[cont_id]" value="<?php // echo $model->cont_id; ?>">

<div class="" style="margin-top: 0; overflow: hidden;">
    <div class="row-column">Тема: <div id='ContactKinds' name="Contacts[Kind]"></div><?php echo $form->error($model, 'Kind'); ?></div>
    <div class="row-column">Дата и время: <div id='date' name="Contacts[date]"></div></div>
    <div class="row-column">Тип: <div id='ContactTypes' name="Contacts[cntp_id]"></div><?php echo $form->error($model, 'cntp_id'); ?></div>
</div>

<div class="" style="margin-top: 10px; overflow: hidden;">
    <div class="row-column">Исполнитель: <div id='empl' name="Contacts[empl_id]"></div><?php echo $form->error($model, 'empl_id'); ?></div>
    <div class="row-column">Контактное лицо: <div id='ContactInfo' name="Contacts[info_id]"></div><?php echo $form->error($model, 'info_id'); ?></div>
</div>

<div class="" style="margin-top: 10px; overflow: hidden;">
    <div class="row-column">Содержание: <textarea id="textField2" name="Contacts[text]"></textarea></div>
</div>

<div class="" style="margin-top: 10px; overflow: hidden;">
    <div class="row-column">Причина долга: <div id='DebtReasons' name="Contacts[drsn_id]"></div><?php echo $form->error($model, 'drsn_id'); ?></div>
</div>

<div class="row-column">Дата согласованной оплаты: <div id='pay' name="Contacts[pay_date]"></div></div> 


<?php $this->endWidget(); ?>