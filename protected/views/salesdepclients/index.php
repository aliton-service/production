<script>
    $(document).ready(function () {
        
        // Инициализация источников данных
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {async: false}));
        DataEmployees.dataBind();
        DataEmployees = DataEmployees.records;
        // Инициализируем контролы фильтров
        
        $('#edStatisticsInfo1').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 70}));
        $('#edStatisticsInfo2').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 70}));
        $('#edStatisticsInfo3').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 70}));
        $('#edStatisticsInfo4').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 70}));
        
        $('#SelectSalesManagerDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 340, width: 346, position: 'center',  initContent: function () {
            $("#edSalesManager").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, width: '326', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"})); 
            $("#chbPlan").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 100, height: 25, checked: false})); 
            $("#chbWork").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 100, height: 25, checked: false})); 
            //$("#Calendar").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 120}));
            $("#Calendar").jqxCalendar($.extend(true, {}, CalendarDefaultSettings, {width: 220, height: 220}));
            $('#btnSelectManager').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 100}));
            $('#btnCancelSelectManager').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 100}));
            
            $('#btnCancelSelectManager').on('click', function() {
                $('#SelectSalesManagerDialog').jqxWindow('close');
            });
            
        }}));
        
        
        
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    $("#ClientsGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 2px)',
                            width: 'calc(100% - 2px)',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesizeoptions: ['10', '200', '500', '1000'],
                            pagesize: 200,
                            virtualmode: true,
                            columns:
                                [
                                    { text: 'Номер', datafield: 'Number', width: 100},
                                    { text: 'Наименование', datafield: 'FullName', width: 250},
                                    { text: 'Заявки', datafield: 'Demands', width: 100},
                                    { text: 'Адрес', datafield: 'Address', width: 300},
                                    { text: 'МПОПР', datafield: 'SalesManager', width: 150},
                                    { text: 'Сегмент', datafield: 'SegmentName', width: 100},
                                    { text: 'ПОДСегмент', datafield: 'SubSegmentName', width: 100},
                                    { text: 'Источник', datafield: 'SourceInfoName', width: 100},
                                    { text: 'ПОДИсточник', datafield: 'SubSourceInfoName', width: 100},
                                    { text: 'Бренд', datafield: 'BrandName', width: 100},
                                    
                                    { text: 'Сайт', datafield: 'WWW', width: 200},
                                    { text: 'Кол-во объектов', datafield: 'CountObjects', width: 100},
                                    
                                    { text: 'Статус', datafield: 'StatusName', width: 150},
                                    { text: 'Запл. действие', datafield: 'NextAction', width: 150},
                                    { text: 'Дата посл. контакта', filtertype: 'date', datafield: 'LastDateContact', width: 110, cellsformat: 'dd.MM.yyyy'},
                                    { text: 'Назн. МПОПР', filtertype: 'date', datafield: 'DateChangeSalesManager', width: 110, cellsformat: 'dd.MM.yyyy'},
                                    { text: 'Дата внесения клиента', filtertype: 'date', datafield: 'DateCreate', width: 110, cellsformat: 'dd.MM.yyyy'},

                                ]
                    }));
                    $('#btnCreateClient').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 150}));
                    $('#btnImportClients').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 150}));
                    $('#btnAttachObjects').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 150}));
                    $('#btnCreateDemand').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 150}));
                    $('#btnSetSalesManager').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160, height: 30 }));
                    $('#btnObjectInformation').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnViewDemands').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 140, height: 30 }));
                    $('#btnExport').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 140, height: 30 }));
                    
                    $('#btnSetSalesManager').on('click', function() {
                        $('#SelectSalesManagerDialog').jqxWindow('open');
                    });
                break;
            }
        };
        
        $('#Tabs').jqxTabs({ width: 'calc(100% - 2px)', height: 'calc(100% - 2px)', initTabContent: initWidgets});
        
        
        
    });
</script>

<div class="al-row" >
    <div class="al-row-column">Актуализация</div>
    <div class="al-row-column"><input type="text" id="edStatisticsInfo1" /></div>
    <div class="al-row-column">Сотрудничаем</div>
    <div class="al-row-column"><input type="text" id="edStatisticsInfo2" /></div>
    <div class="al-row-column">В процессе переговоров</div>
    <div class="al-row-column"><input type="text" id="edStatisticsInfo3" /></div>
    <div class="al-row-column">Отказ</div>
    <div class="al-row-column"><input type="text" id="edStatisticsInfo4" /></div>
    <div style="clear: both"></div>
</div>
<div class="al-row" style="height: calc(100% - 45px)">
    <div id='Tabs'>
        <ul>
            <li style="margin-left: 30px;">
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Клиенты</div>
                </div>
            </li>
        </ul>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: 100%">
                <div class="al-row" style="height: calc(100% - 96px)">
                    <div id="ClientsGrid"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column">
                        <div><input type="button" value="Создать клиента" id="btnCreateClient" /></div>
                        <div style="margin-top: 4px"><input type="button" value="Импорт клиентов" id="btnImportClients" /></div>
                    </div>
                    <div class="al-row-column">
                        <div><input type="button" value="Привязать объект" id="btnAttachObjects" /></div>
                        <div style="margin-top: 4px"><input type="button" value="Создать заявку" id="btnCreateDemand" /></div>
                    </div>
                    <div class="al-row-column">
                        <input type="button" value="Назначить МПОПР" id="btnSetSalesManager"/>
                    </div>
                    <div class="al-row-column" style="float: right;">
                        <div class="al-row-column"><input type="button" value="Просмотр КК" id="btnObjectInformation"/></div>
                        <div class="al-row-column"><input type="button" value="Просмотр заявок" id="btnViewDemands"/></div>
                        <div class="al-row-column"><input type="button" value="Экспорт в Excel" id="btnExport"/></div>
                    </div>
                    <div style="clear: both"></div>
                </div>
            </div>
            
        </div>
    </div>
    
</div>

<div id="SelectSalesManagerDialog" style="display: none;">
    <div id="SelectSalesManagerDialogHeader">
        <span id="SelectSalesManagerHeaderText">Назначить МПОПР</span>
    </div>
    <div style="padding: 10px;" id="SelectSalesManagerContent">
        <div style="" id="SelectSalesManagerDialog">
            <div>
                <div class="al-row-column">
                    <div class="al-row-column">
                        <div><div id="edSalesManager"></div></div>
                        <div style="margin-top: 4px">
                            <div class="al-row-column">
                                <div><div id="chbPlan">В ПЛАН</div></div>
                                <div><div id="chbWork">В РАБОТУ</div></div>
                            </div>
                            <div class="al-row-column">
                                <div id="Calendar"></div>
                            </div>
                            <div style="clear: both"></div>
                        </div>

                    </div>
                    <div style="clear: both"></div>
                </div>
                <div style="clear: both"></div>
            </div>
            <div style="margin-top: 4px">
                <div class="al-row-column"><input type="button" id="btnSelectManager" value="Назначить"/></div>
                <div class="al-row-column" style="float: right"><input type="button" id="btnCancelSelectManager" value="Отменить"/></div>
            </div>
        </div>
    </div>
</div>

    