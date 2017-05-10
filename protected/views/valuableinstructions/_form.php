<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var ValuableInstruction = {
            Instruction_id: <?php echo json_encode($model->Instruction_id); ?>,
            Empl_id: <?php echo json_encode($model->Empl_id); ?>,
            DatePlanExec: Aliton.DateConvertToJs(<?php echo json_encode($model->DatePlanExec); ?>),
            ValuableInstruction: <?php echo json_encode($model->Instruction); ?>,
            Executor_id: <?php echo json_encode($model->Executor_id); ?>,
            DateExec: Aliton.DateConvertToJs(<?php echo json_encode($model->DateExec); ?>),
            Note: <?php echo json_encode($model->Note); ?>,
        };
        
        $('#ValuableInstructions').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        if (DataEmployees == undefined)
        {
            var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {}));
        }
        //console.log(DataEmployees);
//        if (DataEmployees.length < 100) {
//            var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {}));
//            DataEmployees.dataBind();
//            
//        }
            
        
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
            if ($('#ObjectsGroupDialog').length>0)
                $('#ObjectsGroupDialog').jqxWindow('close');
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
                        }
                        if ($('#ObjectsGroupDialog').length>0) {
                            $('#ObjectsGroupDialog').jqxWindow('close');
                        }
                        if (typeof(CheckINS) != 'undefined')
                            CheckINS();
                        
                        if ($("#ValuableInstructionsGrid").length>0)
                            $("#ValuableInstructionsGrid").jqxGrid('updatebounddata');
                                                
                    }
                    else {
                        if ($('#DiaryDialog').length>0)
                            $('#BodyDiaryDialog').html(Res.html);
                        if ($('#ObjectsGroupDialog').length>0)
                            $('#BodyObjectsGroupDialog').html(Res.html);
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

<div class="al-row">
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
    <div>Комментарии к выпол. ЦУ</div>
    <div><textarea name="ValuableInstructions[Note]" id="edValuableNoteEdit"></textarea></div>
    <?php echo $form->error($model, 'Note'); ?>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Сохранить" id='btnSaveValuableInstructions'/></div>
    <div class="al-row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelValuableInstructions'/></div>
</div>
<?php $this->endWidget(); ?>



