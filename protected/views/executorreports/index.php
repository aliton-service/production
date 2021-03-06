<script>
    $(document).ready(function () {
        var Demand2 = {
            Form_id: <?php echo json_encode($Form_id); ?>,
            Demand_id: <?php echo json_encode($Demand_id); ?>,
            DemandType: <?php echo json_encode($model->DemandType); ?>,
            Address: <?php echo json_encode($model->Address); ?>,
            Stage: <?php echo json_encode($model->StageName); ?>,
            DemandText: <?php echo json_encode($model->DemandText); ?>,
            ExecutorsName: <?php echo json_encode($model->ExecutorsName); ?>,
        };
        $('#edDemand_id2').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 100, value: Demand2.Demand_id}));
        $('#edDemandType2').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 180, value: Demand2.DemandType}));
        $('#edAddress2').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 180, value: Demand2.Address}));
        $('#edStage2').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 100, value: Demand2.Stage}));
        $('#edInformation2').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 500, value: Demand2.DemandText}));
        //$('#edInformation2').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 500, value: Demand2.DemandText}));
        $('#edExecutors2').jqxInput($.extend(true, {}, InputDefaultSettings, { width: 150, value: Demand2.ExecutorsName}));
        
        $('#Tabs2').jqxTabs($.extend(true, {}, TabsDefaultSettings, { width: '100%', height: '100%', keyboardNavigation: false}));
        
        var CurrentRowDataER;

        var DataExecutorReports = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceClientActions, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["(er.Demand_id = " + Demand2.Demand_id + " or er.Form_id = " + Demand2.Form_id + ")"],
                });
                return data;
            },
        });
        $("#ProgGrid").on('rowselect', function (event) {
            CurrentRowDataER = $('#ProgGrid').jqxGrid('getrowdata', event.args.rowindex);
        });
        
        $("#ProgGrid").on("bindingcomplete", function (event) {
            if (CurrentRowDataER != undefined) 
                Aliton.SelectRowByIdVirtual('Exrp_id', CurrentRowDataER.Exrp_id, '#ProgGrid', false);
            else
                Aliton.SelectRowByIdVirtual('Exrp_id', null, '#ProgGrid', false);
        });
        
        $("#ProgGrid").on('rowdoubleclick', function(){
            $('#ActionsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {width: 900, height: 724, position: 'center'}));
            var mapForm = document.createElement("form");
            mapForm.target = "_blank";    
            mapForm.method = "POST";
            mapForm.action = <?php echo json_encode(Yii::app()->createUrl('ExecutorReports/Update', array('NewWindow' => 1))) ?>;

            // Create an input
            var mapInput = document.createElement("input");
            mapInput.type = "text";
            mapInput.name = "Exrp_id";
            mapInput.value = CurrentRowDataER.Exrp_id;
            var mapInput2 = document.createElement("input");
            mapInput2.type = "text";
            mapInput2.name = "Form_id";
            mapInput2.value = Demand2.Form_id;
            var mapInput3 = document.createElement("input");
            mapInput3.type = "text";
            mapInput3.name = "Demand_id";
            mapInput3.value = Demand2.Demand_id;

            // Add the input to the form
            mapForm.appendChild(mapInput);
            mapForm.appendChild(mapInput2);
            mapForm.appendChild(mapInput3);

            // Add the form to dom
            document.body.appendChild(mapForm);
            mapForm.submit();
//            $.ajax({
//                url: <?php echo json_encode(Yii::app()->createUrl('ExecutorReports/Update', array('NewWindow' => 1))) ?>,
//                type: 'POST',
//                async: false,
//                data: {
//                    Exrp_id: CurrentRowDataER.Exrp_id,
//                    Form_id: Demand2.Form_id,
//                    Demand_id: Demand2.Demand_id,
//                },
//                success: function(Res) {
//                    Res = JSON.parse(Res);
//                    $("#BodyActionsDialog").html(Res.html);
//                    $('#ActionsDialog').jqxWindow('open');
//                },
//                error: function(Res) {
//                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
//                }
//            });
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
        $("#btnRefreshGrid").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 180, height: 30 }));
        $("#btnRefreshGrid").on('click', function() {
            $("#ProgGrid").jqxGrid('updatebounddata');
        });
        
        
        $('#btnCloseProg').on('click', function() {
            if ($("#DiaryDialog").length>0)
                $("#DiaryDialog").jqxWindow('close');
            if ($("#CostCalculationsDialog").length>0)
                $("#CostCalculationsDialog").jqxWindow('close');
        });
        
        $('#btnNewAction').on('click', function() {
            $('#ActionsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {width: 900, height: 724, position: 'center'}));
            var mapForm = document.createElement("form");
            mapForm.target = "_blank";    
            mapForm.method = "POST";
            mapForm.action = <?php echo json_encode(Yii::app()->createUrl('ExecutorReports/Insert', array('NewWindow' => 1))) ?>;

            // Create an input
            var mapInput = document.createElement("input");
            mapInput.type = "text";
            mapInput.name = "Form_id";
            mapInput.value = Demand2.Form_id;
            var mapInput2 = document.createElement("input");
            mapInput2.type = "text";
            mapInput2.name = "Demand_id";
            mapInput2.value = Demand2.Demand_id;

            // Add the input to the form
            mapForm.appendChild(mapInput);
            mapForm.appendChild(mapInput2);

            // Add the form to dom
            document.body.appendChild(mapForm);
            mapForm.submit();
//            $.ajax({
//                url: <?php echo json_encode(Yii::app()->createUrl('ExecutorReports/Insert')) ?>,
//                type: 'POST',
//                async: false,
//                data: {
//                    Form_id: Demand2.Form_id,
//                    Demand_id: Demand2.Demand_id,
//                },
//                success: function(Res) {
//                    Res = JSON.parse(Res);
//                    $("#BodyActionsDialog").html(Res.html);
//                    $('#ActionsDialog').jqxWindow('open');
//                },
//                error: function(Res) {
//                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
//                }
//            });
        });
        
        
    });
</script>

<div class="al-row">
    <div class="al-row-column">
        <div>Заявка</div>
        <div><input type="text" id="edDemand_id2" /></div>
    </div>
    <div class="al-row-column">
        <div>Тип</div>
        <div><input type="text" id="edDemandType2" /></div>
    </div>
    <div class="al-row-column">
        <div>Адрес</div>
        <div><input type="text" id="edAddress2" /></div>
    </div>
    <div class="al-row-column">
        <div>Этап</div>
        <div><input type="text" id="edStage2" /></div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column">
        <div>Информация</div>
        <div><input type="text" id="edInformation2" /></div>
    </div>
    <div class="al-row-column">
        <div>Исполнители</div>
        <div><input type="text" id="edExecutors2" /></div>
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
    <div class="al-row-column"><input type="button" id="btnRefreshGrid" value="Обновить"/></div>
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



