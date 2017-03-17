<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var Remark = {
            Remark_id: <?php echo json_encode($model->Remark_id); ?>,
            Inspection_id: <?php echo json_encode($model->Inspection_id); ?>,
            Remark: <?php echo json_encode($model->Remark); ?>,
        };
        
        $('#InspActRemarks').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        $('#edRemarkEdit').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { placeHolder: '', height: 50, width: 'calc(100% - 2px)', minLength: 1}));
        $('#btnSaveInspActRemarks').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: false }));
        $('#btnCancelInspActRemarks').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelInspActRemarks').on('click', function(){
            if ($('#InspectionActDialog').length>0)
                $('#InspectionActDialog').jqxWindow('close');
        });
        
        $('#btnSaveInspActRemarks').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('InspActRemarks/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('InspActRemarks/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#InspActRemarks').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        InspAct.Remark_id = Res.id;
                        if ($('#InspectionActDialog').length>0) {
                            $('#btnRefreshRemarks').click();
                            $('#InspectionActDialog').jqxWindow('close');
                            
                        }
                    }
                    else {
                        if ($('#InspectionActDialog').length>0)
                            $('#BodyInspectionActDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        
        
        if (Remark.Remark != null) $("#edRemarkEdit").jqxTextArea('val', Remark.Remark);
    });
</script>        

<?php
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'InspActRemarks',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="InspActRemarks[Remark_id]" value="<?php echo $model->Remark_id; ?>"/>
<input type="hidden" name="InspActRemarks[Inspection_id]" value="<?php echo $model->Inspection_id; ?>"/>

<div class="row">
    <div>Замечания</div>
    <textarea name="InspActRemarks[Remark]" id="edRemarkEdit"></textarea>
    <?php echo $form->error($model, 'Remark'); ?>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveInspActRemarks'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelInspActRemarks'/></div>
</div>
<?php $this->endWidget(); ?>



