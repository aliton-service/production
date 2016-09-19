<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var EquipType = {
            EquipType_id: <?php echo json_encode($model->EquipType_id); ?>,
            EquipType: <?php echo json_encode($model->EquipType); ?>
        };
        
        $('#EquipTypes').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        $("#edEquipType").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 300} ));
        $('#btnSaveEquipType').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelEquipType').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelEquipType').on('click', function(){
            $('#EquipTypesDialog').jqxWindow('close');
        });
        
        $('#btnSaveEquipType').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('EquipTypes/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('EquipTypes/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#EquipTypes').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('EquipType_id', Res.id, '#EquipTypesGrid', true);
                        $('#EquipTypesDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyEquipTypesDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (EquipType.EquipType != '') $("#edEquipType").jqxInput('val', EquipType.EquipType);
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'EquipTypes',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="EquipTypes[EquipType_id]" value="<?php echo $model->EquipType_id; ?>"/>
<div class="row">
    <div class="row-column">Тип оборудования:</div>
    <div class="row-column"><input type="text" name="EquipTypes[EquipType]" autocomplete="off" id="edEquipType"/><?php echo $form->error($model, 'EquipType'); ?></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveEquipType'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelEquipType'/></div>
</div>
<?php $this->endWidget(); ?>



