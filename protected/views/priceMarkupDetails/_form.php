<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        
        var PriceMarkupDetails = {
            mrdt_id: '<?php echo $model->mrdt_id; ?>',
            mrkp_id: '<?php echo $model->mrkp_id; ?>',
            eqip_id: '<?php echo $model->eqip_id; ?>',
            splr_id: '<?php echo $model->splr_id; ?>',
            grp_id: '<?php echo $model->grp_id; ?>',
            Price: '<?php echo $model->Price; ?>',
            MarkupLow: '<?php echo $model->MarkupLow; ?>',
            MarkupHigh: '<?php echo $model->MarkupHigh; ?>',
        };
        
        $('#PriceMarkupDetails').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        var GroupsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEquipGroupsListMin));
        var SuppliersDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceSuppliersListMin));
        var EquipsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEquipsMin, {async: true}));
        
        $("#Groups").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: GroupsDataAdapter, displayMember: "name", valueMember: "grp_id", width: 220 }));
        $("#Suppliers").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: SuppliersDataAdapter, displayMember: "NameSupplier", valueMember: "Supplier_id", width: 300 }));
        $("#Equips").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: EquipsDataAdapter, displayMember: "EquipName", valueMember: "Equip_id", width: 400 }));
        
        $("#Price").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 90, symbol: "", min: 0, decimalDigits: 0 }));
        $("#MarkupLow").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 90, symbol: "", min: 0, decimalDigits: 0 }));
        $("#MarkupHigh").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 90, symbol: "", min: 0, decimalDigits: 0 }));
        
        $('#btnSavePriceMarkupDetails').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: true }));
        $('#btnCancelPriceMarkupDetails').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelPriceMarkupDetails').on('click', function(){
            $('#PriceMarkupsDialog').jqxWindow('close');
        });
        
        $('#btnSavePriceMarkupDetails').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('PriceMarkupDetails/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('PriceMarkupDetails/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#PriceMarkupDetails').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('mrdt_id', Res.id, '#PriceMarkupDetailsGrid', true);
                        $('#PriceMarkupsDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyPriceMarkupsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        var CheckButtonDetailsForm = function() {
            $('#btnSavePriceMarkupDetails').jqxButton({ disabled: false });
        };
        
        $("#Groups").on('bindingComplete', function(){
            if (PriceMarkupDetails.grp_id !== null) $("#Groups").jqxComboBox('val', PriceMarkupDetails.grp_id);
        });
        $("#Suppliers").on('bindingComplete', function(){
            if (PriceMarkupDetails.splr_id != '') $("#Suppliers").jqxComboBox('val', PriceMarkupDetails.splr_id);
        });
        $("#Equips").on('bindingComplete', function(){
            if (PriceMarkupDetails.eqip_id != '') $("#Equips").jqxComboBox('val', PriceMarkupDetails.eqip_id);
            CheckButtonDetailsForm();
        });
        
        if (PriceMarkupDetails.Price !== null) $("#Price").jqxNumberInput('val', PriceMarkupDetails.Price);
        if (PriceMarkupDetails.MarkupLow !== null) $("#MarkupLow").jqxNumberInput('val', PriceMarkupDetails.MarkupLow);
        if (PriceMarkupDetails.MarkupHigh !== null) $("#MarkupHigh").jqxNumberInput('val', PriceMarkupDetails.MarkupHigh);
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'PriceMarkupDetails',
	'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<input type="hidden" name="PriceMarkupDetails[mrdt_id]" value="<?php echo $model->mrdt_id; ?>"/>
<input type="hidden" name="PriceMarkupDetails[mrkp_id]" value="<?php echo $model->mrkp_id; ?>"/>


<div class="row" style="padding: 10px; width: 95%; border: 1px solid #ddd; background-color: #F2F2F2;">
    <div class="row" style="margin: 0 0 10px 0; padding-top: 0;"><div class="row-column">Условия применения наценки: </div></div>
    <div class="row">
        <div class="row-column">Группа </div><div id="Groups" name="PriceMarkupDetails[grp_id]"></div>
    </div>
    <div class="row">
        <div class="row-column">Поставщик </div><div id="Suppliers" name="PriceMarkupDetails[splr_id]"></div>
    </div>
    <div class="row">
        <div class="row-column">Оборудование </div><div id="Equips" name="PriceMarkupDetails[eqip_id]"></div>
    </div>
    <div class="row">
        <div class="row-column">Цена от </div><div id="Price" name="PriceMarkupDetails[Price]"></div>
    </div>
</div>

<div class="row">
    <div class="row-column" style="margin-left: 10px;">Закупка </div><div class="row-column"><div id="MarkupLow" name="PriceMarkupDetails[MarkupLow]"></div></div>
    <div class="row-column" style="margin-left: 30px;">Розница </div><div class="row-column"><div id="MarkupHigh" name="PriceMarkupDetails[MarkupHigh]"></div></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSavePriceMarkupDetails'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelPriceMarkupDetails'/></div>
</div>
<?php $this->endWidget(); ?>



