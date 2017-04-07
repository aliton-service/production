<script>
    $(document).ready(function() {
        var DataEmployees;
        
        $.ajax({
            url: <?php echo json_encode(Yii::app()->createUrl('AjaxData/DataJQXSimpleList'))?>,
            type: 'POST',
            async: false,
            data: {
                Models: ['ListEmployees']
            },
            success: function(Res) {
                Res = JSON.parse(Res);
                DataEmployees = Res[0].Data;
            }
        });
        
        var initWidgets = function(tab) {
            switch (tab) {
                case 0:
                    var DemandsAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.DemandsSource, {
                        filter: function () {
                            $("#DemandsGrid").jqxGrid('updatebounddata', 'filter');
                        },
                        sort: function () {
                            $("#DemandsGrid").jqxGrid('updatebounddata', 'sort');
                        },
                        formatData: function (data) {
                            if ($("#edSN").val() != '')
                                data.Filters = ["d.DateExec is null"];
                            return data;
                        },
                    }));


                    var cellclass = function(row, columnfield, value) {
                        var RowData = $('#DemandsGrid').jqxGrid('getrowdata', row);
                        if ((parseInt(RowData["DemandPrior_id"]) == 1 || parseInt(RowData["DemandPrior_id"] == 32)) && parseInt(RowData["FullOverDay"]) == 0)
                            return "backlight_pink";
                        if (parseInt(RowData["FullOverDay"]) !== 0)
                            return "backlight_red";
                    };

                    $("#DemandsGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 2px)',
                            width: 'calc(100% - 2px)',
                            showfilterrow: false,
                            pagermode: 'pagermode',
                            autoshowfiltericon: true,
                            pagesizeoptions: ['10', '200', '500', '1000'],
                            pagesize: 200,
                            virtualmode: true,
                            theme: 'custom_01',
                            rowsheight: 20,
                            columnsheight: 25,
                            pagerheight: 30,
                            source: DemandsAdapter,
                            columns:
                                [
                                    { text: 'Зарегистрировал', datafield: 'UCreateName', width: 150, cellclassname: cellclass },
                                    { text: 'Номер', datafield: 'Demand_id', width: 75, cellclassname: cellclass },
                                    { text: 'Адрес', datafield: 'Address', width: 250, cellclassname: cellclass },
                                    { text: 'ВИП', datafield: 'VIPName', width: 45, cellclassname: cellclass },
                                    { text: 'Регистрация', filtertype: 'date', datafield: 'DateReg', width: 150, cellsformat: 'dd.MM.yyyy HH:mm', cellclassname: cellclass },
                                    { text: 'Передача мастеру', filtertype: 'date', datafield: 'DateMaster', width: 150, cellsformat: 'dd.MM.yyyy HH:mm', cellclassname: cellclass }, // 5
                                    { text: 'Выполнение', filtertype: 'date', datafield: 'DateExec', width: 150, cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'DATE_EQUAL', cellclassname: cellclass },
                                    { text: 'Время на вып.', datafield: 'ExceedDays', width: 50, cellclassname: cellclass },
                                    { text: 'Просрочка', datafield: 'FullOverDay', width: 80, cellclassname: cellclass },
                                    { text: 'Тип заявки', datafield: 'DemandType', width: 205, cellclassname: cellclass },
                                    { text: 'Тип заявки ID', datafield: 'DemandType_id', width: 120, hidden: true }, //10
                                    { text: 'Тип оборудования', datafield: 'EquipType', width: 120, cellclassname: cellclass },
                                    { text: 'Неисправность', datafield: 'Malfunction', width: 120, cellclassname: cellclass },
                                    { text: 'Приоритет', datafield: 'DemandPrior', width: 120, cellclassname: cellclass },
                                    { text: 'Мастер', datafield: 'MasterName', width: 120, cellclassname: cellclass },
                                    { text: 'Запл. дата выпол.', filtertype: 'date', datafield: 'PlanDateExec', cellsformat: 'dd.MM.yyyy HH:mm', width: 150, cellclassname: cellclass},
                                    { text: 'Исполнитель', datafield: 'ExecutorsName', width: 120, cellclassname: cellclass },
                                    { text: 'Тип обслуживания', datafield: 'ServiceType', width: 120, cellclassname: cellclass }, 
                                    { text: 'Первоначальный тип', datafield: 'FirstDemandType', width: 203, cellclassname: cellclass }, 
                                    { text: 'Контакт', datafield: 'Contacts', width: 600, cellclassname: cellclass }, // 20
                                    { text: 'Неисправность', datafield: 'DemandText', width: 650, cellclassname: cellclass },
                                    { text: 'Примечание', datafield: 'Note', width: 120, cellclassname: cellclass },
                                    { text: 'Район', datafield: 'AreaName', width: 120, cellclassname: cellclass }, 
                                    { text: 'Изменил', datafield: 'UChangeName', width: 120, cellclassname: cellclass },
                                    { text: 'Результат', datafield: 'ResultName', width: 120, cellclassname: cellclass }, // 25
                                    { text: 'Исполнители', datafield: 'OtherName', width: 120, hidden: true },
                                    { text: 'Отработка', filtertype: 'date', datafield: 'WorkedOut', width: 150, cellsformat: 'dd.MM.yyyy HH:mm', cellclassname: cellclass },
                                    { text: 'Object_id', datafield: 'Object_id', width: 120, hidden: true },
                                    { text: 'Territ_id', datafield: 'Territ_id', width: 120, hidden: true },
                                    { text: 'Street_id', datafield: 'Street_id', width: 120, hidden: true },
                                    { text: 'House', datafield: 'House', width: 120, hidden: true }, // 30
                                    { text: 'Выполнение(Фильтр)', datafield: 'DateExecFilter', width: 150, cellsformat: 'd', cellclassname: cellclass },
                                    { text: 'Предельная дата', filtertype: 'date', datafield: 'Deadline', width: 150, cellsformat: 'dd.MM.yyyy HH:mm' /*, cellclassname: cellclass */},
                                    { text: 'Статус ОП', datafield: 'StatusOPName', width: 120, cellclassname: cellclass },
                                    { text: 'Исходный приоритет', datafield: 'FirstDemandPrior', width: 120, cellclassname: cellclass },
                                    { text: 'Инициатор', datafield: 'InitiatorName', width: 120, cellclassname: cellclass },
                                ]
                    }));
                break;
                case 1:
                    $("#edTest1").jqxInput($.extend(true, {}, InputDefaultSettings, {height: 20, theme: 'custom_01', width: 400, minLength: 1}));
                    $("#cmbTest1").jqxComboBox({ source: DataEmployees, width: '180', height: '20px', theme: 'custom_01', displayMember: "ShortName", valueMember: "Employee_id"});
                    $("#cmbTest1").jqxComboBox('val', 274);
                    $("#edTest2").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '150px', theme: 'custom_01', height: '20px'}));
                    $("#chbTest1").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 160, height: 20, theme: 'custom_01' }));
                    $('#edTextArea').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { disabled: false, theme: 'custom_01', placeHolder: '', height: 50, width: 400, minLength: 1}));
                    
                    $("#btnTest1").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160, height: '30px', theme: 'custom_01', disabled: false }));
                    $('#Test1Dialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 300, theme: 'custom_01', width: 435, position: 'center' }));
                    $("#btnTest1").on('click', function() {
                        $('#Test1Dialog').jqxWindow('open');
                    });
                break;
            }
            
        };
        $('#Tabs').jqxTabs($.extend(true, {}, TabsDefaultSettings, { width: 'calc(100% - 22px)', height: 'calc(100% - 2px)', theme: 'custom_01', initTabContent: initWidgets}));
    });
    
</script>    

<style>
    .backlight_red {
        color: #FF0000;
    }
    
    .backlight_pink {
        color: #E000E0;
    }
    
    .jqx-widget, .jqx-widget-content, .jqx-input {
        font-size: 11 !important;
    }
    
    
    .backlight_pink:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected), .jqx-widget .backlight_pink:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected) {
        color: #E000E0;
    }
    
    .backlight_red:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected), .jqx-widget .backlight_red:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected) {
        color: #FF0000;
    }
        
    .jqx-tabs-title {
        border-left: 1px solid #696969;
        border-top: 1px solid #696969;
        border-right: 1px solid #696969
    }
        
    
</style>

<div class="al-row" style="height: 600px; padding: 10px;">
    <div id='Tabs'>
        <ul>
            <li style="margin-left: 10px;">
                <div style="height: 10px; margin-top: 2px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Реестр</div>
                </div>
            </li>
            <li style="margin-left: 0px; ">
                <div style="height: 10px; margin-top: 2px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Поля, Кнопки, Диалог</div>
                </div>
            </li>
            <li style="margin-left: 0px; ">
                <div style="height: 10px; margin-top: 2px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Тест 2</div>
                </div>
            </li>
        </ul>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: calc(100% - 20px)">
                <div id="DemandsGrid" ></div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: calc(100% - 20px)">
                <div class="al-row"><input type="text" id="edTest1" value="Тест"/></div>
                <div class="al-row"><div id="cmbTest1"></div></div>
                <div class="al-row"><div id="edTest2"></div></div>
                <div class="al-row"><div id="chbTest1">Тест</div></div>
                <div class="al-row"><textarea id="edTextArea">Тест</textarea></div>
                <div class="al-row"><input type="button" id="btnTest1" value="Открыть диалог"/></div>
                
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: calc(100% - 20px)">
                
            </div>
        </div>
    </div>
</div>

<div id="Test1Dialog" style="display: none;">
    <div id="Test1DialogHeader">
        <span id="Test1HeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogTest1Content">
        <div style="" id="BodyTest1Dialog"></div>
    </div>
</div>


