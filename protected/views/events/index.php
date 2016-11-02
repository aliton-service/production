<script type="text/javascript">
    $(document).ready(function () {
        
        /* Текущая выбранная строка данных */
        var CurrentRowDataClients;
        
        var EventsClients = {
//            docm_id: '<?php // echo $model->docm_id; ?>',
        };
        
        $("#jqxRadioBtnGroupableON").jqxRadioButton($.extend(true, {}, RadioButtonDefaultSettings, { width: 200, checked: true }));
        $("#jqxRadioBtnGroupableOFF").jqxRadioButton($.extend(true, {}, RadioButtonDefaultSettings, { width: 200 }));
        
        $("#jqxRadioBtnGroupableON").on('change', function (event) {
//            clearLog();
            var checked = event.args.checked;
            if (checked) {
                $('#EventsClientsGrid').jqxGrid('hidecolumn', 'fullname');
                $('#EventsClientsGrid').jqxGrid({ groupable: true }); 
            } else if (!checked) {
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
                height: '400',
                width: '100%',
                source: EventsClientsDataAdapter,
                showstatusbar: true,
                statusbarheight: 29,
                showaggregates: true,
                showfilterrow: true,
                autoshowfiltericon: true,
                groupable: true,
                showgroupsheader: false,
                groupsrenderer: groupsrenderer,
                pagesize: 200,
                virtualmode: false,
                columns: [
                    { text: 'Клиент', datafield: 'fullname', minwidth: 250 },
                    { text: 'Адрес', datafield: 'addr', minwidth: 250 },
                    { text: 'Запл.', datafield: 'event_count', width: 50 },
                    { text: 'Невып.', datafield: 'no_exec_event_count', width: 60 },
                ],
                groups: ['fullname']
        }));
        
        
        
        
        var EventTypesDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEventTypes));
        EventTypesDataAdapter.dataBind();

//        console.log(EventTypesDataAdapter.records);

        for (var i = 0; i < EventTypesDataAdapter.records.length; i++) {
            $('#jqxTabsEventsClientsList').append("<li><div style='margin-top: 3px;'>" + EventTypesDataAdapter.records[i].EventType + "</div></li>");
            $('#jqxTabsEventsClients').append('<div id="contentEventsClients' + (i + 1) + '"></div>');
        }
        
        
        $('#EventsGrid').jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: '360px',
                width: '99.5%',
                showstatusbar: true,
                statusbarheight: 29,
                showaggregates: true,
                showfilterrow: false,
                autoshowfiltericon: true,
                groupable: true,
                showgroupsheader: false,
                groupsrenderer: groupsrenderer,
                pagesize: 200,
                virtualmode: false,
                columns: [
                    { text: 'Дата', dataField: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 90 },
                    { text: 'Тип', datafield: 'eventtype', width: 150 },
                    { text: 'Адрес', datafield: 'addr', minwidth: 230 },
                    { text: 'Исполнитель', datafield: 'employeename', width: 100 },
                    { text: 'Выполнение', dataField: 'date_exec', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 90 },
                ]
        }));
        
        
        $("#EventsClientsGrid").on('rowselect', function (event) {
            var Temp = $('#EventsClientsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowDataClients = Temp;
            } else {CurrentRowDataClients = null};
            console.log(CurrentRowDataClients);

            if (CurrentRowDataClients !== null) {
                var GridDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEvents, {}), {
                    formatData: function (data) {
                        $.extend(data, {
                            Filters: ["e.objectgr_id = " + CurrentRowDataClients.objectgr_id + " and o.form_id = " + CurrentRowDataClients.form_id],
                        });
                        return data;
                    },
                });

                $('#EventsGrid').jqxGrid({ source: GridDataAdapter });
            }
        });


        var initWidgets = function (tab) {
                console.log('tab = ' + tab);
            
        };
        
        
        $('#jqxTabsEventsClients').jqxTabs({ width: '100%', height: 37, initTabContent: initWidgets});
            
        
        $("#EventsClientsGrid").on("bindingcomplete", function () {
//            $('#jqxTabsEventsClients').jqxTabs('select', 3);
            $('#EventsClientsGrid').jqxGrid('hidecolumn', 'fullname');
            $('#EventsClientsGrid').jqxGrid('expandallgroups');
            $('#EventsClientsGrid').jqxGrid('selectrow', 0);
        });
      
    });
</script>

<?php $this->setPageTitle('Графики'); ?>


<div class="row">
    <div class="row-column"><div id='jqxRadioBtnGroupableON'>Группировать по клиенту</div></div>
    <div class="row-column"><div id='jqxRadioBtnGroupableOFF'>Убрать группировку</div></div>
</div>

<div class="row" style="display: flex; justify-content: space-between;">
    
    <div class="row-column" style="min-width: 400px; width: 45%; max-width: 900px;"><div id="EventsClientsGrid" class="jqxGridAliton"></div></div>
    
    <div class="row-column" style="min-width: 400px; width: 54.5%; max-width: 900px;">
        <div id='jqxTabsEventsClients'>
            <ul id="jqxTabsEventsClientsList">
                <li>
                    <div style="margin-top: 3px;">
                        Все
                    </div>
                </li>

            </ul>

            <div id='contentEventsClients0'>
            </div>

        </div>
        <div id="EventsGrid" class="jqxGridAliton"></div>
    </div>
</div>

<div id="WHDocumentsDialog" style="display: none;">
    <div id="WHDocumentsDialogHeader">
        <span id="WHDocumentsDialogHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogWHDocumentsContent">
        <div style="" id="BodyWHDocumentsDialog"></div>
    </div>
</div>
