<script type="text/javascript">
    
    $(document).ready(function () {
        var CurrentRowData;
        
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
                    $("#edContact").jqxInput({height: 25, width: 600, minLength: 1});
                    $('#edDemandText').jqxTextArea({ placeHolder: 'Текст заявки', height: 90, width: '100%', minLength: 1 });
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
                                { text: 'Дата сообщения', datafield: 'date', width: 150, cellsformat: 'dd.MM.yyyy HH:mm'},
                                { text: 'Администрирующий', datafield: 'EmployeeName', width: 100 },
                                { text: 'План. дата вып.', /* filtertype: 'range' ,*/ datafield: 'plandateexec', width: 150, cellsformat: 'dd.MM.yyyy' },
                                { text: 'Дата вып.', filtertype: 'range', datafield: 'dateexec', width: 150, cellsformat: 'dd.MM.yyyy HH:mm' },
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
        
        $('#Tabs').jqxTabs({ width: '100%', height: '100%', initTabContent: initWidgets});
        
        
        $('#btnDemView').jqxButton({ width: 120, height: 30 });
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
            if (CurrentRowData != undefined) {
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
        });

        $("#DemandsGrid").on('bindingcomplete', function(){
            if (CurrentRowData != undefined) 
                Aliton.SelectRowByIdVirtual('Demand_id', CurrentRowData.Demand_id, '#DemandsGrid', false);
            else Aliton.SelectRowByIdVirtual('Demand_id', null, '#DemandsGrid', false);
            
        });
        
        $("#DemandsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: 'calc(100% - 12px)',
                width: '100%',
                showfilterrow: false,
                autoshowfiltericon: true,
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                virtualmode: true,
                columns:
                    [
                        { text: 'Зарегистрировал', datafield: 'UCreateName', width: 150, cellsrenderer: cellsrenderer },
                        { text: 'Номер', datafield: 'Demand_id', width: 100, cellsrenderer: cellsrenderer },
                        { text: 'Адрес', datafield: 'Address', width: 200, cellsrenderer: cellsrenderer },
                        { text: 'ВИП', datafield: 'VIPName', width: 50, cellsrenderer: cellsrenderer },
                        { text: 'Регистрация', filtertype: 'date', datafield: 'DateReg', width: 150, cellsformat: 'dd.MM.yyyy HH:mm', cellsrenderer: cellsrenderer },
                        { text: 'Передача мастеру', filtertype: 'date', datafield: 'DateMaster', width: 150, cellsformat: 'dd.MM.yyyy HH:mm', cellsrenderer: cellsrenderer }, // 5
                        { text: 'Выполнение', filtertype: 'date', datafield: 'DateExec', width: 150, cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'DATE_EQUAL', cellsrenderer: cellsrenderer },
                        { text: 'Время на вып.', datafield: 'ExceedDays', width: 50, cellsrenderer: cellsrenderer },
                        { text: 'Просрочка', datafield: 'FullOverDay', width: 80, cellsrenderer: cellsrenderer },
                        { text: 'Тип заявки', datafield: 'DemandType', width: 120, cellsrenderer: cellsrenderer },
                        { text: 'Тип заявки ID', datafield: 'DemandType_id', width: 120, hidden: true }, //10
                        { text: 'Тип оборудования', datafield: 'EquipType', width: 120, cellsrenderer: cellsrenderer },
                        { text: 'Неисправность', datafield: 'Malfunction', width: 120, cellsrenderer: cellsrenderer },
                        { text: 'Приоритет', datafield: 'DemandPrior', width: 120, cellsrenderer: cellsrenderer },
                        { text: 'Мастер', datafield: 'MasterName', width: 120, cellsrenderer: cellsrenderer },
                        { text: 'Запл. дата выпол.', filtertype: 'date', datafield: 'PlanDateExec', cellsformat: 'dd.MM.yyyy HH:mm', width: 150, cellsrenderer: cellsrenderer},
                        { text: 'Исполнитель', datafield: 'ExecutorsName', width: 120, cellsrenderer: cellsrenderer },
                        { text: 'Тип обслуживания', datafield: 'ServiceType', width: 120, cellsrenderer: cellsrenderer }, 
                        { text: 'Первоначальный тип', datafield: 'FirstDemandType', width: 120, cellsrenderer: cellsrenderer }, 
                        { text: 'Контакт', datafield: 'Contacts', width: 120, cellsrenderer: cellsrenderer }, // 20
                        { text: 'Неисправность', datafield: 'DemandText', width: 120, cellsrenderer: cellsrenderer },
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
                    ]
        }));
        
        //GridState.StateInitGrid('DemandsGrid', 'DemandsIndex_DemandsGrid');
        
        
         
        
        $('#btnDemView').on('click', function(){
            if (CurrentRowData != undefined)
                Aliton.ViewDemand(CurrentRowData.Demand_id);
        });
        
        $('#DemandsGrid').on('rowdoubleclick', function (event) { 
            $('#btnDemView').click();
        });
    });
    
    
    
</script>
<style>
    .backlight_red {
        color: #FF0000;
    }
    
    .backlight_pink {
        color: #FF00FF;
    }
    
    .jqx-fill-state-pressed .backlight_pink,
    .jqx-fill-state-pressed .backlight_red {
        color: white;
    }
    
    #DemandsGrid .jqx-fill-state-pressed {
        background-color: #2e7d58 !important;
        color: white;
    }
</style>


<div id="GridContainer" style="float: left; width: 100%; height: calc(100% - 240px)">
    <div id="DemandsGrid" class="jqxGridAliton"></div>
</div>    
<div style="clear: both;"></div>
<div style="float: left; width: 100%; height: 200px">
    <div id='Tabs'>
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
    <input type="button" value="Доп-но" id='btnDemView' />
</div>    
<div style="clear: both;"></div>

    


