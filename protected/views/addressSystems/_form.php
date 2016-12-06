<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var AddressSystem = {
            AddressSystem_id: <?php echo json_encode($model->AddressSystem_id); ?>,
            AddressSystem: <?php echo json_encode($model->AddressSystem); ?>
        };
        
        $('#AddressSystems').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        $("#edAddressSystem").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Наименование", width: 300} ));
        $('#btnSaveAddressSystem').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelAddressSystem').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelAddressSystem').on('click', function(){
            $('#AddressSystemsDialog').jqxWindow('close');
        });
        
        $('#btnSaveAddressSystem').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('AddressSystems/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('AddressSystems/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#AddressSystems').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('AddressSystem_id', Res.id, '#AddressSystemsGrid', true);
                        $('#AddressSystemsDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyAddressSystemsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (AddressSystem.AddressSystem != '') $("#edAddressSystem").jqxInput('val', AddressSystem.AddressSystem);
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'AddressSystems',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="AddressSystems[AddressSystem_id]" value="<?php echo $model->AddressSystem_id; ?>"/>
<div class="row">
    <div class="row-column">Наименование:</div>
    <div class="row-column"><input type="text" name="AddressSystems[AddressSystem]" autocomplete="off" id="edAddressSystem"/><?php echo $form->error($model, 'AddressSystem'); ?></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveAddressSystem'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelAddressSystem'/></div>
</div>
<?php $this->endWidget(); ?>



