<script type="text/javascript">
    $(document).ready(function () {
        
        var MonitoringDemandDetails = {
            Equip: '<?php echo $model->equip_id; ?>',
            quant: '<?php echo $model->quant; ?>',
            price_high: '<?php echo $model->price_high; ?>',
        };

        var DataEquip = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEquipsMin, {async: true}));

        $("#Equip").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEquip, displayMember: "EquipName", valueMember: "Equip_id", width: 600 }));
        $("#quant").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 80, symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
        $("#price_high").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 80, symbolPosition: 'right', min: 0, decimalDigits: 0, readOnly: true }));
        $("#sum").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 80, symbolPosition: 'right', min: 0, decimalDigits: 0, readOnly: true }));
        
        $("#Equip").on('bindingComplete', function(){
            if (MonitoringDemandDetails.Equip != '') $("#Equip").jqxComboBox('val', MonitoringDemandDetails.Equip);
        });
        
        $('#Equip').on('select', function (event){
            var args = event.args;
            if (args) {
                var item = args.item;
                var value = item.value;
                console.log(value );
                
                $.ajax({
                    url: "<?php echo Yii::app()->createUrl('EquipForMDDetails/Index');?>",
                    type: 'POST',
                    async: false,
                    data: { Equip_id: value },
                    success: function(Res) {
                        console.log(Res);
                        $('#price_high').jqxNumberInput('val', Res);
                    }
                });
            }
        }); 
        
        if (MonitoringDemandDetails.quant != '') $("#quant").jqxNumberInput('val', MonitoringDemandDetails.quant);
        if (MonitoringDemandDetails.price_high != '') $("#price_high").jqxNumberInput('val', MonitoringDemandDetails.price_high);
        
        var setSum = function () {
            var price = $('#price_high').val();
            var quant = $('#quant').val();
            if (price != '') {
                var sum = quant * price;
                $("#sum").jqxNumberInput('val', sum);
            }
        };
        
        setSum();
        
        $('#quant').on('valueChanged', function (event)
        {
            var value = event.args.value;
            console.log(value);
            
            setSum();
        }); 
        
    });
           
</script>

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'MonitoringDemandDetails',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<input type="hidden" name="MonitoringDemandDetails[mndt_id]" value="<?php echo $model->mndt_id; ?>">
<input type="hidden" name="MonitoringDemandDetails[mndm_id]" value="<?php echo $model->mndm_id; ?>">

<div class="row">
    <div class="row-column">Оборудование: <div id="Equip" name="MonitoringDemandDetails[equip_id]"></div><?php echo $form->error($model, 'equip_id'); ?></div>
</div>

<div class="row">
    <div class="row-column">Количество: <div id="quant" name="MonitoringDemandDetails[quant]"></div><?php echo $form->error($model, 'quant'); ?></div>
    <div class="row-column">Цена: <div id="price_high"></div></div>
    <div class="row-column">Сумма: <div id="sum"></div></div>
</div>


<?php $this->endWidget(); ?>