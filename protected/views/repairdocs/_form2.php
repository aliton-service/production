<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var RepairDocs = {
            rpdoc_id: <?php echo json_encode($model->rpdoc_id); ?>,
            repr_id: <?php echo json_encode($model->repr_id); ?>,
            dctp_id: <?php echo json_encode($model->dctp_id); ?>,
            number: <?php echo json_encode($model->number); ?>,
            date: Aliton.DateConvertToJs(<?php echo json_encode($model->date); ?>),
            empl_id: <?php echo json_encode($model->empl_id); ?>,
            splr_id: <?php echo json_encode($model->splr_id); ?>,
            diagnostics: <?php echo json_encode($model->diagnostics); ?>,
            diagnostics_sum: <?php echo json_encode($model->diagnostics_sum); ?>,
            sum: <?php echo json_encode($model->sum); ?>,
            defect: <?php echo json_encode($model->defect); ?>,
            result: <?php echo json_encode($model->result); ?>,
            contact_person: <?php echo json_encode($model->contact_person); ?>,
            note: <?php echo json_encode($model->note); ?>,
        };
        
        $('#RepairDocs').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        $("#edNumberDocEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {width: '124px'}));
        $("#edDateDocEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, value: RepairDocs.date}));
        $('#edDefectDocEdit').jqxTextArea($.extend(true, TextAreaDefaultSettings, { height: 50, width: 'calc(100% - 2px)', minLength: 1}));
        $('#edResultDocEdit').jqxTextArea($.extend(true, TextAreaDefaultSettings, { height: 50, width: 'calc(100% - 2px)', minLength: 1}));
        
        $('#btnSaveRepairDocs').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: false }));
        $('#btnCancelRepairDocs').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        
        $('#btnCancelRepairDocs').on('click', function(){
            if ($('#RepairsDialog').length>0)
                $('#RepairsDialog').jqxWindow('close');
        });
        
        $('#btnSaveRepairDocs').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('RepairDocs/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('RepairDocs/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#RepairDocs').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('rpdoc_id', Res.id, '#GridDocuments', true);
                        if ($('#RepairsDialog').length>0)
                            $('#RepairsDialog').jqxWindow('close');
                    }
                    else {
                        if ($('#RepairsDialog').length>0)
                            $('#BodyRepairsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (RepairDocs.number != '') $("#edNumberDocEdit").jqxInput('val', RepairDocs.number);
        if (RepairDocs.defect != '') $("#edDefectDocEdit").jqxTextArea('val', RepairDocs.defect);
        if (RepairDocs.result != '') $("#edResultDocEdit").jqxTextArea('val', RepairDocs.result);
        
    });
</script>        

<?php
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'RepairDocs',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="RepairDocs[rpdoc_id]" value="<?php echo $model->rpdoc_id; ?>"/>
<input type="hidden" name="RepairDocs[repr_id]" value="<?php echo $model->repr_id; ?>"/>
<input type="hidden" name="RepairDocs[dctp_id]" value="<?php echo $model->dctp_id; ?>"/>

<div class="al-row">
    <div class="al-row-column">Номер</div>
    <div class="al-row-column"><input type="text" name="RepairDocs[number]" id="edNumberDocEdit" /><?php echo $form->error($model, 'number'); ?></div>
    <div class="al-row-column">Дата</div>
    <div class="al-row-column"><div name="RepairDocs[date]" id="edDateDocEdit" ></div><?php echo $form->error($model, 'date'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column">СРМ</div>
    <div class="al-row-column">СРМ</div>
</div>    
<div class="al-row">Дефекты выявленные в ходе обследования</div>
<div class="al-row"><textarea id="edDefectDocEdit" name="RepairDocs[defect]"></textarea><?php echo $form->error($model, 'defect'); ?></div>
<div class="al-row">Заключение инженера ПРЦ</div>
<div class="al-row"><textarea id="edResultDocEdit" name="RepairDocs[result]"></textarea><?php echo $form->error($model, 'result'); ?></div>

   
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveRepairDocs'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelRepairDocs'/></div>
</div>
<?php $this->endWidget(); ?>





