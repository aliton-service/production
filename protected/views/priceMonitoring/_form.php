<script type="text/javascript">
    
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var DataEquipName = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEquipsMin, {async: true}));
        var DataNameSupplier = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListSuppliersMin, {}));
        
        $("#date").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 170, showTimeButton: true, value: new Date() }));
        $("#Mndm_id").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 100 }));

        $("#EquipName").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEquipName, displayMember: "EquipName", valueMember: "Equip_id", width: 'calc(100% - 2px)' }));
        
        $("#NameSupplier").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataNameSupplier, displayMember: "NameSupplier", valueMember: "Supplier_id", width: 'calc(100% - 2px)' }));
        
        $("#price").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 120, symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
        $("#price_retail").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 120, symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
        
        $("#delivery").jqxInput($.extend(true, {}, InputDefaultSettings, { width: '120px' }));
        
        $("#EquipName").on('bindingComplete', function(){
            if (Demand.eqip_id != '') $("#EquipName").jqxComboBox('val', Demand.eqip_id);
        });
        
        $('#btnSavePriceMonitoring').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelPriceMonitoring').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelPriceMonitoring').on('click', function(){
            if ($('#PriceMonitoringDialog').length>0)
                $('#PriceMonitoringDialog').jqxWindow('close');
            if ($('#EditDialogAddPrice').length>0)
                $('#EditDialogAddPrice').jqxWindow('close');
        });
        
        $('#btnSavePriceMonitoring').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('PriceMonitoring/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('PriceMonitoring/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#PriceMonitoring').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        if ($('#PriceMonitoringDialog').length>0) {
                            Aliton.SelectRowById('mntr_id', Res.id, '#PriceMonitoringGrid', true);
                            $('#PriceMonitoringDialog').jqxWindow('close');
                        }
                        if ($('#EditDialogAddPrice').length>0)
                            $('#EditDialogAddPrice').jqxWindow('close');
                    }
                    else {
                        $('#BodyPriceMonitoringDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        var Demand = {
            date: '<?php echo $model->date; ?>',
            eqip_id: '<?php echo $model->eqip_id; ?>',
            splr_id: '<?php echo $model->splr_id; ?>',
            price: '<?php echo $model->price; ?>',
            price_retail: '<?php echo $model->price_retail; ?>',
            delivery: <?php echo json_encode($model->delivery); ?>,
            Mndm_id: '<?php echo $model->Mndm_id; ?>',
        };

        if (Demand.date != '') $("#date").jqxDateTimeInput('val', Demand.date);
        if (Demand.splr_id != '') $("#NameSupplier").jqxComboBox('val', Demand.splr_id);
        if (Demand.price != '') $("#price").jqxNumberInput('val', Demand.price);
        if (Demand.price_retail != '') $("#price_retail").jqxNumberInput('val', Demand.price_retail);
        if (Demand.delivery != '') $("#delivery").jqxInput('val', Demand.delivery);
        if (Demand.Mndm_id != '') $("#Mndm_id").jqxInput('val', Demand.Mndm_id);
        
    });   
</script>

<?php $this->setPageTitle('Мониторинг цен'); ?>

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'PriceMonitoring',
        'htmlOptions'=>array(
            'class'=>'form-inline',
        ),
     )); 
?>

<input type="hidden" name="PriceMonitoring[mntr_id]" value="<?php echo $model->mntr_id; ?>" />

<div class="al-row">
    <div class="al-row-column">Дата: <div id='date' name="PriceMonitoring[date]" ></div></div>
    <div class="al-row-column">Номер заявки: <br/><input name="PriceMonitoring[Mndm_id]" type="text" id="Mndm_id"></div>
    <div style="clear: both"></div>
</div>

<div class="al-row">
    <div class="al-row-column" style="width: 100px">Оборудование:</div>
    <div class="al-row-column" style="width: calc(100% - 106px)"><div name="PriceMonitoring[eqip_id]" type="text" id="EquipName" ></div><?php echo $form->error($model, 'eqip_id'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 100px">Поставщик:</div>
    <div class="al-row-column" style="width: calc(100% - 106px)"><div name="PriceMonitoring[splr_id]" type="text" id="NameSupplier" ></div><?php echo $form->error($model, 'splr_id'); ?></div>
    <div style="clear: both"></div>
</div>    
<div class="al-row">
    <div class="al-row-column">Цена закупки: <br/><div id='price' name="PriceMonitoring[price]"></div><?php echo $form->error($model, 'price'); ?></div>
    <div class="al-row-column">Цена розницы: <br/><div id='price_retail' name="PriceMonitoring[price_retail]"></div><?php echo $form->error($model, 'price_retail'); ?></div>
    <div class="al-row-column">Срок поставки: <br/><input name="PriceMonitoring[delivery]" type="text" id="delivery" ><?php echo $form->error($model, 'delivery'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Сохранить" id='btnSavePriceMonitoring'/></div>
    <div class="al-row-column" style="float: right"><input  type="button" value="Отмена" id='btnCancelPriceMonitoring'/></div>
</div>



<?php $this->endWidget(); ?>
