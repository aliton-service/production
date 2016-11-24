<script type="text/javascript">
    $(document).ready(function(){
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Insert') echo 'true'; else echo 'false'; ?>;
        var DeliveryDemands = {
            Dldm_id: <?php echo json_encode($model->dldm_id); ?>,
            Date: Aliton.DateConvertToJs('<?php echo $model->date; ?>'),
            Objc_id: <?php echo json_encode($model->objc_id); ?>,
            Dltp_id: <?php echo json_encode($model->dltp_id); ?>,
            Prty_id: <?php echo json_encode($model->prty_id); ?>,
            Dlrs_id: <?php echo json_encode($model->dlrs_id); ?>,
            Mstr_id: <?php echo json_encode($model->mstr_id); ?>,
            empl_dlvr_id: <?php echo json_encode($model->empl_dlvr_id); ?>,
            DeliveryType: <?php echo json_encode($model->DeliveryType); ?>,
            DemandPrior: <?php echo json_encode($model->DemandPrior); ?>,
            BestDate: Aliton.DateConvertToJs('<?php echo $model->bestdate; ?>'),
            Deadline: Aliton.DateConvertToJs('<?php echo $model->deadline; ?>'),
            PlanDate: Aliton.DateConvertToJs('<?php echo $model->plandate; ?>'),
            DatePromise: Aliton.DateConvertToJs('<?php echo $model->date_promise; ?>'),
            DateLogist: Aliton.DateConvertToJs('<?php echo $model->date_logist; ?>'),
            DateDelivery: Aliton.DateConvertToJs('<?php echo $model->date_delivery; ?>'),
            Address: <?php echo json_encode($model->Addr); ?>,
            MasterName: <?php echo json_encode($model->MasterName); ?>,
            ContactInfo: <?php echo json_encode($model->contact_info); ?>,
            PhoneNumber: <?php echo json_encode($model->phonenumber); ?>,
            DeliveryMan: <?php echo json_encode($model->DeliveryMan); ?>,
            DelayReasonName: <?php echo json_encode($model->delayreasonname); ?>,
            Text: <?php echo json_encode($model->text); ?>,
            Note: <?php echo json_encode($model->note); ?>,
            RepDelivery: <?php echo json_encode($model->rep_delivery); ?>,
            Sender: <?php echo json_encode($model->user_sender_name); ?>,
            Logist: <?php echo json_encode($model->user_logist_name); ?>,
            Contacts: <?php echo json_encode($model->Contacts); ?>,
            DialogId: <?php echo json_encode($DialogId); ?>,
            BodyDialogId: <?php echo json_encode($BodyDialogId); ?>,
        };

        if (DeliveryDemands.DialogId == '' || DeliveryDemands.DialogId == null) {
            DeliveryDemands.DialogId = 'EditDeliveryDemandDialog';
            DeliveryDemands.BodyDialogId = 'BodyDeliveryDemDialog';
        }
        
        var StateInsert = <?php echo json_encode((Yii::app()->controller->action->id == 'Insert')); ?>;
        var Log = <?php echo json_encode(Yii::app()->user->checkAccess('LogDeliveryDemands')); ?>;
        
        var DataDeliveryTypes = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDeliveryTypes, {}));
        var DataDemandPriors = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDemandPriors, {}), {
                        formatData: function (data) {
                            $.extend(data, {
                                Filters: ["dp.for_dd = 1"],
                            });
                            return data;
                        },});
        var DataAddress = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListAddresses, {async: true}));
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {async: false}));
        DataEmployees.dataBind();
        var find = function(id) {
            for (var i = 0; i < DataAddress.records.length; i++) {
                if (DataAddress.records[i].Object_id == id) {
                    return DataAddress.records[i];
                }
            }
            return null;
        };
        $("#edEditAddress").on('select', function(event){
            var args = event.args;
            if (args) {
                var item = args.item;
                var value = item.value;
                var res = find(item.value);
                if (res != null) {
                    var DataContactInfo = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContactInfo, {}), {
                        formatData: function (data) {
                            $.extend(data, {
                                Filters: ["ci.ObjectGr_id = " + res.ObjectGr_id],
                            });
                            return data;
                        },
                    });
                    $("#edEditContactInfo").jqxComboBox({source: DataContactInfo});
                }
            }
        });
        $("#edEditAddress").on('bindingComplete', function(event){
            if (DeliveryDemands.Objc_id != '') $("#edEditAddress").jqxComboBox('val', DeliveryDemands.Objc_id);
            $("#btnDeliveryDemOk").jqxButton({disabled: false});
        });
        $("#edEditContactInfo").on('select', function(event){
            var args = event.args;
            if (args) {
                var item = args.item;
                var value = item.value;
                var label = item.label;
                var val = $("#edEditContacts").jqxInput('val');
                $("#edEditContacts").jqxInput('val', val + ' ' + label);
            }
        });
        
        $("#edEditDeliveryPrior").on('select', function(event){
            var args = event.args;
            if (args) {
                var item = args.item;
                var ParamPrty_id = item.value;
                var ParamDate = new Date();
                var DateStr = ('0' + ParamDate.getDate()).slice(-2) + '.' + ('0' + (ParamDate.getMonth() + 1)).slice(-2) + '.' + ParamDate.getFullYear();

                $.ajax({
                    url: '<?php echo Yii::app()->createUrl('Delivery/GetDeadline'); ?>',
                    type: 'POST',
                    data: {
                        Params: {
                            Prty_id: ParamPrty_id,
                            Date: DateStr
                        }
                    },
                    success: function(Res) {
                        var Tmp = Aliton.DateConvertToJs(Res);
                        $("#edEditDeadline").jqxDateTimeInput('val', Tmp);
                    }
                });
            }
        });
        
        $("#edEditDldm_id").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Номер", width: 100}));
        $("#edEditDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: DeliveryDemands.Date}));
        $("#edEditDeliveryType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { placeHolder: '', source: DataDeliveryTypes, width: '200', height: '25px', displayMember: "DeliveryType", valueMember: "dltp_id"}));
        $("#edEditDeliveryPrior").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { placeHolder: '', source: DataDemandPriors, width: '200', height: '25px', displayMember: "DemandPrior", valueMember: "DemandPrior_id"}));
        $("#edEditDeadline").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: DeliveryDemands.Deadline, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edEditBestDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: DeliveryDemands.BestDate}));
        $("#edEditPromiseDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: DeliveryDemands.DatePromise}));
        $("#edEditAddress").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { placeHolder: '', source: DataAddress, width: '460', height: '25px', displayMember: "Addr", valueMember: "Object_id"}));
        $("#edEditMaster").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { placeHolder: '', source: DataEmployees.records, width: '210', height: '25px', displayMember: "EmployeeName", valueMember: "Employee_id"}));
        $("#edEditContacts").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Контакты", width: 230}));
        $("#edEditContactInfo").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { placeHolder: '', width: '210', height: '25px', displayMember: "contact", valueMember: "Info_id"}));
        $("#edEditPhoneNumber").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Телефон", width: 200}));
        $("#edEditText").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 700 }));
        $('#btnDeliveryDemOk').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true, width: 120, height: 30 }));
        $('#btnDeliveryDemCancel').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));

        $('#btnDeliveryDemCancel').on('click', function(){
            $('#' + DeliveryDemands.DialogId).jqxWindow('close');
        });

        $('#btnDeliveryDemOk').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('Delivery/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('Delivery/Insert')); ?>;
            $.ajax({
                url: Url,
                type: 'POST',
                data: $('#DeliveryDemands').serialize() + "&DialogId=" + DeliveryDemands.DialogId + "&BodyDialogId=" + DeliveryDemands.BodyDialogId,
                success: function(Res) {
                    if (Res == '1') {
                        
                        $('#' + DeliveryDemands.DialogId).jqxWindow('close');
                        if (DeliveryDemands.DialogId == 'EditDeliveryDemandDialog') {
                            $('#EditDeliveryDemandDialog').jqxWindow('close');
                            $("#DeliveryDemandsGrid").jqxGrid('updatebounddata');
                        }
                        if (DeliveryDemands.DialogId == 'CostCalculationsDialog')
                            $('#RefreshCostCalcDocuments').click();
                        if (DeliveryDemands.DialogId == 'RepairsDialog')
                            $('#GridDocuments').jqxGrid('updatebounddata');
                    }
                    else
                        $('#' + DeliveryDemands.BodyDialogId).html(Res);
                }
            });
        });
        
        
        if ((Log) && (!StateInsert)) {
            $("#edEditDeliveryMan").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { placeHolder: '', source: DataEmployees.records, width: '210', height: '25px', displayMember: "EmployeeName", valueMember: "Employee_id"}));
            if (DeliveryDemands.empl_dlvr_id != '') $("#edEditDeliveryMan").jqxComboBox("val", DeliveryDemands.empl_dlvr_id);
            var DataDelayReasons = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDelayReasonsLogistik, {async: false}));
            $("#edEditDelayReason").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { placeHolder: '', source: DataDelayReasons, width: '470', height: '25px', displayMember: "name", valueMember: "dlrs_id"}));
            if (DeliveryDemands.Dlrs_id != '') $("#edEditDelayReason").jqxComboBox("val", DeliveryDemands.Dlrs_id);
            if (DeliveryDemands.empl_dlvr_id != '') $("#edEditDelayReason").jqxComboBox("val", DeliveryDemands.empl_dlvr_id);
            $("#edEditNote").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 700 }));
            if (DeliveryDemands.Note != '') $("#edEditNote").jqxTextArea("val", DeliveryDemands.Note);
            $("#edEditRepDelivery").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 700 }));
            if (DeliveryDemands.RepDelivery != '') $("#edEditRepDelivery").jqxTextArea("val", DeliveryDemands.RepDelivery);
            $("#edEditDateLogist").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: DeliveryDemands.DateLogist,  readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
            $("#edEditDateDelivery").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: DeliveryDemands.DateDelivery}));
            $("#edEditDatePlan").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: DeliveryDemands.PlanDate}));
            
        }
        
        if (DeliveryDemands.Dldm_id != '') $("#edEditDldm_id").jqxInput("val", DeliveryDemands.Dldm_id);
        if (DeliveryDemands.Dltp_id != '') $("#edEditDeliveryType").jqxComboBox("val", DeliveryDemands.Dltp_id);
        if (DeliveryDemands.Prty_id != '') $("#edEditDeliveryPrior").jqxComboBox("val", DeliveryDemands.Prty_id);
        if (DeliveryDemands.Mstr_id != '') $("#edEditMaster").jqxComboBox("val", DeliveryDemands.Mstr_id);
        if (DeliveryDemands.Contacts != '') $("#edEditContacts").jqxInput("val", DeliveryDemands.Contacts);
        if (DeliveryDemands.PhoneNumber != '') $("#edEditPhoneNumber").jqxInput("val", DeliveryDemands.PhoneNumber);
        if (DeliveryDemands.Text != '') $("#edEditText").jqxTextArea("val", DeliveryDemands.Text);
        
        
        
        
    });
</script>

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'DeliveryDemands',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<input type="hidden" name="DeliveryDemands[calc_id]" value="<?php echo $model->calc_id; ?>" />
<input type="hidden" name="DeliveryDemands[repr_id]" value="<?php echo $model->repr_id; ?>" />
<input type="hidden" name="DeliveryDemands[dmnd_id]" value="<?php echo $model->dmnd_id; ?>" />

<div class="row">
    <div class="row-column">
        <div>Номер</div>
        <div><input readonly="readonly" name="DeliveryDemands[dldm_id]" id="edEditDldm_id" type="text" /></div>
    </div>
    <div class="row-column">
        <div>Подана</div>
        <div><div id="edEditDate" name="DeliveryDemands[date]"></div></div>
    </div>
    <div class="row-column">
        <div>Вид доставки</div>
        <div><div id="edEditDeliveryType" name="DeliveryDemands[dltp_id]"></div><?php echo $form->error($model, 'dltp_id'); ?></div>
    </div>
</div>
<div class="row">
    <div class="row-column">
        <div>Приоритет</div>
        <div><div id="edEditDeliveryPrior" name="DeliveryDemands[prty_id]"></div><?php echo $form->error($model, 'prty_id'); ?></div>
    </div>
    <div class="row-column">
        <div>Предельная дата</div>
        <div><div id="edEditDeadline" name="DeliveryDemands[deadline]"></div></div>
    </div>
    <div class="row-column">
        <div>Желаемая дата</div>
        <div><div id="edEditBestDate" name="DeliveryDemands[bestdate]"></div></div>
    </div>
    <div class="row-column">
        <div>Обещанная дата</div>
        <div><div id="edEditPromiseDate" name="DeliveryDemands[date_promise]"></div></div>
    </div>
</div>
<div class="row">
    <div class="row-column">
        <div>Адрес объекта</div>
        <div><div id="edEditAddress" name="DeliveryDemands[objc_id]"></div></div>
    </div>
    <div class="row-column">
        <div>Мастер</div>
        <div><div id="edEditMaster" name="DeliveryDemands[mstr_id]"></div></div>
    </div>
</div>
<div class="row">
    <div class="row-column">
        <div>Контактное лицо</div>
        <div><input type="text" id="edEditContacts" name="DeliveryDemands[Contacts]"/></div>
    </div>
    <div class="row-column">
        <div>Из карточки</div>
        <div><div id="edEditContactInfo"></div></div>
    </div>
    <div class="row-column">
        <div>Телефон</div>
        <div><input type="text" id="edEditPhoneNumber" name="DeliveryDemands[phonenumber]"/></div>
    </div>
</div>
<div class="row">
    <div class="row-column">
        <div>Содержание заявки</div>
        <div><textarea id="edEditText" name="DeliveryDemands[text]"></textarea></div>
    </div>
</div>

<?php if ((Yii::app()->user->checkAccess('LogDeliveryDemands')) && (Yii::app()->controller->action->id != 'Insert')) {?>

<div class="row">
    <div class="row-column">
        <div>Курьер</div>
        <div><div id="edEditDeliveryMan" name="DeliveryDemands[empl_dlvr_id]"></div></div>
    </div>
    <div class="row-column">
        <div>Причина просрочки</div>
        <div><div id="edEditDelayReason" name="DeliveryDemands[dlrs_id]"></div></div>
    </div>
    
</div>    
<div class="row">
    <div class="row-column">
        <div>Примечание</div>
        <div><textarea id="edEditNote" name="DeliveryDemands[note]"></textarea></div>
    </div>   
</div>
<div class="row">
    <div class="row-column">
        <div>Отчет курьера</div>
        <div><textarea id="edEditRepDelivery" name="DeliveryDemands[rep_delivery]"></textarea></div>
    </div>   
</div>
<div class="row">
    <div class="row-column">Принята<div id="edEditDateLogist" name="DeliveryDemands[date_logist]"></div></div>
    <div class="row-column">Выполнена<div id="edEditDateDelivery" name="DeliveryDemands[date_delivery]"></div></div>
    <div class="row-column" style="float: right;">Планируется выполнить<div id="edEditDatePlan" name="DeliveryDemands[plandate]"></div></div>
</div>    
<input type="hidden" id="edUserLogist" name="DeliveryDemands[user_logist]" value="<?php echo $model->user_logist; ?>"/>


<?php } ?>

<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnDeliveryDemOk' /></div>
    <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='btnDeliveryDemCancel' /></div>
</div>

<?php $this->endWidget(); ?>