<script type="text/javascript">
    $(document).ready(function(){
        var Object = {
            Object_id: <?php echo json_encode($model->Object_id)?>,
            Code: <?php echo json_encode($model->Code)?>,
            MasterKey: <?php echo json_encode((bool)$model->MasterKey)?>,
            Signal: <?php echo json_encode($model->Signal)?>, 
            Cntp_id: <?php echo json_encode($model->Cntp_id)?>,
            Complexity_id: <?php echo json_encode($model->Complexity_id)?>,
            Note: <?php echo json_encode($model->Note)?>,
            Condition: <?php echo json_encode($model->Condition)?>,
            ObjectType: <?php echo json_encode($model->ObjectType)?>,
            Doorway: <?php echo json_encode($model->Doorway)?>,
        };
        
        var DataObjectTypes = new $.jqx.dataAdapter(Sources.SourceObjectTypes);
        var DataComplexityTypes = new $.jqx.dataAdapter(Sources.SourceComplexityTypes);
        var DataConnectionTypes = new $.jqx.dataAdapter(Sources.SourceConnectionTypes);
        
        $("#edDoorway").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Подъезд", width: 150}));
        $("#cmbObjectType").jqxComboBox({ source: DataObjectTypes, width: '100', height: '25px', displayMember: "ObjectType", valueMember: "ObjectType_Id"});
        $("#edCode").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Код", width: 150}));
        $("#edMasterKey").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: 150}));
        $("#cmbComplexity").jqxComboBox({ source: DataComplexityTypes, width: '150', height: '25px', displayMember: "ComplexityName", valueMember: "Complexity_Id", autoDropDownHeight: true});
        $("#edSignal").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: '120px', height: '25px', decimalDigits: 0 }));
        $("#cmbConnType").jqxComboBox({ source: DataConnectionTypes, width: '150', height: '25px', displayMember: "ConnectionType", valueMember: "ConnectionType_id", autoDropDownHeight: true});
        $('#edNote').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { placeHolder: 'Примечание', height: 50, width: 420, minLength: 1}));
        $('#edCondition').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { placeHolder: 'Условия', height: 50, width: 420, minLength: 1}));
        
        if (Object.Object_id !== '') $("#cmbObjectType").jqxComboBox('val', Object.ObjectType);
        if (Object.Code !== '') $("#edCode").jqxInput('val', Object.Code);
        if (Object.MasterKey !== '') $("#edMasterKey").jqxCheckBox('val', Object.MasterKey);
        if (Object.Signal !== '') $("#edSignal").jqxNumberInput('val', Object.Signal);
        if (Object.Complexity_id !== '') $("#cmbComplexity").jqxComboBox('val', Object.Complexity_id);
        if (Object.Cntp_id !== '') $("#cmbConnType").jqxComboBox('val', Object.Cntp_id);
        if (Object.Note !== '') $("#edNote").jqxTextArea('val', Object.Note);
        if (Object.Condition !== '') $("#edCondition").jqxTextArea('val', Object.Condition);
        if (Object.Doorway !== '') $("#edDoorway").jqxInput('val', Object.Doorway);
    });
</script>

<?php
   
    $form=$this->beginWidget('CActiveForm', array(
            'id'=>'Objects',
            'htmlOptions'=>array(
                    'class'=>'form-inline'
                    ),
    ));

?>

<input name="Objects[ObjectGr_id]" type="hidden" value="<?php echo $model->ObjectGr_id; ?>" />
<input name="Objects[Object_id]" type="hidden" value="<?php echo $model->Object_id; ?>" />

<div class="row">
    <div class="row-column">Подъезд</div>
    <div class="row-column"><input id="edDoorway" name="Objects[Doorway]" type="text" /><?php echo $form->error($model,'Doorway'); ?></div>
</div> 
<div class="row">
    <div class="row-column">Число квартир</div>
    <div class="row-column"><div id='cmbObjectType' name="Objects[ObjectType]"></div><?php echo $form->error($model,'ObjectType'); ?></div>
</div>
<div class="row">
    <div class="row-column">Тип</div>
    <div class="row-column"><div id='cmbComplexity' name="Objects[Complexity_id]"></div><?php echo $form->error($model,'Complexity_id'); ?></div>
</div>
<div class="row">
    <div class="row-column">Код</div>
    <div class="row-column"><input id="edCode" name="Objects[Code]" type="text" /><?php echo $form->error($model,'Code'); ?></div>
    <div class="row-column"><div id='edMasterKey' name="Objects[MasterKey]" >Мастер ключ</div><?php echo $form->error($model,'MasterKey'); ?></div>
</div>
<div class="row">
    <div class="row-column">Сигнал</div>
    <div class="row-column"><div id="edSignal" name="Objects[Signal]" ></div><?php echo $form->error($model,'Signal'); ?></div>
    <div class="row-column">Тип связи</div>
    <div class="row-column"><div id='cmbConnType' name="Objects[Cntp_id]"></div><?php echo $form->error($model,'Cntp_id'); ?></div>
</div>
<div class="row">
    <div class="row-column" style="width: 106px">Примечание</div>
    <div class="row-column"><textarea id="edNote" name="Objects[Note]"><?php echo $model->Note; ?></textarea><?php echo $form->error($model,'Note'); ?></div>
</div>
<div class="row">
    <div class="row-column" style="width: 106px">Особые условия<br> обслуживания</div>
    <div class="row-column"><textarea id="edCondition" name="Objects[Condition]"><?php echo $model->Condition; ?></textarea><?php echo $form->error($model,'Condition'); ?></div>
</div>


    
<?php $this->endWidget(); ?>
