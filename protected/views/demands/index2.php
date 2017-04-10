<script type="text/javascript">
    var Next_Demand_id = 0;
    $(document).ready(function () {
        var CurrentRowData;
        var ChangeDemand = false;
        
        //window.onblur = function () {document.title='документ неактивен'}
        window.onfocus = function () {
            if (ChangeDemand) {
                $('#edFiltering').click();
                ChangeDemand= false;
            }
        }
            
        var DataExecutorReports = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceExecutorReports, {}), {
            formatData: function (data) {
                var Filter = ["ex.Demand_id = -1"];
                if (CurrentRowData != undefined)
                    Filter = ["ex.Demand_id = " + CurrentRowData.Demand_id];
                $.extend(data, {
                    Filters: Filter,
                });
                return data;
            },
        });
        
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    $("#edContact").jqxInput($.extend(true, {}, InputDefaultSettings, {height: 25, width: 600, minLength: 1}));
                    $('#edDemandText').jqxTextArea($.extend(true, {}, InputDefaultSettings, { placeHolder: 'Текст заявки', height: 90, width: '100%', minLength: 1 }));
                    break;
                case 1:
                    $("#ProgressGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 10px)',
                            width: '100%',
                            source: DataExecutorReports,
                            sortable: false,
                            autorowheight: true,
                            virtualmode: false,
                            pageable: true,
                            showfilterrow: false,
                            filterable: false,
                            columns:
                            [
                                { text: 'Дата сообщения', datafield: 'date', width: 160, cellsformat: 'dd.MM.yyyy HH:mm ddd'},
                                { text: 'Администрирующий', datafield: 'EmployeeName', width: 170 },
                                { text: 'План. дата вып.', /* filtertype: 'range' ,*/ datafield: 'plandateexec', width: 130, cellsformat: 'dd.MM.yyyy ddd' },
                                { text: 'Дата вып.', filtertype: 'range', datafield: 'dateexec', width: 130, cellsformat: 'dd.MM.yyyy HH:mm ddd' },
                                { text: 'Действие', filtertype: 'range', datafield: 'report', width: 250 },
                                { text: 'Исполнители', filtertype: 'range', datafield: 'othername', width: 150 },
                                { text: '№ Заявки', datafield: 'demand_id', width: 100},
                            ]
                    }));
                    break;
            }
        };
        
        $('#Tabs').on('selected', function (event) { 
            var selectedTab = event.args.item;
            if (selectedTab == 1)
                $("#ProgressGrid").jqxGrid('updatebounddata');
        }); 
        
        $('#Tabs').jqxTabs($.extend(true, {}, TabsDefaultSettings, { width: '100%', height: '100%', initTabContent: initWidgets}));
        
        
        $('#btnDemView').jqxButton($.extend(true, {}, ButtonDefaultSettings,{ width: 120, height: 30 }));
        $('#btnRefreshDemands').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnObjectInfo').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $("#btnObjectInfo").on('click', function(){
            Aliton.ViewClient(CurrentRowData.ObjectGr_id);
        });
        $('#btnUndoDemands').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnUndoDemands').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Demands/Undo')) ?>,
                type: 'POST',
                async: false,
                data: {
                    Demand_id: CurrentRowData.Demand_id,
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    if (Res.result === 1) {
                        $('#btnRefreshDemands').click();
                    }
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        // Инициализация гридов - Реестр заявок и ход работы
        var cellsrenderer = function (row, columnfield, value, defaulthtml, columnproperties) {
            var Temp = $('#DemandsGrid').jqxGrid('getrowdata', row);
            var column = $("#DemandsGrid").jqxGrid('getcolumn', columnfield);
                if (column.cellsformat != '') {
                    if ($.jqx.dataFormat) {
                        if ($.jqx.dataFormat.isDate(value)) {
                            value = $.jqx.dataFormat.formatdate(value, column.cellsformat);
                        }   
                        else if ($.jqx.dataFormat.isNumber(value)) {
                            value = $.jqx.dataFormat.formatnumber(value, column.cellsformat);
                        }
                    }
                }
            if ((Temp["DemandPrior_id"] == 1 || Temp["DemandPrior_id"] == 32) && Temp["FullOverDay"] == 0) 
                return '<span class="backlight_pink" style="margin: 4px; float: ' + columnproperties.cellsalign + ';">' + value + '</span>';
            if (Temp["FullOverDay"] !== 0)
                return '<span class="backlight_red" style="margin: 4px; float: ' + columnproperties.cellsalign + ';">' + value + '</span>';
        }
        
        $("#DemandsGrid").on('rowselect', function (event) {
            CurrentRowData = $('#DemandsGrid').jqxGrid('getrowdata', event.args.rowindex);
            var NextRow = $('#DemandsGrid').jqxGrid('getrowdata', (event.args.rowindex + 1));
            if (NextRow != undefined)
                Next_Demand_id = NextRow.Demand_id;
            else
                Next_Demand_id = 0;
            $('#btnUndoDemands').jqxButton({disabled: true});
            if (CurrentRowData != undefined) {
                $('#btnUndoDemands').jqxButton({disabled: !(CurrentRowData.DateExec != null)});
                var SelectedTab = $('#Tabs').jqxTabs('selectedItem');
                switch (SelectedTab) {
                    case 0:
                        $("#edContact").jqxInput('val', CurrentRowData.Contacts);
                        $("#edDemandText").jqxTextArea('val', CurrentRowData.DemandText);
                    break;
                    case 1:
                        $("#ProgressGrid").jqxGrid('updatebounddata');
                    break;
                }
            }
            
            
            
//            var e = $("#pagerDemandsGrid").children();
            
//            console.log(e);
            
//            if ($("#myElemPager").length>0) {
//                var PageInfo =  $("#DemandsGrid").jqxGrid("getpaginginformation");
//                var datainformation = $('#DemandsGrid').jqxGrid('getdatainformation');
//                var rowscount = datainformation.rowscount;
//                //var Str = PageInfo.pagenum ;
//                //var I = Str.indexOf('-');
//                //console.log(Str);
//                $("#myElemPager").html("Запись: " + (event.args.rowindex+1) + " из " + rowscount);
//            }
//            
            
            
        });

        $("#DemandsGrid").on('bindingcomplete', function(){
            if (CurrentRowData != undefined) { 
                if (Next_Demand_id != 0)
                    Aliton.SelectRowByIdVirtual('Demand_id', Next_Demand_id, '#DemandsGrid', false);
                else
                    Aliton.SelectRowByIdVirtual('Demand_id', CurrentRowData.Demand_id, '#DemandsGrid', false);
            }
            else Aliton.SelectRowByIdVirtual('Demand_id', null, '#DemandsGrid', false);
            
        });
        
        $("#DemandsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: 'calc(100% - 12px)',
                width: '100%',
                showfilterrow: false,
                pagermode: 'pagermode',
                //rowsheight: 20,
                //columnsheight: 25,
                autoshowfiltericon: true,
                ready: function(){
                    var State = $('#DemandsGrid').jqxGrid('getstate');
                    var Columns = GridState.LoadGridSettings('DemandsGrid', 'DemandsIndex_DemandsGrid');
                    $.extend(true, State.columns, Columns);
                    $('#DemandsGrid').jqxGrid('loadstate', State);    
                    //$('#DemandsGrid').jqxGrid({source: DemandsAdapter});
                },
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                virtualmode: true,
                columns:
                    [
                        {text: '#', sortable: false, filterable: false, editable: false,
                            groupable: false, draggable: false, resizable: false,
                            datafield: '', columntype: 'number', width: 40,
                            cellsrenderer: function (row, column, value) {
                                return "<div style='margin:4px;'>" + (value + 1) + "</div>";
                            }
                        },
                        { text: 'Зарегистрировал', datafield: 'UCreateName', width: 150, cellsrenderer: cellsrenderer },
                        { text: 'Номер', datafield: 'Demand_id', width: 75, cellsrenderer: cellsrenderer },
                        { text: 'Адрес', datafield: 'Address', width: 250, cellsrenderer: cellsrenderer },
                        { text: 'ВИП', datafield: 'VIPName', width: 45, cellsrenderer: cellsrenderer },
                        { text: 'Регистрация', filtertype: 'date', datafield: 'DateReg', width: 150, cellsformat: 'dd.MM.yyyy HH:mm', cellsrenderer: cellsrenderer },
                        { text: 'Передача мастеру', filtertype: 'date', datafield: 'DateMaster', width: 150, cellsformat: 'dd.MM.yyyy HH:mm', cellsrenderer: cellsrenderer }, // 5
                        { text: 'Выполнение', filtertype: 'date', datafield: 'DateExec', width: 150, cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'DATE_EQUAL', cellsrenderer: cellsrenderer },
                        { text: 'Время на вып.', datafield: 'ExceedDays', width: 50, cellsrenderer: cellsrenderer },
                        { text: 'Просрочка', datafield: 'FullOverDay', width: 80, cellsrenderer: cellsrenderer },
                        { text: 'Тип заявки', datafield: 'DemandType', width: 205, cellsrenderer: cellsrenderer },
                        { text: 'Тип заявки ID', datafield: 'DemandType_id', width: 120, hidden: true }, //10
                        { text: 'Тип оборудования', datafield: 'EquipType', width: 120, cellsrenderer: cellsrenderer },
                        { text: 'Неисправность', datafield: 'Malfunction', width: 120, cellsrenderer: cellsrenderer },
                        { text: 'Приоритет', datafield: 'DemandPrior', width: 120, cellsrenderer: cellsrenderer },
                        { text: 'Мастер', datafield: 'MasterName', width: 120, cellsrenderer: cellsrenderer },
                        { text: 'Запл. дата выпол.', filtertype: 'date', datafield: 'PlanDateExec', cellsformat: 'dd.MM.yyyy HH:mm', width: 150, cellsrenderer: cellsrenderer},
                        { text: 'Исполнитель', datafield: 'ExecutorsName', width: 120, cellsrenderer: cellsrenderer },
                        { text: 'Тип обслуживания', datafield: 'ServiceType', width: 120, cellsrenderer: cellsrenderer }, 
                        { text: 'Первоначальный тип', datafield: 'FirstDemandType', width: 203, cellsrenderer: cellsrenderer }, 
                        { text: 'Контакт', datafield: 'Contacts', width: 600, cellsrenderer: cellsrenderer }, // 20
                        { text: 'Неисправность', datafield: 'DemandText', width: 650, cellsrenderer: cellsrenderer },
                        { text: 'Примечание', datafield: 'Note', width: 120, cellsrenderer: cellsrenderer },
                        { text: 'Район', datafield: 'AreaName', width: 120, cellsrenderer: cellsrenderer }, 
                        { text: 'Изменил', datafield: 'UChangeName', width: 120, cellsrenderer: cellsrenderer },
                        { text: 'Результат', datafield: 'ResultName', width: 120, cellsrenderer: cellsrenderer }, // 25
                        { text: 'Исполнители', datafield: 'OtherName', width: 120, hidden: true },
                        { text: 'Отработка', filtertype: 'date', datafield: 'WorkedOut', width: 150, cellsformat: 'dd.MM.yyyy HH:mm', cellsrenderer: cellsrenderer },
                        { text: 'Object_id', datafield: 'Object_id', width: 120, hidden: true },
                        { text: 'Territ_id', datafield: 'Territ_id', width: 120, hidden: true },
                        { text: 'Street_id', datafield: 'Street_id', width: 120, hidden: true },
                        { text: 'House', datafield: 'House', width: 120, hidden: true }, // 30
                        { text: 'Выполнение(Фильтр)', datafield: 'DateExecFilter', width: 150, cellsformat: 'd', cellsrenderer: cellsrenderer },
                        { text: 'Предельная дата', filtertype: 'date', datafield: 'Deadline', width: 150, cellsformat: 'dd.MM.yyyy HH:mm' /*, cellsrenderer: cellsrenderer */},
                        { text: 'Статус ОП', datafield: 'StatusOPName', width: 120, cellsrenderer: cellsrenderer },
                        { text: 'Исходный приоритет', datafield: 'FirstDemandPrior', width: 120, cellsrenderer: cellsrenderer },
                        { text: 'Инициатор', datafield: 'InitiatorName', width: 120, cellsrenderer: cellsrenderer },
                    ]
        }));
        
        GridState.StateInitGrid('DemandsGrid', 'DemandsIndex_DemandsGrid');
        
        
         
        
        $('#btnDemView').on('click', function(){
            if (CurrentRowData != undefined) {
                Aliton.ViewDemand(CurrentRowData.Demand_id);
                ChangeDemand = true;
            }
        });
        
        $('#btnRefreshDemands').on('click', function(){
            $('#edFiltering').click();
        });
        
        $('#DemandsGrid').on('rowdoubleclick', function (event) { 
            $('#btnDemView').click();
        });
        
        $('#Tabs').css({display: 'block'});
        
        
//        $("#pagerDemandsGrid").find("div:contains('of')").each(function(i, elem) {
//                if ($(this).html().length <= 50)
//                    $(this).attr('id', 'myElemPager');
//                
//            });
    });
    
    
    
</script>
<style>
    .backlight_red {
        color: #FF0000;
    }
    
    .backlight_pink {
        color: #E000E0;
    }
    
    .jqx-fill-state-pressed .backlight_pink,
    .jqx-fill-state-pressed .backlight_red {
        color: black;
    }
    
    #DemandsGrid .jqx-fill-state-pressed {
        background-color: #A7D2BB !important;
        color: black;
    }
</style>



<div id="GridContainer" style="float: left; width: 100%; height: calc(100% - 240px)">
    <div id="DemandsGrid" class="jqxGridAliton"></div>
</div>    
<div style="clear: both;"></div>
<div style="float: left; width: 100%; height: 200px">
    <div id='Tabs' style="display: none">
        <ul>
            <li style="margin-left: 30px;">
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Общая</div>
                </div>
            </li>
            <li>
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Ход работы</div>
                </div>
            </li>
        </ul>
        <div style="overflow: hidden;">
            <div style="padding: 10px;">
                <div>Контакты <input id="edContact" type="text"/></div>
                <div>Неисправность</div>
                <div><textarea id="edDemandText"></textarea></div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px;">
                <div id="ProgressGrid"></div>
            </div>
        </div>
    </div>
</div>    
<div style="clear: both;"></div>
<div style="float: left; width: 100%; height: 30px; padding-top: 10px">
    <div class="al-row-column"><input type="button" value="Доп-но" id='btnDemView' /></div>
    <div class="al-row-column"><input type="button" value="Обновить" id='btnRefreshDemands' /></div>
    <div class="al-row-column"><input type="button" value="Карточка" id='btnObjectInfo' /></div>
    <div class="al-row-column" style="float: right"><input type="button" value="Отменить" id='btnUndoDemands' /></div>
    
</div>    
<div style="clear: both;"></div>

    


