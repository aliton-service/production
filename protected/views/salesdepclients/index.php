<script>
    var Statistics = {};
    var DataEmployees;
    var DataSegments;
    var DataSourceInfo;
    var DataSubSourceInfo;
    var DataClientStatus;
    
    $(document).ready(function () {
        var CurrentRowData;
        var CurrentFormTabs = [];
        var Demand;
        var Object;
        Statistics.Refresh = function() {
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('SalesDepClients/StatisticsInfo')); ?>,
                type: 'POST',
                async: true,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $('#edStatisticsInfo1').val(Res.Statistics1);
                    $('#edStatisticsInfo2').val(Res.Statistics2);
                    $('#edStatisticsInfo3').val(Res.Statistics3);
                    $('#edStatisticsInfo4').val(Res.Statistics4);
                }
                
            });
        };
        
        $.ajax({
            url: <?php echo json_encode(Yii::app()->createUrl('AjaxData/DataJQXSimpleList'))?>,
            type: 'POST',
            async: false,
            data: {
                Models: ['ListEmployees', 'ClientGroups', 'SourceInfo', 'SourceInfo', 'ClientStatus']
            },
            success: function(Res) {
                Res = JSON.parse(Res);
                DataEmployees = Res[0].Data;
                DataSegments = Res[1].Data;
                DataSourceInfo = Res[2].Data;
                DataSubSourceInfo = Res[3].Data;
                DataClientStatus = Res[4].Data;
            }
        });
        
        // Инициализация источников данных
//        DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {async: false}));
//        DataEmployees.dataBind();
//        DataEmployees = DataEmployees.records;
        // Инициализируем контролы фильтров
        
        $('#edStatisticsInfo1').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 70}));
        $('#edStatisticsInfo2').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 70}));
        $('#edStatisticsInfo3').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 70}));
        $('#edStatisticsInfo4').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 70}));
        
        var SetManagerCheckedButton = function() {
            if ($('#btnSelectManager').length>0) {
                console.log($("#Calendar").jqxCalendar('value'));
                if ((CurrentRowData != undefined) &&
                    ($("#edSalesManager").val() != '') &&
                    ($("#Calendar").jqxCalendar('value') != null)    
                ) $('#btnSelectManager').jqxButton({disabled: false});
                else $('#btnSelectManager').jqxButton({disabled: true});
            }
        };
        
        $('#SelectSalesManagerDialog').on('open', function() {
            SetManagerCheckedButton();
        });
        
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
            
            $("#edSalesManager").on('select', function() {
                SetManagerCheckedButton();
            });
            
            $("#Calendar").on('change', function() {
                SetManagerCheckedButton();
            });
                
            
            $('#btnSelectManager').on('click', function() {
                var Flag = 0;
                if ($("#chbPlan").jqxCheckBox('checked'))
                    Flag = 1;
                if ($("#chbWork").jqxCheckBox('checked'))
                    Flag = 2;
                var CalendarValue = $("#Calendar").jqxCalendar('value');
                var CalendarValueStr = CalendarValue.getDate() + '.' + (CalendarValue.getMonth()+1) + '.' + CalendarValue.getFullYear();
                
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('SalesDepClients/SetSalesManager')); ?>,
                    type: 'POST',
                    data: {
                        Params: {
                            Form_id: CurrentRowData.Form_id,
                            Empl_id: $("#edSalesManager").val(),
                            Date: CalendarValueStr,
                            Flag: Flag 
                        }
                    },
                    async: true,
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1)
                            $('#edFiltering').click();
                        else
                            Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                        $('#SelectSalesManagerDialog').jqxWindow('close');                            
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            });
            
        }}));
        
        var RefreshClientDetails =  function() {
            var SelectItem = $('#Tabs').jqxTabs('selectedItem');
            var CurrentForm = 0;
            if (CurrentRowData != undefined)
                CurrentForm = CurrentRowData.Form_id;
            switch (SelectItem) {
                case 1:
                    if (CurrentFormTabs[1] != CurrentForm) {
                        $("#ActionsGrid").jqxGrid('updatebounddata');
                        CurrentFormTabs[1] = CurrentForm;
                    }
                break;
                case 2:
                    if (CurrentFormTabs[2] != CurrentForm) {
                        $("#DemandsGrid").jqxGrid('updatebounddata');
                        CurrentFormTabs[2] = CurrentForm;
                    }
                break;
                case 3:
                    if (CurrentFormTabs[3] != CurrentForm) {
                        $("#ObjectsGrid").jqxGrid('updatebounddata');
                        CurrentFormTabs[3] = CurrentForm;
                    }
                break;
            };
        };
        
        $('#Tabs').on('selected', function (event) { 
            RefreshClientDetails();
        }); 
        
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    CurrentFormTabs[0] = 0;
                    $("#ClientsGrid").on('rowselect', function (event) {
                        CurrentRowData = $('#ClientsGrid').jqxGrid('getrowdata', event.args.rowindex);
                        RefreshClientDetails();
                    });
                    
                    $("#ClientsGrid").on('rowdoubleclick', function(){
                        $('#btnObjectInformation').click();
                    });
                    
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
                    
                    $('#btnExport').on('click', function() {
                        $("#ClientsGrid").jqxGrid('exportdata', 'xls', 'Клиенты', true, null, true, <?php echo json_encode(Yii::app()->createUrl('Reports/UpLoadFileGrid'))?>);
                    });
                    
                    $('#btnCreateClient').on('click', function() {
                        $('#EditFormDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {width: 800, height: 600, position: 'center'}));
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('propForms/Create')) ?>,
                            type: 'POST',
                            async: false,
                            success: function(Res) {
                                Res = JSON.parse(Res);
                                $("#BodyEditFormDialog").html(Res.html);
                                $('#EditFormDialog').jqxWindow('open');
                            },
                            error: function(Res) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                            }
                        });
                    });
                    
                    $('#btnObjectInformation').on('click', function() {
                        $('#EditFormDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {width: 800, height: 600, position: 'center'}));
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('propForms/Update')) ?>,
                            type: 'POST',
                            data: {
                                Form_id: CurrentRowData.Form_id,
                            },
                            async: false,
                            success: function(Res) {
                                Res = JSON.parse(Res);
                                $("#BodyEditFormDialog").html(Res.html);
                                $('#EditFormDialog').jqxWindow('open');
                            },
                            error: function(Res) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                            }
                        });
                    });
                    
                    $('#btnAttachObjects').on('click', function(){
                        if (CurrentRowData == undefined) return;
                        $("#EditFormHeaderText").html("Привязать объекты к клиенту: " + CurrentRowData.FullName);
                        $('#EditFormDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {width: 800, height: 600, position: 'center'}));
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('SalesDepClients/SelectObjects')) ?>,
                            type: 'POST',
                            data: {
                                Form_id: CurrentRowData.Form_id,
                            },
                            async: false,
                            success: function(Res) {
                                Res = JSON.parse(Res);
                                $("#BodyEditFormDialog").html(Res.html);
                                $('#EditFormDialog').jqxWindow('open');
                            },
                            error: function(Res) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                            }
                        });
                    });
                break;
                case 1:
                    CurrentFormTabs[1] = 0;
                    var DataActions = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceClientActions, {}), {
                        formatData: function (data) {
                            var Form_id = 0;
                            if (CurrentRowData != undefined)
                                Form_id = CurrentRowData.Form_id;
                            $.extend(data, {
                                Filters: ["er.Form_id = " + Form_id],
                            });
                            return data;
                        },
                    });
                    $("#ActionsGrid").on('rowdoubleclick', function(){
                        //$('#btnObjectInformation').click();
                    });
                    $("#ActionsGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 2px)',
                            width: 'calc(100% - 2px)',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesizeoptions: ['10', '200', '500', '1000'],
                            pagesize: 200,
                            virtualmode: true,
                            source: DataActions,
                            columns:
                                [
                                    { text: '#', sortable: false, filterable: false, editable: false, groupable: false, draggable: false, resizable: false,
                                      datafield: '', columntype: 'number', width: 50,
                                        cellsrenderer: function (row, column, value) {
                                          return "<div style='margin:4px;'>" + (value + 1) + "</div>";
                                        }
                                    },
                                    { text: 'Дата', filtertype: 'date', datafield: 'Date', width: 130, cellsformat: 'dd.MM.yyyy HH:mm'},
                                    { text: 'Сегмент', datafield: 'SegmentName', width: 100},
                                    { text: 'ПОДСегмент', datafield: 'SubSegmentName', width: 100},
                                    { text: 'Заявка', datafield: 'Demand_id', width: 100},
                                    //{ text: 'Заявка', datafield: 'Demand_id', width: 100},
                                    { text: 'Этап', datafield: 'StageName', width: 100},
                                    { text: 'Дата запл. действия', datafield: 'NextDate', width: 110, filtertype: 'date', cellsformat: 'dd.MM.yyyy'},
                                    { text: 'Запл. действие', datafield: 'NextAction', width: 210},
                                ]
                    }));
                break;
                case 2:
                    CurrentFormTabs[2] = 0;
                    var DataDemands = new $.jqx.dataAdapter($.extend(true, {}, Sources.DemandsSource, {url: '/index.php?r=AjaxData/DataJQX&ModelName=Demands'}), {
                        formatData: function (data) {
                            var Form_id = -1;
                            if (CurrentRowData != undefined)
                                Form_id = CurrentRowData.Form_id;
                            $.extend(data, {
                                Filters: ["d.PropForm_id = " + Form_id],
                            });
                            return data;
                        },
                    });
                    $("#DemandsGrid").on('rowselect', function (event) {
                        Demand = $('#DemandsGrid').jqxGrid('getrowdata', event.args.rowindex);
                    });
                    $("#DemandsGrid").on('rowdoubleclick', function(){
                        $('#btnDemandView').click();
                    });
                    $("#DemandsGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 2px)',
                            width: 'calc(100% - 2px)',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesizeoptions: ['10', '200', '500', '1000'],
                            pagesize: 200,
                            virtualmode: true,
                            source: DataDemands,
                            columns:
                                [
                                    { text: 'Номер', datafield: 'Demand_id', width: 100},
                                    { text: 'Дата', filtertype: 'date', datafield: 'DateReg', width: 130, cellsformat: 'dd.MM.yyyy HH:mm'},
                                    { text: 'Адрес', datafield: 'Address', width: 250},
                                    { text: 'Тип', datafield: 'DemandType', width: 150},
                                    { text: 'Приоритет', datafield: 'DemandPrior', width: 150},
                                    { text: 'Дата выполнения', filtertype: 'date', datafield: 'DateExec', width: 130, cellsformat: 'dd.MM.yyyy HH:mm'},
                                ]
                    }));
                    $('#btnDemandView').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 150}));
                    $('#btnDemandView').on('click', function() {
                        if (Demand != undefined)
                            window.open(<?php echo json_encode(Yii::app()->createUrl('Demands/View')) ?> + "&Demand_id=" + Demand.Demand_id);
                    });
                break;
                case 3:
                    CurrentFormTabs[3] = 0;
                    var DataObjects = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListObjects, {}), {
                        formatData: function (data) {
                            var Form_id = -1;
                            if (CurrentRowData != undefined)
                                Form_id = CurrentRowData.Form_id;
                            $.extend(data, {
                                Filters: ["og.PropForm_id = " + Form_id],
                            });
                            return data;
                        },
                    });
                    $("#ObjectsGrid").on('rowselect', function (event) {
                        Object = $('#ObjectsGrid').jqxGrid('getrowdata', event.args.rowindex);
                    });
                    $("#ObjectsGrid").on('rowdoubleclick', function(){
                        $('#btnObjectView').click();
                    });
                    $("#ObjectsGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 2px)',
                            width: 'calc(100% - 2px)',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesizeoptions: ['10', '200', '500', '1000'],
                            pagesize: 200,
                            virtualmode: true,
                            source: DataObjects,
                            columns:
                                [
                                    { text: 'Адрес', datafield: 'Addr', width: 350},
                                    { text: 'Район', datafield: 'AreaName', width: 100 },
                                    { text: 'Тип обслуживания', dataField: 'ServiceType', width: 100 },
                                    { text: 'Мастер', datafield: 'MasterName', width: 180 },
                                    { text: 'Новостройка', datafield: 'year_construction', width: 180 },
                                    { text: 'ВИП', datafield: 'VIP', width: 180 },
                                    { text: 'Участок', dataField: 'Territ_Name', width: 180 },
                                    { text: 'ПМ', dataField: 'ServiceManager', width: 180 },
                                ]
                    }));
                    $('#btnObjectView').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 150}));
                    $('#btnObjectView').on('click', function() {
                        if (Object != undefined)
                            window.open(<?php echo json_encode(Yii::app()->createUrl('Objectsgroup/Index')) ?> + "&ObjectGr_id=" + Object.ObjectGr_id);
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
            <li style="">
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Дейтсвия</div>
                </div>
            </li>
            <li style="">
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Заявки</div>
                </div>
            </li>
            <li style="">
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Объекты</div>
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
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: 100%">
                <div class="al-row" style="height: calc(100% - 62px)">
                    <div id="ActionsGrid"></div>
                </div>
                <div class="al-row">
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: 100%">
                <div class="al-row" style="height: calc(100% - 62px)">
                    <div id="DemandsGrid"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column"><input type="button" id="btnDemandView" value="Просмотр"/></div>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: 100%">
                <div class="al-row" style="height: calc(100% - 62px)">
                    <div id="ObjectsGrid"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column"><input type="button" id="btnObjectView" value="Просмотр"/></div>
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

<div id="EditFormDialog" style="display: none;">
    <div id="EditFormDialogHeader">
        <span id="EditFormHeaderText">Добавлеиние\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="EditFormContent">
        <div style="" id="BodyEditFormDialog"></div>
    </div>
</div>

    