<script type="text/javascript">
    var OpenCostCalc = true;
    $(document).ready(function () {
        var CurrentRowData;
        // Присваиваем значения по умолчанию для фильтров
        var Demand = {
            Demand_id: <?php echo json_encode($model->Demand_id); ?>,
            DateReg: Aliton.DateConvertToJs('<?php echo $model->DateReg; ?>'),
            Object_id: <?php echo json_encode($model->Object_id); ?>,
            ObjectGr_id: <?php echo $model->ObjectGr_id; ?>,
            PropForm_id: <?php echo $model->PropForm_id; ?>,
            Address: <?php echo json_encode($model->Address); ?>,
            StageName: <?php echo json_encode($model->StageName); ?>,
            DIFF_STR: <?php echo json_encode($model->DIFF_STR); ?>,
            StatusOP: <?php echo json_encode($model->StatusOP); ?>,
            DemandPrior: <?php echo json_encode($model->DemandPrior); ?>,
            DemandType: <?php echo json_encode($model->DemandType); ?>,
            SystemType: <?php echo json_encode($model->SystemType); ?>,
            SegmentName: <?php echo json_encode($model->SegmentName); ?>,
            SubSegmentName: <?php echo json_encode($model->SubSegmentName); ?>,
            Contacts: <?php echo json_encode($model->Contacts); ?>,
            Deadline: Aliton.DateConvertToJs('<?php echo $model->Deadline; ?>'),
            DateExec: Aliton.DateConvertToJs('<?php echo $model->DateExec; ?>'),
            Note: <?php echo json_encode($model->Note); ?>,
            
        };
        // Инициализация источников данных
        var DataEmployees = new $.jqx.dataAdapter(Sources.SourceListEmployees);
        var CurrentUser = <?php echo json_encode(Yii::app()->user->Employee_id); ?>;
        // Инициализируем контролы
        $("#edNumber").jqxInput({height: 25, width: 100, minLength: 1, value: Demand.Demand_id});
        $("#edDateReg").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, value: Demand.DateReg, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edAddr").jqxInput({height: 25, width: 400, minLength: 1, value: Demand.Address});
        $("#edStage").jqxInput({height: 25, width: 150, minLength: 1, value: Demand.StageName});
        $("#edDiffStr").jqxInput({height: 25, width: 180, minLength: 1, value: Demand.DIFF_STR});
        $("#edStatusOP").jqxInput({height: 25, width: 180, minLength: 1, value: Demand.StatusOP});
        $("#edDemandPrior").jqxInput({height: 25, width: 180, minLength: 1, value: Demand.DemandPrior});
        $("#edDemandType").jqxInput({height: 25, width: 180, minLength: 1, value: Demand.DemandType});
        $("#edSystemType").jqxInput({height: 25, width: 180, minLength: 1, value: Demand.SystemType});
        $("#edDeadline").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, value: Demand.Deadline, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edSegment").jqxInput({height: 25, width: 180, minLength: 1, value: Demand.SegmentName});
        $("#edSubSegment").jqxInput({height: 25, width: 180, minLength: 1, value: Demand.SegmentName});
        $("#edDateExec").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, value: Demand.DateExec, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edContacts").jqxInput({height: 25, width: 514, minLength: 1, value: Demand.Contacts});
        $("#btnCall").jqxButton({ width: 120, height: 40 });
        $("#btnMail").jqxButton({ width: 120, height: 40 });
        $("#btnPresentation").jqxButton({ width: 120, height: 40 });
        $("#btnKP").jqxButton({ width: 120, height: 40 });
        $("#btnArchive").jqxButton({ width: 246, height: 40 });
        $("#edInformation").jqxTextArea({height: '30px', width: '500px', minLength: 1});
        $("#edSourceInfo").jqxTextArea({height: '30px', width: '200px', minLength: 1});
        $("#btnEdit").jqxButton({ width: 120, height: 30, disabled: !(Demand.DateExec == null), imgSrc: '/images/4.png', imgPosition: "left" });
        $("#btnClient").jqxButton({ width: 120, height: 30 });
        
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
                                { text: 'Администрирующий', datafield: 'EmployeeName', width: 140 },
                                { text: 'План. дата вып.', /* filtertype: 'range' ,*/ datafield: 'plandateexec', width: 120, cellsformat: 'dd.MM.yyyy' },
                                { text: 'Дата вып.', filtertype: 'range', datafield: 'dateexec', width: 120, cellsformat: 'dd.MM.yyyy HH:mm' },
                                { text: 'Действие', filtertype: 'range', datafield: 'report', width: 400 },
                                { text: 'Исполнители', filtertype: 'range', datafield: 'othername', width: 120 },
                                { text: '№ Заявки', datafield: 'demand_id', width: 80},
                            ]
                    }));

                    
                    $('#btnProgress').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnProgress').on('click', function() {
                        //$("#DiaryHeaderText").html("Ход работы");
                        $('#CostCalculationsDialog').jqxWindow({ height: 600, width: 1000});    
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('ExecutorReports/Index')) ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                Form_id: Demand.PropForm_id,
                                Demand_id: Demand.Demand_id
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
                    
                    $("#btnAddExecutor").jqxButton({ width: 120, height: 30 });
                    $("#btnChangeExecutor").jqxButton({ width: 180, height: 30 });
                    $("#btnDelExecutor").jqxButton({ width: 120, height: 30 });
                    
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
                            $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 640, width: 780, position: 'center' }));
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
                            $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: false, height: '430px', width: '740'}));
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
                            $('#CostCalculationsDialog').jqxWindow({width: 700, height: 500, position: 'center', isModal: true});
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
                        $("#edRvrs").jqxComboBox({source: ResolveReasonsData, width: '150', height: '25px', dropDownVerticalAlignment: 'top', displayMember: "ResolveReason", valueMember: "Rvrs_id"});
                        $("#edCalcAccept").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 100, formatString: 'dd.MM.yyyy', value: Demand.calc_accept, dropDownVerticalAlignment: "top"}));
                        $("#edDateContract").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 100, formatString: 'dd.MM.yyyy', value: Demand.DateContract, dropDownVerticalAlignment: "top"}));
                        $("#chbWorkExec").jqxCheckBox($.extend(true, CheckBoxDefaultSettings, {width: 100, checked: Demand.WorkExec}));
                        $("#edNegative").jqxComboBox({source: NegativesData, width: '150', height: '25px', displayMember: "NegativeName", dropDownVerticalAlignment: 'top', valueMember: "Ngtv_id"});
                        $("#edOffer").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings,{height: 85, width: 300, minLength: 1}));
                        $("#edNegative").jqxComboBox({source: NegativesData, width: '150', height: '25px', dropDownVerticalAlignment: 'top', displayMember: "NegativeName", valueMember: "Ngtv_id"});
                        $("#edOffer").jqxTextArea('val', Demand.offer);
                        $("#edInitiative").jqxComboBox({source: [{id: 0, name: 'Компания'}, {id: 1, name: 'Клиент'}], dropDownVerticalAlignment: 'top', width: '150', height: '25px', displayMember: "name", valueMember: "id"});
                        $("#edInitiative").jqxComboBox('val', Demand.initiative);
                        $("#edCalcSum").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px', value: Demand.CalcSum}));
                        $("#edUpgNote").jqxInput($.extend(true, {}, InputDefaultSettings, {height: 25, width: 160, minLength: 1}));
                        $("#edUpgNote").jqxInput('val', Demand.upg_note);
                        $("#edCompetitive").jqxComboBox({source: [{id: 0, name: 'Да'}, {id: 1, name: 'Нет'}, {id: 2, name: 'Не знаю'}], width: '150', height: '25px', dropDownVerticalAlignment: 'top', displayMember: "name", valueMember: "id"});
                        $("#edCompetitive").jqxComboBox('val', Demand.competitive);
                        $("#edClrs_id").jqxComboBox({source: [{id: 0, name: 'Отказ клиента'}, {id: 1, name: 'Фактическое исполнение'}, {id: 2, name: 'Дублирующая заявка'}], width: '150', height: '25px', dropDownVerticalAlignment: 'top', displayMember: "name", valueMember: "id"});
                        $("#edClrs_id").jqxComboBox('val', Demand.clrs_id);
                        $("#edStatusOP").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, {source: [{id: 0, name: ''}, {id: 1, name: 'Холодный'}, {id: 2, name: 'Теплый'}, {id: 3, name: 'Горячий'}], width: '150', height: '25px', dropDownVerticalAlignment: 'top', displayMember: "name", valueMember: "id"}));
                        $("#edStatusOP").jqxComboBox('val', Demand.StatusOP);
                        
                        
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
                                        StatusOP: $('#edStatusOP').val()
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
        
        function Comment() {
            if (Aliton.NewComment(Demand.Demand_id, $("#edComment").jqxInput('val'), $("#edPlanDateExec").jqxDateTimeInput('val'))) {
                $("#ProgressGrid").jqxGrid('updatebounddata');
                $("#edComment").jqxInput('val', null);
                $("#edPlanDateExec").jqxDateTimeInput('val', null);
            }
        }
        
        
        $("#ProgressGrid").on('bindingcomplete', function(){
            $("#ProgressGrid").jqxGrid('selectrow', 0);
        });
    });
</script>

<div class="al-row" style="padding: 0px">
    <div class="al-row-column">
        <div>Номер</div>
        <div><input readonly id="edNumber" type="text"/></div>
    </div>
    <div class="al-row-column">
        <div>Дата и время</div>
        <div><div id='edDateReg'></div></div>
    </div>
    <div class="al-row-column">
        <div>Адрес</div>
        <div><input readonly id="edAddr" type="text"/></div>
    </div>
    <div style="clear: both"></div>
</div>
<div style="clear: both;"></div>
<div class="al-row" style="padding: 0px">
    <div class="al-row-column">
        <div>Этап</div>
        <div><input readonly id="edStage" type="text"/></div>
    </div>
    <div class="al-row-column">
        <div>Продолжительность этапа</div>
        <div><input readonly id="edDiffStr" type="text"/></div>
    </div>
    <div class="al-row-column">
        <div>Статус ОП</div>
        <div><input readonly id="edStatusOP" type="text"/></div>
    </div>
    <div class="al-row-column">
        <div>Приоритет</div>
        <div><input readonly id="edDemandPrior" type="text"/></div>
    </div>
    <div style="clear: both;"></div>
</div>
<div style="clear: both;"></div>
<div class="al-row" style="padding: 0px">
    <div class="al-row-column">
        <div class="al-row" style="padding: 0px">
            <div class="al-row-column">
                <div>Тип заявки</div>
                <div><input readonly id="edDemandType" type="text"/></div>
            </div>
            <div class="al-row-column">
                <div>Тип системы</div>
                <div><input readonly id="edSystemType" type="text"/></div>
            </div>
            <div class="al-row-column">
                <div>Пред. дата</div>
                <div><div id='edDeadline'></div></div>
            </div>
            <div style="clear: both;"></div>
        </div>
        <div class="al-row" style="padding: 0px">
            <div class="al-row-column">
                <div>Сегмент</div>
                <div><input readonly id="edSegment" type="text"/></div>
            </div>
            <div class="al-row-column">
                <div>ПОДСегмент</div>
                <div><input readonly id="edSubSegment" type="text"/></div>
            </div>
            <div class="al-row-column">
                <div>Дата вып.</div>
                <div><div id='edDateExec'></div></div>
            </div>
            <div style="clear: both;"></div>
        </div>
        <div class="al-row" style="padding: 0px">
            <div>Контактное лицо</div>
            <div><input readonly id="edContacts" type="text"/></div>
        </div>
    </div>
    <div class="al-row-column">
        <div style="margin-top: 23px;">
            <div class="al-row-column"><input type="button" id="btnCall" value="Звонок"/></div>
            <div class="al-row-column"><input type="button" id="btnMail" value="Письмо"/></div>
            <div style="clear: both;"></div>
        </div>
        <div>
            <div class="al-row-column"><input type="button" id="btnPresentation" value="Презентация"/></div>
            <div class="al-row-column"><input type="button" id="btnKP" value="КП"/></div>
            <div style="clear: both;"></div>
        </div>
        <div>
            <div class="al-row-column"><input type="button" id="btnArchive" value="Архив звукозаписей"/></div>
            <div style="clear: both;"></div>
        </div>
    </div>

</div>
<div style="clear: both;"></div>
<div class="al-row" style="padding: 0px">
    <div class="al-row-column">
        <div>Информация</div>
        <div><textarea id="edInformation"></textarea></div>
    </div>
    <div class="al-row-column">
        <div>Источник</div>
        <div><textarea id="edSourceInfo"></textarea></div>
    </div>
</div>
    
<div style="clear: both"></div>
<div style="float: left; width: 100%; height: 32px">
    <div class="row-column"><input type="button" value="Изменить" id='btnEdit' /></div>
    <div class="row-column"><input type="button" value="Карточка" id='btnClient' /></div>
</div>    
<div style="clear: both;"></div>
<div class="al-row" style="height: calc(100% - 334px)">
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
                    
                        <div style="float: left; margin-left: 6px;"><input type='button' value='Ход работы' id='btnProgress' /></div>
<!--                        <div style="float: left; margin-left: 6px;">План. дата вып.</div>
                        <div style="float: left; margin-left: 6px;"><div id='edPlanDateExec'></div></div>
                        <div style="float: left; margin-left: 6px;"><input type="button" value="Написать" id='btnSend' /></div>
                        <div style="float: left; margin-left: 6px;"><input type="button" value="Удалить" id='btnDelComment' /></div>-->
                    
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