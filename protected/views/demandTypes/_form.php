<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var DemandType = {
            DemandType_id: <?php echo json_encode($model->DemandType_id); ?>,
            DemandType: <?php echo json_encode($model->DemandType); ?>,
            deliveryDemand: <?php echo json_encode($model->dd); ?>,
            demand: <?php echo json_encode($model->d); ?>,
            internalDemand: <?php echo json_encode($model->id); ?>,
        };

console.log(DemandType.deliveryDemand);
        
        $("#deliveryDemand").jqxCheckBox({ width: 170, height: 25});
        $("#demand").jqxCheckBox({ width: 120, height: 25});
        $("#internalDemand").jqxCheckBox({ width: 170, height: 25});
        
        if (DemandType.deliveryDemand !== '') $("#deliveryDemand").jqxCheckBox({checked: Boolean(Number(DemandType.deliveryDemand))});
        if (DemandType.demand !== '') $("#demand").jqxCheckBox({checked: Boolean(Number(DemandType.demand))});
        if (DemandType.internalDemand !== '') $("#internalDemand").jqxCheckBox({checked: Boolean(Number(DemandType.internalDemand))});
        
        $('#DemandTypes').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        $("#edDemandType").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 300} ));
        $('#btnSaveDemandType').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelDemandType').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelDemandType').on('click', function(){
            $('#DemandTypesDialog').jqxWindow('close');
        });
        
        $('#btnSaveDemandType').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('DemandTypes/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('DemandTypes/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#DemandTypes').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('DemandType_id', Res.id, '#DemandTypesGrid', true);
                        $('#DemandTypesDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyDemandTypesDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (DemandType.DemandType != '') $("#edDemandType").jqxInput('val', DemandType.DemandType);
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'DemandTypes',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="DemandTypes[DemandType_id]" value="<?php echo $model->DemandType_id; ?>"/>
<div class="row">
    <div class="row-column">Тип заявки:</div>
    <div class="row-column"><input type="text" name="DemandTypes[DemandType]" autocomplete="off" id="edDemandType"/><?php echo $form->error($model, 'DemandType'); ?></div>
</div>

<div class="row">
    <div class="row-column"><div name="DemandTypes[dd]" id='deliveryDemand'>Заявка на доставку</div></div>
    <div class="row-column"><div name="DemandTypes[d]" id='demand'>Заявка</div></div>
</div>

<div class="row">
    <div class="row-column"><div name="DemandTypes[id]" id='internalDemand'>Внутренняя заявка</div></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveDemandType'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelDemandType'/></div>
</div>
<?php $this->endWidget(); ?>



