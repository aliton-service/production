<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var Recommendation = {
            Recommendation_id: <?php echo json_encode($model->Recommendation_id); ?>,
            Inspection_id: <?php echo json_encode($model->Inspection_id); ?>,
            Recommendation: <?php echo json_encode($model->Recommendation); ?>,
        };
        
        $('#InspActRecommendations').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        $('#edRecommendationEdit').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { placeHolder: '', height: 50, width: 'calc(100% - 2px)', minLength: 1}));
        $('#btnSaveInspActRecommendations').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: false }));
        $('#btnCancelInspActRecommendations').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelInspActRecommendations').on('click', function(){
            if ($('#InspectionActDialog').length>0)
                $('#InspectionActDialog').jqxWindow('close');
        });
        
        $('#btnSaveInspActRecommendations').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('InspActRecommendations/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('InspActRecommendations/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#InspActRecommendations').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        InspAct.Recommendation_id = Res.id;
                        if ($('#InspectionActDialog').length>0) {
                            $('#btnRefreshRecommendations').click();
                            $('#InspectionActDialog').jqxWindow('close');
                            
                        }
                    }
                    else {
                        if ($('#InspectionActDialog').length>0)
                            $('#BodyInspectionActDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        
        
        if (Recommendation.Recommendation != null) $("#edRecommendationEdit").jqxTextArea('val', Recommendation.Recommendation);
    });
</script>        

<?php
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'InspActRecommendations',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="InspActRecommendations[Recommendation_id]" value="<?php echo $model->Recommendation_id; ?>"/>
<input type="hidden" name="InspActRecommendations[Inspection_id]" value="<?php echo $model->Inspection_id; ?>"/>

<div class="row">
    <div>Рекомендации</div>
    <textarea name="InspActRecommendations[Recommendation]" id="edRecommendationEdit"></textarea>
    <?php echo $form->error($model, 'Recommendation'); ?>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveInspActRecommendations'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelInspActRecommendations'/></div>
</div>
<?php $this->endWidget(); ?>



