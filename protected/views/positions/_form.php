<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var Position = {
            Position_id: <?php echo json_encode($model->Position_id); ?>,
            PositionName: <?php echo json_encode($model->PositionName); ?>
        };
        
        $('#Positions').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        $("#edPositionName").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Наименование", width: 300} ));
        $('#btnSavePosition').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelPosition').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelPosition').on('click', function(){
            $('#PositionsDialog').jqxWindow('close');
        });
        
        $('#btnSavePosition').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('Positions/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('Positions/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#Positions').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('Position_id', Res.id, '#PositionsGrid', true);
                        $('#PositionsDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyPositionsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (Position.PositionName != '') $("#edPositionName").jqxInput('val', Position.PositionName);
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Positions',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="Positions[Position_id]" value="<?php echo $model->Position_id; ?>"/>
<div class="row">
    <div class="row-column">Наименование:</div>
    <div class="row-column"><input type="text" name="Positions[PositionName]" autocomplete="off" id="edPositionName"/><?php echo $form->error($model, 'PositionName'); ?></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSavePosition'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelPosition'/></div>
</div>
<?php $this->endWidget(); ?>



