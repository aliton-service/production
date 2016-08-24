<script type="text/javascript">
    
    $(document).ready(function () {
        $("#btnShowHideFilter").jqxButton({ width: 120, height: 30 });
         
        $("#btnShowHideFilter").on('click', function () {
            var Display = $("#FilterContainer").css('display');
            if (Display == 'none') {
                $("#FilterContainer").css('display', 'block');
                $("#GridContainer").css('width', '80%');
                $("#DemandsGrid").jqxGrid('refresh');
            }
            else {
                $("#FilterContainer").css('display', 'none');
                $("#GridContainer").css('width', '100%');
                $("#DemandsGrid").jqxGrid('refresh');
            }

        });
        
        var CurrentRowData;
        
        var DemandsAdapter = new $.jqx.dataAdapter($.extend(true, Sources.DemandsSource, {
            filter: function () {
                $("#DemandsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#DemandsGrid").jqxGrid('updatebounddata', 'sort');
            }
        }));
        
        // Присваиваем значения по умолчанию для фильтров
        var DefaultMaster = '<?php echo $Filters['Master']; ?>';
        var DefaultNoDateMaster = '<?php echo $Filters['NoDateMaster']; ?>';
        var DefaultObject = '<?php echo $Filters['Object_id']; ?>';
        var DefaultDateReg = '<?php echo $Filters['DateReg']; ?>';
        var DefaultStreet = '<?php echo $Filters['Street_id']; ?>';
        var DefaultHouse = '<?php echo $Filters['House']; ?>';
        var DefaultNumber = '<?php echo $Filters['Demand_id']; ?>';
        var DefaultDemandType = '<?php echo $Filters['DemandType_id']; ?>';
        var DefaultExecutor = '<?php echo $Filters['Executor']; ?>';
        
        // Создаем фильтры
        var DefaultFilterDateExec = GridFilters.CreateFilterAndFilterGroup('stringfilter', 1, 'true', 'NULL');
        if (DefaultMaster !== '')
            var DefaultFilterMaster = GridFilters.CreateFilterAndFilterGroup('numericfilter', 1, DefaultMaster, 'EQUAL');
        if (DefaultNoDateMaster !== '')
            var DefaultFilterNoDateMaster = GridFilters.CreateFilterAndFilterGroup('datefilter', 1, DefaultNoDateMaster, 'NULL');
        if (DefaultObject !== '')
            var DefaultFilterObject = GridFilters.CreateFilterAndFilterGroup('numericfilter', 1, DefaultObject, 'EQUAL');
        if (DefaultStreet !== '')
            var DefaultFilterStreet = GridFilters.CreateFilterAndFilterGroup('numericfilter', 1, DefaultStreet, 'EQUAL');
        if (DefaultHouse !== '')
            var DefaultFilterHouse = GridFilters.CreateFilterAndFilterGroup('stringfilter', 1, DefaultHouse, 'STR_EQUAL');
        if (DefaultNumber !== '')
            var DefaultFilterNumber = GridFilters.CreateFilterAndFilterGroup('numericfilter', 1, DefaultNumber, 'EQUAL');
        if (DefaultDemandType !== '')
            var DefaultFilterDemandType = GridFilters.CreateFilterAndFilterGroup('numericfilter', 1, DefaultDemandType, 'EQUAL');
        if (DefaultDateReg !== '')
            var DefaultFilterDate = GridFilters.CreateFilterAndFilterGroup('datefilter', 1, DefaultDateReg, 'DATE_EQUAL');
        if (DefaultExecutor !== '')
            var DefaultFilterExecutor = GridFilters.CreateFilterAndFilterGroup('stringfilter', 1, '#' + DefaultExecutor + '#', 'CONTAINS');
        
        // Фильтры храним в массиве, номер ячейки это номер колонке в гриде
        var ColumnsDefaultFilters = [];
        ColumnsDefaultFilters[1] = {filter: DefaultFilterNumber};
        ColumnsDefaultFilters[4] = {filter: DefaultFilterDate};
        ColumnsDefaultFilters[5] = {filter: DefaultFilterNoDateMaster};
        ColumnsDefaultFilters[6] = {filter: DefaultFilterDateExec};
        ColumnsDefaultFilters[10] = {filter: DefaultFilterDemandType};
        ColumnsDefaultFilters[15] = {filter: DefaultFilterMaster};
        ColumnsDefaultFilters[26] = {filter: DefaultFilterExecutor};
        ColumnsDefaultFilters[27] = {filter: DefaultFilterObject};
        ColumnsDefaultFilters[29] = {filter: DefaultFilterStreet};
        ColumnsDefaultFilters[30] = {filter: DefaultFilterHouse};
        
        // Инициализация источников данных
        var DataEmployees = new $.jqx.dataAdapter(Sources.SourceListEmployees);
        var DataDemandTypes = new $.jqx.dataAdapter(Sources.SourceDemandTypes);
        var DataStreets = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceStreets, {async: false}));
        var DataTerritory = new $.jqx.dataAdapter(Sources.SourceTerritory);
        
        // Инициализируем контролы фильтров
        $("#cmbMaster").jqxComboBox({ source: DataEmployees, width: '240', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}); // Фильтр по мастеру
        $("#chbNotDateExec").jqxCheckBox({ width: 160, height: 25, checked: true}); // Фильтр невыполненные
        $("#chbNotDateMaster").jqxCheckBox({ width: 160, height: 25, checked: DefaultNoDateMaster}); // Фильтр непереданные
        $("#chbNotWorkedOut").jqxCheckBox({ width: 160, height: 25, checked: false}); // Фильтр неотработанные
        $("#edDemand_id").jqxInput({height: 25, width: 234, minLength: 1}); // Фильтр номер
        $("#edDate").jqxDateTimeInput({ width: '180px', height: '25px', formatString: 'dd.MM.yyyy HH:mm', value: null, readonly: false}); // Фильтр дата регистрации
        $("#cmbDemandType").jqxComboBox({ source: DataDemandTypes, width: '240', height: '25px', displayMember: "DemandType", valueMember: "DemandType_id"}); // Фильтр тип заявки
        $("#cmbExecutor").jqxComboBox({ source: DataEmployees, width: '240', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}); // Фильтр исполнитель
        $("#edAddr").jqxInput({height: 25, width: 234, minLength: 1}); // Фильтр по адресу
        $("#cmbTerrit").jqxComboBox({ source: DataTerritory, width: '240', height: '25px', displayMember: "Territ_Name", valueMember: "Territ_Id"}); // Фильтр участок
        $("#cmbStreet").jqxComboBox({ source: DataStreets, width: '240', height: '25px', displayMember: "StreetName", valueMember: "Street_id"}); // Фильтр улицы
        $("#edHouse").jqxInput({height: 25, width: 60, minLength: 1}); // Фильтр ДОМ
        $("#edDateStart").jqxDateTimeInput({ width: '180px', height: '25px', formatString: 'dd.MM.yyyy', value: null, readonly: false}); // Фильтр дата рег.
        $("#edDateEnd").jqxDateTimeInput({ width: '180px', height: '25px', formatString: 'dd.MM.yyyy', value: null, readonly: false}); // Фильтр дата рег
        // Все остальные
        $('#Tabs').jqxTabs({ width: '100%', height: 320});
        $("#edContact").jqxInput({height: 25, width: 400, minLength: 1});
        $('#edDemandText').jqxTextArea({ placeHolder: 'Текст заявки', height: 90, width: '100%', minLength: 1 });
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
        
        $("#DemandsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, GridsSettings['DemandsGrid'], {
                height: 400,
                width: '100%',
                showfilterrow: false,
                autoshowfiltericon: true,
                //source: DemandsAdapter,
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize:200,
                virtualmode: true,
                ready: function() {
                    var State = $('#DemandsGrid').jqxGrid('getstate');
                    var Columns = GridState.LoadGridSettings('DemandsGrid', 'DemandsIndex_DemandsGrid');
                    $.extend(true, State.columns, Columns);
                    $('#DemandsGrid').jqxGrid('loadstate', State);    
                    $('#DemandsGrid').jqxGrid({source: DemandsAdapter});

                },
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
                        { text: 'Мастер', datafield: 'Master', width: 120, hidden: true }, // 15
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
                        { text: 'Object_id', datafield: 'Object_id', width: 120, hidden: true },
                        { text: 'Territ_id', datafield: 'Territ_id', width: 120, hidden: true },
                        { text: 'Street_id', datafield: 'Street_id', width: 120, hidden: true },
                        { text: 'House', datafield: 'House', width: 120, hidden: true }, // 30
                        { text: 'Выполнение(Фильтр)', datafield: 'DateExecFilter', width: 150, cellsformat: 'd', cellsrenderer: cellsrenderer },
                    ]
        }, {columns: ColumnsDefaultFilters}));
        
        GridState.StateInitGrid('DemandsGrid', 'DemandsIndex_DemandsGrid');
        $("#ProgressGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, GridsSettings['ProgressGrid'], {
                height: 250,
                width: '100%',
                sortable: false,
                autorowheight: true,
                virtualmode: false,
                pageable: true,
                showfilterrow: false,
                filterable: false,
                //autoshowfiltericon: true,
        }));
        // Проставляем знаячение по умолчанию в фильтрах
        $("#edDemand_id").jqxInput('val', DefaultNumber);
        $("#edDate").jqxDateTimeInput('val', DefaultDateReg);
        $("#cmbDemandType").jqxComboBox('val', DefaultDemandType);
        $("#cmbMaster").jqxComboBox('val', DefaultMaster);
        $("#cmbExecutor").jqxComboBox('val', DefaultExecutor);
        $("#cmbStreet").jqxComboBox('selectItem', DefaultStreet);
        
        // Привязка фильтров к гриду
        GridFilters.AddControlFilter('cmbMaster', 'jqxComboBox', 'DemandsGrid', 'Master', 'numericfilter', 1, 'EQUAL', true);
        GridFilters.AddControlFilter('cmbExecutor', 'jqxComboBox', 'DemandsGrid', 'OtherName', 'stringfilter', 1, 'CONTAINS', true);
        GridFilters.AddControlFilter('chbNotDateMaster', 'jqxCheckBox', 'DemandsGrid', 'DateMaster', 'stringfilter', 1, 'NULL', true);
        GridFilters.AddControlFilter('chbNotDateExec', 'jqxCheckBox', 'DemandsGrid', 'DateExec', 'stringfilter', 1, 'NULL', true);
        GridFilters.AddControlFilter('edDemand_id', 'jqxInput', 'DemandsGrid', 'Demand_id', 'stringfilter', 1, 'EQUAL', true);
        GridFilters.AddControlFilter('edDate', 'jqxDateTimeInput', 'DemandsGrid', 'DateReg', 'stringfilter', 1, 'DATE_EQUAL', true);
        GridFilters.AddControlFilter('cmbDemandType', 'jqxComboBox', 'DemandsGrid', 'DemandType_id', 'numericfilter', 1, 'EQUAL', true);
        GridFilters.AddControlFilter('edAddr', 'jqxInput', 'DemandsGrid', 'Address', 'stringfilter', 1, 'CONTAINS', true);
        GridFilters.AddControlFilter('cmbTerrit', 'jqxComboBox', 'DemandsGrid', 'Territ_id', 'numericfilter', 1, 'EQUAL', true);
        GridFilters.AddControlFilter('cmbStreet', 'jqxComboBox', 'DemandsGrid', 'Street_id', 'numericfilter', 1, 'EQUAL', true);
        GridFilters.AddControlFilter('edHouse', 'jqxInput', 'DemandsGrid', 'House', 'stringfilter', 1, 'STR_EQUAL', true);
        FilterGroupDatePeriod = new $.jqx.filter();
        GridFilters.AddControlFilter('edDateStart', 'jqxDateTimeInput', 'DemandsGrid', 'DateReg', 'datefilter', 1, 'DATE_GREATER_THAN_OR_EQUAL', true, FilterGroupDatePeriod);
        GridFilters.AddControlFilter('edDateEnd', 'jqxDateTimeInput', 'DemandsGrid', 'DateReg', 'datefilter', 1, 'DATE_LESS_THAN_OR_EQUAL', true, FilterGroupDatePeriod);
        // 
        $("#DemandsGrid").on('rowselect', function (event) {
            CurrentRowData = $('#DemandsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (CurrentRowData != undefined) {
                $("#edContact").jqxInput('val', CurrentRowData.Contacts);
                $("#edDemandText").jqxTextArea('val', CurrentRowData.DemandText);

                var DataExecutorReports = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceExecutorReports, {}), {
                    formatData: function (data) {
                        $.extend(data, {
                            Filters: ["ex.Demand_id = " + CurrentRowData.Demand_id],
                        });
                        return data;
                    },
                });
                DataExecutorReports.dataBind();
                $("#ProgressGrid").jqxGrid({source: DataExecutorReports});
            }
        });
        
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
    
    .jqx-fill-state-pressed .backlight_pink {
        color: black;
    }
    .jqx-fill-state-pressed .backlight_red {
        color: black;
    }
</style>
<div><input type="button" value="Фильтры" id='btnShowHideFilter' /></div>
<div style="clear: both;"></div>
<div style="float: left; margin-top: 20px; width: 100%">
    <div id="FilterContainer" style="float: left; display: none; width: 20%; min-height: 400px; max-width: 250px;">
        <div>Мастер</div>
        <div><div id='cmbMaster'><?php echo $Filters['Master']; ?></div></div>
        <div id='chbNotDateMaster'>Непереданные</div>
        <div id='chbNotDateExec'>Невыполненные</div>
        <div id='chbNotWorkedOut'>Неотработанные</div>
        <div>Номер</div>
        <div><input name="Demands[Demand_id]" id="edDemand_id" type="text" value="<?php echo $Filters['Demand_id'];?>"/></div>
        <div>Дата регистрации</div>
        <div><div id='edDate' name="Demands[DateReg]"></div></div>
        <div>Тип заявки</div>
        <div id='cmbDemandType' name="Demands[DType_id]"><?php echo $Filters['DemandType_id']; ?></div>
        <div>Исполнитель</div>
        <div><div id='cmbExecutor'><?php echo $Filters['Executor']; ?></div></div>
        <div>Адрес</div>
        <div><input id="edAddr" type="text" /></div>
        <div>Участок</div>
        <div><div id='cmbTerrit'></div></div>
        <div>Улица</div>
        <div><div id='cmbStreet'></div></div>
        <div>Дом</div>
        <div><input name="Demands[Demand_id]" id="edHouse" type="text" value="<?php echo $Filters['House'];?>"/></div>
        <div>Период с</div>
        <div><div id='edDateStart'></div></div>
        <div>по</div>
        <div><div id='edDateEnd'></div></div>
    </div>
    <div id="GridContainer" style="float: left; width: 100%">
        <div id="DemandsGrid" class="jqxGridAliton"></div>
        <div style="clear: both;"></div>
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
                    <div>Контакты</div>
                    <div><input id="edContact" type="text"/></div>
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
        <div style="clear: both;"></div>
        <input type="button" value="Доп-но" id='btnDemView' />
    </div>
</div>

