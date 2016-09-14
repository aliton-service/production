<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var EmplDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEmployees, {
            filter: function () {
                $("#EmployeesGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#EmployeesGrid").jqxGrid('updatebounddata', 'sort');
            }
        }));
        
        var NoteRender = function (row, columnfield, value, defaulthtml, columnproperties) {
            var Temp = $('#EmployeesGrid').jqxGrid('getrowdata', row);
            return Temp.Note;
        };
        
        var SourceFilter = [{id: 1, Name: 'Работающие'}, {id: 2, Name: 'Уволенные'}];
        
        $("#edFIO").jqxInput({height: 25, width: 234, minLength: 1}); 
        $("#edFilter").jqxComboBox({ source: SourceFilter, width: '160', height: '25px', displayMember: "Name", valueMember: "id"}); // Фильтр тип заявки
        $('#btnAddEmpl').jqxButton({ width: 120, height: 30 });
        $('#btnEditEmpl').jqxButton({ width: 120, height: 30 });
        $('#btnExportEmpl').jqxButton({ width: 120, height: 30 });
        $('#btnDelEmpl').jqxButton({ width: 120, height: 30 });
        $('#btnRefreshEmpl').jqxButton({ width: 120, height: 30 });
        
        $('#EmployeesDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '780px', width: '740', position: 'center'}));
        
        $('#btnAddEmpl').on('click', function(){
            $('#EmployeesDialog').jqxWindow({height: '780px', width: '740', position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Employees/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    $("#BodyEmployeesDialog").html(Res);
                }
            });
            $('#EmployeesDialog').jqxWindow('open');
        });
        
        $('#btnEditEmpl').on('click', function(){
            if (CurrentRowData.Employee_id != undefined) {
                $('#EmployeesDialog').jqxWindow({height: '780px', width: '740', position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Employees/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Employee_id: CurrentRowData.Employee_id
                    },
                    success: function(Res) {
                        $("#BodyEmployeesDialog").html(Res);
                        $('#EmployeesDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnDelEmpl').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Employees/Delete')) ?>,
                type: 'POST',
                async: false,
                data: { Employee_id: CurrentRowData.Employee_id},
                success: function(Res) {
                    $('#btnRefreshEmpl').click();
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_DEL'], Res.responseText);
                }
            });
        });
        
        $('#btnRefreshEmpl').on('click', function(){
            var rowindex = $('#EmployeesGrid').jqxGrid('getselectedrowindex');
            $('#EmployeesGrid').jqxGrid('updatebounddata');
            $('#EmployeesGrid').jqxGrid('selectrow', rowindex);
        });
        
        $('#btnExportEmpl').on('click', function(){
            //$("#EmployeesGrid").jqxGrid('exportdata', 'xls', 'EmployeesGrid');
        });
        
        var initWidgets = function(tab) {
            switch(tab) {
                case 0:
                    $("#edAddress").jqxInput({height: 25, width: 250, minLength: 1}); 
                    $("#edAddr").jqxInput({height: 25, width: 250, minLength: 1}); 
                    $("#edTelHome").jqxInput({height: 25, width: 190, minLength: 1}); 
                    $("#edTelWork").jqxInput({height: 25, width: 235, minLength: 1}); 
                    $("#edTelOther").jqxInput({height: 25, width: 190, minLength: 1}); 
                    $("#edWorkEmail").jqxInput({height: 25, width: 250, minLength: 1});
                    $("#edEmail").jqxInput({height: 25, width: 250, minLength: 1});
                    $('#edInfo').jqxTextArea({ height: 50, width: '100%', minLength: 1 });
                    $('#edDoc').jqxTextArea({ height: 50, width: '100%', minLength: 1 });
                    $('#edNote').jqxTextArea({ height: 50, width: '100%', minLength: 1 });
                    break;
                case 1:
                    $('#btnAddChildren').jqxButton({ width: 120, height: 30 });
                    $('#btnEditChildren').jqxButton({ width: 120, height: 30 });
                    $('#btnRefreshChildren').jqxButton({ width: 120, height: 30 });
                    $('#btnDelChildren').jqxButton({ width: 120, height: 30 });
                    
                    $('#btnAddChildren').on('click', function(){
                        if (CurrentRowData != undefined) {
                            $('#EmployeesDialog').jqxWindow({width: 400, height: 200, position: 'center'});
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('Childrens/Create')) ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    Employee_id: CurrentRowData.Employee_id
                                },
                                success: function(Res) {
                                    $("#BodyEmployeesDialog").html(Res);
                                    $('#EmployeesDialog').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });
                        }
                    });
                    
                    $('#btnEditChildren').on('click', function(){
                        if (CurrentRowData != undefined) {
                            $('#EmployeesDialog').jqxWindow({width: 400, height: 200, position: 'center'});
                            var Row = $('#ChildsGrid').jqxGrid('getrowdata', $('#ChildsGrid').jqxGrid('getselectedrowindex'));
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('Childrens/Update')) ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    Children_id: Row.Children_id
                                },
                                success: function(Res) {
                                    $("#BodyEmployeesDialog").html(Res);
                                    $('#EmployeesDialog').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });
                        }
                    });
                    
                    $('#btnRefreshChildren').on('click', function(){
                        $('#ChildsGrid').jqxGrid('updatebounddata');
                    });
                break;
                case 2:
                    $('#btnAddInstr').jqxButton({ width: 120, height: 30 });
                    $('#btnEditInstr').jqxButton({ width: 120, height: 30 });
                    $('#btnRefreshInstr').jqxButton({ width: 120, height: 30 });
                    $('#btnDelInstr').jqxButton({ width: 120, height: 30 });
                    
                    $('#btnAddInstr').on('click', function(){
                        if (CurrentRowData != undefined) {
                            $('#EmployeesDialog').jqxWindow({width: 600, height: 300, position: 'center'});
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('Instructings/Create')) ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    Employee_id: CurrentRowData.Employee_id
                                },
                                success: function(Res) {
                                    $("#BodyEmployeesDialog").html(Res);
                                    $('#EmployeesDialog').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });
                        }
                    });
                    
                    $('#btnEditInstr').on('click', function(){
                        if (CurrentRowData != undefined) {
                            $('#EmployeesDialog').jqxWindow({width: 600, height: 300, position: 'center'});
                            var Row = $('#InstrGrid').jqxGrid('getrowdata', $('#InstrGrid').jqxGrid('getselectedrowindex'));
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('Instructings/Update')) ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    Instructing_id: Row.Instructing_id
                                },
                                success: function(Res) {
                                    $("#BodyEmployeesDialog").html(Res);
                                    $('#EmployeesDialog').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });
                        }
                    });
                    
                    $('#btnRefreshInstr').on('click', function(){
                        $('#InstrGrid').jqxGrid('updatebounddata');
                    });
                break;
            }
        };
        $('#Tabs').jqxTabs({ width: '100%', height: 320, initTabContent: initWidgets});
        
        $('#ChildsGrid').on('rowdoubleclick', function (event) { 
            $("#btnEditChildren").click();
        });
        
        $("#ChildsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: false,
                virtualmode: false,
                width: '100%',
                height: '218',
                columns: [
                    { text: 'Дата добавления', filtertype: 'date', datafield: 'DateCreate', filtercondition: 'DATE_EQUAL', width: 120, cellsformat: 'dd.MM.yyyy HH:mm'},    
                    { text: 'Фамилия Имя Отчество', dataField: 'ChildrenName', columntype: 'textbox', filtercondition: 'CONTAINS', width: 250},
                    { text: 'Дата рождения', filtertype: 'date', datafield: 'BirthDay', filtercondition: 'DATE_EQUAL', width: 120, cellsformat: 'dd.MM.yyyy'},
                    { text: 'Полных лет', dataField: 'Age', columntype: 'textbox', filtercondition: 'CONTAINS', width: 100},
                ]

        }));
        
        $('#InstrGrid').on('rowdoubleclick', function (event) { 
            $("#btnEditInstr").click();
        });
        
        $("#InstrGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: false,
                virtualmode: false,
                width: '100%',
                height: '218',
                columns: [
                    { text: 'Дата проведения', filtertype: 'date', datafield: 'Date', filtercondition: 'DATE_EQUAL', width: 120, cellsformat: 'dd.MM.yyyy HH:mm'},    
                    { text: 'Наименование', dataField: 'Name', columntype: 'textbox', filtercondition: 'CONTAINS', width: 250},
                    { text: 'Исполнитель', datafield: 'EmployeeName', filtercondition: 'CONTAINS', width: 120},
                    { text: 'Примечание', dataField: 'Note', columntype: 'textbox', filtercondition: 'CONTAINS', width: 100},
                ]

        }));
        
        $("#EmployeesGrid").on('rowselect', function (event) {
            CurrentRowData = $('#EmployeesGrid').jqxGrid('getrowdata', event.args.rowindex);
            $('#edInfo').jqxTextArea('val', ''); 
            $('#edNote').jqxTextArea('val', ''); 
            $('#edDoc').jqxTextArea('val', ''); 
            
            if (CurrentRowData != undefined) {
                $("#edAddress").jqxInput('val', CurrentRowData.Address);
                $("#edAddr").jqxInput('val', CurrentRowData.Addr); 
                $("#edTelHome").jqxInput('val', CurrentRowData.Tel_home); 
                $("#edTelWork").jqxInput('val', CurrentRowData.Tel_work); 
                $("#edTelOther").jqxInput('val', CurrentRowData.Tel_other); 
                $("#edWorkEmail").jqxInput('val', CurrentRowData.WorkEmail); 
                $("#edEmail").jqxInput('val', CurrentRowData.Email); 
                $('#edInfo').jqxTextArea('val', CurrentRowData.Information); 
                $('#edDoc').jqxTextArea('val', CurrentRowData.Documents); 
                $('#edNote').jqxTextArea('val', CurrentRowData.Note); 
                
                var DataChilds = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceChildrens, {}), {
                    formatData: function (data) {
                        $.extend(data, {
                            Filters: ["c.Employee_id = " + CurrentRowData.Employee_id],
                        });
                        return data;
                    },
                });
                $("#ChildsGrid").jqxGrid({source: DataChilds});
                
                var DataInstr = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceInstructings, {}), {
                    formatData: function (data) {
                        $.extend(data, {
                            Filters: ["i.Employee_id = " + CurrentRowData.Employee_id],
                        });
                        return data;
                    },
                });
                $("#InstrGrid").jqxGrid({source: DataInstr});
            }
        });
        
        $('#EmployeesGrid').on('rowdoubleclick', function (event) { 
            $("#btnEditEmpl").click();
        });
        
        GridState.StateInitGrid('EmployeesGrid', 'EmployeesIndex_EmployeesGrid');
        $("#EmployeesGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: true,
                virtualmode: true,
                width: '100%',
                height: '300',
                source: EmplDataAdapter,
                columns: [
                    { text: 'Фамилия Имя Отчество', dataField: 'EmployeeName', columntype: 'textbox', filtercondition: 'CONTAINS', width: 250},
                    { text: 'Адрес', dataField: 'Address', columntype: 'textbox', filtercondition: 'CONTAINS', width: 250},
                    { text: 'Дата рождения', filtertype: 'date', datafield: 'Birthday', filtercondition: 'DATE_EQUAL', width: 120, cellsformat: 'dd.MM.yyyy'},
                    { text: 'Должность', dataField: 'PositionName', columntype: 'textbox', filtercondition: 'CONTAINS', width: 120},
                    { text: 'Отдел', dataField: 'DepName', columntype: 'textbox', filtercondition: 'CONTAINS', width: 120},
                    { text: 'Служба', dataField: 'SectionName', columntype: 'textbox', filtercondition: 'CONTAINS', width: 120},
                    { text: 'Участок', dataField: 'Territ_Name', columntype: 'textbox', filtercondition: 'CONTAINS', width: 120},
                    { text: 'Дата приема', filtertype: 'date', datafield: 'DateStart', filtercondition: 'DATE_EQUAL', width: 120, cellsformat: 'dd.MM.yyyy'},
                    { text: 'Дата увольнения', filtertype: 'date', datafield: 'DateEnd', filtercondition: 'DATE_EQUAL', width: 120, cellsformat: 'dd.MM.yyyy'},
                    { text: 'Юр. лицо', dataField: 'JuridicalPerson', columntype: 'textbox', filtercondition: 'CONTAINS', width: 120},
                    { text: 'Оформлен с', filtertype: 'date', datafield: 'DateBegin', filtercondition: 'DATE_EQUAL', width: 120, cellsformat: 'dd.MM.yyyy'},
                    { text: 'Дата окон. исп. срока', filtertype: 'date', datafield: 'DateTrial', filtercondition: 'DATE_EQUAL', width: 120, cellsformat: 'dd.MM.yyyy'},
                    { text: 'Обходной лист', filtertype: 'date', datafield: 'BypassList', filtercondition: 'DATE_EQUAL', width: 120, cellsformat: 'dd.MM.yyyy'},
                    { text: 'Удост. получено', filtertype: 'date', datafield: 'CerDateIn', filtercondition: 'DATE_EQUAL', width: 120, cellsformat: 'dd.MM.yyyy'},
                    { text: 'Удост. сдано', filtertype: 'date', datafield: 'CerDateOut', filtercondition: 'DATE_EQUAL', width: 120, cellsformat: 'dd.MM.yyyy'},
                    { text: 'Примечание', datafield: 'e.Note', columntype: 'textbox', filtercondition: 'CONTAINS', width: 220, cellsrenderer: NoteRender},
                ]
                
        }));
        
        GridFilters.AddControlFilter('edFIO', 'jqxInput', 'EmployeesGrid', 'EmployeeName', 'stringfilter', 1, 'CONTAINS', true);
        $('#edFilter').on('keydown', function(event) {
            var isCompleted = $('#EmployeesGrid').jqxGrid('isBindingCompleted');
            var keyCode = event.keyCode;
            if (keyCode == 13) {
                var Value = $('#edFilter' ).val();
                if (Value == ''|| Value == -1 || Value == null) {
                    $('#edFilter').jqxComboBox('clearSelection');
                    $('#EmployeesGrid').jqxGrid('removefilter', 'DateEnd');
                }
                else if (isCompleted) {
                    if (Value == 1)
                        GridFilters.AddFilter('EmployeesGrid', 'DateEnd', 'stringfilter', 1, Value, 'NULL', true, null);
                    if (Value == 2)
                        GridFilters.AddFilter('EmployeesGrid', 'DateEnd', 'stringfilter', 1, Value, 'NOT_NULL', true, null);
                }
                
            }
        });
        
        

        
        
    });
</script>    

<div class="row">
    <div class="row-column">Сотрудник <input type="text" id="edFIO"/></div>
    <div class="row-column"><div id="edFilter"></div></div>
</div>
<div class="row">
    <div id="EmployeesGrid" class="jqxGridAliton"></div>
</div>
<div class="row">
    <div id='Tabs'>
        <ul>
            <li style="margin-left: 30px;">
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Общая</div>
                </div>
            </li>
            <li>
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Дети</div>
                </div>
            </li>
            <li>
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Инструктаж</div>
                </div>
            </li>
        </ul>
        <div style="overflow: hidden;">
            <div style="padding: 10px;">
                <div class="row">
                    <div class="row-column">Адрес</div>
                    <div class="row-column"><input type="text" id="edAddress"/></div>
                    <div class="row-column">Нов. адрес</div>
                    <div class="row-column"><input type="text" id="edAddr"/></div>
                </div>
                <div class="row">
                    <div class="row-column">Тел. домашний</div>
                    <div class="row-column"><input type="text" id="edTelHome"/></div>
                    <div class="row-column">Тел. рабочий</div>
                    <div class="row-column"><input type="text" id="edTelWork"/></div>
                </div>
                <div class="row">
                    <div class="row-column">Другие тел.</div>
                    <div class="row-column"><input type="text" id="edTelOther"/></div>
                    <div class="row-column">Рабочий e-mail</div>
                    <div class="row-column"><input type="text" id="edWorkEmail"/></div>
                </div>
                <div class="row">
                    <div class="row-column">Личный e-mail</div>
                    <div class="row-column"><input type="text" id="edEmail"/></div>
                </div>
                <div class="row" style="margin-top: 0px;">
                    <div class="row-column" style="width: 300px">Информация</div>
                    <div class="row-column" style="width: 300px">Документы</div>
                    <div class="row-column" style="width: 300px">Примечание</div>
                </div>
                <div class="row" style="margin-top: 0px;">
                    <div class="row-column" style="width: 300px"><textarea id="edInfo"></textarea></div>
                    <div class="row-column" style="width: 300px"><textarea id="edDoc"></textarea></div>
                    <div class="row-column" style="width: 300px"><textarea id="edNote"></textarea></div>
                </div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px;">
                <div><div id="ChildsGrid" class="jqxGridAliton"></div></div>
                <div style="margin-top: 10px;">
                    <div class="row-column"><input type="button" value="Добавить" id='btnAddChildren'/></div>
                    <div class="row-column"><input type="button" value="Изменить" id='btnEditChildren'/></div>
                    <div class="row-column"><input type="button" value="Обновить" id='btnRefreshChildren'/></div>
                    <div class="row-column" style="float: right; margin: 0px"><input type="button" value="Удалить" id='btnDelChildren'/></div>
                </div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px;">
                <div><div id="InstrGrid" class="jqxGridAliton"></div></div>
                <div style="margin-top: 10px;">
                    <div class="row-column"><input type="button" value="Добавить" id='btnAddInstr'/></div>
                    <div class="row-column"><input type="button" value="Изменить" id='btnEditInstr'/></div>
                    <div class="row-column"><input type="button" value="Обновить" id='btnRefreshInstr'/></div>
                    <div class="row-column" style="float: right; margin: 0px"><input type="button" value="Удалить" id='btnDelInstr'/></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="row" style="margin: 0px; padding: 0px;">
        <div class="row-column"><input type="button" value="Добавить" id='btnAddEmpl'/></div>
        <div class="row-column"><input type="button" value="Изменить" id='btnEditEmpl'/></div>
        <div class="row-column"><input type="button" value="Экспорт" id='btnExportEmpl'/></div>
    </div>
    <div class="row" style="padding: 0px;">
        <div class="row-column"><input type="button" value="Удалить" id='btnDelEmpl'/></div>
        <div class="row-column"><input type="button" value="Обновить" id='btnRefreshEmpl'/></div>
    </div>
</div>

<div id="EmployeesDialog" style="display: none;">
    <div id="EmployeesDialogHeader">
        <span id="HeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogEmployeesContent">
        <div style="" id="BodyEmployeesDialog"></div>
    </div>
</div>