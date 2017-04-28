<script type="text/javascript">
    $(document).ready(function () {
        var ObjectsGroup = {
            ObjectGr_id: '<?php echo $ObjectGr_id; ?>'
        };
        
        var initObjectEventsGrid = function () {
            
            var CurrentRowDataEvents;
            
            $('#ObjectEventsNote').jqxTextArea($.extend(true, {}, InputDefaultSettings, { height: 100, width: '99.5%', minLength: 1 }));
            
            var DataObjectEvents = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceObjectEvents, {}), {
                formatData: function (data) {
                    $.extend(data, {
                        Filters: ["e.objectgr_id = " + ObjectsGroup.ObjectGr_id],
                    });
                    return data;
                },
            });
            
//            var groupsrenderer = function (text, group, expanded, data) 
//            {
//                if (data.subItems.length > 0) {
//                    var event_count = data.subItems[0]['EventCount'];
//                    var no_exec_event_count = data.subItems[0]['NoExecEventCount'];
//                    return '<div class="jqx-grid-groups-row" style="position: absolute;"><span>' + text + '<span style="margin-left: 10px; color: #105287;"> З:' + event_count + '<span style="margin-left: 5x;"> Н:' + no_exec_event_count + '</span></span></span>';
//                }
//            };
        
            $("#ObjectEventsGrid").jqxGrid(
                $.extend(true, {}, GridDefaultSettings, {
                    pagesizeoptions: ['10', '200', '500', '1000'],
                    pagesize: 200,
                    showfilterrow: false,
                    virtualmode: false,
                    groupable: true,
                    showgroupsheader: false,
//                    groupsrenderer: groupsrenderer,
                    width: 'calc(100% - 5px)',
                    height: 'calc(100% - 2px)',
                    source: DataObjectEvents,
                    columns: [
                        { text: 'Направление', datafield: 'eventtype', width: 150, hidden: true },
                        { text: 'Дата', dataField: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 120 },
                        { text: 'Исполнитель', dataField: 'employeename', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 160 },
                        { text: 'Дата выполнения', dataField: 'date_exec', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 150 },
                    ],
                    groups: ['eventtype']
                })
            );
            $("#btnEditEvent").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
            
            $("#ObjectEventsGrid").on('rowselect', function (event) {
                CurrentRowDataEvents = $('#ObjectEventsGrid').jqxGrid('getrowdata', event.args.rowindex);
                
                if (CurrentRowDataEvents != undefined) {
//                    console.log(CurrentRowDataEvents);
                    $('#btnEditEvent').jqxButton({disabled: false});
                    $("#ObjectEventsNote").jqxTextArea('val', CurrentRowDataEvents.Note);
                }
            });

            $('#ObjectEventsGrid').on('rowdoubleclick', function (event) {
                $("#btnEditEvent").click();
            });
            
            $('#btnEditEvent').on('click', function(){
                if (CurrentRowDataEvents != undefined) {
                    $('#EventsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 770, width: 990, position: 'center'}));
                    $.ajax({
                        url: <?php echo json_encode(Yii::app()->createUrl('Events/Update')) ?>,
                        type: 'POST',
                        async: false,
                        data: {
                            Evnt_id: CurrentRowDataEvents.evnt_id,
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
                }
            });
        };
        
        var initEventOffers = function () {
            var CurrentRowDataEventEdit;
            
            $('#jqxTabsEventOffers2').jqxTabs({ width: '100%', height: 37});
            
            var tabFilter = function(){
                $("#EventOffersGrid2").jqxGrid('updatebounddata');
                $("#EventOffersGrid2").jqxGrid({
                    groupable: true,
                    showgroupsheader: false,
                    groups: ['offertype']
                });
            };

            var EventOffersDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEventOffers, {async: true}), {
                formatData: function (data) {
                    $.extend(data, {
                        Filters: ["e.objectgr_id = " + ObjectsGroup.ObjectGr_id, "ot.offergroup = " + ($('#jqxTabsEventOffers2').jqxTabs('selectedItem') + 1)],
                    });
                    return data;
                },
            });

            $("#EventOffersGrid2").on("bindingcomplete", function () {
                $('#EventOffersGrid2').jqxGrid('selectrow', 0);
            });

            $("#EventOffersGrid2").jqxGrid(
                $.extend(true, {}, GridDefaultSettings, {
                    pagesizeoptions: ['10', '200', '500', '1000'],
                    pagesize: 200,
                    showfilterrow: false,
                    virtualmode: false,
                    groupable: true,
                    showgroupsheader: false,
                    width: '100%',
                    height: 'calc(100% - 40px)',
                    source: EventOffersDataAdapter,
                    columns: [
                        { text: 'Наименование предложения', dataField: 'offertype', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 220, hidden: true },
                        { text: 'Дата', dataField: 'date', columntype: 'Date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 80 },
                        { text: 'Результат данного предложения', dataField: 'resultname', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 350 },
                        { text: 'Примечание данного предложения', dataField: 'Notec', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                        { text: 'Заявки', dataField: 'demand', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                        { text: 'Исполнитель', dataField: 'emplname', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                    ],
                    groups: ['offertype']
                })
            );


            $('#jqxTabsEventOffers2').on('selected', function (event) {
                tabFilter();
            });
            
            $("#EventOffersGrid2").on('rowselect', function (event) {
                var Temp = $('#EventOffersGrid2').jqxGrid('getrowdata', event.args.rowindex);
                if (Temp !== undefined) {
                    CurrentRowDataEventEdit = Temp;
                } else { CurrentRowDataEventEdit = null; };
            });
            
            $('#btnEditEventOffer').jqxButton($.extend(true, {}, ButtonDefaultSettings));
            
            $('#EventOffersGrid2').on('rowdoubleclick', function (event) { 
                $("#btnEditEventOffer").click();
            });

            $('#btnEditEventOffer').on('click', function(){
                $('#EventOffersDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 460, width: 600, position: 'center'}));
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('EventOffers/UpDate')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        code: CurrentRowDataEventEdit.code,
                        Evnt_id: CurrentRowDataEventEdit.Evnt_id,
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyEventOffersDialog").html(Res.html);
                        $('#EventOffersDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            });
            
            
            
        };
        
        
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    initObjectEventsGrid();
                    break;
                case 1:
                    initEventOffers();
                    break;
            }
        };
        $('#jqxTabsObjectEvents').jqxTabs($.extend(true, {}, TabsDefaultSettings, { width: '99.7%', height: 'calc(100% - 12px)', keyboardNavigation: false, initTabContent: initWidgets }));
        
        
    });
</script>

<div id='jqxTabsObjectEvents'>
    <ul>
        <li style="margin-left: 20px;">
            <div style="height: 15px; margin-top: 3px;">
                <div style="vertical-align: middle; text-align: center; float: left; margin-left: 4px">
                    События
                </div>
            </div>
        </li>
        <li>
            <div style="height: 15px; margin-top: 3px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                    Предложения
                </div>
            </div>
        </li>
    </ul>
    <div style="overflow: auto; height: calc(100% - 2px); padding: 5px;">
        <div class="al-row" style="height: calc(100% - 180px); padding: 0;">
            <div id="ObjectEventsGrid" class="jqxGridAliton"></div>
        </div>
        <div class="al-row">Примечание:</div>
        <div><textarea id="ObjectEventsNote"></textarea></div>
        <div class="al-row"><input type="button" value="Изменить" id='btnEditEvent' /></div>
    </div>

    <div style="overflow: auto; height: calc(100% - 2px); padding: 5px;">
        <div class="al-row" style="height: calc(100% - 50px); padding: 0;">
            <div id='jqxTabsEventOffers2'>
                <ul>
                    <li>Предложения по модернизации</li>
                    <li>Комплексное обслуживание</li>
                    <li>Другие предложения</li>
                </ul>

                <div id='contentEventEdit0'></div>
                <div id='contentEventEdit1'></div>
                <div id='contentEventEdit2'></div>

            </div>
            
            <div id="EventOffersGrid2" class="jqxGridAliton"></div>
        </div>
        <div class="row">
            <input type="button" value="Изменить" id='btnEditEventOffer'/>
        </div>
        
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

<div id="EventOffersDialog" style="display: none;">
    <div id="EventOffersDialogHeader">
        <span id="EventOffersDialogHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogEventOffersContent">
        <div style="" id="BodyEventOffersDialog"></div>
    </div>
</div>