<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var AddressedStorage = {
            Adst_id: <?php echo json_encode($model->Adst_id); ?>,
            Equip_id: <?php echo json_encode($model->Equip_id); ?>,
            Adsys_id: <?php echo json_encode($model->Adsys_id); ?>
        };
        
        $('#AddressedStorage').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        var DataAddressSystems = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceAddressSystems));
        
        $("#edAdsys_id").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, {source: DataAddressSystems, placeHolder: "", width: 300, displayMember: "AddressSystem", valueMember: "AddressSystem_id"} ));
        
        $('#btnSaveAddressedStorage').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelAddressedStorage').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelAddressedStorage').on('click', function(){
            $('#AddressedStorageDialog').jqxWindow('close');
        });
        
        $('#btnSaveAddressedStorage').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('AddressedStorage/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('AddressedStorage/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#AddressedStorage').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('Adst_id', Res.id, '#AddressedStorageGrid', true);
                        $('#AddressedStorageDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyAddressedStorageDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (AddressedStorage.Adsys_id != '') $("#edAdsys_id").jqxInput('val', AddressedStorage.Adsys_id);
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'AddressedStorage',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="AddressedStorage[Adst_id]" value="<?php echo $model->Adst_id; ?>"/>
<input type="hidden" name="AddressedStorage[Equip_id]" value="<?php echo $model->Equip_id; ?>"/>

<div class="row">
    <div class="row-column">Адрес:</div>
    <div class="row-column"><div type="text" name="AddressedStorage[Adsys_id]" autocomplete="off" id="edAdsys_id"></div><?php echo $form->error($model, 'Adsys_id'); ?></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveAddressedStorage'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelAddressedStorage'/></div>
</div>
<?php $this->endWidget(); ?>



