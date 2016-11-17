<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowOrgData;
        
        var OrganizationsVDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceOrganizationsV, {async: true, id: 'id'}));
        
        $("#OrganizationsGrid").on('rowselect', function (event) {
            CurrentRowOrgData = $('#OrganizationsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (CurrentRowOrgData != undefined) {
                
            }
        });
        
        $("#OrganizationsGrid").on('bindingcomplete', function(){
            if (CurrentRowOrgData != undefined) 
                Aliton.SelectRowByIdVirtual('Form_id', CurrentRowOrgData.Form_id, '#OrganizationsGrid', false);
            else
                Aliton.SelectRowByIdVirtual('Form_id', null, '#OrganizationsGrid', false);
        });
        
        $("#OrganizationsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: '100%',
                height: 'calc(100% - 2px)',
                source: OrganizationsVDataAdapter,
                columns: [
                    { text: 'Наименование', datafield: 'FormName', filtercondition: 'CONTAINS', width: 320},    
                    { text: 'Форма собственности', datafield: 'FownName', filtercondition: 'CONTAINS', width: 150},    
                    { text: 'Тип', datafield: 'lph_name', filtercondition: 'CONTAINS', width: 150},    
                ]

        }));
        
        $('#btnSelectOrg').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCloseOrg').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnSelectOrg').on('click', function(){
            if ($('#edFullNameGrEdit').length>0) {
                $('#edFullNameGrEdit').val(CurrentRowOrgData.Form_id);
                $('#FindOrgDialog').jqxWindow('close');
            }
            
        });
        
        $('#btnCloseOrg').on('click', function() {
            if ($('#FindOrgDialog').length>0) {
                $('#FindOrgDialog').jqxWindow('close');
            }
        });
    });
</script>    

<div class="al-row" style="height: calc(100% - 58px)">
    <div id="OrganizationsGrid" class="jqxGridAliton"></div>
</div>    
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Выбрать" id='btnSelectOrg'/></div>
    <div class="al-row-column" style="float: right; margin: 0px"><input type="button" value="Закрыть" id='btnCloseOrg'/></div>
    <div style="clear: both"></div>
</div>    
    
