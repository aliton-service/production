<script type="text/javascript">
    $(document).ready(function () {      
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var DemDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListRegionsMin, {}));

        $("#RegionsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: true,
                virtualmode: false,
                width: '100%',
                height: '400',
                source: DemDataAdapter,
                columns: [
                    { text: 'Регион', dataField: 'RegionName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 }
                ]
        }));
        $("#NewRegion").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#EditRegion").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelRegion").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $("#RegionsGrid").on('rowselect', function (event) {
            var Temp = $('#RegionsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null};
        });
        
        $('#RegionsGrid').on('rowdoubleclick', function (event) { 
            $("#EditRegion").click();
        });
        
        
        $("#NewRegion").on('click', function ()
        {
            window.open('/index.php?r=Regions/Create');
        });
        
        $("#EditRegion").on('click', function ()
        {
            window.open('/index.php?r=Regions/Update&Region_id=' + CurrentRowData.Region_id);
        });
        
        $("#DelRegion").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=Regions/Delete",
                data: { Region_id: CurrentRowData.Region_id },
                success: function(){
                    $("#RegionsGrid").jqxGrid('updatebounddata');
                }
            });
        });
    });
    
    
        
</script>

<?php $this->setPageTitle('Регионы'); ?>
<?php
    $this->breadcrumbs=array(
        'Справочники'=>array('/reference/index'),
        'Регионы'=>array('index'),
    );
?>

<div class="row" style="margin: 0;">
    <div id="RegionsGrid" class="jqxGridAliton"></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Создать" id='NewRegion' /></div>
    <div class="row-column"><input type="button" value="Изменить" id='EditRegion' /></div>
    <div class="row-column"><input type="button" value="Удалить" id='DelRegion' /></div>
</div>