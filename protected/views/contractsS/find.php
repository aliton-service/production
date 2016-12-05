<script type="text/javascript">
    $(document).ready(function () {
        var CurrentRowData;

        var DataContractM = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContractM, {
            filter: function () {
                $("#ContractMGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#ContractMGrid").jqxGrid('updatebounddata', 'sort');
            }
        }));

        $("#ContractMGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: true,
                filterable: true,
                virtualmode: true,
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

        var PropForm_id = '';
        $("#ContractMGrid").on('rowselect', function (event) {
            var Temp = $('#ContractMGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null;};
            console.log(CurrentRowData);
            if (typeof CurrentRowData['PropForm_id'] != undefined) {
                PropForm_id = '&PropForm_id=' + CurrentRowData.PropForm_id;
            } else {
                PropForm_id = '';
            }
        });
        
        
        $('#ContractMGrid').on('rowdoubleclick', function () { 
            window.open('/index.php?r=Documents/Index&ContrS_id=' + CurrentRowData.ContrS_id + PropForm_id);
        });

//        $("#ContractMGrid").on('bindingcomplete', function (event) {
//            $("#ContractMGrid").jqxGrid('selectrow', 0);
//        });
    });
</script> 

<div style="height: 100%;">
    <div id="ContractMGrid" class="jqxGridAliton"></div>
</div>
