<script type="text/javascript">
        $(document).ready(function () {
            var ContractPriceHistoryForm = {
                PriceHistory_id: '<?php echo $model->PriceHistory_id; ?>',
                ContrS_id: '<?php echo $model->ContrS_id; ?>',
                Reason: '<?php echo $model->Reason_id; ?>',
                DateStart: Aliton.DateConvertToJs('<?php echo $model->DateStart; ?>'),
                ServiceType: '<?php echo $model->ServiceType_id; ?>',
                Price: '<?php echo $model->Price; ?>',
                PriceMonth: '<?php echo $model->PriceMonth; ?>',
            };
            
            var DataPriceChangeReasons = new $.jqx.dataAdapter(Sources.SourcePriceChangeReasons);
            var DataServiceTypes = new $.jqx.dataAdapter(Sources.SourceServiceTypes);
            
            $("#Reason").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataPriceChangeReasons, displayMember: "ReasonName", valueMember: "Reason_id", width: 410 }));
            $("#DateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 100 }));
            $("#ServiceType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataServiceTypes, displayMember: "ServiceType", valueMember: "ServiceType_id", width: 410 }));
            $("#Price").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
            $("#PriceMonth").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
            
            if (ContractPriceHistoryForm.Reason != '') $("#Reason").jqxComboBox('val', ContractPriceHistoryForm.Reason);
            if (ContractPriceHistoryForm.DateStart != '') $("#DateStart").jqxDateTimeInput('val', ContractPriceHistoryForm.DateStart);
            if (ContractPriceHistoryForm.ServiceType != '') $("#ServiceType").jqxComboBox('val', ContractPriceHistoryForm.ServiceType);
            if (ContractPriceHistoryForm.Price != '') $("#Price").jqxInput('val', ContractPriceHistoryForm.Price);
            if (ContractPriceHistoryForm.PriceMonth != '') $("#PriceMonth").jqxInput('val', ContractPriceHistoryForm.PriceMonth);
        });
</script> 

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'ContractPriceHistory',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<input type="hidden" name="ContractPriceHistory[PriceHistory_id]" value="<?php echo $model->PriceHistory_id; ?>">
<input type="hidden" name="ContractPriceHistory[ContrS_id]" value="<?php echo $model->ContrS_id; ?>">

<div class="row"><div class="row-column">Причина изменения: </div><div class="row-column"><div id='Reason' name="ContractPriceHistory[Reason_id]"></div><?php echo $form->error($model, 'Reason_id'); ?></div></div>
<div class="row"><div class="row-column">Дата начала действия: </div><div class="row-column"><div id="DateStart" name="ContractPriceHistory[DateStart]" type="text"></div></div></div>
<div class="row"><div class="row-column">Тариф: </div><div class="row-column"><div id='ServiceType' name="ContractPriceHistory[ServiceType_id]"></div><?php echo $form->error($model, 'ServiceType_id'); ?></div></div>
<div class="row"><div class="row-column">Расценка: <input id="Price" name="ContractPriceHistory[Price]" type="text"><?php echo $form->error($model, 'Price'); ?></div></div>
<div class="row"><div class="row-column">Ежемесячные начисления: <input id="PriceMonth" name="ContractPriceHistory[PriceMonth]" type="text"><?php echo $form->error($model, 'PriceMonth'); ?></div></div>


<?php $this->endWidget(); ?>