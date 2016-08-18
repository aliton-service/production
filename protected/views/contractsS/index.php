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
                ]
            })
        );
        
        $("#JuridicalPerson").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 300 }));
        $("#MasterName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 300 }));
        $("#DateExecuting").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 170 }));
        $("#SpecialCondition").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 470 }));
        $("#ContrNote").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 470 }));
        
        $("#ContractsGrid").on('rowselect', function (event) {
            var Temp = $('#ContractsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null};
            
            console.log(CurrentRowData);
            
            if (CurrentRowData.JuridicalPerson != '') $("#JuridicalPerson").jqxInput('val', CurrentRowData.JuridicalPerson);
            if (CurrentRowData.MasterName != '') $("#MasterName").jqxInput('val', CurrentRowData.MasterName);
            if (CurrentRowData.DateExecuting != '') $("#DateExecuting").jqxInput('val', CurrentRowData.DateExecuting);
            if (CurrentRowData.SpecialCondition != '') $("#SpecialCondition").jqxTextArea('val', CurrentRowData.SpecialCondition);
            if (CurrentRowData.ContrNote != '') $("#ContrNote").jqxTextArea('val', CurrentRowData.ContrNote);
        });
        
        
        $("#dropDownBtnContracts").jqxDropDownButton($.extend(true, {}, ButtonDefaultSettings, { autoOpen: true, width: 210, height: 28 }));
        $("#jqxTreeContracts").jqxTree({ width: 210 });
        $("#MoreInformContract").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 150 }));
        $("#ReloadContracts").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelContract").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        var newDocType = function (itemLabel) {
            switch (itemLabel) {
                case 'Договор обслуживания':
                    
                    break;
                case 'Доп. соглашение':
                    
                    break;
                case 'Счет':
                    
                    break;
                case 'Счет-заказ':
                    
                    break;
                default:
                    alert( 'Что-то пошло не так' );
            }
        };
        
        $('#jqxTreeContracts').on('select', function (event) {
            var args = event.args;
            var item = $('#jqxTreeContracts').jqxTree('getItem', args.element);
            console.log(item.label);
            newDocType(item.label)
        });
        
        
        var dropDownBtnContent = '<div style="position: relative; margin-left: 3px; text-align: center; margin-top: 5px;">Создать</div>';
        $("#dropDownBtnContracts").jqxDropDownButton('setContent', dropDownBtnContent);
 
 
 
 
        
        $('#ContractsGrid').on('rowdoubleclick', function (event) { 
            $("#MoreInformContract").click();
        });
        
        
        $("#NewContract").on('click', function () 
        {
            window.open('/index.php?r=Documents/Create');
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
                data: { Contract_id: CurrentRowData.Contract_id },
                success: function(){
                    $("#ContractsGrid").jqxGrid('updatebounddata');
                }
            });
        });
        
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
                        <li><div style="width: 160px; height: 20px;">Доп. соглашение</div></li>
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


<div id="EditContractDialog">
    <div id="ContractDialogHeader">
        <span id="ContractHeaderText">Новый <?php echo $model->ContrS_id; ?></span>
    </div>
    <div style="overflow: hidden; padding: 10px; background-color: #F2F2F2;" id="ContractDialogContent">
        <div style="overflow: hidden;" id="ContractBodyDialog"></div>
        <div id="ContractBottomDialog">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='ContractBtnOk' /></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='ContractBtnCancel' /></div>
            </div>
        </div>
    </div>
</div>



