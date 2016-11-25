<script type="text/javascript">
        $(document).ready(function () {
            var StateInsert = <?php if (Yii::app()->controller->action->id == 'Insert') echo 'true'; else echo 'false'; ?>;
            var ContractPriceHistoryForm = {
                PriceHistory_id: '<?php echo $model->PriceHistory_id; ?>',
                ContrS_id: '<?php echo $model->ContrS_id; ?>',
                DateEnd: Aliton.DateConvertToJs(<?php echo json_encode($model->DateEnd); ?>),
                Reason: '<?php echo $model->Reason_id; ?>',
                DateStart: Aliton.DateConvertToJs(<?php echo json_encode($model->DateStart); ?>),
                ServiceType: '<?php echo $model->ServiceType_id; ?>',
                Price: '<?php echo $model->Price; ?>',
                PriceMonth: '<?php echo $model->PriceMonth; ?>',
            };
            
            
            
            var DataPriceChangeReasons = new $.jqx.dataAdapter(Sources.SourcePriceChangeReasons);
            var DataServiceTypes = new $.jqx.dataAdapter(Sources.SourceServiceTypes);
            
            $("#Reason").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataPriceChangeReasons, displayMember: "ReasonName", valueMember: "Reason_id", width: 410 }));
            $("#DateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 100 }));
            $("#ServiceType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataServiceTypes, displayMember: "ServiceType", valueMember: "ServiceType_id", width: 410 }));
            $("#Price").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 130, symbolPosition: 'right', min: 0, decimalDigits: 2 }));
            $("#PriceMonth").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 130, symbolPosition: 'right', min: 0, decimalDigits: 2 }));
            $("#BtnOkDialogContractPriceHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#BtnCancelDialogContractPriceHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                        
            if (ContractPriceHistoryForm.Reason != '') $("#Reason").jqxComboBox('val', ContractPriceHistoryForm.Reason);
            if (ContractPriceHistoryForm.DateStart != '') $("#DateStart").jqxDateTimeInput('val', ContractPriceHistoryForm.DateStart);
            if (ContractPriceHistoryForm.ServiceType != '') $("#ServiceType").jqxComboBox('val', ContractPriceHistoryForm.ServiceType);
            if (ContractPriceHistoryForm.Price != '') $("#Price").jqxNumberInput('val', ContractPriceHistoryForm.Price);
            if (ContractPriceHistoryForm.PriceMonth != '') $("#PriceMonth").jqxNumberInput('val', ContractPriceHistoryForm.PriceMonth);
            
            $("#BtnCancelDialogContractPriceHistory").on('click', function () {
                $('#EditDialogContractPriceHistory').jqxWindow('close');
            });
            
            $("#BtnOkDialogContractPriceHistory").on('click', function () {
                var Url;
                if (StateInsert)
                    Url = "<?php echo Yii::app()->createUrl('ContractPriceHistory/Insert');?>";
                else
                    Url = "<?php echo Yii::app()->createUrl('ContractPriceHistory/Update');?>";

                $.ajax({
                    url: Url,
                    type: 'POST',
                    async: false,
                    data: $('#ContractPriceHistory').serialize(),
                    success: function(Res) {
                        if (Res == '1' || Res == 1) {
                            $('#EditDialogContractPriceHistory').jqxWindow('close');
                            $("#ContractPriceHistoryGrid").jqxGrid('updatebounddata');
                        } else {
                            $('#BodyDialogContractPriceHistory').html(Res);
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            });
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
<?php // echo ' Price = ' . $model->Price; ?>
<?php // echo ' PriceMonth = ' . $model->PriceMonth; ?>
<?php // echo ' Reason_id = ' . $model->Reason; ?>

<input type="hidden" name="ContractPriceHistory[PriceHistory_id]" value="<?php echo $model->PriceHistory_id; ?>">
<input type="hidden" name="ContractPriceHistory[ContrS_id]" value="<?php echo $model->ContrS_id; ?>">
<input type="hidden" name="ContractPriceHistory[DateEnd]" value="<?php echo $model->DateEnd; ?>">

<div class="row"><div class="row-column">Причина изменения: </div><div class="row-column"><div id='Reason' name="ContractPriceHistory[Reason_id]"></div><?php echo $form->error($model, 'Reason_id'); ?></div></div>
<div class="row"><div class="row-column">Дата начала действия: </div><div class="row-column"><div id="DateStart" name="ContractPriceHistory[DateStart]"></div></div></div>
<div class="row"><div class="row-column">Тариф: </div><div class="row-column"><div id='ServiceType' name="ContractPriceHistory[ServiceType_id]"></div><?php echo $form->error($model, 'ServiceType_id'); ?></div></div>
<div class="row"><div class="row-column">Расценка: </div><div class="row-column"><div id="Price" name="ContractPriceHistory[Price]"><?php echo $form->error($model, 'Price'); ?></div></div></div>
<div class="row"><div class="row-column">Ежемесячные начисления: </div><div class="row-column"><div id="PriceMonth" name="ContractPriceHistory[PriceMonth]"><?php echo $form->error($model, 'PriceMonth'); ?></div></div></div>

<div class="al-row">
    <div class="row-column"><input type="button" value="Сохранить" id='BtnOkDialogContractPriceHistory' /></div>
    <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='BtnCancelDialogContractPriceHistory' /></div>
    <div style="clear: both"></div>
</div>                

<?php $this->endWidget(); ?>