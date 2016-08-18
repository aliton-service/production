<script type="text/javascript">
    $(document).ready(function(){
        var DeliveryDetail = {
            dldt_id: <?php echo json_encode($model->dldt_id); ?>,
            dldm_id: <?php echo json_encode($model->dldm_id); ?>,
            equip_id: <?php echo json_encode($model->equip_id); ?>,
            quant: <?php echo json_encode($model->quant); ?>,
            used: <?php echo json_encode($model->used); ?>,
            price: <?php echo json_encode($model->price); ?>,
            deldate: <?php echo json_encode($model->deldate); ?>,
            equipname: <?php echo json_encode($model->equipname); ?>,
            um_name: <?php echo json_encode($model->um_name); ?>,
        };
        $("#btnDeliveryDetailOk").jqxButton({disabled: true});
        $("#edUmName").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 50}));
        var DataEquips = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEquipsMin, {async: true}));
        var find = function(id) {
            for (var i = 0; i < DataEquips.records.length; i++) {
                if (DataEquips.records[i].Equip_id == id) {
                    return DataEquips.records[i];
                }
            }
            return null;
        };
        var InfoEquip = function(Equip_id) {
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Equips/EquipInfo')); ?>,
                type: 'POST',
                data: {Equip_id: Equip_id},
                success: function(Res) {
                    var Info = JSON.parse(Res);
                    $("#edInvQuant").jqxNumberInput('val', Info.Quant);
                    $("#edInvQuantUsed").jqxNumberInput('val', Info.QuantUsed);
                    $("#edResvQuant").jqxNumberInput('val', Info.QuantReserv);
                }
            });
        };
        $("#edEditDetailEquip").on('select', function(event){
            var args = event.args;
            if (args) {
                var item = args.item;
                var value = item.value;
                var row = find(value);
                $("#edUmName").jqxInput('val', row.NameUM);
                InfoEquip(value);
            }
        });
        $("#edEditDetailEquip").on('bindingComplete', function(){
            if (DeliveryDetail.equip_id != '') $("#edEditDetailEquip").jqxComboBox('val', DeliveryDetail.equip_id);
            $("#btnDeliveryDetailOk").jqxButton({disabled: false});
        });
        $("#edEditDetailEquip").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { placeHolder: '', source: DataEquips, width: '385', height: '25px', displayMember: "EquipName", valueMember: "Equip_id"}));
        $("#edQuant").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { disabled: false, width: '80px', height: '25px', decimalDigits: 0 }));
        $("#edPrice").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { disabled: false, width: '100px', height: '25px', decimalDigits: 2 }));
        $("#edInvQuant").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { disabled: true, width: '100px', height: '25px', decimalDigits: 2 }));
        $("#edInvQuantUsed").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { disabled: true, width: '100px', height: '25px', decimalDigits: 2 }));
        $("#edResvQuant").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { disabled: true, width: '100px', height: '25px', decimalDigits: 2 }));
        
        if (DeliveryDetail.quant != '') $("#edQuant").jqxNumberInput('val', DeliveryDetail.quant);
        if (DeliveryDetail.price != '') $("#edPrice").jqxNumberInput('val', DeliveryDetail.price);
    });
</script>    

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'DeliveryDetails',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>
<input type="hidden" name="DeliveryDetails[dldt_id]" value="<?php echo $model->dldt_id; ?>" />
<input type="hidden" name="DeliveryDetails[dldm_id]" value="<?php echo $model->dldm_id; ?>" />
<div class="row">
    <div class="row-column">
        <div>Оборудование</div>
        <div><div id="edEditDetailEquip" name="DeliveryDetails[equip_id]"></div><?php echo $form->error($model, 'equip_id'); ?></div>
    </div>
    <div class="row-column">
        <div>Ед. изм.</div>
        <div><input type="text" id="edUmName" /></div>
    </div>
    <div class="row-column">
        <div>Количество</div>
        <div><div id="edQuant" name="DeliveryDetails[quant]"></div><?php echo $form->error($model, 'quant'); ?></div>
    </div>
    <div class="row-column">
        <div>Цена</div>
        <div><div id="edPrice" name="DeliveryDetails[price]"></div></div>
    </div>
</div>    
<div class="row">
    <div class="row-column">В наличие: Новое</div>
    <div class="row-column"><div id="edInvQuant"></div></div>
    <div class="row-column">Б\У</div>
    <div class="row-column"><div id="edInvQuantUsed"></div></div>
    <div class="row-column" style="float: right"><div id="edResvQuant"></div></div>
    <div class="row-column" style="float: right">Зарезервировано</div>
    
</div>
<?php $this->endWidget(); ?>