<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Insert') echo 'true'; else echo 'false'; ?>;
        
        var Document = {
            ContrS_id: '<?php echo $model->ContrS_id; ?>',
            ContrNumS: '<?php echo $model->ContrNumS; ?>',
            ObjectGr_id: '<?php echo $model->ObjectGr_id; ?>',
            JuridicalPerson: '<?php echo $model->Jrdc_id; ?>',
            ContrDateS: Aliton.DateConvertToJs('<?php echo $model->ContrDateS; ?>'),
            WorkText: '<?php echo $model->WorkText; ?>',
            PaymentType: '<?php echo $model->PaymentType_id; ?>',
            Price: '<?php echo $model->Price; ?>',
            discount: '<?php echo $model->discount; ?>',
            SpecialCondition: <?php echo json_encode($model->SpecialCondition); ?>,
            ContactInfo: '<?php echo $model->Info; ?>',
            Note: <?php echo json_encode($model->Note); ?>,
            DialogId: <?php echo json_encode($DialogId); ?>,
            BodyDialogId: <?php echo json_encode($BodyDialogId); ?>,
        };

        if (Document.DialogId == '' || Document.DialogId == null) {
            Document.DialogId = 'NewContractDialog';
            Document.BodyDialogId = 'NewContractBodyDialog';
        }
            
        var DataJuridical = new $.jqx.dataAdapter(Sources.SourceJuridicalsMin);
        var DataPaymentTypes = new $.jqx.dataAdapter(Sources.SourcePaymentTypes);
        var DataContactInfo = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContactInfo, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["ci.ObjectGr_id = " + Document.ObjectGr_id],
                });
                return data;
            },
        });

        $("#ContrNumS6").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130, value: "-Авто-" }));
        $("#ContrDateS6").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 102}));
        $("#JuridicalPerson6").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataJuridical, displayMember: "JuridicalPerson", valueMember: "Jrdc_Id", width: 200, autoDropDownHeight: true }));
        
        $("#WorkText6").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#PaymentType6").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataPaymentTypes, displayMember: "PaymentTypeName", valueMember: "PaymentType_Id", width: 130, autoDropDownHeight: true }));
        
        $("#Price6").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#discount6").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#SpecialCondition6").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 770 }));
        $("#ContactInfo6").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataContactInfo, displayMember: "FIO", valueMember: "Info_id", width:360, autoDropDownHeight: true }));
        
        $("#Note6").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 770 }));
        $("#NewContractBtnOk").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#NewContractBtnCancel").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $("#NewContractBtnCancel").on('click', function () {
            $('#' + Document.DialogId).jqxWindow('close');
        });
        
        
        $("#NewContractBtnOk").on('click', function () {
            var Url = <?php echo json_encode(Yii::app()->createUrl('Documents/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('Documents/Insert')); ?>;
            var Data = $('#Documents').serialize();
            Data = Data + "&DocType_Name=" + "Счет" + "&DialogId=" + Document.DialogId + "&BodyDialogId=" + Document.BodyDialogId;
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    if (Res == '1' || Res == 1) {
                        $('#' + Document.DialogId).jqxWindow('close');
                        if (Document.DialogId == 'NewContractDialog') {
                            if (StateInsert) {
                                $("#ContractsGrid").jqxGrid('updatebounddata');
                                $("#ContractsGrid").jqxGrid('selectrow', 0);
                            } else {
                                location.reload();
                            }
                        }
                        if (Document.DialogId == 'CostCalculationsDialog')
                            $('#RefreshCostCalcDocuments').click();
                        
                    } else {
                        $('#' + Document.BodyDialogId).html(Res);
                    }
                }
            });
        });
        
        if (Document.ContrNumS != '') $("#ContrNumS6").jqxInput('val', Document.ContrNumS);
        if (Document.JuridicalPerson != '') $("#JuridicalPerson6").jqxComboBox('val', Document.JuridicalPerson);
        if (Document.ContrDateS !== null) $("#ContrDateS6").jqxDateTimeInput('val', Document.ContrDateS);
        if (Document.WorkText != '') $("#WorkText6").jqxInput('val', Document.WorkText);
        if (Document.PaymentType != '') $("#PaymentType6").jqxComboBox('val', Document.PaymentType);
        if (Document.Price != '') $("#Price6").jqxNumberInput('val', Document.Price);
        if (Document.discount != '') $("#discount6").jqxNumberInput('val', Document.discount);
        if (Document.SpecialCondition != '') $("#SpecialCondition6").jqxTextArea('val', Document.SpecialCondition);
        if (Document.ContactInfo != '') $("#ContactInfo6").jqxComboBox('val', Document.ContactInfo);
        if (Document.Note != '') $("#Note6").jqxTextArea('val', Document.Note);
        
       
    });
    
        
</script>

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'Documents',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<input type="hidden" name="Documents[ContrS_id]" value="<?php echo $model->ContrS_id; ?>">
<input type="hidden" name="Documents[ObjectGr_id]" value="<?php echo $model->ObjectGr_id; ?>">
<input type="hidden" name="Documents[DocType_id]" value="<?php echo $model->DocType_id; ?>">

<div class="row">
    <div class="row-column">Номер: <input id="ContrNumS6" name="Documents[ContrNumS]" type="text"></div>
    <div class="row-column" style="padding-top: 3px;">Дата: </div><div class="row-column"><div id="ContrDateS6"  name="Documents[ContrDateS]" type="text"></div></div>
</div>

<div class="row">
    <div class="row-column">Наименование вида работ: <input id="WorkText6" name="Documents[WorkText]" type="text"></div>
    <div class="row-column">Вид оплаты: </div><div class="row-column"><div id="PaymentType6" name="Documents[PaymentType_id]" type="text"></div></div>
</div>

<div class="row">
    <div class="row-column">Юр. лицо: </div><div class="row-column"><div id="JuridicalPerson6" name="Documents[Jrdc_id]" type="text"></div></div>
    <div class="row-column">Контактное лицо: </div><div class="row-column"><div id="ContactInfo6" name="Documents[Info]" type="text"></div></div>
</div>

<div class="row">
    <div class="row-column">Особые договоренности: <textarea id="SpecialCondition6" name="Documents[SpecialCondition]"></textarea></div>
</div>

<div class="row">
    <div class="row-column">Сумма: </div><div class="row-column"><div id="Price6" name="Documents[Price]" type="text"></div></div>
    <div class="row-column">Скидка: </div><div class="row-column"><div id="discount6" name="Documents[discount]" type="text"></div></div>
</div>

<div class="row">
    <div class="row-column">Примечание: <textarea id="Note6" name="Documents[Note]"></textarea></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='NewContractBtnOk' /></div>
    <div style="float: right; margin-right: 20px;" class="row-column"><input type="button" value="Отменить" id='NewContractBtnCancel' /></div>
</div>

<?php $this->endWidget(); ?>