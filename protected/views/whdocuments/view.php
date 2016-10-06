<script type="text/javascript">
    var WHDoc = {};
    var SN = {};
    $(document).ready(function () {
        WHDoc.Employee_id = <?php echo json_encode(Yii::app()->user->Employee_id); ?>;
        var WHDocuments = {
            Docm_id: <?php echo json_encode($model->docm_id); ?>,
            Dctp_id: <?php echo json_encode($model->dctp_id); ?>,
            Number: <?php echo json_encode($model->number); ?>,
            InNumber: <?php echo json_encode($model->in_number); ?>,
            WorkType: <?php echo json_encode($model->wrtp_name); ?>,
            Date: Aliton.DateConvertToJs('<?php echo $model->date; ?>'),
            InDate: Aliton.DateConvertToJs('<?php echo $model->in_date; ?>'),
            Address: <?php echo json_encode($model->Address); ?>,
            Storage: <?php echo json_encode($model->storage); ?>,
            Strg_id: <?php echo json_encode($model->strg_id); ?>,
            Supplier: <?php echo json_encode($model->splr_name); ?>,
            DocKind: <?php echo json_encode($model->dckn_name); ?>,
            Jrdc: <?php echo json_encode($model->JuridicalPerson); ?>,
            Notes: <?php echo json_encode($model->notes); ?>,
            Achs_id: <?php echo json_encode($model->achs_id); ?>,
            Status: <?php echo json_encode($model->status); ?>,
            ActionCode: <?php echo json_encode($ActionCode); ?>,
            Objc_id: <?php echo json_encode($model->objc_id); ?>,
            Dmnd_id: <?php echo json_encode($model->dmnd_id); ?>,
            Demand_id: <?php echo json_encode($model->demand_id); ?>,
            ReturnReason: <?php echo json_encode($model->rtrs_name); ?>
        };
        
        WHDoc.Refresh = function() {
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('WHDocuments/GetModel'))?>,
                type: 'POST',
                data: {
                    Dctp_id: WHDocuments.Dctp_id,
                    Docm_id: WHDocuments.Docm_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    WHDocuments.Docm_id = Res.docm_id;
                    WHDocuments.Dctp_id = Res.dctp_id;
                    WHDocuments.Number = Res.number;
                    WHDocuments.WorkType = Res.wrtp_name;
                    WHDocuments.Date =  Aliton.DateConvertToJs(Res.date);
                    WHDocuments.Address =  Res.Address;
                    WHDocuments.Strg_id = Res.strg_id;
                    WHDocuments.Storage =  Res.storage;
                    WHDocuments.Supplier =  Res.splr_name;
                    WHDocuments.DocKind =  Res.dckn_name;
                    WHDocuments.Jrdc =  Res.JuridicalPerson;
                    WHDocuments.Notes =  Res.notes;
                    WHDocuments.Achs_id =  Res.achs_id;
                    SetValueControls(parseInt(WHDocuments.Dctp_id));
                    $("#btnRefreshDetails").click();
                    SetStateButtons();
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        };
        
        var FirstStart = true;
        
        $('#edNote').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { height: 50, width: '100%', minLength: 1}));
        $("#edMsg").jqxInput($.extend(true, {}, InputDefaultSettings, {width: '100%'}));
        $("#btnEdit").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true, imgSrc: "/images/4.png"}));
        $("#btnOperation").jqxDropDownButton($.extend(true, {}, DropDownButtonDefaultSettings, { autoOpen: false, width: 140, height: 28 }));
        $('#jqxTreeOperation').on('select', function (event) {
                var args = event.args;
                var item = $('#jqxTreeOperation').jqxTree('getItem', args.element);
            });
        $("#jqxTreeOperation").jqxTree({ width: 280});
        $("#btnOperation").jqxDropDownButton('setContent', '<div style="position: relative; margin-left: 3px; text-align: center; margin-top: 5px;">Выберите</div>');
        $("#btnPrintClient").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 180, disabled: false, imgSrc: "/images/5.png" }));
        $("#btnPrint").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false, imgSrc: "/images/5.png" }));
        $("#edQuant").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px'}));
        $("#edUsedQuant").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px'}));
        $("#btnReserv").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false, width: 150}));
        $("#edReserv").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px'}));
        $("#edReady").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px'}));
        $("#edMinReserv").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px'}));
        $("#edPurchase").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px'}));
        
        $("#btnAddDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false, imgSrc: "/images/6.png"}));
        $("#btnEditDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false, imgSrc: "/images/4.png"}));
        $("#btnRefreshDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false}));
        $("#btnHistoryDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false, width: 180}));
        $("#btnInfoDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false}));
        $("#btnDelDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false, imgSrc: "/images/7.png"}));
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees));
        DataEmployees.dataBind();
        $("#edStoreman").jqxComboBox({ source: DataEmployees.records, width: '300', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"});
        $("#edStoreman").jqxComboBox('val', WHDoc.Employee_id);
        $("#edMaster").jqxComboBox({ source: DataEmployees.records, width: '300', height: '25px', displayMember: "ShortName", valueMember: "Employee_id", disabled: true});
        var DataDelayReasons = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDelayReasonsLogistik));
        $("#edDelayReason").jqxComboBox({ source: DataDelayReasons, width: '200', height: '25px', displayMember: "name", valueMember: "dlrs_id", disabled: true});
        $("#btnAction").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false, imgSrc: "/images/8.png", width: 130}));
        $("#btnPurchase").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false, width: 180}));
        var CurrentRowDetails;
        
        var DataDetails = new $.jqx.dataAdapter($.extend(true, {}, Sources.DocmAchsDetailsSource), { async: false,
            formatData: function (data) {
                        $.extend(data, {
                            Filters: ["d.Docm_id = " + WHDocuments.Docm_id]
                        });
                        return data;
                    },
            beforeSend(jqXHR, settings) {
                        DisabledDetailsControls();
                    },
        });
        
        var DisabledDetailsControls = function() {
            $('#btnAddDetails').jqxButton({disabled: true});
            $('#btnEditDetails').jqxButton({disabled: true});
            $('#btnRefreshDetails').jqxButton({disabled: true});
            $('#btnHistoryDetails').jqxButton({disabled: true});
            $('#btnInfoDetails').jqxButton({disabled: true});
            $('#btnDelDetails').jqxButton({disabled: true});
            $("#btnReserv").jqxButton({disabled: true});
        };
        
        var SetStateDetailsButtons = function() {
            $('#btnAddDetails').jqxButton({disabled: (WHDocuments.Achs_id !== null || WHDocuments.Status === 'Готово к выдаче')});
            $('#btnEditDetails').jqxButton({disabled: (WHDocuments.Achs_id !== null || CurrentRowDetails == undefined || WHDocuments.Status === 'Готово к выдаче')});
            $('#btnRefreshDetails').jqxButton({disabled: false});
            $('#btnReserv').jqxButton({disabled: (CurrentRowDetails == undefined)});
            $('#btnHistoryDetails').jqxButton({disabled: false});
            $('#btnInfoDetails').jqxButton({disabled: (CurrentRowDetails == undefined)});
            $('#btnDelDetails').jqxButton({disabled: (WHDocuments.Achs_id !== null || CurrentRowDetails == undefined || WHDocuments.Status === 'Готово к выдаче')});
        };
        
        var SetInvInfo = function() {
            if (CurrentRowDetails != undefined) 
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Equips/GetInvInfo')); ?>,
                    type: 'POST',
                    data: {
                        Equip_id: CurrentRowDetails.eqip_id,
                        Strg_id: WHDocuments.Strg_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result = 1) {
                            $("#edQuant").jqxNumberInput('val', Res.inv_quant);
                            $("#edUsedQuant").jqxNumberInput('val', Res.inv_quant_used);
                            $("#edReserv").jqxNumberInput('val', Res.res_quant);
                            $("#edReady").jqxNumberInput('val', Res.ready_quant);
                            $("#edMinReserv").jqxNumberInput('val', Res.min_quant)
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
        };
        
        $("#GridDetails").on('rowselect', function (event) {
            
            CurrentRowDetails = $('#GridDetails').jqxGrid('getrowdata', event.args.rowindex);
            SetStateDetailsButtons();
            SetInvInfo();
        });
                    
        $("#GridDetails").on("bindingcomplete", function (event) {
            if (CurrentRowDetails != undefined) {
                Aliton.SelectRowById('dadt_id', CurrentRowDetails.dadt_id, '#GridDetails', false);
            }
            else {
                if (FirstStart) {
                    $('#GridDetails').jqxGrid('selectrow', 0);
                    $('#GridDetails').jqxGrid('ensurerowvisible', 0);
                    FirstStart = false;
                }
            }
        });
        
        
        
        $("#GridDetails").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: 200,
                width: '100%',
                source: DataDetails,
                showstatusbar: true,
                statusbarheight: 29,
                showaggregates: true,
                showfilterrow: false,
                autoshowfiltericon: true,
                pagesize: 200,
                virtualmode: false,
                columns:
                    [
                        { text: 'Оборудование', datafield: 'EquipName', width: 200 },
                        { text: 'Ед. изм.', datafield: 'NameUnitMeasurement', width: 80 },
                        { text: 'Кол-во', datafield: 'docm_quant', width: 120, cellsformat: 'f2' },
                        { text: 'Факт кол-во', datafield: 'fact_quant', width: 120, cellsformat: 'f2' },
                        { text: 'Цена', datafield: 'price', width: 120, cellsformat: 'f2' },
                        { text: 'Сумма', datafield: 'sum', width: 180, cellsformat: 'f2', aggregates: [{ 'Сумма':
                            function (aggregatedValue, currentValue) {
                                return aggregatedValue + currentValue;
                            }
                          }]
                        },
                        { text: 'Б\\У', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'used', width: 50 },
                        { text: 'В производство', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'ToProduction', width: 100 },
                        { text: 'Серийные номера', datafield: 'SN', width: 150,
                            cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
                                
                                return '<div style=\'float: left; width: 120px\'>' + value + '</div><button onclick=\'SN.Add();\' style=\'float: right; margin-top: 4px;\'>...</button>';
                            }   
                        },
                        { text: 'Без прайса', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'no_price_list', width: 100 },
                    ],
                }));
                    
        var SetValueControls = function(Dctp_id) {
            switch (Dctp_id) {
                case 1:
                    if (WHDocuments.WorkType != '') $("#edWorkType1").jqxInput('val', WHDocuments.WorkType);
                    if (WHDocuments.Storage != '') $("#edStorage1").jqxInput('val', WHDocuments.Storage);
                    if (WHDocuments.Supplier != '') $("#edSupplier1").jqxInput('val', WHDocuments.Supplier);
                    if (WHDocuments.DocKind != '') $("#edDocKind1").jqxInput('val', WHDocuments.DocKind);
                    if (WHDocuments.Number != '') $("#edNumber1").jqxInput('val', WHDocuments.Number);
                    if (WHDocuments.Jrdc != '') $("#edJrdc1").jqxInput('val', WHDocuments.Jrdc);
                    if (WHDocuments.Notes != '') $("#edNote").jqxTextArea('val', WHDocuments.Notes);
                    break;
                case 2:
                    if (WHDocuments.WorkType != '') $("#edWorkType2").jqxInput('val', WHDocuments.WorkType);
                    if (WHDocuments.Storage != '') $("#edStorage2").jqxInput('val', WHDocuments.Storage);
                    if (WHDocuments.Number != '') $("#edNumber2").jqxInput('val', WHDocuments.Number);
                    if (WHDocuments.Address != '') $("#edAddress2").jqxInput('val', WHDocuments.Address);
                    if (WHDocuments.ReturnReason != '') $("#edReturnReason2").jqxInput('val', WHDocuments.ReturnReason);
                    if (WHDocuments.InNumber != '') $("#edInNumber2").jqxInput('val', WHDocuments.InNumber);
                    if (WHDocuments.Notes != '') $("#edNote").jqxTextArea('val', WHDocuments.Notes);
                    break;
            };
        };
        
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    $("#edWorkType1").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 200}));
                    $("#edStorage1").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 200}));
                    $("#edSupplier1").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 400}));
                    $("#edDocKind1").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 400}));
                    $("#edNumber1").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 150}));
                    $("#edDate1").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { formatString: 'dd.MM.yyyy', value: WHDocuments.Date, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
                    $("#edJrdc1").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 356}));
                    SetValueControls(1);
                    
                break;
                case 1:
                    $("#edWorkType2").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 200}));
                    $("#edStorage2").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 200}));
                    $("#edNumber2").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 150}));
                    $("#edDate2").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { formatString: 'dd.MM.yyyy', value: WHDocuments.Date, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
                    $("#edAddress2").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 450}));
                    $("#edReturnReason2").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 250}));
                    $("#edInNumber2").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 150}));
                    $("#edInDate2").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { formatString: 'dd.MM.yyyy', value: WHDocuments.Date, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
                    SetValueControls(2);
                break;
            };
        };
        
        var DefaultTabIndex;
        
        
        
        switch(parseInt(WHDocuments.Dctp_id)) {
            case 1: DefaultTabIndex = 0; break;
            case 2: DefaultTabIndex = 1; break;
        }
        
        $('#edTabs').jqxTabs({ width: '100%', height: 250, initTabContent: initWidgets, selectedItem: DefaultTabIndex });
        
        $("#edTabs .jqx-tabs-title:eq(0)").css("display", "none");
        $("#edTabs .jqx-tabs-title:eq(1)").css("display", "none");
        
        switch(parseInt(WHDocuments.Dctp_id)) {
            case 1: $("#edTabs .jqx-tabs-title:eq(0)").css("display", "block"); break;
            case 2: $("#edTabs .jqx-tabs-title:eq(1)").css("display", "block"); break;
        }
        
        if (WHDocuments.Notes != '') $("#edNote").jqxTextArea('val', WHDocuments.Notes);       
        
        var SetStateButtons = function() {
            var TabIndex = $('#edTabs').jqxTabs('val');
            switch (TabIndex) {
                case 0:
                    $('#btnEdit').jqxButton({disabled: (WHDocuments.Achs_id !== null)});
                    $('#btnAction').jqxButton({disabled: (WHDocuments.Achs_id !== null)});
                    $("#edStoreman").jqxComboBox({disabled: (WHDocuments.Achs_id !== null)});
                    $("#btnPurchase").jqxButton({disabled: true});
                    $("#btnPrint").jqxButton({disabled: false});
                    $("#btnPrintClient").jqxButton({disabled: true});
                    
                break;
                case 1:
                    $('#btnEdit').jqxButton({disabled: (WHDocuments.Achs_id !== null)});
                    $('#btnAction').jqxButton({disabled: (WHDocuments.Achs_id !== null)});
                    $("#edStoreman").jqxComboBox({disabled: (WHDocuments.Achs_id !== null)});
                    $("#btnPurchase").jqxButton({disabled: true});
                    $("#btnPrint").jqxButton({disabled: false});
                    $("#btnPrintClient").jqxButton({disabled: true});
                    
                break;
            };
        };
        
        $('#WHDocumentsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '600px', width: '800', position: 'center'}));
        
        $("#btnEdit").on('click', function(){
            if ($("#btnEdit").jqxButton('disabled')) return;
            if (WHDocuments.Docm_id !== null) {
                $('#WHDocumentsDialog').jqxWindow({width: 600, height: 400, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('WHDocuments/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Docm_id: WHDocuments.Docm_id,
                        Dctp_id: WHDocuments.Dctp_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyWHDocumentsDialog").html(Res.html);
                        $('#WHDocumentsDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        WHDocuments.AddNote = function() {
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('WHDocuments/AddNote')); ?>,
                type: 'POST',
                data: {
                    Note: {
                        docm_id: WHDocuments.Docm_id,
                        note: $('#edMsg').val()
                    }
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    if (Res.result = 1) {
                        WHDoc.Refresh();
                    }
                        
                },
                error: function(Res){
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        };
        
        $("#edMsg").on('keyup', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                WHDocuments.AddNote();
                $('#edMsg').val('');
                return false;
            }
        });
        
        // Добавление оборудования
        $("#btnAddDetails").on('click', function(){
            if ($("#btnAddDetails").jqxButton('disabled')) return;
            if (WHDocuments.Docm_id !== null) {
                $('#WHDocumentsDialog').jqxWindow({width: 640, height: 205, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('DocmAchsDetails/Create')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Docm_id: WHDocuments.Docm_id,
                        Dctp_id: WHDocuments.Dctp_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyWHDocumentsDialog").html(Res.html);
                        $('#WHDocumentsDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $("#btnEditDetails").on('click', function(){
            if ($("#btnEditDetails").jqxButton('disabled')) return;
            if (WHDocuments.Docm_id !== null) {
                $('#WHDocumentsDialog').jqxWindow({width: 640, height: 205, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('DocmAchsDetails/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Dadt_id: CurrentRowDetails.dadt_id,
                        Docm_id: WHDocuments.Docm_id,
                        Dctp_id: WHDocuments.Dctp_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyWHDocumentsDialog").html(Res.html);
                        $('#WHDocumentsDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $("#btnRefreshDetails").on('click', function() {
            if ($("#btnRefreshDetails").jqxButton('disabled')) return;
            if (CurrentRowDetails != undefined) {
                var Dadt_id = CurrentRowDetails.dadt_id
                CurrentRowDetails = undefined;
                Aliton.SelectRowById('dadt_id', Dadt_id, '#GridDetails', true);
            }
            else
                Aliton.SelectRowById('dadt_id', null, '#GridDetails', true);
            
        });
        
        $("#btnHistoryDetails").on('click', function(){
            if ($("#btnHistoryDetails").jqxButton('disabled')) return;
            if (WHDocuments.Docm_id !== null) {
                $('#WHDocumentsDialog').jqxWindow({width: 840, height: 320, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('WHDocuments/AuditEquips')) ?>,
                    type: 'GET',
                    async: false,
                    data: {
                        Docm_id: WHDocuments.Docm_id,
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyWHDocumentsDialog").html(Res.html);
                        $('#WHDocumentsDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $("#btnInfoDetails").on('click', function(){
            if ($("#btnInfoDetails").jqxButton('disabled')) return;
            if (CurrentRowDetails !== undefined) {
                $('#WHDocumentsDialog').jqxWindow({width: 840, height: 300, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Equips/Inventory')) ?>,
                    type: 'GET',
                    async: false,
                    data: {
                        Equip_id: CurrentRowDetails.eqip_id,
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyWHDocumentsDialog").html(Res.html);
                        $('#WHDocumentsDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $("#btnReserv").on('click', function(){
            if ($("#btnReserv").jqxButton('disabled')) return;
            if (CurrentRowDetails !== undefined) {
                $('#WHDocumentsDialog').jqxWindow({width: 840, height: 300, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Equips/Reserve')) ?>,
                    type: 'GET',
                    async: false,
                    data: {
                        Equip_id: CurrentRowDetails.eqip_id,
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyWHDocumentsDialog").html(Res.html);
                        $('#WHDocumentsDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $("#btnDelDetails").on('click', function(){
            if ($("#btnDelDetails").jqxButton('disabled')) return;
            if (WHDocuments.Docm_id !== null && CurrentRowDetails !== undefined) {
                $('#WHDocumentsDialog').jqxWindow({width: 640, height: 205, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('DocmAchsDetails/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Dadt_id: CurrentRowDetails.dadt_id,
                        Docm_id: WHDocuments.Docm_id,
                        Dctp_id: WHDocuments.Dctp_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result === 1) {
                            CurrentRowDetails = undefined;
                            $("#btnRefreshDetails").click();
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        var isNull = function(v1, v2) {
            if (v1 == null)
                return v2;
            else
                return v1;
        }
        
        $("#btnAction").on('click', function(){
            if ($("#btnAction").jqxButton('disabled')) return;
            if (WHDocuments.Docm_id !== null) {
                $('#WHDocumentsDialog').jqxWindow({width: 640, height: 205, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('WHDocuments/Action')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        ActionHistory: {
                            Dctp_id: isNull(WHDocuments.Dctp_id, ''),
                            Dlrs_id: $('#edDelayReason').val(),
                            Docm_id: isNull(WHDocuments.Docm_id, ''),
                            ActnCode: isNull(WHDocuments.ActionCode, ''),
                            Strm_id: $('#edStoreman').val(),
                            Splr_id: isNull(WHDocuments.Splr_id, ''),
                            Mstr_id: $('#edMaster').val(),
                            Objc_id: isNull(WHDocuments.Objc_id, ''),
                            Empl_To_id: $('#edMaster').val(),
                            Wrtp_id: isNull(WHDocuments.Wrtp_id, '')
                        }
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result === 1) {
                            WHDoc.Refresh();
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $("#btnPurchase").on('click', function(){
            if ($("#btnPurchase").jqxButton('disabled')) return;
            if (WHDocuments.Docm_id !== null) {
                $('#WHDocumentsDialog').jqxWindow({width: 640, height: 205, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('WHDocuments/Purchase')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Docm_id: isNull(WHDocuments.Docm_id, ''),
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result === 1) {
                            WHDoc.Refresh();
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnDemandView').on('click', function(){
            $('#btnOperation').jqxDropDownButton('close');
            var D = 0;
            if (WHDocuemnts.Dmnd_id != null)
                D = WHDocuemnts.Dmnd_id;
            if (WHDocuemnts.Demand_id != null)
                D = WHDocuemnts.Demand_id;
            if (D > 0)
                window.open(<?php echo json_encode(Yii::app()->createUrl('Demands/View')); ?> + '&Demand_id=' + D);
                
        });
        
        $('#btnAddDelivery').on('click', function(){
            $('#btnOperation').jqxDropDownButton('close');
            if (WHDocuments.Docm_id !== null) {
                $('#WHDocumentsDialog').jqxWindow({width:740, height: 390, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Delivery/Create')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Params: {
                            docm_id: WHDocuments.Docm_id,
                            prty_id: 1,
                            objc_id: WHDocuments.Object_id
                        }
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyWHDocumentsDialog").html(Res.html);
                        $('#WHDocumentsDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $("#btnPrint").on('click', function(){
            var url = '';
            switch(parseInt(WHDocuments.Dctp_id)) {
                case 1:
                    url = <?php echo json_encode(Yii::app()->createUrl('Reports/ReportOpen', array(
                        'ReportName' => '/Склад/Накладная на приход от поставщика'
                    ))); ?>;
                break;
            }
            
            if (url != '') {
                url += '&Parameters[prmDocm_id]=' + WHDocuments.Docm_id;
                window.open(url);
            }
            
            
            console.log(WHDocuments.Dctp_id);
        });
        
        SN.Add = function() {
            console.log(CurrentRowDetails.dadt_id);
        };
        
        SetStateButtons();
    });
</script>    


<style>
    .row {
        margin-top: 0px;
    }
</style>


<?php
    $this->breadcrumbs=array(
            'Главная'=>array('/Site/index'),
            'Реестр документов'=>array('index'),
            'Документ'=>array('view'),
    );
?>

<div id='edTabs' style="margin-top: 5px;">
    <ul>
        <li style="margin-left: 20px;">
            <div style="height: 20px; margin-top: 5px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Накладная на приход</div>
                
            </div>
        </li>
        <li style="margin-left: 20px;">
            <div style="height: 20px; margin-top: 5px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Накладная на возврат</div>
            </div>
        </li>
    </ul>
    <div style="overflow: hidden;">
        <div style="padding: 10px;">
            <div class="row">
                <div class="row-column" style="width: 100px">Вид работ</div>
                <div class="row-column"><input type="text" id="edWorkType1" readonly="readonly" /></div>
                <div class="row-column">Склад</div>
                <div class="row-column"><input type="text" id="edStorage1" readonly="readonly" /></div>
            </div>  
            <div class="row">
                <div class="row-column" style="width: 100px">Поставшик</div>
                <div class="row-column"><input type="text" id="edSupplier1" readonly="readonly" /></div>
            </div>
            <div class="row">
                <div class="row-column" style="width: 100px">Вид документа</div>
                <div class="row-column"><input type="text" id="edDocKind1" readonly="readonly" /></div>
            </div>
            <div class="row">
                <div class="row-column" style="width: 100px">Номер</div>
                <div class="row-column"><input type="text" id="edNumber1" readonly="readonly" /></div>
                <div class="row-column">Дата</div>
                <div class="row-column"><div id="edDate1"></div></div>
            </div>
            <div class="row">
                <div class="row-column" style="width: 100px">Юр. лицо</div>
                <div class="row-column"><input type="text" id="edJrdc1" readonly="readonly" /></div>
            </div>
        </div>
    </div>
    <div style="overflow: hidden;">
        <div style="padding: 10px;">
            <div class="row">
                <div class="row-column" style="width: 100px">Вид работ</div>
                <div class="row-column"><input type="text" id="edWorkType2" readonly="readonly" /></div>
                <div class="row-column">Склад</div>
                <div class="row-column"><input type="text" id="edStorage2" readonly="readonly" /></div>
            </div>
            <div class="row">
                <div class="row-column" style="width: 100px">Номер</div>
                <div class="row-column"><input type="text" id="edNumber2" readonly="readonly" /></div>
                <div class="row-column">Дата</div>
                <div class="row-column"><div id="edDate2"></div></div>
            </div>
            <div class="row">
                <div class="row-column" style="width: 100px">Адрес объекта</div>
                <div class="row-column"><input type="text" id="edAddress2" readonly="readonly" /></div>
            </div>
            <div class="row">
                <div class="row-column" style="width: 150px">Причина возврата</div>
                <div class="row-column"><input type="text" id="edReturnReason2" readonly="readonly" /></div>
            </div>
            <div class="row">
                <div class="row-column" style="width: 150px">Требование Номер</div>
                <div class="row-column"><input type="text" id="edInNumber2" readonly="readonly" /></div>
                <div class="row-column">Дата</div>
                <div class="row-column"><div id="edInDate2"></div></div>
            </div>
        </div>
    </div>
</div>
<div class="row" style="padding: 0px 2px 3px 0px">
    <div>Примечание</div>    
    <div><textarea id="edNote" ></textarea></div>
    <div style="padding-right: 6px;"><input type="text" id="edMsg" /></div>
</div>
<div class="row" style="padding: 0px 2px 3px 0px; margin-top: 3px;">
    <div class="row-column">
        <input type="button" value="Изменить" id='btnEdit' />
        
    </div>
    <div class="row-column">
        <div style='float: left;' id="btnOperation">
            <div style="border: none;" id='jqxTreeOperation'>
                <ul>
                    <li><div id="btnDemandView" style="width: 230px; height: 20px;">Просмотреть заявку</div></li>
                    <li><div style="width: 230px; height: 20px;">Просмотреть заявку на ремонт</div></li>
                    <li><div id="btnAddDelivery" style="width: 230px; height: 20px;">Создать заявку на доставку</div></li>
                </ul>
            </div>
        </div>
    </div>
    <div style="float: right">
        <div class="row-column"><input type="button" value="Для заказчика" id='btnPrintClient' /></div>
        <div class="row-column" style="margin-right: 0px;"><input type="button" value="Печать" id='btnPrint' /></div>
    </div>
</div>
<div class="row" style="padding: 6px 2px 3px 0px">
    <div id="GridDetails"></div>
</div>
<div class="row" style="padding: 6px 2px 3px 0px">
    <div class="row-column">В наличие на складе: новое:</div>
    <div class="row-column"><div id="edQuant" readonly="readonly"></div></div>
    <div class="row-column">Б\У:</div>
    <div class="row-column"><div id="edUsedQuant" readonly="readonly"></div></div>
    <div class="row-column"><input type="button" value="Зарезервировано" id='btnReserv' /></div>
    <div class="row-column"><div id="edReserv" readonly="readonly"></div></div>
    <div class="row-column">Готово к выдаче:</div>
    <div class="row-column"><div id="edReady" readonly="readonly"></div></div>
    <div class="row-column">Мин. резерв:</div>
    <div class="row-column"><div id="edMinReserv" readonly="readonly"></div></div>
    <div class="row-column">Закупить:</div>
    <div class="row-column"><div id="edPurchase" readonly="readonly"></div></div>
</div>
<div class="row" style="padding: 6px 2px 3px 0px">
    <div class="row-column"><input type="button" value="Добавить" id='btnAddDetails' /></div>
    <div class="row-column"><input type="button" value="Изменить" id='btnEditDetails' /></div>
    <div class="row-column"><input type="button" value="Обновить" id='btnRefreshDetails' /></div>
    <div class="row-column"><input type="button" value="История оборудования" id='btnHistoryDetails' /></div>
    <div class="row-column"><input type="button" value="Наличие" id='btnInfoDetails' /></div>
    <div class="row-column" style="float: right"><input type="button" value="Удалить" id='btnDelDetails' /></div>
</div>
<div class="row" style="padding: 6px 2px 3px 0px">
    <div class="row-column">
        <div>
            <div class="row-column" style="width: 100px;">Кладовщик</div>
            <div class="row-column"><div id="edStoreman"></div></div>
        </div>
        <div style="clear: both"></div>
        <div style="margin-top: 6px">
            <div class="row-column" style="width: 100px;">Мастер</div>
            <div class="row-column"><div id="edMaster"></div></div>    
        </div>
    </div>
    <div class="row-column">
        <div>
            <div class="row-column"><input type="button" value="Подтвердить" id='btnAction' /></div>
            <div class="row-column"><input type="button" value="Требуется закупка" id='btnPurchase' /></div>
        </div>
        <div style="clear: both"></div>
        <div style="margin-top: 6px">
            <div class="row-column" style="width: 150px;">Причина просрочки</div>
            <div class="row-column"><div id="edDelayReason"></div></div>    
        </div>
    </div>
</div>

<div id="WHDocumentsDialog" style="display: none;">
    <div id="WHDocumentsDialogHeader">
        <span id="WHDocumentsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogWHDocumentsContent">
        <div style="" id="BodyWHDocumentsDialog"></div>
    </div>
</div>