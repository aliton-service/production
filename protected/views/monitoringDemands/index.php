<script type="text/javascript">
    $(document).ready(function () {
        
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        $('#jqxTabsMonitoringDemands').jqxTabs({ width: '100%', height: '100%' });
        

        $("#btnPrint").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#btnAcceptEmployeeName").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#btnCancelAcceptance").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160 }));
        $("#Description").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 940, height: 55 }));
        
        
        var MonitoringDemandsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceMonitoringDemands, {
            filter: function () {
                $("#MonitoringDemandsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#MonitoringDemandsGrid").jqxGrid('updatebounddata', 'sort');
            }
        }));
        
        $("#MonitoringDemandsGrid").on('bindingcomplete', function(){
            $('#MonitoringDemandsGrid').jqxGrid('selectrow', 0);
        });
        
        
                    
        $("#MonitoringDemandsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: true,
                width: '99.8%',
                height: '98%',
                source: MonitoringDemandsDataAdapter,
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
        
        
         // Привязка фильтров к гриду
        GridFilters.AddControlFilter('UserCreate', 'jqxComboBox', 'MonitoringDemandsGrid', 'e.Employee_id', 'numericfilter', 0, 'EQUAL', true);
        GridFilters.AddControlFilter('notAcceptedDemands', 'jqxCheckBox', 'MonitoringDemandsGrid', 'DateAccept', 'datefilter', 0, 'NULL', true);
        GridFilters.AddControlFilter('unfulfilledDemands', 'jqxCheckBox', 'MonitoringDemandsGrid', 'DateExec', 'datefilter', 0, 'NULL', true);
        
        GridFilters.AddControlFilter('Number', 'jqxNumberInput', 'MonitoringDemandsGrid', 'mndm_id', 'numericfilter', 0, 'EQUAL', true);
        GridFilters.AddControlFilter('Date', 'jqxDateTimeInput', 'MonitoringDemandsGrid', 'Date', 'datefilter', 0, 'DATE_EQUAL', true);
        GridFilters.AddControlFilter('Prior', 'jqxComboBox', 'MonitoringDemandsGrid', 'Prior', 'numericfilter', 0, 'EQUAL', true);
        
        GridFilters.AddControlFilter('BeginDate', 'jqxDateTimeInput', 'MonitoringDemandsGrid', 'Date', 'datefilter', 0, 'DATE_GREATER_THAN_OR_EQUAL', true);
        GridFilters.AddControlFilter('EndDate', 'jqxDateTimeInput', 'MonitoringDemandsGrid', 'Date', 'datefilter', 0, 'DATE_LESS_THAN_OR_EQUAL', true);
        

        $("#MonitoringDemandsGrid").on('rowselect', function (event) {
            var Temp = $('#MonitoringDemandsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null;}
            
//            console.log(CurrentRowData);
            if (CurrentRowData !== null && CurrentRowData.Description !== null) {
                $("#Description").jqxTextArea('val', CurrentRowData.Description);
            } else {
                $("#Description").jqxTextArea('val', '');
            }
            
            var args = event.args;
            
            if (CurrentRowData !== null) {
                var MonitoringDemandDetailsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceMonitoringDemandDetails, {}), {
                    formatData: function (data) {
                        $.extend(data, {
                            Filters: ["m.mndm_id = " + CurrentRowData.mndm_id],
                        });
                        return data;
                    },
                });

                MonitoringDemandDetailsDataAdapter.dataBind();
                $("#MonitoringDemandDetailsGrid").jqxGrid({source: MonitoringDemandDetailsDataAdapter});
            
            
                if(CurrentRowData.EmplNameAccept !== null) { 
                    $('#btnAcceptEmployeeName').jqxButton({disabled: true }); 
                    if(CurrentRowData.DateExec == null) {
                        $('#btnCancelAcceptance').jqxButton({disabled: false });
                    } else if (CurrentRowData.DateExec !== null) {
                        $('#btnCancelAcceptance').jqxButton({disabled: true });
                    }
                }
                if(CurrentRowData.EmplNameAccept === null) { 
                    $('#btnAcceptEmployeeName').jqxButton({disabled: false });
                    $('#btnCancelAcceptance').jqxButton({disabled: true }); 
                }
            }
        });
        
        $("#btnAcceptEmployeeName").on('click', function () {                
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('MonitoringDemands/Accept');?>",
                type: 'POST',
                async: false,
                data: { mndm_id: CurrentRowData.mndm_id },
                success: function(Res) {
//                    console.log(Res);
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
        
        $('#EditDialog').jqxWindow({initContent: function() {
            $("#btnOk").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#btnCancel").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        }});

        $("#btnCancel").on('click', function () {
            $('#EditDialog').jqxWindow('close');
        });
        
        var SendForm = function() {
            var Data = $('#MonitoringDemands').serialize();
                
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('MonitoringDemands/Insert');?>",
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    if (Res == '1' || Res == 1) {
                        $('#EditDialog').jqxWindow('close');
                        $("#MonitoringDemandsGrid").jqxGrid('updatebounddata');
                        $("#MonitoringDemandsGrid").jqxGrid('selectrow', 0);
                    } else {
                        $('#BodyDialog').html(Res);
                    }

                }
            });
        };

        $("#btnOk").on('click', function () {
            SendForm();
        });
            
        
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
        
        
                            
        $("#MonitoringDemandDetailsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: false,
                width: '99.8%',
                height: '98%',
                columns: [
                    { text: 'Наименование', dataField: 'EquipName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'Ед.изм.', dataField: 'NameUnitMeasurement', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Цена', dataField: 'price', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Описание', dataField: 'Note', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 },
                ]
            })
        );
        
        
        
        
        var headerHeight1 = 60 + 10 + 30 + 10 + 10;
//        var tabsHeight1 = $('.tabs-wrapper').outerHeight();
//        console.log('tabsHeight1 = ' + tabsHeight1);

        var resizeTabs = function() {
            var windowHeight1 = $(window).outerHeight();
            var buttonsHeight = $('.buttons').outerHeight();
            var marginHeight = 15 + 20 + 40;
            
//            console.log('windowHeight1 = ' + windowHeight1);
//            console.log('tabsHeight1 = ' + tabsHeight1);
//            console.log('buttonsHeight = ' + buttonsHeight);
//            console.log('marginHeight = ' + marginHeight);
            
            var newTabsHeight1 = windowHeight1 - buttonsHeight - marginHeight - headerHeight1;
            $('.tabs-wrapper').outerHeight(newTabsHeight1);

//            console.log('newTabsHeight1 = ' + newTabsHeight1);
        };

        $(window).resize(function() {
            resizeTabs();
        });
        resizeTabs();
        
        $(".filter-btn__wrapper").on("click", function () {
            $("#ReloadMonitoringDemands").click();
        });

    });
        
</script>

<?php $this->setPageTitle('Заявки на мониторинг'); ?>


    <div class="tabs-wrapper" style="height: 185px">
        <div id='jqxTabsMonitoringDemands'>
            <ul>
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


            <div id='' style="overflow: hidden; width: 100%;">
                <div class="row" style="margin: 5px; padding: 0;">
                    <div id="MonitoringDemandsGrid" class="jqxGridAliton"></div>
                </div>
            </div>


            <div id='' style="overflow: hidden; width: 100%;">
                <div class="row" style="margin: 5px; padding: 0;">
                    <div id="MonitoringDemandDetailsGrid" class="jqxGridAliton"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row buttons" style=" height: 185px; max-width: 953px; margin: 0; padding: 0;">
        <div class="row"><div class="row-column">Примечание: <textarea readonly="" type="text" id="Description" name="MonitoringDemands[Description]"></textarea></div></div>

        <div class="row">
            <div class="row-column"><input type="button" value="Дополнительно" id='MoreInfoMonitoringDemands' /></div>
            <div class="row-column"><input type="button" value="Новая заявка" id='NewMonitoringDemands' /></div>
            <div class="row-column"><input type="button" value="Принять" id='btnAcceptEmployeeName'/></div>
            <div class="row-column" style="margin-left: 150px;"><input type="button" value="Печатать" id='btnPrint'/></div>
            <div class="row-column" style="float: right;"><input type="button" value="Удалить" id='DelMonitoringDemands' /></div>
        </div>

        <div class="row">
            <div class="row-column"><input type="button" value="Обновить" id='ReloadMonitoringDemands' /></div>
            <div class="row-column" style="float: right;"><input type="button" value="Отменить принятие" id='btnCancelAcceptance' /></div>
        </div>
    </div>


<div id="EditDialog">
    <div id="DialogHeader">
        <span id="HeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogContent">
        <div id="BodyDialog"></div>
        <div id="BottomDialog">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='btnOk' /></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='btnCancel' /></div>
            </div>
        </div>
    </div>
</div>
