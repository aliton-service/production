<script type="text/javascript">
    
    
    $(document).ready(function () {
        
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var Contracts = {
            ObjectGr_id: '<?php echo $ObjectGr_id; ?>',
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
                width: '100%',
                height: '300',
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

        
        $("#JuridicalPerson").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 300 }));
        $("#MasterName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 300 }));
        $("#DateExecuting").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 100 }));
        $("#SpecialCondition").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 470 }));
        $("#ContrNote").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 470 }));
        
        
        
        
        $("#dropDownBtnContracts").jqxDropDownButton($.extend(true, {}, ButtonDefaultSettings, { autoOpen: true, width: 210, height: 28 }));
        $("#jqxTreeContracts").jqxTree({ width: 210 });
        $("#MoreInformContract").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 150 }));
        $("#ReloadContracts").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelContract").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
        $('#NewContractDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '650px', width: '870'}));
        
        $('#NewContractDialog').jqxWindow({initContent: function() {
            $("#NewContractBtnOk").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#NewContractBtnCancel").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        }});
        
        $("#NewContractBtnCancel").on('click', function () {
            $('#NewContractDialog').jqxWindow('close');
        });
        
        
        var SendFormContract = function(Form) {
            var Data;
            if (Form == undefined)
                Data = $('#Documents').serialize();
            else Data = Form;
                
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('Documents/Insert');?>",
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    if (Res == '1' || Res == 1) {
                        $('#NewContractDialog').jqxWindow('close');
                        location.reload();
                    } else {
                        $('#NewContractBodyDialog').html(Res);
                    }
                }
            });
        }

        $("#NewContractBtnOk").on('click', function () {
            SendFormContract();
        });
        
        var openCreateWindow = function (itemLabel) {
            var DocType_id;
            switch (itemLabel) {
                case 'Договор обслуживания':
                    DocType_id = 4;
                    break;
                case 'Доп.соглашение':
                    DocType_id = 5;
                    break;
                case 'Счет':
                    DocType_id = 8;
                    break;
                case 'Счет-заказ':
                    DocType_id = 3;
                    break;
            }
            
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('Documents/Insert');?>",
                type: 'POST',
                async: false,
                data: { 
                    ObjectGr_id: Contracts.ObjectGr_id,
                    DocType_id: DocType_id
                },
                success: function(Res) {
                    $('#NewContractBodyDialog').html(Res);
                    $('#NewContractHeaderText').html(itemLabel);
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
                }
            });
        });
        
        
        
        
        
        $('#jqxTabsContracts').jqxTabs({ width: '99%', height: 285 });
        
        
        
        $("#ContractsGrid").on('rowselect', function (event) {
            var Temp = $('#ContractsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null};
            
            console.log(CurrentRowData.ContrS_id);
            
            if (CurrentRowData.JuridicalPerson != '') $("#JuridicalPerson").jqxInput('val', CurrentRowData.JuridicalPerson);
            if (CurrentRowData.MasterName != '') $("#MasterName").jqxInput('val', CurrentRowData.MasterName);
            if (CurrentRowData.DateExecuting != '') $("#DateExecuting").jqxInput('val', CurrentRowData.DateExecuting);
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
            ContractSystemsDataAdapter.dataBind();
            $("#ContractPriceHistoryGrid").jqxGrid({source: ContractPriceHistoryDataAdapter});
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
            $.ajax({
                type: "POST",
                url: "/index.php?r=ContractSystems/Delete",
                data: { ContractSystem_id: CurrentRowDataCS.ContractSystem_id},
                success: function(){
                    $("#ContractSystemsGrid").jqxGrid('updatebounddata');
                    $("#ContractSystemsGrid").jqxGrid('selectrow', 0);
                }
            });
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
        $("#DelContractPriceHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
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
                    DateEnd: DateEnd 
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
        
        
        $("#NewContractPriceHistory").on('click', function ()
        {
            Mode = 'InsertContractPriceHistory';
            LoadFormContractPriceHistory(Mode, CurrentRowData.ContrS_id);
            $('#EditDialogContractPriceHistory').jqxWindow('open');
        });
        
        $("#EditContractPriceHistory").on('click', function ()
        {
            Mode = 'UpdateContractPriceHistory';
            LoadFormContractPriceHistory(Mode, CurrentRowData.ContrS_id);
            $('#EditDialogContractPriceHistory').jqxWindow('open');
        });
        
        
        $("#DelContractPriceHistory").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=ContractPriceHistory/Delete",
                data: { PriceHistory_id: CurrentRowDataCPH.PriceHistory_id},
                success: function(){
                    $("#ContractPriceHistoryGrid").jqxGrid('updatebounddata');
                    $("#ContractPriceHistoryGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
        
        
        
        
        
        
        
        $("#ContractsGrid").jqxGrid('selectrow', 0);
    });
    
        
</script>

<div class="row">
    <div id="ContractsGrid" class="jqxGridAliton"></div>
</div>


<div class="row">
    <div class="row-column">Юр. лицо: <input readonly id="JuridicalPerson" type="text"></div>
    <div class="row-column">Мастер: <input readonly id="MasterName" type="text"></div>
    <div class="row-column">Дата проводки через ВЦКП: <input readonly id='DateExecuting' type="text"></div> 
</div>

<div class="row">
    <div class="row-column">Особые договоренности: <textarea readonly id="SpecialCondition" ></textarea></div>
    <div class="row-column">Примечание: <textarea readonly id="ContrNote" ></textarea></div>
</div>


<div class="row">
    <div class="row-column">
        <div id='jqxWidget'>
            <div style='float: left;' id="dropDownBtnContracts">
                <div style="border: none;" id='jqxTreeContracts'>
                    <ul>
                        <li><div style="width: 160px; height: 20px;">Договор обслуживания</div></li>
                        <li><div style="width: 160px; height: 20px;">Доп.соглашение</div></li>
                        <li><div style="width: 160px; height: 20px;">Счет</div></li>
                        <li><div style="width: 160px; height: 20px;">Счет-заказ</div></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row-column"><input type="button" value="Дополнительно" id='MoreInformContract' /></div>
    <div class="row-column"><input type="button" value="Обновить" id='ReloadContracts' /></div>
    <div class="row-column"><input type="button" value="Удалить" id='DelContract' /></div>
</div>


<div id='jqxWidgetContracts' style="margin-top: 15px;">
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
        
        
        <div id='contentContractSystems' style="overflow: hidden; margin-left: 10px; width: 100%; height: 100%">
            <div style="margin-top: 10px;">
                <div id="ContractSystemsGrid" class="jqxGridAliton" style="margin-right: 10px"></div>

                <div class="row">
                    <div class="row-column"><input type="button" value="Добавить" id='NewContractSystems' /></div>
                    <div class="row-column" style="float: right;"><input type="button" value="Удалить" id='DelContractSystems' /></div>
                </div>
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
        
        
        <div id='contentContractPriceHistory' style="overflow: hidden; margin-left: 10px; width: 100%; height: 100%">
            <div style="margin-top: 10px;">
                <div id="ContractPriceHistoryGrid" class="jqxGridAliton" style="margin-right: 10px"></div>

                <div class="row">
                    <div class="row-column"><input type="button" value="Добавить" id='NewContractPriceHistory' /></div>
                    <div class="row-column"><input type="button" value="Изменить" id='EditContractPriceHistory' /></div>
                    <div class="row-column" style="float: right;"><input type="button" value="Удалить" id='DelContractPriceHistory' /></div>
                </div>
            </div>

            <div id="EditDialogContractPriceHistory">
                <div id="">
                    <span id="">Вставка\Редактирование записи</span>
                </div>
                <div style="overflow: hidden; padding: 10px;" id="">
                    <div style="overflow: hidden;" id="BodyDialogContractPriceHistory"></div>
                    <div id="">
                        <div class="row">
                            <div class="row-column"><input type="button" value="Сохранить" id='BtnOkDialogContractPriceHistory' /></div>
                            <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='BtnCancelDialogContractPriceHistory' /></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div id='content3' style="overflow: hidden; margin-left: 10px; width: 100%; height: 100%"></div>
        <div id='content4' style="overflow: hidden; margin-left: 10px; width: 100%; height: 100%"></div>
    </div>
</div>


<div id="NewContractDialog">
    <div id="NewContractDialogHeader">
        <span id="NewContractHeaderText"></span>
    </div>
    <div style="overflow: hidden; padding: 10px; background-color: #F2F2F2;" id="NewContractDialogContent">
        <div style="overflow: hidden;" id="NewContractBodyDialog"></div>
        <div id="NewContractBottomDialog">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='NewContractBtnOk' /></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='NewContractBtnCancel' /></div>
            </div>
        </div>
    </div>
</div>

