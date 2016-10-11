<script type="text/javascript">
    $(document).ready(function(){
        var ObjectEquip = {
            Code: <?php echo json_encode($model->Code); ?>,
            Object_id: <?php echo json_encode($model->Object_Id); ?>,
            Equip_id: <?php echo json_encode($model->Equip_id); ?>,
            EquipQuant: <?php echo json_encode($model->EquipQuant); ?>,
            StockNumber: <?php echo json_encode($model->StockNumber); ?>,
            Location: <?php echo json_encode($model->Location); ?>,
            DateInstall: Aliton.DateConvertToJs('<?php echo $model->DateInstall; ?>'),
            DateService: Aliton.DateConvertToJs('<?php echo $model->DateService; ?>'),
            Note: <?php echo json_encode($model->Note); ?>
            
        };
        $("#btnObjectEquipOk").jqxButton({disabled: true});
        var DataEquips = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEquipsMin, {async: true}));
        $("#cmbEquip").on('bindingComplete', function (event) {
            if (ObjectEquip.Equip_id !== '') $("#cmbEquip").jqxComboBox('val', ObjectEquip.Equip_id);
            $("#btnObjectEquipOk").jqxButton({disabled: false});
        });
        
        $("#cmbEquip").jqxComboBox({ source: DataEquips, width: '400px', height: '25px', displayMember: "EquipName", valueMember: "Equip_id"});
        $("#edEquipQuant").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: '80px', height: '25px', decimalDigits: 0 }));
        $("#edStockNumber").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 250}));
        $("#edLocation").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 250}));
        $("#edDateInstall").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: ObjectEquip.DateInstall}));
        $("#edDateService").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: ObjectEquip.DateService}));
        $('#edNoteObjectEquip').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { placeHolder: 'Примечание', height: 50, width: 444 }));
        
        if (ObjectEquip.EquipQuant !== '') $("#edEquipQuant").jqxNumberInput('val', ObjectEquip.EquipQuant);
        if (ObjectEquip.StockNumber !== '') $("#edStockNumber").jqxInput('val', ObjectEquip.StockNumber);
        if (ObjectEquip.Location !== '') $("#edLocation").jqxInput('val', ObjectEquip.Location);
        if (ObjectEquip.DateInstall !== '') $("#edLocation").jqxNumberInput('val', ObjectEquip.Location);
        if (ObjectEquip.Note !== '') $("#edNoteObjectEquip").jqxTextArea('val', ObjectEquip.Note);
        
        
    });
</script>    

<?php
    $form=$this->beginWidget('CActiveForm', array(
            'id'=>'ObjectEquips',
    ));
?>    

<input type="hidden" name="ObjectEquips[Code]" value="<?php echo $model->Code; ?>"/>
<input type="hidden" name="ObjectEquips[Object_Id]" value="<?php echo $model->Object_Id; ?>"/>
<input type="hidden" name="ObjectEquips[ObjectGr_id]" value="<?php echo $model->ObjectGr_id; ?>"/>

<div class="row">
    <div class="row-column">Оборудование</div>
    <div class="row-column"><div id='cmbEquip' name="ObjectEquips[Equip_id]"></div><?php echo $form->error($model,'Equip_id'); ?></div>
</div>
<div class="row">
    <div class="row-column">Количество</div>
    <div class="row-column"><div id='edEquipQuant' name="ObjectEquips[EquipQuant]"></div></div>
</div>
<div class="row">
    <div class="row-column">Описание оборудования</div>
    <div class="row-column"><input id='edStockNumber' name="ObjectEquips[StockNumber]" /></div>
</div>
<div class="row">
    <div class="row-column">Месторасположение</div>
    <div class="row-column"><input id='edLocation' name="ObjectEquips[Location]" /></div>
</div>
<div class="row">
    <div class="row-column">Дата установки</div>
    <div class="row-column"><div id='edDateInstall' name="ObjectEquips[DateInstall]"></div></div>
</div>
<div class="row">
    <div class="row-column">Дата постановки на обслуживание</div>
    <div class="row-column"><div id='edDateService' name="ObjectEquips[DateService]"></div></div>
</div>
<div class="row">
    <div class="row-column">Примечание</div>
    <div class="row-column"><textarea id="edNoteObjectEquip" name="ObjectEquips[Note]"><?php echo $model->Note; ?></textarea></div>
</div>
<?php
    $this->endWidget();
?>