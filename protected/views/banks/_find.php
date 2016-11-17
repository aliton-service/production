<script type="text/javascript">
    var CurrentRowBankData;
    
    $(document).ready(function () {
        var BanksDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceBanks));
        
        $('#btnSelectBank').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnSelectBank').on('click', function() {
            if ($('#edBankEdit').length>0)
                $('#edBankEdit').val(CurrentRowBankData.Bank_id);
            
            if ($('#FindBanksDialog').length>0)
                $('#FindBanksDialog').jqxWindow('close');
        });
        
        $("#BanksGrid").on('rowselect', function (event) {
            CurrentRowBankData = $('#BanksGrid').jqxGrid('getrowdata', event.args.rowindex);
        });
        
        $("#BanksGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: '100%',
                height: 'calc(100% - 2px)',
                source: BanksDataAdapter,
                columns: [
                    { text: 'Наименование', datafield: 'bank_name', filtercondition: 'CONTAINS', width: 320},    
                    { text: 'Корсчет', datafield: 'cor_account', filtercondition: 'CONTAINS', width: 180},
                    { text: 'БИК', datafield: 'bik', filtercondition: 'CONTAINS', width: 120},
                    { text: 'Город', datafield: 'City', filtercondition: 'CONTAINS', width: 150},
                    { text: 'Отдел', datafield: 'Department', filtercondition: 'CONTAINS', width: 150},
                ]

        }));
    });
</script>    
    

<div class="al-row" style="height: calc(100% - 58px)">
    <div class="al-row-column" style="width: 100%">
        <div id="BanksGrid" class="jqxGridAliton"></div>
    </div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Выбрать" id='btnSelectBank'/></div>
    <div class="al-row-column" style="float: right; margin: 0px"><input type="button" value="Закрыть" id='btnCloseForm'/></div>
    <div style="clear: both"></div>
</div> 
