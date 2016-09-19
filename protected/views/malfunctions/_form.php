<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var Malfunction = {
            Malfunction_id: <?php echo json_encode($model->Malfunction_id); ?>,
            Malfunction: <?php echo json_encode($model->Malfunction); ?>
        };
        
        $('#Malfunctions').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        $("#edMalfunction").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 300} ));
        $('#btnSaveMalfunction').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelMalfunction').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelMalfunction').on('click', function(){
            $('#MalfunctionsDialog').jqxWindow('close');
        });
        
        $('#btnSaveMalfunction').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('Malfunctions/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('Malfunctions/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#Malfunctions').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('Malfunction_id', Res.id, '#MalfunctionsGrid', true);
                        $('#MalfunctionsDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyMalfunctionsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (Malfunction.Malfunction != '') $("#edMalfunction").jqxInput('val', Malfunction.Malfunction);
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Malfunctions',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="Malfunctions[Malfunction_id]" value="<?php echo $model->Malfunction_id; ?>"/>
<div class="row">
    <div class="row-column">Неисправность:</div>
    <div class="row-column"><input type="text" name="Malfunctions[Malfunction]" autocomplete="off" id="edMalfunction"/><?php echo $form->error($model, 'Malfunction'); ?></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveMalfunction'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelMalfunction'/></div>
</div>
<?php $this->endWidget(); ?>



