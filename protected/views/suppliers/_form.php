<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var Suppliers = {
            Supplier_id: <?php echo json_encode($model->Supplier_id); ?>,
            SuppliersName: <?php echo json_encode($model->NameSupplier); ?>,
            Address: <?php echo json_encode($model->Adress); ?>,
            Tel: <?php echo json_encode($model->Tel); ?>,
            ContactFace: <?php echo json_encode($model->ContactFace); ?>,
            DateLastContact: Aliton.DateConvertToJs(<?php echo json_encode($model->DateLastContact); ?>),
            DateLastPurchase: Aliton.DateConvertToJs(<?php echo json_encode($model->DateLastPurchase); ?>),
            Supplier: Boolean(Number(<?php echo json_encode($model->Supplier); ?>)),
            Contract: Boolean(Number(<?php echo json_encode($model->isContract); ?>)),
            Producer: Boolean(Number(<?php echo json_encode($model->Producer); ?>)),
            Repair: Boolean(Number(<?php echo json_encode($model->Repair); ?>)),
            FullName: <?php echo json_encode($model->FullName); ?>,
            Note: <?php echo json_encode($model->Note); ?>,
            Inn: <?php echo json_encode($model->inn); ?>,
            Kpp: <?php echo json_encode($model->kpp); ?>,
            Account: <?php echo json_encode($model->account); ?>,
            bank_id: <?php echo json_encode($model->bank_id); ?>,
        };
        
        $('#Suppliers').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        var BanksDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceBanks, {async: true}));
        
        $("#edSuppliersNameEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Наименование", width: 400} ));
        $("#edSuppliersAdressEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Адрес", width: 400} ));
        $("#edSuppliersTelEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Телефон", width: 400} ));
        $("#edSuppliersContactFaceEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Телефон", width: 400} ));
        $("#edDateLastContactEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, value: Suppliers.DateLastContact}));
        $("#edDateLastPurchaseEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, value: Suppliers.DateLastPurchase}));
        $("#chbSupplierEdit").jqxCheckBox($.extend(true, CheckBoxDefaultSettings, {width: 100, checked: Suppliers.Supplier}));
        $("#chbContractEdit").jqxCheckBox($.extend(true, CheckBoxDefaultSettings, {width: 100, checked: Suppliers.Contract}));
        $("#chbProducerEdit").jqxCheckBox($.extend(true, CheckBoxDefaultSettings, {width: 150, checked: Suppliers.Producer}));
        $("#chbRepairEdit").jqxCheckBox($.extend(true, CheckBoxDefaultSettings, {width: 100, checked: Suppliers.Repair}));
        $("#edSuppliersFullNameEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 400} ));
        $("#edSuppliersNoteEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 400} ));
        $("#edSuppliersInnEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 150} ));
        $("#edSuppliersKppEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 150} ));
        $("#edSuppliersAccountEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 400} ));
        
        
        $("#edBankEdit").on('bindingComplete', function() {
            if (Suppliers.bank_id != '') $("#edBankEdit").jqxComboBox('val', Suppliers.bank_id);
        });
        $("#edBankEdit").jqxComboBox({ source: BanksDataAdapter, width: '300px', height: '25px', displayMember: "bank_name", valueMember: "Bank_id"});
        
        $('#btnSaveSuppliers').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelSuppliers').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnSupplierFindBank').on('click', function(){
            $('#FindBanksDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {width: 800, height: 520, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Banks/Find')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyFindBanksDialog").html(Res.html);
                    $('#FindBanksDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnSupplierFindBank').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelSuppliers').on('click', function(){
            $('#SuppliersDialog').jqxWindow('close');
        });
        
        $('#btnSaveSuppliers').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('Suppliers/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('Suppliers/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#Suppliers').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        CurrentRowSupplierData.Supplier_id = Res.id;
                        Aliton.SelectRowById('Supplier_id', Res.id, '#SuppliersGrid', true);
                        $('#SuppliersDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodySuppliersDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (Suppliers.SuppliersName != '') $("#edSuppliersNameEdit").jqxInput('val', Suppliers.SuppliersName);
        if (Suppliers.Address != '') $("#edSuppliersAdressEdit").jqxInput('val', Suppliers.Address);
        if (Suppliers.Tel != '') $("#edSuppliersTelEdit").jqxInput('val', Suppliers.Tel);
        if (Suppliers.ContactFace != '') $("#edSuppliersContactFaceEdit").jqxInput('val', Suppliers.ContactFace);
        if (Suppliers.FullName != '') $("#edSuppliersFullNameEdit").jqxInput('val', Suppliers.FullName);
        if (Suppliers.Note != '') $("#edSuppliersNoteEdit").jqxInput('val', Suppliers.Note);
        if (Suppliers.Inn != '') $("#edSuppliersInnEdit").jqxInput('val', Suppliers.Inn);
        if (Suppliers.Kpp != '') $("#edSuppliersKppEdit").jqxInput('val', Suppliers.Kpp);
        if (Suppliers.Account != '') $("#edSuppliersAccountEdit").jqxInput('val', Suppliers.Account);
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Suppliers',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="Suppliers[Supplier_id]" value="<?php echo $model->Supplier_id; ?>"/>
<div class="row">
    <div class="row-column" style="width: 150px">Наименование:</div>
    <div class="row-column"><input type="text" name="Suppliers[NameSupplier]" autocomplete="off" id="edSuppliersNameEdit"/><?php echo $form->error($model, 'NameSupplier'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="row">
    <div class="row-column" style="width: 150px">Адрес:</div>
    <div class="row-column"><input type="text" name="Suppliers[Adress]" autocomplete="off" id="edSuppliersAdressEdit"/><?php echo $form->error($model, 'Adress'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="row">
    <div class="row-column" style="width: 150px">Телефон:</div>
    <div class="row-column"><input type="text" name="Suppliers[Tel]" autocomplete="off" id="edSuppliersTelEdit"/><?php echo $form->error($model, 'Tel'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="row">
    <div class="row-column" style="width: 150px">Контактное лицо:</div>
    <div class="row-column"><input type="text" name="Suppliers[ContactFace]" autocomplete="off" id="edSuppliersContactFaceEdit"/><?php echo $form->error($model, 'ContactFace'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="row">
    <div class="al-row-column" style="width: 150px; height: 1px;"></div>
    <div class="al-row-column">
        <div class="al-row-column">
            <div class="al-row">Дата посл. контакта</div>
            <div class="al-row"><div id="edDateLastContactEdit" name="Suppliers[DateLastContact]"></div></div>
        </div>
        <div class="al-row-column">
            <div class="al-row">Дата посл. закупки</div>
            <div class="al-row"><div id="edDateLastPurchaseEdit" name="Suppliers[DateLastPurchase]"></div></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="row-column"><div id="chbSupplierEdit" name="Suppliers[Supplier]">Поставщик</div><?php echo $form->error($model, 'Supplier'); ?></div>
    <div class="row-column"><div id="chbContractEdit" name="Suppliers[isContract]">Договор</div></div>
    <div class="row-column"><div id="chbProducerEdit" name="Suppliers[Producer]">Производитель</div></div>
    <div class="row-column"><div id="chbRepairEdit" name="Suppliers[Repair]">СРМ</div></div>
</div>
<div class="row">
    <div class="row-column" style="width: 150px">Полное наименование:</div>
    <div class="row-column"><input type="text" name="Suppliers[FullName]" autocomplete="off" id="edSuppliersFullNameEdit"/><?php echo $form->error($model, 'FullName'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="row" style="padding: 0px;">
    <div class="row-column" style="width: 150px">Примечание:</div>
    <div class="row-column"><input type="text" name="Suppliers[Note]" autocomplete="off" id="edSuppliersNoteEdit"/><?php echo $form->error($model, 'Note'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="row">
    <div class="row-column" style="width: 150px">ИНН:</div>
    <div class="row-column"><input type="text" name="Suppliers[inn]" autocomplete="off" id="edSuppliersInnEdit"/><?php echo $form->error($model, 'inn'); ?></div>
    <div class="row-column">КПП:</div>
    <div class="row-column"><input type="text" name="Suppliers[kpp]" autocomplete="off" id="edSuppliersKppEdit"/><?php echo $form->error($model, 'kpp'); ?></div>
</div>
<div class="row">
    <div class="row-column" style="width: 150px">Р/Счет:</div>
    <div class="row-column"><input type="text" name="Suppliers[account]" autocomplete="off" id="edSuppliersAccountEdit"/><?php echo $form->error($model, 'account'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="row-column" style="width: 150px;">Банк:</div>
    <div class="row-column"><div name="Suppliers[bank_id]" id="edBankEdit"></div><?php echo $form->error($model, 'bank_id'); ?></div>
    <div class="row-column"><input id="btnSupplierFindBank" type="button" value="Поиск"/></div>
    <div style="clear: both"></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveSuppliers'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelSuppliers'/></div>
</div>
<?php $this->endWidget(); ?>

<div id="FindBanksDialog" style="display: none;">
    <div id="FindBanksDialogHeader">
        <span id="FindBanksHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogFindBanksContent">
        <div style="" id="BodyFindBanksDialog"></div>
    </div>
</div>



