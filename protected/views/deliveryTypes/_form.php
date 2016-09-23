<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var DeliveryType = {
            dltp_id: <?php echo json_encode($model->dltp_id); ?>,
            DeliveryType: <?php echo json_encode($model->DeliveryType); ?>
        };
        
        $('#DeliveryTypes').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        $("#edDeliveryType").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 300} ));
        $('#btnSaveDeliveryType').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelDeliveryType').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelDeliveryType').on('click', function(){
            $('#DeliveryTypesDialog').jqxWindow('close');
        });
        
        $('#btnSaveDeliveryType').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('DeliveryTypes/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('DeliveryTypes/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#DeliveryTypes').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('dltp_id', Res.id, '#DeliveryTypesGrid', true);
                        $('#DeliveryTypesDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyDeliveryTypesDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (DeliveryType.DeliveryType != '') $("#edDeliveryType").jqxInput('val', DeliveryType.DeliveryType);
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'DeliveryTypes',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="DeliveryTypes[dltp_id]" value="<?php echo $model->dltp_id; ?>"/>
<div class="row">
    <div class="row-column">Неисправность:</div>
    <div class="row-column"><input type="text" name="DeliveryTypes[DeliveryType]" autocomplete="off" id="edDeliveryType"/><?php echo $form->error($model, 'DeliveryType'); ?></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveDeliveryType'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelDeliveryType'/></div>
</div>
<?php $this->endWidget(); ?>



