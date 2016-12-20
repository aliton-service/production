<script type="text/javascript">
    $(document).ready(function () {
        
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        
        
        
        
        var initWidgets = function(tab) {
            switch(tab) {
                case 0:
                    $("#MonitoringDemandsGrid").on('bindingcomplete', function(){
                        $('#MonitoringDemandsGrid').jqxGrid('selectrow', 0);
                    });
                    
                    $("#MonitoringDemandsGrid").on('rowselect', function (event) {
                        CurrentRowData = $('#MonitoringDemandsGrid').jqxGrid('getrowdata', event.args.rowindex);
                        if (CurrentRowData != undefined) {
                            $("#Description").jqxTextArea('val', CurrentRowData.Description);
                        }
                    });
                    
                    $("#MonitoringDemandsGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            pagesizeoptions: ['10', '200', '500', '1000'],
                            pagesize: 200,
                            showfilterrow: false,
                            virtualmode: true,
                            width: 'calc(100% - 2px)',
                            height: 'calc(100% - 2px)',
                            //source: MonitoringDemandsDataAdapter,
                            columns: [
                                { text: 'Номер', dataField: 'mndm_id', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 70 },
                                { text: 'Дата', dataField: 'Date', filtertype: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 140 },
                                { text: 'Подал', dataField: 'UserName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 170, filterable: false, sortable: false },
                                { text: 'Prior', dataField: 'Prior', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 50, hidden: true },
                                { text: 'Employee_id', dataField: 'e.Employee_id', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 50, hidden: true },
                                { text: 'Приоритет', dataField: 'DemandPrior', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                                { text: 'Дата принятия', dataField: 'DateAccept', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 140 },
                                { text: 'Принял', dataField: 'EmplNameAccept', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                                { text: 'Дата выполнения', dataField: 'DateExec', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 140 },
                                { text: 'Просрочка', dataField: 'OverDays', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 80 },
                            ]
                        })
                    );
                break;
                case 1:
                    var MonitoringDemandDetailsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceMonitoringDemandDetails, {}), {
                        formatData: function (data) {
                            var V = 0;
                            if (CurrentRowData != undefined)
                                V = CurrentRowData.mndm_id;
                            
                            $.extend(data, {
                                Filters: ["m.mndm_id = " + V],
                            });
                            return data;
                        },
                    });
                    $("#MonitoringDemandDetailsGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            pagesizeoptions: ['10', '200', '500', '1000'],
                            pagesize: 200,
                            showfilterrow: false,
                            virtualmode: false,
                            source: MonitoringDemandDetailsDataAdapter,
                            width: 'calc(100% - 2px)',
                            height: 'calc(100% - 2px)',
                            columns: [
                                { text: 'Наименование', dataField: 'EquipName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                                { text: 'Ед.изм.', dataField: 'NameUnitMeasurement', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                                { text: 'Цена', dataField: 'price', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                                { text: 'Описание', dataField: 'Note', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 },
                            ]
                        })
                    );
                    break;
            }
        };
        
        $('#jqxTabsMonitoringDemands').on('selected', function (event) { 
            var selectedTab = event.args.item;
            if (selectedTab == 1) {
                if (CurrentRowData != undefined) {
                    $("#MonitoringDemandDetailsGrid").jqxGrid('updatebounddata');
                }
            }
        }); 
        
        $('#jqxTabsMonitoringDemands').jqxTabs({ width: 'calc(100% - 2px)', height: 'calc(100% - 2px)', initTabContent: initWidgets });
        

        $("#btnPrint").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#btnAcceptEmployeeName").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#btnCancelAcceptance").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160 }));
        $("#Description").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 'calc(100% - 2px)', height: 55 }));
        
        
        
        
        
        
        
                    
        
        
        
         // Привязка фильтров к гриду
//        GridFilters.AddControlFilter('UserCreate', 'jqxComboBox', 'MonitoringDemandsGrid', 'e.Employee_id', 'numericfilter', 0, 'EQUAL', true);
//        GridFilters.AddControlFilter('notAcceptedDemands', 'jqxCheckBox', 'MonitoringDemandsGrid', 'DateAccept', 'datefilter', 0, 'NULL', true);
//        GridFilters.AddControlFilter('unfulfilledDemands', 'jqxCheckBox', 'MonitoringDemandsGrid', 'DateExec', 'datefilter', 0, 'NULL', true);
//        GridFilters.AddControlFilter('Number', 'jqxNumberInput', 'MonitoringDemandsGrid', 'mndm_id', 'numericfilter', 0, 'EQUAL', true);
//        GridFilters.AddControlFilter('Date', 'jqxDateTimeInput', 'MonitoringDemandsGrid', 'Date', 'datefilter', 0, 'DATE_EQUAL', true);
//        GridFilters.AddControlFilter('Prior', 'jqxComboBox', 'MonitoringDemandsGrid', 'Prior', 'numericfilter', 0, 'EQUAL', true);
//        GridFilters.AddControlFilter('BeginDate', 'jqxDateTimeInput', 'MonitoringDemandsGrid', 'Date', 'datefilter', 0, 'DATE_GREATER_THAN_OR_EQUAL', true);
//        GridFilters.AddControlFilter('EndDate', 'jqxDateTimeInput', 'MonitoringDemandsGrid', 'Date', 'datefilter', 0, 'DATE_LESS_THAN_OR_EQUAL', true);
        

        
        
        $("#btnAcceptEmployeeName").on('click', function () {                
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('MonitoringDemands/Accept');?>",
                type: 'POST',
                async: false,
                data: { mndm_id: CurrentRowData.mndm_id },
                success: function(Res) {
                    $('#btnAcceptEmployeeName').jqxButton({disabled: true });
                    $('#btnCancelAcceptance').jqxButton({disabled: false });
                    $("#MonitoringDemandsGrid").jqxGrid('updatebounddata');
                    $("#MonitoringDemandsGrid").jqxGrid('selectrow', 0);
                }
            });
        });

        $("#btnCancelAcceptance").on('click', function () {                
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('MonitoringDemands/CancelAcceptance');?>",
                type: 'POST',
                async: false,
                data: { mndm_id: CurrentRowData.mndm_id },
                success: function(Res) {
//                    console.log(Res);
                    $('#btnAcceptEmployeeName').jqxButton({disabled: false });
                    $('#btnCancelAcceptance').jqxButton({disabled: true });
                    $("#MonitoringDemandsGrid").jqxGrid('updatebounddata');
                    $("#MonitoringDemandsGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
        
        $('#EditDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '330px', width: '640'}));

        $("#NewMonitoringDemands").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#MoreInfoMonitoringDemands").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 150 }));
        $("#DelMonitoringDemands").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#ReloadMonitoringDemands").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
        
        var LoadFormInsert = function() {
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('MonitoringDemands/Insert');?>",
                type: 'POST',
                async: false,
                data: {},
                success: function(Res) {
                    $('#BodyDialog').html(Res);
                }
            });
        };
        
        $('#MonitoringDemandsGrid').on('rowdoubleclick', function () { 
            $("#MoreInfoMonitoringDemands").click();
        });
        
        
        $("#NewMonitoringDemands").on('click', function () 
        {
            LoadFormInsert();
            $('#EditDialog').jqxWindow('open');
        });
        
        $("#MoreInfoMonitoringDemands").on('click', function ()
        {
            window.open('/index.php?r=MonitoringDemands/Index&mndm_id=' + CurrentRowData.mndm_id);
        });
           
        $("#DelMonitoringDemands").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=MonitoringDemands/Delete",
                data: { mndm_id: CurrentRowData.mndm_id },
                success: function(){
                    $("#MonitoringDemandsGrid").jqxGrid('updatebounddata');
                    $("#MonitoringDemandsGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
        $("#ReloadMonitoringDemands").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=MonitoringDemands/Index",
                success: function(){
                    $("#MonitoringDemandsGrid").jqxGrid('updatebounddata');
                    $("#MonitoringDemandsGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
    });
        
</script>

<?php $this->setPageTitle('Заявки на мониторинг'); ?>


<div class="al-row" style="height: calc(100% - 150px)">
    <div id='jqxTabsMonitoringDemands'>
        <ul style="margin-left: 20px">
            <li>
                <div style="height: 15px; margin-top: 3px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                        Реестр заявок на мониторинг
                    </div>
                </div>
            </li>
            <li>
                <div style="height: 15px; margin-top: 3px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                        Позиции мониторинга
                    </div>
                </div>
            </li>
        </ul>
        <div id='' style="overflow: hidden;">
            <div style="padding: 10px; height: calc(100% - 20px)">
                <div class="al-row" style="height: calc(100% - 8px)">
                    <div id="MonitoringDemandsGrid" class="jqxGridAliton"></div>
                </div>
            </div>    
        </div>


        <div id='' style="overflow: hidden;">
            <div style="padding: 10px; height: calc(100% - 20px)">
                <div class="al-row" style="height: calc(100% - 8px)">
                    <div id="MonitoringDemandDetailsGrid" class="jqxGridAliton"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="al-row">Примечание:</div>
<div class="al-row"><textarea readonly="" type="text" id="Description" name="MonitoringDemands[Description]"></textarea></div>

<div class="al-row">
    <div class="al-row-column"><input type="button" value="Дополнительно" id='MoreInfoMonitoringDemands' /></div>
    <div class="al-row-column"><input type="button" value="Новая заявка" id='NewMonitoringDemands' /></div>
    <div class="al-row-column"><input type="button" value="Обновить" id='ReloadMonitoringDemands' /></div>
    <div class="al-row-column"><input type="button" value="Принять" id='btnAcceptEmployeeName'/></div>
    <div class="al-row-column"><input type="button" value="Печатать" id='btnPrint'/></div>
    <div class="al-row-column" style="float: right;"><input type="button" value="Отменить принятие" id='btnCancelAcceptance' /></div>
    <div class="al-row-column" style="float: right;"><input type="button" value="Удалить" id='DelMonitoringDemands' /></div>
    <div style="clear: both"></div>
</div>

<div id="EditDialog" style="display: none">
    <div id="DialogHeader">
        <span id="HeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogContent">
        <div id="BodyDialog"></div>
    </div>
</div>
