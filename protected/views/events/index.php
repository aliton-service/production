<script type="text/javascript">
    /* Текущая выбранная строка данных */
    var CurrentRowDataClients;
    var CurrentRowDataEvents;
    var EventsClientsDataAdapter;
    var EventTypesDataAdapter;
//    var EventsFiltersDataAdapter;
    var checked;
    
    $(document).ready(function () {
        
        EventsClientsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEventsClients, { id: 'Form_id' , url: '/index.php?r=Events/Clients'}), {
            formatData: function (data) {
                var Variables = {
                    Master: '',
                    EventNoExec: ''
                };
                
                //console.log($("#chbNoExecFilter").val());
                
                if ($('#cmbMaster').val() != '')
                    Variables.Master = " and c.Master = " + $('#cmbMaster').val();
                
                if ($("#chbNoExecFilter").val() != false)
                    Variables.EventNoExec = " and (e.evnt_id is not null and e.date_exec is null)";
                    
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
                $('#EventsClientsGrid').jqxGrid('hidecolumn', 'fullname');
                $('#EventsClientsGrid').jqxGrid({ groupable: true });
                $('#EventsClientsGrid').jqxGrid('expandallgroups');
            } 
            else if (!checked) {
                $('#EventsClientsGrid').jqxGrid('showcolumn', 'fullname');
                $('#EventsClientsGrid').jqxGrid({ groupable: false }); 
            }
        };
        
        $("#jqxRadioBtnGroupableON").on('change', function (event) {
            checked = event.args.checked;
            updateEventsClientsGrid(checked);
        });

//        EventsClientsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEventsClients));
//        EventsClientsDataAdapter.dataBind();
        
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
                    { text: 'Клиент', datafield: 'Fullname', width: 150 },
                    { text: 'Адрес', datafield: 'Addr', width: 100/* minwidth: 250*/ },
                    { text: 'Запл.', datafield: 'EventCount', width: 50 },
                    { text: 'Невып.', datafield: 'NoExecEventCount', width: 60 },
                ],
                groups: ['Fullname']
        }));
        
        EventTypesDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEventTypes));
        EventTypesDataAdapter.dataBind();

        $('#jqxTabsEvents').on('selected', function (event) { 
            Find();
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
//                    { text: 'evnt_id', datafield: 'evnt_id', width: 40, hidden: true },
                    { text: 'Дата', dataField: 'Date', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 90 },
                    { text: 'Тип', datafield: 'EventType', width: 150 },
                    { text: 'evtp_id', datafield: 'Evtp_id', width: 40, hidden: true },
                    { text: 'Адрес', datafield: 'Addr', /* minwidth: 230, */ maxwidth: 400 },
                    { text: 'Исполнитель', datafield: 'EmployeeName', width: 120 },
                    { text: 'Выполнение', dataField: 'DateExec', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 90 },
                    { text: 'ObjectGr_id', datafield: 'ObjectGr_id', width: 60, hidden: true },
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
            
            if (CurrentRowDataClients == undefined)
                $('#EventsClientsGrid').jqxGrid('selectrow', 0);
            
            if (CurrentRowDataClients != undefined) {
               var Val = CurrentRowDataClients.ObjectGr_id;
            } else Val = 0;
            
            var GroupCount = 0;
            var GroupName = null;
            var Index = 0;
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
                    break;
                }
            }
            $('#EventsClientsGrid').jqxGrid('selectrow', Index);
            $('#EventsClientsGrid').jqxGrid('ensurerowvisible', (Index + GroupCount));
        });
        
        
        $("#btnAutoplanning").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160 }));
        $("#btnShowHide").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160 }));
        $("#btnEditEvent").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160 }));
        $("#btnDelEvent").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160 }));
        
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
                    evnt_id: CurrentRowDataEvents.evnt_id,
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
                    evnt_id: CurrentRowDataEvents.evnt_id,
                },
                success: function(){
                    $("#EventsGrid").jqxGrid('updatebounddata');
                }
            });
        });
        
        $('#btnShowHide').on('click', function(){
            var tabIndex1 = $('#jqxTabsEvents').jqxTabs('selectedItem');
            var evtp_id = 0;
            if (tabIndex1 != 0) {
                evtp_id = EventTypesDataAdapter.records[tabIndex1 - 1].evtp_id;
            }
            
            $('#EventsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 250, width: 400, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Events/ShowHide')) ?>,
                type: 'POST',
                async: false,
                data: {
                    ObjectGr_id: CurrentRowDataClients.objectgr_id,
                    Evtp_id: evtp_id,
                },
                success: function(Res) {
                    $('#EventsClientsGrid').jqxGrid('updatebounddata');
                    $('#EventsClientsGrid').jqxGrid('hidecolumn', 'fullname');
                    $('#EventsClientsGrid').jqxGrid({ groupable: true });
                    $('#EventsClientsGrid').jqxGrid('addgroup', 'fullname');
                    $('#EventsClientsGrid').jqxGrid('expandallgroups');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#jqxTabsEvents').jqxTabs('select', 0);
    });
</script>

<style>

    #EventsGrid .jqx-fill-state-pressed,
    #EventsClientsGrid .jqx-fill-state-pressed {
        background-color: #86BFA0 !important;
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
    <div class="al-row-column" style="width: 450px;">
        <div id="EventsClientsGrid" class="jqxGridAliton"></div>
    </div>
    <div class="al-row-column" style="width: calc(100% - 456px)">
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
