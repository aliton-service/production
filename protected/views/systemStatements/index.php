<script type="text/javascript">
    $(document).ready(function () {      
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var DemDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListSystemStatementsMin, {}));

        $("#SystemStatementsGrid").jqxGrid(
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
                    var State = $('#SystemStatementsGrid').jqxGrid('getstate');
                    var Columns = GridState.LoadGridSettings('#SystemStatementsGrid', 'SystemStatementsIndex_SystemStatementsGrid');
                    $.extend(true, State.columns, Columns);
                    $('#SystemStatementsGrid').jqxGrid('loadstate', State);    
                    $('#SystemStatementsGrid').jqxGrid({source: DemDataAdapter});
//                }*/
                columns: [
                    { text: 'Состояние системы', dataField: 'SystemStatementsName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 },
                    { text: 'Коэффициент', dataField: 'Coefficient', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 }
                ]
        }));
        $("#NewSystemStatements").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#EditSystemStatements").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelSystemStatements").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $("#SystemStatementsGrid").on('rowselect', function (event) {
            var Temp = $('#SystemStatementsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null};
        });
        
        $('#SystemStatementsGrid').on('rowdoubleclick', function (event) { 
            $("#EditSystemStatements").click();
        });
        
        
        $("#NewSystemStatements").on('click', function ()
        {
            window.open('/index.php?r=SystemStatements/Create');
        });
        
        $("#EditSystemStatements").on('click', function ()
        {
            window.open('/index.php?r=SystemStatements/Update&SystemStatements_id=' + CurrentRowData.SystemStatements_id);
        });
        
        $("#DelSystemStatements").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=SystemStatements/Delete",
                data: { SystemStatements_id: CurrentRowData.SystemStatements_id },
                success: function(){
                    $("#SystemStatementsGrid").jqxGrid('updatebounddata');
                }
            });
        });
    });
    
    
        
</script>

<?php $this->setPageTitle('Состояние системы'); ?>
<?php
    $this->breadcrumbs=array(
        'Справочники'=>array('/reference/index'),
        'Состояние системы'=>array('index'),
    );
?>

<div class="row">
    <div id="SystemStatementsGrid" class="jqxGridAliton"></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Создать" id='NewSystemStatements' /></div>
    <div class="row-column"><input type="button" value="Изменить" id='EditSystemStatements' /></div>
    <div class="row-column"><input type="button" value="Удалить" id='DelSystemStatements' /></div>
</div>