<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var Section = {
            DPrior_id: <?php echo json_encode($model->DPrior_id); ?>,
            DemandType_id: <?php echo json_encode($model->DemandType_id); ?>,
            SystemType_id: <?php echo json_encode($model->SystemType_id); ?>,
            EquipType_id: <?php echo json_encode($model->EquipType_id); ?>,
            Malfunction_id: <?php echo json_encode($model->Malfunction_id); ?>,
            DemandPrior_id: <?php echo json_encode($model->DemandPrior_id); ?>,
            ExceedType: <?php echo json_encode($model->ExceedType); ?>,
            ExceedDays: <?php echo json_encode($model->ExceedDays); ?>,
            DayOff: <?php echo json_encode($model->DayOff); ?>,
        };
        
        $('#DemandsExecTime').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        var DataDemandTypesList = new $.jqx.dataAdapter(Sources.SourceDemandTypeList);
        var DataSystemTypesList = new $.jqx.dataAdapter(Sources.SourceSystemTypeList);
        var DataEquipTypesList = new $.jqx.dataAdapter(Sources.SourceEquipTypesList);
        var DataMalfunctionsOld = new $.jqx.dataAdapter(Sources.SourceMalfunctionsOld);
        var DataDemandPriors = new $.jqx.dataAdapter(Sources.SourceDemandPriors);
        var DataExceedType = [{id: 1, name: 'Часы'}, {id: 2, name: 'Дни'}, {id: 3, name: 'День подачи'}];
        
        $("#cmbDemandType").jqxComboBox({ source: DataDemandTypesList, width: '300', height: '25px', displayMember: "DemandType", valueMember: "DemandType_id"});
        $("#cmbSystemType").jqxComboBox({ source: DataSystemTypesList, width: '300', height: '25px', displayMember: "SystemTypeName", valueMember: "SystemType_Id"});
        $("#cmbEquipType").jqxComboBox({ source: DataEquipTypesList, width: '300', height: '25px', displayMember: "EquipType", valueMember: "EquipType_id"});
        $("#cmbMalfunction").jqxComboBox({ source: DataMalfunctionsOld, width: '300', height: '25px', displayMember: "Malfunction", valueMember: "Malfunction_id"});
        $("#cmbDemandPrior").jqxComboBox({ source: DataDemandPriors, width: '300', height: '25px', displayMember: "DemandPrior", valueMember: "DemandPrior_id"});
        $("#cmbExceedType").jqxComboBox({ source: DataExceedType, width: '120', height: '25px', displayMember: "name", valueMember: "id"});
        $("#edExceedDays").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: '60px', height: '25px', decimalDigits: 0 }));
        $("#chbDayOff").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: 150}));
        
        $('#btnSaveSection').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelSection').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelSection').on('click', function(){
            $('#DemandsExecTimeDialog').jqxWindow('close');
        });
        
        if (!StateInsert) {
            $("#cmbDemandType").jqxComboBox({disabled: true});
            $("#cmbSystemType").jqxComboBox({disabled: true});
            $("#cmbEquipType").jqxComboBox({disabled: true});
            $("#cmbMalfunction").jqxComboBox({disabled: true});
            $("#cmbDemandPrior").jqxComboBox({disabled: true});
        }
        
        $('#btnSaveSection').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('DemandsExecTime/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('DemandsExecTime/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#DemandsExecTime').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('DPrior_id', Res.id, '#DemandsExecTimeGrid', true);
                        $('#DemandsExecTimeDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyDemandsExecTimeDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (Section.DemandType_id != '') $("#cmbDemandType").jqxComboBox('val', Section.DemandType_id);
        if (Section.SystemType_id != '') $("#cmbSystemType").jqxComboBox('val', Section.SystemType_id);
        if (Section.EquipType_id != '') $("#cmbEquipType").jqxComboBox('val', Section.EquipType_id);
        if (Section.Malfunction_id != '') $("#cmbMalfunction").jqxComboBox('val', Section.Malfunction_id);
        if (Section.DemandPrior_id != '') $("#cmbDemandPrior").jqxComboBox('val', Section.DemandPrior_id);
        if (Section.ExceedType != '') $("#cmbExceedType").jqxComboBox('val', Section.ExceedType);
        if (Section.ExceedDays != '') $("#edExceedDays").jqxNumberInput('val', Section.ExceedDays);
        if (Section.DayOff != '') $("#chbDayOff").jqxCheckBox({checked: Boolean(Number(Section.DayOff))});
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'DemandsExecTime',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="DemandsExecTime[DPrior_id]" value="<?php echo $model->DPrior_id; ?>"/>

<div class="row">
    <div class="row-column" style="width: 120px">Тип заявки:</div>
    <div class="row-column"><div name="DemandsExecTime[DemandType_id]" autocomplete="off" id="cmbDemandType"></div><?php echo $form->error($model, 'DemandType_id'); ?></div> 
</div>
<div class="row">
    <div class="row-column" style="width: 120px">Система:</div>
    <div class="row-column"><div name="DemandsExecTime[SystemType_id]" autocomplete="off" id="cmbSystemType"></div><?php echo $form->error($model, 'SystemType_id'); ?></div> 
</div>
<div class="row">
    <div class="row-column" style="width: 120px">Оборудование:</div>
    <div class="row-column"><div name="DemandsExecTime[EquipType_id]" autocomplete="off" id="cmbEquipType"></div><?php echo $form->error($model, 'EquipType_id'); ?></div> 
</div>
<div class="row">
    <div class="row-column" style="width: 120px">Неисправность:</div>
    <div class="row-column"><div name="DemandsExecTime[Malfunction_id]" autocomplete="off" id="cmbMalfunction"></div><?php echo $form->error($model, 'Malfunction_id'); ?></div> 
</div>
<div class="row">
    <div class="row-column" style="width: 120px">Приоритет:</div>
    <div class="row-column"><div name="DemandsExecTime[DemandPrior_id]" autocomplete="off" id="cmbDemandPrior"></div><?php echo $form->error($model, 'DemandPrior_id'); ?></div> 
</div>
<div class="row">
    <div class="row-column" >Срок:</div>
    <div class="row-column"><div name="DemandsExecTime[ExceedType]" autocomplete="off" id="cmbExceedType"></div><?php echo $form->error($model, 'ExceedType'); ?></div> 
    <div class="row-column" >Кол-во:</div>
    <div class="row-column"><div name="DemandsExecTime[ExceedDays]" autocomplete="off" id="edExceedDays"></div><?php echo $form->error($model, 'ExceedDays'); ?></div> 
    <div class="row-column"><div name="DemandsExecTime[DayOff]" autocomplete="off" id="chbDayOff">Учет вых. дней</div></div> 
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveSection'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelSection'/></div>
</div>
<?php $this->endWidget(); ?>



