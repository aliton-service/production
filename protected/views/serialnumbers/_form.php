<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var SerialNumber = {
            srnm_id: <?php echo json_encode($model->srnm_id); ?>,
            dadt_id: <?php echo json_encode($model->dadt_id); ?>,
            SN: <?php echo json_encode($model->SN); ?>
        };
        
        $('#SerialNumbers').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        $("#edSN").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Наименование", width: 300} ));
        $('#btnSaveSerialNumber').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelSerialNumber').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelSerialNumber').on('click', function(){
            $('#SerialNumbersDialog').jqxWindow('close');
        });
        
        $('#btnSaveSerialNumber').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('SerialNumbers/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('SerialNumbers/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#SerialNumbers').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('srnm_id', Res.id, '#SerialNumbersGrid', true);
                        $('#SerialNumbersDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodySerialNumbersDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (SerialNumber.SN != '') $("#edSN").jqxInput('val', SerialNumber.SN);
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'SerialNumbers',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="SerialNumbers[srnm_id]" value="<?php echo $model->srnm_id; ?>"/>
<input type="hidden" name="SerialNumbers[dadt_id]" value="<?php echo $model->dadt_id; ?>"/>

<div class="row">
    <div class="row-column">Серийный номер:</div>
    <div class="row-column"><input type="text" name="SerialNumbers[SN]" autocomplete="off" id="edSN"/><?php echo $form->error($model, 'SN'); ?></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveSerialNumber'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelSerialNumber'/></div>
</div>
<?php $this->endWidget(); ?>



