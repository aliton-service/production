<script>
    $(document).ready(function () {
        var Demand = {
            Form_id: <?php echo json_encode($Form_id); ?>,
            Demand_id: <?php echo json_encode($Demand_id); ?>,
            DemandType: <?php echo json_encode($model->DemandType); ?>,
            Address: <?php echo json_encode($model->Address); ?>,
            Stage: <?php echo json_encode($model->StageName); ?>,
            DemandText: <?php echo json_encode($model->DemandText); ?>,
            ExecutorsName: <?php echo json_encode($model->ExecutorsName); ?>,
        };
        $('#edDemand_id').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 100, value: Demand.Demand_id}));
        $('#edDemandType').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 180, value: Demand.DemandType}));
        $('#edAddress').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 180, value: Demand.Address}));
        $('#edStage').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 100, value: Demand.Stage}));
        $('#edInformation').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 500, value: Demand.DemandText}));
        $('#edInformation').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 500, value: Demand.DemandText}));
        $('#edExecutors').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 150, value: Demand.ExecutorsName}));
        
        $('#Tabs2').jqxTabs({ width: '100%', height: '100%', keyboardNavigation: false});
        
        var CurrentRowDataER;

        var DataExecutorReports = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceClientActions, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["(er.Demand_id = " + Demand.Demand_id + " or er.Form_id = " + Demand.Form_id + ")"],
                });
                return data;
            },
        });
        $("#ProgGrid").on('rowselect', function (event) {
            CurrentRowDataER = $('#ProgGrid').jqxGrid('getrowdata', event.args.rowindex);
        });

        $("#ProgGrid").on('rowdoubleclick', function(){
            $('#ActionsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {width: 900, height: 824, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('ExecutorReports/Update')) ?>,
                type: 'POST',
                async: false,
                data: {
                    Exrp_id: CurrentRowDataER.Exrp_id,
                    Form_id: Demand.Form_id,
                    Demand_id: Demand.Demand_id,
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyActionsDialog").html(Res.html);
                    $('#ActionsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $("#ProgGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: 'calc(100% - 2px)',
                width: 'calc(100% - 2px)',
                sortable: true,
                autorowheight: true,
                virtualmode: false,
                pageable: true,
                showfilterrow: false,
                filterable: false,
                autoshowfiltericon: true,
                source: DataExecutorReports,
                enablebrowserselection: true,
                columns:
                [
                    { text: 'Дата сообщения', datafield: 'Date', width: 140, cellsformat: 'dd.MM.yyyy HH:mm'},
                    { text: 'Администрирующий', datafield: 'EmployeeName', width: 140 },
                    { text: 'План. дата вып.', /* filtertype: 'range' ,*/ datafield: 'PlanDateExec', width: 120, cellsformat: 'dd.MM.yyyy' },
                    { text: 'Этап', datafield: 'StageName', width: 100 },
                    { text: 'Тип контакта', datafield: 'ContactName', width: 100 },
                    { text: 'Действие', datafield: 'ActionOperationName', width: 100 },
                    { text: 'Результат', datafield: 'ActionResultName', width: 100 },
                    { text: 'Ответственный', datafield: 'ResponsibleName', width: 100 },
                    { text: 'Конт. лицо', datafield: 'FIO', width: 100 },
                    { text: 'Исполнители', datafield: 'OtherName', width: 100 },
                    { text: 'Комментарий', filtertype: 'range', datafield: 'Report', width: 400 },
                    { text: 'Планируемое дейссвие', filtertype: 'range', datafield: 'NextAction', width: 200 },
                ]
        }));
        
        $('#btnCloseProg').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnNewAction').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 180, height: 30 }));           
        
        $('#btnCloseProg').on('click', function() {
            if ($("#DiaryDialog").length>0)
                $("#DiaryDialog").jqxWindow('close');
        });
        
        $('#btnNewAction').on('click', function() {
            $('#ActionsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {width: 900, height: 824, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('ExecutorReports/Insert')) ?>,
                type: 'POST',
                async: false,
                data: {
                    Form_id: Demand.Form_id,
                    Demand_id: Demand.Demand_id,
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyActionsDialog").html(Res.html);
                    $('#ActionsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        
    });
</script>

<div class="al-row">
    <div class="al-row-column">
        <div>Заявка</div>
        <div><input type="text" id="edDemand_id" /></div>
    </div>
    <div class="al-row-column">
        <div>Тип</div>
        <div><input type="text" id="edDemandType" /></div>
    </div>
    <div class="al-row-column">
        <div>Адрес</div>
        <div><input type="text" id="edAddress" /></div>
    </div>
    <div class="al-row-column">
        <div>Этап</div>
        <div><input type="text" id="edStage" /></div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column">
        <div>Информация</div>
        <div><input type="text" id="edInformation" /></div>
    </div>
    <div class="al-row-column">
        <div>Исполнители</div>
        <div><input type="text" id="edExecutors" /></div>
    </div>
    <div style="clear: both"></div>
</div>



<div class="al-row" style="height: calc(100% - 170px)">
    <div id='Tabs2'>
        <ul>
            <li style="margin-left: 20px;">
                <div style="height: 15px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Ход работы</div>

                </div>
            </li>
        </ul>
        <div style="overflow: hidden; padding: 10px">
            <div style="height: calc(100% - 20px)">
                <div id="ProgGrid"></div>
            </div>
        </div>
    </div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" id="btnNewAction" value="Добавить запись"/></div>
    <div class="al-row-column" style="float: right;"><input type="button" id="btnCloseProg" value="Закрыть"/></div>
</div>

<div id="ActionsDialog" style="display: none;">
    <div id="ActionsDialogHeader">
        <span id="ActionsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogActionsContent">
        <div style="" id="BodyActionsDialog"></div>
    </div>
</div>



