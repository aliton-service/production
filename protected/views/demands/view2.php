<script type="text/javascript">
    var OpenCostCalc = true;
    $(document).ready(function () {
        var CurrentRowData;
        // Присваиваем значения по умолчанию для фильтров
        var Demand = {
            Demand_id: <?php echo json_encode($model->Demand_id); ?>,
            Object_id: <?php echo json_encode($model->Object_id); ?>,
            ObjectGr_id: <?php echo $model->ObjectGr_id; ?>,
            Address: <?php echo json_encode($model->Address); ?>,
            DateReg: Aliton.DateConvertToJs('<?php echo $model->DateReg; ?>'),
            ServiceType: <?php echo json_encode($model->ServiceType); ?>,
            MasterName: <?php echo json_encode($model->MasterName); ?>,
            DemandType: <?php echo json_encode($model->DemandType); ?>,
            SystemType: <?php echo json_encode($model->SystemType); ?>,
            EquipType: <?php echo json_encode($model->EquipType); ?>,
            Master: <?php echo json_encode($model->Master); ?>,
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
            TransferReason: <?php echo json_encode($model->TransfReason); ?>,
            DelayReason: <?php echo json_encode($model->DelayReason); ?>,
            ResultName: <?php echo json_encode($model->ResultName); ?>,
            DemandText: <?php echo json_encode($model->DemandText); ?>,
            UCreateName: <?php echo json_encode($model->UCreateName); ?>,
            UChangeName: <?php echo json_encode($model->UChangeName); ?>,
            WorkedOut: Aliton.DateConvertToJs('<?php echo $model->WorkedOut; ?>'),
            DateSurvey: Aliton.DateConvertToJs('<?php echo $model->DateSurvey; ?>'),
            date_calc: Aliton.DateConvertToJs('<?php echo $model->date_calc; ?>'),
            GoCalc: Boolean(Number(<?php echo json_encode($model->GoCalc); ?>)),
            Rvrs_id: <?php echo json_encode($model->Rvrs_id); ?>,
            calc_accept: Aliton.DateConvertToJs('<?php echo $model->calc_accept; ?>'),
            DateContract: Aliton.DateConvertToJs('<?php echo $model->DateContract; ?>'),
            WorkExec: Boolean(Number(<?php echo json_encode($model->WorkExec); ?>)),
            Ngtv_id: <?php echo json_encode($model->Ngtv_id); ?>,
            offer: <?php echo json_encode($model->offer); ?>,
            initiative: <?php echo json_encode($model->initiative); ?>,
            CalcSum: <?php echo json_encode($model->CalcSum); ?>,
            upg_note: <?php echo json_encode($model->upg_note); ?>,
            competitive: <?php echo json_encode($model->competitive); ?>,
            clrs_id: <?php echo json_encode($model->clrs_id); ?>,
            StatusOP: <?php echo json_encode($model->StatusOP); ?>,
            Initiator_id: <?php echo json_encode($model->Initiator_id); ?>,
        };
        // Инициализация источников данных
        var DataEmployees = new $.jqx.dataAdapter(Sources.SourceListEmployees);
        var CurrentUser = <?php echo json_encode(Yii::app()->user->Employee_id); ?>;
        // Инициализируем контролы
        $("#edNumber").jqxInput($.extend(true, {}, InputDefaultSettings, {height: 25, width: 100, minLength: 1, value: Demand.Demand_id}));
        $("#edAddr").jqxInput($.extend(true, {}, InputDefaultSettings,{height: 25, width: 400, minLength: 1, value: Demand.Address}));
        $("#edDateReg").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, value: Demand.DateReg, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edServiceType").jqxInput($.extend(true, {}, InputDefaultSettings,{height: 25, width: 200, minLength: 1, value: Demand.ServiceType}));
        $("#edMasterName").jqxInput($.extend(true, {}, InputDefaultSettings,{height: 25, width: 300, minLength: 1, value: Demand.MasterName}));
        $("#edDemandType").jqxInput($.extend(true, {}, InputDefaultSettings,{height: 25, width: 230, minLength: 1, value: Demand.DemandType}));
        $("#edSystemType").jqxInput($.extend(true, {}, InputDefaultSettings,{height: 25, width: 160, minLength: 1, value: Demand.SystemType}));
        $("#edEquipType").jqxInput($.extend(true, {}, InputDefaultSettings,{height: 25, width: 140, minLength: 1, value: Demand.EquipType}));
        $("#edMalfunction").jqxInput($.extend(true, {}, InputDefaultSettings,{height: 25, width: 310, minLength: 1, value: Demand.Malfunction}));
        $("#edDemandPrior").jqxInput($.extend(true, {}, InputDefaultSettings,{height: 25, width: 160, minLength: 1, value: Demand.DemandPrior}));
        $("#edContacts").jqxInput($.extend(true, {}, InputDefaultSettings,{height: 25, width: 455, minLength: 1, value: Demand.Contacts}));
        $("#edCloseReason").jqxInput($.extend(true, {}, InputDefaultSettings,{height: 25, width: 230, minLength: 1, value: Demand.CloseReason}));
        $("#edRepMaster").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings,{height: '100%', width: '100%', minLength: 1}));
        $("#edDeadline").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Demand.Deadline, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edAgreeDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Demand.AgreeDate, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edDateMaster").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Demand.DateMaster, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edDateExec").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Demand.DateExec, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edDateOfTrans").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Demand.DateOfTrans, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 140 }));
        $("#edTransferReason").jqxInput($.extend(true, {}, InputDefaultSettings,{height: 25, width: 180, minLength: 1, value: Demand.TransferReason}));
        $("#edDelayReason").jqxInput($.extend(true, {}, InputDefaultSettings,{height: 25, width: 160, minLength: 1, value: Demand.DelayReason}));
        $("#edResultName").jqxInput({height: 25, width: 140, minLength: 1, value: Demand.ResultName});
        $("#edDemandText").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings,{height: '100%', width: '100%', minLength: 1}));
        $("#edSpecCondition").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings,{height: 71, width: '100%', minLength: 1}));
        $("#edUCreateName").jqxInput($.extend(true, {}, InputDefaultSettings,{height: 25, width: 110, minLength: 1, value: Demand.UCreateName}));
        $("#edUChangeName").jqxInput($.extend(true, {}, InputDefaultSettings,{height: 25, width: 100, minLength: 1, value: Demand.UChangeName}));
        
        
        $("#btnEdit").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: !(Demand.DateExec == null), imgSrc: '/images/4.png', imgPosition: "left" }));
        $("#btnClient").jqxButton($.extend(true, {}, ButtonDefaultSettings,{ width: 120, height: 30 }));
        $("#btnToMaster").jqxButton($.extend(true, {}, ButtonDefaultSettings,{ width: 170, height: 30, imgSrc: "/images/ok2.png", imgPosition: "left", disabled: !(Demand.DateMaster == null) }));
        $("#btnSMS").jqxButton($.extend(true, {}, ButtonDefaultSettings,{ width: 100, height: 30 }));
        $("#btnWorkOut").jqxButton($.extend(true, {}, ButtonDefaultSettings,{ width: 120, height: 30, disabled: !(Demand.WorkedOut == null)}));
        $("#btnNotWork").jqxButton($.extend(true, {}, ButtonDefaultSettings,{ width: 158, height: 30, disabled: (Demand.WorkedOut == null)}));
        $("#btnExec").jqxButton($.extend(true, {}, ButtonDefaultSettings,{ width: 120, height: 30, imgSrc: "/images/circle.png", imgPosition: "left", disabled: !(Demand.DateExec == null) }));
        var CD = Date();
        $("#edColumnDateExec").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {value: CD, width: 160, formatString: 'dd.MM.yyyy HH:mm', showTimeButton: true}));
        
        
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    var CurrentRowDataER;
                    
                    var DataExecutorReports = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceExecutorReports, {}), {
                        formatData: function (data) {
                            $.extend(data, {
                                Filters: ["ex.Demand_id = " + Demand.Demand_id],
                            });
                            return data;
                        },
                    });
                    $("#ProgressGrid").on('rowselect', function (event) {
                        CurrentRowDataER = $('#ProgressGrid').jqxGrid('getrowdata', event.args.rowindex);
                    });
                    
                    var ctrlDown = false;
                    var ctrlKey = 17;
                    var cmdKey = 91;
                    var vKey = 86;
                    var cKey = 67;
                    var TextBuffer = '';
                    var CopyGrid = false;

                    $(document).keydown(function(e) {
                        if (e.keyCode == ctrlKey || e.keyCode == cmdKey) ctrlDown = true;
                    });
                    $(document).keyup(function(e) {
                        if (e.keyCode == ctrlKey || e.keyCode == cmdKey) ctrlDown = false;
                    });
                    
                    function getSelectedText(){
                        var text = "";
                        if (window.getSelection) {
                            text = window.getSelection();
                        }else if (document.getSelection) {
                            text = document.getSelection();
                        }else if (document.selection) {
                            text = document.selection.createRange().text;
                        }
                        return text;
                    };
                    
                    document.addEventListener('copy', function(e){
//                        console.log('TextBuffer:' + TextBuffer);
//                        if (TextBuffer == '') {
//                            TextBuffer = getSelectedText();
//                            TextBuffer = TextBuffer.toString();
//                        }
//                        e.clipboardData.setData('text/plain', TextBuffer);
//                        TextBuffer = '';
//                        e.preventDefault();
                    });
                    
                    $("#ProgressGrid").keydown(function(e) {
//                        if (ctrlDown && (e.keyCode == vKey || e.keyCode == cKey)) {
//                            TextBuffer = getSelectedText();
//                            TextBuffer = TextBuffer.toString();
//                        }
                    });
                    
                    document.addEventListener('keydown', function(e) {
//                        if (ctrlDown && (e.keyCode == vKey || e.keyCode == cKey)) {
//                            TextBuffer = getSelectedText();
//                            TextBuffer = TextBuffer.toString();
//                        }
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
                                { text: 'Дата сообщения', datafield: 'date', width: 140, cellsformat: 'dd.MM.yyyy HH:mm'},
                                { text: 'Администрирующий', datafield: 'EmployeeName', width: 170 },
                                { text: 'План. дата вып.', /* filtertype: 'range' ,*/ datafield: 'plandateexec', width: 120, cellsformat: 'dd.MM.yyyy' },
                                { text: 'Дата вып.', filtertype: 'range', datafield: 'dateexec', width: 120, cellsformat: 'dd.MM.yyyy HH:mm' },
                                { text: 'Действие', filtertype: 'range', datafield: 'report', width: 400 },
                                { text: 'Исполнители', filtertype: 'range', datafield: 'othername', width: 120 },
                                { text: '№ Заявки', datafield: 'demand_id', width: 80},
                            ]
                    }));
                    $("#edComment").jqxInput($.extend(true, {}, InputDefaultSettings, {height: 25, width: 'calc(100% - 6px)', minLength: 1}));
                    $("#edPlanDateExec").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: null, width: '120px', dropDownVerticalAlignment: "top"}));
                    $("#btnSend").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $("#btnDelComment").jqxButton($.extend(true, {}, ButtonDefaultSettings,{ width: 120, height: 30 }));
                    
                    $("#edComment").on('keydown', function(event){
                        if (event.keyCode == 13)
                            Comment();
                        return true;
                    });
                    $("#btnSend").on('click', function(){
                        Comment();
                    });
                    $("#btnDelComment").on('click', function(){
                        if (CurrentRowDataER == undefined) return;
                        if (CurrentRowDataER.empl_id != <?php echo json_encode(Yii::app()->user->Employee_id); ?>) return;
                        if (Aliton.DelComment(CurrentRowData.exrp_id)) {
                            
                            $("#ProgressGrid").jqxGrid('updatebounddata');
                        }
                    });
                    
                    break;
                case 1:
                    var Executor = {};
                    
                    $("#ExecutorsGrid").on('rowselect', function (event) {
                        Executor = $('#ExecutorsGrid').jqxGrid('getrowdata', event.args.rowindex);
                    });
                    
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
                    
                    $("#btnAddExecutor").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $("#btnChangeExecutor").jqxButton($.extend(true, {}, ButtonDefaultSettings,{ width: 180, height: 30 }));
                    $("#btnDelExecutor").jqxButton($.extend(true, {}, ButtonDefaultSettings,{ width: 120, height: 30 }));
                    
                    $("#btnDelExecutor").on('click', function() {
                        if (Executor == undefined) return;
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('DemandsExecutors/Delete')) ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                DemandExecutor_id: Executor.DemandExecutor_id
                            },
                            success: function(Res) {
                                $("#ExecutorsGrid").jqxGrid('updatebounddata');
                            },
                            error: function(Res) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                            }
                        });
                    });
                    
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
                case 2:
                    var OpenDocument = function() {
                        var Row = $('#DocumentsGrid').jqxGrid('getrowdata', $('#DocumentsGrid').jqxGrid('getselectedrowindex'));
                        if (Row == undefined) return;
                        switch (parseInt(Row['DocType_id'])) {
                            case 1: window.open(<?php echo json_encode(Yii::app()->createUrl('Delivery/View')); ?> + "&Dldm_id=" + Row.Docid); break;
                            case 2: window.open(<?php echo json_encode(Yii::app()->createUrl('WHDocuments/View')); ?> + "&Docm_id=" + Row.Docid); break;
                            case 3: window.open(<?php echo json_encode(Yii::app()->createUrl('Repair/View')); ?> + "&Repr_id=" + Row.Docid); break;
                            case 4: window.open(<?php echo json_encode(Yii::app()->createUrl('MonitoringDemands/Index')); ?> + "&mndm_id=" + Row.Docid); break;
                            case 5: window.open(<?php echo json_encode(Yii::app()->createUrl('CostCalculations/Index')); ?> + "&calc_id=" + Row.Docid); break;
                            case 7: window.open(<?php echo json_encode(Yii::app()->createUrl('Documents/Index')); ?> + "&ContrS_id=" + Row.Docid); break;
                            case 8: window.open(<?php echo json_encode(Yii::app()->createUrl('WHBuhActs/Index')); ?> + "&docm_id=" + Row.Docid); break;
                            case 10: window.open(<?php echo json_encode(Yii::app()->createUrl('InspectionActs/View')); ?> + "&Inspection_id=" + Row.Docid); break;
                        };
                    };
                    
                    $("#btnAddDocuments").jqxDropDownButton($.extend(true, {}, DropDownButtonDefaultSettings, { dropDownVerticalAlignment: 'top', autoOpen: false, width: 260, height: 28 }));
                    var btnAddDocuments = '<div style="position: relative; margin-left: 3px; text-align: center; margin-top: 6px;">Создать</div>';
                    $("#btnAddDocuments").jqxDropDownButton('setContent', btnAddDocuments);
                    
                    $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 640, width: 635, position: 'center' }));
                    
                    $('#CostCalculationsDialog').on('close', function() {
                        $("#DocumentsGrid").jqxGrid('updatebounddata');
                    });
                    
                    $("#btnAddDocuments").jqxDropDownButton({initContent: function(){
                        $('#btnAddSmeta').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: '256px'}));
                        $('#btnAddRepair').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: '256px'}));
                        $('#btnAddDelivery').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: '256px'}));
                        $('#btnAddTreb').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: '256px'}));
                        $('#btnAddMonitoring').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: '256px'}));
                        $('#btnAddInspection').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: '256px'}));
                        
                        $("#btnAddInspection").on('click', function(){
                            if ($("#btnAddInspection").jqxButton('disabled')) return;
                            if (Demand.ObjectGr_id !== null) {
                                $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 560, width: 735, position: 'center' }));
                                $.ajax({
                                    url: <?php echo json_encode(Yii::app()->createUrl('InspectionActs/Create')) ?>,
                                    type: 'POST',
                                    async: false,
                                    data: {
                                        Params: {
                                            ObjectGr_id: Demand.ObjectGr_id,
                                            Addr: Demand.Address,
                                            Demand_id: Demand.Demand_id
                                        },
                                    },
                                    success: function(Res) {
                                        Res = JSON.parse(Res);
                                        $("#BodyCostCalculationsDialog").html(Res.html);
                                        $('#CostCalculationsDialog').jqxWindow('open');
                                    },
                                    error: function(Res) {
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                    }
                                });
                            }
                        });
                        
                        $("#btnAddSmeta").on('click', function(){
                            if ($("#btnAddSmeta").jqxButton('disabled')) return;
                            if (Demand.ObjectGr_id !== null) {
                                $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 640, width: 635, position: 'center' }));
                                $.ajax({
                                    url: <?php echo json_encode(Yii::app()->createUrl('CostCalculations/Create')) ?>,
                                    type: 'POST',
                                    async: false,
                                    data: {
                                        Params: {
                                            ObjectGr_id: Demand.ObjectGr_id,
                                            name: 'Заявка №' + Demand.Demand_id,
                                            date: Demand.Date,
                                            Demand_id: Demand.Demand_id
                                        },
                                        ObjectGr_id: Demand.ObjectGr_id

                                    },
                                    success: function(Res) {
                                        Res = JSON.parse(Res);
                                        $("#BodyCostCalculationsDialog").html(Res.html);
                                        $('#CostCalculationsDialog').jqxWindow('open');
                                    },
                                    error: function(Res) {
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                    }
                                });
                            }
                        });
                        
                        $('#btnAddRepair').on('click', function() {
                            if ($('#btnAddRepair').jqxButton('disabled')) return;
                            $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 670, width: 780, position: 'center' }));
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('Repair/Create')) ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    Params: {
                                        dmnd_id: Demand.Demand_id,
                                        prtp_id: 1,
                                        objc_id: Demand.Object_id,
                                        docm_quant: 1,
                                        mstr_empl_id: Demand.Master
                                    }
                                },
                                success: function(Res) {
                                    Res = JSON.parse(Res);
                                    $("#BodyCostCalculationsDialog").html(Res.html);
                                    $('#CostCalculationsDialog').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });
                        });
                        
                        $('#btnAddDelivery').on('click', function(){
                            $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: false, height: '470px', width: '800'}));
                            $.ajax({
                                url: "<?php echo Yii::app()->createUrl('Delivery/Insert');?>",
                                type: 'POST',
                                async: false,
                                data: {
                                    DialogId: 'CostCalculationsDialog',
                                    BodyDialogId: 'BodyCostCalculationsDialog',
                                    Params: {
                                        dmnd_id: Demand.Demand_id,
                                        prty_id: 1,
                                        objc_id: Demand.Object_id,
                                    }
                                },
                                success: function(Res) {
                                    Res = JSON.parse(Res);
                                    $('#BodyCostCalculationsDialog').html(Res.html);
                                    $('#CostCalculationsDialog').jqxWindow('open');
                                }
                            });
                        });
                        
                        $('#btnAddTreb').on('click', function() {
                            $('#CostCalculationsDialog').jqxWindow({width: 700, height: 540, position: 'center', isModal: true});
                            var CurrentDate = new Date();
                            var CurrentDateStr = '';
                            CurrentDateStr = CurrentDate.getDay() + '.' + (CurrentDate.getMonth() + 1) + '.' + CurrentDate.getFullYear();
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('WHDocuments/Create')) ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    Dctp_id: 4,
                                    DialogId: 'CostCalculationsDialog',
                                    BodyDialogId: 'BodyCostCalculationsDialog',
                                    Params: {
                                        objc_id: Demand.Object_id,
                                        dmnd_id: Demand.Demand_id,
                                        date: CurrentDateStr,
                                        prty_id: 8,
                                        dmnd_empl_id: Demand.Master,
                                        Address: Demand.Address,
                                        empl_id: CurrentUser
                                    },
                                },
                                success: function(Res) {
                                    Res = JSON.parse(Res);

                                    $("#BodyCostCalculationsDialog").html(Res.html);
                                    $('#CostCalculationsDialog').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });
                        });
                        
                        $('#btnAddMonitoring').on('click', function(){
                            $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '330px', width: '640'}));
                            $.ajax({
                                url: "<?php echo Yii::app()->createUrl('MonitoringDemands/Insert');?>",
                                type: 'POST',
                                async: false,
                                data: {
                                    DialogId: 'CostCalculationsDialog',
                                    BodyDialogId: 'BodyCostCalculationsDialog',
                                    Params: {
                                        Prior: 1,
                                        Dmnd_id: Demand.Demand_id
                                    }
                                },
                                success: function(Res) {
                                    $('#BodyCostCalculationsDialog').html(Res);
                                    $('#CostCalculationsDialog').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });
                        });
                        
                    }});
                    
                    $('#DocumentsGrid').on('rowdoubleclick', function (event) { 
                        OpenDocument();
                    });
                
                    var DemandDocumentsExecutors = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDemandDocuments, {}), {
                        formatData: function (data) {
                            $.extend(data, {
                                Variables: {Demand_id: Demand.Demand_id},
                            });
                            return data;
                        },
                    });
                    $("#DocumentsGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 36px)',
                            width: '100%',
                            sortable: true,
                            virtualmode: false,
                            pageable: true,
                            showfilterrow: false,
                            filterable: false,
                            autoshowfiltericon: true,
                            source: DemandDocumentsExecutors,
                            columns:
                            [
                                { text: 'Тип документа', filtertype: 'range', datafield: 'DocType', width: 180 },
                                { text: 'Номер', filtertype: 'range', datafield: 'Number', width: 100 },
                                { text: 'Дата выполнения', datafield: 'DateExec', width: 150, cellsformat: 'dd.MM.yyyy HH:mm'},
                                { text: 'Дата', datafield: 'DateReg', width: 150, cellsformat: 'dd.MM.yyyy HH:mm'},
                                { text: 'Оплачено', datafield: 'Procpay', width: 150, cellsformat: 'p'},
                                { text: 'Текст', filtertype: 'range', datafield: 'Note', width: 100 },
                                
                            ]
                    }));
                    break;
                    case 3:
                        var ResolveReasonsData = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceResolveReasons, {}));
                        var NegativesData = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceNegatives, {}));
                        $("#edDateSurvey").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 100, formatString: 'dd.MM.yyyy', value: Demand.DateSurvey, dropDownVerticalAlignment: "top"}));
                        $("#edDateCalc").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 100, formatString: 'dd.MM.yyyy', value: Demand.date_calc, dropDownVerticalAlignment: "top"}));
                        $("#chbGoCalc").jqxCheckBox($.extend(true, CheckBoxDefaultSettings, {width: 100, checked: Demand.GoCalc}));
                        $("#edRvrs").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, {source: ResolveReasonsData, width: '150', height: '25px', dropDownVerticalAlignment: 'top', displayMember: "ResolveReason", valueMember: "Rvrs_id"}));
                        $("#edCalcAccept").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 100, formatString: 'dd.MM.yyyy', value: Demand.calc_accept, dropDownVerticalAlignment: "top"}));
                        $("#edDateContract").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 100, formatString: 'dd.MM.yyyy', value: Demand.DateContract, dropDownVerticalAlignment: "top"}));
                        $("#chbWorkExec").jqxCheckBox($.extend(true, CheckBoxDefaultSettings, {width: 100, checked: Demand.WorkExec}));
                        $("#edNegative").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{source: NegativesData, width: '150', height: '25px', displayMember: "NegativeName", dropDownVerticalAlignment: 'top', valueMember: "Ngtv_id"}));
                        $("#edOffer").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings,{height: 85, width: 300, minLength: 1}));
                        $("#edNegative").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{source: NegativesData, width: '150', height: '25px', dropDownVerticalAlignment: 'top', displayMember: "NegativeName", valueMember: "Ngtv_id"}));
                        $("#edOffer").jqxTextArea('val', Demand.offer);
                        $("#edInitiative").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, {source: [{id: 0, name: 'Компания'}, {id: 1, name: 'Клиент'}], dropDownVerticalAlignment: 'top', width: '150', height: '25px', displayMember: "name", valueMember: "id"}));
                        $("#edInitiative").jqxComboBox('val', Demand.initiative);
                        $("#edCalcSum").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px', value: Demand.CalcSum}));
                        $("#edUpgNote").jqxInput($.extend(true, {}, InputDefaultSettings, {height: 25, width: 160, minLength: 1}));
                        $("#edUpgNote").jqxInput('val', Demand.upg_note);
                        $("#edCompetitive").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, {source: [{id: 0, name: 'Да'}, {id: 1, name: 'Нет'}, {id: 2, name: 'Не знаю'}], width: '150', height: '25px', dropDownVerticalAlignment: 'top', displayMember: "name", valueMember: "id"}));
                        $("#edCompetitive").jqxComboBox('val', Demand.competitive);
                        $("#edClrs_id").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, {source: [{id: 0, name: 'Отказ клиента'}, {id: 1, name: 'Фактическое исполнение'}, {id: 2, name: 'Дублирующая заявка'}], width: '150', height: '25px', dropDownVerticalAlignment: 'top', displayMember: "name", valueMember: "id"}));
                        $("#edClrs_id").jqxComboBox('val', Demand.clrs_id);
                        $("#edStatusOP").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, {source: [{id: 0, name: ''}, {id: 1, name: 'Холодный'}, {id: 2, name: 'Теплый'}, {id: 3, name: 'Горячий'}], width: '150', height: '25px', dropDownVerticalAlignment: 'top', displayMember: "name", valueMember: "id"}));
                        $("#edStatusOP").jqxComboBox('val', Demand.StatusOP);
                        
                        $("#edInitiator").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, {source: DataEmployees, width: '150', height: '25px', dropDownVerticalAlignment: 'top', displayMember: "ShortName", valueMember: "Employee_id"}));
                        $("#edInitiator").jqxComboBox('val', Demand.Initiator_id);
                        
                        $('#btnSaveDetails').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                        $('#btnSaveDetails').on('click', function() {
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('Demands/UpdateDetails')) ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    DemandsDetails: {
                                        Demand_id: Demand.Demand_id,
                                        GoCalc: $('#chbGoCalc').val(),
                                        WorkExec: $('#chbWorkExec').val(),
                                        ngtv_id: $('#edNegative').val(),
                                        Rvrs_id: $('#edRvrs').val(),
                                        DateContract: $('#edDateContract').val(),
                                        CalcSum: $('#edCalcSum').val(),
                                        DateSurvey: $('#edDateSurvey').val(),
                                        offer: $('#edOffer').val(),
                                        competitive: $('#edCompetitive').val(),
                                        initiative: $('#edInitiative').val(),
                                        clrs_id: $('#edClrs_id').val(),
                                        upg_note: $('#edUpgNote').val(),
                                        date_calc: $('#edDateCalc').val(),
                                        calc_accept: $('#edCalcAccept').val(),
                                        StatusOP: $('#edStatusOP').val(),
                                        Initiator_id: $('#edInitiator').val(),
                                    }
                                },
                                success: function(Res) {
                                    Aliton.ShowErrorMessage('Запись произведена', 'Изменения успешно сохранены');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage('Ошибка', Res.responseText);
                                }
                            });
                        });
                    break;
            }
        };
        
        $('#Tabs').jqxTabs($.extend(true, {}, TabsDefaultSettings, { width: '100%', height: '100%', keyboardNavigation: false, initTabContent: initWidgets}));
        
        
        $('#SMSDialog').jqxWindow(
            $.extend(true, DialogDefaultSettings, {
                width: 500,
                height: 170,
                isModal: false,
                initContent: function () {
                    $("#edTextSMS").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {height: 80, width: '100%', minLength: 1}));
                    $("#btnCloseDialog").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
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
                    $("#edDemand_idExecutor").jqxInput($.extend(true, {}, InputDefaultSettings, {height: 25, width: 100, minLength: 1, value: Demand.Demand_id}));
                    $("#edDateStartExecutor").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Date()}));
                    $("#cmbExecutor").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, width: '300', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}));
                    $("#btnYesExDialog").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $("#btnNoExDialog").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
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
                    $("#btnYesDialog").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $("#btnNoDialog").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
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
            Aliton.ViewClient(Demand.ObjectGr_id, Demand.Demand_id);
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
            //Aliton.ExecDemand(Demand.Demand_id, false);
            location.href = '/index.php?r=Demands/DemandExec&id=' + Demand.Demand_id + '&DateExec=' + $('#edColumnDateExec').val();
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
        
        $("#ProgressGrid").on('bindingcomplete', function(){
            $("#ProgressGrid").jqxGrid('selectrow', 0);
        });
    });
</script>

<style>
    
    #demandInputs {
        height: 340px;
    }
    #demandTabs {
        height: calc(100% - 347px);
    }
    #MalfunctionWrapper {
        width: 150px;
        height: 70px;
    }
    #RepMasterWrapper {
        width: 150px;
        height: 70px;
    }
    #SpecConditionWrapper {
        width: 150px;
        height: 70px;
    }
        
    @media screen and (max-height: 800px) { 
        #demandInputs {
            height: 160px;
            overflow-x: hidden;
        }
        #demandTabs {
            height: calc(100% - 197px);
        }
    }
    
    @media screen and (max-width: 1235px) and (min-height: 800px) { 
        #demandInputs {
            height: 370px;
        }
        #demandTabs {
            height: calc(100% - 380px);
        }
    }
    
    @media screen and (min-width: 1300px) and (max-height: 800px) { 
        #MalfunctionWrapper {
            position: relative;
            left: 900px;
            top: -270px;
            width: 300px;
            height: 110px;
        }
        #RepMasterWrapper {
            position: relative;
            left: 65px;
            top: -35px;
            width: 300px;
            height: 105px;
        }
    }
    
    @media screen and (min-width: 1300px) and (min-height: 800px) { 
        #MalfunctionWrapper {
            position: absolute;
            left: 940px;
            top: 10px;
            width: 290px;
            height: 110px;
        }
        #RepMasterWrapper {
            position: absolute;
            left: 940px;
            top: 150px;
            width: 290px;
            height: 105px;
        }
    }
    
    @media screen and (min-width: 1300px) {
        #SpecConditionWrapper {
            width: 400px;
        }
        #btnWorkOutWrapper {
            margin-left: 60px;
        }
    }
    @media screen and (min-width: 1500px) { 
        #MalfunctionWrapper,
        #RepMasterWrapper {
            width: 500px;
        }
    }
    @media screen and (min-width: 1700px) { 
        #MalfunctionWrapper,
        #RepMasterWrapper {
            width: 700px;
        }
    }
    
</style>

<div id='demandInputs' style="float: left; width: 100%;">
    <div style="float: left; width: 100%; height: 32px">
        <div class="row-column">Номер</div>
        <div class="row-column"><input readonly id="edNumber" type="text"/></div>
        <div class="row-column">Адрес</div>
        <div class="row-column"><input readonly id="edAddr" type="text"/></div>
        <div class="row-column"><b>Статус ОП: <?php echo $model->StatusOPName; ?></b></div>
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
        <div class="row-column" style="margin-right: 2px;">
            <div>Тип заявки</div>
            <div style="clear: both;"></div>
            <div><input readonly id="edDemandType" type="text"/></div>
        </div>
        <div class="row-column" style="margin-right: 2px;">
            <div>Тип системы</div>
            <div style="clear: both;"></div>
            <div><input readonly id="edSystemType" type="text"/></div>
        </div>
        <div class="row-column" style="margin-right: 2px;">
            <div>Тип оборудования</div>
            <div style="clear: both;"></div>
            <div><input readonly id="edEquipType" type="text"/></div>
        </div>
        <div class="row-column" style="margin-right: 2px;">
            <div>Тип неисправности</div>
            <div style="clear: both;"></div>
            <div><input readonly id="edMalfunction" type="text"/></div>
        </div>
    </div>
    <div style="clear: both;"></div>
    <div style="float: left; width: 100%; height: 50px">
        <div class="row-column" style="margin: 0;">
            <div>Приоритет</div>
            <div style="clear: both;"></div>
            <div><input readonly id="edDemandPrior" type="text"/></div>
        </div>
        <div class="row-column" style="margin-right: 2px;">
            <div>Контактное лицо</div>
            <div style="clear: both;"></div>
            <div><input readonly id="edContacts" type="text"/></div>
        </div>
        <div class="row-column">
            <div>Причина несвоевр. закрытия заявки</div>
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
        <div id="SpecConditionWrapper" class="row-column">
            <div>Особые условия</div>
            <div style="clear: both;"></div>
            <div><textarea readonly id="edSpecCondition"><?php echo $SpecCondition; ?></textarea></div>
        </div>
        <div id="RepMasterWrapper" class="row-column">
            <div>Отчет мастера</div>
            <div style="clear: both;"></div>
            <div><textarea readonly id="edRepMaster"><?php echo $model->RepMaster; ?></textarea></div>
        </div>
        <div id="MalfunctionWrapper" class="row-column">
            <div>Неисправность</div>
            <div style="clear: both;"></div>
            <div><textarea readonly id="edDemandText"><?php echo $model->DemandText; ?></textarea></div>
        </div>
    </div>
    <div style="clear: both;"></div>
    
    <div style="float: left; width: 100%; height: 50px">
        <div class="row-column" style="margin-right: 3px;">
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
        <div class="row-column" style="width: 110px;">
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
  

    <div style="clear: both"></div>
    <div style="float: left; width: 100%; height: 32px">
        <div class="row-column"><input type="button" value="Изменить" id='btnEdit' /></div>
        <div class="row-column"><input type="button" value="Карточка" id='btnClient' /></div>
        <div class="row-column"><input type="button" value="Передать мастеру" id='btnToMaster' /></div>
        <div class="row-column"><input type="button" value="Текст СМС" id='btnSMS' /></div>
        <div class="row-column" id="btnWorkOutWrapper"><input type="button" value="Отработано" id='btnWorkOut' /></div>
        <div class="row-column" style="margin-right: 2px;"><input type="button" value="Отмена отработки" id='btnNotWork' /></div>
        <div class="row-column" style="float: right; margin-top: 2px;">
            <div class="row-column"><div id="edColumnDateExec"></div></div>
            <div class="row-column"><input type="button" value="Выполнено" id='btnExec' /></div>
        </div>
    </div> 
</div>
<div style="clear: both;"></div>
<div id="demandTabs" style="float: left; width: 100%; margin-top: 5px;">
    <div id='Tabs'>
        <ul>
            <li style="margin-left: 20px;">
                <div style="height: 15px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Ход работы</div>

                </div>
            </li>
            <li>
                <div style="height: 15px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Исполнители</div>
                </div>
            </li>
            <li>
                <div style="height: 15px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Документы</div>
                </div>
            </li>
            <li>
                <div style="height: 15px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Модернизация и монтаж</div>
                </div>
            </li>
        </ul>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: calc(100% - 20px)">
                <div id="ProgressGrid"></div>
                <div style="clear: both;"></div>
                <div style="height: 30px; margin-top: 5px;">
                    <div style="float: left; width: calc(100% - 510px)"><input id="edComment" type="text"/></div>
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
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: calc(100% - 20px)">
                <div id="DocumentsGrid"></div>
                <div style="clear: both;"></div>
                <div class="al-row">
                    <div style='float: left; margin-left: 0px;' id="btnAddDocuments">
                        <div style="height: 208px">
                            <div style="padding: 2px"><input type="button" value="Смета" id='btnAddSmeta'/></div>
                            <div style="clear: both"></div>
                            <div style="padding: 2px"><input type="button" value="Ремонт" id='btnAddRepair'/></div>
                            <div style="clear: both"></div>
                            <div style="padding: 2px"><input type="button" value="Доставка" id='btnAddDelivery'/></div>
                            <div style="clear: both"></div>
                            <div style="padding: 2px"><input type="button" value="Требование" id='btnAddTreb'/></div>
                            <div style="clear: both"></div>
                            <div style="padding: 2px"><input type="button" value="Мониторинг" id='btnAddMonitoring'/></div>
                            <div style="clear: both"></div>
                            <div style="padding: 2px"><input type="button" value="Акт обследования" id='btnAddInspection'/></div>
                            <div style="clear: both"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: calc(100% - 20px)">
                <div class="al-row">
                    <div class="al-row-column">
                        <div class="al-row">
                            <div class="al-row-column">
                                <div>Дата обсл.</div>
                                <div><div id='edDateSurvey' name='DemandDetails[DateSurvey]'></div></div>
                            </div>
                            <div class="al-row-column">
                                <div>Согл. дата подг. КП</div>
                                <div><div id='edDateCalc' name='DemandDetails[date_calc]'></div></div>
                            </div>
                            <div class="al-row-column">
                                <div>Смета передана</div>
                                <div><div id='chbGoCalc' name='DemandDetails[GoCalc]'></div></div>
                            </div>
                            <div class="al-row-column">
                                <div>От чего зависит закл. договора</div>
                                <div><div id='edRvrs' name='DemandDetails[Rvrs_id]'></div></div>
                            </div>
                            <div style="clear: both"></div>
                        </div>
                        <div class="al-row">
                            <div class="al-row-column">
                                <div>Cогл. см. с кл.</div>
                                <div><div id='edCalcAccept' name='DemandDetails[calc_accept]'></div></div>
                            </div>
                            <div class="al-row-column">
                                <div>План. дата дог.</div>
                                <div><div id='edDateContract' name='DemandDetails[DateContract]'></div></div>
                            </div>
                            <div class="al-row-column">
                                <div>Факт вып. работ</div>
                                <div><div id='chbWorkExec' name='DemandDetails[WorkExec]'></div></div>
                            </div>
                            <div class="al-row-column">
                                <div>Возражения клиента</div>
                                <div><div id='edNegative' name='DemandDetails[Ngtv_id]'></div></div>
                            </div>
                            <div style="clear: both"></div>
                        </div>
                    </div>
                    <div class="al-row-column">
                        <div class="al-row-column">
                            <div>Предложения конкурентов</div>
                            <div><textarea id='edOffer' name='DemandDetails[offer]'></textarea></div>
                        </div>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column">
                        <div class="al-row">
                            <div class="al-row-column">
                                <div>Инициатива</div>
                                <div><div id='edInitiative' name='DemandDetails[initiative]'></div></div>
                            </div>
                            <div class="al-row-column">
                                <div>Сумма сметы</div>
                                <div><div id='edCalcSum' name='DemandDetails[CalcSum]'></div></div>
                            </div>
                            <div class="al-row-column">
                                <div>Потенциал клиента</div>
                                <div><input id='edUpgNote' name='DemandDetails[upg_note]' /></div>
                            </div>
                            <div class="al-row-column">
                                <div>Конкурентоспособность</div>
                                <div><div id='edCompetitive' name='DemandDetails[competitive]'></div></div>
                            </div>
                            <div class="al-row-column">
                                <div>Причина закрытия</div>
                                <div><div id='edClrs_id' name='DemandDetails[clrs_id]'></div></div>
                            </div>
                            <div class="al-row-column">
                                <div><b>Статус ОП</b></div>
                                <div><div id='edStatusOP' name='DemandDetails[StatusOP]'></div></div>
                            </div>
                            <div class="al-row-column">
                                <div><b>Инициатор</b></div>
                                <div><div id='edInitiator' name='DemandDetails[Initiator_id]'></div></div>
                            </div>
                            <div style="clear: both"></div>
                        </div>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column"><input type='button' id='btnSaveDetails' value='Сохранить'/></div>
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

<div id="CostCalculationsDialog" style="display: none;">
    <div id="CostCalculationsDialogHeader">
        <span id="CostCalculationsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogCostCalculationsContent">
        <div style="" id="BodyCostCalculationsDialog"></div>
    </div>
</div>
