<script type="text/javascript">
    var SN = {};
    var EventsClients = {};
    $(document).ready(function () {
        var CurrentRowEquips;
        
        /* Текущая выбранная строка данных */
        
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
                return '<div class="jqx-grid-groups-row" style="position: absolute;"><span>' + text + '<span style="margin-left: 20px; color: #105287;"> З:' + event_count + '<span style="margin-left: 8px;"> Н:' + no_exec_event_count + '</span></span></span>';
            }
        };
        
        var EventsClientsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEventsClients));
        
        $("#EventsClientsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: '400',
                width: '45%',
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
                    { text: 'Невыпол.', datafield: 'no_exec_event_count', width: 70 },
                ],
                groups: ['fullname']
        }));
        
        $("#EventsClientsGrid").on("bindingcomplete", function () {
            $('#EventsClientsGrid').jqxGrid('hidecolumn', 'fullname');
        });
        
        
        $('#EventsClientsGrid').jqxGrid('selectrow', 0);
        
        var EventTypesDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEventTypes));
        EventTypesDataAdapter.dataBind();
        
//        console.log(EventTypesDataAdapter.records);
        
        var initWidgets = function (tab) {
            for (var i = 0; i < EventTypesDataAdapter.records.length; i++) {
                console.log(EventTypesDataAdapter.records[i]);
                
            }
        };
        
        $('#jqxTabsEventsClients').jqxTabs({ width: '54%', height: 400, initTabContent: initWidgets});
      
    });
</script>

<?php $this->setPageTitle('Графики'); ?>


<div class="row">
    <div class="row-column"><div id='jqxRadioBtnGroupableON'>Группировать по клиенту</div></div>
    <div class="row-column"><div id='jqxRadioBtnGroupableOFF'>Убрать группировку</div></div>
</div>

<div class="row" style="display: flex; justify-content: space-between;">
    
    <div id="EventsClientsGrid" class="jqxGridAliton"></div>
    
    <div id='jqxTabsEventsClients'>
        <ul>
            <li>
                <div style="margin-top: 3px;">
                    Все
                </div>
            </li>
            <li>
                <div style="margin-top: 3px;">
                    Профилактики
                </div>
            </li>
            <li>
                <div style="margin-top: 3px;">
                    Инспекции
                </div>
            </li>
        </ul>

        <div id='contentCostCalcEquips'></div>
        <div id='contentCostCalcWorks'></div>
        <div id='contentCostCalcDocuments'></div>

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
