<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var Department = {
            Dep_id: <?php echo json_encode($model->Dep_id); ?>,
            DepName: <?php echo json_encode($model->DepName); ?>
        };
        
        $('#Departments').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        $("#edDepName").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Наименование", width: 300} ));
        $('#btnSaveDepartment').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelDepartment').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelDepartment').on('click', function(){
            $('#DepartmentsDialog').jqxWindow('close');
        });
        
        $('#btnSaveDepartment').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('Departments/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('Departments/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#Departments').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('Dep_id', Res.id, '#DepartmentsGrid', true);
                        $('#DepartmentsDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyDepartmentsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (Department.DepName != '') $("#edDepName").jqxInput('val', Department.DepName);
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Departments',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="Departments[Dep_id]" value="<?php echo $model->Dep_id; ?>"/>
<div class="row">
    <div class="row-column">Наименование:</div>
    <div class="row-column"><input type="text" name="Departments[DepName]" autocomplete="off" id="edDepName"/><?php echo $form->error($model, 'DepName'); ?></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveDepartment'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelDepartment'/></div>
</div>
<?php $this->endWidget(); ?>



