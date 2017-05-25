<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var ValuableInstruction = {
            Instruction_id: <?php echo json_encode($model->Instruction_id); ?>,
            Form_id: <?php echo json_encode($model->Form_id); ?>,
            Demand_id: <?php echo json_encode($model->Demand_id); ?>,
            Empl_id: <?php echo json_encode($model->Empl_id); ?>,
            DatePlanExec: Aliton.DateConvertToJs(<?php echo json_encode($model->DatePlanExec); ?>),
            ValuableInstruction: <?php echo json_encode($model->Instruction); ?>,
            Executor_id: <?php echo json_encode($model->Executor_id); ?>,
            DateExec: Aliton.DateConvertToJs(<?php echo json_encode($model->DateExec); ?>),
            Note: <?php echo json_encode($model->Note); ?>,
        };
        
        var SalesDemand = <?php echo json_encode($SalesDemand); ?>;
        
        $('#ValuableInstructions').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        
        $("#edValuableDemand_id").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 100, value: SalesDemand.Demand_id}));
        $("#edValuableDemandType").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 150, value: SalesDemand.DemandType}));
        $("#edValuableAddress").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 200, value: SalesDemand.Address}));
        $("#edValuableStage").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 150, value: SalesDemand.StageName}));
        $("#edValuableExecutors").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 150, value: SalesDemand.ExecutorsName}));
        $("#edValuableDemandText").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 500, value: SalesDemand.DemandText}));
        
        $('#ValuableTabs').jqxTabs({ width: 'calc(100% - 2px)', height: 'calc(100% - 2px)', keyboardNavigation: false});
        
        var DataExecutorReports = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceClientActions, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["(er.Demand_id = " + ValuableInstruction.Demand_id + " or er.Form_id = " + ValuableInstruction.Form_id + ")"],
                });
                return data;
            },
        });
        
        $("#ValuableProgGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: 'calc(100% - 2px)',
                width: 'calc(100% - 2px)',
                pageable: false,
                sortable: true,
                //autorowheight: true,
                virtualmode: false,
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
        
        var DataDemandsExecutors = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDemandsExecutors, {}), {
            formatData: function (data) {
                if (ValuableInstruction.Demand_id == 0)
                    var D = -1;
                else 
                    var D = ValuableInstruction.Demand_id;
                $.extend(data, {
                    Filters: ["de.Demand_id = " + D],
                });
                return data;
            },
        });
        $("#ValuableExecutorsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: 'calc(100% - 2px)',
                width: 'calc(100% - 2px)',
                sortable: true,
                virtualmode: false,
                pageable: false,
                showfilterrow: false,
                filterable: false,
                autoshowfiltericon: true,
                source: DataDemandsExecutors,
                columns:
                [
                    { text: 'Исполнитель', filtertype: 'range', datafield: 'EmployeeName', width: 250 },
                    { text: 'Дата сообщения', datafield: 'Date', width: 150, cellsformat: 'dd.MM.yyyy HH:mm'},
                ]
        }));
        
        var DemandDocumentsExecutors = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDemandDocuments, {}), {
            formatData: function (data) {
                if (ValuableInstruction.Demand_id == 0)
                    var D = -1;
                else 
                    var D = ValuableInstruction.Demand_id;
                $.extend(data, {
                    Variables: {Demand_id: D},
                });
                return data;
            },
        });
        $("#ValuableDocumentsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: 'calc(100% - 2px)',
                width: 'calc(100% - 2px)',
                sortable: true,
                virtualmode: false,
                pageable: false,
                showfilterrow: false,
                filterable: false,
                autoshowfiltericon: true,
                source: DemandDocumentsExecutors,
                columns:
                [
                    { text: 'Тип документа', filtertype: 'range', datafield: 'DocType', width: 180 },
                    { text: 'Номер', filtertype: 'range', datafield: 'Number', width: 100 },
                    { text: 'Дата выполнения', datafield: 'DateExec', width: 150, cellsformat: 'dd.MM.yyyy HH:mm'},
                    { text: 'Дата', datafield: 'DateReg', width: 150, cellsformat: 'dd.MM.yyyy HH:mm'},
                    { text: 'Оплачено', datafield: 'Procpay', width: 150, cellsformat: 'p'},
                    { text: 'Текст', filtertype: 'range', datafield: 'Note', width: 100 },

                ]
        }));
        
        $("#cmbValuableEmpl").jqxComboBox({ source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"});
        $("#edValuableDatePlanExec").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '150px', value: ValuableInstruction.DatePlanExec}));
        $('#edValuableInstructionEdit').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { placeHolder: '', height: 50, width: 'calc(100% - 2px)', minLength: 1}));
        $("#cmbValuableExecutor").jqxComboBox({ source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"});
        $("#edValuableDateExec").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '150px', value: ValuableInstruction.DateExec}));
        $('#edValuableNoteEdit').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { placeHolder: '', height: 50, width: 'calc(100% - 2px)', minLength: 1}));
        $('#btnSaveValuableInstructions').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: false }));
        $('#btnCancelValuableInstructions').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelValuableInstructions').on('click', function(){
            if ($('#DiaryDialog').length>0)
                $('#DiaryDialog').jqxWindow('close');
        });
        
        $('#btnSaveValuableInstructions').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('ValuableInstructions/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('ValuableInstructions/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#ValuableInstructions').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        if ($('#DiaryDialog').length>0) {
                            $('#DiaryDialog').jqxWindow('close');
                            CheckINS();
                        }
                    }
                    else {
                        if ($('#DiaryDialog').length>0)
                            $('#BodyDiaryDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (ValuableInstruction.Empl_id != null) $("#cmbValuableEmpl").jqxComboBox('val', ValuableInstruction.Empl_id);
        if (ValuableInstruction.ValuableInstruction != null) $("#edValuableInstructionEdit").jqxTextArea('val', ValuableInstruction.ValuableInstruction);
        if (ValuableInstruction.Executor_id != null) $("#cmbValuableExecutor").jqxComboBox('val', ValuableInstruction.Executor_id);
        if (ValuableInstruction.Note != null) $("#edValuableNoteEdit").jqxTextArea('val', ValuableInstruction.Note);
    });
</script>        

<?php
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ValuableInstructions',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="ValuableInstructions[Instruction_id]" value="<?php echo $model->Instruction_id; ?>"/>
<input type="hidden" name="ValuableInstructions[Form_id]" value="<?php echo $model->Form_id; ?>"/>
<input type="hidden" name="ValuableInstructions[Demand_id]" value="<?php echo $model->Demand_id; ?>"/>

<div class="al-row" style="padding: 0px">
    <div class="al-row-column">
        <div>Заявка</div>
        <div><input id='edValuableDemand_id' readonly="readonly" /></div>
    </div>
    <div class="al-row-column">
        <div>Тип</div>
        <div><input id='edValuableDemandType' readonly="readonly" /></div>
    </div>
    <div class="al-row-column">
        <div>Адрес</div>
        <div><input id='edValuableAddress' readonly="readonly" /></div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row" style="padding: 0px">
    <div class="al-row-column">
        <div>Этап</div>
        <div><input id='edValuableStage' readonly="readonly" /></div>
    </div>
    <div class="al-row-column">
        <div>Исполнители</div>
        <div><input id='edValuableExecutors' readonly="readonly" /></div>
    </div>
    <div class="al-row-column">
        <div>Информация</div>
        <div><input id='edValuableDemandText' readonly="readonly" /></div>
    </div>
    <div style="clear: both"></div>
</div>

<div class="al-row" style="height: 180px">
    <div id='ValuableTabs'>
        <ul>
            <li style="margin-left: 20px;">
                <div style="height: 15px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Ход работы</div>

                </div>
            </li>
            <li style="margin-left: 0px;">
                <div style="height: 15px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Исполнители</div>

                </div>
            </li>
            <li style="margin-left: 0px;">
                <div style="height: 15px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Документы</div>

                </div>
            </li>
        </ul>
        <div style="overflow: hidden; padding: 10px">
            <div style="height: calc(100% - 20px)">
                <div id="ValuableProgGrid"></div>
            </div>
        </div>
        <div style="overflow: hidden; padding: 10px">
            <div style="height: calc(100% - 20px)">
                <div id="ValuableExecutorsGrid"></div>
            </div>
        </div>
        <div style="overflow: hidden; padding: 10px">
            <div style="height: calc(100% - 20px)">
                <div id="ValuableDocumentsGrid"></div>
            </div>
        </div>
    </div>
</div>

<div class="al-row" >
    <div class="al-row-column">
        <div>Назначить получателя ЦУ</div>
        <div><div id='cmbValuableEmpl' name='ValuableInstructions[Empl_id]'></div><?php echo $form->error($model, 'Empl_id'); ?></div>
        
    </div>
    <div class="al-row-column">
        <div>Назначить дату вып. ЦУ</div>
        <div><div id='edValuableDatePlanExec' name='ValuableInstructions[DatePlanExec]'></div><?php echo $form->error($model, 'DatePlanExec'); ?></div>
    </div>
    <div style="clear: both"></div>
</div>    
<div class="al-row">
    <div>Содержание ЦУ</div>
    <div><textarea name="ValuableInstructions[Instruction]" id="edValuableInstructionEdit"></textarea></div>
    <?php echo $form->error($model, 'Instruction'); ?>
    <div style="clear: both"></div>
</div>
<hr />
<div class="al-row">
    <div class="al-row-column">
        <div>Исполнитель ЦУ</div>
        <div><div id='cmbValuableExecutor' name='ValuableInstructions[Executor_id]'></div><?php echo $form->error($model, 'Executor_id'); ?></div>
    </div>
    <div class="al-row-column">
        <div>Дата вып. ЦУ</div>
        <div><div id='edValuableDateExec' name='ValuableInstructions[DateExec]'></div><?php echo $form->error($model, 'DateExec'); ?></div>
    </div>
    <div style="clear: both"></div>
</div>    
<div class="al-row">
    <div>Отчет</div>
    <div><textarea name="ValuableInstructions[Note]" id="edValuableNoteEdit"></textarea></div>
    <?php echo $form->error($model, 'Note'); ?>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Сохранить" id='btnSaveValuableInstructions'/></div>
    <div class="al-row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelValuableInstructions'/></div>
</div>
<?php $this->endWidget(); ?>



