<script type="text/javascript">
    $(document).ready(function () {
        
        var WHBuhActs = {
            docm_id: '<?php echo $model->docm_id; ?>',
            number: <?php echo json_encode($model->number); ?>,
            org_name: <?php echo json_encode($model->org_name); ?>,
            Address: <?php echo json_encode($model->Address); ?>,
            JuridicalPerson: <?php echo json_encode($model->JuridicalPerson); ?>,
            rcrs_name: <?php echo json_encode($model->rcrs_name); ?>,
            ReceiptNumber: <?php echo json_encode($model->ReceiptNumber); ?>,
            wrtp_name: <?php echo json_encode($model->wrtp_name); ?>,
            jbtp_name: <?php echo json_encode($model->jbtp_name); ?>,
            work_list: <?php echo json_encode($model->work_list); ?>,
            signed_yn: <?php echo json_encode($model->signed_yn); ?>,
            FIO: <?php echo json_encode($model->FIO); ?>,
            sum: <?php echo json_encode($model->sum); ?>,
            
            date: Aliton.DateConvertToJs('<?php echo $model->date; ?>'),
            date_act: Aliton.DateConvertToJs('<?php echo $model->date_act; ?>'),
            ReceiptDate: Aliton.DateConvertToJs('<?php echo $model->ReceiptDate; ?>'),
        };
            
        $("#numberWHBA2").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 120 }));
        $("#org_nameWHBA2").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 350 }));
        $("#AddressWHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 350 }));
        $("#JuridicalPersonWHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 220 }));
        $("#rcrs_nameWHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 220 }));
        $("#ReceiptNumberWHBA").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 75 }));
        $("#wrtp_nameWHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 250 }));
        $("#jbtp_nameWHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 250 }));
        $("#FIO_WHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 250 }));
        $("#sumWHBA").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 120 }));
        
        $("#signed_ynWHBA").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { disabled: true }));
        
        $("#dateWHBA2").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 140, formatString: 'dd.MM.yyyy H:mm', readonly: true, showCalendarButton: false, allowKeyboardDelete: false }));
        $("#date_actWHBA").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', readonly: true, showCalendarButton: false, allowKeyboardDelete: false }));
        $("#ReceiptDateWHBA").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', readonly: true, showCalendarButton: false, allowKeyboardDelete: false }));
        
        $("#work_listWHBA").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 800 }));
        
        if (WHBuhActs.number !== '') $("#numberWHBA2").jqxInput('val', WHBuhActs.number);
        if (WHBuhActs.org_name !== '') $("#org_nameWHBA2").jqxInput('val', WHBuhActs.org_name);
        if (WHBuhActs.Address !== '') $("#AddressWHBA").jqxInput('val', WHBuhActs.Address);
        if (WHBuhActs.JuridicalPerson !== '') $("#JuridicalPersonWHBA").jqxInput('val', WHBuhActs.JuridicalPerson);
        if (WHBuhActs.rcrs_name !== '') $("#rcrs_nameWHBA").jqxInput('val', WHBuhActs.rcrs_name);
        if (WHBuhActs.ReceiptNumber !== '') $("#ReceiptNumberWHBA").jqxNumberInput('val', WHBuhActs.ReceiptNumber);
        if (WHBuhActs.wrtp_name !== '') $("#wrtp_nameWHBA").jqxInput('val', WHBuhActs.wrtp_name);
        if (WHBuhActs.jbtp_name !== '' && WHBuhActs.jbtp_name !== 'null') $("#jbtp_nameWHBA").jqxInput('val', WHBuhActs.jbtp_name);
        if (WHBuhActs.FIO !== '' && WHBuhActs.FIO !== 'null') $("#FIO_WHBA").jqxInput('val', WHBuhActs.FIO);
        
        if (WHBuhActs.sum !== '' && WHBuhActs.sum !== 'null') $("#sumWHBA").jqxNumberInput('val', WHBuhActs.sum);
        
        if (WHBuhActs.work_list !== '' && WHBuhActs.work_list !== 'null') $("#work_listWHBA").jqxTextArea('val', WHBuhActs.work_list);
        
        if (WHBuhActs.signed_yn !== '' && WHBuhActs.signed_yn !== 'null') $("#signed_ynWHBA").jqxCheckBox('val', WHBuhActs.signed_yn);
        
        if (WHBuhActs.date !== '') $("#dateWHBA2").jqxDateTimeInput('val', WHBuhActs.date);
        if (WHBuhActs.date_act !== '') $("#date_actWHBA").jqxDateTimeInput('val', WHBuhActs.date_act);
        if (WHBuhActs.ReceiptDate !== '') $("#ReceiptDateWHBA").jqxDateTimeInput('val', WHBuhActs.ReceiptDate);
        
      
    });
</script>

<?php $this->setPageTitle('Бухгалтерский акт'); ?>

<div class="row">
    <div class="row-column">Номер: <input type="text" id="numberWHBA2"></div>
    <div class="row-column" style="margin-top: 2px;">Дата: </div><div class="row-column"><div id="dateWHBA2"></div></div>
    <div class="row-column" style="margin: 2px 0 0 20px; font-weight: 500;"><?php echo $model->state; ?></div>
</div>

<div class="row">
    <div class="row-column">Клиент: <input type="text" id="org_nameWHBA2"></div>
</div>

<div class="row">
    <div class="row-column">Адрес: <input type="text" id="AddressWHBA"></div>
</div>

<div class="row">
    <div class="row-column">Юр.лицо: <input type="text" id="JuridicalPersonWHBA"></div>
    <div class="row-column" style="margin-top: 2px;">Дата прихода оригинала акта: </div><div class="row-column"><div id="date_actWHBA"></div></div>
</div>

<div class="row">
    <div class="row-column">Основание: <input type="text" id="rcrs_nameWHBA"></div>
    <div class="row-column" style="margin-top: 2px;">Дата: </div><div class="row-column"><div id="ReceiptDateWHBA"></div></div>
    <div class="row-column">Номер: <input type="text" id="ReceiptNumberWHBA"></div>
</div>

<div class="row" style="padding-bottom: 5px; border: 1px solid #ddd;">
    <div style="font-size: 1em; margin: 0 10px 0 5px;">Выполненные работы:</div>

    <div class="row">
        <div class="row-column">Тип работ: <input type="text" id="wrtp_nameWHBA"></div>
        <div class="row-column">Вид работ: <input type="text" id="jbtp_nameWHBA"></div>
    </div>

    <div class="row">
        <div class="row-column">Перечень работ: <textarea type="text" id="work_listWHBA"></textarea></div>
    </div>

    <div class="row">
        <div class="row-column"><div id="signed_ynWHBA"></div></div>
        <div class="row-column" style="margin-top: 2px;">Подписан</div>
        <div class="row-column"><input type="text" id="FIO_WHBA"></div>
        <div class="row-column" style="margin-top: 2px;">Сумма: </div><div class="row-column"><div id="sumWHBA"></div></div>
    </div>

</div>
