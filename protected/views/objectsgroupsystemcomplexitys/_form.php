<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var ObjectsGroupSystemComplexity = {
            Ogsc_id: <?php echo json_encode($model->Ogsc_id); ?>,
            Ogst_id: <?php echo json_encode($model->Ogst_id); ?>,
            ObjectGr_id: <?php echo json_encode($model->ObjectGr_id); ?>,
            SystemComplexity_id: <?php echo json_encode($model->SystemComplexity_id); ?>
        };
        
        var SystemComplexitysDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListSystemComplexitysMin));
        
        $('#ObjectsGroupSystemComplexitys').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        
        $("#edSystemComplexity_id").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: SystemComplexitysDataAdapter, displayMember: "SystemComplexitysName", valueMember: "SystemComplexitys_id", width:200 }));
        $('#btnSaveObjectsGroupSystemComplexity').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelObjectsGroupSystemComplexity').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelObjectsGroupSystemComplexity').on('click', function(){
            $('#ObjectsGroupSystemComplexitysDialog').jqxWindow('close');
        });
        
        $('#btnSaveObjectsGroupSystemComplexity').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('ObjectsGroupSystemComplexitys/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('ObjectsGroupSystemComplexitys/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#ObjectsGroupSystemComplexitys').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('ObjectsGroupSystemComplexity_id', Res.id, '#ObjectsGroupSystemComplexitysGrid', true);
                        $('#ObjectsGroupSystemComplexitysDialog').jqxWindow('close');
                        if (typeof(OGSystem) != 'undefined') {
                            OGSystem.GetSystemComplexitys();
                        }
                    }
                    else {
                        $('#BodyObjectsGroupSystemComplexitysDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (ObjectsGroupSystemComplexity.SystemComplexity_id != '') $("#edSystemComplexity_id").jqxInput('val', ObjectsGroupSystemComplexity.SystemComplexity_id);
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ObjectsGroupSystemComplexitys',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="ObjectsGroupSystemComplexitys[Ogsc_id]" value="<?php echo $model->Ogsc_id; ?>"/>
<input type="hidden" name="ObjectsGroupSystemComplexitys[Ogst_id]" value="<?php echo $model->Ogst_id; ?>"/>
<input type="hidden" name="ObjectsGroupSystemComplexitys[ObjectGr_id]" value="<?php echo $model->ObjectGr_id; ?>"/>

<div class="row">
    <div class="row-column">Сложность:</div>
    <div class="row-column"><div type="text" name="ObjectsGroupSystemComplexitys[SystemComplexity_id]" autocomplete="off" id="edSystemComplexity_id"></div><?php echo $form->error($model, 'SystemComplexity_id'); ?></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveObjectsGroupSystemComplexity'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelObjectsGroupSystemComplexity'/></div>
</div>
<?php $this->endWidget(); ?>



