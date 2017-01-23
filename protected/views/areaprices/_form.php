<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var AreaPrice = {
            AreaPrice_id: <?php echo json_encode($model->AreaPrice_id); ?>,
            StartArea: <?php echo json_encode($model->StartArea); ?>,
            EndArea: <?php echo json_encode($model->EndArea); ?>,
            Price: <?php echo json_encode($model->Price); ?>
        };
        
        $('#AreaPrices').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        $("#edStartArea").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: 100, decimalDigits: 0} ));
        $("#edEndArea").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: 100, decimalDigits: 0} ));
        $("#edPrice").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: 100} ));
        
        $('#btnSaveAreaPrice').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelAreaPrice').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelAreaPrice').on('click', function(){
            $('#AreaPricesDialog').jqxWindow('close');
        });
        
        $('#btnSaveAreaPrice').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('AreaPrices/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('AreaPrices/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#AreaPrices').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('AreaPrice_id', Res.id, '#AreaPricesGrid', true);
                        $('#AreaPricesDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyAreaPricesDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (AreaPrice.StartArea != '') $("#edStartArea").jqxNumberInput('val', AreaPrice.StartArea);
        if (AreaPrice.EndArea != '') $("#edEndArea").jqxNumberInput('val', AreaPrice.EndArea);
        if (AreaPrice.Price != '') $("#edPrice").jqxNumberInput('val', AreaPrice.Price);
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'AreaPrices',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="AreaPrices[AreaPrice_id]" value="<?php echo $model->AreaPrice_id; ?>"/>
<div class="al-row">
    <div class="al-row-column">Площадь от:</div>
    <div class="al-row-column"><div name="AreaPrices[StartArea]" autocomplete="off" id="edStartArea"></div><?php echo $form->error($model, 'StartArea'); ?></div>
    <div class="al-row-column">до</div>
    <div class="al-row-column"><div name="AreaPrices[EndArea]" autocomplete="off" id="edEndArea"></div><?php echo $form->error($model, 'EndArea'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column">Цена</div>
    <div class="al-row-column"><div name="AreaPrices[Price]" autocomplete="off" id="edPrice"></div><?php echo $form->error($model, 'Price'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Сохранить" id='btnSaveAreaPrice'/></div>
    <div class="al-row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelAreaPrice'/></div>
    <div style="clear: both"></div>
</div>
<?php $this->endWidget(); ?>



