<script type="text/javascript">
        $(document).ready(function () {
            
            var DataContractM = new $.jqx.dataAdapter(Sources.SourceContractM);
            
            $("#ContractMGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 500,
                showfilterrow: true,
                filterable: true,
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

<div style="height: 100%;">
    <div id="ContractMGrid" class="jqxGridAliton"></div>
</div>