<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var Children = {
            Children_id: <?php echo json_encode($model->Children_id); ?>,
            ChildrenName: <?php echo json_encode($model->ChildrenName); ?>,
            BirthDay: Aliton.DateConvertToJs('<?php echo $model->BirthDay; ?>')
        };
        
        $("#edChildrenName").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "ФИО", width: 300}));
        $("#edBirthDay").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Children.BirthDay, formatString: 'dd.MM.yyyy',}));
        $('#btnSaveChild').jqxButton({ width: 120, height: 30 });
        $('#btnCancelChild').jqxButton({ width: 120, height: 30 });
        
        if (Children.ChildrenName != '') $("#edChildrenName").jqxInput('val', Children.ChildrenName);
        
        
        $('#btnCancelChild').on('click', function(){
            $('#EmployeesDialog').jqxWindow('close');
        });
        
        $('#btnSaveChild').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('Childrens/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('Childrens/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#Childrens').serialize(),
                type: 'POST',
                success: function(Res) {
                    if (Res == '1') {
                        $('#EmployeesDialog').jqxWindow('close');
                        $('#btnRefreshChildren').click();
                    }
                    else
                        $('#BodyEmployeesDialog').html(Res);
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (Children.ChildrenName != '') $("#edChildrenName").jqxInput('val', Children.ChildrenName);

    });
</script>

<?php
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Childrens',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="Childrens[Children_id]" value="<?php echo $model->Children_id; ?>"/>
<input type="hidden" name="Childrens[Employee_id]" value="<?php echo $model->Employee_id; ?>"/>
<?php echo $form->error($model, 'Employee_id'); ?>
<div class="row">
    <div class="row-column">ФИО:</div>
    <div class="row-column"><input type="text" name="Childrens[ChildrenName]" id="edChildrenName"/><?php echo $form->error($model, 'ChildrenName'); ?></div>
</div>
<div class="row">
    <div class="row-column">Дата рождения:</div>
    <div class="row-column"><div name="Childrens[BirthDay]" id="edBirthDay"></div><?php echo $form->error($model, 'BirthDay'); ?></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveChild'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelChild'/></div>
</div>
<?php $this->endWidget(); ?>









