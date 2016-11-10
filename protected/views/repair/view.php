<script type="text/javascript">
    var Repairs = {};
    $(document).ready(function () {
        var CurrentRowDetails;
        var FirstStart = true;
        Repairs = {
            Repr_id: <?php echo json_encode($model->Repr_id); ?>,
            Object_id: <?php echo json_encode($model->objc_id); ?>,
            ObjectGr_id: <?php echo json_encode($model->objectgr_id); ?>,
            Status: parseInt(<?php echo json_encode($model->status); ?>),
            StatusName: <?php echo json_encode($model->status_name); ?>,
            Number: <?php echo json_encode($model->number); ?>,
            Date: Aliton.DateConvertToJs(<?php echo json_encode($model->date); ?>),
            Prior: <?php echo json_encode($model->RepairPrior); ?>,
            BestDate: Aliton.DateConvertToJs(<?php echo json_encode($model->best_date); ?>),
            Deadline: Aliton.DateConvertToJs(<?php echo json_encode($model->deadline); ?>),
            DatePlan: Aliton.DateConvertToJs(<?php echo json_encode($model->date_plan); ?>),
            Demand_id: <?php echo json_encode($model->dmnd_id); ?>,
            Addr: <?php echo json_encode($model->Addr); ?>,
            RepairPay: Boolean(Number(<?php echo json_encode($model->repair_pay); ?>)),
            Return: Boolean(Number(<?php echo json_encode($model->Return); ?>)),
            WorkOk: Boolean(Number(<?php echo json_encode($model->work_ok); ?>)),
            Wrnt: Boolean(Number(<?php echo json_encode($model->wrnt); ?>)),
            Equip: <?php echo json_encode($model->EquipName); ?>,
            SN: <?php echo json_encode($model->SN); ?>,
            UmName: <?php echo json_encode($model->um_name); ?>,
            Quant: <?php echo json_encode($model->docm_quant); ?>,
            Price: <?php echo json_encode($model->price_low); ?>,
            Used: Boolean(Number(<?php echo json_encode($model->used); ?>)),
            Set: <?php echo json_encode($model->set); ?>,
            Defect: <?php echo json_encode($model->defect); ?>,
            ResultName: <?php echo json_encode($model->resultname); ?>,
            Rslt_id: <?php echo json_encode($model->rslt_id); ?>,
            DateAccept: Aliton.DateConvertToJs(<?php echo json_encode($model->date_accept); ?>),
            DateSendAgree: Aliton.DateConvertToJs(<?php echo json_encode($model->date_send_agree); ?>),
            DateAgree: Aliton.DateConvertToJs(<?php echo json_encode($model->date_agree); ?>),
            DateNoAgree: Aliton.DateConvertToJs(<?php echo json_encode($model->date_no_agree); ?>),
            DateExec: Aliton.DateConvertToJs(<?php echo json_encode($model->date_exec); ?>),
            DateReady: Aliton.DateConvertToJs(<?php echo json_encode($model->date_ready); ?>),
            Master_id: <?php echo json_encode($model->mstr_empl_id); ?>,
            Egnr_id: <?php echo json_encode($model->egnr_empl_id); ?>,
            EDefect: <?php echo json_encode($model->edefect); ?>,
            DatePlanAction1: Aliton.DateConvertToJs(<?php echo json_encode($model->date_plan); ?>),
            DateFactAction1: Aliton.DateConvertToJs(<?php echo json_encode($model->date_fact); ?>),
            ExecHour: <?php echo json_encode($model->exechour); ?>,
            Jrdc_id: <?php echo json_encode($model->jrdc_id); ?>,
            CurrentEmpl_id: parseInt(<?php echo json_encode(Yii::app()->user->Employee_id); ?>)
        };
        
        var SetValueControls = function() {
                        
            $("#edNumber").jqxInput('val', Repairs.Number);
            $("#edDate").jqxDateTimeInput('val', Repairs.Date);
            $("#edPrior").jqxInput('val', Repairs.Prior);
            $("#edBestDate").jqxDateTimeInput('val', Repairs.BestDate);
            $("#edDeadline").jqxDateTimeInput('val', Repairs.Deadline);
            $("#edDatePlan").jqxDateTimeInput('val', Repairs.DatePlan);
            $("#edDemand").jqxInput('val', Repairs.Demand_id);
            $("#edAddress").jqxInput('val', Repairs.Addr);
            $("#edRepairPay").jqxCheckBox('val', Repairs.RepairPay);
            $("#edReturn").jqxCheckBox('val', Repairs.Return);
            $("#edWorkOk").jqxCheckBox('val', Repairs.WorkOk);
            $("#edWrnt").jqxCheckBox('val', Repairs.Wrnt);
            $("#edEquip").jqxInput('val', Repairs.Equip);
            $("#edSerialNumber").jqxInput('val', Repairs.SN);
            $("#edUmName").jqxInput('val', Repairs.UmName);
            $("#edQuant").jqxNumberInput('val', Repairs.Quant);
            $("#edPrice").jqxNumberInput('val', Repairs.Price);
            $("#edUsed").jqxCheckBox('val', Repairs.Used);
            $('#edSet').jqxTextArea('val', Repairs.Set);
            $('#edDefect').jqxTextArea('val', Repairs.Defect);
            $('#edStatusName').html('<b>' + Repairs.StatusName + '</b>');
            $('#edResult').val(Repairs.ResultName);
            $('#edDatePlanAction1').val(Repairs.DatePlanAction1);
            $('#edDateFactAction1').val(Repairs.DateFactAction1);
            $('#edExecHour').val(Repairs.ExecHour);
        };
        
        var CheckTabs = function() {
            var TabCount = $('#Tabs').jqxTabs('length'); 
            for (var i = 1; i < TabCount; i++)
                $("#Tabs .jqx-tabs-title:eq(" + i + ")").css("display", "none");
            var ChangeMode = 0;
            if (Repairs.Status in {0:null, 1:null, 6:null}) ChangeMode = 0;
            if (Repairs.Status == 2) ChangeMode = 1;
            if (Repairs.Status == 3) ChangeMode = 2;
            if (Repairs.Status == 4) ChangeMode = 3;
            if (Repairs.Status == 5) ChangeMode = 4;
            if (Repairs.Status in {7:null, 8:null, 9:null, 10:null, 11:null, 12:null}) {
                if (Repairs.Rslt_id == 1) ChangeMode = 2;
                if (Repairs.Rslt_id == 2) ChangeMode = 4;
                if (Repairs.Rslt_id == 3) ChangeMode = 3;
                if (Repairs.Rslt_id == 4) ChangeMode = 0;
            }
            
            $('#Tabs').jqxTabs({ selectedItem: 0 }); 
            
            if (ChangeMode >= 1) {
                $("#Tabs .jqx-tabs-title:eq(" + 1 + ")").css("display", "block");
                $('#Tabs').jqxTabs({ selectedItem: 1 }); 
            }
            if (ChangeMode == 2) {
                $("#Tabs .jqx-tabs-title:eq(" + 2 + ")").css("display", "block");
                $('#Tabs').jqxTabs({ selectedItem: 2 }); 
            }
            if (ChangeMode == 3) {
                $("#Tabs .jqx-tabs-title:eq(" + 3 + ")").css("display", "block");
                $('#Tabs').jqxTabs({ selectedItem: 3 }); 
            }
            if (ChangeMode == 4) {
                $("#Tabs .jqx-tabs-title:eq(" + 4 + ")").css("display", "block");
                $('#Tabs').jqxTabs({ selectedItem: 4 }); 
            }
            if (ChangeMode == 5) {
                $("#Tabs .jqx-tabs-title:eq(" + 5 + ")").css("display", "block");
                $('#Tabs').jqxTabs({ selectedItem: 5 }); 
            }
        };
        
        
        
        
        Repairs.Refresh = function() {
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Repair/GetModel'))?>,
                type: 'POST',
                data: {
                    Repr_id: Repairs.Repr_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    Repairs.Status = parseInt(Res.status);
                    Repairs.StatusName = Res.status_name;
                    Repairs.Number = Res.number;
                    Repairs.Date = Aliton.DateConvertToJs(Res.date);
                    Repairs.Prior = Res.RepairPrior;
                    Repairs.BestDate = Aliton.DateConvertToJs(Res.best_date);
                    Repairs.Deadline = Aliton.DateConvertToJs(Res.deadline);
                    Repairs.DatePlan = Aliton.DateConvertToJs(Res.date_plan);
                    Repairs.Demand_id = Res.dmnd_id;
                    Repairs.Addr = Res.Addr;
                    Repairs.RepairPay = Boolean(Number(Res.repair_pay));
                    Repairs.Return = Boolean(Number(Res.Return));
                    Repairs.WorkOk = Boolean(Number(Res.number));
                    Repairs.Wrnt = Boolean(Number(Res.wrnt));
                    Repairs.Equip = Res.EquipName;
                    Repairs.SN = Res.SN;
                    Repairs.UmName = Res.um_name;
                    Repairs.Quant = Res.docm_quant;
                    Repairs.Price = Res.price_low;
                    Repairs.Used = Boolean(Number(Res.used));
                    Repairs.Set = Res.set;
                    Repairs.Defect = Res.defect;
                    Repairs.DateAccept = Aliton.DateConvertToJs(Res.date_accept),
                    Repairs.DateSendAgree = Aliton.DateConvertToJs(Res.date_send_agree),
                    Repairs.DateAgree = Aliton.DateConvertToJs(Res.date_agree),
                    Repairs.DateNoAgree = Aliton.DateConvertToJs(Res.date_no_agree),
                    Repairs.DateExec = Aliton.DateConvertToJs(Res.date_exec),
                    Repairs.Rslt_id = Res.rslt_id;
                    Repairs.ResultName = Res.resultname;
                    Repairs.EDefect = Res.edefect;
                    Repairs.DatePlanAction1 = Aliton.DateConvertToJs(Res.date_plan);
                    Repairs.DateFactAction1 = Aliton.DateConvertToJs(Res.date_fact);
                    Repairs.ExecHour = Res.exechour;
                    SetValueControls();
                    CheckTabs();
                    //$("#btnRefreshDetails").click();
                    //SetStateButtons();
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        };
        
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    $("#edNumber").jqxInput($.extend(true, {}, {height: 25, width: 100, minLength: 1}));
                    $("#edDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, value: Repairs.Date, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
                    $("#edPrior").jqxInput($.extend(true, {}, {height: 25, width: 150, minLength: 1}));
                    $("#edBestDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, value: Repairs.BestDate, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
                    $("#edDeadline").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, value: Repairs.BestDate, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
                    $("#edDatePlan").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, value: Repairs.DatePlan, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
                    $("#edDemand").jqxInput($.extend(true, {}, {height: 25, width: 100, minLength: 1}));
                    $("#edAddress").jqxInput($.extend(true, {}, {height: 25, width: 340, minLength: 1}));
                    $("#edRepairPay").jqxCheckBox($.extend(true, CheckBoxDefaultSettings, {width: 150, checked: Repairs.RepairPay}));
                    $("#edReturn").jqxCheckBox($.extend(true, CheckBoxDefaultSettings, {width: 150, checked: Repairs.Return}));
                    $("#edWorkOk").jqxCheckBox($.extend(true, CheckBoxDefaultSettings, {width: 200, checked: Repairs.work_ok}));
                    $("#edWrnt").jqxCheckBox($.extend(true, CheckBoxDefaultSettings, {width: 220, checked: Repairs.Wrnt}));
                    $("#edEquip").jqxInput($.extend(true, {}, {height: 25, width: 300, minLength: 1}));
                    $("#edSerialNumber").jqxInput($.extend(true, {}, {height: 25, width: 200, minLength: 1}));
                    $("#edUmName").jqxInput($.extend(true, {}, {height: 25, width: 60, minLength: 1}));
                    $("#edQuant").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px', value: Repairs.Quant}));
                    $("#edPrice").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px', value: Repairs.Price}));
                    $("#edUsed").jqxCheckBox($.extend(true, CheckBoxDefaultSettings, {width: 60, checked: Repairs.Used}));
                    $('#edSet').jqxTextArea($.extend(true, TextAreaDefaultSettings, { height: 50, width: '400px', minLength: 1}));
                    $('#edDefect').jqxTextArea($.extend(true, TextAreaDefaultSettings, { height: 50, width: '400px', minLength: 1}));
                    
                    if (Repairs.Number != '') $("#edNumber").jqxInput('val', Repairs.Number);
                    if (Repairs.Prior != '') $("#edPrior").jqxInput('val', Repairs.Prior);
                    if (Repairs.Demand_id != '') $("#edDemand").jqxInput('val', Repairs.Demand_id);
                    if (Repairs.Addr != '') $("#edAddress").jqxInput('val', Repairs.Addr);
                    if (Repairs.Equip != '') $("#edEquip").jqxInput('val', Repairs.Equip);
                    if (Repairs.SN != '') $("#edSerialNumber").jqxInput('val', Repairs.SN);
                    if (Repairs.UmName != '') $("#edUmName").jqxInput('val', Repairs.UmName);
                    if (Repairs.Set != '') $("#edSet").jqxTextArea('val', Repairs.Set);
                    if (Repairs.Defect != '') $("#edDefect").jqxTextArea('val', Repairs.Defect);
                break;
                case 1:
                    $("#edResult").jqxInput($.extend(true, {}, {height: 25, width: 250, minLength: 1}));
                    if (Repairs.ResultName != '') $("#edResult").jqxInput('val', Repairs.ResultName);
                break;
                case 2:
                    $("#edEDefect").jqxTextArea($.extend(true, {}, {height: 85, width: 600, minLength: 1}));
                    $("#edDatePlanAction1").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, value: Repairs.DatePlanAction1, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
                    $("#edDateFactAction1").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, value: Repairs.DateFactAction1, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
                    $("#edExecHour").jqxInput($.extend(true, {}, {height: 25, width: 100, minLength: 1}));
                    
                    if (Repairs.EDefect != '') $("#edEDefect").jqxTextArea('val', Repairs.EDefect);
                    if (Repairs.DatePlanAction1 != '') $("#edDatePlanAction1").jqxDateTimeInput('val', Repairs.DatePlanAction1);
                    if (Repairs.DateFactAction1 != '') $("#edDateFactAction1").jqxDateTimeInput('val', Repairs.DateFactAction1);
                    if (Repairs.ExecHour != '') $("#edExecHour").jqxInput('val', Repairs.ExecHour);
                break;
            }
        };
        
        $('#Tabs').jqxTabs({ width: 'calc(100% - 2px)', height: '300px', initTabContent: initWidgets});
        $('#btnEdit').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDemand').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnClient').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnPrint').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnEdit').on('click', function(){
            if ($('#btnEdit').jqxButton('disabled')) return;
            
            var CurrentTabIndex = $('#Tabs').jqxTabs('selectedItem');
            
            if (CurrentTabIndex == 0)
                $('#RepairsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 660, width: 780, position: 'center' }));
            if (CurrentTabIndex == 1)
                $('#RepairsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 140, width: 500, position: 'center' }));
            if (CurrentTabIndex == 2)
                $('#RepairsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 360, width: 700, position: 'center',  }));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Repair/Update')) ?>,
                type: 'POST',
                async: false,
                data: {
                    Repr_id: Repairs.Repr_id,
                    Type: CurrentTabIndex
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyRepairsDialog").html(Res.html);
                    $('#RepairsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        var initWidgets2 = function (tab) {
            switch (tab) {
                case 0:
                    $("#edComment").jqxInput($.extend(true, {}, {height: 25, width: 440, minLength: 1}));
                    $("#edPlanDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, value: null, dropDownVerticalAlignment: 'top'}));
                    $('#btnAddComment').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    
                    var DataRepairComments = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceRepairComments), { async: true,
                        formatData: function (data) {
                                    $.extend(data, {
                                        Filters: ["rc.Repr_id = " + Repairs.Repr_id]
                                    });
                                    return data;
                                },
                        beforeSend: function(jqXHR, settings) {
                            //DisabledCommentsControls();
                        }
                    });
                    $("#GridComments").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 62px)',
                            width: '100%',
                            autorowheight: true,
                            showfilterrow: false,
                            source: DataRepairComments, 
                            autoshowfiltericon: true,
                            pagesizeoptions: ['10', '200', '500', '1000'],
                            pagesize: 200,
                            virtualmode: true,
                            columns:
                                [
                                    { text: 'Администрирующий', datafield: 'EmployeeName', width: 150},
                                    { text: 'Дата сообщения', datafield: 'Date', filtertype: 'date', cellsformat: 'dd.MM.yyyy', width: 130},
                                    { text: 'Сообщение', datafield: 'Comment', width: 450},
                                    { text: 'План. дата', datafield: 'DatePlan', filtertype: 'date', cellsformat: 'dd.MM.yyyy', width: 130},
                                ]
                    }));
                    
                    $("#edComment").on('keyup', function(e) {
                        var keyCode = e.keyCode || e.which;
                        if (keyCode === 13) { 
                             $('#btnAddComment').click();
                            return false;
                        }
                    });
                    
                    $('#btnAddComment').on('click', function() {
                        if ($("#edComment").val() == '' && $("#edPlanDate").val() == '') return;
                        
                        var CurrentDate = new Date();
                        CurrentDate = CurrentDate.getDay() + '.' + (CurrentDate.getMonth() + 1) + '.' + CurrentDate.getFullYear();
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('RepairComments/Create')) ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                RepairComments: {
                                    Repr_id: Repairs.Repr_id,
                                    Date: CurrentDate,
                                    DatePlan: $("#edPlanDate").val(),
                                    Comment: $("#edComment").val()
                                }
                            },
                            success: function(Res) {
                                Res = JSON.parse(Res);
                                if (Res.result === 1) {
                                    //Repairs.Refresh();
                                    $("#GridComments").jqxGrid('updatebounddata');
                                    $("#edComment").val('');
                                }
                            },
                            error: function(Res) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                            }
                        });
                    });
                break;
                case 1:
                    $('#btnAddEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnEditEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnRefreshEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnDelEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    
                    var DataRepairDetails = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceRepairDetails), { async: true,
                        formatData: function (data) {
                                    $.extend(data, {
                                        Filters: ["dt.Repr_id = " + Repairs.Repr_id]
                                    });
                                    return data;
                                },
                        beforeSend: function(jqXHR, settings) {
                            //DisabledCommentsControls();
                        }
                    });
                    
                    $("#GridEquips").on('rowselect', function (event) {
                        CurrentRowDetails = $('#GridEquips').jqxGrid('getrowdata', event.args.rowindex);
                    });
                    
                    $("#GridEquips").on("bindingcomplete", function (event) {
                        if (CurrentRowDetails != undefined) {
                            Aliton.SelectRowById('rpdt_id', CurrentRowDetails.rpdt_id, '#GridEquips', false);
                        }
                        else {
                            if (FirstStart) {
                                $('#GridEquips').jqxGrid('selectrow', 0);
                                $('#GridEquips').jqxGrid('ensurerowvisible', 0);
                                FirstStart = false;
                            }
                        }
                    });
            
                    
                    $("#GridEquips").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 62px)',
                            width: '100%',
                            showfilterrow: false,
                            source: DataRepairDetails, 
                            autoshowfiltericon: true,
                            pagesizeoptions: ['10', '200', '500', '1000'],
                            pagesize: 200,
                            virtualmode: true,
                            columns:
                                [
                                    { text: 'Наименование', datafield: 'EquipName', width: 350},
                                    { text: 'Ед. изм.', datafield: 'um_name', width: 60},
                                    { text: 'Требуется', datafield: 'docm_quant', width: 110, cellsformat: 'f2'},
                                    { text: 'В наличие', datafield: 'fact_quant', width: 110, cellsformat: 'f2'},
                                    { text: 'Сумма', datafield: 'summa', width: 110, cellsformat: 'f2'},
                                ]
                    }));
                    
                    $("#btnAddEquips").on('click', function(){
                        if ($("#btnAddEquips").jqxButton('disabled')) return;
                        if (Repairs.Repr_id !== null) {
                            $('#RepairsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 205, width: 640, position: 'center' }));
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('RepairDetails/Create')) ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    Repr_id: Repairs.Repr_id
                                },
                                success: function(Res) {
                                    Res = JSON.parse(Res);
                                    $("#BodyRepairsDialog").html(Res.html);
                                    $('#RepairsDialog').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });
                        }
                    });

                    $("#btnEditEquips").on('click', function(){
                        if ($("#btnEditEquips").jqxButton('disabled')) return;
                        if (Repairs.Repr_id !== null) {
                            $('#RepairsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 205, width: 640, position: 'center' }));
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('RepairDetails/Update')) ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    Rpdt_id: CurrentRowDetails.rpdt_id,
                                    Repr_id: Repairs.Repr_id
                                    
                                },
                                success: function(Res) {
                                    Res = JSON.parse(Res);
                                    $("#BodyRepairsDialog").html(Res.html);
                                    $('#RepairsDialog').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });
                        }
                    });

                    $("#btnRefreshEquips").on('click', function() {
                        if ($("#btnRefreshEquips").jqxButton('disabled')) return;
                        if (CurrentRowDetails != undefined) {
                            var Rpdt_id = CurrentRowDetails.rpdt_id
                            CurrentRowDetails = undefined;
                            Aliton.SelectRowById('rpdt_id', Rpdt_id, '#GridEquips', true);
                        }
                        else
                            Aliton.SelectRowById('rpdt_id', null, '#GridEquips', true);

                    });
                    
                    $("#btnDelEquips").on('click', function(){
                        if ($("#btnDelEquips").jqxButton('disabled')) return;
                        if (Repairs.Repr_id !== null && CurrentRowDetails !== undefined) {
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('RepairDetails/Delete')) ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    Rpdt_id: CurrentRowDetails.rpdt_id,
                                    Repr_id: Repairs.Repr_id
                                    
                                },
                                success: function(Res) {
                                    Res = JSON.parse(Res);
                                    if (Res.result === 1) {
                                        CurrentRowDetails = undefined;
                                        $("#btnRefreshEquips").click();
                                        Repairs.Refresh();
                                    }
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });
                        }
                    });
                break;
                case 2:

                    $("#DocsPanel").on('open', function(){
                        SetStateButtons();
                    });

                    $("#DocsPanel").jqxDropDownButton({initContent: function(){
                        $('#btnAddMonitoring').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 256, height: 30, disabled: false }));
                        $('#btnAddCostCalc').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 256, height: 30, disabled: false }));
                        $('#btnAddWHDoc9').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 256, height: 30, disabled: false }));
                        $('#btnAddWHDoc7').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 256, height: 30, disabled: false }));
                        $('#btnAddActDefect').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 256, height: 30, disabled: false }));
                        $('#btnAddSRM').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 256, height: 30, disabled: false }));
                        $('#btnAddDelivery').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 256, height: 30, disabled: false }));
                        $('#btnAddWHDoc5').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 256, height: 30, disabled: false }));
                        $('#btnAddWHDoc4').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 256, height: 30, disabled: false }));
                        
                        $('#btnAddMonitoring').on('click', function(){
                            $('#RepairsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '330px', width: '640'}));
                            $.ajax({
                                url: "<?php echo Yii::app()->createUrl('MonitoringDemands/Insert');?>",
                                type: 'POST',
                                async: false,
                                data: {
                                    DialogId: 'RepairsDialog',
                                    BodyDialogId: 'BodyRepairsDialog',
                                    Params: {
                                        Repr_id: Repairs.Repr_id,
                                        Prior: 1,
                                        Note: Repairs.Note
                                    }
                                },
                                success: function(Res) {
                                    $('#BodyRepairsDialog').html(Res);
                                    $('#RepairsDialog').jqxWindow('open');
                                }
                            });
                        });
                        
                        $("#btnAddCostCalc").on('click', function(){
                            if ($("#btnAddCostCalc").jqxButton('disabled')) return;
                            if (Repairs.ObjectGr_id !== null) {
                                $('#RepairsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 540, width: 635, position: 'center' }));
                                $.ajax({
                                    url: <?php echo json_encode(Yii::app()->createUrl('CostCalculations/Create')) ?>,
                                    type: 'POST',
                                    async: false,
                                    data: {
                                        Params: {
                                            ObjectGr_id: Repairs.ObjectGr_id,
                                            repr_id: Repairs.Repr_id,
                                            group_name: 'Ремонт, заявка №' + Repairs.Number,
                                            ccwt_id: (parseInt(Repairs.Rslt_id) == 1) ? 6:5,
                                            date: Repairs.Date,
                                            Demand_id: Repairs.Demand_id,
                                            jrdc_id: Repairs.Jrdc_id,
                                        },
                                        ObjectGr_id: Repairs.ObjectGr_id

                                    },
                                    success: function(Res) {
                                        Res = JSON.parse(Res);
                                        $("#BodyRepairsDialog").html(Res.html);
                                        $('#RepairsDialog').jqxWindow('open');
                                    },
                                    error: function(Res) {
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                    }
                                });
                            }
                        });
                        
                        $('#btnAddWHDoc9').on('click', function() {
                            $('#RepairsDialog').jqxWindow({width: 600, height: 300, position: 'center', isModal: true});
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('WHDocuments/Create')) ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    Dctp_id: 9,
                                    DialogId: 'RepairsDialog',
                                    BodyDialogId: 'BodyRepairsDialog',
                                    Params: {
                                        repr_id: Repairs.Repr_id,
                                        date: Repairs.Date,
                                        dmnd_empl_id: Repairs.Master_id,
                                        empl_id: Repairs.CurrentEmpl_id,
                                        objc_id: Repairs.Object_id,
                                        note: 'Ремонт, заявка №' + Repairs.Number
                                    },
                                },
                                success: function(Res) {
                                    Res = JSON.parse(Res);

                                    $("#BodyRepairsDialog").html(Res.html);
                                    $('#RepairsDialog').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });
                        });
                        
                        $('#btnAddWHDoc7').on('click', function() {
                            $('#RepairsDialog').jqxWindow({width: 600, height: 300, position: 'center', isModal: true});
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('WHDocuments/Create')) ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    Dctp_id: 7,
                                    DialogId: 'RepairsDialog',
                                    BodyDialogId: 'BodyRepairsDialog',
                                    Params: {
                                        repr_id: Repairs.Repr_id,
                                        date: Repairs.Date,
                                        objc_id: Repairs.Object_id,
                                        strg_id: 1,
                                        note: 'Ремонт, заявка №' + Repairs.Number
                                    },
                                },
                                success: function(Res) {
                                    Res = JSON.parse(Res);

                                    $("#BodyRepairsDialog").html(Res.html);
                                    $('#RepairsDialog').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });
                        });
                        
                        $('#btnAddDelivery').on('click', function(){
                            $('#RepairsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: false, height: '440px', width: '740'}));
                            $.ajax({
                                url: "<?php echo Yii::app()->createUrl('Delivery/Insert');?>",
                                type: 'POST',
                                async: false,
                                data: {
                                    DialogId: 'RepairsDialog',
                                    BodyDialogId: 'BodyRepairsDialog',
                                    Params: {
                                        repr_id: Repairs.Repr_id,
                                        date: Repairs.Date,
                                        prty_id: 1,
                                        objc_id: Repairs.Object_id
                                    }
                                },
                                success: function(Res) {
                                    $('#BodyRepairsDialog').html(Res);
                                    $('#RepairsDialog').jqxWindow('open');
                                }
                            });
                        });
                        
                        $('#btnAddWHDoc5').on('click', function(){
                            $('#RepairsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 470, width: 940}));
                            $.ajax({
                                url: "<?php echo Yii::app()->createUrl('WHActs/Insert');?>",
                                type: 'POST',
                                async: false,
                                data: {
                                    DialogId: 'RepairsDialog',
                                    BodyDialogId: 'BodyRepairsDialog',
                                    Params: {
                                        repr_id: Repairs.Repr_id,
                                        date: Repairs.date,
                                        jbtp_id: 1,
                                        objc_id: Repairs.Object_id,
                                        jrdc_id: Repairs.Jrdc_id,
                                        dmnd_empl_id: Repairs.Egnr_id
                                    }
                                },
                                success: function(Res) {
                                    Res = JSON.parse(Res);
                                    $('#RepairsDialog').jqxWindow('open');
                                    $('#BodyRepairsDialog').html(Res.html);
                                }
                            });
                        });
                        
                        $('#btnAddWHDoc4').on('click', function() {
                            $('#RepairsDialog').jqxWindow({width: 710, height: 500, position: 'center', isModal: true});
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('WHDocuments/Create')) ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    Dctp_id: 4,
                                    DialogId: 'RepairsDialog',
                                    BodyDialogId: 'BodyRepairsDialog',
                                    Params: {
                                        repr_id: Repairs.Repr_id,
                                        date: Repairs.Date,
                                        objc_id: Repairs.Object_id,
                                        strg_id: 1,
                                        dmnd_empl_id: Repairs.Egnr_id,
                                        note: Repairs.Note
                                    },
                                },
                                success: function(Res) {
                                    Res = JSON.parse(Res);

                                    $("#BodyRepairsDialog").html(Res.html);
                                    $('#RepairsDialog').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });
                        });
                        
                        $('#btnAddActDefect').on('click', function() {
                            $('#RepairsDialog').jqxWindow({width: 710, height: 300, position: 'center', isModal: true});
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('RepairDocs/Create')) ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    Dctp_id: 1,
                                    DialogId: 'RepairsDialog',
                                    BodyDialogId: 'BodyRepairsDialog',
                                    Params: {
                                        repr_id: Repairs.Repr_id,
                                        dctp_id: 1
                                    },
                                },
                                success: function(Res) {
                                    Res = JSON.parse(Res);

                                    $("#BodyRepairsDialog").html(Res.html);
                                    $('#RepairsDialog').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });
                        });
                        
                        $('#btnAddSRM').on('click', function() {
                            $('#RepairsDialog').jqxWindow({width: 710, height: 450, position: 'center', isModal: true});
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('RepairDocs/Create')) ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    Dctp_id: 2,
                                    DialogId: 'RepairsDialog',
                                    BodyDialogId: 'BodyRepairsDialog',
                                    Params: {
                                        repr_id: Repairs.Repr_id,
                                        dctp_id: 2
                                    },
                                },
                                success: function(Res) {
                                    Res = JSON.parse(Res);

                                    $("#BodyRepairsDialog").html(Res.html);
                                    $('#RepairsDialog').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });
                        });
                
                    }});
                    
                    $("#DocsPanel").jqxDropDownButton($.extend(true, {}, DropDownButtonDefaultSettings, { dropDownVerticalAlignment: 'top', autoOpen: false, width: 260, height: 28 }));
                    var DD = '<div style="position: relative; margin-left: 3px; text-align: center; margin-top: 6px;">Создать</div>';
                    $("#DocsPanel").jqxDropDownButton('setContent', DD);
                    
                    $('#btnDelDocuments').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    var DataRepairDocuments = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceRepairDocuments), { async: true,
                        formatData: function (data) {
                                    $.extend(data, {
                                        Variables: {Repr_id: Repairs.Repr_id}
                                    });
                                    return data;
                                },
                        beforeSend: function(jqXHR, settings) {
                            //DisabledCommentsControls();
                        }
                    });
                    
                    var CurrentRowDoc;
                    
                    $("#GridDocuments").on('rowselect', function (event) {
                        CurrentRowDoc = $('#GridDocuments').jqxGrid('getrowdata', event.args.rowindex);
                    });
                    
                    $("#GridDocuments").on('rowdoubleclick', function() {
                        if (CurrentRowDoc != undefined) {
                            var Type = parseInt(CurrentRowDoc.doctype_id);
                            if (Type == 1)
                                window.open(<?php echo json_encode(Yii::app()->createUrl('MonitoringDemands/Index')); ?> + "&mndm_id=" + CurrentRowDoc.docid);
                            if (Type == 2)
                                window.open(<?php echo json_encode(Yii::app()->createUrl('CostCalculations/Index')); ?> + "&calc_id=" + CurrentRowDoc.docid);
                            if (Type == 3)
                                window.open(<?php echo json_encode(Yii::app()->createUrl('WHDocuments/View')); ?> + "&Docm_id=" + CurrentRowDoc.docid);
                            if (Type == 4)
                                window.open(<?php echo json_encode(Yii::app()->createUrl('WHDocuments/View')); ?> + "&Docm_id=" + CurrentRowDoc.docid);
                            if (Type == 5 || Type == 6) {
                                $('#RepairsDialog').jqxWindow({width: 710, height: 450, position: 'center', isModal: true});
                                $.ajax({
                                    url: <?php echo json_encode(Yii::app()->createUrl('RepairDocs/Update')) ?>,
                                    type: 'POST',
                                    async: false,
                                    data: {
                                        rpdoc_id: CurrentRowDoc.docid,
                                        Dctp_id: (Type == 5) ? 1:2,
                                        DialogId: 'RepairsDialog',
                                        BodyDialogId: 'BodyRepairsDialog',
                                        Params: {
                                            repr_id: Repairs.Repr_id,
                                            dctp_id: 1
                                        },
                                    },
                                    success: function(Res) {
                                        Res = JSON.parse(Res);

                                        $("#BodyRepairsDialog").html(Res.html);
                                        $('#RepairsDialog').jqxWindow('open');
                                    },
                                    error: function(Res) {
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                    }
                                });
                            }
                            
//                            if (Type == 6)
                            if (Type == 7)
                                window.open(<?php echo json_encode(Yii::app()->createUrl('Delivery/View')); ?> + "&Dldm_id=" + CurrentRowDoc.docid);
                            if (Type == 8)
                                window.open(<?php echo json_encode(Yii::app()->createUrl('WHActs/View')); ?> + "&docm_id=" + CurrentRowDoc.docid);
                    
                            
                        }
                    });
                    
                    $("#GridDocuments").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 62px)',
                            width: '100%',
                            showfilterrow: false,
                            source: DataRepairDocuments, 
                            autoshowfiltericon: true,
                            pagesizeoptions: ['10', '200', '500', '1000'],
                            pagesize: 200,
                            virtualmode: true,
                            columns:
                                [
                                    { text: 'Тип документа', datafield: 'doctype', width: 350},
                                    { text: 'Дата рег.', datafield: 'datereg', filtertype: 'date', cellsformat: 'dd.MM.yyyy', width: 130},
                                    { text: 'Номер', datafield: 'number', width: 100},
                                    { text: 'Статус', datafield: 'status', width: 120},
                                    { text: 'Примечание', datafield: 'note', width: 120},
                                ]
                    }));
                break;
            }
        };
        
        $('#Tabs2').jqxTabs({ width: 'calc(100% - 2px)', height: 'calc(100% - 2px)', initTabContent: initWidgets2});
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {}));
        DataEmployees.dataBind();
        DataEmployees = DataEmployees.records;
        
        $("#edMaster").jqxComboBox({source: DataEmployees, width: '150', height: '25px', displayMember: "EmployeeName", valueMember: "Employee_id"});
        $("#edEngineer").jqxComboBox({source: DataEmployees, width: '150', height: '25px', displayMember: "EmployeeName", valueMember: "Employee_id"});
        $('#btnReturn').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 220, height: 30 }));
        $('#btnReturn').on('click', function() {
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Repair/Return')) ?>,
                type: 'POST',
                async: false,
                data: {
                    Repairs: {
                        Repr_id: Repairs.Repr_id
                    }
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    if (Res.result === 1) {
                        Repairs.Refresh();
                    }
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        if (Repairs.Master_id != '') $("#edMaster").jqxComboBox('val', Repairs.Master_id);
        if (Repairs.Egnr_id != '') $("#edEngineer").jqxComboBox('val', Repairs.Egnr_id);
        
        
        var SetStateButtons = function() {
            $('#btnAccept').jqxButton({ disabled: !(parseInt(Repairs.Status) in {1:null, 2:null} && Repairs.DateAccept == null) });
            $('#btnSendAgree').jqxButton({ disabled: !(parseInt(Repairs.Status) == 7 && Repairs.DateSendAgree == null) });
            $('#btnAgree').jqxButton({ disabled: !(parseInt(Repairs.Status) == 8 && Repairs.DateAgree == null) });
            $('#btnNoAgree').jqxButton({ disabled: !(parseInt(Repairs.Status) == 8 && Repairs.DateNoAgree == null) });
            $('#btnReady').jqxButton({ disabled: true });
            $('#btnExec').jqxButton({disabled: true});
            if (parseInt(Repairs.Status) in {9:null, 3:null, 4:null}) {
                $('#btnReady').jqxButton({ disabled: !(Repairs.DateReady == null) });
            }
            if (parseInt(Repairs.Status) in {5:null, 6:null, 10:null}) {
                $('#btnExec').jqxButton({ disabled: !(Repairs.DateExec == null) });
            }
            if (parseInt(Repairs.Status == 12) && parseInt(Repairs.Rslt_id) in {1:null, 2:null}) {
                $('#btnExec').jqxButton({ disabled: !(Repairs.DateExec == null) });
            }
            if (parseInt(Repairs.Status) == 11) {
                $('#btnExec').jqxButton({ disabled: true });
            }
        };
        
        $("#ActionPanel").on('open', function(){
            SetStateButtons();
        });
        
        $("#ActionPanel").jqxDropDownButton({initContent: function(){
            $('#btnAccept').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 256, height: 30, disabled: true }));
            $('#btnSendAgree').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 256, height: 30, disabled: true }));
            $('#btnAgree').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 256, height: 30, disabled: true }));
            $('#btnNoAgree').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 256, height: 30, disabled: true }));
            $('#btnReady').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 256, height: 30, disabled: true }));
            $('#btnExec').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 256, height: 30, disabled: true }));
            
            $('#btnAccept').on('click', function() {
                $("#ActionPanel").jqxDropDownButton('close');
                if ($('#edMaster').val() == '') {
                    Aliton.ShowErrorMessage('Выберите мастера', 'Для принятия документа, требуется выбрать мастера.');
                    return; 
                }
                
                if ($('#edEngineer').val() == '') {
                    Aliton.ShowErrorMessage('Выберите инженера ПРЦ', 'Для принятия документа, требуется выбрать инженера ПРЦ.');
                    return; 
                }
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Repair/Accept')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Repairs: {
                            Repr_id: Repairs.Repr_id,
                            Mstr_id: Repairs.Master_id,
                            Egnr_id: Repairs.Egnr_id
                        }
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result === 1) {
                            Repairs.Refresh();
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            });
            
            $('#btnSendAgree').on('click', function() {
                $("#ActionPanel").jqxDropDownButton('close');
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Repair/SendAgree')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Repairs: {
                            Repr_id: Repairs.Repr_id
                        }
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result === 1) {
                            Repairs.Refresh();
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            });
            
            $('#btnReady').on('click', function() {
                $("#ActionPanel").jqxDropDownButton('close');
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Repair/Ready')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Repairs: {
                            Repr_id: Repairs.Repr_id
                        }
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result === 1) {
                            Repairs.Refresh();
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            });
            
            $('#btnExec').on('click', function() {
                $("#ActionPanel").jqxDropDownButton('close');
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Repair/Exec')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Repairs: {
                            Repr_id: Repairs.Repr_id
                        }
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result === 1) {
                            Repairs.Refresh();
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
                
            });
            
            $('#btnNoAgree').on('click', function() {
                $("#ActionPanel").jqxDropDownButton('close');
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Repair/NoAgree')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Repairs: {
                            Repr_id: Repairs.Repr_id
                        }
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result === 1) {
                            Repairs.Refresh();
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            });
            
            $('#btnAgree').on('click', function() {
                $("#ActionPanel").jqxDropDownButton('close');
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Repair/Agree')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Repairs: {
                            Repr_id: Repairs.Repr_id
                        }
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result === 1) {
                            Repairs.Refresh();
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            });
            
        }});
        
        $("#ActionPanel").jqxDropDownButton($.extend(true, {}, DropDownButtonDefaultSettings, { dropDownVerticalAlignment: 'top', autoOpen: false, width: 260, height: 28 }));
        var DD = '<div style="position: relative; margin-left: 3px; text-align: center; margin-top: 6px;">Операция</div>';
        $("#ActionPanel").jqxDropDownButton('setContent', DD);
        CheckTabs(); 
    });
</script> 

<?php $this->setPageTitle('Ремонт - заявка'); ?>

<div class="al-row">
    <div id='Tabs'>
        <ul>
            <li style="margin-left: 30px;">
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Общая информация</div>
                </div>
            </li>
            <li style="*margin-left: 30px;">
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Диагностика</div>
                </div>
            </li>
            <li style="*margin-left: 30px;">
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Ремонт в ПРЦ</div>
                </div>
            </li>
            <li>
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Ремонт в СРМ</div>
                </div>
            </li>
            <li>
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Неремонтопригодно</div>
                </div>
            </li>
        </ul>
        <div style="overflow: hidden;">
            <div style="padding: 10px;">
                <div class="al-row">
                    <div class="al-row-column" style="width: 100px">Номер</div>
                    <div class="al-row-column"><input type="text" readonly="readonly" id="edNumber" /></div>
                    <div class="al-row-column">Дата прих. оборуд.</div>
                    <div class="al-row-column"><div id="edDate"></div></div>
                    <div class="al-row-column">Срочность</div>
                    <div class="al-row-column"><input type="text" readonly="readonly" id="edPrior" /></div>
                    <div class="al-row-column" id="edStatusName"><b><?php echo $model->status_name; ?></b></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column">
                        <div class="al-row" style="padding: 0px;">Адрес</div>
                        <div style="clear: both"></div>
                        <div class="al-row" style="padding: 0px;"><input type="text" readonly="readonly" id="edAddress" /></div>
                    </div>
                    <div class="al-row-column">
                        <div class="al-row" style="padding: 0px;">Жедаемая дата</div>
                        <div style="clear: both"></div>
                        <div class="al-row" style="padding: 0px;"><div id="edBestDate"></div></div>
                    </div>
                    <div class="al-row-column">
                        <div class="al-row" style="padding: 0px;">Предельная дата</div>
                        <div style="clear: both"></div>
                        <div class="al-row" style="padding: 0px;"><div id="edDeadline"></div></div>
                    </div>
                    <div class="al-row-column">
                        <div class="al-row" style="padding: 0px;">План. дата</div>
                        <div style="clear: both"></div>
                        <div class="al-row" style="padding: 0px;"><div id="edDatePlan"></div></div>
                    </div>
                    <div class="al-row-column">
                        <div class="al-row" style="padding: 0px;">Номер заявки</div>
                        <div style="clear: both"></div>
                        <div class="al-row" style="padding: 0px;"><input type="text" readonly="readonly" id="edDemand" /></div>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column"><div id="edRepairPay">Платные работы</div></div>
                    <div class="al-row-column"><div id="edReturn">Требуется возврат</div></div>
                    <div class="al-row-column"><div id="edWorkOk">Оборудование исправное</div></div>
                    <div class="al-row-column"><div id="edWrnt">Оборудование на гарантии</div></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding-bottom: 0px">
                    <div class="al-row-column">
                        <div class="al-row" style="padding: 0px;">Обрудование</div>
                        <div style="clear: both"></div>
                        <div class="al-row" style="padding: 0px;"><input type="text" readonly="readonly" id="edEquip" /></div>
                    </div>
                    <div class="al-row-column">
                        <div class="al-row" style="padding: 0px;">Серийный номер</div>
                        <div style="clear: both"></div>
                        <div class="al-row" style="padding: 0px;"><input type="text" readonly="readonly" id="edSerialNumber" /></div>
                    </div>
                    <div class="al-row-column">
                        <div class="al-row" style="padding: 0px;">Ед. изм.</div>
                        <div style="clear: both"></div>
                        <div class="al-row" style="padding: 0px;"><input type="text" readonly="readonly" id="edUmName" /></div>
                    </div>
                    <div class="al-row-column">
                        <div class="al-row" style="padding: 0px;">Количество</div>
                        <div style="clear: both"></div>
                        <div class="al-row" style="padding: 0px;"><div id="edQuant"></div></div>
                    </div>
                    <div class="al-row-column">
                        <div class="al-row" style="padding: 0px;">Цена</div>
                        <div style="clear: both"></div>
                        <div class="al-row" style="padding: 0px;"><div id="edPrice"></div></div>
                    </div>
                    <div class="al-row-column"><div id="edUsed">Б\У</div></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px">
                    <div class="al-row-column">
                        <div class="al-row" style="padding: 0px;">Комплектность</div>
                        <div style="clear: both"></div>
                        <div class="al-row" style="padding: 0px;"><textarea readonly="readonly" id="edSet"></textarea></div>
                    </div>
                    <div class="al-row-column">
                        <div class="al-row" style="padding: 0px;">Неисправность</div>
                        <div style="clear: both"></div>
                        <div class="al-row" style="padding: 0px;"><textarea readonly="readonly" id="edDefect"></textarea></div>
                    </div>
                    <div style="clear: both"></div>
                </div>
            </div>
            
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px;">
                <div class="al-row">
                    <div class="al-row-column">Диагностика</div>
                    <div class="al-row-column"><input type="text" id="edResult" /></div>
                </div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px;">
                <div class="al-row">
                    <div class="al-row" style="padding: 0px;">Подтвержденная неисправность</div>
                    <div style="clear: both"></div>
                    <div class="al-row" style="padding: 0px;"><textarea readonly="readonly" id="edEDefect"></textarea></div>
                </div>
                <div class="al-row">
                    <div class="al-row" style="padding: 0px;">Дата выполнения ремонта</div>
                    <div class="al-row" style="padding: 0px;">
                        <div class="al-row-column">
                            <div class="al-row" style="padding: 0px;">План. дата</div>
                            <div style="clear: both"></div>
                            <div class="al-row" style="padding: 0px;"><div id="edDatePlanAction1"></div></div>
                        </div>
                        <div class="al-row-column">
                            <div class="al-row" style="padding: 0px;">Факт. дата</div>
                            <div style="clear: both"></div>
                            <div class="al-row" style="padding: 0px;"><div id="edDateFactAction1"></div></div>
                        </div>
                        <div style="clear: both"></div>
                    </div>
                </div>
                 <div class="al-row">
                    <div class="al-row" style="padding: 0px;">Времязатратность (ч)</div>
                    <div style="clear: both"></div>
                    <div class="al-row" style="padding: 0px;"><input type="text" readonly="readonly" id="edExecHour" /></div>
                </div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px;"></div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px;"></div>
        </div>
    </div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" id="btnEdit" value="Изменить"/></div>
    <div class="al-row-column"><input type="button" id="btnDemand" value="Заявка"/></div>
    <div class="al-row-column"><input type="button" id="btnClient" value="Карточка"/></div>
    <div class="al-row-column" style="float: right"><input type="button" id="btnPrint" value="Печать"/></div>
    <div style="clear: both"></div>
</div>
<div class="al-row" style="height: calc(100% - 394px)">
    <div id='Tabs2'>
        <ul>
            <li style="margin-left: 30px;">
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Ход работы</div>
                </div>
            </li>
            <li>
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Используемые материалы</div>
                </div>
            </li>
            <li>
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Документы</div>
                </div>
            </li>
            
        </ul>
        <div style="overflow: hidden;">
            <div style="padding: 10px;">
                <div class="al-row"><div id="GridComments"></div></div>
                <div class="al-row">
                    <div class="al-row-column"><input id="edComment" /></div>
                    <div class="al-row-column">План. дата</div>
                    <div class="al-row-column"><div id="edPlanDate"></div></div>
                    <div class="al-row-column"><input type="button" id="btnAddComment" value="Написать"/></div>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px;">
                <div class="al-row"><div id="GridEquips"></div></div>
                <div class="al-row">
                    <div class="al-row-column"><input type="button" id="btnAddEquips" value="Добавить"/></div>
                    <div class="al-row-column"><input type="button" id="btnEditEquips" value="Изменить"/></div>
                    <div class="al-row-column"><input type="button" id="btnRefreshEquips" value="Обновить"/></div>
                    <div class="al-row-column" style="float: right"><input type="button" id="btnDelEquips" value="Удалить"/></div>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px;">
                <div class="al-row"><div id="GridDocuments"></div></div>
                <div class="al-row">
                    <div class="al-row-column">
                            <div style='float: left;' id="DocsPanel">
                                <div style="height: 308px">
                                    <div style="padding: 2px"><input type="button" value="Заявка на мониторинг" id='btnAddMonitoring'/></div>
                                    <div style="clear: both"></div>
                                    <div style="padding: 2px"><input type="button" value="Коммерческое предложение" id='btnAddCostCalc'/></div>
                                    <div style="clear: both"></div>
                                    <div style="padding: 2px"><input type="button" value="Накладная на возврат мастеру" id='btnAddWHDoc9'/></div>
                                    <div style="clear: both"></div>
                                    <div style="padding: 2px"><input type="button" value="Накладная на перемещение с ПРЦ на склад" id='btnAddWHDoc7'/></div>
                                    <div style="clear: both"></div>
                                    <div style="padding: 2px"><input type="button" value="Акт дефектации" id='btnAddActDefect'/></div>
                                    <div style="clear: both"></div>
                                    <div style="padding: 2px"><input type="button" value="Сопроводительная накладная" id='btnAddSRM'/></div>
                                    <div style="clear: both"></div>
                                    <div style="padding: 2px"><input type="button" value="Заявка на доставку" id='btnAddDelivery'/></div>
                                    <div style="clear: both"></div>
                                    <div style="padding: 2px"><input type="button" value="Акт списания метериалов с инженера ПРЦ" id='btnAddWHDoc5'/></div>
                                    <div style="clear: both"></div>
                                    <div style="padding: 2px"><input type="button" value="Требование" id='btnAddWHDoc4'/></div>
                                </div>
                            </div>
                    </div>
                    <div class="al-row-column" style="float: right"><input type="button" id="btnDelDocuments" value="Удалить"/></div>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
    </div>
        
</div>
<div class="al-row" >
    <div class="al-row-column">Мастер</div>
    <div class="al-row-column"><div id="edMaster"></div></div>
    <div class="al-row-column">Инженер ПРЦ</div>
    <div class="al-row-column"><div id="edEngineer"></div></div>
    <div class="al-row-column">
        <div style='float: left;' id="ActionPanel">
            <div style="height: 206px">
                <div style="padding: 2px"><input type="button" value="Принять" id='btnAccept'/></div>
                <div style="clear: both"></div>
                <div style="padding: 2px"><input type="button" value="Отп. на согл." id='btnSendAgree'/></div>
                <div style="clear: both"></div>
                <div style="padding: 2px"><input type="button" value="Согласовать" id='btnAgree'/></div>
                <div style="clear: both"></div>
                <div style="padding: 2px"><input type="button" value="Несогласовано" id='btnNoAgree'/></div>
                <div style="clear: both"></div>
                <div style="padding: 2px"><input type="button" value="Ремонт выполнен" id='btnReady'/></div>
                <div style="clear: both"></div>
                <div style="padding: 2px"><input type="button" value="Выполнено" id='btnExec'/></div>
            </div>
        </div>
        
    </div>
    <div class="al-row-column" style="float: right"><input type="button" id="btnReturn" value="Возврат на диагностику"/></div>
    <div style="clear: both"></div>
</div>

<div id="RepairsDialog" style="display: none;">
    <div id="RepairsDialogHeader">
        <span id="RepairsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogRepairsContent">
        <div style="" id="BodyRepairsDialog"></div>
    </div>
</div>