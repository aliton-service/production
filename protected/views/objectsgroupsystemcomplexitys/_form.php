<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var SystemCompetitor = {
            SystemCompetitor_id: <?php echo json_encode($model->SystemCompetitor_id); ?>,
            ObjectsGroupSystem_id: <?php echo json_encode($model->ObjectsGroupSystem_id); ?>,
            Cmtr_id: <?php echo json_encode($model->Cmtr_id); ?>
        };
        
        var CompetitorsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceCompetitors));
        
        $('#SystemCompetitors').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        
        $("#edCmtr_id").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: CompetitorsDataAdapter, displayMember: "Competitor", valueMember: "cmtr_id", width:200 }));
        $('#btnSaveSystemCompetitor').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelSystemCompetitor').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelSystemCompetitor').on('click', function(){
            $('#SystemCompetitorsDialog').jqxWindow('close');
        });
        
        $('#btnSaveSystemCompetitor').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('SystemCompetitors/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('SystemCompetitors/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#SystemCompetitors').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('SystemCompetitor_id', Res.id, '#SystemCompetitorsGrid', true);
                        $('#SystemCompetitorsDialog').jqxWindow('close');
                        if (typeof(OGSystem) != 'undefined') {
                            OGSystem.GetCompetitors();
                        }
                    }
                    else {
                        $('#BodySystemCompetitorsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (SystemCompetitor.Cmtr_id != '') $("#edCmtr_id").jqxInput('val', SystemCompetitor.Cmtr_id);
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'SystemCompetitors',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="SystemCompetitors[SystemCompetitor_id]" value="<?php echo $model->SystemCompetitor_id; ?>"/>
<input type="hidden" name="SystemCompetitors[ObjectsGroupSystem_id]" value="<?php echo $model->ObjectsGroupSystem_id; ?>"/>

<div class="row">
    <div class="row-column">Организация:</div>
    <div class="row-column"><div type="text" name="SystemCompetitors[Cmtr_id]" autocomplete="off" id="edCmtr_id"></div><?php echo $form->error($model, 'Cmtr_id'); ?></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveSystemCompetitor'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelSystemCompetitor'/></div>
</div>
<?php $this->endWidget(); ?>



