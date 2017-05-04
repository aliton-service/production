<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        
        var WHBuhActs2 = {
            DialogId: <?php echo json_encode($DialogId); ?>,
            BodyDialogId: <?php echo json_encode($BodyDialogId); ?>,
            docm_id: <?php echo json_encode($model->docm_id); ?>,
            objc_id: <?php echo json_encode($model->objc_id); ?>,
            ObjectGr_id: <?php echo json_encode($model->ObjectGr_id); ?>,
            number: <?php echo json_encode($model->number); ?>,
            org_name: <?php echo json_encode($model->org_name); ?>,
            jrdc_id: <?php echo json_encode($model->jrdc_id); ?>,
            rcrs_id: <?php echo json_encode($model->rcrs_id); ?>,
            ReceiptNumber: <?php echo json_encode($model->ReceiptNumber); ?>,
            wrtp_id: <?php echo json_encode($model->wrtp_id); ?>,
            jbtp_id: <?php echo json_encode($model->jbtp_id); ?>,
            work_list: <?php echo json_encode($model->work_list); ?>,
            signed_yn: <?php echo json_encode($model->signed_yn); ?>,
            info_id: <?php echo json_encode($model->info_id); ?>,
            sum: <?php echo json_encode($model->sum); ?>,
            Form_id: <?php echo json_encode($model->Form_id); ?>,
            date: Aliton.DateConvertToJs('<?php echo $model->date; ?>'),
            date_act: Aliton.DateConvertToJs('<?php echo $model->date_act; ?>'),
            ReceiptDate: Aliton.DateConvertToJs('<?php echo $model->ReceiptDate; ?>'),
        };

        

        $("#numberWHBA2").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 120 }));
//        $("#org_nameWHBA2").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 350 }));
        var DataClients = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceOrganizationsVMin, {}));
        $("#org_nameWHBA2").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataClients, width: 250, displayMember: "FullName", valueMember: "Form_id"}));
        $("#org_nameWHBA2").on('bindingComplete', function (event) {
            if (WHBuhActs2.Form_id !== '') $("#org_nameWHBA2").jqxComboBox('val', WHBuhActs2.Form_id);
            $("#btnOk").jqxButton({disabled: false});
        });
        
        
        var DataAddresses = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListAddresses, {}));
        $("#AddressWHBA2").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataAddresses, width: 350, displayMember: "Addr", valueMember: "Object_id", disabled: false }));
        $("#AddressWHBA2").on('bindingComplete', function (event) {
            if (WHBuhActs2.objc_id !== '') $("#AddressWHBA2").jqxComboBox('val', WHBuhActs2.objc_id);
            $("#btnOk").jqxButton({disabled: false});
        });
        
        var DataJuridicalPersons = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceJuridicalsMin, {}));
        $("#JuridicalPersonWHBA2").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataJuridicalPersons, width: 220, displayMember: "JuridicalPerson", valueMember: "Jrdc_Id", autoDropDownHeight: true }));
        if (WHBuhActs2.jrdc_id !== '') $("#JuridicalPersonWHBA2").jqxComboBox('val', WHBuhActs2.jrdc_id);
        
        var DataReceiptReasons = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceReceiptReasons, {}));
        $("#ReceiptReasonsWHBA2").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataReceiptReasons, width: 260, displayMember: "name", valueMember: "rcrs_id", autoDropDownHeight: true }));
        if (WHBuhActs2.rcrs_id !== '') $("#ReceiptReasonsWHBA2").jqxComboBox('val', WHBuhActs2.rcrs_id);
        
        $("#ReceiptNumberWHBA2").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 75 }));
        
        var DataWorkTypes = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceWorkTypes, {}));
        $("#WorkTypesWHBA2").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataWorkTypes, width: 200, displayMember: "name", valueMember: "wrtp_id", autoDropDownHeight: true }));
        if (WHBuhActs2.wrtp_id !== '') $("#WorkTypesWHBA2").jqxComboBox('val', WHBuhActs2.wrtp_id);
        
        var DataJobTypes = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceJobTypes, {}));
        $("#JobTypesWHBA2").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataJobTypes, width: 280, displayMember: "JobType_Name", valueMember: "JobType_Id", autoDropDownHeight: true }));
        if (WHBuhActs2.jbtp_id !== '') $("#JobTypesWHBA2").jqxComboBox('val', WHBuhActs2.jbtp_id);
        
        var DataContactInfo = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContactInfo, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["ci.ObjectGr_id = " + WHBuhActs2.ObjectGr_id],
                });
                return data;
            },
        });
        $("#ContactInfoWHBA2").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataContactInfo, width: 280, displayMember: "FIO", valueMember: "Info_id", autoDropDownHeight: true }));
        if (WHBuhActs2.info_id !== '') $("#ContactInfoWHBA2").jqxComboBox('val', WHBuhActs2.info_id);
        
        $("#sumWHBA2").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100 }));
        
        $("#signed_ynWHBA2").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings));
        
        $("#dateWHBA2").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 170, formatString: 'dd.MM.yyyy H:mm', showTimeButton: true }));
        $("#date_actWHBA2").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy' }));
        $("#ReceiptDateWHBA2").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy' }));
        
        $("#work_listWHBA2").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 700, height: 100 }));
        
        if (WHBuhActs2.number !== '') $("#numberWHBA2").jqxInput('val', WHBuhActs2.number);
        if (WHBuhActs2.org_name !== '') $("#org_nameWHBA2").jqxInput('val', WHBuhActs2.org_name);
        if (WHBuhActs2.ReceiptNumber !== '') $("#ReceiptNumberWHBA2").jqxInput('val', WHBuhActs2.ReceiptNumber);
        
        if (WHBuhActs2.sum !== '' && WHBuhActs2.sum !== 'null') $("#sumWHBA2").jqxNumberInput('val', WHBuhActs2.sum);
        
        if (WHBuhActs2.work_list !== '' && WHBuhActs2.work_list !== 'null') $("#work_listWHBA2").jqxTextArea('val', WHBuhActs2.work_list);
        
        if (WHBuhActs2.signed_yn !== '' && WHBuhActs2.signed_yn !== 'null') $("#signed_ynWHBA2").jqxCheckBox('val', Boolean(parseInt(WHBuhActs2.signed_yn)));
        
        if (WHBuhActs2.date !== '') $("#dateWHBA2").jqxDateTimeInput('val', WHBuhActs2.date);
        if (WHBuhActs2.date_act !== '') $("#date_actWHBA2").jqxDateTimeInput('val', WHBuhActs2.date_act);
        if (WHBuhActs2.ReceiptDate !== '') $("#ReceiptDateWHBA2").jqxDateTimeInput('val', WHBuhActs2.ReceiptDate);
        
        $("#btnOk").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#btnCancel").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $("#btnCancel").on('click', function () {
            $('#' + WHBuhActs2.DialogId).jqxWindow('close');
        });
        
        $("#btnOk").on('click', function () {
            var Url = <?php echo json_encode(Yii::app()->createUrl('WHBuhActs/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('WHBuhActs/Create')); ?>;
            
            var Data = $('#WHBuhActs').serialize();
                
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    
//                    console.log('WHBuhActs2.DialogId = ' + WHBuhActs2.DialogId);
//                    console.log('Res.result = ' + Res.result);
                    
                    if (Res.result === '1' || Res.result == 1) {
                        $('#' + WHBuhActs2.DialogId).jqxWindow('close');
                        if (WHBuhActs2.DialogId == 'CostCalculationsDialog') {
                            $('#RefreshCostCalcDocuments').click();
                        } 
                        else {
                            location.reload();
                        } 
                        if ($('#CostCalcDocumentsGrid').length>0) {
                            $('#CostCalcDocumentsGrid').jqxGrid('updatebounddata');
                        }
                    } else {
                        $('#' + WHBuhActs2.BodyDialogId).html(Res.html);
                    }
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
    });
</script>

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'WHBuhActs',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>


<input type="hidden" name="WHBuhActs[docm_id]" value="<?php echo $model->docm_id; ?>" />
<input type="hidden" name="WHBuhActs[objc_id]" value="<?php echo $model->objc_id; ?>" />
<input type="hidden" name="WHBuhActs[calc_id]" value="<?php echo $model->calc_id; ?>" />

<div class="row" style="margin-top: 10px;">
    <div class="row-column">Номер: <input type="text" id="numberWHBA2" name="WHBuhActs[number]"></div>
    <div class="row-column" style="margin-top: 3px;">Дата: </div><div class="row-column"><div id="dateWHBA2" name="WHBuhActs[date]"></div></div>
    <div class="row-column" style="margin: 3px 0 0 20px; font-weight: 500;"><?php echo $model->state; ?></div>
</div>

<div class="row" style="margin-top: 10px;">
    <div class="row-column">
        <div class="al-row-column">Клиент:</div>
        <div class="al-row-column"><div id="org_nameWHBA2" name="WHBuhActs[org_name]"></div></div>
            
    </div>
        
        <!--<input readonly type="text" id="org_nameWHBA2" name="WHBuhActs[org_name]"></div>-->
</div>

<div class="row" style="margin-top: 10px;">
    <div class="row-column" style="margin-top: 3px;">Адрес: </div><div class="row-column"><div id="AddressWHBA2" name="WHBuhActs[objc_id]"></div></div>
</div>

<div class="row" style="margin-top: 10px;">
    <div class="row-column" style="margin-top: 3px;">Юр.лицо: </div><div class="row-column"><div id="JuridicalPersonWHBA2" name="WHBuhActs[jrdc_id]"></div></div>
    <div class="row-column" style="margin-top: 3px;">Дата прихода оригинала акта: </div><div class="row-column"><div id="date_actWHBA2" name="WHBuhActs[date_act]"></div></div>
</div>

<div class="row" style="margin-top: 10px;">
    <div class="row-column" style="margin-top: 3px;">Основание: </div><div class="row-column"><div id="ReceiptReasonsWHBA2" name="WHBuhActs[rcrs_id]"></div></div>
    <div class="row-column" style="margin-top: 3px;">Дата: </div><div class="row-column"><div id="ReceiptDateWHBA2" name="WHBuhActs[ReceiptDate]"></div></div>
    <div class="row-column">Номер: <input type="text" id="ReceiptNumberWHBA2" name="WHBuhActs[ReceiptNumber]"></div>
</div>

<div class="row" style="margin-top: 10px; padding-bottom: 5px; border: 1px solid #ddd;">
    <div style="font-size: 0.8em; margin: 5px 10px 0 5px;">Выполненные работы:</div>

    <div class="row" style="margin-top: 10px;">
        <div class="row-column" style="margin-top: 3px;">Тип работ: </div><div class="row-column"><div id="WorkTypesWHBA2" name="WHBuhActs[wrtp_id]"></div></div>
        <div class="row-column" style="margin-top: 3px;">Вид работ: </div><div class="row-column"><div id="JobTypesWHBA2" name="WHBuhActs[jbtp_id]"></div></div>
    </div>

    <div class="row" style="margin-top: 10px;">
        <div class="row-column">Перечень работ: <textarea type="text" id="work_listWHBA2" name="WHBuhActs[work_list]"></textarea></div>
    </div>

    <div class="row" style="margin-top: 10px;">
        <div class="row-column" style="margin: 0;"><div id="signed_ynWHBA2" name="WHBuhActs[signed_yn]"></div></div>
        <div class="row-column" style="margin-top: 2px;">Подписан</div>
        <div class="row-column"><div id="ContactInfoWHBA2" name="WHBuhActs[info_id]"></div></div>
        <div class="row-column" style="margin-top: 2px;">Сумма: </div><div class="row-column"><div id="sumWHBA2" name="WHBuhActs[sum]"></div></div>
    </div>
</div>
    
<div class="row" style="margin-top: 10px;">
    <div class="row-column"><input type="button" value="Сохранить" id='btnOk' /></div>
    <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='btnCancel' /></div>
</div>
    
<?php $this->endWidget(); ?>