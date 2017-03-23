<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var RepairDetails = {
            rpdt_id: <?php echo json_encode($model->rpdt_id); ?>,
            repr_id: <?php echo json_encode($model->repr_id); ?>,
            eqip_id: <?php echo json_encode($model->eqip_id); ?>,
            EquipName: <?php echo json_encode($model->EquipName); ?>,
            um_name: <?php echo json_encode($model->um_name); ?>,
            docm_quant: <?php echo json_encode($model->docm_quant); ?>,
            fact_quant: <?php echo json_encode($model->fact_quant); ?>,
            summa: <?php echo json_encode($model->summa); ?>,
        };
        
        $('#RepairDetails').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        var DataEquips = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEquipsMin, {async: true}));
        $("#edEquipEdit").on('select', function(event) {
            var args = event.args;
            if (args) {
                var Item = args.item;
                var Value = Item.value;
                var Row = Aliton.FindArray(DataEquips.records, 'Equip_id', Value);
                if (Row != null)
                    $("#edUmNameEdit").val(Row.NameUM);
                    
            }
        });
        
        $("#edEquipEdit").on('bindingComplete', function(event){
            if (RepairDetails.eqip_id != '') $("#edEquipEdit").jqxComboBox('val', RepairDetails.eqip_id);
            $("#btnSaveRepairDetails").jqxButton({disabled: false});
        });
        
        $("#edEquipEdit").jqxComboBox($.extend(true, {}, { source: DataEquips, width: '350', height: '25px', displayMember: "EquipName", valueMember: "Equip_id", searchMode: 'containsignorecase', autoComplete: true /*, renderer: EquipRenderer */}));
        $("#edUmNameEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {width: '50px'}));
        $("#edQuantEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px', decimalDigits: 0}));
        $("#edPriceEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '90px'}));
        $("#edFactQuantEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '90px', decimalDigits: 0}));
        $('#btnSaveRepairDetails').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: true }));
        $('#btnCancelRepairDetails').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        
        $('#btnCancelRepairDetails').on('click', function(){
            if ($('#RepairsDialog').length>0)
                $('#RepairsDialog').jqxWindow('close');
        });
        
        $('#btnSaveRepairDetails').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('RepairDetails/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('RepairDetails/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#RepairDetails').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('rpdt_id', Res.id, '#GridEquips', true);
                        if ($('#RepairsDialog').length>0) {
                            Repairs.Refresh();
                            $('#RepairsDialog').jqxWindow('close');
                            
                        }
                    }
                    else {
                        if ($('#RepairsDialog').length>0)
                            $('#BodyRepairsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        
        
        if (RepairDetails.docm_quant != null) $("#edQuantEdit").jqxNumberInput('val', RepairDetails.docm_quant);
        if (RepairDetails.price != '') $("#edPriceEdit").jqxNumberInput('val', RepairDetails.price);
        if (RepairDetails.fact_quant != '') $("#edFactQuantEdit").jqxNumberInput('val', RepairDetails.fact_quant);
        
    });
</script>        

<?php
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'RepairDetails',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="RepairDetails[rpdt_id]" value="<?php echo $model->rpdt_id; ?>"/>
<input type="hidden" name="RepairDetails[repr_id]" value="<?php echo $model->repr_id; ?>"/>

<div class="row">
    <div class="row-column">
        <div><div class="row-column">Оборудование</div></div>
        <div style="clear: both"></div>
        <div><div class="row-column"><div name="RepairDetails[eqip_id]" id="edEquipEdit"></div><?php echo $form->error($model, 'eqip_id'); ?></div></div>
    </div>
    <div class="row-column">
        <div><div class="row-column">Ед. изм.</div></div>
        <div style="clear: both"></div>
        <div><div class="row-column"><input type="text" id="edUmNameEdit" /></div></div>
    </div>
    <div class="row-column">
        <div><div class="row-column">Количество</div></div>
        <div style="clear: both"></div>
        <div><div class="row-column"><div id="edQuantEdit" name="RepairDetails[docm_quant]"></div><?php echo $form->error($model, 'docm_quant'); ?></div></div>
    </div>
    <div class="row-column" style="float: right">
        <div><div class="row-column">Цена</div></div>
        <div style="clear: both"></div>
        <div><div class="row-column"><div id="edPriceEdit" name="RepairDetails[price]"></div><?php echo $form->error($model, 'price'); ?></div></div>
    </div>
</div>
<div class="row">
    <div style="float: right">
        <div class="row-column" style="margin: 0;">Факт. кол-во:</div>
        <div><div class="row-column"><div id="edFactQuantEdit" name="RepairDetails[fact_quant]"></div><?php echo $form->error($model, 'fact_quant'); ?></div></div>
    </div>
</div>
   
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveRepairDetails'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelRepairDetails'/></div>
</div>
<?php $this->endWidget(); ?>



