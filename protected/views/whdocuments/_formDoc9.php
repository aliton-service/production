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
            EmplCreate: <?php echo json_encode($model->empl_id); ?>,
            DmndEmpl_id: <?php echo json_encode($model->dmnd_empl_id); ?>,
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
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees)); 
        DataEmployees.dataBind();
        var EmplRecords  = DataEmployees.records;
        $("#edStorageEdit").jqxComboBox({ source: DataStorages, width: '200', height: '25px', displayMember: "storage", valueMember: "storage_id"});
        $("#edNumberEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 150} ));
        $("#edDateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '130px', value: WHDocuments.Date, formatString: 'dd.MM.yyyy'}));
        $('#edNoteEdit').jqxTextArea({ disabled: false, placeHolder: '', height: 50, width: '99.5%', minLength: 1});
        $("#edDemandEmplEdit").jqxComboBox({ source: EmplRecords, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"});
        $("#edCreateEmplEdit").jqxComboBox({ source: EmplRecords, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"});
        $('#btnSaveWHDocuments').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
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
                                $('#Grid7').jqxGrid('updatebounddata');
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
        if (WHDocuments.Number !== null) $("#edNumberEdit").jqxInput('val', WHDocuments.Number);
        if (WHDocuments.Note !== null) $("#edNoteEdit").jqxTextArea('val', WHDocuments.Note);
        if (WHDocuments.DmndEmpl_id !== null) $("#edDemandEmplEdit").jqxComboBox('val', WHDocuments.DmndEmpl_id);
        if (WHDocuments.EmplCreate !== null) $("#edCreateEmplEdit").jqxComboBox('val', WHDocuments.EmplCreate);
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
    <div style="float: left">
        <div><div class="row-column">Затребовал</div></div>
        <div style="clear: both"></div>
        <div><div class="row-column"><div id="edDemandEmplEdit" name="WHDocuments[dmnd_empl_id]"></div><?php echo $form->error($model, 'dmnd_empl_id'); ?></div></div>
    </div>
    <div style="float: right">
        <div><div class="row-column">Создал</div></div>
        <div style="clear: both"></div>
        <div><div class="row-column"><div id="edCreateEmplEdit" name="WHDocuments[empl_id]"></div><?php echo $form->error($model, 'empl_id'); ?></div></div>
    </div>
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
    





