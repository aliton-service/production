<script type="text/javascript">
    $(document).ready(function(){
        var DeliveryDemands = {
            Dldm_id: <?php echo json_encode($model->dldm_id); ?>,
            Date: Aliton.DateConvertToJs('<?php echo $model->date; ?>'),
            DateLogist: Aliton.DateConvertToJs('<?php echo $model->date_logist; ?>'),
            DeliveryType: <?php echo json_encode($model->DeliveryType); ?>,
            DemandPrior: <?php echo json_encode($model->DemandPrior); ?>,
            BestDate: Aliton.DateConvertToJs('<?php echo $model->bestdate; ?>'),
            Deadline: Aliton.DateConvertToJs('<?php echo $model->deadline; ?>'),
            DatePromise: Aliton.DateConvertToJs('<?php echo $model->date_promise; ?>'),
            Address: <?php echo json_encode($model->Addr); ?>,
            MasterName: <?php echo json_encode($model->MasterName); ?>,
            ContactInfo: <?php echo json_encode($model->contact_info); ?>,
            PhoneNumber: <?php echo json_encode($model->phonenumber); ?>,
            DeliveryMan: <?php echo json_encode($model->DeliveryMan); ?>,
            DelayReasonName: <?php echo json_encode($model->delayreasonname); ?>,
            Text: <?php echo json_encode($model->text); ?>,
            Note: <?php echo json_encode($model->note); ?>,
            Sender: <?php echo json_encode($model->user_sender_name); ?>,
            Logist: <?php echo json_encode($model->user_logist_name); ?>,
            CurrentUser: <?php echo json_encode(Yii::app()->user->Employee_id); ?>
        };
        
        $("#edNumber").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { disabled: true, width: '120px', height: '25px', decimalDigits: 0 }));
        $("#edDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: DeliveryDemands.Date, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edDeliveryType").jqxInput({height: 25, width: 200, minLength: 1});
        $("#edPrior").jqxInput({height: 25, width: 200, minLength: 1});
        $("#edBestDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: DeliveryDemands.BestDate, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edDeadline").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: DeliveryDemands.deadline, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edPromise").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: DeliveryDemands.DatePromise, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edAddr").jqxInput({height: 25, width: 350, minLength: 1});
        $("#edMaster").jqxInput({height: 25, width: 150, minLength: 1});
        $("#edContactInfo").jqxInput({height: 25, width: 350, minLength: 1});
        $("#edPhonenumber").jqxInput({height: 25, width: 150, minLength: 1});
        $("#edDeliveryMan").jqxInput({height: 25, width: 150, minLength: 1});
        $("#edDelayReason").jqxInput({height: 25, width: 250, minLength: 1});
        $("#edText").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: 360}));
        $("#edNote").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: 360}));
        $("#edSender").jqxInput({height: 25, width: 250, minLength: 1});
        $("#edLogist").jqxInput({height: 25, width: 250, minLength: 1});
        $('#btnEdit').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnAccept').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: (DeliveryDemands.DateLogist != null), width: 120, height: 30 }));
        $('#btnPrint').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        
        $('#btnAccept').on('click', function(){
                $.ajax({
                    url: '<?php echo Yii::app()->createUrl('Delivery/ToLogist')?>',
                    data: {Dldm_id: DeliveryDemands.Dldm_id},
                    type: 'POST',
                    async: false,
                    success: function(Res) {
                        if (Res == '1')
                            location.reload();
                    }
                });
        });
        
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    var DataComments = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDeliveryComments, {}), {
                        formatData: function (data) {
                            $.extend(data, {
                                Filters: ["dc.dldm_id = " + DeliveryDemands.Dldm_id],
                            });
                            return data;
                        },
                    });
                    $("#DeliveryCommentsGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 200,
                            width: '100%',
                            showfilterrow: true,
                            autoshowfiltericon: true,
                            source: DataComments,
                            pagesizeoptions: ['10', '200', '500', '1000'],
                            pagesize:200,
                            autorowheight: true,
                            virtualmode: true,
                            columns:
                                [
                                    { text: 'Дата сообщения', filtertype: 'date', datafield: 'date_create', filtercondition: 'DATE_EQUAL', cellsformat: 'dd.MM.yyyy HH:mm', width: 130 },
                                    { text: 'Администрирующий', datafield: 'Employeename', width: 150 },
                                    { text: 'Текст сообщения', datafield: 'text', width: 450 },
                                ],
                            }));
                    $("#edComment").jqxInput({height: 25, width: 450, minLength: 1});
                    $('#btnSend').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnDelComment').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $("#edComment").on('keydown', function(event){
                        if (event.which == 13)
                            $('#btnSend').click();   
                    });
                    
                    $('#btnSend').on('click', function(){
                        $.ajax({
                            url: '<?php echo Yii::app()->createUrl('DeliveryComments/Create')?>',
                            type: 'POST',
                            data: {
                                DeliveryComments: {
                                    dldm_id: DeliveryDemands.Dldm_id,
                                    text: $("#edComment").jqxInput('val'),
                                    EmplCreate: DeliveryDemands.CurrentUser
                                }
                            },
                            success: function(Res) {
                                if (Res == '1') {
                                    $("#edComment").jqxInput('val', ''),
                                    $("#DeliveryCommentsGrid").jqxGrid("updatebounddata");
                                }
                            }
                        });
                    });
                    
                    $('#btnDelComment').on('click', function(){
                        var rowindex = $('#DeliveryCommentsGrid').jqxGrid('getselectedrowindex');
                        var Row = $('#DeliveryCommentsGrid').jqxGrid('getrowdata', rowindex);
                        if (Row != undefined) {
                            if (Row.EmplCreate != parseInt(DeliveryDemands.CurrentUser)) return 0;
                            $.ajax({
                                url: '<?php echo Yii::app()->createUrl('DeliveryComments/Delete')?>',
                                type: 'POST',
                                data: {Dlcm_id: Row.dlcm_id},
                                success: function(Res) {
                                    if (Res == '1')
                                        $("#DeliveryCommentsGrid").jqxGrid("updatebounddata");

                                }
                            });
                        }
                    });
                    
                    break;
                case 1:
                    var DataDetails = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDeliveryDetails, {}), {
                        formatData: function (data) {
                            $.extend(data, {
                                Filters: ["dt.dldm_id = " + DeliveryDemands.Dldm_id],
                            });
                            return data;
                        },
                    });
                    $("#DeliveryDetailsGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 200,
                            width: '100%',
                            showfilterrow: true,
                            autoshowfiltericon: true,
                            source: DataDetails,
                            pagesizeoptions: ['10', '200', '500', '1000'],
                            pagesize:200,
                            autorowheight: true,
                            virtualmode: true,
                            columns:
                                [
                                    { text: 'Оборуование', datafield: 'equipname', width: 230 },
                                    { text: 'Ед. изм.', datafield: 'um_name', width: 100 },
                                    { text: 'Кол-во', datafield: 'quant', width: 150 },
                                    { text: 'Б\У', columntype: 'checkbox', datafield: 'used', width: 70 },
                                ],
                            }));
                    $('#btnAddEquip').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnEditEquip').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnDelEquip').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    
                    $('#btnAddEquip').on('click', function(){
                        $('#EditDeliveryDetailDialog').jqxWindow('open');
                    });
                    
                    
                    
                    break;
            }
        };
        $('#edTabs').jqxTabs({ width: '100%', height: 345, initTabContent: initWidgets});
        
        $('#EditDeliveryDetailDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '300px', width: '700px', position: 'center'}));
        $('#EditDeliveryDetailDialog').jqxWindow({initContent: function() {
            $('#btnDeliveryDetailOk').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
            $('#btnDeliveryDetailCancel').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
            $('#btnDeliveryDetailCancel').on('click', function(){
                $('#EditDeliveryDetailDialog').jqxWindow('close');
            });
            
        }});
        
        if (DeliveryDemands.Dldm_id != '') $("#edNumber").jqxNumberInput('val', DeliveryDemands.Dldm_id); 
        if (DeliveryDemands.DeliveryType != '') $("#edDeliveryType").jqxInput('val', DeliveryDemands.DeliveryType); 
        if (DeliveryDemands.DemandPrior != '') $("#edPrior").jqxInput('val', DeliveryDemands.DemandPrior); 
        if (DeliveryDemands.Address != '') $("#edAddr").jqxInput('val', DeliveryDemands.Address); 
        if (DeliveryDemands.MasterName != '') $("#edMaster").jqxInput('val', DeliveryDemands.MasterName); 
        if (DeliveryDemands.ContactInfo != '') $("#edContactInfo").jqxInput('val', DeliveryDemands.ContactInfo); 
        if (DeliveryDemands.PhoneNumber != '') $("#edPhonenumber").jqxInput('val', DeliveryDemands.PhoneNumber); 
        if (DeliveryDemands.DeliveryMan != '') $("#edDeliveryMan").jqxInput('val', DeliveryDemands.DeliveryMan); 
        if (DeliveryDemands.DelayReasonName != '') $("#edDelayReason").jqxInput('val', DeliveryDemands.DelayReasonName); 
        if (DeliveryDemands.Text != '') $("#edText").jqxTextArea('val', DeliveryDemands.Text); 
        if (DeliveryDemands.Note != '') $("#edNote").jqxTextArea('val', DeliveryDemands.Note); 
        if (DeliveryDemands.Sender != '') $("#edSender").jqxInput('val', DeliveryDemands.Sender); 
        if (DeliveryDemands.Logist != '') $("#edLogist").jqxInput('val', DeliveryDemands.Logist);
        
        $('#btnEdit').on('click', function(){
            LoadEditForm('<?php echo Yii::app()->createUrl('Delivery/Update'); ?>', {Dldm_id: DeliveryDemands.Dldm_id}, 'POST');
            $('#EditDeliveryDemandDialog').jqxWindow('open');
        });
        $('#EditDeliveryDemandDialog').on('open', function(){
            $('#btnDeliveryDemOk').jqxButton({disabled: true});
        });
        $('#EditDeliveryDemandDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '800px', width: '740'}));
        $('#EditDeliveryDemandDialog').jqxWindow({initContent: function() {
            $('#btnDeliveryDemOk').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true, width: 120, height: 30 }));
            $('#btnDeliveryDemCancel').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
            $('#btnDeliveryDemAccept').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: (DeliveryDemands.DateLogist != null), width: 120, height: 30 }));
            
            $('#btnDeliveryDemAccept').on('click', function(){
                var Tmp = new Date();
                $('#edEditDateLogist').jqxDateTimeInput({value: Tmp});
                $('#edUserLogist').val(DeliveryDemands.CurrentUser);
            });
            
            $('#btnDeliveryDemCancel').on('click', function(){
                $('#EditDeliveryDemandDialog').jqxWindow('close');
            });
            
            $('#btnDeliveryDemOk').on('click', function(){
                $.ajax({
                    url: '<?php echo Yii::app()->createUrl('Delivery/Update'); ?>',
                    type: 'POST',
                    data: $('#DeliveryDemands').serialize(),
                    success: function(Res) {
                        if (Res == '1') {
                            $('#EditDeliveryDemandDialog').jqxWindow('close');
                            location.reload();
                        }
                        else
                            $('#BodyDeliveryDemDialog').html(Res);
                    }
                });
            });
        }});
        
        LoadEditForm = function(Url, Data, Type) {
            $.ajax({
                url: Url,
                type: Type,
                data: Data,
                async: false,
                success: function(Res) {
                    $('#BodyDeliveryDemDialog').html(Res);
                }
            });
        };
        
    });
</script>    

<div class="row">
    <div class="row-column">Номер</div>
    <div class="row-column"><div id="edNumber"></div></div>
    <div class="row-column">Подана</div>
    <div class="row-column"><div id="edDate"></div></div>
</div>    
<div class="row">
    <div class="row-column">Вид доставки</div>
    <div class="row-column"><input readonly="readonly" id="edDeliveryType" /></div>
    <div class="row-column">Приоритет</div>
    <div class="row-column"><input readonly="readonly" id="edPrior" /></div>
</div>
<div class="row">
    <div class="row-column">Желаемая</div>
    <div class="row-column"><div id="edBestDate"></div></div>
    <div class="row-column">Предельная</div>
    <div class="row-column"><div id="edDeadline"></div></div>
    <div class="row-column">Обещанная</div>
    <div class="row-column"><div id="edPromise"></div></div>
</div>    
<div class="row">
    <div class="row-column">Адрес объекта</div>
    <div class="row-column"><input readonly="readonly" id="edAddr" /></div>
    <div class="row-column">Мастер</div>
    <div class="row-column"><input readonly="readonly" id="edMaster" /></div>
</div>
<div class="row">
    <div class="row-column">Конт. лицо</div>
    <div class="row-column"><input readonly="readonly" id="edContactInfo" /></div>
    <div class="row-column">Телефон</div>
    <div class="row-column"><input readonly="readonly" id="edPhonenumber" /></div>
</div>
<div class="row">
    <div class="row-column">Курьер</div>
    <div class="row-column"><input readonly="readonly" id="edDeliveryMan" /></div>
    <div class="row-column">Причина просрочки</div>
    <div class="row-column"><input readonly="readonly" id="edDelayReason" /></div>
</div>
<div class="row">
    <div class="row-column">
        <div>Содержание заявки</div>
        <div><textarea id="edText"></textarea></div>
    </div>
    <div class="row-column">
        <div>Примечание</div>
        <div><textarea id="edNote"></textarea></div>
    </div>
</div>
<div class="row">
    <div class="row-column">Заявку подал</div>
    <div class="row-column"><input readonly="readonly" id="edSender" /></div>
    <div class="row-column">Заявку принял</div>
    <div class="row-column"><input readonly="readonly" id="edLogist" /></div>
</div>    
<div class="row" style="width: 1024px">
    <div class="row-column"><input type="button" value="Изменить" id='btnEdit' /></div>
    <div class="row-column"><input type="button" value="Принять" id='btnAccept' /></div>
    <div class="row-column" style="float: right;"><input type="button" value="Печать" id='btnPrint' /></div>
</div>
<div id='edTabs' style="margin-top: 5px;">
    <ul>
        <li style="margin-left: 20px;">
            <div style="height: 20px; margin-top: 5px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Ход работы</div>
                
            </div>
        </li>
        <li>
            <div style="height: 20px; margin-top: 5px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Оборудование</div>
            </div>
        </li>
    </ul>
    <div style="overflow: hidden;">
        <div style="padding: 10px;">
            <div id="DeliveryCommentsGrid"></div>
            <div style="clear: both;"></div>
            <div style="margin-top: 6px;">
                <div style="float: left"><input id="edComment" type="text"/></div>
                <div style="float: left; margin-left: 6px;"><input type="button" value="Написать" id='btnSend' /></div>
                <div style="float: right; margin-left: 6px;"><input type="button" value="Удалить" id='btnDelComment' /></div>
            </div>
        </div>
    </div>
    <div style="overflow: hidden;">
        <div style="padding: 10px;">
            <div id="DeliveryDetailsGrid"></div>
            <div style="clear: both;"></div>
            <div style="margin-top: 6px;">
                <div style="float: left;"><input type="button" value="Добавить" id='btnAddEquip' /></div>
                <div style="float: left; margin-left: 6px;"><input type="button" value="Изменить" id='btnEditEquip' /></div>
                <div style="float: left; margin-left: 6px;"><input type="button" value="Удалить" id='btnDelEquip' /></div>
            </div>
        </div>
    </div>
</div>
<div id="EditDeliveryDemandDialog">
    <div id="DeliveryDemandDialogHeader">
        <span id="HeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="/* overflow: hidden; */padding: 10px;" id="DialogDeliveryContent">
        <div style="/*overflow: hidden;*/" id="BodyDeliveryDemDialog"></div>
        <div id="BottomDeliveryDemDialog">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='btnDeliveryDemOk' /></div>
                <div class="row-column" style="margin-left: 160px"><input type="button" value="Принять" id='btnDeliveryDemAccept' /></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='btnDeliveryDemCancel' /></div>
            </div>
        </div>
    </div>
</div>

<div id="EditDeliveryDetailDialog">
    <div id="DeliveryDetailDialogHeader">
        <span id="HeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogDeliveryDetailContent">
        <div id="BodyDeliveryDetailDialog"></div>
        <div id="BottomDeliveryDetailDialog">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='btnDeliveryDetailOk' /></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='btnDeliveryDetailCancel' /></div>
            </div>
        </div>
    </div>
</div>