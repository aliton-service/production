<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var WHDocuments = {
            Docm_id: <?php echo json_encode($model->docm_id); ?>,
            Dctp_id: <?php echo json_encode($model->dctp_id); ?>,
            Number: <?php echo json_encode($model->number); ?>,
            Date: Aliton.DateConvertToJs('<?php echo $model->date; ?>'),
            Strg_id: <?php echo json_encode($model->strg_id); ?>,
            Note: <?php echo json_encode($model->note); ?>,
            Objc_id: <?php echo json_encode($model->objc_id); ?>,
        };
        
        $('#WHDocuments').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        // Инициализация источников данных
        var DataStorages = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceStoragesList));
        var DataAddress = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListAddresses));
        
        $("#edStorageEdit").jqxComboBox({ source: DataStorages, width: '200', height: '25px', displayMember: "storage", valueMember: "storage_id", autoDropDownHeight: true});
        $("#edNumberEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 150} ));
        $("#edDateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '130px', value: WHDocuments.Date, formatString: 'dd.MM.yyyy'}));
        $('#edNoteEdit').jqxTextArea({ disabled: false, placeHolder: '', height: 50, width: '99.5%', minLength: 1});
        $("#edAddressEdit").on('bindingComplete', function(){
            if (WHDocuments.Objc_id !== null) $("#edAddressEdit").jqxComboBox('val', WHDocuments.Objc_id);
            console.log(WHDocuments.Objc_id);
            $('#btnSaveWHDocuments').jqxButton({disabled: false});
        });
        $("#edAddressEdit").jqxComboBox({ source: DataAddress, width: '450', height: '25px', displayMember: "Addr", valueMember: "Object_id"});
        
        $('#btnSaveWHDocuments').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: true }));
        $('#btnCancelWHDocuments').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelWHDocuments').on('click', function(){
            if ($('#WHDocumentsDialog').length>0)
                $('#WHDocumentsDialog').jqxWindow('close');
            if ($('#RepairsDialog').length>0)
                $('#RepairsDialog').jqxWindow('close');
        });
        
        $('#btnSaveWHDocuments').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('WHDocuments/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('WHDocuments/Create')); ?>;
            
            var Model = $('#WHDocuments').serialize() + '&Dctp_id=' + WHDocuments.Dctp_id;
            
            $.ajax({
                url: Url,
                data: Model,
                
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        if (!StateInsert) {
                            if (typeof(WHDoc.Refresh) != 'undefined')
                                WHDoc.Refresh();
                        }
                        if (StateInsert) {
                            if ($('#Grid7').length>0) {
                                WHReestr.Docm_id = Res.id;
                                $('#Grid6').jqxGrid('updatebounddata');
                                window.open(<?php echo json_encode(Yii::app()->createUrl('WHDocuments/View'))?> + '&Docm_id=' + Res.id);
                            }
                            if ($('#GridDocuments').length>0)
                                $('#GridDocuments').jqxGrid('updatebounddata');
                        }
                        if ($('#WHDocumentsDialog').length>0)
                            $('#WHDocumentsDialog').jqxWindow('close');
                        if ($('#RepairsDialog').length>0)
                            $('#RepairsDialog').jqxWindow('close');
                    }
                    else {
                        if ($('#WHDocumentsDialog').length>0)
                            $('#BodyWHDocumentsDialog').html(Res.html);
                        if ($('#RepairsDialog').length>0)
                            $('#BodyRepairsDialog').jqxWindow('close');
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (WHDocuments.Strg_id !== null) $("#edStorageEdit").jqxComboBox('val', WHDocuments.Strg_id);
        //if (WHDocuments.Objc_id !== null) $("#edAddressEdit").jqxComboBox('val', WHDocuments.Objc_id);
        if (WHDocuments.Number !== null) $("#edNumberEdit").jqxInput('val', WHDocuments.Number);
        if (WHDocuments.Note !== null) $("#edNoteEdit").jqxTextArea('val', WHDocuments.Note);
        
    });
</script>    

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'WHDocuments',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="WHDocuments[docm_id]" value="<?php echo $model->docm_id; ?>" />
<input type="hidden" name="WHDocuments[dctp_id]" value="<?php echo $model->dctp_id; ?>" />
<input type="hidden" name="WHDocuments[repr_id]" value="<?php echo $model->repr_id; ?>" />

<div class="row">
    <div class="row-column" style="width: 100px">Номер</div>
    <div class="row-column"><input id="edNumberEdit" name="WHDocuments[number]" /><?php echo $form->error($model, 'number'); ?></div>
    <div class="row-column">Дата</div>
    <div class="row-column"><div id="edDateEdit" name="WHDocuments[date]"></div><?php echo $form->error($model, 'date'); ?></div>
</div>
<div class="row">
    <div class="row-column" style="width: 100px">Склад </div>
    <div class="row-column"><div id="edStorageEdit" name="WHDocuments[strg_id]"></div><?php echo $form->error($model, 'strg_id'); ?></div>
</div>
<div class="row">
    <div class="row-column" style="width: 100px">Адрес</div>
    <div class="row-column"><div id="edAddressEdit" name="WHDocuments[objc_id]"></div><?php echo $form->error($model, 'objc_id'); ?></div>
</div>


<div class="row" style="margin-top: 8px; border-top: 1px solid #e0e0e0;">
    <div><div class="row-column">Примечание</div></div>
    <div><textarea id="edNoteEdit" name="WHDocuments[note]"></textarea></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveWHDocuments'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelWHDocuments'/></div>
</div>
<?php $this->endWidget(); ?>
    



