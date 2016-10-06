<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        
        $('#Confirm').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        var DataConfirmCancels = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceConfirmCancels));
        
        $("#edConfirm").jqxComboBox($.extend(true, {}, { source: DataConfirmCancels, width: '300', height: '25px', displayMember: "ConfirmCancelName", valueMember: "ConfirmCancel_id" /*, renderer: EquipRenderer */}));
        $('#btnSaveConfirmCancel').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelConfirmCancel').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelConfirmCancel').on('click', function(){
            $('#WHDocumentsDialog').jqxWindow('close');
        });
        
        $('#btnSaveConfirmCancel').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('WHDocuments/Confirm')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#ConfirmCancels').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        WHReestr.Docm_id = Res.id;
                        $('#btnRefresh').click();
                        $('#WHDocumentsDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyWHDocumentsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
    });
</script>        

<?php
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ConfirmCancels',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="ConfirmCancels[Dctp_id]" value="<?php echo $Dctp_id; ?>"/>
<input type="hidden" name="ConfirmCancels[Achs_id]" value="<?php echo $Achs_id; ?>"/>

<div class="row">
    <div class="row-column">
        <div><div class="row-column">Основание для отмены подтверждения</div></div>
        <div style="clear: both"></div>
        <div><div class="row-column"><div name="ConfirmCancels[Confirm_id]" id="edConfirm"></div></div></div>
    </div>
    
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveConfirmCancel'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelConfirmCancel'/></div>
</div>

<?php $this->endWidget(); ?>





