<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var Instructing = {
            Instructing_id: <?php echo json_encode($model->Instructing_id); ?>,
            Employee_id: <?php echo json_encode($model->Employee_id); ?>,
            Name: <?php echo json_encode($model->Name); ?>,
            UserExec: <?php echo json_encode($model->UserExec); ?>,
            Note: <?php echo json_encode($model->Note); ?>,
            Date: Aliton.DateConvertToJs('<?php echo $model->Date; ?>')
        };
        
        var DataEmployees = new $.jqx.dataAdapter(Sources.SourceListEmployees);
        
        $("#edDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Instructing.Date, formatString: 'dd.MM.yyyy',}));
        $("#edUserExec").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, width: '180', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}));
        $("#edName").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Наименование", width: 430}));
        $("#edInstrNote").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Примечание", width: 430}));
        $('#btnSaveInstr').jqxButton({ width: 120, height: 30 });
        $('#btnCancelInstr').jqxButton({ width: 120, height: 30 });
        
        if (Instructing.UserExec != '') $("#edUserExec").jqxComboBox('val', Instructing.UserExec);
        if (Instructing.Name != '') $("#edName").jqxInput('val', Instructing.Name);
        if (Instructing.Note != '') $("#edInstrNote").jqxInput('val', Instructing.Note);
        
        $('#btnCancelInstr').on('click', function(){
            $('#EmployeesDialog').jqxWindow('close');
        });
        
        $('#btnSaveInstr').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('Instructings/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('Instructings/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#Instructings').serialize(),
                type: 'POST',
                success: function(Res) {
                    if (Res == '1') {
                        $('#EmployeesDialog').jqxWindow('close');
                        $('#btnRefreshInstr').click();
                    }
                    else
                        $('#BodyEmployeesDialog').html(Res);
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
        'id'=>'Instructings',
        'htmlOptions'=>array(
                'class'=>'form-inline'
        ),
    ));

?>

<input type="hidden" name="Instructings[Instructing_id]" value="<?php echo $model->Instructing_id; ?>"/>
<input type="hidden" name="Instructings[Employee_id]" value="<?php echo $model->Employee_id; ?>"/>

<div class="row">
    <div class="row-column">Дата проведения:</div>
    <div class="row-column"><div name="Instructings[Date]" id="edDate"></div><?php echo $form->error($model, 'Date'); ?></div>
</div>
<div class="row">
    <div class="row-column">Исполнитель:</div>
    <div class="row-column"><div name="Instructings[UserExec]" id="edUserExec"></div><?php echo $form->error($model, 'UserExec'); ?></div>
</div>
<div class="row">
    <div class="row-column" style="width: 110px">Наименование:</div>
    <div class="row-column"><input type="text" name="Instructings[Name]" id="edName"/><?php echo $form->error($model, 'Name'); ?></div>
</div>
<div class="row">
    <div class="row-column" style="width: 110px">Примечание:</div>
    <div class="row-column"><input type="text" name="Instructings[Note]" id="edInstrNote"/></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveInstr'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelInstr'/></div>
</div>
<?php $this->endWidget(); ?>
