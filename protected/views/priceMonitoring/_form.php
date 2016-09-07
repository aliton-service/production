<script type="text/javascript">
    
    $(document).ready(function () {
        
        var DataEquipName = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEquipsMin, {async: true}));
        var DataNameSupplier = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListSuppliersMin, {}));
        
        $("#date").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 170, showTimeButton: true, value: new Date() }));
        $("#Mndm_id").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 100 }));

        $("#EquipName").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEquipName, displayMember: "EquipName", valueMember: "Equip_id", width: 500 }));
        
        $("#NameSupplier").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataNameSupplier, displayMember: "NameSupplier", valueMember: "Supplier_id", width: 300 }));
        
        $("#price").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 120, symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
        $("#price_retail").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 120, symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
        
        $("#delivery").jqxInput($.extend(true, {}, InputDefaultSettings, { width: '120px' }));
        
        $("#EquipName").on('bindingComplete', function(){
            if (Demand.eqip_id != '') $("#EquipName").jqxComboBox('val', Demand.eqip_id);
        });
        
        var Demand = {
            date: '<?php echo $model->date; ?>',
            eqip_id: '<?php echo $model->eqip_id; ?>',
            splr_id: '<?php echo $model->splr_id; ?>',
            price: '<?php echo $model->price; ?>',
            price_retail: '<?php echo $model->price_retail; ?>',
            delivery: '<?php echo $model->delivery; ?>',
            Mndm_id: '<?php echo $model->Mndm_id; ?>',
        };

        if (Demand.date != '') $("#date").jqxDateTimeInput('val', Demand.date);
        if (Demand.splr_id != '') $("#NameSupplier").jqxComboBox('val', Demand.splr_id);
        if (Demand.price != '') $("#price").jqxNumberInput('val', Demand.price);
        if (Demand.price_retail != '') $("#price_retail").jqxNumberInput('val', Demand.price_retail);
        if (Demand.delivery != '') $("#delivery").jqxInput('val', Demand.delivery);
        if (Demand.Mndm_id != '') $("#Mndm_id").jqxInput('val', Demand.Mndm_id);
        if (Demand.eqip_id != '') $("#EquipName").jqxComboBox('val', Demand.eqip_id);
    });   
</script>

<?php $this->setPageTitle('Мониторинг цен'); ?>

<?php
/* @var $this PriceMonitoringController */
/* @var $model PriceMonitoring */
/* @var $form CActiveForm */
?>

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'PriceMonitoring',
        'htmlOptions'=>array(
            'class'=>'form-inline',
        ),
     )); 
?>

<div class="row">
    <div class="row-column">Дата: <div id='date' name="PriceMonitoring[date]" ></div></div>
    <div class="row-column">Номер заявки: <br/><input name="PriceMonitoring[Mndm_id]" type="text" id="Mndm_id"></div>
</div>

<div class="row"><div class="row-column">Оборудование: <br/><div name="PriceMonitoring[eqip_id]" type="text" id="EquipName" ></div><?php echo $form->error($model, 'eqip_id'); ?></div></div>
<div class="row"><div class="row-column">Поставщик: <br/><div name="PriceMonitoring[splr_id]" type="text" id="NameSupplier" ></div><?php echo $form->error($model, 'splr_id'); ?></div></div>
<div class="row">
    <div class="row-column">Цена закупки: <br/><div id='price' name="PriceMonitoring[price]"></div><?php echo $form->error($model, 'price'); ?></div>
    <div class="row-column">Цена розницы: <br/><div id='price_retail' name="PriceMonitoring[price_retail]"></div><?php echo $form->error($model, 'price_retail'); ?></div>
    <div class="row-column">Срок поставки: <br/><input name="PriceMonitoring[delivery]" type="text" id="delivery" ><?php echo $form->error($model, 'delivery'); ?></div>
</div>




<?php $this->endWidget(); ?>
