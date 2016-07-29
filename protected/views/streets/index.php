<script type="text/javascript">
    $(document).ready(function () {      
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var DemDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListStreetsMin, {}));

        $("#StreetsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: true,
                virtualmode: false,
                width: '100%',
                height: '400',
                source: DemDataAdapter,
//                source: DemDataAdapter,
                        /*
                ready: function() {
                    var State = $('#StreetsGrid').jqxGrid('getstate');
                    var Columns = GridState.LoadGridSettings('#StreetsGrid', 'StreetIndex_StreetsGrid');
                    $.extend(true, State.columns, Columns);
                    $('#StreetsGrid').jqxGrid('loadstate', State);    
                    $('#StreetsGrid').jqxGrid({source: DemDataAdapter});
//                }*/
                columns: [
                    { text: 'Регион', dataField: 'RegionName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 },
                    { text: 'Улица', dataField: 'StreetName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 },
                    { text: 'Тип улицы', dataField: 'StreetType', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 },
                ]
        }));
        
        $("#NewStreet").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#EditStreet").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelStreet").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
        $("#StreetsGrid").on('rowselect', function (event) {
            var Temp = $('#StreetsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null};
        });
        
        $('#StreetsGrid').on('rowdoubleclick', function (event) { 
            $("#EditStreet").click();
        });
        
        
        $("#NewStreet").on('click', function ()
        {
            window.open('/index.php?r=Streets/Create');
        });
        
        $("#EditStreet").on('click', function ()
        {
            window.open('/index.php?r=Streets/Update&Street_id=' + CurrentRowData.Street_id);
        });
        
        $("#DelStreet").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=Streets/Delete",
                data: { Street_id: CurrentRowData.Street_id },
                success: function(){
                    $("#StreetsGrid").jqxGrid('updatebounddata');
                }
            });
        });
    });
    
</script>
<?php $this->setPageTitle('Улицы'); ?>
<?php
    $this->breadcrumbs=array(
        'Справочники'=>array('/reference/index'),
        'Улицы'=>array('index'),
    );
?>

<div class="row">
    <div id="StreetsGrid" class="jqxGridAliton"></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Создать" id='NewStreet' /></div>
    <div class="row-column"><input type="button" value="Изменить" id='EditStreet' /></div>
    <div class="row-column"><input type="button" value="Удалить" id='DelStreet' /></div>
</div>

