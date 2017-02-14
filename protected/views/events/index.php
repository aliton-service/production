<script type="text/javascript">
    /* Текущая выбранная строка данных */
    var CurrentRowDataClients;
    var CurrentRowDataEvents;
    var EventsClientsDataAdapter;
    var EventTypesDataAdapter;
//    var EventsFiltersDataAdapter;
    var checked;
    
    $(document).ready(function () {
        EventTypesDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEventTypes));
        EventTypesDataAdapter.dataBind();
        
        EventsClientsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEventsClients, { id: 'ObjectGr_id' , url: '/index.php?r=Events/Clients'}), {
            formatData: function (data) {
                var Variables = {
                    EventType: '',
                    Master: '',
                    EventNoExec: '',
                    EventExec: '',
                    Vip: '',
                    Count1: '',
                    Count2: '',
                    DatePlan: '',
                    Executor: '',
                    Area: '',
                    Rpfr: '',
                    Territ: '',
                    System: '',
                    DateStart: '',
                    DateEnd: ''
                };
                
                var tabIndex = $('#jqxTabsEvents').jqxTabs('selectedItem'); 
                if (tabIndex != 0 && tabIndex != undefined) {
                    Variables.EventType = " and e.Evtp_id = " + EventTypesDataAdapter.records[tabIndex - 1].evtp_id;
                }
                
                if ($('#cmbMaster').val() != '')
                    Variables.Master = " and c.Master = " + $('#cmbMaster').val();
                
                if ($("#chbNoExecFilter").val() != false)
                    Variables.EventNoExec = " and (e.Evnt_id is not null and e.date_exec is null)";
                
                if ($("#chbExecFilter").val() != false)
                    Variables.EventExec = " and e.date_exec is not null";
                
                if ($("#chbVipFilter").val() != false)
                    Variables.Vip = " and o.sum_price >= 7500";
                
                if ($("#chbNoVipFilter").val() != false)
                    Variables.Vip = " and o.sum_price < 7500";
                
                if ($("#chbCount1Filter").val() != false)
                    Variables.Count1 = " and e.Evnt_id is Not Null";
                
                if ($("#chbCount2Filter").val() != false)
                    Variables.Count2 = " and Count(e.Evnt_id) = 0";
                
                if ($("#edPlanDateFilter").val() != '') 
                    Variables.DatePlan = " and dbo.truncdate(e.Date) = '" + $("#edPlanDateFilter").val() + "'";
                
                if ($('#cmbEmpl').val() != '')
                    Variables.Executor = " and e.Empl_id = " + $('#cmbEmpl').val();
                
                if ($('#edAreaFilter').val() != '')
                    Variables.Area = " and og.Area_id = " + $('#edAreaFilter').val();
                
                if ($('#edReportForm').val() != '')
                    Variables.Rpfr = " and e.Rpfr_id = " + $('#edReportForm').val();
                
                if ($('#edTerrit').val() != '')
                    Variables.Territ = " and c.Territ_id = " + $('#edTerrit').val();
                
                if ($('#edSystemsFilter').val() != '') {
                    var Items = $("#edSystemsFilter").jqxComboBox('getCheckedItems');
                    var ItemsStr = '(';
                    for (var i=0; i < Items.length; i++) {
                        if (ItemsStr == '(')
                            ItemsStr += Items[i].value;
                        else
                            ItemsStr += ', ' + Items[i].value;
                    }
                    ItemsStr += ')';
                    Variables.System = "and exists (" +
                                                "\nSelect 1" +
                                                "\nFrom ObjectsGroupSystems ogs" +
                                                "\nWhere ogs.Availability_id = 1" +
                                                        "\n and ogs.DelDate is Null" +
                                                        "\n and ogs.Sttp_id in " + ItemsStr +
                                                        "\n and ogs.ObjectGr_id = og.ObjectGr_id)";
                                                
                    
                }
                
                if ($('#edDateStartFilter').val() != '')
                    Variables.DateStart = " and dbo.truncdate(e.Date) >= '" + $('#edDateStartFilter').val() + "'";
                
                if ($('#edDateEndFilter').val() != '')
                    Variables.DateEnd = " and dbo.truncdate(e.Date) <= '" + $('#edDateEndFilter').val() + "'";
                
                $.extend(data, {
                    Variables: Variables,
                });
                return data;
            },
        });
        
        
        
        
        $("#jqxRadioBtnGroupableON").jqxRadioButton($.extend(true, {}, RadioButtonDefaultSettings, { width: 200, checked: true }));
        $("#jqxRadioBtnGroupableOFF").jqxRadioButton($.extend(true, {}, RadioButtonDefaultSettings, { width: 200 }));
        
        var updateEventsClientsGrid = function (checked) {
            if (checked) {
                $('#EventsClientsGrid').jqxGrid('hidecolumn', 'Fullname');
                $('#EventsClientsGrid').jqxGrid({ groupable: true });
                $('#EventsClientsGrid').jqxGrid('expandallgroups');
            } 
            else if (!checked) {
                $('#EventsClientsGrid').jqxGrid('showcolumn', 'Fullname');
                $('#EventsClientsGrid').jqxGrid({ groupable: false }); 
            }
        };
        
        $("#jqxRadioBtnGroupableON").on('change', function (event) {
            checked = event.args.checked;
            updateEventsClientsGrid(checked);
        });
        
        var groupsrenderer = function (text, group, expanded, data) 
        {
            if (data.subItems.length > 0) {
                var event_count = data.subItems[0]['EventCount'];
                var no_exec_event_count = data.subItems[0]['NoExecEventCount'];
                return '<div class="jqx-grid-groups-row" style="position: absolute;"><span>' + text + '<span style="margin-left: 10px; color: #105287;"> З:' + event_count + '<span style="margin-left: 5x;"> Н:' + no_exec_event_count + '</span></span></span>';
            }
        };
        
        $("#EventsClientsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: 'calc(100% - 2px)',
                width: 'calc(100% - 2px)',
                source: EventsClientsDataAdapter,
                showstatusbar: true,
                statusbarheight: 29,
                showaggregates: true,
                showfilterrow: false,
                autoshowfiltericon: true,
                groupable: true,
                showgroupsheader: false,
                groupsrenderer: groupsrenderer,
                pageable: false,
                virtualmode: false,
                selectionmode: 'multiplerowsextended',
                columns: [
                    { text: 'Клиент', datafield: 'Fullname', width: 150, hidden: true },
                    { text: 'Адрес', datafield: 'Addr', width: 300/* minwidth: 250*/ },
                    { text: 'Запл.', datafield: 'EventCount', width: 100,
                                
                                aggregates: [{ 'Запл.':
                                        function (aggregatedValue, currentValue) {
                                            return aggregatedValue + currentValue;
                                        }
                                      }]  },
                    { text: 'Невып.', datafield: 'NoExecEventCount', width: 100 },
                ],
                groups: ['Fullname']
        }));
        
        

        $('#jqxTabsEvents').on('selected', function (event) { 
            //Find();
            $('#edFiltering').click();
        });
        
        $('#jqxTabsEvents').jqxTabs({ width: 'calc(100% - 2px)', height: 37 });

        for (var i = 0; i < EventTypesDataAdapter.records.length; i++) {
               $('#jqxTabsEvents').jqxTabs('addLast', EventTypesDataAdapter.records[i].EventType, '');
        }
        
        $("#EventsClientsGrid").on('rowselect', function (event) {
            var Temp = $('#EventsClientsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowDataClients = Temp;
            } else { CurrentRowDataClients = null; };
        });
        
        $('#EventsGrid').on('bindingcomplete', function(){
            $('#EventsGrid').jqxGrid('selectrow', 0);
        });
        
        $('#EventsClientsGrid').on('rowdoubleclick', function (event) { 
            if (CurrentRowDataClients != undefined && CurrentRowDataClients != null) {
                window.open(<?php echo json_encode(Yii::app()->createUrl('Objectsgroup/Index')); ?> + '&ObjectGr_id=' + CurrentRowDataClients.ObjectGr_id);
            }
        });
        
        $('#EventsGrid').jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: 'calc(100% - 2px)',
                width: 'calc(100% - 2px)',
                showstatusbar: true,
                statusbarheight: 29,
                showaggregates: true,
                showfilterrow: false,
                autoshowfiltericon: true,
//                source: EventsFiltersDataAdapter,
                pageable: true,
                virtualmode: true,
                columns: [
//                    { text: 'Evnt_id', datafield: 'Evnt_id', width: 40, hidden: true },
                    { text: 'Дата', dataField: 'Date', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 90 },
                    { text: 'Тип', datafield: 'EventType', width: 150 },
                    { text: 'evtp_id', datafield: 'Evtp_id', width: 40, hidden: true },
                    { text: 'Адрес', datafield: 'Addr', /* minwidth: 230, */ maxwidth: 400 },
                    { text: 'Исполнитель', datafield: 'EmployeeName', width: 120 },
                    { text: 'Выполнение', dataField: 'DateExec', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 90 },
                    { text: 'ObjectGr_id', datafield: 'ObjectGr_id', width: 60, hidden: true },
                    { text: 'Rpfr_id', datafield: 'Rpfr_id', width: 60, hidden: true },
                    
                ]
        }));
        
        $('#EventsGrid').on('rowdoubleclick', function (event) { 
            $("#btnEditEvent").click();
        });
        
        $("#EventsGrid").on('rowselect', function (event) {
            var Temp = $('#EventsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowDataEvents = Temp;
            } else { CurrentRowDataEvents = null; };
            $('#btnEditEvent').jqxButton({disabled: (CurrentRowDataEvents == undefined)})
            $('#btnDelEvent').jqxButton({disabled: (CurrentRowDataEvents == undefined)})
        });
        
        $("#EventsClientsGrid").on("bindingcomplete", function () {
            $('#EventsClientsGrid').jqxGrid('expandallgroups');
            
            var GroupCount = 0;
            var GroupName = null;
            var Index = 0;
            var FindOk = false;
            
            if (CurrentRowDataClients != undefined) {
                var Val = CurrentRowDataClients.ObjectGr_id;
               
                var Rows = $('#EventsClientsGrid').jqxGrid('getrows');
                for (var i = 0; i < Rows.length; i++) {
                    var TmpVal = $('#EventsClientsGrid').jqxGrid('getcellvalue', i, 'ObjectGr_id');
                    var TmpGroup = $('#EventsClientsGrid').jqxGrid('getcellvalue', i, 'Fullname');
                    if (GroupName != TmpGroup) {
                        GroupCount++;
                        GroupName = TmpGroup;
                    }
                    if (TmpVal == Val) {
                        Index = i;
                        FindOk = true;
                        break;
                    }
                }
            } else Val = 0;
            
            CurrentRowDataClients = undefined;
            $('#EventsClientsGrid').jqxGrid('unselectrow', Index);
            $('#EventsClientsGrid').jqxGrid('selectrow', Index);
            if (FindOk)
                $('#EventsClientsGrid').jqxGrid('ensurerowvisible', (Index + GroupCount));
            else
                $('#EventsClientsGrid').jqxGrid('ensurerowvisible', (Index));
        });
        
        
        $("#btnAutoplanning").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160 }));
        $("#btnShowHide").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160, disabled: true }));
        $("#btnEditEvent").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160 }));
        $("#btnDelEvent").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160 }));
        $("#btnPrintEvent").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160 }));
        $("#btnExportClient").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160 }));
        
        $('#btnExportClient').on('click', function() {
            $("#EventsClientsGrid").jqxGrid('exportdata', 'xls', 'Список адресов', true, null, true, <?php echo json_encode(Yii::app()->createUrl('Reports/UpLoadFileGrid'))?>);
        });
        
        $("#btnPrintEvent").on('click', function() {
            window.open(<?php echo json_encode(Yii::app()->createUrl('Reports/ReportOpen', array(
                            'ReportName' => '/Графики/Графики',
                            'Ajax' => false,
                            'Render' => false,
                        ))); ?>);
        });
        
        $('#btnAutoplanning').on('click', function(){
            $('#EventsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 250, width: 400, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Events/Create')) ?>,
                type: 'POST',
                async: false,
                data: {},
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyEventsDialog").html(Res.html);
                    $('#EventsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#btnEditEvent').on('click', function(){
            $('#EventsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 770, width: 990, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Events/Update')) ?>,
                type: 'POST',
                async: false,
                data: {
                    Evnt_id: CurrentRowDataEvents.Evnt_id,
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyEventsDialog").html(Res.html);
                    $('#EventsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $("#btnDelEvent").on('click', function (){
            $.ajax({
                type: "POST",
                url: "/index.php?r=Events/Delete",
                data: { 
                    Evnt_id: CurrentRowDataEvents.Evnt_id,
                },
                success: function(){
                    $("#EventsGrid").jqxGrid('updatebounddata');
                }
            });
        });
        
        $('#btnShowHide').on('click', function(){
//            var tabIndex1 = $('#jqxTabsEvents').jqxTabs('selectedItem');
//            var evtp_id = 0;
//            if (tabIndex1 != 0) {
//                evtp_id = EventTypesDataAdapter.records[tabIndex1 - 1].evtp_id;
//            }
//            
//            $('#EventsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 250, width: 400, position: 'center'}));
//            $.ajax({
//                url: <?php //echo json_encode(Yii::app()->createUrl('Events/ShowHide')) ?>,
//                type: 'POST',
//                async: false,
//                data: {
//                    ObjectGr_id: CurrentRowDataClients.ObjectGr_id,
//                    Evtp_id: evtp_id,
//                },
//                success: function(Res) {
//                    $('#EventsClientsGrid').jqxGrid('updatebounddata');
//                    $('#EventsClientsGrid').jqxGrid('hidecolumn', 'fullname');
//                    $('#EventsClientsGrid').jqxGrid({ groupable: true });
//                    $('#EventsClientsGrid').jqxGrid('addgroup', 'fullname');
//                    $('#EventsClientsGrid').jqxGrid('expandallgroups');
//
//                },
//                error: function(Res) {
//                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
//                }
//            });
        });
        
        $('#jqxTabsEvents').jqxTabs('select', 0);
    });
</script>

<style>

    #EventsGrid .jqx-fill-state-pressed,
    #EventsClientsGrid .jqx-fill-state-pressed {
        background-color: #A7D2BB !important;
        color: black;
    }
</style>

<?php $this->setPageTitle('Графики'); ?>


<div class="al-row" style="margin: 0;">
    <div class="al-row-column"><div id='jqxRadioBtnGroupableON'>Группировать по клиенту</div></div>
    <div class="al-row-column"><div id='jqxRadioBtnGroupableOFF'>Убрать группировку</div></div>
    <div style="clear: both"></div>
</div>
<div class="al-row" style="height: calc(100% - 76px)">
    <div class="al-row-column" style="width: 550px;">
        <div id="EventsClientsGrid" class="jqxGridAliton"></div>
    </div>
    <div class="al-row-column" style="height: 100%; width: calc(100% - 556px);">
        <div style="">
            <div id='jqxTabsEvents'>
                <ul>
                    <li style="margin-left: 20px;">
                        <div>
                            Все
                        </div>
                    </li>
                </ul>
                <div id='contentEvents0'>
                </div>
            </div>
        </div>
        <div class="al-row" style="height: calc(100% - 43px)">
            <div id="EventsGrid" class="jqxGridAliton"></div>
        </div>
    </div>
    <div style="clear: both"></div>
</div>

<div class="al-row">
    <div class="al-row-column" style="width: 450px;">
        <div class="al-row-column"><input type="button" value="Автопланирование" id='btnAutoplanning' /></div>
        <div class="al-row-column"><input type="button" value="Скрыть\Показать" id='btnShowHide' /></div>
    </div>
    
    <div class="al-row-column" style="width: calc(100% - 456px)">
        <div class="al-row-column"><input type="button" value="Изменить" id='btnEditEvent' /></div>
        <div class="al-row-column"><input type="button" value="Печать" id='btnPrintEvent' /></div>
        <div class="al-row-column"><input type="button" value="Экспорт" id='btnExportClient' /></div>
        <div class="al-row-column" style="float: right"><input type="button" value="Удалить" id='btnDelEvent' /></div>
    </div>
    <div style="clear: both"></div>
</div>

    
<div id="EventsDialog" style="display: none;">
    <div id="EventsDialogHeader">
        <span id="EventsDialogHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogEventsContent">
        <div style="" id="BodyEventsDialog"></div>
    </div>
</div>
