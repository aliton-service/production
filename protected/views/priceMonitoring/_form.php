<script type="text/javascript">
    
    $(document).ready(function () {
        
        var DataEquipName = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEquipsMin, {}));
        var DataNameSupplier = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListSuppliersMin, {}));
        
        $("#date").jqxDateTimeInput({ width: '300px', height: '25px', formatString: 'dd-MM-yyyy' });
        
        $("#EquipName").jqxComboBox({ source: DataEquipName, width: '300', height: '25px', displayMember: "EquipName", valueMember: "Equip_id" });
        $("#NameSupplier").jqxComboBox({ source: DataNameSupplier, width: '300', height: '25px', displayMember: "NameSupplier", valueMember: "Supplier_id" });
        
        $("#price").jqxNumberInput({ width: '300px', height: '25px', inputMode: 'simple' });
        $("#price_retail").jqxNumberInput({ width: '300px', height: '25px', inputMode: 'simple' });
        
        $("#delivery").jqxInput($.extend(true, {}, InputDefaultSettings, { width: '298px', height: '25px' }));
        
        $("#SaveNewPriceMonitoring").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#SaveNewPriceMonitoring").on('click', function ()
        {
            $('#PriceMonitoring').submit();
        });
        
        var Demand = {
            date: '<?php echo $model->date; ?>',
            eqip_id: '<?php echo $model->eqip_id; ?>',
            splr_id: '<?php echo $model->splr_id; ?>',
            price: '<?php echo $model->price; ?>',
            price_retail: '<?php echo $model->price_retail; ?>',
            delivery: '<?php echo $model->delivery; ?>',
        };

        if (Demand.date != '') $("#date").jqxDateTimeInput('val', Demand.date);
        if (Demand.eqip_id != '') $("#EquipName").jqxComboBox('val', Demand.eqip_id);
        if (Demand.splr_id != '') $("#NameSupplier").jqxComboBox('val', Demand.splr_id);
        if (Demand.price != '') $("#price").jqxNumberInput('val', Demand.price);
        if (Demand.price_retail != '') $("#price_retail").jqxNumberInput('val', Demand.price_retail);
        if (Demand.delivery != '') $("#delivery").jqxInput('val', Demand.delivery);
    });   
</script>

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

    <div class="row">Дата: <div id='date' name="PriceMonitoring[date]" ></div></div>
    <div class="row">Оборудование: <br/><div name="PriceMonitoring[eqip_id]" type="text" id="EquipName" ></div><?php echo $form->error($model, 'eqip_id'); ?></div>
    <div class="row">Поставщик: <br/><div name="PriceMonitoring[splr_id]" type="text" id="NameSupplier" ></div><?php echo $form->error($model, 'splr_id'); ?></div>
    <div class="row">Цена закупка: <br/><div id='price' name="PriceMonitoring[price]"></div><?php echo $form->error($model, 'price'); ?></div>
    <div class="row">Цена розница: <br/><div id='price_retail' name="PriceMonitoring[price_retail]"></div><?php echo $form->error($model, 'price_retail'); ?></div>
    <div class="row">Срок поставки: <br/><input name="PriceMonitoring[delivery]" type="text" id="delivery" value="<?php echo $model->delivery; ?>"><?php echo $form->error($model, 'delivery'); ?></div>
    <br/>
    <div class="row-column"><input type="button" value="Сохранить" id='SaveNewPriceMonitoring' /></div>


<?php $this->endWidget(); ?>
