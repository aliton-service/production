<script type="text/javascript">
    $(document).ready(function () {
        var CurrentRowData;
        // Присваиваем значения по умолчанию для фильтров
        var Demand = {
            Demand_id: <?php echo json_encode($model->Demand_id); ?>,
            ObjectGr_id: <?php echo $model->ObjectGr_id; ?>,
            Address: <?php echo json_encode($model->Address); ?>,
            DateReg: Aliton.DateConvertToJs('<?php echo $model->DateReg; ?>'),
            ServiceType: <?php echo json_encode($model->ServiceType); ?>,
            MasterName: <?php echo json_encode($model->MasterName); ?>,
            DemandType: <?php echo json_encode($model->DemandType); ?>,
            SystemType: <?php echo json_encode($model->SystemType); ?>,
            EquipType: <?php echo json_encode($model->EquipType); ?>,
            Malfunction: <?php echo json_encode($model->Malfunction); ?>,
            DemandPrior: <?php echo json_encode($model->DemandPrior); ?>,
            Contacts: <?php echo json_encode($model->Contacts); ?>,
            CloseReason: <?php echo json_encode($model->CloseReason); ?>,
            RepMaster: <?php echo json_encode($model->RepMaster); ?>,
            Deadline: Aliton.DateConvertToJs('<?php echo $model->Deadline; ?>'),
            AgreeDate: Aliton.DateConvertToJs('<?php echo $model->AgreeDate; ?>'),
            DateMaster: Aliton.DateConvertToJs('<?php echo $model->DateMaster; ?>'),
            DateExec: Aliton.DateConvertToJs('<?php echo $model->DateExec; ?>'),
            DateOfTrans: Aliton.DateConvertToJs('<?php echo $model->DateOfTransfer; ?>'),
            TransferReason: <?php echo json_encode($model->TransferReason); ?>,
            DelayReason: <?php echo json_encode($model->DelayReason); ?>,
            ResultName: <?php echo json_encode($model->ResultName); ?>,
            DemandText: <?php echo json_encode($model->DemandText); ?>,
            UCreateName: <?php echo json_encode($model->UCreateName); ?>,
            UChangeName: <?php echo json_encode($model->UChangeName); ?>,
            WorkedOut: Aliton.DateConvertToJs('<?php echo $model->WorkedOut; ?>')
        };
        // Инициализация источников данных
        var DataEmployees = new $.jqx.dataAdapter(Sources.SourceListEmployees);
        
        
        
        // Инициализируем контролы
        $("#edNumber").jqxInput({height: 25, width: 100, minLength: 1, value: Demand.Demand_id});
        $("#edAddr").jqxInput({height: 25, width: 400, minLength: 1, value: Demand.Address});
        $("#edDateReg").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Demand.DateReg, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edServiceType").jqxInput({height: 25, width: 200, minLength: 1, value: Demand.ServiceType});
        $("#edMasterName").jqxInput({height: 25, width: 210, minLength: 1, value: Demand.MasterName});
        $("#edDemandType").jqxInput({height: 25, width: 180, minLength: 1, value: Demand.DemandType});
        $("#edSystemType").jqxInput({height: 25, width: 180, minLength: 1, value: Demand.SystemType});
        $("#edEquipType").jqxInput({height: 25, width: 180, minLength: 1, value: Demand.EquipType});
        $("#edMalfunction").jqxInput({height: 25, width: 180, minLength: 1, value: Demand.Malfunction});
        $("#edDemandPrior").jqxInput({height: 25, width: 180, minLength: 1, value: Demand.DemandPrior});
        $("#edContacts").jqxInput({height: 25, width: 280, minLength: 1, value: Demand.Contacts});
        $("#edCloseReason").jqxInput({height: 25, width: 300, minLength: 1, value: Demand.CloseReason});
        $("#edRepMaster").jqxTextArea({height: 71, width: 160, minLength: 1});
        $("#edDeadline").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Demand.Deadline, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edAgreeDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Demand.AgreeDate, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edDateMaster").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Demand.DateMaster, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edDateExec").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Demand.DateExec, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edDateOfTrans").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Demand.DateOfTrans, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edTransferReason").jqxInput({height: 25, width: 180, minLength: 1, value: Demand.TransferReason});
        $("#edDelayReason").jqxInput({height: 25, width: 160, minLength: 1, value: Demand.DelayReason});
        $("#edResultName").jqxInput({height: 25, width: 140, minLength: 1, value: Demand.ResultName});
        $("#edDemandText").jqxTextArea({height: 71, width: 220, minLength: 1});
        $("#edSpecCondition").jqxTextArea({height: 71, width: 180, minLength: 1});
        $("#edUCreateName").jqxInput({height: 25, width: 100, minLength: 1, value: Demand.UCreateName});
        $("#edUChangeName").jqxInput({height: 25, width: 100, minLength: 1, value: Demand.UChangeName});
        
        
        $("#btnEdit").jqxButton({ width: 120, height: 30, disabled: !(Demand.DateExec == null)});
        $("#btnClient").jqxButton({ width: 120, height: 30 });
        $("#btnToMaster").jqxButton({ width: 170, height: 30, imgSrc: "/images/ok2.png", imgPosition: "left", disabled: !(Demand.DateMaster == null) });
        $("#btnSMS").jqxButton({ width: 120, height: 30 });
        $("#btnWorkOut").jqxButton({ width: 120, height: 30, disabled: !(Demand.WorkedOut == null)});
        $("#btnNotWork").jqxButton({ width: 140, height: 30, disabled: (Demand.WorkedOut == null)});
        $("#btnExec").jqxButton({ width: 120, height: 30, imgSrc: "/images/circle.png", imgPosition: "left", disabled: !(Demand.DateExec == null) });
        
        
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    var DataExecutorReports = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceExecutorReports, {}), {
                        formatData: function (data) {
                            $.extend(data, {
                                Filters: ["ex.Demand_id = " + Demand.Demand_id],
                            });
                            return data;
                        },
                    });
                    $("#ProgressGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 36px)',
                            width: '100%',
                            sortable: true,
                            autorowheight: true,
                            virtualmode: false,
                            pageable: true,
                            showfilterrow: false,
                            filterable: false,
                            autoshowfiltericon: true,
                            source: DataExecutorReports,
                            enablebrowserselection: true,
                            columns:
                            [
                                { text: 'Дата сообщения', datafield: 'date', width: 150, cellsformat: 'dd.MM.yyyy HH:mm'},
                                { text: 'Администрирующий', datafield: 'EmployeeName', width: 100 },
                                { text: 'План. дата вып.', /* filtertype: 'range' ,*/ datafield: 'plandateexec', width: 150, cellsformat: 'dd.MM.yyyy' },
                                { text: 'Дата вып.', filtertype: 'range', datafield: 'dateexec', width: 150, cellsformat: 'dd.MM.yyyy HH:mm' },
                                { text: 'Действие', filtertype: 'range', datafield: 'report', width: 250 },
                                { text: 'Исполнители', filtertype: 'range', datafield: 'othername', width: 150 },
                                { text: '№ Заявки', datafield: 'demand_id', width: 100},
                            ]
                    }));
                    $("#edComment").jqxInput({height: 25, width: 'calc(100% - 6px)', minLength: 1});
                    $("#edPlanDateExec").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: null, dropDownVerticalAlignment: "top"}));
                    $("#btnSend").jqxButton({ width: 120, height: 30 });
                    $("#btnDelComment").jqxButton({ width: 120, height: 30 });
                    
                    $("#edComment").on('keydown', function(event){
                        if (event.keyCode == 13)
                            Comment();
                        return true;
                    });
                    $("#btnSend").on('click', function(){
                        Comment();
                    });
                    $("#btnDelComment").on('click', function(){
                        if (Aliton.DelComment(CurrentRowData.exrp_id)) {
                            $("#ProgressGrid").jqxGrid('updatebounddata');
                        }
                    });
                    
                    break;
                case 1:
                    var DataDemandsExecutors = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDemandsExecutors, {}), {
                        formatData: function (data) {
                            $.extend(data, {
                                Filters: ["de.Demand_id = " + Demand.Demand_id],
                            });
                            return data;
                        },
                    });
                    $("#ExecutorsGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 36px)',
                            width: '100%',
                            sortable: true,
                            autorowheight: true,
                            virtualmode: false,
                            pageable: true,
                            showfilterrow: false,
                            filterable: false,
                            autoshowfiltericon: true,
                            source: DataDemandsExecutors,
                            columns:
                            [
                                { text: 'Исполнитель', filtertype: 'range', datafield: 'EmployeeName', width: 250 },
                                { text: 'Дата сообщения', datafield: 'Date', width: 150, cellsformat: 'dd.MM.yyyy HH:mm'},
                            ]
                    }));
                    
                    $("#btnAddExecutor").jqxButton({ width: 120, height: 30 });
                    $("#btnChangeExecutor").jqxButton({ width: 180, height: 30 });
                    $("#btnDelExecutor").jqxButton({ width: 120, height: 30 });
                    $("#btnAddExecutor").on('click', function(){
                    $('#ExecutorHeader').html('Добавление исполнителя');
                        ExecutorOperation = 'Insert';
                        $('#ExecutorDialog').jqxWindow('open');
                    });

                    $("#btnChangeExecutor").on('click', function(){
                        $('#ExecutorHeader').html('Изменить исполнителя');
                        ExecutorOperation = 'Change';
                        $('#ExecutorDialog').jqxWindow('open');
                    });
                    break;
            }
        };
        
        $('#Tabs').jqxTabs({ width: '100%', height: '100%', keyboardNavigation: false, initTabContent: initWidgets});
        
        
        
        
        $('#SMSDialog').jqxWindow(
            $.extend(true, DialogDefaultSettings, {
                width: 500,
                height: 170,
                isModal: false,
                initContent: function () {
                    $("#edTextSMS").jqxTextArea({height: 80, width: '100%', minLength: 1});
                    $("#btnCloseDialog").jqxButton({ width: 120, height: 30 });
                    $("#btnCloseDialog").on('click', function(){
                        $('#SMSDialog').jqxWindow('close');
                    });
                }
            })
        );
        var ExecutorOperation = '';
        $('#ExecutorDialog').jqxWindow(
            $.extend(true, DialogDefaultSettings, {
                width: 500,
                height: 170,
                initContent: function () {
                    $("#edDemand_idExecutor").jqxInput({height: 25, width: 100, minLength: 1, value: Demand.Demand_id});
                    $("#edDateStartExecutor").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Date()}));
                    $("#cmbExecutor").jqxComboBox({ source: DataEmployees, width: '300', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"});
                    $("#btnYesExDialog").jqxButton({ width: 120, height: 30 });
                    $("#btnNoExDialog").jqxButton({ width: 120, height: 30 });
                    $("#btnNoExDialog").on('click', function(){
                        $('#ExecutorDialog').jqxWindow('close');
                    });
                    
                    $("#btnYesExDialog").on('click', function(){
                        var Url = '';
                        if (ExecutorOperation == 'Insert')
                            Url = '/index.php?r=DemandsExecutors/Insert';
                        if (ExecutorOperation == 'Change')
                            Url = '/index.php?r=DemandsExecutors/Change';
                    
                        $.ajax({
                            url: Url,
                            data: $('#DemandsExecutors').serialize(),
                            type: 'POST',
                            success: function(Res){
                                $("#ExecutorsGrid").jqxGrid('updatebounddata');
                            }
                        });
                        $('#ExecutorDialog').jqxWindow('close');
                    });
                }
            })
        );
        

        $('#WorkOutDialog').jqxWindow(
            $.extend(true, DialogDefaultSettings, {
                width: 500,
                height: 170,
                initContent: function () {
                    $("#btnYesDialog").jqxButton({ width: 120, height: 30 });
                    $("#btnNoDialog").jqxButton({ width: 120, height: 30 });
                    $("#btnNoDialog").on('click', function(){
                        $('#WorkOutDialog').jqxWindow('close');
                    });
                    $("#btnYesDialog").on('click', function(){
                        Aliton.WorkedOut(Demand.Demand_id);
                        $('#WorkOutDialog').jqxWindow('close');
                    });
                }
            })
        );
        $("#ProgressGrid").on('rowselect', function (event) {
            CurrentRowData = $('#ProgressGrid').jqxGrid('getrowdata', event.args.rowindex);
        });
            
        // Инициализация событий
        $("#btnEdit").on('click', function(){
            Aliton.EditDemand(Demand.Demand_id);
        });
        $("#btnClient").on('click', function(){
            Aliton.ViewClient(Demand.ObjectGr_id);
        });
        $("#btnToMaster").on('click', function(){
            Aliton.ToMaster(Demand.Demand_id);
        });
        
        $('#SMSDialog').on('open', function() {
            $("#edTextSMS").jqxTextArea('selectAll');
        });
        
        $("#btnWorkOut").on('click', function(){
            $('#WorkOutDialog').jqxWindow('open');
        });
        
        
        
        $("#btnNotWork").on('click', function(){
            Aliton.UndoWorkedOut(Demand.Demand_id);
        });
        
        $("#btnExec").on('click', function(){
            Aliton.ExecDemand(Demand.Demand_id);
        });
        
        function Comment() {
            if (Aliton.NewComment(Demand.Demand_id, $("#edComment").jqxInput('val'), $("#edPlanDateExec").jqxDateTimeInput('val'))) {
                $("#ProgressGrid").jqxGrid('updatebounddata');
                $("#edComment").jqxInput('val', null);
                $("#edPlanDateExec").jqxDateTimeInput('val', null);
            }
        }
        
        
        
        $("#btnSMS").on('click', function(){
            var Message = (Demand.DemandType === 'Снят с обслуживания') ? Demand.DemandType + ';' : '';
            Message += (Demand.Address !== null) ? Demand.Address + ';' : '';
            Message += (Demand.EquipType !== null) ? Demand.EquipType + ';' : '';
            Message += (Demand.Malfunction !== null) ? Demand.Malfunction + ';' : '';
            Message += (Demand.DemandText !== null) ? Demand.DemandText + ';' : '';
            Message += (Demand.Contacts !== null) ? Demand.Contacts + ';' : '';
            Message += (Demand.DemandPrior !== null) ? Demand.DemandPrior + ';' : '';
            $('#SMSDialog').jqxWindow('open');
            $("#edTextSMS").val(Message);
            
        });
    });
</script>

<div style="float: left; width: 1100px; height: 310px;">
    <div style="float: left; width: 100%; height: 32px">
        <div class="row-column">Номер</div>
        <div class="row-column"><input readonly id="edNumber" type="text"/></div>
        <div class="row-column">Адрес</div>
        <div class="row-column"><input readonly id="edAddr" type="text"/></div>
    </div>
    <div style="clear: both;"></div>
    <div style="float: left; width: 100%; height: 32px">
        <div class="row-column">Дата рег.</div>
        <div class="row-column"><div id='edDateReg'></div></div>
        <div class="row-column">Тариф</div>
        <div class="row-column"><input readonly id="edServiceType" type="text"/></div>
        <div class="row-column">Мастер</div>
        <div class="row-column"><input readonly id="edMasterName" type="text"/></div>
    </div>
    <div style="clear: both;"></div>
    <div style="float: left; width: 100%; height: 50px">
        <div class="row-column" style="width: 180px;">
            <div>Тип заявки</div>
            <div style="clear: both;"></div>
            <div><input readonly id="edDemandType" type="text"/></div>
        </div>
        <div class="row-column" style="width: 180px;">
            <div>Тип системы</div>
            <div style="clear: both;"></div>
            <div><input readonly id="edSystemType" type="text"/></div>
        </div>
        <div class="row-column" style="width: 180px;">
            <div>Тип оборудования</div>
            <div style="clear: both;"></div>
            <div><input readonly id="edEquipType" type="text"/></div>
        </div>
        <div class="row-column" style="width: 180px;">
            <div>Неисправность</div>
            <div style="clear: both;"></div>
            <div><input readonly id="edMalfunction" type="text"/></div>
        </div>
    </div>
    <div style="clear: both;"></div>
    <div style="float: left; width: 100%; height: 50px">
        <div class="row-column" style="width: 180px;">
            <div>Приоритет</div>
            <div style="clear: both;"></div>
            <div><input readonly id="edDemandPrior" type="text"/></div>
        </div>
        <div class="row-column" style="width: 280px;">
            <div>Контактное лицо</div>
            <div style="clear: both;"></div>
            <div><input readonly id="edContacts" type="text"/></div>
        </div>
        <div class="row-column" style="width: 300px;">
            <div>Причина несвоевременного закрытия заявки</div>
            <div style="clear: both;"></div>
            <div><input readonly id="edCloseReason" type="text"/></div>
        </div>
    </div>
    <div style="clear: both;"></div>
    <div style="float: left; width: 100%; height: 96px">
        <div class="row-column">
            <div class="row-column">
                <div>Предельная дата</div>
                <div style="clear: both;"></div>
                <div><div id='edDeadline'></div></div>
                <div>Передано мастеру</div>
                <div style="clear: both;"></div>
                <div><div id='edDateMaster'></div></div>
            </div>
            <div class="row-column">
                <div>Согласованная дата</div>
                <div style="clear: both;"></div>
                <div><div id='edAgreeDate'></div></div>
                <div>Выполнено</div>
                <div style="clear: both;"></div>
                <div><div id='edDateExec'></div></div>
            </div>
        </div>
        <div class="row-column" style="height: 96px">
            <div>Отчет мастера</div>
            <div style="clear: both;"></div>
            <div><textarea readonly id="edRepMaster"><?php echo $model->RepMaster; ?></textarea></div>
        </div>
        <div class="row-column" style="height: 96px">
            <div>Особые условия</div>
            <div style="clear: both;"></div>
            <div><textarea readonly id="edSpecCondition"><?php echo $SpecCondition; ?></textarea></div>
        </div>
        <div class="row-column" style="height: 96px">
            <div>Неисправность</div>
            <div style="clear: both;"></div>
            <div><textarea readonly id="edDemandText"><?php echo $model->DemandText; ?></textarea></div>
        </div>
    </div>
    <div style="clear: both;"></div>
    
    <div style="float: left; width: 100%; height: 50px">
        <div class="row-column" style="width: 150px;">
            <div>Дата перевода заявки</div>
            <div style="clear: both;"></div>
            <div><div id='edDateOfTrans'></div></div>
        </div>
        <div class="row-column" style="width: 180px;">
            <div>Причина перевода заявки</div>
            <div style="clear: both;"></div>
            <div><input readonly id="edTransferReason" type="text"/></div>
        </div>
        <div class="row-column" style="width: 160px;">
            <div>Причина просрочки</div>
            <div style="clear: both;"></div>
            <div><input readonly id="edDelayReason" type="text"/></div>
        </div>
        <div class="row-column" style="width: 140px;">
            <div>Результат</div>
            <div style="clear: both;"></div>
            <div><input readonly id="edResultName" type="text"/></div>
        </div>
        <div class="row-column" style="width: 100px;">
            <div>Зарегистрировал</div>
            <div style="clear: both;"></div>
            <div><input readonly id="edUCreateName" type="text"/></div>
        </div>
        <div class="row-column" style="width: 100px;">
            <div>Посл. изм.</div>
            <div style="clear: both;"></div>
            <div><input readonly id="edUChangeName" type="text"/></div>
        </div>
    </div>
  
</div>
<div style="clear: both"></div>
<div style="float: left; width: 100%; height: 32px">
    <div class="row-column"><input type="button" value="Изменить" id='btnEdit' /></div>
    <div class="row-column"><input type="button" value="Карточка" id='btnClient' /></div>
    <div class="row-column"><input type="button" value="Передать мастеру" id='btnToMaster' /></div>
    <div class="row-column"><input type="button" value="Текст СМС" id='btnSMS' /></div>
    <div class="row-column" style="margin-left: 60px"><input type="button" value="Отработано" id='btnWorkOut' /></div>
    <div class="row-column"><input type="button" value="Отмена отработки" id='btnNotWork' /></div>
    <div class="row-column" style="float: right;"><input type="button" value="Выполнено" id='btnExec' /></div>
</div>    
<div style="clear: both;"></div>
<div style="float: left; width: 100%; height: calc(100% - 342px)">
    <div id='Tabs'>
        <ul>
            <li style="margin-left: 20px;">
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Ход работы</div>

                </div>
            </li>
            <li>
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Исполнители</div>
                </div>
            </li>
        </ul>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: calc(100% - 20px)">
                <div id="ProgressGrid"></div>
                <div style="clear: both;"></div>
                <div style="height: 30px; margin-top: 5px;">
                    <div style="float: left; width: calc(100% - 576px)"><input id="edComment" type="text"/></div>
                    <div style="float: right">
                        <div style="float: left; margin-left: 6px;">План. дата вып.</div>
                        <div style="float: left; margin-left: 6px;"><div id='edPlanDateExec'></div></div>
                        <div style="float: left; margin-left: 6px;"><input type="button" value="Написать" id='btnSend' /></div>
                        <div style="float: left; margin-left: 6px;"><input type="button" value="Удалить" id='btnDelComment' /></div>
                    </div>
                </div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: calc(100% - 20px)">
                <div id="ExecutorsGrid"></div>
                <div style="clear: both;"></div>
                <div style="height: 30px">
                    <div style="float: left;"><input type="button" value="Помощь" id='btnAddExecutor' /></div>
                    <div style="float: left; margin-left: 6px;"><input type="button" value="Другой исполнитель" id='btnChangeExecutor' /></div>
                    <div style="float: left; margin-left: 6px;"><input type="button" value="Удалить" id='btnDelExecutor' /></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="SMSDialog" style="display: none">
    <div id="customWindowHeader">
        <span id="captureContainer" style="float: left">Текст СМС</span>
    </div>
    <div id="customWindowContent" style="overflow: hidden">
        <div style="margin: 10px">
            <div id="TextSMSContainer"><textarea readonly id="edTextSMS"></textarea></div>
            <div style="margin-top: 6px;"><input style="float: right;" type="button" value="Закрыть" id='btnCloseDialog' /></div>
        </div>
    </div>
</div>
<div id="WorkOutDialog" style="display: none">
    <div id="customWindowHeader">
        <span id="captureContainer" style="float: left">Отработать заявку</span>
    </div>
    <div id="customWindowContent" style="overflow: hidden">
        <div style="margin: 10px">
            <div style="margin-top: 30px; text-align: center; vertical-align: middle;">Вы уверены, что заявка полностью проадминистрирована?</div>
            <div style="margin-top: 30px;">
                <input style="float: left;" type="button" value="Да" id='btnYesDialog' />
                <input style="float: right;" type="button" value="Нет" id='btnNoDialog' />
            </div>
        </div>
    </div>
</div>
<div id="ExecutorDialog" style="display: none">
    <div id="customWindowHeader">
        <span id="ExecutorHeader" style="float: left">Редактирование исполнителя</span>
    </div>
    <div id="customWindowContent" style="overflow: hidden">
        <div style="margin: 10px">
            <div>
                <form class="form-inline"  id="DemandsExecutors" target="_blank" action="" method="post">
                    <input readonly id="edDemand_idExecutor" name='DemandsExecutors[Demand_id]' type="hidden"/>
                    <div style="margin-top: 10px;" id='edDateStartExecutor' name='DemandsExecutors[Date]'></div>
                    <div style="margin-top: 10px;" id='cmbExecutor' name='DemandsExecutors[Employee_id]'></div>
                </form>
            </div>
            <div style="margin-top: 20px;">
                <input style="float: left;" type="button" value="Сохранить" id='btnYesExDialog' />
                <input style="float: right;" type="button" value="Отмена" id='btnNoExDialog' />
            </div>
        </div>
    </div>
</div>