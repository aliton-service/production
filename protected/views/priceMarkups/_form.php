<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var StateCopy = <?php if (Yii::app()->controller->action->id == 'Copy') echo 'true'; else echo 'false'; ?>;
        
        var PriceMarkups = {
            date_start: Aliton.DateConvertToJs('<?php echo $model->date_start; ?>'),
            date_end: Aliton.DateConvertToJs('<?php echo $model->date_end; ?>'),
        };
        
        $('#PriceMarkups').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        $("#date_start").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 117, formatString: 'dd.MM.yyyy', value: new Date() }));
        $("#date_end").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 117, formatString: 'dd.MM.yyyy', value: new Date('2999/12/31') }));

        $('#btnSavePriceMarkups').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnCancelPriceMarkups').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#btnCancelPriceMarkups').on('click', function(){
            $('#PriceMarkupsDialog').jqxWindow('close');
        });
        
        $('#btnSavePriceMarkups').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('PriceMarkups/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('PriceMarkups/Create')); ?>;
            if (StateCopy)
                Url = <?php echo json_encode(Yii::app()->createUrl('PriceMarkups/Copy')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#PriceMarkups').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('mrkp_id', Res.id, '#PriceMarkupsGrid', true);
                        $('#PriceMarkupsDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyPriceMarkupsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (PriceMarkups.date_start !== null) $("#date_start").jqxDateTimeInput('val', PriceMarkups.date_start);
        if (PriceMarkups.date_end !== null) $("#date_end").jqxDateTimeInput('val', PriceMarkups.date_end);
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'PriceMarkups',
	'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    ));
?>

<input type="hidden" name="PriceMarkups[mrkp_id]" value="<?php echo $model->mrkp_id; ?>"/>


<div class="row"> 
    <div class="row-column">Дата начала: <div id="date_start" name="PriceMarkups[date_start]"></div></div>
    <div class="row-column" style="float: right">Дата окончания: <div id="date_end" name="PriceMarkups[date_end]"></div></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSavePriceMarkups'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelPriceMarkups'/></div>
</div>
<?php $this->endWidget(); ?>



