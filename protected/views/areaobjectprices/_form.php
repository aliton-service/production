<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var AreaObjectPrice = {
            AreaObjectPrice_id: <?php echo json_encode($model->AreaObjectPrice_id); ?>,
            StartArea: <?php echo json_encode($model->StartArea); ?>,
            EndArea: <?php echo json_encode($model->EndArea); ?>,
            Price: <?php echo json_encode($model->Price); ?>
        };
        
        $('#AreaObjectPrices').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        $("#edStartArea").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: 100, decimalDigits: 0} ));
        $("#edEndArea").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: 100, decimalDigits: 0} ));
        $("#edPrice").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: 100} ));
        
        $('#btnSaveAreaObjectPrice').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelAreaObjectPrice').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelAreaObjectPrice').on('click', function(){
            $('#AreaObjectPricesDialog').jqxWindow('close');
        });
        
        $('#btnSaveAreaObjectPrice').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('AreaObjectPrices/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('AreaObjectPrices/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#AreaObjectPrices').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('AreaObjectPrice_id', Res.id, '#AreaObjectPricesGrid', true);
                        $('#AreaObjectPricesDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyAreaObjectPricesDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (AreaObjectPrice.StartArea != '') $("#edStartArea").jqxNumberInput('val', AreaObjectPrice.StartArea);
        if (AreaObjectPrice.EndArea != '') $("#edEndArea").jqxNumberInput('val', AreaObjectPrice.EndArea);
        if (AreaObjectPrice.Price != '') $("#edPrice").jqxNumberInput('val', AreaObjectPrice.Price);
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'AreaObjectPrices',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="AreaObjectPrices[AreaObjectPrice_id]" value="<?php echo $model->AreaObjectPrice_id; ?>"/>
<div class="al-row">
    <div class="al-row-column">Площадь от:</div>
    <div class="al-row-column"><div name="AreaObjectPrices[StartArea]" autocomplete="off" id="edStartArea"></div><?php echo $form->error($model, 'StartArea'); ?></div>
    <div class="al-row-column">до</div>
    <div class="al-row-column"><div name="AreaObjectPrices[EndArea]" autocomplete="off" id="edEndArea"></div><?php echo $form->error($model, 'EndArea'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column">Цена</div>
    <div class="al-row-column"><div name="AreaObjectPrices[Price]" autocomplete="off" id="edPrice"></div><?php echo $form->error($model, 'Price'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Сохранить" id='btnSaveAreaObjectPrice'/></div>
    <div class="al-row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelAreaObjectPrice'/></div>
    <div style="clear: both"></div>
</div>
<?php $this->endWidget(); ?>



