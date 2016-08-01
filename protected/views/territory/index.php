<script type="text/javascript">
    $(document).ready(function () {      
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var DemDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListTerritoryMin, {}));

        $("#TerritoryGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: true,
                virtualmode: false,
                width: '100%',
                height: '400',
                source: DemDataAdapter,
                        /*
                ready: function() {
                    var State = $('#TerritoryGrid').jqxGrid('getstate');
                    var Columns = GridState.LoadGridSettings('#TerritoryGrid', 'TerritoryIndex_TerritoryGrid');
                    $.extend(true, State.columns, Columns);
                    $('#TerritoryGrid').jqxGrid('loadstate', State);    
                    $('#TerritoryGrid').jqxGrid({source: DemDataAdapter});
//                }*/
                columns: [
                    { text: 'Участок', dataField: 'Territ_Name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 },
                    { text: 'Примечание', dataField: 'Note', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 }
                ]
        }));
        $("#NewTerritory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#EditTerritory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelTerritory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $("#TerritoryGrid").on('rowselect', function (event) {
            var Temp = $('#TerritoryGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null};
        });
        
        $('#TerritoryGrid').on('rowdoubleclick', function () { 
            $("#EditTerritory").click();
        });
        
        
        $("#NewTerritory").on('click', function ()
        {
            window.open('/index.php?r=Territory/Create');
        });
        
        $("#EditTerritory").on('click', function ()
        {
            window.open('/index.php?r=Territory/Update&Territ_Id=' + CurrentRowData.Territ_Id);
        });
        
        $("#DelTerritory").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=Territory/Delete",
                data: { Territ_Id: CurrentRowData.Territ_Id },
                success: function(){
                    $("#TerritoryGrid").jqxGrid('updatebounddata');
                }
            });
        });
    });
    
    
        
</script>

<?php $this->setPageTitle('Участки'); ?>
<?php
    $this->breadcrumbs=array(
        'Справочники'=>array('/reference/index'),
        'Участки'=>array('index'),
    );
?>

<div class="row">
    <div id="TerritoryGrid" class="jqxGridAliton"></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Создать" id='NewTerritory' /></div>
    <div class="row-column"><input type="button" value="Изменить" id='EditTerritory' /></div>
    <div class="row-column"><input type="button" value="Удалить" id='DelTerritory' /></div>
</div>