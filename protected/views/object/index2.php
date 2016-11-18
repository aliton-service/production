<script type="text/javascript">
    var CurrentRowObjectsData = {};
    var RefObjects = 0;
    $(document).ready(function () {
        
        var DemDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListObjectsMin));
        
        var cellsrenderer = function (row, columnfield, value, defaulthtml, columnproperties) {
            var Temp = $('#ObjectsGrid').jqxGrid('getrowdata', row);
            if (Temp['Status'] === '1')//'Должник')
                return '<span class="backlight_red" style="margin: 4px; float: ' + columnproperties.cellsalign + ';">' + value + '</span>';
            if (Temp["Status"] === '2')//"Особые условия")
                return '<span class="backlight_green" style="margin: 4px; float: ' + columnproperties.cellsalign + ';">' + value + '</span>';
            if (Temp["Status"] === '3')//"Должник и особые условия")
               return '<span class="backlight_blue" style="margin: 4px; float: ' + columnproperties.cellsalign + ';">' + value + '</span>';
            
        };
        
        $("#ObjectsGrid").on('rowselect', function (event) {
            CurrentRowObjectsData = $('#ObjectsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (CurrentRowObjectsData !== undefined) {
                $('#ODObject_id').val(CurrentRowObjectsData['Object_id']);
                $('#ODObjectGr_id').val(CurrentRowObjectsData['ObjectGr_id']);
                $('#ODStreet_id').val(CurrentRowObjectsData['Street_id']);
                $('#ODHouse').val(CurrentRowObjectsData['House']);
            }
        });
        
        $("#ObjectsGrid").on('bindingcomplete', function(){
            if (RefObjects>0) {
                Aliton.SelectRowByIdVirtual('ObjectGr_id', RefObjects, '#ObjectsGrid', false);
                RefObjects = 0;
                return;
            }
            
            if (CurrentRowObjectsData != undefined) 
                Aliton.SelectRowByIdVirtual('Object_id', CurrentRowObjectsData.Object_id, '#ObjectsGrid', false);
            else
                Aliton.SelectRowByIdVirtual('Object_id', null, '#ObjectsGrid', false);
        });
        
        $("#ObjectsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, GridsSettings['ObjectsGrid'], {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: true,
                virtualmode: false,
                width: '100%',
                height: 'calc(100% - 12px)',
                //source: DemDataAdapter,
                ready: function() {
                    var State = $('#ObjectsGrid').jqxGrid('getstate');
                    var Columns = GridState.LoadGridSettings('#ObjectsGrid', 'ObjectIndex_ObjectsGrid');
                    $.extend(true, State.columns, Columns);
                    $('#ObjectsGrid').jqxGrid('loadstate', State);    
                    $('#ObjectsGrid').jqxGrid({source: DemDataAdapter});

                },
                columns: [
                    { text: 'Адрес', dataField: 'Addr', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250, cellsrenderer: cellsrenderer},
                    { text: 'Организация', dataField: 'FullName', width: 150, cellsrenderer: cellsrenderer },
                    { text: 'Юр. лицо', dataField: 'JuridicalPerson', width: 100, cellsrenderer: cellsrenderer },
                    { text: 'Район', dataField: 'AreaName', width: 100, cellsrenderer: cellsrenderer },
                    { text: 'Тип обслуживания', dataField: 'ServiceType', width: 100, cellsrenderer: cellsrenderer },
                    { text: 'Мастер', dataField: 'MasterName', width: 180, cellsrenderer: cellsrenderer },
                    { text: 'Новостройка', dataField: 'year_construction', width: 180, cellsrenderer: cellsrenderer },
                    { text: 'ВИП', dataField: 'VIP', width: 180, cellsrenderer: cellsrenderer },
                    { text: 'Участок', dataField: 'Territ_Name', width: 180, cellsrenderer: cellsrenderer },
                ]
                
        }));
        
        GridState.StateInitGrid('ObjectsGrid', 'ObjectIndex_ObjectsGrid');
        
        
        $('#ObjectsGrid').on('rowdoubleclick', function (event) { 
            $("#ObjInfo").click();
        });

        $("#ObjInfo").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#NewDem").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#ReloadObjects").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#ViewDemands").jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 140}));
        $("#btnDelObject").jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 140}));
        $('#btnDelObject').on('click', function(){
            if (CurrentRowObjectsData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('ObjectsGroup/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        ObjectGr_id: CurrentRowObjectsData.ObjectGr_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#ObjectsGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#ObjectsGrid').jqxGrid('getcelltext', RowIndex + 1, "ObjectGr_id");
                            RefObjects = parseInt(Text);
                            $("#ReloadObjects").click();
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $("#btnAddObject").jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 140}));
        $("#btnAddObject").on('click', function() {
            $('#ObjectsGroupDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings,{width: 830, height: 730, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('ObjectsGroup/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyObjectsGroupDialog").html(Res.html);
                    $('#ObjectsGroupDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $("#ViewDemands").on('click', function () {
            $('#OptionsDialog').jqxWindow('open');
        });
        
        $("#ObjInfo").on('click', function () {
            window.open('/index.php?r=Objectsgroup/index&ObjectGr_id=' + CurrentRowObjectsData['ObjectGr_id']);
        });
        
        $("#NewDem").on('click', function ()
        {
            if (Aliton.CheckToDayDemands(CurrentRowObjectsData['Object_id'])) 
                Aliton.NewDemand(CurrentRowObjectsData['Object_id'], CurrentRowObjectsData['ContrS_id']);
            else 
                $('#ToDayDialog').jqxWindow('open');
        });
        
        $("#ReloadObjects").on('click', function ()
        {
              $("#ObjectsGrid").jqxGrid('updatebounddata');  
        });
        
        $("#edAddr").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Адрес", width: 400}));
        $("#edClient").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Клиент"}));
        GridFilters.AddControlFilter('edAddr', 'jqxInput', 'ObjectsGrid', 'Addr', 'stringfilter', 1, 'CONTAINS', true);
        GridFilters.AddControlFilter('edClient', 'jqxInput', 'ObjectsGrid', 'FullName', 'stringfilter', 1, 'CONTAINS', true);
        
        $('#ToDayDialog').jqxWindow(
            $.extend(true, DialogDefaultSettings, {
                width: 500,
                height: 130,
                initContent: function () {
                    $("#ToDayDialogYes").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                    $("#ToDayDialogCancel").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                    
                    $("#ToDayDialogCancel").on('click', function ()
                    {
                        $('#ToDayDialog').jqxWindow('Close');
                        Aliton.NewDemand(CurrentRowObjectsData['Object_id'], CurrentRowObjectsData['ContrS_id']);
                    });

                    $("#ToDayDialogYes").on('click', function ()
                    {
                        $('#ToDayDialog').jqxWindow('Close');
                        $("#ToDayDialogObject_id").val(CurrentRowObjectsData['Object_id']);
                        $("#DemFilters").submit();
                    });
                }
            })
        );

        $('#OptionsDialog').jqxWindow(
            $.extend(true, DialogDefaultSettings, {
                width: 500,
                height: 340,
                initContent: function () {
                    var DataListEmployees = new $.jqx.dataAdapter(Sources.SourceListEmployees);
                    var DataDemandTypes = new $.jqx.dataAdapter(Sources.SourceDemandTypes);
                    var filtersChanged = false;
                    
                    $("#rbAll").jqxRadioButton({ width: 100, height: 25, checked: false});
                    $("#rbNoDateMaster").jqxRadioButton({ width: 130, height: 25, checked: false});
                    $("#rbDemObject").jqxRadioButton({ width: 190, height: 25, checked: false});
                    $("#rbNoDateExec").jqxRadioButton({ width: 150, height: 25, checked: false});
                    $("#rbDemAllObject").jqxRadioButton({ width: 230, height: 25, checked: false});
                    $("#rbParams").jqxRadioButton({ width: 130, height: 25, checked: false});
                    $("#cmbMasterFilter").jqxComboBox({ source: DataListEmployees, width: '200', height: '25px', displayMember: 'ShortName', valueMember: 'Employee_id'});
                    $("#edNumber").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Номер", width: 100}));
                    $("#edDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { formatString: "dd.MM.yyyy" }));
                    $("#cmbDemandType").jqxComboBox({ source: DataDemandTypes, width: '350', height: '25px', displayMember: "DemandType", valueMember: "DemandType_id"});
                    $("#cmbExecutor").jqxComboBox({ source: DataListEmployees, width: '200', height: '25px', displayMember: 'ShortName', valueMember: 'Employee_id'});
                                        
                    var resetDate = function () {
                        if (!filtersChanged) {
                            $('#edDate').jqxDateTimeInput('val', null);
                        }
                        filtersChanged = true;
                    };
                    $('#cmbMasterFilter').on('select', function (event){
                        resetDate();
                    });
                    $('#cmbDemandType').on('select', function (event){
                        resetDate();
                    });
                    $('#cmbExecutor').on('select', function (event){
                        resetDate();
                    });
                    $('#edNumber').on('change', function (event){
                        resetDate();
                    });
                    
                    $('#rbAll').on('checked', function (event) { 
                        resetDate();
                    });
                    $('#rbNoDateMaster').on('checked', function (event) { 
                        resetDate();
                    });
                    $('#rbDemObject').on('checked', function (event) { 
                        resetDate();
                    });
                    $('#rbNoDateExec').on('checked', function (event) { 
                        resetDate();
                    });
                    $('#rbDemAllObject').on('checked', function (event) { 
                        resetDate();
                    });

                    $("#edNumber").on('keyup keypress', function(e) {
                        var keyCode = e.keyCode || e.which;
                        if (keyCode === 13) { 
                            $("#OptionsDialogYes").click();
                        }
                    });
                    
                    $("#OptionsDialogYes").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                    $("#OptionsDialogCancel").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                    
                    $("#OptionsDialogCancel").on('click', function () {
                        resetInputValues();
                        $('#OptionsDialog').jqxWindow('Close');
                    });
                    
                    var resetInputValues = function () {
                        $("#cmbMasterFilter").jqxComboBox('clearSelection');
                        $("#cmbMasterFilter input").val('');
                        $("#edNumber").jqxInput('val', null);
                        $("#cmbDemandType").jqxComboBox('clearSelection');
                        $("#cmbDemandType input").val('');
                        $("#cmbExecutor").jqxComboBox('clearSelection');
                        $("#cmbExecutor input").val('');
                        filtersChanged = false;
                    };
                    
                    function Close(Object) {
                        $('#OptionsDialog').jqxWindow('Close');
                        $(Object).find('input').val(true);
                        $("#DemFilters2").submit();
                        resetInputValues();
                    }
                    
                    $("#OptionsDialogYes").on('click', function () { Close(); });
                    $('#rbAll').on('checked', function (event) { Close(this); });
                    $('#rbNoDateMaster').on('checked', function (event) { Close(this); });
                    $('#rbDemObject').on('checked', function (event) { Close(this); });
                    $('#rbNoDateExec').on('checked', function (event) { Close(this); });
                    $('#rbDemAllObject').on('checked', function (event) { Close(this); });
                    
                }
            })
        );

        $('#OptionsDialog').on('open', function(){
            $("#rbAll").jqxRadioButton('val', false);
            $("#rbNoDateMaster").jqxRadioButton('val', false);
            $("#rbDemObject").jqxRadioButton('val', false);
            $("#rbNoDateExec").jqxRadioButton('val', false);
            $("#rbDemAllObject").jqxRadioButton('val', false);
            $("#rbParams").jqxRadioButton('val', true);
            $("#edDate").jqxDateTimeInput('val', new Date() );
            
        });
        
    });
</script>    

<style>
    .backlight_red {
        color: #FF0000;
    }
    
    .backlight_green {
        color: #2F5C3B;
    }
    
    .backlight_blue {
        color: #0000FF;
    }
    
    .jqx-fill-state-pressed .backlight_green {
        color: black;
    }
    
    #ObjectsGrid .jqx-fill-state-pressed {
        color: black;
        background-color: #A7D2BB !important;
    }
    
    .jqx-calendar-month-container:last-child {
        height: 10px !important;
    }
    
</style>


<div style="float: left; width: 100%; height: 40px;">
    <div class="row-column">Адрес: <input type="text" id="edAddr"/></div>
    <div class="row-column">Клиент: <input type="text" id="edClient"/></div>
</div>
<div style="clear: both"></div>
<div style="float: left; width: 100%; height: calc(100% - 70px)">
    <div id="ObjectsGrid" class="jqxGridAliton"></div>
</div>
<div style="clear: both"></div>
<div style="float: left; width: 100%; height: 30px;">
    <div class="row-column"><input type="button" value="Дополнительно" id='ObjInfo' /></div>
    <div class="row-column"><input type="button" value="Новая заявка" id='NewDem' /></div>
    <div class="row-column"><input type="button" value="Просмотр заявок" id='ViewDemands' /></div>
    <div class="row-column"><input type="button" value="Обновить" id='ReloadObjects' /></div>
    <div class="row-column"><input type="button" value="Новый объект" id='btnAddObject' /></div>
    <div class="row-column" style="float: right"><input type="button" value="Удалить объект" id='btnDelObject' /></div>
</div>


<div id="ToDayDialog" style="display: none">
    <div id="customWindowHeader">
        <span id="captureContainer" style="float: left">Внимание! </span>
    </div>
    <div id="customWindowContent" style="overflow: hidden">
        <div style="margin: 10px">
            <div>По данному объекту сегодня уже зарегистрированы заявки. Просмотреть?</div>
            <div style="margin-top: 10px">
                <form class="form-inline"  id="DemFilters" target="blank" action="/index.php?r=Demands/index" method="post">
                    <input id='ToDayDialogObject_id' type="hidden" value="" name='DemFilters[Object_id]'/>
                    <input type="hidden" value="true" name='DemFilters[DemObject]'/>
                </form>
                <div style="float: left"><input type="button" value="Да" id='ToDayDialogYes' /></div>
                <div style="float: right"><input type="button" value="Нет" id='ToDayDialogCancel' /></div>
            </div>
        </div>
    </div>
</div>

<div id="OptionsDialog" style="display: none">
    <div id="customWindowHeader">
        <span id="captureContainer" style="float: left">Выберите заявки для просмотра</span>
    </div>
    <div id="customWindowContent" style="overflow: hidden">
        <div style="margin: 10px">
            <div style="margin-top: 10px">
                <form class="form-inline"  id="DemFilters2" target="_blank" action="/index.php?r=Demands/index" method="post">
                    <div class="row">
                        <input id='ODObject_id' type="hidden" value="" name='DemFilters[Object_id]'/>
                        <input id='ODObjectGr_id' type="hidden" value="" name='DemFilters[ObjectGr_id]'/>
                        <input id='ODStreet_id' type="hidden" value="" name='DemFilters[Street_id]'/>
                        <input id='ODHouse' type="hidden" value="" name='DemFilters[House]'/>
                        <div class="row-column"><div id='rbAll' name='DemFilters[All]'>Любые</div></div>
                        <div class="row-column"><div id='rbNoDateMaster' name='DemFilters[NoDateMaster]'>Непереданные</div></div>
                        <div class="row-column"><div id='rbDemObject' name='DemFilters[DemObject]'>По выбранному объекту</div></div>
                    </div>
                    <div class="row">
                        <div class="row-column"><div id='rbNoDateExec' name='DemFilters[NoDateExec]'>Невыполненные</div></div>
                        <div class="row-column" style="float: right"><div id='rbDemAllObject' name='DemFilters[DemObjectGroup]'>По всем объектам адреса</div></div>
                    </div>
                    <div class="row" style="border: 1px solid #ccc; margin-right: 14px; padding: 0 10px 10px;">
                        <div class="row">
                            <div class="row-column"><div id='rbParams'>По параметрам: </div></div>
                            <div class="row-column" style="float: right"><div id='cmbMasterFilter' name='DemFilters[Master]'></div></div>
                            <div class="row-column" style="margin: 4px 7px 0 0; float: right;">Мастер:</div>
                        </div>
                        <div class="row">
                           <div class="row-column" style="margin-top: 6px;">Номер:</div>
                           <div class="row-column"><input type="text" name='DemFilters[Demand_id]' id="edNumber"/></div>
                           <div class="row-column" style="margin-top: 6px;">Дата:</div>
                           <div class="row-column"><div id='edDate' name="DemFilters[DateReg]"></div></div>
                        </div>
                        <div class="row">
                            <div class="row-column" style="margin-top: 6px;">Тип:</div>
                            <div class="row-column"><div id='cmbDemandType' name='DemFilters[DemandType_id]'></div></div>
                        </div>
                        <div class="row">
                            <div class="row-column" style="margin-top: 6px;">Исполнитель:</div>
                            <div class="row-column"><div id='cmbExecutor' name='DemFilters[Executor]'></div></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row-column"><input type="button" value="Выбрать" id='OptionsDialogYes' /></div>
                        <div class="row-column" style="float: right"><input type="button" value="Отмена" id='OptionsDialogCancel' /></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="ObjectsGroupDialog" style="display: none;">
    <div id="ObjectsGroupDialogHeader">
        <span id="ObjectsGroupHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogObjectsGroupContent">
        <div style="" id="BodyObjectsGroupDialog"></div>
    </div>
</div>