<script type="text/javascript">
    $(document).ready(function () {
        
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var Contracts = {
            ObjectGr_id: '<?php echo $ObjectGr_id; ?>',
            Price: '<?php echo $model->Price; ?>',
            PriceMonth: '<?php echo $model->PriceMonth; ?>',
            Reason_id: '<?php echo $model->Reason_id; ?>',
            LastChangeDate: '<?php echo $model->LastChangeDate; ?>',
        };
            
        var ContractsSDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContractsS, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["c.ObjectGr_id = " + Contracts.ObjectGr_id],
                });
                return data;
            },
        });
        
        $("#ContractsGrid").on('bindingcomplete', function (event) {
            $("#ContractsGrid").jqxGrid('selectrow', 0);
        });
        
        $("#ContractsGrid").on('rowselect', function (event) {
            CurrentRowData = $('#ContractsGrid').jqxGrid('getrowdata', event.args.rowindex);
            
            if (CurrentRowData != undefined) {
                if (CurrentRowData.MasterName != '') $("#JuridicalPerson").jqxInput('val', CurrentRowData.JuridicalPerson);
                if (CurrentRowData.MasterName != '') $("#MasterName").jqxInput('val', CurrentRowData.MasterName);
                if (CurrentRowData.DateExecuting != '') $("#DateExecuting").jqxDateTimeInput('val', CurrentRowData.DateExecuting);
                if (CurrentRowData.SpecialCondition != '') $("#SpecialCondition").jqxTextArea('val', CurrentRowData.SpecialCondition);
                if (CurrentRowData.ContrNote != '') $("#ContrNote").jqxTextArea('val', CurrentRowData.ContrNote);
                
                var TabIndex = $('#jqxTabsContracts').jqxTabs('selectedItem');
                switch(parseInt(TabIndex)) {
                    case 0:
                        $("#ContractSystemsGrid").jqxGrid('updatebounddata');
                        break;
                    case 1:
                        $("#ContractPriceHistoryGrid").jqxGrid('updatebounddata');
                        break;
                    case 2:
                        $("#PaymentHistoryGrid").jqxGrid('updatebounddata');
                        break;
                    case 3:
                        $("#ContractMasterHistoryGrid").jqxGrid('updatebounddata');
                        break;
                }
            }
        });
            
        $("#ContractsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pageable: false,
                showstatusbar: true,
                statusbarheight: 29,
                showaggregates: true,
                showfilterrow: false,
                virtualmode: false,
                width: '100%',
                height: '100%',
                source: ContractsSDataAdapter,
                columns: [
                    { text: 'Вид документа', dataField: 'DocType_Name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'Тип договора', dataField: 'crtp_name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'Подписание акта', dataField: 'date_doc', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'Номер', dataField: 'ContrNumS', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Дата', dataField: 'ContrDateS', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Действует с', dataField: 'ContrSDateStart', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'по', dataField: 'ContrSDateEnd', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Сумма долга', cellsalign: 'right', datafield: 'Debt', cellsformat: 'f2', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100, aggregates: [{ 'Сумма':
                                        function (aggregatedValue, currentValue) {
                                            return aggregatedValue + currentValue;
                                        }
                                      }] },
                    { text: 'Периодичность оплаты', dataField: 'PaymentName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 170 },
                    { text: 'Вид оплаты', dataField: 'PaymentTypeName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Оплачено по', dataField: 'DatePay', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Долг', datafield: 'Debtor', columntype: 'checkbox', filtercondition: 'STARTS_WITH', width: 80 },
                    { text: 'Оплачено', datafield: 'CalcSum', cellsalign: 'right',  cellsformat: 'f2', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 120 },
                    { text: 'MasterName', dataField: 'MasterName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 120 },
                ]
            })
        );

        $("#JuridicalPerson").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 280 }));
        $("#MasterName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#DateExecuting").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 100 }));
        $("#SpecialCondition").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: '100%', height: 50 }));
        $("#ContrNote").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: '100%', height: 50 }));
        $("#dropDownBtnContracts").jqxDropDownButton($.extend(true, {}, DropDownButtonDefaultSettings, { width: 210, height: 28 }));
        $("#jqxTreeContracts").jqxTree({ width: 210 });
        $("#MoreInformContract").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 150, disabled: true }));
        $("#ReloadContracts").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelContract").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#NewContractDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: 580, width: 870}));
        $("#btnViewActs").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#btnViewActs").on('click', function() {
            var url = <?php echo json_encode(Yii::app()->createUrl('WhActs/Index')); ?>;
            window.open(url + '&Address=' + OG.Addr);
        });
        $("#btnBillPay").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#btnBillPay").on('click', function() {
            window.open(<?php echo json_encode(Yii::app()->createUrl('Reports/ReportOpen', array(
                'ReportName' => '/Договора/Начисления и платежи по договору',
                'Ajax' => false,
                'Render' => true,
                ))); ?> + '&Parameters[ContrS_id]=' + CurrentRowData.ContrS_id);
        });
        var openCreateWindow = function (DocType_Name) {
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('Documents/Insert');?>",
                type: 'POST',
                async: false,
                data: { 
                    ObjectGr_id: Contracts.ObjectGr_id,
                    DocType_Name: DocType_Name
                },
                success: function(Res) {
                    $('#NewContractBodyDialog').html(Res);
                    $('#NewContractHeaderText').html(DocType_Name);
                }
            });
            $('#NewContractDialog').jqxWindow('open');
        };

        
        $('#jqxTreeContracts').on('select', function (event) {
            var args = event.args;
            var item = $('#jqxTreeContracts').jqxTree('getItem', args.element);
            openCreateWindow(item.label);
            $("#jqxTreeContracts").jqxTree('selectItem', null);
        });
        
        
        var dropDownBtnContent = '<div style="position: relative; margin-left: 3px; text-align: center; margin-top: 5px;">Создать</div>';
        $("#dropDownBtnContracts").jqxDropDownButton('setContent', dropDownBtnContent);
 
 
        $('#ContractsGrid').on('rowdoubleclick', function () { 
            $("#MoreInformContract").click();
        });
        
        
        $("#MoreInformContract").on('click', function ()
        {
            window.open('/index.php?r=Documents/Index&ContrS_id=' + CurrentRowData.ContrS_id);
        });
        
        $("#ReloadContracts").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=ContractsS/Index",
                success: function(){
                    $("#ContractsGrid").jqxGrid('updatebounddata');
                    $("#ContractsGrid").jqxGrid('selectrow', 0);
                }
            });
        });
           
        $("#DelContract").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=ContractsS/Delete",
                data: { ContrS_id: CurrentRowData.ContrS_id },
                success: function(){
                    $("#ContractsGrid").jqxGrid('updatebounddata');
                    $("#ContractsGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
        
        $('#jqxTabsContracts').on('selected', function (event) 
        { 
            var SelectedTab = event.args.item;
            switch (SelectedTab) {
                case 0:
                    $("#ContractSystemsGrid").jqxGrid('updatebounddata');
                    break;
                case 1:
                    $("#ContractPriceHistoryGrid").jqxGrid('updatebounddata');
                    break;
                case 2:
                    $("#PaymentHistoryGrid").jqxGrid('updatebounddata');
                    break;
                case 3:
                    $("#ContractMasterHistoryGrid").jqxGrid('updatebounddata');
                    break;
                
            };
        });
        
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    /* Тип обслуживаемых систем */ 
                    /* Текущая выбранная строка данных */
                    var CurrentRowDataCS;
                    var ContractSystemsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContractSystems, {}), {
                        formatData: function (data) {
                            var CurrentRowData = $('#ContractsGrid').jqxGrid('getrowdata', $('#ContractsGrid').jqxGrid('getselectedrowindex'));
                            if (CurrentRowData == undefined)
                                $.extend(data, {
                                    Filters: ["cs.ContrS_id = 0"],
                                });
                            else
                                $.extend(data, {
                                    Filters: ["cs.ContrS_id = " + CurrentRowData.ContrS_id],
                                });
                            return data;
                        },
                    });
                    
                    $("#ContractSystemsGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            pageable: false,
                            showfilterrow: false,
                            virtualmode: false,
                            width: 'calc(100% - 2px)',
                            height: 'calc(100% - 2px)',
                            source: ContractSystemsDataAdapter,
                            columns: [
                                { text: 'Тип подсистемы', dataField: 'SystemTypeName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 400 },
                            ]
                        })
                    );

                    $("#ContractSystemsGrid").on('rowselect', function (event) {
                        CurrentRowDataCS = $('#ContractSystemsGrid').jqxGrid('getrowdata', event.args.rowindex);
                    });
                    $("#NewContractSystems").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                    $("#DelContractSystems").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                    $('#EditDialogContractSystems').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '170px', width: '340'}));

                    $("#NewContractSystems").on('click', function () {
                        var CurrentRowData = $('#ContractsGrid').jqxGrid('getrowdata', $('#ContractsGrid').jqxGrid('getselectedrowindex'));
                        if (CurrentRowData == undefined) return;
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('ContractSystems/Insert')); ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                ContrS_id: CurrentRowData.ContrS_id
                            },
                            success: function(Res) {
                                $('#BodyDialogContractSystems').html(Res);
                                $('#EditDialogContractSystems').jqxWindow('open');
                            },
                            error: function(Res) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                            }
                        });
                        
                    });
                    $("#DelContractSystems").on('click', function ()  {
                        if(typeof CurrentRowDataCS !== 'undefined') {
                            $.ajax({
                                type: "POST",
                                url: "/index.php?r=ContractSystems/Delete",
                                data: { ContractSystem_id: CurrentRowDataCS.ContractSystem_id},
                                success: function(){
                                    $("#ContractSystemsGrid").jqxGrid('updatebounddata');
                                    $("#ContractSystemsGrid").jqxGrid('selectrow', 0);
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });
                        }
                    });
                break;
                case 1:
                    /* Текущая выбранная строка данных */
                    
                    var CurrentRowDataCPH;
                    var ContractPriceHistoryDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContractPriceHistory, {}), {
                        formatData: function (data) {
                            if (CurrentRowData == undefined)
                                $.extend(data, {
                                    Filters: ["ph.ContrS_id = 0"],
                                });
                            else
                                $.extend(data, {
                                    Filters: ["ph.ContrS_id = " + CurrentRowData.ContrS_id],
                                });
                            return data;
                        },
                    });
                    
                    $("#ContractPriceHistoryGrid").on('rowselect', function (event) {
                        CurrentRowDataCPH = $('#ContractPriceHistoryGrid').jqxGrid('getrowdata', event.args.rowindex);
                    });

                    $("#NewContractPriceHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                    $("#EditContractPriceHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                    $("#ClearContractPriceHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160 }));

                    $("#ContractPriceHistoryGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            pageable: false,
                            showfilterrow: false,
                            sortable: false,
                            filterable: false,
                            virtualmode: false,
                            source: ContractPriceHistoryDataAdapter,
                            width: 'calc(100% - 2px)',
                            height: 'calc(100% - 2px)',
                            columns: [
                                { text: 'Тариф', dataField: 'ServiceType', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                                { text: 'Дата изменения', dataField: 'DateStart', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 120 },
                                { text: 'Расценка', datafield: 'Price', columntype: 'textbox', cellsformat: 'f2', filtercondition: 'STARTS_WITH', width: 130 },
                                { text: 'Ежемесячные начисления', datafield: 'PriceMonth', cellsformat: 'f2', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                                { text: 'Причина изменения', dataField: 'ReasonName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                            ]
                        })
                    );
            
                    $('#EditDialogContractPriceHistory').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '280px', width: '600'}));
                    
                    $("#NewContractPriceHistory").on('click', function () {
                        if (CurrentRowData == undefined) return;
                        var Date = CurrentRowData.ContrSDateEnd;
                        var DateEnd = Date.getDate() + '.' + (Date.getMonth()+1) + '.' + Date.getFullYear();
                        var DataInformations = $('#ContractPriceHistoryGrid').jqxGrid('getdatainformation');
                        var RowsCounts = DataInformations.rowscount;
                        $("#ContractPriceHistoryGrid").jqxGrid('selectrow', (RowsCounts - 1));
                        if (CurrentRowDataCPH == undefined) {
                            CurrentRowDataCPH = {};
                            CurrentRowDataCPH.ContrS_id = CurrentRowData.ContrS_id;
                            CurrentRowDataCPH.Reason_id = 1;
                            CurrentRowDataCPH.ServiceType_id = null;
                            CurrentRowDataCPH.DateStart = CurrentRowData.ContrSDateStart;
                            CurrentRowDataCPH.Price = null;
                            CurrentRowDataCPH.PriceMonth = null;
                            
                        }
                            
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('ContractPriceHistory/Insert')); ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                ContrS_id: CurrentRowData.ContrS_id, 
                                DateEnd: DateEnd,
                                Price: Contracts.Price,
                                Params: {
                                    ContrS_id: CurrentRowData.ContrS_id, 
                                    Reason_id: CurrentRowDataCPH.Reason_id,
                                    ServiceType_id: CurrentRowDataCPH.ServiceType_id,
                                    DateStart: CurrentRowDataCPH.DateStart,
                                    Price: CurrentRowDataCPH.Price,
                                    PriceMonth: CurrentRowDataCPH.PriceMonth,
                                    DateEnd: DateEnd
                                }
                            },
                            success: function(Res) {
                                $('#BodyDialogContractPriceHistory').html(Res);
                                $('#EditDialogContractPriceHistory').jqxWindow('open');
                            },
                            error: function(Res) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                            }
                        });
                        
                    });

                    $("#EditContractPriceHistory").on('click', function () {
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('ContractPriceHistory/Update')); ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                PriceHistory_id: CurrentRowDataCPH.PriceHistory_id,
                                Params: {
                                    ContrS_id: CurrentRowData.ContrS_id, 
                                    Reason_id: CurrentRowDataCPH.Reason_id,
                                    ServiceType_id: CurrentRowDataCPH.ServiceType_id,
                                    DateStart: CurrentRowDataCPH.DateStart,
                                    Price: CurrentRowDataCPH.Price,
                                    PriceMonth: CurrentRowDataCPH.PriceMonth,
                                    DateEnd: CurrentRowDataCPH.DateEnd,
                                }
                            },
                            success: function(Res) {
                                $('#BodyDialogContractPriceHistory').html(Res);
                                $('#EditDialogContractPriceHistory').jqxWindow('open');
                            },
                            error: function(Res) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                            }
                        });
                    });

                    $('#ContractPriceHistoryGrid').on('rowdoubleclick', function () { 
                        $("#EditContractPriceHistory").click();
                    });


                    $("#ClearContractPriceHistory").on('click', function (){
                        if (CurrentRowData == undefined) return;
                        $.ajax({
                            type: "POST",
                            url: "/index.php?r=ContractPriceHistory/Delete",
                            data: { ContrS_id: CurrentRowData.ContrS_id},
                            success: function(){
                                $("#ContractPriceHistoryGrid").jqxGrid('updatebounddata');
                                $("#ContractPriceHistoryGrid").jqxGrid('selectrow', 0);
                            },
                            error: function(Res) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                            }
                        });
                    });
                break;
                case 2:
                    /* Текущая выбранная строка данных */
                    var CurrentRowDataPH;
                    var PaymentHistoryDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourcePaymentHistory, {}), {
                        formatData: function (data) {
                            if (CurrentRowData == undefined)
                                $.extend(data, {
                                    Filters: ["ph.cntr_id = 0"],
                                });
                            else
                                $.extend(data, {
                                    Filters: ["ph.cntr_id = " + CurrentRowData.ContrS_id],
                                });
                            return data;
                        },
                    });
                    
                    $("#PaymentHistoryGrid").on('rowselect', function (event) {
                        CurrentRowDataPH = $('#PaymentHistoryGrid').jqxGrid('getrowdata', event.args.rowindex);
                        if (typeof CurrentRowDataPH.note !== undefined) $("#NotePaymentHistory").jqxTextArea('val', CurrentRowDataPH.note);
                    });
                    
                    $('#PaymentHistoryGrid').on('rowdoubleclick', function () { 
                        $("#EditPaymentHistory").click();
                    });
                    
                    $("#NotePaymentHistory").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: '100%', height: 'calc(100% - 2px)' }));
                    $("#NewPaymentHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                    $("#EditPaymentHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                    $("#DelPaymentHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                    $('#EditDialogPaymentHistory').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '400px', width: '400'}));
        
                    
                    $("#PaymentHistoryGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            pageable: false,
                            sortable: false,
                            filterable: false,
                            showfilterrow: false,
                            virtualmode: false,
                            source: PaymentHistoryDataAdapter,
                            width: 'calc(100% - 2px)',
                            height: 'calc(100% - 2px)',
                            columns: [
                                { text: 'Дата', columngroup: 'Payment', dataField: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 120 },
                                { text: 'Сумма', columngroup: 'Payment', datafield: 'sum', cellsformat: 'f2', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 120 },
                                { text: 'Месяц с', columngroup: 'PaymentPeriod', dataField: 'month_start_name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                                { text: 'Год с', columngroup: 'PaymentPeriod', dataField: 'year_start', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 70 },
                                { text: 'Месяц по', columngroup: 'PaymentPeriod', dataField: 'month_end_name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                                { text: 'Год по', columngroup: 'PaymentPeriod', dataField: 'year_end', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 70 },
                            ],
                            columngroups: 
                            [
                                { text: 'Платеж', align: 'center', name: 'Payment' },
                                { text: 'Период оплаты', align: 'center', name: 'PaymentPeriod' },
                            ]
                        })
                    );
            
                    $("#NewPaymentHistory").on('click', function ()
                    {
                        if (CurrentRowData == undefined) return;
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('PaymentHistory/Insert')); ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                cntr_id: CurrentRowData.ContrS_id
                            },
                            success: function(Res) {
                                $('#BodyDialogPaymentHistory').html(Res);
                                $('#EditDialogPaymentHistory').jqxWindow('open');
                            },
                            error: function(Res) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                            },        
                        });
                        
                    });

                    $("#EditPaymentHistory").on('click', function ()
                    {
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('PaymentHistory/Update')); ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                pmhs_id: CurrentRowDataPH.pmhs_id
                            },
                            success: function(Res) {
                                $('#BodyDialogPaymentHistory').html(Res);
                                $('#EditDialogPaymentHistory').jqxWindow('open');
                            },
                            error: function(Res) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                            },        
                        });
                    });


                    $("#DelPaymentHistory").on('click', function ()
                    {
                        if(typeof CurrentRowDataPH !== 'undefined') {
                            $.ajax({
                                type: "POST",
                                url: "/index.php?r=PaymentHistory/Delete",
                                data: { pmhs_id: CurrentRowDataPH.pmhs_id},
                                success: function(){
                                    $("#PaymentHistoryGrid").jqxGrid('updatebounddata');
                                    $("#PaymentHistoryGrid").jqxGrid('selectrow', 0);
                                }
                            });
                        }
                    });
                break;
                case 3:
                    /* Текущая выбранная строка данных */
                    var CurrentRowDataMH;
                        var ContractMasterHistoryDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContractMasterHistory, {}), {
                        formatData: function (data) {
                            if (CurrentRowData == undefined)
                                $.extend(data, {
                                    Filters: ["c.ContrS_id = 0"],
                                });
                            else
                                $.extend(data, {
                                    Filters: ["c.ContrS_id = " + CurrentRowData.ContrS_id],
                                });
                            return data;
                        },
                    });
                    
                    $("#ContractMasterHistoryGrid").on('rowselect', function (event) {
                        CurrentRowDataMH = $('#ContractMasterHistoryGrid').jqxGrid('getrowdata', event.args.rowindex);
                    });
                    
                    $("#NewContractMasterHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                    $("#ReloadContractMasterHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                    $("#DelContractMasterHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                    
                    $('#EditDialogContractMasterHistory').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '270px', width: '340'}));
                    
                    
        
                    
                    $("#ContractMasterHistoryGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            pageable: false,
                            sortable: false,
                            filterable: false,
                            showfilterrow: false,
                            virtualmode: false,
                            source: ContractMasterHistoryDataAdapter,
                            width: 'calc(100% - 2px)',
                            height: 'calc(100% - 2px)',
                            columns: [
                                { text: 'Мастер', dataField: 'EmployeeName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 },
                                { text: 'Дата с', dataField: 'WorkDateStart', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 120 },
                                { text: 'Дата по', dataField: 'WorkDateEnd', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 120 },
                            ]
                        })
                    );
            
                    $("#NewContractMasterHistory").on('click', function () {
                        if (CurrentRowData == undefined) return;
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('ContractMasterHistory/Insert')); ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                ContrS_id: CurrentRowData.ContrS_id
                            },
                            success: function(Res) {
                                $('#BodyDialogContractMasterHistory').html(Res);
                                $('#EditDialogContractMasterHistory').jqxWindow('open');
                            },
                            error: function(Res) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                            },          
                        });
                        
                    });

                    $("#ReloadContractMasterHistory").on('click', function () {
                        $("#ContractMasterHistoryGrid").jqxGrid('updatebounddata');
                    });


                    $("#DelContractMasterHistory").on('click', function ()
                    {
                        if(typeof CurrentRowDataMH !== 'undefined') {
                            $.ajax({
                                type: "POST",
                                url: "/index.php?r=ContractMasterHistory/Delete",
                                data: { History_id: CurrentRowDataMH.History_id},
                                success: function(){
                                    $("#ReloadContractMasterHistory").clic();
                                }
                            });
                        }
                    });
                break;
            }
        };
        
        $('#jqxTabsContracts').jqxTabs({ width: 'calc(100% - 2px)', height: 'calc(100% - 2px)', initTabContent: initWidgets, selectedItem: 1});
        
    });
    
        
</script>

<style>
    
    .jqxGridAliton .jqx-fill-state-pressed {
        background-color: #A7D2BB !important;
        color: black;
    }
    .jqx-tree-item-li {
        margin-left: 0 !important;
    }
</style>

<div class="al-row" style="height: calc(100% - 370px); padding: 0;">
    <div id="ContractsGrid" class="jqxGridAliton"></div>
</div>

<div class="al-row" >
    <div class="al-row-column" style="width: 400px">
        <div class="al-row">
            <div class="al-row-column" style="width: 65px">Юр. лицо:</div>
            <div class="al-row-column"><input readonly id="JuridicalPerson" type="text"></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 65px">Мастер:</div>
            <div class="al-row-column"><input readonly id="MasterName" type="text"></div>
            <div class="al-row-column">ВЦКП: </div>
            <div class="al-row-column"><div id='DateExecuting'></div></div>
            <div style="clear: both"></div>
        </div>
    </div>

    <div class="al-row-column" style="width: calc(100% - 415px);">
        <div class="row-column" style="width: 50%;">Особые договоренности: <textarea readonly id="SpecialCondition" ></textarea></div>
        <div class="row-column" style="width: calc(50% - 22px);">Примечание: <textarea readonly id="ContrNote" ></textarea></div>
        <div style="clear: both"></div>
    </div>
    <div style="clear: both"></div>
</div>

<div class="al-row">
    <div class="al-row-column">
        <div id='jqxWidget'>
            <div style='float: left;' id="dropDownBtnContracts">
                <div style="border: none;" id='jqxTreeContracts'>
                    <ul>
                        <li><div style="width: 160px; padding: 5px; text-align: center;">Договор обслуживания</div></li>
                        <li><div style="width: 160px; padding: 5px; text-align: center;">Доп.соглашение</div></li>
                        <li><div style="width: 160px; padding: 5px; text-align: center;">Счет</div></li>
                        <li><div style="width: 160px; padding: 5px; text-align: center;">Счет-заказ</div></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="al-row-column"><input type="button" value="Дополнительно" id='MoreInformContract' /></div>
    <div class="al-row-column"><input type="button" value="Обновить" id='ReloadContracts' /></div>
    <div class="al-row-column"><input type="button" value="Акты" id='btnViewActs' /></div>
    <div class="al-row-column"><input type="button" value="Нач. и платежи" id='btnBillPay' /></div>
    <div class="al-row-column" style="float: right"><input type="button" value="Удалить" id='DelContract' /></div>
    <div style="clear: both"></div>
</div>

<!--<div id='jqxWidgetContracts' style="margin-top: 10px;">-->
<div class="al-row" style="height: 240px; width: 100%">
    <div id='jqxTabsContracts'>
        <ul>
            <li style="margin-left: 20px;">
                <div style="height: 15px; margin-top: 3px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                        Типы обслуживаемых подсистем
                    </div>
                </div>
            </li>
            <li>
                <div style="height: 15px; margin-top: 3px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                        История изменения расценок
                    </div>
                </div>
            </li>
            <li>
                <div style="height: 15px; margin-top: 3px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                        История платежей
                    </div>
                </div>
            </li>
            <li>
                <div style="height: 15px; margin-top: 3px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                        История мастеров
                    </div>
                </div>
            </li>
        </ul>
        
        <div id='contentContractSystems' style="padding: 6px; overflow: hidden;">
            <div class="al-row" style="height: calc(100% - 60px)">
                <div id="ContractSystemsGrid" class="jqxGridAliton"></div>
            </div>
            <div class="al-row">
                <div class="al-row-column"><input type="button" value="Добавить" id='NewContractSystems' /></div>
                <div class="al-row-column" style="float: right;"><input type="button" value="Удалить" id='DelContractSystems' /></div>
                <div style="clear: both"></div>
            </div>
        </div>
        
        <div id='contentContractPriceHistory' style="padding: 6px; overflow: hidden;">
            <div class="al-row" style="height: calc(100% - 60px)">
                <div id="ContractPriceHistoryGrid" class="jqxGridAliton"></div>
            </div>
            <div class="al-row">
                <div class="al-row-column"><input type="button" value="Добавить" id='NewContractPriceHistory' /></div>
                <div class="al-row-column"><input type="button" value="Изменить" id='EditContractPriceHistory' /></div>
                <div class="al-row-column"><input type="button" value="Очистить тарифы" id='ClearContractPriceHistory' /></div>
                <div style="clear: both"></div>
            </div>
        </div>
        
        <div id='contentPaymentHistory' style="padding: 6px; overflow: hidden;">
            <div class="al-row" style="height: calc(100% - 60px)">
                <div class="row-column" style="width: calc(100% - 310px);"><div id="PaymentHistoryGrid" class="jqxGridAliton"></div></div>
                <div class="row-column" style="width: 280px;">
                    <div style="clear: both"></div>
                    <div class="al-row" style="padding: 0px">Примечание:</div>
                    <div class="al-row" style="padding: 0px; height: 125px;"><textarea readonly id="NotePaymentHistory"></textarea></div>
                </div>
                <div style="clear: both"></div>
            </div>
            <div class="al-row">
                <div class="row-column"><input type="button" value="Добавить" id='NewPaymentHistory' /></div>
                <div class="row-column"><input type="button" value="Изменить" id='EditPaymentHistory' /></div>
                <div class="row-column" style="float: right; margin-right: 25px;"><input type="button" value="Удалить" id='DelPaymentHistory' /></div>
                <div style="clear: both"></div>
            </div>
        </div>
        
        <div id='contentContractMasterHistory' style="padding: 6px; overflow: hidden;">
            <div class="al-row" style="height: calc(100% - 60px)">
                <div id="ContractMasterHistoryGrid" class="jqxGridAliton"></div>
            </div>
            <div class="al-row">
                <div class="row-column"><input type="button" value="Добавить" id='NewContractMasterHistory' /></div>
                <div class="row-column"><input type="button" value="Обновить" id='ReloadContractMasterHistory' /></div>
                <div class="row-column" style="float: right; margin-right: 25px;"><input type="button" value="Удалить" id='DelContractMasterHistory' /></div>
                <div style="clear: both"></div>
            </div>
        </div>
    </div>
</div>


<div id="NewContractDialog">
    <div id="NewContractDialogHeader">
        <span id="NewContractHeaderText"></span>
    </div>
    <div style="overflow: hidden; padding: 10px; background-color: #F2F2F2;" id="NewContractDialogContent">
        <div style="overflow: hidden;" id="NewContractBodyDialog"></div>
    </div>
</div>

<div id="EditDialogContractSystems" style="display: none;">
    <div id="">
        <span id="">Вставка\Редактирование записи</span>
    </div>
    <div style="overflow: hidden; padding: 10px;" id="">
        <div style="overflow: hidden;" id="BodyDialogContractSystems"></div>
    </div>
</div>

<div id="EditDialogContractPriceHistory" style="display: none">
    <div id="">
        <span id="">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="">
        <div id="BodyDialogContractPriceHistory"></div>
    </div>
</div>

<div id="EditDialogPaymentHistory" style="display: none;">
    <div id="">
        <span id="">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="">
        <div id="BodyDialogPaymentHistory"></div>
<!--        <div id="">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='BtnOkDialogPaymentHistory' /></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='BtnCancelDialogPaymentHistory' /></div>
            </div>
        </div>-->
    </div>
</div>

<div id="EditDialogContractMasterHistory" style="display: none;">
    <div id="">
        <span id="">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="">
        <div id="BodyDialogContractMasterHistory"></div>
<!--        <div id="">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='BtnOkDialogContractMasterHistory' /></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='BtnCancelDialogContractMasterHistory' /></div>
            </div>
        </div>-->
    </div>
</div>
