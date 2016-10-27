<script>
    $(document).ready(function () {
        Acts = {
            Docm_id: <?php echo json_encode($model->docm_id); ?>,
            Address: <?php echo json_encode($model->Address); ?>,
            Client: <?php echo json_encode($model->org_name); ?>,
            Service: <?php echo json_encode($model->ServiceType); ?>,
            DcknName: <?php echo json_encode($model->dckn_name); ?>,
            SignedYn: Boolean(Number(<?php echo json_encode($model->signed_yn); ?>)),
            CstmName: <?php echo json_encode($model->cstm_name); ?>,
            Note: <?php echo json_encode($model->note); ?>,
            Sum: <?php echo json_encode($model->sum); ?>,
            PaymentType: <?php echo json_encode($model->pmtp_name); ?>,
            Bill: <?php echo json_encode($model->bill); ?>,
            DatePay: <?php echo json_encode($model->date_payment); ?>,
            NotePayment: <?php echo json_encode($model->note_payment); ?>,
        };

        $("#edAddress").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 500, minLength: 1, value: Acts.Address}));
        $("#edClient").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 250, minLength: 1, value: Acts.Client}));
        $("#edService").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 182, minLength: 1, value: Acts.Service}));
        $("#edDcknName").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 180, minLength: 1, value: Acts.DcknName}));
        $("#edSignedYn").jqxCheckBox($.extend(true, CheckBoxDefaultSettings, {width: 100, checked: Acts.SignedYn}));
        $("#edCstmName").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 180, minLength: 1, value: Acts.CstmName}));
        $('#edNote').jqxTextArea($.extend(true, TextAreaDefaultSettings, { height: 60, width: 'calc(100% - 2px)', minLength: 1}));
        $("#edSum").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px', value: Acts.Sum}));
        $("#edPaymentType").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 180, minLength: 1, value: Acts.PaymentType}));
        $("#edBill").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 180, minLength: 1, value: Acts.Bill}));
        $("#edDatePay").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Acts.DatePay, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $('#edNotePayment').jqxTextArea($.extend(true, TextAreaDefaultSettings, { height: 62, width: 'calc(100% - 2px)', minLength: 1}));
        if (Acts.Note != null) $('#edNote').val(Acts.Note);
        if (Acts.NotePayment != null) $('#edNotePayment').val(Acts.NotePayment);
            
    });
</script>
<style>
    .al-data {
        float: left;
        border: 1px solid #e0e0e0;
        padding: 10px;
        width: calc(100% - 20px);
    }
    
    .al-data-nb {
        float: left;
        padding: 10px;
        overflow: auto;
        width: 100%
    }
    .al-row {
        width: 100%;
        padding: 4px 0px 4px 0px;
    }
    .al-row-column {
        float: left;
        margin-left: 6px;
    }
    
    .al-row-column:first-child {
        margin-left: 0px;
    }
    
    .al-data, .al-data-nb, .al-row, .al-row-column {
        font: 14px 'Segoe UI', Helvetica, 'Droid Sans', Tahoma, Geneva, sans-serif;
    }
    
    .al-data .al-row:first-child {
        padding-top: 0px;
    }
</style>
<div class="al-data-nb" style="width: 900px; height: 400px;">
    <div class="al-row-column">
        <div class="al-row">
            <div class="al-data">
                <div class="al-row"><b>Объект</b></div>
                <div class="al-row">
                    <div class="al-row-column">Адрес</div>
                    <div class="al-row-column"><input id="edAddress" /></div>
                </div>
                <div style="clear: both"></div>
                <div style="margin-top: 4px;">
                    <div class="row-column">Клиент</div>
                    <div class="row-column"><input id="edClient" /></div>
                    <div class="row-column">Тариф</div>
                    <div class="row-column"><input id="edService" /></div>
                </div>
                
            </div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-data">
                <div class="al-row"><b>Документ</b></div>
                <div class="al-row">
                    <div class="al-row-column">Тип</div>
                    <div class="al-row-column"><input id="edDcknName" /></div>
                    <div class="al-row-column"><div id="edSignedYn">Подписан</div></div>
                    <div class="al-row-column"><input id="edCstmName" /></div>
                </div>
                <div class="al-row">
                    <div class="al-row">Примечание</div>
                    <div class="al-row"><textarea id="edNote"></textarea></div>
                </div>
            </div>
            <div style="clear: both"></div>
        </div>
    </div>
    <div class="al-row-column">
        <div class="al-row">
            <div class="al-data">
                <div class="al-row"><b>Оплата</b></div>
                <div class="al-row">
                    <div class="al-row-column">Сумма по акту</div>
                    <div class="al-row-column"><div id="edSum"></div></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column">Форма оплаты</div>
                    <div class="al-row-column"><input id="edPaymentType" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column">Счет</div>
                    <div class="al-row-column"><input id="edBill" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column">Дата оплаты</div>
                    <div class="al-row-column"><div id="edDatePay"></div></div>
                    <div style="clear: both"></div>
                </div>
               <div class="al-row">
                    <div class="al-row">Примечание</div>
                    <div class="al-row"><textarea id="edNotePayment"></textarea></div>
                     <div style="clear: both"></div>
                </div> 
            </div>
            <div style="clear: both"></div>
        </div>
        <div style="clear: both"></div>
    </div>
</div>

