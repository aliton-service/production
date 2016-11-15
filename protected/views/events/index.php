<script type="text/javascript">
    /* Текущая выбранная строка данных */
    var CurrentRowDataClients;
    var CurrentRowDataEvents;
    
    $(document).ready(function () {
        
        $("#jqxRadioBtnGroupableON").jqxRadioButton($.extend(true, {}, RadioButtonDefaultSettings, { width: 200, checked: true }));
        $("#jqxRadioBtnGroupableOFF").jqxRadioButton($.extend(true, {}, RadioButtonDefaultSettings, { width: 200 }));
        
        $("#jqxRadioBtnGroupableON").on('change', function (event) {
//            clearLog();
            var checked = event.args.checked;
            if (checked) {
                $('#EventsClientsGrid').jqxGrid('hidecolumn', 'fullname');
                $('#EventsClientsGrid').jqxGrid({ groupable: true }); 
            } 
            else if (!checked) {
                $('#EventsClientsGrid').jqxGrid('showcolumn', 'fullname');
                $('#EventsClientsGrid').jqxGrid({ groupable: false }); 
            }
        });
        
        
        var groupsrenderer = function (text, group, expanded, data) 
        {
            if (data.subItems.length > 0) {
                var event_count = data.subItems[0]['event_count'];
                var no_exec_event_count = data.subItems[0]['no_exec_event_count'];
                return '<div class="jqx-grid-groups-row" style="position: absolute;"><span>' + text + '<span style="margin-left: 10px; color: #105287;"> З:' + event_count + '<span style="margin-left: 5x;"> Н:' + no_exec_event_count + '</span></span></span>';
            }
        };
        
        var EventsClientsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEventsClients));
        
        $("#EventsClientsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: '700',
                width: '100%',
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
                columns: [
                    { text: 'Клиент', datafield: 'fullname', minwidth: 250 },
                    { text: 'Адрес', datafield: 'addr', minwidth: 250 },
                    { text: 'Запл.', datafield: 'event_count', width: 50 },
                    { text: 'Невып.', datafield: 'no_exec_event_count', width: 60 },
                ],
                groups: ['fullname']
        }));
        
        $('#EventsClientsGrid').jqxGrid({ selectionmode: 'multiplerowsextended'}); 
        
        var EventTypesDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEventTypes));
        EventTypesDataAdapter.dataBind();


        $('#jqxTabsEvents').jqxTabs({ width: '99.5%', height: 37 });

        for (var i = 0; i < EventTypesDataAdapter.records.length; i++) {
               $('#jqxTabsEvents').jqxTabs('addLast', EventTypesDataAdapter.records[i].EventType, '');
        }
        
        $("#EventsClientsGrid").on('rowselect', function (event) {
            var Temp = $('#EventsClientsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowDataClients = Temp;
            } else { CurrentRowDataClients = null; };
//            console.log(CurrentRowDataClients);
        });
        
        $('#EventsGrid').jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: '660px',
                width: '99.5%',
                showstatusbar: true,
                statusbarheight: 29,
                showaggregates: true,
                showfilterrow: false,
                autoshowfiltericon: true,
                pageable: true,
                virtualmode: true,
                columns: [
                    { text: 'evnt_id', datafield: 'evnt_id', width: 40, hidden: true },
                    { text: 'Дата', dataField: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 90 },
                    { text: 'Тип', datafield: 'eventtype', width: 150 },
                    { text: 'evtp_id', datafield: 'evtp_id', width: 40, hidden: true },
                    { text: 'Адрес', datafield: 'addr', minwidth: 230, maxwidth: 400 },
                    { text: 'Исполнитель', datafield: 'employeename', width: 120 },
                    { text: 'Выполнение', dataField: 'date_exec', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 90 },
                    { text: 'objectgr_id', datafield: 'objectgr_id', width: 60, hidden: true },
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
//            console.log(CurrentRowDataEvents);
            $('#btnEditEvent').jqxButton({disabled: (CurrentRowDataEvents == undefined)})
            $('#btnDelEvent').jqxButton({disabled: (CurrentRowDataEvents == undefined)})
        });
        
        $("#EventsClientsGrid").on("bindingcomplete", function () {
            $('#EventsClientsGrid').jqxGrid('hidecolumn', 'fullname');
            $('#EventsClientsGrid').jqxGrid('expandallgroups');
            $('#EventsClientsGrid').jqxGrid('selectrow', 0);
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
                data: {
                    objectgr_id: CurrentRowDataClients.objectgr_id,
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
        
        $('#btnEditEvent').on('click', function(){
            $('#EventsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 770, width: 970, position: 'center'}));
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
                    objectgr_id: CurrentRowDataClients.objectgr_id,
                    evtp_id: evtp_id,
                },
                success: function(Res) {
                    $('#EventsClientsGrid').jqxGrid('updatebounddata');
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


<div class="row" style="margin: 0;">
    <div class="row-column"><div id='jqxRadioBtnGroupableON'>Группировать по клиенту</div></div>
    <div class="row-column"><div id='jqxRadioBtnGroupableOFF'>Убрать группировку</div></div>
</div>

<div class="row" style="display: flex; justify-content: flex-start;">
    
    <div class="row-column" style="min-width: 400px; width: 45%; max-width: 700px;"><div id="EventsClientsGrid" class="jqxGridAliton"></div></div>
    
    <div class="row-column" style="min-width: 400px; width: 60%; max-width: 1700px;">
        <div id='jqxTabsEvents'>
            <ul>
                <li>
                    <div>
                        Все
                    </div>
                </li>
            </ul>

            <div id='contentEvents0'>
            </div>

        </div>
        <div id="EventsGrid" class="jqxGridAliton"></div>
    </div>
</div>

<div class="row" style="display: flex; justify-content: flex-start;">
    
    <div class="row-column" style="min-width: 400px; width: 45%; max-width: 700px;">
        <div class="row-column"><input type="button" value="Автопланирование" id='btnAutoplanning' /></div>
        <div class="row-column"><input type="button" value="Скрыть\Показать" id='btnShowHide' /></div>
    </div>
    
    <div class="row-column" style="display: flex; justify-content: space-between; min-width: 400px; width: 60%; max-width: 1700px;">
        <div class="row-column"><input type="button" value="Изменить" id='btnEditEvent' /></div>
        <div class="row-column"><input type="button" value="Удалить" id='btnDelEvent' /></div>
    </div>
</div>

<div id="EventsDialog" style="display: none;">
    <div id="EventsDialogHeader">
        <span id="EventsDialogHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogEventsContent">
        <div style="" id="BodyEventsDialog"></div>
    </div>
</div>
