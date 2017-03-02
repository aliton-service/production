<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var NoteRender = function (row, columnfield, value, defaulthtml, columnproperties) {
            var Temp = $('#EmployeesGrid').jqxGrid('getrowdata', row);
            return Temp.Note;
        };
        
        var DataChilds = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceChildrens, {}), {
            formatData: function (data) {
                var Empl = 0;
                if (CurrentRowData != undefined) Empl = CurrentRowData.Employee_id;
                    
                $.extend(data, {
                    Filters: ["c.Employee_id = " + Empl],
                });
                return data;
            },
        });
        
        var DataInstr = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceInstructings, {}), {
            formatData: function (data) {
                var Empl = 0;
                if (CurrentRowData != undefined) Empl = CurrentRowData.Employee_id;
                
                $.extend(data, {
                    Filters: ["i.Employee_id = " + Empl],
                });
                return data;
            },
        });
        
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
            $('#EmployeesGrid').jqxGrid('updatebounddata');
        });
        
        $('#btnExportEmpl').on('click', function(){
            //$("#EmployeesGrid").jqxGrid('exportdata', 'xls', 'EmployeesGrid');
            $("#EmployeesGrid").jqxGrid('exportdata', 'xls', 'Сотрудники', true, null, true, <?php echo json_encode(Yii::app()->createUrl('Reports/UpLoadFileGrid'))?>);
        });
        
        var initWidgets = function(tab) {
            switch(tab) {
                case 0:
                    $("#edAddress").jqxInput({height: 25, width: 200, minLength: 1}); 
                    $("#edAddr").jqxInput({height: 25, width: 200, minLength: 1}); 
                    $("#edTelHome").jqxInput({height: 25, width: 190, minLength: 1}); 
                    $("#edTelWork").jqxInput({height: 25, width: 150, minLength: 1}); 
                    $("#edTelOther").jqxInput({height: 25, width: 150, minLength: 1}); 
                    $("#edWorkEmail").jqxInput({height: 25, width: 200, minLength: 1});
                    $("#edEmail").jqxInput({height: 25, width: 250, minLength: 1});
                    $('#edInfo').jqxTextArea({ height: 50, width: 'calc(100% - 2px)', minLength: 1 });
                    $('#edDoc').jqxTextArea({ height: 50, width: 'calc(100% - 2px)', minLength: 1 });
                    $('#edNote').jqxTextArea({ height: 50, width: 'calc(100% - 2px)', minLength: 1 });
                    break;
                case 1:
                    $('#btnAddChildren').jqxButton({ width: 120, height: 30 });
                    $('#btnEditChildren').jqxButton({ width: 120, height: 30 });
                    $('#btnRefreshChildren').jqxButton({ width: 120, height: 30 });
                    $('#btnDelChildren').jqxButton({ width: 120, height: 30 });
                    
                    $('#ChildsGrid').on('rowdoubleclick', function (event) { 
                        $("#btnEditChildren").click();
                    });

                    $("#ChildsGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            pageable: false,
                            sortable: true,
                            showfilterrow: false,
                            virtualmode: false,
                            width: 'calc(100% - 2px)',
                            height: 'calc(100% - 2px)',
                            source: DataChilds,
                            columns: [
                                { text: 'Дата добавления', filtertype: 'date', datafield: 'DateCreate', filtercondition: 'DATE_EQUAL', width: 120, cellsformat: 'dd.MM.yyyy HH:mm'},    
                                { text: 'Фамилия Имя Отчество', dataField: 'ChildrenName', columntype: 'textbox', filtercondition: 'CONTAINS', width: 250},
                                { text: 'Дата рождения', filtertype: 'date', datafield: 'BirthDay', filtercondition: 'DATE_EQUAL', width: 120, cellsformat: 'dd.MM.yyyy'},
                                { text: 'Полных лет', dataField: 'Age', columntype: 'textbox', filtercondition: 'CONTAINS', width: 100},
                            ]

                    }));
                    
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
                    $('#InstrGrid').on('rowdoubleclick', function (event) { 
                        $("#btnEditInstr").click();
                    });

                    $("#InstrGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            pageable: false,
                            sortable: true,
                            showfilterrow: false,
                            virtualmode: false,
                            source: DataInstr,
                            width: 'calc(100% - 2px)',
                            height: 'calc(100% - 2px)',
                            columns: [
                                { text: 'Дата проведения', filtertype: 'date', datafield: 'Date', filtercondition: 'DATE_EQUAL', width: 120, cellsformat: 'dd.MM.yyyy HH:mm'},    
                                { text: 'Наименование', dataField: 'Name', columntype: 'textbox', filtercondition: 'CONTAINS', width: 250},
                                { text: 'Исполнитель', datafield: 'EmployeeName', filtercondition: 'CONTAINS', width: 120},
                                { text: 'Примечание', dataField: 'Note', columntype: 'textbox', filtercondition: 'CONTAINS', width: 100},
                            ]

                    }));
                    
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
        
        $('#Tabs').on('selected', function (event) { 
            var selectedTab = event.args.item;
            if (selectedTab == 1)
                $("#ChildsGrid").jqxGrid('updatebounddata');
        }); 
        
        $('#Tabs').jqxTabs({ width: 'calc(100% - 2px)', height: 'calc(100% - 2px)', initTabContent: initWidgets});
        
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
                
                var SelectedTab = $('#Tabs').jqxTabs('selectedItem');
                switch (SelectedTab) {
                    case 1:
                        $("#ChildsGrid").jqxGrid('updatebounddata');
                    case 2:
                        $("#InstrGrid").jqxGrid('updatebounddata');
                    break;
                }
            }
        });
        
        $('#EmployeesGrid').on('rowdoubleclick', function (event) { 
            $("#btnEditEmpl").click();
        });
        
        $("#EmployeesGrid").on("bindingcomplete", function (event) {
            if (CurrentRowData != undefined) 
                Aliton.SelectRowByIdVirtual('Employee_id', CurrentRowData.Employee_id, '#EmployeesGrid', false);
            else
                Aliton.SelectRowByIdVirtual('Employee_id', null, '#EmployeesGrid', false);
        });
        
        $("#EmployeesGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: true,
                virtualmode: true,
                width: 'calc(100% - 2px)',
                height: 'calc(100% - 2px)',
                columns: [
                    { text: 'Фамилия Имя Отчество', dataField: 'EmployeeName', columntype: 'textbox', filtercondition: 'CONTAINS', width: 250},
                    { text: 'Адрес', dataField: 'Address', columntype: 'textbox', filtercondition: 'CONTAINS', width: 250},
                    { text: 'Дата рождения', filtertype: 'date', datafield: 'Birthday', filtercondition: 'DATE_EQUAL', width: 120, cellsformat: 'dd.MM.yyyy'},
                    { text: 'Должность', dataField: 'PositionName', columntype: 'textbox', filtercondition: 'CONTAINS', width: 240},
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
        
    });
</script> 

<style>
    #EmployeesGrid {
        cursor: default;
    }
</style>    

<div class="al-row" style="height: calc(100% - 290px)">
    <div id="EmployeesGrid" class="jqxGridAliton"></div>
</div>
<div class="al-row" style="height: 230px">
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
                <div class="al-row">
                    <div class="al-row-column">Адрес</div>
                    <div class="al-row-column"><input type="text" id="edAddress"/></div>
                    <div class="al-row-column">Нов. адрес</div>
                    <div class="al-row-column"><input type="text" id="edAddr"/></div>
                    <div class="al-row-column">Тел. дом.</div>
                    <div class="al-row-column"><input type="text" id="edTelHome"/></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column">
                        <div>Тел. рабочий</div>
                        <div><input type="text" id="edTelWork"/></div>
                    </div>
                    <div class="al-row-column">
                        <div>Другие тел.</div>
                        <div><input type="text" id="edTelOther"/></div>
                    </div>
                    <div class="al-row-column">
                        <div>Рабочий e-mail</div>
                        <div><input type="text" id="edWorkEmail"/></div>
                    </div>
                    <div class="al-row-column">
                        <div>Личный e-mail</div>
                        <div><input type="text" id="edEmail"/></div>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row">
                    <div class="row-column" style="width: 250px">
                        <div>Информация</div>
                        <div><textarea id="edInfo"></textarea></div>
                    </div>
                    <div class="row-column" style="width: 250px">
                        <div>Документы</div>
                        <div><textarea id="edDoc"></textarea></div>
                    </div>
                    <div class="row-column" style="width: 250px">
                        <div>Примечание</div>
                        <div><textarea id="edNote"></textarea></div>
                    </div>
                    
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: 100%">
                <div class="al-row" style="height: calc(100% - 66px)">
                    <div id="ChildsGrid" class="jqxGridAliton"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column"><input type="button" value="Добавить" id='btnAddChildren'/></div>
                    <div class="al-row-column"><input type="button" value="Изменить" id='btnEditChildren'/></div>
                    <div class="al-row-column"><input type="button" value="Обновить" id='btnRefreshChildren'/></div>
                    <div class="al-row-column" style="float: right; margin: 0px"><input type="button" value="Удалить" id='btnDelChildren'/></div>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: 100%">
                <div class="al-row" style="height: calc(100% - 66px)">
                    <div id="InstrGrid" class="jqxGridAliton"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column"><input type="button" value="Добавить" id='btnAddInstr'/></div>
                    <div class="al-row-column"><input type="button" value="Изменить" id='btnEditInstr'/></div>
                    <div class="al-row-column"><input type="button" value="Обновить" id='btnRefreshInstr'/></div>
                    <div class="al-row-column" style="float: right; margin: 0px"><input type="button" value="Удалить" id='btnDelInstr'/></div>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Добавить" id='btnAddEmpl'/></div>
    <div class="al-row-column"><input type="button" value="Изменить" id='btnEditEmpl'/></div>
    <div class="al-row-column"><input type="button" value="Экспорт" id='btnExportEmpl'/></div>
    <div class="al-row-column"><input type="button" value="Обновить" id='btnRefreshEmpl'/></div>
    <div class="al-row-column"><input type="button" value="Удалить" id='btnDelEmpl'/></div>
    <div style="clear: both"></div>
</div>

<div id="EmployeesDialog" style="display: none;">
    <div id="EmployeesDialogHeader">
        <span id="HeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogEmployeesContent">
        <div style="" id="BodyEmployeesDialog"></div>
    </div>
</div>