<script>
    var SN = {};
    var Acts = {};
    $(document).ready(function () {
        var CurrentRowEquips;
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
            JobType: <?php echo json_encode($model->jbtp_name); ?>,
            WorkList: <?php echo json_encode($model->work_list); ?>,
            Juridical: <?php echo json_encode($model->JuridicalPerson); ?>,
            UserCreate: <?php echo json_encode($model->UserCreate); ?>,
            edMaster: <?php echo json_encode($model->master); ?>,
        };
        
        var SetValueControls = function() {
            $("#edDate").val(Acts.Date);
            $("#edAddress").val(Acts.Address);
            $("#edClient").val(Acts.Client);
            $("#edService").val(Acts.Service);
            $("#edDcknName").val(Acts.DcknName);
            $("#edSignedYn").jqxCheckBox({checked: Acts.SignedYn});
            $("#edCstmName").val(Acts.CstmName);
            $("#edNote").val(Acts.Note);
            $("#edSum").val(Acts.Sum);
            $("#edPaymentType").val(Acts.PaymentType);
            $("#edBill").val(Acts.Bill);
            $("#edDatePay").val(Acts.DatePay);
            $("#edNotePayment").val(Acts.NotePayment);
            $("#edWorkType").val(Acts.WorkType);
            $("#edJobType").val(Acts.JobType);
            $("#edWorkList").val(Acts.WorkList);
            $("#edJuridical").val(Acts.Juridical);
            $("#edUserCreate").val(Acts.UserCreate);
            $("#edMaster").val(Acts.edMaster);
        };
        
        var SetStateButtons = function() {
            $('#btnEdit').jqxButton({disabled: (Acts.Achs_id !== null)});
            $('#btnAction').jqxButton({disabled: (Acts.Achs_id !== null)});
        };
        
        Acts.Refresh = function() {
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('WHActs/GetModel'))?>,
                type: 'POST',
                data: {
                    Docm_id: Acts.Docm_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    
                    Acts.Docm_id = Res.docm_id;
                    Acts.Date = Aliton.DateConvertToJs(Res.date);
                    Acts.Achs_id = Res.achs_id;
                    Acts.Object_id = Res.objc_id;
                    Acts.Address = Res.Address;
                    Acts.Client = Res.org_name;
                    Acts.Service = Res.ServiceType;
                    Acts.DcknName = Res.dckn_name;
                    Acts.SignedYn = Boolean(Number(Res.signed_yn));
                    Acts.CstmName = Res.cstm_name;
                    Acts.Note = Res.note;
                    Acts.Sum = Res.sum;
                    Acts.PaymentType = Res.pmtp_name;
                    Acts.Bill = Res.bill;
                    Acts.DatePay = Aliton.DateConvertToJs(Res.date_payment);
                    Acts.NotePayment = Res.note_payment;
                    Acts.WorkType = Res.wrtp_name;
                    Acts.JobType = Res.jbtp_name;
                    Acts.WorkList = Res.work_list;
                    Acts.Juridical = Res.JuridicalPerson;
                    Acts.UserCreate = Res.UserCreate;
                    Acts.edMaster = Res.master;
                    SetValueControls();
                    $("#btnRefreshDetails").click();
                    SetStateButtons();
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        };
        
        SN.Add = function() {
            if (CurrentRowEquips !== undefined) {
                $('#WHDocumentsDialog').jqxWindow({width: 600, height: 440, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('SerialNumbers/Index')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        dadt_id: CurrentRowEquips.dadt_id,
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
        };

        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    Acts.SelectTreb = function(Docm_id) {
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('WhActs/AddTreb')) ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                Act_id: Acts.Docm_id,
                                Docm_id: Docm_id
                            },
                            success: function(Res) {
                                Res = JSON.parse(Res);
                                if (Res.result === 1) {
                                    CurrentRowEquips = undefined;
                                    $("#btnRefreshEquips").click();
                                }
                            },
                            error: function(Res) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                            }
                        });
                    };
                
                    $('#FindTrebsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings));
                    
                    var SetStateDetailsButtons = function() {
                        $('#btnAddEquips').jqxButton({disabled: (Acts.Achs_id != null)});
                        $('#btnEditEquips').jqxButton({disabled: ((Acts.Achs_id != null)|| CurrentRowEquips == undefined)});
                        $('#btnRefreshEquips').jqxButton({disabled: false});
                        $('#btnFindTreb').jqxButton({disabled: (Acts.Achs_id != null)});
                        $('#btnDelEquips').jqxButton({disabled: ((Acts.Achs_id != null) || CurrentRowEquips == undefined)});
                    };
                    
                    var DisabledDetailsControls = function() {
                        $('#btnAddEquips').jqxButton({disabled: true});
                        $('#btnEditEquips').jqxButton({disabled: true});
                        $('#btnRefreshEquips').jqxButton({disabled: true});
                        $('#btnFindTreb').jqxButton({disabled: true});
                        $('#btnDelEquips').jqxButton({disabled: true});
                    };
                    
                    $('#btnAddEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnEditEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnRefreshEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnFindTreb').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 180, height: 30 }));
                    $('#btnDelEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    
                    var DataEquips = new $.jqx.dataAdapter($.extend(true, {}, Sources.ActEquipsSource), { async: true,
                        formatData: function (data) {
                                    $.extend(data, {
                                        Filters: ["d.docm_id = " + Acts.Docm_id]
                                    });
                                    return data;
                                },
                        beforeSend: function(jqXHR, settings) {
                            DisabledDetailsControls();
                        }
                    });
                    
                    $("#GridDetails").on('rowselect', function (event) {
                        CurrentRowEquips = $('#GridDetails').jqxGrid('getrowdata', event.args.rowindex);
                        SetStateDetailsButtons();
                    });

                    $("#GridDetails").on("bindingcomplete", function (event) {
                        if (CurrentRowEquips != undefined) {
                            Aliton.SelectRowById('dadt_id', CurrentRowEquips.dadt_id, '#GridDetails', false);
                        }
                        else {
                            $('#GridDetails').jqxGrid('selectrow', 0);
                            $('#GridDetails').jqxGrid('ensurerowvisible', 0);
                        }
                    });
                    $("#GridDetails").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: '100%',
                            width: '100%',
                            source: DataEquips,
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
                                            return '<div style=\'float: left; width: 80%\'>' + value + '</div>\n\
                                                        <div style=\'float: left; width: 20%\'>\n\
                                                            <button onclick=\'SN.Add();\' style=\'float: right; margin-top: 4px;\'>...</button>\n\
                                                        </div>';
                                        }   
                                    },
                                    { text: 'Без прайса', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'no_price_list', width: 100 },
                                    { text: 'Номер требования', datafield: 'number', width: 150 },
                                    { text: 'Дата требования', filtertype: 'date', datafield: 'date', width: 150, cellsformat: 'dd.MM.yyyy' },
                                ],
                            }));
                            
                            $("#btnAddEquips").on('click', function(){
                                if ($("#btnAddEquips").jqxButton('disabled')) return;
                                if (Acts.Docm_id !== null) {
                                    $('#WHDocumentsDialog').jqxWindow({width: 660, height: 255, position: 'center'});
                                    $.ajax({
                                        url: <?php echo json_encode(Yii::app()->createUrl('DocmAchsDetails/Create')) ?>,
                                        type: 'POST',
                                        async: false,
                                        data: {
                                            Docm_id: Acts.Docm_id,
                                            Dctp_id: 5
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
                            
                            $("#btnEditEquips").on('click', function(){
                                if ($("#btnEditEquips").jqxButton('disabled')) return;
                                if (Acts.Docm_id !== null) {
                                    $('#WHDocumentsDialog').jqxWindow({width: 640, height: 255, position: 'center'});
                                    $.ajax({
                                        url: <?php echo json_encode(Yii::app()->createUrl('DocmAchsDetails/Update')) ?>,
                                        type: 'POST',
                                        async: false,
                                        data: {
                                            Dadt_id: CurrentRowEquips.dadt_id,
                                            Docm_id: Acts.Docm_id,
                                            Dctp_id: 5
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
                            
                            $("#btnRefreshEquips").on('click', function() {
                                if ($("#btnRefreshEquips").jqxButton('disabled')) return;
                                if (CurrentRowEquips != undefined) {
                                    var Dadt_id = CurrentRowEquips.dadt_id
                                    CurrentRowEquips = undefined;
                                    Aliton.SelectRowById('dadt_id', Dadt_id, '#GridDetails', true);
                                }
                                else
                                    Aliton.SelectRowById('dadt_id', null, '#GridDetails', true);

                            });
                            
                            $("#btnDelEquips").on('click', function(){
                                if ($("#btnDelEquips").jqxButton('disabled')) return;
                                if (Acts.Docm_id !== null && CurrentRowEquips !== undefined) {
                                    $.ajax({
                                        url: <?php echo json_encode(Yii::app()->createUrl('DocmAchsDetails/Delete')) ?>,
                                        type: 'POST',
                                        async: false,
                                        data: {
                                            Dadt_id: CurrentRowEquips.dadt_id,
                                            Docm_id: Acts.Docm_id,
                                            Dctp_id: 5
                                        },
                                        success: function(Res) {
                                            Res = JSON.parse(Res);
                                            if (Res.result === 1) {
                                                CurrentRowEquips = undefined;
                                                $("#btnRefreshEquips").click();
                                            }
                                        },
                                        error: function(Res) {
                                            Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                        }
                                    });
                                }
                            });
                            
                            $('#btnFindTreb').on('click', function(){
                                $('#FindTrebsDialog').jqxWindow({width: 900, height: 700, position: 'center'});
                                var Object_id = Acts.Object_id;
                                var Address = Acts.Address;
                                if (Object_id == '') return;
                                $.ajax({
                                    url: <?php echo json_encode(Yii::app()->createUrl('WHDocumentsFind/FindTreb')) ?>,
                                    type: 'POST',
                                    async: false,
                                    data: {
                                        Object_id: Object_id,
                                        Address: Address
                                    },
                                    success: function(Res) {
                                        Res = JSON.parse(Res);
                                        $("#BodyFindTrebsDialog").html(Res.html);
                                        $('#FindTrebsDialog').jqxWindow('open');
                                    },
                                    error: function(Res) {
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                    }
                                });
                            });
                    break;
                case 1:
                    
                    break;
            }
        };
        $('#Tabs').jqxTabs({ width: 'calc(100% - 2px)', height: 'calc(100% - 2px)', initTabContent: initWidgets});
        $("#edAddress").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 500, minLength: 1, value: Acts.Address}));
        $("#edClient").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 250, minLength: 1, value: Acts.Client}));
        $("#edService").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 182, minLength: 1, value: Acts.Service}));
        $("#edDcknName").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 180, minLength: 1, value: Acts.DcknName}));
        $("#edSignedYn").jqxCheckBox($.extend(true, CheckBoxDefaultSettings, {width: 100, checked: Acts.SignedYn}));
        $("#edCstmName").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 180, minLength: 1, value: Acts.CstmName}));
        $('#edNote').jqxTextArea($.extend(true, TextAreaDefaultSettings, { height: 60, width: 'calc(100% - 2px)', minLength: 1}));
        $("#edSum").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px', value: Acts.Sum}));
        $("#edPaymentType").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 180, minLength: 1, value: Acts.PaymentType}));
        $("#edBill").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 180, minLength: 1, value: Acts.Bill}));
        $("#edDatePay").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Acts.DatePay, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $('#edNotePayment').jqxTextArea($.extend(true, TextAreaDefaultSettings, { height: 32, width: 'calc(100% - 2px)', minLength: 1}));
        $("#edDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Acts.Date, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edWorkType").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 200, minLength: 1, value: Acts.WorkType}));
        $("#edJobType").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 200, minLength: 1, value: Acts.JobType}));
        $('#edWorkList').jqxTextArea($.extend(true, TextAreaDefaultSettings, { height: 32, width: 'calc(100% - 2px)', minLength: 1}));
        $("#edJuridical").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 200, minLength: 1, value: Acts.Juridical}));
        $("#edUserCreate").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 200, minLength: 1, value: Acts.UserCreate}));
        $("#edMaster").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 200, minLength: 1, value: Acts.UserCreate}));
        $('#btnEdit').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnAction').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        if (Acts.Note != null) $('#edNote').val(Acts.Note);
        if (Acts.NotePayment != null) $('#edNotePayment').val(Acts.NotePayment);
        if (Acts.WorkList != null) $('#edWorkList').val(Acts.WorkList);
        
        
        $('#btnEdit').on('click', function(){
            if ($('#btnEdit').jqxButton('disabled')) return;
            $('#WHDocumentsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 470, width: 920, position: 'center' }));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('WhActs/Update')) ?>,
                type: 'POST',
                async: false,
                data: {
                    docm_id: Acts.Docm_id,
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
        });
            
        $('#btnAction').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('WhActs/confirm')) ?>,
                type: 'POST',
                async: false,
                data: {
                    Docm_id: Acts.Docm_id,
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    if (Res.result === 1) {
                        Acts.Refresh();
                    }
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        SetStateButtons();
    });
</script>
<style>
    .al-data {
        float: left;
        border: 1px solid #e0e0e0;
        padding: 10px;
        width: calc(100% - 22px);
    }
    
    .al-data-nb {
        float: left;
        overflow: auto;
        width: 100%
    }
    .al-row {
        width: 100%;
        padding: 4px 0px 4px 0px;
    }
    .al-row-label {
        width: 100%;
        padding: 0px;
    }
    .al-row-column {
        float: left;
        margin-left: 6px;
    }
    
    .al-row-column:first-child {
        margin-left: 0px;
    }
    
    .al-data, .al-data-nb, .al-row, .al-row-column {
        font: 14px 'Segoe UI', Helvetica, 'Droid Sans', Tahoma, Geneva, sans-serif;
    }
    
    .al-data .al-row:first-child {
        padding-top: 0px;
    }
    
    .al-data .al-row:last-child {
        padding-bottom: 0px;
    }
</style>
<div class="al-data-nb" style="width: 900px; height: 230px;">
    <div class="al-row-column">
        <div class="al-row">
            <div class="al-data" style="width: 552px">
                <!--<div class="al-row-label"><b>Объект</b></div>-->
                <div class="al-row">
                    <div class="al-row-column">Адрес</div>
                    <div class="al-row-column"><input id="edAddress" /></div>
                </div>
                <div style="clear: both"></div>
                <div style="margin-top: 4px;">
                    <div class="row-column">Клиент</div>
                    <div class="row-column"><input id="edClient" /></div>
                    <div class="row-column">Тариф</div>
                    <div class="row-column"><input id="edService" /></div>
                </div>
                
            </div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-data" style="width: 552px">
                <!--<div class="al-row-label"><b>Документ</b></div>-->
                <div class="al-row">
                    <div class="al-row-column">Тип</div>
                    <div class="al-row-column"><input id="edDcknName" /></div>
                    <div class="al-row-column"><div id="edSignedYn">Подписан</div></div>
                    <div class="al-row-column"><input id="edCstmName" /></div>
                </div>
                <div class="al-row">
                    <div class="al-row-label">Примечание</div>
                    <div class="al-row"><textarea id="edNote"></textarea></div>
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
                    <div class="al-row-column"><div id="edSum"></div></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column">Форма оплаты</div>
                    <div class="al-row-column"><input id="edPaymentType" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column">Счет</div>
                    <div class="al-row-column"><input id="edBill" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column">Дата оплаты</div>
                    <div class="al-row-column"><div id="edDatePay"></div></div>
                    <div style="clear: both"></div>
                </div>
               <div class="al-row">
                    <div class="al-row-label">Примечание</div>
                    <div class="al-row"><textarea id="edNotePayment"></textarea></div>
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
            <div class="al-row-column"><div id="edDate"></div></div>
            <div class="al-row-column">Тип работ</div>
            <div class="al-row-column"><input id="edWorkType" /></div>
            <div class="al-row-column">Вид работ</div>
            <div class="al-row-column"><input id="edJobType" /></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row-label">Перечень работ</div>
        <div class="al-row"><textarea id="edWorkList"></textarea></div>
        <div class="al-row">
            <div class="al-row-column">Юр. лицо</div>
            <div class="al-row-column"><input id="edJuridical" /></div>
            <div class="al-row-column">Создал</div>
            <div class="al-row-column"><input id="edUserCreate" /></div>
            <div class="al-row-column">Исполнитель</div>
            <div class="al-row-column"><input id="edMaster" /></div>
        </div>
    </div>
</div>
<div style="clear: both"></div>
<div class="al-data-nb" style="width: 100%; height: 38px;">
    <div class="al-row">
        <div class="al-row-column"><input type="button" id="btnEdit" value="Изменить"/></div>
        <div class="al-row-column" style="float: right"><input type="button" id="btnAction" value="Подтвердить"/></div>
        <div style="clear: both"></div>
    </div>
</div>    
<div class="al-data-nb" style="width: 100%; height: calc(100% - 414px);">
    <div id='Tabs'>
        <ul>
            <li style="margin-left: 30px;">
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Оборудование</div>
                </div>
            </li>
            <li>
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Дополнительные соглашения</div>
                </div>
            </li>
            <li>
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Заявки</div>
                </div>
            </li>
        </ul>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: calc(100% - 20px)">
                <div class="al-row" style="height: calc(100% - 46px)">
                    <div id="GridDetails"></div>
                </div>
                <div style="clear: both"></div>
                <div class="al-row" style="height: 30px">
                    <div class="al-row-column"><input type="button" id="btnAddEquips" value="Добавить" /></div>
                    <div class="al-row-column"><input type="button" id="btnEditEquips" value="Изменить" /></div>
                    <div class="al-row-column"><input type="button" id="btnRefreshEquips" value="Обновить" /></div>
                    <div class="al-row-column"><input type="button" id="btnFindTreb" value="Найти требование" /></div>
                    <div class="al-row-column" style="float: right;"><input type="button" id="btnDelEquips" value="Удалить" /></div>
                </div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px;">
                
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px;">
                
            </div>
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
<div id="FindTrebsDialog" style="display: none;">
    <div id="FindTrebsDialogHeader">
        <span id="FindTrebsHeaderText">Поиск требования</span>
    </div>
    <div style="padding: 10px;" id="DialogFindTrebsContent">
        <div style="" id="BodyFindTrebsDialog"></div>
    </div>
</div> 