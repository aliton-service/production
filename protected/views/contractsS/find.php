<script type="text/javascript">
        $(document).ready(function () {
            
            $("#DocNumber").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 150 }));
            $("#DocSum").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 150, decimalDigits: 2, symbol: "р", symbolPosition: 'right' }));
            
            var DataContractM = new $.jqx.dataAdapter(Sources.SourceContractM);
            
            $("#ContractMGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: true,
                virtualmode: false,
                width: '98%',
                height: '99%',
                source: DataContractM,
                columns: [
                    { text: 'Тип документа', dataField: 'DocType_Name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 120 },
                    { text: 'Дата', dataField: 'ContrDateS', columntype: 'textbox', filtercondition: 'STARTS_WITH', cellsformat: 'dd.MM.yyyy', width: 100 },
                    { text: 'Номер', dataField: 'ContrNumS', columntype: 'textbox', filtercondition: 'STARTS_WITH', cellsformat: 'dd.MM.yyyy', width: 120 },
                    { text: 'Адрес', dataField: 'Addr', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 350 },
                    { text: 'Начисления', dataField: 'Price', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 120 },
                ]
            })
        );
        });
</script> 

<div class="row" style="margin: 0;">
    <div class="row-column">Номер: <input type="text" id="DocNumber"></div>
    <div class="row-column" style="padding-top: 3px;">Сумма: </div><div class="row-column"><div id="DocSum"></div></div>
</div>

<div style="height: calc(100% - 40px);" class="row">
    <div id="ContractMGrid" class="jqxGridAliton"></div>
</div>