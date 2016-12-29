<script type="text/javascript">
    var DeliveryGO = {};
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
        var FlagLog = Boolean(Number(<?php echo json_encode(Yii::app()->user->checkAccess('LogDeliveryDemands')) ?>));
        var DetailMode = '';
        
        var SetValueControls = function() {
            $("#edNumber").jqxNumberInput('val', DeliveryDemands.Dldm_id); 
            $("#edDeliveryType").jqxInput('val', DeliveryDemands.DeliveryType); 
            $("#edPrior").jqxInput('val', DeliveryDemands.DemandPrior); 
            $("#edAddr").jqxInput('val', DeliveryDemands.Address); 
            $("#edMaster").jqxInput('val', DeliveryDemands.MasterName); 
            $("#edContactInfo").jqxInput('val', DeliveryDemands.ContactInfo); 
            $("#edPhonenumber").jqxInput('val', DeliveryDemands.PhoneNumber); 
            $("#edDeliveryMan").jqxInput('val', DeliveryDemands.DeliveryMan); 
            $("#edDelayReason").jqxInput('val', DeliveryDemands.DelayReasonName); 
            $("#edText").jqxTextArea('val', DeliveryDemands.Text); 
            $("#edNote").jqxTextArea('val', DeliveryDemands.Note); 
            $("#edSender").jqxInput('val', DeliveryDemands.Sender); 
            $("#edLogist").jqxInput('val', DeliveryDemands.Logist);
        };
        
        DeliveryGO.Refresh = function() {
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Delivery/GetModel'))?>,
                type: 'POST',
                data: {
                    Dldm_id: DeliveryDemands.Dldm_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    DeliveryDemands.Date = Aliton.DateConvertToJs(Res.date);
                    DeliveryDemands.DateLogist = Aliton.DateConvertToJs(Res.date_logist);
                    DeliveryDemands.DeliveryType = Res.DeliveryType;
                    DeliveryDemands.DemandPrior = Res.DemandPrior;
                    DeliveryDemands.BestDate = Aliton.DateConvertToJs(Res.bestdate);
                    DeliveryDemands.Deadline = Aliton.DateConvertToJs(Res.deadline);
                    DeliveryDemands.DatePromise = Aliton.DateConvertToJs(Res.date_promise);
                    DeliveryDemands.Address = Res.Addr;
                    DeliveryDemands.MasterName = Res.MasterName;
                    DeliveryDemands.ContactInfo = Res.contact_info;
                    DeliveryDemands.PhoneNumber = Res.phonenumber;
                    DeliveryDemands.DeliveryMan = Res.DeliveryMan;
                    DeliveryDemands.DelayReasonName = Res.delayreasonname;
                    DeliveryDemands.Text = Res.text;
                    DeliveryDemands.Note = Res.note;
                    DeliveryDemands.Sender = Res.user_sender_name;
                    DeliveryDemands.Logist = Res.user_logist_name;
                    SetValueControls();
                    //SetStateButtons();
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        };
        
        $("#edNumber").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { disabled: false, width: '75px', height: '25px', decimalDigits: 0 }));
        $("#edDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 120, value: DeliveryDemands.Date, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edDeliveryType").jqxInput({height: 25, width: 120, minLength: 1});
        $("#edPrior").jqxInput({height: 25, width: 120, minLength: 1});
        $("#edBestDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 120, value: DeliveryDemands.BestDate, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edDeadline").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 120, value: DeliveryDemands.deadline, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edPromise").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 120, value: DeliveryDemands.DatePromise, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edAddr").jqxInput({height: 25, width: 350, minLength: 1});
        $("#edMaster").jqxInput({height: 25, width: 150, minLength: 1});
        $("#edContactInfo").jqxInput({height: 25, width: 350, minLength: 1});
        $("#edPhonenumber").jqxInput({height: 25, width: 150, minLength: 1});
        $("#edDeliveryMan").jqxInput({height: 25, width: 150, minLength: 1});
        $("#edDelayReason").jqxInput({height: 25, width: 250, minLength: 1});
        $("#edText").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: 360}));
        $("#edNote").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: 360}));
        $("#edSender").jqxInput({height: 25, width: 130, minLength: 1});
        $("#edLogist").jqxInput({height: 25, width: 130, minLength: 1});
        $('#btnEdit').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnAccept').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: (DeliveryDemands.DateLogist != null), width: 120, height: 30 }));
        $('#btnPrint').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnPrint').on('click', function(){
            window.open(<?php echo json_encode(Yii::app()->createUrl('Reports/ReportOpen', array(
                'ReportName' => '/Заявки на доставку/Заявка на доставку',
                'Ajax' => false,
                'Render' => true,
                'Parameters' => array('Dldm_id' => $model->dldm_id),
            ))); ?>)
        });
        
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
                            height: 'calc(100% - 2px)',
                            width: 'calc(100% - 2px)',
                            showfilterrow: false,
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
                    $("#DeliveryDetailsGrid").on('rowselect', function (event) {
                        Row = $('#DeliveryDetailsGrid').jqxGrid('getrowdata', event.args.rowindex);
                        if (Row != undefined) {
                            $('#btnEditEquip').jqxButton({disabled: false});
                            $('#btnDelEquip').jqxButton({disabled: false});
                        }
                    });
                    $("#DeliveryDetailsGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 2px)',
                            width: 'calc(100% - 2px)',
                            showfilterrow: false,
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
                    $('#btnEditEquip').jqxButton($.extend(true, {}, ButtonDefaultSettings, {disabled: true, width: 120, height: 30 }));
                    $('#btnDelEquip').jqxButton($.extend(true, {}, ButtonDefaultSettings, {disabled: true, width: 120, height: 30 }));
                    
                    $('#btnAddEquip').on('click', function(){
                        DetailMode = 'Create';
                        $.ajax({
                            url: '<?php echo Yii::app()->createUrl('DeliveryDetails/Create'); ?>',
                            type: 'POST',
                            data: {dldm_id: DeliveryDemands.Dldm_id},
                            async: false,
                            success: function(Res) {
                                $('#BodyDeliveryDetailDialog').html(Res);
                            }
                        });
                        $('#EditDeliveryDetailDialog').jqxWindow('open');
                    });
                    
                    $('#btnEditEquip').on('click', function(){
                        DetailMode = 'Update';
                        var rowindex = $('#DeliveryDetailsGrid').jqxGrid('getselectedrowindex');
                        var Row = $('#DeliveryDetailsGrid').jqxGrid('getrowdata', rowindex);
                        if (Row != undefined) {
                            $.ajax({
                                url: '<?php echo Yii::app()->createUrl('DeliveryDetails/Update'); ?>',
                                type: 'POST',
                                data: {dldt_id: Row.dldt_id},
                                async: false,
                                success: function(Res) {
                                    $('#BodyDeliveryDetailDialog').html(Res);
                                }
                            });
                        };
                        $('#EditDeliveryDetailDialog').jqxWindow('open');
                    });
                    
                    $('#btnDelEquip').on('click', function(){
                        var rowindex = $('#DeliveryDetailsGrid').jqxGrid('getselectedrowindex');
                        var Row = $('#DeliveryDetailsGrid').jqxGrid('getrowdata', rowindex);
                        if (Row != undefined) {
                            $.ajax({
                                url: '<?php echo Yii::app()->createUrl('DeliveryDetails/Delete'); ?>',
                                type: 'POST',
                                data: {dldt_id: Row.dldt_id},
                                async: false,
                                success: function(Res) {
                                    $("#DeliveryDetailsGrid").jqxGrid('updatebounddata');
                                }
                            });
                        }
                    });
                    
                    break;
            }
        };
        $('#edTabs').jqxTabs({ width: '100%', height: 'calc(100% - 2px)', initTabContent: initWidgets});
        
        $('#EditDeliveryDetailDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '210px', width: '700px', position: 'center'}));
        $('#EditDeliveryDetailDialog').jqxWindow({initContent: function() {
            $('#btnDeliveryDetailOk').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
            $('#btnDeliveryDetailCancel').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
            $('#btnDeliveryDetailCancel').on('click', function(){
                $('#EditDeliveryDetailDialog').jqxWindow('close');
            });
            $('#btnDeliveryDetailOk').on('click', function(){
                var url = '';
                if (DetailMode == 'Create')
                    url = <?php echo json_encode(Yii::app()->createUrl('DeliveryDetails/Create')); ?>;
                else
                    url = <?php echo json_encode(Yii::app()->createUrl('DeliveryDetails/Update')); ?>;
                
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: $("#DeliveryDetails").serialize(),
                    success: function(Res) {
                        if (Res == '1') {
                            $("#DeliveryDetailsGrid").jqxGrid('updatebounddata');
                            $('#EditDeliveryDetailDialog').jqxWindow('close');
                        }
                        else
                            $('#BodyDeliveryDetailDialog').html(Res);
                    
                    }
                });
                //
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
            
        });
        $('#EditDeliveryDemandDialog').on('open', function(){
//            $('#btnDeliveryDemOk').jqxButton({disabled: true});
        });
        $('#EditDeliveryDemandDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '800px', width: '740', position: 'center'}));
        
        LoadEditForm = function(Url, Data, Type) {
            if (FlagLog)
                $('#EditDeliveryDemandDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '800px', width: '740', position: 'center'}));
            else
                $('#EditDeliveryDemandDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '460px', width: '740', position: 'center'}));
            
            $.ajax({
                url: Url,
                type: Type,
                data: Data,
                async: true,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $('#BodyDeliveryDemDialog').html(Res.html);
                    $('#EditDeliveryDemandDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        };
        
    });
</script>    

<div class="al-row">
    <div class="al-row-column">Номер</div>
    <div class="al-row-column"><div readonly="readonly" id="edNumber"></div></div>
    <div class="al-row-column">Подана</div>
    <div class="al-row-column"><div id="edDate"></div></div>
    <div class="al-row-column">Вид доставки</div>
    <div class="al-row-column"><input readonly="readonly" id="edDeliveryType" /></div>
    <div class="al-row-column">Приоритет</div>
    <div class="al-row-column"><input readonly="readonly" id="edPrior" /></div>
    <div style="clear: both"></div>
</div>    

<div class="al-row">
    <div class="al-row-column">Желаемая</div>
    <div class="al-row-column"><div id="edBestDate"></div></div>
    <div class="al-row-column">Предельная</div>
    <div class="al-row-column"><div id="edDeadline"></div></div>
    <div class="al-row-column">Обещанная</div>
    <div class="al-row-column"><div id="edPromise"></div></div>
    <div class="al-row-column">Мастер</div>
    <div class="al-row-column"><input readonly="readonly" id="edMaster" /></div>
    <div style="clear: both"></div>
</div>    
<div class="al-row">
    <div class="al-row-column">Адрес</div>
    <div class="al-row-column"><input readonly="readonly" id="edAddr" /></div>
    <div class="al-row-column">Конт. лицо</div>
    <div class="al-row-column"><input readonly="readonly" id="edContactInfo" /></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column">Телефон</div>
    <div class="al-row-column"><input readonly="readonly" id="edPhonenumber" /></div>
    <div class="al-row-column">Курьер</div>
    <div class="al-row-column"><input readonly="readonly" id="edDeliveryMan" /></div>
    <div class="al-row-column">Причина просрочки</div>
    <div class="al-row-column"><input readonly="readonly" id="edDelayReason" /></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column">
        <div>Содержание заявки</div>
        <div><textarea id="edText"></textarea></div>
    </div>
    <div class="al-row-column">
        <div>Примечание</div>
        <div><textarea id="edNote"></textarea></div>
    </div>
    <div class="al-row-column">
        <div class="al-row" style="margin: 0; padding: 0;">Заявку подал</div>
        <div class="al-row" style="margin: 0; padding: 0;"><input readonly="readonly" id="edSender" /></div>
        <div class="al-row" style="margin: 0; padding: 0;">Заявку принял</div>
        <div class="al-row" style="margin: 0; padding: 0;"><input readonly="readonly" id="edLogist" /></div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Изменить" id='btnEdit' /></div>
    <div class="al-row-column"><input type="button" value="Принять" id='btnAccept' /></div>
    <div class="al-row-column" style="float: right;"><input type="button" value="Печать" id='btnPrint' /></div>
    <div style="clear: both"></div>
</div>
<div class="al-row" style="height: calc(100% - 286px)">
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
            <div style="padding: 10px; height: 100%">
                <div class="al-row" style="height: calc(100% - 62px)">
                    <div id="DeliveryCommentsGrid"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column"><input id="edComment" type="text"/></div>
                    <div class="al-row-column"><input type="button" value="Написать" id='btnSend' /></div>
                    <div class="al-row-column" style="float: right;"><input type="button" value="Удалить" id='btnDelComment' /></div>
                    <div style="clear: both;"></div>
                </div>
                
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: 100%">
                <div class="al-row" style="height: calc(100% - 62px)">
                    <div id="DeliveryDetailsGrid"></div>
                </div>
                <div style="clear: both;"></div>
                <div class="al-row">
                    <div class="al-row-column"><input type="button" value="Добавить" id='btnAddEquip' /></div>
                    <div class="al-row-column"><input type="button" value="Изменить" id='btnEditEquip' /></div>
                    <div class="al-row-column" style="float: right;"><input type="button" value="Удалить" id='btnDelEquip' /></div>
                    <div style="clear: both;"></div>
                </div>
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
        <!--
        <div id="BottomDeliveryDemDialog">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='btnDeliveryDemOk' /></div>
                <div class="row-column" style="margin-left: 160px"><input type="button" value="Принять" id='btnDeliveryDemAccept' /></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='btnDeliveryDemCancel' /></div>
            </div>
        </div>
        -->
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