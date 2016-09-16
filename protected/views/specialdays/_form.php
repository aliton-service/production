<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var SpecialDay = {
            sday_id: <?php echo json_encode($model->sday_id); ?>,
            date: Aliton.DateConvertToJs('<?php echo $model->date; ?>'),
            minutes: <?php echo json_encode($model->minutes); ?>,
            datp_id: <?php echo json_encode($model->datp_id); ?>,
        };
        
        $('#SpecialDays').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        $("#edDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: SpecialDay.date, formatString: 'dd.MM.yyyy',}));
        $("#edMinutes").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { disabled: false, width: '80px', height: '25px', decimalDigits: 0 }));
        $("#RadioButton1").jqxRadioButton($.extend(true, {}, RadioButtonDefaultSettings, { width: 120, height: 25, checked: true, groupName : "Panel"}));
        $("#RadioButton2").jqxRadioButton($.extend(true, {}, RadioButtonDefaultSettings, { width: 120, height: 25, checked: false, groupName : "Panel"}));
        $("#RadioButton3").jqxRadioButton($.extend(true, {}, RadioButtonDefaultSettings, { width: 120, height: 25, checked: false, groupName : "Panel"}));
        $("#RadioButton4").jqxRadioButton($.extend(true, {}, RadioButtonDefaultSettings, { width: 120, height: 25, checked: false, groupName : "Panel"}));
        $('#btnSaveSpecialDay').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelSpecialDay').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelSpecialDay').on('click', function(){
            $('#SpecialDaysDialog').jqxWindow('close');
        });
        
        $('#btnSaveSpecialDay').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('SpecialDays/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('SpecialDays/Create')); ?>;
            
            if ($('#RadioButton1').jqxRadioButton('checked'))
                $('#edDatp').val('0');
            else if ($('#RadioButton2').jqxRadioButton('checked'))
                $('#edDatp').val('1');
            else if ($('#RadioButton3').jqxRadioButton('checked'))
                $('#edDatp').val('2');
            else if ($('#RadioButton4').jqxRadioButton('checked'))
                $('#edDatp').val('3');
                
            
            $.ajax({
                url: Url,
                data: $('#SpecialDays').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('sday_id', Res.id, '#SpecialDaysGrid', true);
                        $('#SpecialDaysDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodySpecialDaysDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (SpecialDay.minutes != '') $("#edMinutes").jqxNumberInput('val', SpecialDay.minutes);
        if (SpecialDay.datp_id != '')
            switch(SpecialDay.datp_id) {
                case '0':
                    $("#RadioButton1").jqxRadioButton({checked: true});
                break;
                case '1':
                    $("#RadioButton2").jqxRadioButton({checked: true});
                break;
                case '2':
                    $("#RadioButton3").jqxRadioButton({checked: true});
                break;
                case '3':
                    $("#RadioButton4").jqxRadioButton({checked: true});
                break;
            }
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'SpecialDays',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
    
?>



<input type="hidden" name="SpecialDays[sday_id]" value="<?php echo $model->sday_id; ?>"/>
<input type="hidden" id="edDatp" name="SpecialDays[datp_id]" value="<?php echo $model->datp_id; ?>"/>
<div class="row">
    <div class="row-column">Дата:</div>
    <div class="row-column"><div name="SpecialDays[date]" id="edDate"></div><?php echo $form->error($model, 'date'); ?></div>
    <div class="row-column">Сокр. время (м):</div>
    <div class="row-column"><div name="SpecialDays[minutes]" id="edMinutes"></div><?php echo $form->error($model, 'minutes'); ?></div>
</div>
<div class="row" style="border: 1px solid #e0e0e0;">
    <div class="row-column"><div id='RadioButton1'>Рабочий</div></div>
    <div class="row-column"><div id='RadioButton2'>Выходной</div></div>
    <div class="row-column"><div id='RadioButton3'>Праздничный</div></div>
    <div class="row-column"><div id='RadioButton4'>Сокращенный</div></div>
    <?php echo $form->error($model, 'datp_id'); ?>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveSpecialDay'/></div>
    <div class="row-column" style="float: right; margin-right: 0px"><input type="button" value="Отмена" id='btnCancelSpecialDay'/></div>
</div>
<?php $this->endWidget(); ?>



