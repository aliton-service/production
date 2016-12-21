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
        
        $('#PriceMonitoringDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '200px', width: '400', position: 'center'}));
        
        $('#PriceMonitoringGrid').on('rowdoubleclick', function (event) { 
            $("#EditPriceMonitoring").click();
        });
        
        $("#PriceMonitoringGrid").on("bindingcomplete", function (event) {
            if (CurrentRowData != undefined) 
                Aliton.SelectRowByIdVirtual('mntr_id', CurrentRowData.mntr_id, '#PriceMonitoringGrid', false);
            else
                Aliton.SelectRowByIdVirtual('mntr_id', null, '#PriceMonitoringGrid', false);
        });
        
        $("#PriceMonitoringGrid").on('rowselect', function (event) {
            CurrentRowData = $('#PriceMonitoringGrid').jqxGrid('getrowdata', event.args.rowindex);
        });
        
        $("#PriceMonitoringGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: true,
                virtualmode: true,
                width: 'calc(100% - 2px)',
                height: 'calc(100% - 2px)',
                source: DemDataAdapter,
                columns: [
                    { text: 'Дата', dataField: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 140 },
                    { text: 'Оборудование', dataField: 'EquipName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 600 },
                    { text: 'Ед.изм.', dataField: 'NameUnitMeasurement', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 60 },
                    { text: 'Поставщик', dataField: 'NameSupplier', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 160 },
                    { text: 'Цена закупки', dataField: 'price', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 110 },
                    { text: 'Цена розницы', dataField: 'price_retail', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 110 },
                    { text: 'Создал', dataField: 'ShortName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 160 },
                    { text: 'Срок поставки', dataField: 'delivery', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 130 },
                ]
        }));
        
        $("#NewPriceMonitoring").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#EditPriceMonitoring").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#ReloadPriceMonitoring").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelPriceMonitoring").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#NewPriceMonitoring').on('click', function(){
            $('#PriceMonitoringDialog').jqxWindow({width: 400, height: 160, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('PriceMonitoring/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyPriceMonitoringDialog").html(Res.html);
                    $('#PriceMonitoringDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $("#NewPriceMonitoring").on('click', function ()
        {
            window.open('/index.php?r=PriceMonitoring/Create');
        });
        
        $("#EditPriceMonitoring").on('click', function ()
        {
            window.open('/index.php?r=PriceMonitoring/Update&mntr_id=' + CurrentRowData.mntr_id);
        });
        
        $("#ReloadPriceMonitoring").on('click', function () {
            $("#PriceMonitoringGrid").jqxGrid('updatebounddata');
        });
        
        $("#DelPriceMonitoring").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=PriceMonitoring/Delete",
                data: { mntr_id: CurrentRowData.mntr_id },
                success: function(){
                    $("#PriceMonitoringGrid").jqxGrid('updatebounddata');
                    $("#PriceMonitoringGrid").jqxGrid('selectrow', 0);
                }
            });
        });
    });
    
</script>

<?php $this->setPageTitle('Мониторинг цен'); ?>


<div class="al-row" style="height: calc(100% - 58px)">
    <div id="PriceMonitoringGrid" class="jqxGridAliton"></div>
</div>

<div class="al-row">
    <div class="al-row-column"><input type="button" value="Создать" id='NewPriceMonitoring' /></div>
    <div class="al-row-column"><input type="button" value="Изменить" id='EditPriceMonitoring' /></div>
    <div class="al-row-column"><input type="button" value="Обновить" id='ReloadPriceMonitoring' /></div>
    <div class="al-row-column" style="float: right"><input type="button" value="Удалить" id='DelPriceMonitoring' /></div>
    <div style="clear: both"></div>
</div>

<div id="PriceMonitoringDialog" style="display: none;">
    <div id="PriceMonitoringDialogHeader">
        <span id="PriceMonitoringHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogPriceMonitoringContent">
        <div style="" id="BodyPriceMonitoringDialog"></div>
    </div>
</div>