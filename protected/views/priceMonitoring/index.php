<script type="text/javascript">
    $(document).ready(function () {      
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var DemDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListPriceMonitoringMin, {
            filter: function () {
                $("#PriceMonitoringGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#PriceMonitoringGrid").jqxGrid('updatebounddata', 'sort');
            }
        }));

        $("#PriceMonitoringGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: true,
                virtualmode: true,
                width: '100%',
                height: '400',
                source: DemDataAdapter,
                        /*
                ready: function() {
                    var State = $('#PriceMonitoringGrid').jqxGrid('getstate');
                    var Columns = GridState.LoadGridSettings('#PriceMonitoringGrid', 'PriceMonitoringIndex_PriceMonitoringGrid');
                    $.extend(true, State.columns, Columns);
                    $('#PriceMonitoringGrid').jqxGrid('loadstate', State);    
                    $('#PriceMonitoringGrid').jqxGrid({source: DemDataAdapter});
                }*/
                columns: [
                    { text: 'Дата', dataField: 'date', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 190, cellsformat: 'dd.MM.yyyy HH' },
                    { text: 'Оборудование', dataField: 'EquipName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 800 },
                    { text: 'Ед.изм.', dataField: 'NameUnitMeasurement', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 60 },
                    { text: 'Поставщик', dataField: 'NameSupplier', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 160 },
                    { text: 'Цена закупка', dataField: 'price', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 110 },
                    { text: 'Цена розница', dataField: 'price_retail', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 110 },
                    { text: 'Создал', dataField: 'EmployeeName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                    { text: 'Срок поставки', dataField: 'delivery', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 130 },
                ]
        }));
        $("#NewPriceMonitoring").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#EditPriceMonitoring").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelPriceMonitoring").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $("#PriceMonitoringGrid").on('rowselect', function (event) {
            var Temp = $('#PriceMonitoringGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null};
        });
        
        $('#PriceMonitoringGrid').on('rowdoubleclick', function (event) { 
            $("#EditPriceMonitoring").click();
        });
        
        
        $("#NewPriceMonitoring").on('click', function ()
        {
            window.open('/index.php?r=PriceMonitoring/Create');
        });
        
        $("#EditPriceMonitoring").on('click', function ()
        {
            window.open('/index.php?r=PriceMonitoring/Update&mntr_id=' + CurrentRowData.mntr_id);
        });
        
        $("#DelPriceMonitoring").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=PriceMonitoring/Delete",
                data: { mntr_id: CurrentRowData.mntr_id },
                success: function(){
                    $("#PriceMonitoringGrid").jqxGrid('updatebounddata');
                }
            });
        });
    });
    
    
        
</script>

<?php $this->setPageTitle('Мониторинг цен'); ?>
<?php
//    $this->breadcrumbs=array(
//        'Склад'=>array('/reference/index'),
//        'Мониторинг цен'=>array('index'),
//    );
//?>

<h1>Мониторинг цен</h1>

<div class="row">
    <div id="PriceMonitoringGrid" class="jqxGridAliton"></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Создать" id='NewPriceMonitoring' /></div>
    <div class="row-column"><input type="button" value="Изменить" id='EditPriceMonitoring' /></div>
    <div class="row-column"><input type="button" value="Удалить" id='DelPriceMonitoring' /></div>
</div>