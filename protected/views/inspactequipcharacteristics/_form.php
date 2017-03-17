<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var InspActEquipCharacteristic = {
            Characteristic_id: <?php echo json_encode($model->Characteristic_id); ?>,
            ActEquip_id: <?php echo json_encode($model->ActEquip_id); ?>,
            CharacteristicName: <?php echo json_encode($model->CharacteristicName); ?>
        };
        
        $('#InspActEquipCharacteristics').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        $("#edCharacteristicName").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Наименование", width: 300} ));
        $('#btnSaveInspActEquipCharacteristic').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelInspActEquipCharacteristic').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelInspActEquipCharacteristic').on('click', function(){
            $('#InspActEquipCharacteristicsDialog').jqxWindow('close');
        });
        
        $('#btnSaveInspActEquipCharacteristic').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('InspActEquipCharacteristics/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('InspActEquipCharacteristics/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#InspActEquipCharacteristics').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('Characteristic_id', Res.id, '#InspActEquipCharacteristicsGrid', true);
                        $('#InspActEquipCharacteristicsDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyInspActEquipCharacteristicsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (InspActEquipCharacteristic.CharacteristicName != '') $("#edCharacteristicName").jqxInput('val', InspActEquipCharacteristic.CharacteristicName);
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'InspActEquipCharacteristics',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="InspActEquipCharacteristics[Characteristic_id]" value="<?php echo $model->Characteristic_id; ?>"/>
<input type="hidden" name="InspActEquipCharacteristics[ActEquip_id]" value="<?php echo $model->ActEquip_id; ?>"/>

<div class="row">
    <div class="row-column">Серийный номер:</div>
    <div class="row-column"><input type="text" name="InspActEquipCharacteristics[CharacteristicName]" autocomplete="off" id="edCharacteristicName"/><?php echo $form->error($model, 'CharacteristicName'); ?></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveInspActEquipCharacteristic'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelInspActEquipCharacteristic'/></div>
</div>
<?php $this->endWidget(); ?>



