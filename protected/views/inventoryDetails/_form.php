<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        
        var InventoryDetails = {
            indt_id: '<?php echo $model->indt_id; ?>',
            invn_id: '<?php echo $model->invn_id; ?>',
            quant: '<?php echo $model->quant; ?>',
            quant_used: '<?php echo $model->quant_used; ?>',
        };
        
        $('#InventoryDetails').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        $("#quant").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 80, decimalDigits: 0 }));
        $("#quant_used").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 80, decimalDigits: 0 }));

        $('#btnSaveInventoryDetails').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelInventoryDetails').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelInventoryDetails').on('click', function(){
            $('#InventoryDetailsDialog').jqxWindow('close');
        });
        
        $('#btnSaveInventoryDetails').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('InventoryDetails/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('InventoryDetails/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#InventoryDetails').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Indt_id = Res.id;
                        Aliton.SelectRowById('indt_id', Res.id, '#InventoryDetailsGrid', true);
                        $('#InventoryDetailsDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyInventoryDetailsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (InventoryDetails.quant != '') $("#quant").jqxNumberInput('val', InventoryDetails.quant);
        if (InventoryDetails.quant_used != '') $("#quant_used").jqxNumberInput('val', InventoryDetails.quant_used);
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'InventoryDetails',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="InventoryDetails[indt_id]" value="<?php echo $model->indt_id; ?>"/>
<input type="hidden" name="InventoryDetails[invn_id]" value="<?php echo $model->invn_id; ?>"/>


<div class="row" style="padding: 10px; width: 90%; border: 1px solid #ddd; background-color: #F2F2F2;">
    <div>
        <div class="row" style="margin: 0;">
            <div class="row-column" style="margin-top: 2px;">Количество:</div>
        </div>

        <div class="row">
            <div class="row-column">Новое </div>
            <div class="row-column"><div name="InventoryDetails[quant]" id="quant"/><?php echo $form->error($model, 'quant'); ?></div></div>
        </div>

        <div class="row">
            <div class="row-column">Б/У </div>
            <div class="row-column"><div name="InventoryDetails[quant_used]" id="quant_used"/><?php echo $form->error($model, 'quant_used'); ?></div></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveInventoryDetails'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelInventoryDetails'/></div>
</div>
<?php $this->endWidget(); ?>



