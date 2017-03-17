<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var Option = {
            Option_id: <?php echo json_encode($model->Option_id); ?>,
            Inspection_id: <?php echo json_encode($model->Inspection_id); ?>,
            Option: <?php echo json_encode($model->Option); ?>,
        };
        
        $('#InspActOptions').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        $('#edOptionEdit').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { placeHolder: '', height: 50, width: 'calc(100% - 2px)', minLength: 1}));
        $('#btnSaveInspActOptions').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: false }));
        $('#btnCancelInspActOptions').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelInspActOptions').on('click', function(){
            if ($('#InspectionActDialog').length>0)
                $('#InspectionActDialog').jqxWindow('close');
        });
        
        $('#btnSaveInspActOptions').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('InspActOptions/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('InspActOptions/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#InspActOptions').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        InspAct.Option_id = Res.id;
                        if ($('#InspectionActDialog').length>0) {
                            $('#btnRefreshOptions').click();
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
        
        
        
        if (Option.Option != null) $("#edOptionEdit").jqxTextArea('val', Option.Option);
    });
</script>        

<?php
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'InspActOptions',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="InspActOptions[Option_id]" value="<?php echo $model->Option_id; ?>"/>
<input type="hidden" name="InspActOptions[Inspection_id]" value="<?php echo $model->Inspection_id; ?>"/>

<div class="row">
    <div>Варианты модернизаций</div>
    <textarea name="InspActOptions[Option]" id="edOptionEdit"></textarea>
    <?php echo $form->error($model, 'Option'); ?>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveInspActOptions'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelInspActOptions'/></div>
</div>
<?php $this->endWidget(); ?>



