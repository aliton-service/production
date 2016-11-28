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
            
        $("#ContractsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: false,
                width: '99%',
                height: 'calc(100% - 470px)',
                source: ContractsSDataAdapter,
                columns: [
                    { text: 'Вид документа', dataField: 'DocType_Name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'Тип договора', dataField: 'crtp_name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'Подписание акта', dataField: 'date_doc', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'Номер', dataField: 'ContrNumS', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Дата', dataField: 'ContrDateS', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Действует с', dataField: 'ContrSDateStart', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'по', dataField: 'ContrSDateEnd', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Сумма долга', dataField: 'debt', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Периодичность оплаты', dataField: 'PaymentName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 170 },
                    { text: 'Вид оплаты', dataField: 'PaymentTypeName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Оплачено по', dataField: 'DatePay', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Долг', dataField: 'Debtor', columntype: 'checkbox', filtercondition: 'STARTS_WITH', width: 80 },
                    { text: 'Оплачено', dataField: 'CalcSum', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 120 },
                    { text: 'MasterName', dataField: 'MasterName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 120 },
                ]
            })
        );

        
        $("#JuridicalPerson").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 220 }));
        $("#MasterName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 230 }));
        $("#DateExecuting").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 100 }));
        $("#SpecialCondition").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: '100%', height: 90 }));
        $("#ContrNote").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: '100%', height: 90 }));
        
        
        
        
        $("#dropDownBtnContracts").jqxDropDownButton($.extend(true, {}, DropDownButtonDefaultSettings, { width: 210, height: 28 }));
        $("#jqxTreeContracts").jqxTree({ width: 210 });
        $("#MoreInformContract").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 150, disabled: true }));
        $("#ReloadContracts").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelContract").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true } ));
        
        
        $('#NewContractDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: 580, width: 870}));
        
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
        
        
        
        $('#jqxTabsContracts').jqxTabs({ width: '99%', height: 270 });
        $('#jqxTabsContracts').jqxTabs({ selectedItem: 1 });
        
        
        $("#ContractsGrid").on('rowselect', function (event) {
            var Temp = $('#ContractsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null};
            
            if (CurrentRowData != null) {
                $("#DelContract").jqxButton({ disabled: false });
                $("#MoreInformContract").jqxButton({ disabled: false });
                if (CurrentRowData.MasterName != '') $("#JuridicalPerson").jqxInput('val', CurrentRowData.JuridicalPerson);
                if (CurrentRowData.MasterName != '') $("#MasterName").jqxInput('val', CurrentRowData.MasterName);
                if (CurrentRowData.DateExecuting != '') $("#DateExecuting").jqxDateTimeInput('val', CurrentRowData.DateExecuting);
                if (CurrentRowData.SpecialCondition != '') $("#SpecialCondition").jqxTextArea('val', CurrentRowData.SpecialCondition);
                if (CurrentRowData.ContrNote != '') $("#ContrNote").jqxTextArea('val', CurrentRowData.ContrNote);
            
                var ContractSystemsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContractSystems, {}), {
                    formatData: function (data) {
                        $.extend(data, {
                            Filters: ["cs.ContrS_id = " + CurrentRowData.ContrS_id],
                        });
                        return data;
                    },
                });
                ContractSystemsDataAdapter.dataBind();
                $("#ContractSystemsGrid").jqxGrid({source: ContractSystemsDataAdapter});

                var ContractPriceHistoryDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContractPriceHistory, {}), {
                    formatData: function (data) {
                        $.extend(data, {
                            Filters: ["ph.ContrS_id = " + CurrentRowData.ContrS_id],
                        });
                        return data;
                    },
                });
                ContractPriceHistoryDataAdapter.dataBind();
                $("#ContractPriceHistoryGrid").jqxGrid({source: ContractPriceHistoryDataAdapter});

                var PaymentHistoryDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourcePaymentHistory, {}), {
                    formatData: function (data) {
                        $.extend(data, {
                            Filters: ["ph.cntr_id = " + CurrentRowData.ContrS_id],
                        });
                        return data;
                    },
                });
                PaymentHistoryDataAdapter.dataBind();
                $("#PaymentHistoryGrid").jqxGrid({source: PaymentHistoryDataAdapter});

                var ContractMasterHistoryDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContractMasterHistory, {}), {
                    formatData: function (data) {
                        $.extend(data, {
                            Filters: ["c.ContrS_id = " + CurrentRowData.ContrS_id],
                        });
                        return data;
                    },
                });
                ContractMasterHistoryDataAdapter.dataBind();
                $("#ContractMasterHistoryGrid").jqxGrid({source: ContractMasterHistoryDataAdapter});
            }
        });
        

        
        
        
        
        
        /* Текущая выбранная строка данных */
        var CurrentRowDataCS;
        
        
        $("#ContractSystemsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: false,
                width: '99%',
                height: '180',
                columns: [
                    { text: 'Тип подсистемы', dataField: 'SystemTypeName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 400 },
                ]
            })
        );
       
        $("#ContractSystemsGrid").on('rowselect', function (event) {
            var Temp = $('#ContractSystemsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowDataCS = Temp;
            } else {CurrentRowDataCS = null};
            
//            console.log(CurrentRowDataCS.csdt_id);
        });
    
        
        $("#NewContractSystems").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelContractSystems").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
        $('#EditDialogContractSystems').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '170px', width: '340'}));
        
        $('#EditDialogContractSystems').jqxWindow({initContent: function() {
            $("#BtnOkDialogContractSystems").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#BtnCancelDialogContractSystems").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        }});

        $("#BtnCancelDialogContractSystems").on('click', function () {
            $('#EditDialogContractSystems').jqxWindow('close');
        });
        
        var SendFormContractSystems = function(Mode, Form) {
            var Url;
            if (Mode == 'Insert')
                Url = "<?php echo Yii::app()->createUrl('ContractSystems/Insert');?>";
            
            var Data;
            if (Form == undefined)
                Data = $('#ContractSystems').serialize();
            else Data = Form;
                
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    if (Res == '1' || Res == 1) {
                        $('#EditDialogContractSystems').jqxWindow('close');
                        $("#ContractSystemsGrid").jqxGrid('updatebounddata');
                    } else {
                        $('#BodyDialogContractSystems').html(Res);
                    }

                }
            });
        };

        $("#BtnOkDialogContractSystems").on('click', function () {
            SendFormContractSystems(Mode);
        });
        
        var LoadFormContractSystems = function(Mode, id) {
            var Url;
            var Data;
            if (Mode == 'Insert') {
                Url = "<?php echo Yii::app()->createUrl('ContractSystems/Insert');?>";
                Data = { ContrS_id: id };
            }
            
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    $('#BodyDialogContractSystems').html(Res);
                }
            });
        };
        
        
        $("#NewContractSystems").on('click', function ()
        {
            Mode = 'Insert';
            LoadFormContractSystems(Mode, CurrentRowData.ContrS_id);
            $('#EditDialogContractSystems').jqxWindow('open');
        });
        
        
        $("#DelContractSystems").on('click', function ()
        {
            if(typeof CurrentRowDataCS !== 'undefined') {
                $.ajax({
                    type: "POST",
                    url: "/index.php?r=ContractSystems/Delete",
                    data: { ContractSystem_id: CurrentRowDataCS.ContractSystem_id},
                    success: function(){
                        $("#ContractSystemsGrid").jqxGrid('updatebounddata');
                        $("#ContractSystemsGrid").jqxGrid('selectrow', 0);
                    }
                });
            }
        });
        
        
        
        
        
        
        /* Текущая выбранная строка данных */
        var CurrentRowDataCPH;
        
        
        $("#ContractPriceHistoryGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: false,
                width: '99%',
                height: '180',
                columns: [
                    { text: 'Тариф', dataField: 'ServiceType', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                    { text: 'Дата изменения', dataField: 'DateStart', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 120 },
                    { text: 'Расценка', dataField: 'Price', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 130 },
                    { text: 'Ежемесячные начисления', dataField: 'PriceMonth', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                    { text: 'Причина изменения', dataField: 'ReasonName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                ]
            })
        );
       
        $("#ContractPriceHistoryGrid").on('rowselect', function (event) {
            var Temp = $('#ContractPriceHistoryGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowDataCPH = Temp;
            } else {CurrentRowDataCPH = null};
            
//            console.log(CurrentRowDataCPH.PriceHistory_id);
        });
    
        
        $("#NewContractPriceHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#EditContractPriceHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#ClearContractPriceHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160 }));
        
        
        $('#EditDialogContractPriceHistory').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '330px', width: '600'}));
        
        $('#EditDialogContractPriceHistory').jqxWindow({initContent: function() {
            $("#BtnOkDialogContractPriceHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#BtnCancelDialogContractPriceHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        }});

        $("#BtnCancelDialogContractPriceHistory").on('click', function () {
            $('#EditDialogContractPriceHistory').jqxWindow('close');
        });
        
        var SendFormContractPriceHistory = function(Mode, Form) {
            var Url;
            if (Mode == 'InsertContractPriceHistory')
                Url = "<?php echo Yii::app()->createUrl('ContractPriceHistory/Insert');?>";
            if (Mode == 'UpdateContractPriceHistory')
                Url = "<?php echo Yii::app()->createUrl('ContractPriceHistory/Update');?>";
            
            var Data;
            if (Form == undefined)
                Data = $('#ContractPriceHistory').serialize();
            else Data = Form;
                
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    if (Res == '1' || Res == 1) {
                        $('#EditDialogContractPriceHistory').jqxWindow('close');
                        $("#ContractPriceHistoryGrid").jqxGrid('updatebounddata');
                    } else {
                        $('#BodyDialogContractPriceHistory').html(Res);
                    }
                }
            });
        }

        $("#BtnOkDialogContractPriceHistory").on('click', function () {
            SendFormContractPriceHistory(Mode);
        });
        
        var LoadFormContractPriceHistory = function(Mode, id) {
            var Date = CurrentRowData.ContrSDateEnd;
            var DateEnd = Date.getDate() + '.' + (Date.getMonth()+1) + '.' + Date.getFullYear();
            var Url;
            var Data;
            if (Mode == 'InsertContractPriceHistory') {
                Url = "<?php echo Yii::app()->createUrl('ContractPriceHistory/Insert');?>";
                Data = { 
                    ContrS_id: id, 
                    DateEnd: DateEnd,
                    Price: Contracts.Price,
//                    PriceMonth: Contracts.PriceMonth,
//                    Reason_id: Contracts.Reason_id,
//                    DateStart: Contracts.LastChangeDate,
                };
            }
            if (Mode == 'UpdateContractPriceHistory') {
                Url = "<?php echo Yii::app()->createUrl('ContractPriceHistory/Update');?>";
                Data = { PriceHistory_id: id };
            }
            
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    $('#BodyDialogContractPriceHistory').html(Res);
                }
            });
        };
        
        
        $("#NewContractPriceHistory").on('click', function () {
            Mode = 'InsertContractPriceHistory';
            LoadFormContractPriceHistory(Mode, CurrentRowData.ContrS_id);
            $('#EditDialogContractPriceHistory').jqxWindow('open');
        });
        
        $("#EditContractPriceHistory").on('click', function ()
        {
            Mode = 'UpdateContractPriceHistory';
            LoadFormContractPriceHistory(Mode, CurrentRowDataCPH.PriceHistory_id);
            $('#EditDialogContractPriceHistory').jqxWindow('open');
        });
        
        $('#ContractPriceHistoryGrid').on('rowdoubleclick', function () { 
            $("#EditContractPriceHistory").click();
        });
        
        
        $("#ClearContractPriceHistory").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=ContractPriceHistory/Delete",
                data: { ContrS_id: CurrentRowData.ContrS_id},
                success: function(){
                    $("#ContractPriceHistoryGrid").jqxGrid('updatebounddata');
                    $("#ContractPriceHistoryGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
        
        
        
        
        
        
        
        
        /* Текущая выбранная строка данных */
        var CurrentRowDataPH;
        
        
        $("#PaymentHistoryGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: false,
                width: '99%',
                height: '180',
                columns: [
                    { text: 'Дата', columngroup: 'Payment', dataField: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 120 },
                    { text: 'Сумма', columngroup: 'Payment', dataField: 'sum', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 120 },
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
       
        $("#PaymentHistoryGrid").on('rowselect', function (event) {
            var Temp = $('#PaymentHistoryGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowDataPH = Temp;
            } else {CurrentRowDataPH = null};
            
//            console.log(CurrentRowDataPH.pmhs_id);
            if (CurrentRowDataPH.note != '') $("#NotePaymentHistory").jqxTextArea('val', CurrentRowDataPH.note);
        });
        
        $('#PaymentHistoryGrid').on('rowdoubleclick', function () { 
            $("#EditPaymentHistory").click();
        });
        
        $("#NotePaymentHistory").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: '100%', height: 160 }));
        
        $("#NewPaymentHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#EditPaymentHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelPaymentHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
        $('#EditDialogPaymentHistory').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '430px', width: '300'}));
        
        $('#EditDialogPaymentHistory').jqxWindow({initContent: function() {
            $("#BtnOkDialogPaymentHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#BtnCancelDialogPaymentHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        }});

        $("#BtnCancelDialogPaymentHistory").on('click', function () {
            $('#EditDialogPaymentHistory').jqxWindow('close');
        });
        
        var SendFormPaymentHistory = function(Mode, Form) {
            var Url;
            if (Mode == 'Insert')
                Url = "<?php echo Yii::app()->createUrl('PaymentHistory/Insert');?>";
            if (Mode == 'Update') {
                Url = "<?php echo Yii::app()->createUrl('PaymentHistory/Update'); ?>";
            }
            
            var Data;
            if (Form == undefined)
                Data = $('#PaymentHistory').serialize();
            else Data = Form;
                
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    if (Res == '1' || Res == 1) {
                        $('#EditDialogPaymentHistory').jqxWindow('close');
                        $("#PaymentHistoryGrid").jqxGrid('updatebounddata');
                    } else {
                        $('#BodyDialogPaymentHistory').html(Res);
                    }

                }
            });
        };

        $("#BtnOkDialogPaymentHistory").on('click', function () {
            SendFormPaymentHistory(Mode);
        });
        
        var LoadFormPaymentHistory = function(Mode, id) {
            var Url;
            var Data;
            if (Mode == 'Insert') {
                Url = "<?php echo Yii::app()->createUrl('PaymentHistory/Insert'); ?>";
                Data = { cntr_id: id };
            }
            if (Mode == 'Update') {
                Url = "<?php echo Yii::app()->createUrl('PaymentHistory/Update'); ?>";
                Data = { pmhs_id: id };
            }
            
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    $('#BodyDialogPaymentHistory').html(Res);
                }
            });
        };
        
        
        $("#NewPaymentHistory").on('click', function ()
        {
            Mode = 'Insert';
            LoadFormPaymentHistory(Mode, CurrentRowData.ContrS_id);
            $('#EditDialogPaymentHistory').jqxWindow('open');
        });
        
        $("#EditPaymentHistory").on('click', function ()
        {
            Mode = 'Update';
            LoadFormPaymentHistory(Mode, CurrentRowDataPH.pmhs_id);
            $('#EditDialogPaymentHistory').jqxWindow('open');
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
        
        
        
        
        
        
        
        
        
        /* Текущая выбранная строка данных */
        var CurrentRowDataMH;
        
        
        $("#ContractMasterHistoryGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: false,
                width: '99%',
                height: '180',
                columns: [
                    { text: 'Мастер', dataField: 'EmployeeName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 },
                    { text: 'Дата с', dataField: 'WorkDateStart', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 120 },
                    { text: 'Дата по', dataField: 'WorkDateEnd', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 120 },
                ]
            })
        );
       
        $("#ContractMasterHistoryGrid").on('rowselect', function (event) {
            var Temp = $('#ContractMasterHistoryGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowDataMH = Temp;
            } else {CurrentRowDataMH = null};
            
//            console.log(CurrentRowDataMH.History_id);
        });
        
        
        
        $("#NewContractMasterHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#ReloadContractMasterHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelContractMasterHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
        $('#EditDialogContractMasterHistory').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '270px', width: '340'}));
        
        $('#EditDialogContractMasterHistory').jqxWindow({initContent: function() {
            $("#BtnOkDialogContractMasterHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#BtnCancelDialogContractMasterHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        }});

        $("#BtnCancelDialogContractMasterHistory").on('click', function () {
            $('#EditDialogContractMasterHistory').jqxWindow('close');
        });
        
        var SendFormContractMasterHistory = function(Mode, Form) {
            var Url;
            if (Mode == 'Insert')
                Url = "<?php echo Yii::app()->createUrl('ContractMasterHistory/Insert');?>";
            if (Mode == 'Update') {
                Url = "<?php echo Yii::app()->createUrl('ContractMasterHistory/Update'); ?>";
            }
            
            var Data;
            if (Form == undefined)
                Data = $('#ContractMasterHistory').serialize();
            else Data = Form;
                
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    if (Res == '1' || Res == 1) {
                        $('#EditDialogContractMasterHistory').jqxWindow('close');
                        $("#ContractMasterHistoryGrid").jqxGrid('updatebounddata');
                    } else {
                        $('#BodyDialogContractMasterHistory').html(Res);
                    }

                }
            });
        };

        $("#BtnOkDialogContractMasterHistory").on('click', function () {
            SendFormContractMasterHistory(Mode);
        });
        
        var LoadFormContractMasterHistory = function(Mode, id) {
            var Url;
            var Data;
            if (Mode == 'Insert') {
                Url = "<?php echo Yii::app()->createUrl('ContractMasterHistory/Insert'); ?>";
                Data = { ContrS_id: id };
            }
            if (Mode == 'Update') {
                Url = "<?php echo Yii::app()->createUrl('ContractMasterHistory/Update'); ?>";
                Data = { History_id: id };
            }
            
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    $('#BodyDialogContractMasterHistory').html(Res);
                }
            });
        };
        
        
        $("#NewContractMasterHistory").on('click', function ()
        {
            Mode = 'Insert';
            LoadFormContractMasterHistory(Mode, CurrentRowData.ContrS_id);
            $('#EditDialogContractMasterHistory').jqxWindow('open');
        });
        
        $("#ReloadContractMasterHistory").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=ContractMasterHistory/Index",
                success: function(){
                    $("#ContractMasterHistoryGrid").jqxGrid('updatebounddata');
                    $("#ContractMasterHistoryGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
        
        $("#DelContractMasterHistory").on('click', function ()
        {
            if(typeof CurrentRowDataMH !== 'undefined') {
                $.ajax({
                    type: "POST",
                    url: "/index.php?r=ContractMasterHistory/Delete",
                    data: { History_id: CurrentRowDataMH.History_id},
                    success: function(){
                        $("#ContractMasterHistoryGrid").jqxGrid('updatebounddata');
                        $("#ContractMasterHistoryGrid").jqxGrid('selectrow', 0);
                    }
                });
            }
        });
        
        
        
        $("#ContractsGrid").jqxGrid('selectrow', 0);
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

<div class="row">
    <div id="ContractsGrid" class="jqxGridAliton"></div>
</div>

<div class="row" style="display: flex; justify-content: space-between;">
    <div class="row-column">
        <div class="row">Юр. лицо: <input readonly id="JuridicalPerson" type="text"></div>
        <div class="row">Мастер: <input readonly id="MasterName" type="text"></div>
        <div class="row">
            <div class="row-column">Дата проводки через ВЦКП: </div>
            <div class="row-column"><div id='DateExecuting'></div></div>
        </div>
    </div>

    <div class="row-column" style="width: calc(100% - 305px);">
        <div class="row-column" style="width: 48%;">Особые договоренности: <textarea readonly id="SpecialCondition" ></textarea></div>
        <div class="row-column" style="width: 49%;">Примечание: <textarea readonly id="ContrNote" ></textarea></div>
    </div>
</div>

<div class="row">
    <div class="row-column">
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
    <div class="row-column"><input type="button" value="Дополнительно" id='MoreInformContract' /></div>
    <div class="row-column"><input type="button" value="Обновить" id='ReloadContracts' /></div>
    <div class="row-column"><input type="button" value="Удалить" id='DelContract' /></div>
</div>


<div id='jqxWidgetContracts' style="margin-top: 10px;">
    <div id='jqxTabsContracts'>
        <ul>
            <li>
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
        
        
        <div id='contentContractSystems' style="overflow: hidden; margin: 5px; width: 100%; height: 100%">
            <div id="ContractSystemsGrid" class="jqxGridAliton"></div>

            <div class="row">
                <div class="row-column"><input type="button" value="Добавить" id='NewContractSystems' /></div>
                <div class="row-column" style="float: right;"><input type="button" value="Удалить" id='DelContractSystems' /></div>
            </div>

            <div id="EditDialogContractSystems">
                <div id="">
                    <span id="">Вставка\Редактирование записи</span>
                </div>
                <div style="overflow: hidden; padding: 10px;" id="">
                    <div style="overflow: hidden;" id="BodyDialogContractSystems"></div>
                    <div id="">
                        <div class="row">
                            <div class="row-column"><input type="button" value="Сохранить" id='BtnOkDialogContractSystems' /></div>
                            <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='BtnCancelDialogContractSystems' /></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div id='contentContractPriceHistory' style="overflow: hidden; margin: 5px; width: 100%; height: 100%">
            <div id="ContractPriceHistoryGrid" class="jqxGridAliton"></div>

            <div class="row">
                <div class="row-column"><input type="button" value="Добавить" id='NewContractPriceHistory' /></div>
                <div class="row-column"><input type="button" value="Изменить" id='EditContractPriceHistory' /></div>
                <div class="row-column"><input type="button" value="Очистить тарифы" id='ClearContractPriceHistory' /></div>
            </div>

            <div id="EditDialogContractPriceHistory">
                <div id="">
                    <span id="">Вставка\Редактирование записи</span>
                </div>
                <div style="padding: 10px;" id="">
                    <div id="BodyDialogContractPriceHistory"></div>
                    <div id="">
                        <div class="row">
                            <div class="row-column"><input type="button" value="Сохранить" id='BtnOkDialogContractPriceHistory' /></div>
                            <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='BtnCancelDialogContractPriceHistory' /></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div id='contentPaymentHistory' style="overflow: hidden; margin: 5px; width: 100%; height: 100%">
            <div class="row" style="margin: 0; padding: 0;">
                <div class="row-column" style="width: calc(100% - 310px);"><div id="PaymentHistoryGrid" class="jqxGridAliton"></div></div>
                <div class="row-column" style="width: 280px;">Примечание: <textarea readonly id="NotePaymentHistory"></textarea></div>
            </div>
            <div class="row">
                <div class="row-column"><input type="button" value="Добавить" id='NewPaymentHistory' /></div>
                <div class="row-column"><input type="button" value="Изменить" id='EditPaymentHistory' /></div>
                <div class="row-column" style="float: right; margin-right: 25px;"><input type="button" value="Удалить" id='DelPaymentHistory' /></div>
            </div>

            <div id="EditDialogPaymentHistory">
                <div id="">
                    <span id="">Вставка\Редактирование записи</span>
                </div>
                <div style="padding: 10px;" id="">
                    <div id="BodyDialogPaymentHistory"></div>
                    <div id="">
                        <div class="row">
                            <div class="row-column"><input type="button" value="Сохранить" id='BtnOkDialogPaymentHistory' /></div>
                            <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='BtnCancelDialogPaymentHistory' /></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div id='contentContractMasterHistory' style="overflow: hidden; margin: 5px; width: 100%; height: 100%">
            <div id="ContractMasterHistoryGrid" class="jqxGridAliton"></div>
            
            <div class="row">
                <div class="row-column"><input type="button" value="Добавить" id='NewContractMasterHistory' /></div>
                <div class="row-column"><input type="button" value="Обновить" id='ReloadContractMasterHistory' /></div>
                <div class="row-column" style="float: right; margin-right: 25px;"><input type="button" value="Удалить" id='DelContractMasterHistory' /></div>
            </div>

            <div id="EditDialogContractMasterHistory">
                <div id="">
                    <span id="">Вставка\Редактирование записи</span>
                </div>
                <div style="padding: 10px;" id="">
                    <div id="BodyDialogContractMasterHistory"></div>
                    <div id="">
                        <div class="row">
                            <div class="row-column"><input type="button" value="Сохранить" id='BtnOkDialogContractMasterHistory' /></div>
                            <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='BtnCancelDialogContractMasterHistory' /></div>
                        </div>
                    </div>
                </div>
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

