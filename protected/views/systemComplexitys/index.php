<script type="text/javascript">
    $(document).ready(function () {      
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var DemDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListSystemComplexitysMin, {}));

        $("#SystemComplexitysGrid").jqxGrid(
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
                    var State = $('#SystemComplexitysGrid').jqxGrid('getstate');
                    var Columns = GridState.LoadGridSettings('#SystemComplexitysGrid', 'SystemComplexitysIndex_SystemComplexitysGrid');
                    $.extend(true, State.columns, Columns);
                    $('#SystemComplexitysGrid').jqxGrid('loadstate', State);    
                    $('#SystemComplexitysGrid').jqxGrid({source: DemDataAdapter});
//                }*/
                columns: [
                    { text: 'Сложность системы', dataField: 'SystemComplexitysName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 },
                    { text: 'Коэффициент', dataField: 'Coefficient', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 }
                ]
        }));
        $("#NewSystemComplexitys").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#EditSystemComplexitys").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelSystemComplexitys").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $("#SystemComplexitysGrid").on('rowselect', function (event) {
            var Temp = $('#SystemComplexitysGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null};
        });
        
        $('#SystemComplexitysGrid').on('rowdoubleclick', function (event) { 
            $("#EditSystemComplexitys").click();
        });
        
        
        $("#NewSystemComplexitys").on('click', function ()
        {
            window.open('/index.php?r=SystemComplexitys/Create');
        });
        
        $("#EditSystemComplexitys").on('click', function ()
        {
            window.open('/index.php?r=SystemComplexitys/Update&SystemComplexitys_id=' + CurrentRowData.SystemComplexitys_id);
        });
        
        $("#DelSystemComplexitys").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=SystemComplexitys/Delete",
                data: { SystemComplexitys_id: CurrentRowData.SystemComplexitys_id },
                success: function(){
                    $("#SystemComplexitysGrid").jqxGrid('updatebounddata');
                }
            });
        });
    });
    
    
        
</script>

<?php $this->setPageTitle('Сложность системы'); ?>
<?php
    $this->breadcrumbs=array(
        'Справочники'=>array('/reference/index'),
        'Сложность системы'=>array('index'),
    );
?>

<div class="row">
    <div id="SystemComplexitysGrid" class="jqxGridAliton"></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Создать" id='NewSystemComplexitys' /></div>
    <div class="row-column"><input type="button" value="Изменить" id='EditSystemComplexitys' /></div>
    <div class="row-column"><input type="button" value="Удалить" id='DelSystemComplexitys' /></div>
</div>