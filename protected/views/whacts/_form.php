<script>
    $(document).ready(function () {
        Acts = {
            Docm_id: <?php echo json_encode($model->docm_id); ?>,
            Date: Aliton.DateConvertToJs(<?php echo json_encode($model->date); ?>),
            Achs_id: <?php echo json_encode($model->achs_id); ?>,
            Object_id: <?php echo json_encode($model->objc_id); ?>,
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
            DatePay: Aliton.DateConvertToJs(<?php echo json_encode($model->date_payment); ?>),
            NotePayment: <?php echo json_encode($model->note_payment); ?>,
            WorkType: <?php echo json_encode($model->wrtp_name); ?>,
            JobType: <?php echo json_encode($model->wrtp_name); ?>,
            WorkList: <?php echo json_encode($model->work_list); ?>,
            Juridical: <?php echo json_encode($model->work_list); ?>,
            UserCreate: <?php echo json_encode($model->UserCreate); ?>,
            edMaster: <?php echo json_encode($model->master); ?>,
        };

        $("#edAddressEdit").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 500, minLength: 1, value: Acts.Address}));
        $("#edClientEdit").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 250, minLength: 1, value: Acts.Client}));
        $("#edServiceEdit").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 182, minLength: 1, value: Acts.Service}));
        $("#edDcknNameEdit").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 180, minLength: 1, value: Acts.DcknName}));
        $("#edSignedYnEdit").jqxCheckBox($.extend(true, CheckBoxDefaultSettings, {width: 100, checked: Acts.SignedYn}));
        $("#edCstmNameEdit").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 180, minLength: 1, value: Acts.CstmName}));
        $('#edNoteEdit').jqxTextArea($.extend(true, TextAreaDefaultSettings, { height: 60, width: 'calc(100% - 2px)', minLength: 1}));
        $("#edSumEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px'}));
        $("#edPaymentTypeEdit").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 180, minLength: 1, value: Acts.PaymentType}));
        $("#edBillEdit").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 180, minLength: 1, value: Acts.Bill}));
        $("#edDatePayEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Acts.DatePay, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $('#edNotePaymentEdit').jqxTextArea($.extend(true, TextAreaDefaultSettings, { height: 32, width: 'calc(100% - 2px)', minLength: 1}));
        $("#edDateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Acts.Date, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edWorkTypeEdit").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 200, minLength: 1, value: Acts.WorkType}));
        $("#edJobTypeEdit").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 200, minLength: 1, value: Acts.JobType}));
        $('#edWorkListEdit').jqxTextArea($.extend(true, TextAreaDefaultSettings, { height: 32, width: 'calc(100% - 2px)', minLength: 1}));
        $("#edJuridicalEdit").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 200, minLength: 1, value: Acts.Juridical}));
        $("#edUserCreateEdit").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 200, minLength: 1, value: Acts.UserCreate}));
        $("#edMasterEdit").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 200, minLength: 1, value: Acts.UserCreate}));
        $('#btnSave').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancel').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        if (Acts.Note != null) $('#edNote').val(Acts.Note);
        if (Acts.NotePayment != null) $('#edNotePayment').val(Acts.NotePayment);
        if (Acts.WorkList != null) $('#edWorkList').val(Acts.WorkList);
    });
</script>

<?php 
    $form=$this->beginWidget('CActiveForm', array(
        'id'=>'WhActs',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
    
    
?>

<input type="hidden" name="CostCalculations[calc_id]" value="<?php echo $model->calc_id; ?>"/>

<div class="al-data-nb" style="width: 900px; height: 230px;">
    <div class="al-row-column">
        <div class="al-row">
            <div class="al-data" style="width: 552px">
                <!--<div class="al-row-label"><b>Объект</b></div>-->
                <div class="al-row">
                    <div class="al-row-column">Адрес</div>
                    <div class="al-row-column"><input id="edAddressEdit" /></div>
                </div>
                <div style="clear: both"></div>
                <div style="margin-top: 4px;">
                    <div class="row-column">Клиент</div>
                    <div class="row-column"><input id="edClientEdit" /></div>
                    <div class="row-column">Тариф</div>
                    <div class="row-column"><input id="edServiceEdit" /></div>
                </div>
                
            </div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-data" style="width: 552px">
                <!--<div class="al-row-label"><b>Документ</b></div>-->
                <div class="al-row">
                    <div class="al-row-column">Тип</div>
                    <div class="al-row-column"><input id="edDcknNameEdit" /></div>
                    <div class="al-row-column"><div id="edSignedYnEdit">Подписан</div></div>
                    <div class="al-row-column"><input id="edCstmNameEdit" /></div>
                </div>
                <div class="al-row">
                    <div class="al-row-label">Примечание</div>
                    <div class="al-row"><textarea id="edNoteEdit"></textarea></div>
                </div>
            </div>
            <div style="clear: both"></div>
        </div>
    </div>
    <div class="al-row-column">
        <div class="al-row">
            <div class="al-data" style="width: 298px; height: 200px;">
                <!--<div class="al-row-label"><b>Оплата</b></div>-->
                <div class="al-row">
                    <div class="al-row-column">Сумма по акту</div>
                    <div class="al-row-column"><div id="edSumEdit"></div></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column">Форма оплаты</div>
                    <div class="al-row-column"><input id="edPaymentTypeEdit" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column">Счет</div>
                    <div class="al-row-column"><input id="edBillEdit" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column">Дата оплаты</div>
                    <div class="al-row-column"><div id="edDatePayEdit"></div></div>
                    <div style="clear: both"></div>
                </div>
               <div class="al-row">
                    <div class="al-row-label">Примечание</div>
                    <div class="al-row"><textarea id="edNotePaymentEdit"></textarea></div>
                    <div style="clear: both"></div>
                </div> 
            </div>
            <div style="clear: both"></div>
        </div>
        <div style="clear: both"></div>
    </div>
</div>
<div style="clear: both"></div>
<div class="al-data-nb" style="width: 900px; height: 146px;">
    <div class="al-data">
        <!--<div class="al-row-label"><b>Выполненные работы</b></div>-->
        <div class="al-row">
            <div class="al-row-column">Дата выпонения работ</div>
            <div class="al-row-column"><div id="edDateEdit"></div></div>
            <div class="al-row-column">Тип работ</div>
            <div class="al-row-column"><input id="edWorkTypeEdit" /></div>
            <div class="al-row-column">Вид работ</div>
            <div class="al-row-column"><input id="edJobTypeEdit" /></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row-label">Перечень работ</div>
        <div class="al-row"><textarea id="edWorkListEdit"></textarea></div>
        <div class="al-row">
            <div class="al-row-column">Юр. лицо</div>
            <div class="al-row-column"><input id="edJuridicalEdit" /></div>
            <div class="al-row-column">Создал</div>
            <div class="al-row-column"><input id="edUserCreateEdit" /></div>
            <div class="al-row-column">Исполнитель</div>
            <div class="al-row-column"><input id="edMasterEdit" /></div>
        </div>
    </div>
</div>
<div style="clear: both"></div>
<div class="al-data-nb" style="width: 100%; height: 38px;">
    <div class="al-row">
        <div class="al-row-column"><input type="button" id="btnSave" value="Сохранить"/></div>
        <div class="al-row-column" style="float: right"><input type="button" id="btnCancel" value="Отмена"/></div>
        <div style="clear: both"></div>
    </div>
</div>

<?php $this->endWidget(); ?>