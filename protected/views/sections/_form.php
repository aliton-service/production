<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var Section = {
            Section_id: <?php echo json_encode($model->Section_id); ?>,
            SectionName: <?php echo json_encode($model->SectionName); ?>
        };
        
        $('#Sections').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        $("#edSectionName").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Наименование", width: 300} ));
        $('#btnSaveSection').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelSection').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelSection').on('click', function(){
            $('#SectionsDialog').jqxWindow('close');
        });
        
        $('#btnSaveSection').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('Sections/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('Sections/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#Sections').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('Section_id', Res.id, '#SectionsGrid', true);
                        $('#SectionsDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodySectionsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (Section.SectionName != '') $("#edSectionName").jqxInput('val', Section.SectionName);
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Sections',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="Sections[Section_id]" value="<?php echo $model->Section_id; ?>"/>
<div class="row">
    <div class="row-column">Наименование:</div>
    <div class="row-column"><input type="text" name="Sections[SectionName]" autocomplete="off" id="edSectionName"/><?php echo $form->error($model, 'SectionName'); ?></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveSection'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelSection'/></div>
</div>
<?php $this->endWidget(); ?>



