<script>
    var DataEmployees;
    var Statistics = {};
    $(document).ready(function () {
        var CurrentUserShortName = <?php echo json_encode(Yii::app()->user->fullname); ?>;
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
        
        Statistics.Refresh = function() {
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('SalesDepClients/Statistics')); ?>,
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
        
        $("#cmbExecutor").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "ShortName"}));
        $("#cmbExecutor").jqxComboBox('val', CurrentUserShortName);
        $('#edStatisticsInfo1').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 70}));
        $('#edStatisticsInfo2').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 70}));
        $('#edStatisticsInfo3').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 70}));
        $('#edStatisticsInfo4').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 70}));
        
        $('#DiaryDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 600, width: 1000, position: 'center' }));
        
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    var ActionsGridCurrentRow;
                    $("#ActionsGrid").on('rowselect', function (event) {
                        ActionsGridCurrentRow = $('#ActionsGrid').jqxGrid('getrowdata', event.args.rowindex);
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
                            columns:
                                [
                                    { text: '#', sortable: false, filterable: false, editable: false, groupable: false, draggable: false, resizable: false,
                                      datafield: '', columntype: 'number', width: 50,
                                        cellsrenderer: function (row, column, value) {
                                          return "<div style='margin:4px;'>" + (value + 1) + "</div>";
                                        }
                                    },
                                    { text: 'Дата', filtertype: 'date', datafield: 'NextDate', width: 110, cellsformat: 'dd.MM.yyyy'},
                                    { text: 'Наименование', datafield: 'FullName', width: 250},
                                    { text: 'Ответственный', datafield: 'ResponsibleName', width: 150},
                                    { text: 'Сегмент', datafield: 'SegmentName', width: 150},
                                    { text: 'ПОДСегмент', datafield: 'SubSegmentName', width: 150},
                                    { text: 'Адрес', datafield: 'Address', width: 250},
                                    { text: 'Заявка', datafield: 'Demand_id', width: 100},
                                    { text: 'Тип', datafield: 'ContactName', width: 150},
                                    { text: 'Этап', datafield: 'StageName', width: 100},
                                    { text: 'Продолжительность этапа', datafield: 'DIFF_STR', width: 200},
                                    { text: 'Дата посл. контакта', filtertype: 'date', datafield: 'LastDateContact', width: 110, cellsformat: 'dd.MM.yyyy'},
                                    { text: 'Стутас ОП', datafield: 'StatusOP', width: 100},
                                    { text: 'Запланированное дейтсвие', datafield: 'NextAction', width: 200},
                                ]
                    }));
                    $('#btnProgress').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnAddAction').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnExport').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnAddValuableInstruction').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    
                    $('#btnProgress').on('click', function() {
                        $("#DiaryHeaderText").html("Ход работы");
                        $('#DiaryDialog').jqxWindow({ height: 600, width: 1000});    
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('ExecutorReports/Index')) ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                Form_id: ActionsGridCurrentRow.Form_id,
                                Demand_id: ActionsGridCurrentRow.Demand_id
                            },
                            success: function(Res) {
                                Res = JSON.parse(Res);
                                $("#BodyDiaryDialog").html(Res.html);
                                $('#DiaryDialog').jqxWindow('open');
                            },
                            error: function(Res) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                            }
                        });
                    });
                    
                    $('#btnAddValuableInstruction').on('click', function() {
                        $('#DiaryDialog').jqxWindow({ height: 370, width: 600});
                        $("#DiaryHeaderText").html("Ценные указания");

                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('ValuableInstructions/Create')) ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                Params: {
                                    Form_id: ActionsGridCurrentRow.Form_id,
                                    Demand_id: ActionsGridCurrentRow.Demand_id
                                }
                            },
                            success: function(Res) {
                                Res = JSON.parse(Res);
                                $("#BodyDiaryDialog").html(Res.html);
                                $('#DiaryDialog').jqxWindow('open');
                            },
                            error: function(Res) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                            }
                        });
                    });
                    
                    break;
                case 1:
                    $("#ReservActionsGrid").jqxGrid(
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
                                    { text: '#', sortable: false, filterable: false, editable: false, groupable: false, draggable: false, resizable: false,
                                      datafield: '', columntype: 'number', width: 50,
                                        cellsrenderer: function (row, column, value) {
                                          return "<div style='margin:4px;'>" + (value + 1) + "</div>";
                                        }
                                    },
                                    { text: 'Дата', filtertype: 'date', datafield: 'NextDate', width: 110, cellsformat: 'dd.MM.yyyy'},
                                    { text: 'Наименование', datafield: 'FullName', width: 250},
                                    { text: 'Ответственный', datafield: 'ResponsibleName', width: 150},
                                    { text: 'Сегмент', datafield: 'SegmentName', width: 150},
                                    { text: 'ПОДСегмент', datafield: 'SubSegmentName', width: 150},
                                    { text: 'Адрес', datafield: 'Address', width: 250},
                                    { text: 'Заявка', datafield: 'Demand_id', width: 100},
                                    { text: 'Тип', datafield: 'ContactName', width: 150},
                                    { text: 'Этап', datafield: 'StageName', width: 100},
                                    { text: 'Продолжительность этапа', datafield: 'DIFF_STR', width: 200},
                                    { text: 'Дата посл. контакта', filtertype: 'date', datafield: 'LastDateContact', width: 110, cellsformat: 'dd.MM.yyyy'},
                                    { text: 'Стутас ОП', datafield: 'StatusOP', width: 100},
                                    { text: 'Запланированное дейтсвие', datafield: 'NextAction', width: 200},
                                ]
                    }));
                    $('#btnReservProgress').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnReservAddAction').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnReservExport').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#edFiltering').click();
                    break;
                case 2:
                    var InstructionsGridCurrentRow;
                    $("#ValuableInstructionsGrid").on('rowselect', function (event) {
                        InstructionsGridCurrentRow = $('#ValuableInstructionsGrid').jqxGrid('getrowdata', event.args.rowindex);
                    });
                    
                    $("#ValuableInstructionsGrid").jqxGrid(
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
                                    { text: 'Дата', filtertype: 'date', datafield: 'DateCreate', width: 110, cellsformat: 'dd.MM.yyyy'},
                                    { text: 'Получатель', datafield: 'ShortName', width: 150},
                                    { text: 'План. дата вып.', filtertype: 'date', datafield: 'DatePlanExec', width: 110, cellsformat: 'dd.MM.yyyy'},
                                    { text: 'Содержание ЦУ', datafield: 'Instruction', width: 250},
                                    { text: 'Комментарии к вып. ЦУ', datafield: 'Note', width: 250},
                                    { text: 'Автор', datafield: 'CreatorShortName', width: 150},
                                    { text: 'Факт дата вып.', filtertype: 'date', datafield: 'DateExec', width: 110, cellsformat: 'dd.MM.yyyy'},
                                ]
                    }));
                    
                    $('#btnEditValuableInstruction').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnDelValuableInstruction').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#edFiltering').click();
                    
                    $('#btnEditValuableInstruction').on('click', function() {
                        $("#DiaryHeaderText").html("Ценные указания");
                        $('#DiaryDialog').jqxWindow({ height: 650, width: 900});
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('ValuableInstructions/Update')) ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                Instruction_id: InstructionsGridCurrentRow.Instruction_id,
                            },
                            success: function(Res) {
                                Res = JSON.parse(Res);
                                $("#BodyDiaryDialog").html(Res.html);
                                $('#DiaryDialog').jqxWindow('open');
                            },
                            error: function(Res) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                            }
                        });
                    });
                    break;
            }
        };
        
        $('#Tabs').jqxTabs({ width: 'calc(100% - 2px)', height: 'calc(100% - 2px)', initTabContent: initWidgets});
        
        
    });
</script>    

<?php $this->setPageTitle('Ежедневник'); ?>

<div class="al-row">
    <div class="al-row-column"><div id="cmbExecutor" ></div></div>
    <div class="al-row-column">
        <div>
            <div class="al-row-column" style="width: 100px">Горячих:</div>
            <div class="al-row-column"><input type="text" id="edStatisticsInfo1"/></div>
            <div style="clear: both"></div>
        </div>
        <div>
            <div class="al-row-column" style="width: 100px">Теплых:</div>
            <div class="al-row-column"><input type="text" id="edStatisticsInfo2"/></div>
            <div style="clear: both"></div>
        </div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row-column">
        <div>
            <div class="al-row-column" style="width: 100px">Холодных:</div>
            <div class="al-row-column"><input type="text" id="edStatisticsInfo3"/></div>
            <div style="clear: both"></div>
        </div>
        <div>
            <div class="al-row-column" style="width: 100px">Хронических:</div>
            <div class="al-row-column"><input type="text" id="edStatisticsInfo4"/></div>
            <div style="clear: both"></div>
        </div>
        <div style="clear: both"></div>
    </div>
    <div style="clear: both"></div>
</div>

<div class="al-row" style="height: calc(100% - 82px)">
    <div id='Tabs'>
        <ul>
            <li style="margin-left: 30px;">
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Ежедневник</div>
                </div>
            </li>
            <li style="margin-left: 0px;">
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Резерв</div>
                </div>
            </li>
            <li style="margin-left: 0px;">
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">ЦУ</div>
                </div>
            </li>
        </ul>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: 100%">
                <div class="al-row" style="height: calc(100% - 62px)">
                    <div id="ActionsGrid"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column">
                        <div class="al-row-column"><input type="button" id="btnProgress" value="Ход работы"/></div>
                        <div class="al-row-column"><input type="button" id="btnAddAction" value="Действие"/></div>
                        <div class="al-row-column"><input type="button" id="btnExport" value="Экспорт"/></div>
                        <div class="al-row-column"><input type="button" id="btnAddValuableInstruction" value="Добавить ЦУ"/></div>
                    </div>
                    <div style="clear: both"></div>
                </div>
            </div>
            
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: 100%">
                <div class="al-row" style="height: calc(100% - 62px)">
                    <div id="ReservActionsGrid"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column">
                        <div class="al-row-column"><input type="button" id="btnReservProgress" value="Ход работы"/></div>
                        <div class="al-row-column"><input type="button" id="btnReservAddAction" value="Действие"/></div>
                        <div class="al-row-column"><input type="button" id="btnReservExport" value="Экспорт"/></div>
                    </div>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: 100%">
                <div class="al-row" style="height: calc(100% - 62px)">
                    <div id="ValuableInstructionsGrid"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column">
                        <div class="al-row-column"><input type="button" id="btnEditValuableInstruction" value="Изменить ЦУ"/></div>
                        <div class="al-row-column"><input type="button" id="btnDelValuableInstruction" value="Удалить ЦУ"/></div>
                    </div>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<div id="DiaryDialog" style="display: none;">
    <div id="DiaryDialogHeader">
        <span id="DiaryHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogDiaryContent">
        <div style="" id="BodyDiaryDialog"></div>
    </div>
</div>