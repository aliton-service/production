<script type="text/javascript">
    $(document).ready(function () {
        
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var CurrentContract = {
            ContrS_id: '<?php echo $model->ContrS_id; ?>',
            ContrNumS: '<?php echo $model->ContrNumS; ?>',
            ObjectGr_id: '<?php echo $model->ObjectGr_id; ?>',
            JuridicalPerson: '<?php echo $model->JuridicalPerson; ?>',
            ContrDateS: Aliton.DateConvertToJs('<?php echo $model->ContrDateS; ?>'),
            date_doc: Aliton.DateConvertToJs('<?php echo $model->date_doc; ?>'),
            crtp_name: '<?php echo $model->crtp_name; ?>',
            Annex: <?php echo json_encode($model->Annex); ?>,
            Debtor: <?php echo json_encode($model->Debtor); ?>,
            DocNumber: '<?php echo $model->DocNumber; ?>',
            DocDate: Aliton.DateConvertToJs('<?php echo $model->DocDate; ?>'),
            PaymentTypeName: '<?php echo $model->PaymentTypeName; ?>',
            Price: '<?php echo $model->Price; ?>',
            CalcSum: '<?php echo $model->CalcSum; ?>',
            PrePayment: '<?php echo $model->PrePayment; ?>',
            summa: '<?php echo $model->summa; ?>',
            empl_name: '<?php echo $model->empl_name; ?>',
            dmnd_id: '<?php echo $model->dmnd_id; ?>',
            DateExec: Aliton.DateConvertToJs('<?php echo $model->ContrDateS; ?>'),
            date_act: Aliton.DateConvertToJs('<?php echo $model->date_act; ?>'),
            SpecialCondition: <?php echo json_encode($model->SpecialCondition); ?>,
            FIO: '<?php echo $model->FIO; ?>',
            ExecDay: '<?php echo $model->ExecDay; ?>',
            Garant: '<?php echo $model->Garant; ?>',
            Note: <?php echo json_encode($model->Note); ?>,
            date_checkup: Aliton.DateConvertToJs('<?php echo $model->date_checkup; ?>'),
            user_checkup: '<?php echo $model->user_checkup; ?>',
            EmplChange: '<?php echo $model->EmplChange; ?>',
        };
            
        
        $("#ContrNumS7").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#JuridicalPerson").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 260 }));
        $("#ContrDateS").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.ContrDateS, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 83}));
        $("#date_doc").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.date_doc, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 83}));
        $("#crtp_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#Annex").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {}));
        $("#Debtor").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {}));
        $("#DocNumber").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#DocDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.DocDate, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 83}));
        $("#PaymentTypeName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#Price").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, readOnly: true, symbol: "р.", symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#CalcSum").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, readOnly: true, symbol: "р.", symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#PrePayment").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, readOnly: true, symbol: "р.", symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#summa").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, readOnly: true, symbol: "р.", symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#empl_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 270 }));
        $("#dmnd_id").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 112 }));
        $("#DateExec").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.DateExec, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 83}));
        $("#date_act").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.date_act, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 83}));
        $("#SpecialCondition1").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 420 }));
        $("#FIO").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 360 }));
        $("#ExecDay").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 65, readOnly: true, symbol: "", symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
        $("#Garant").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 65, readOnly: true, symbol: "", symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
        $("#Note").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 830 }));
        $("#date_checkup").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.date_checkup, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 83}));
        $("#user_checkup").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 180 }));
        
        
        if (CurrentContract.ContrNumS != '') $("#ContrNumS7").jqxInput('val', CurrentContract.ContrNumS);
        if (CurrentContract.JuridicalPerson != '') $("#JuridicalPerson").jqxInput('val', CurrentContract.JuridicalPerson);
        if (CurrentContract.crtp_name != '') $("#crtp_name").jqxInput('val', CurrentContract.crtp_name);
        if (CurrentContract.Annex != '') $("#Annex").jqxCheckBox({checked: Boolean(Number(CurrentContract.Annex))});
        if (CurrentContract.Debtor != '') $("#Debtor").jqxCheckBox({checked: Boolean(Number(CurrentContract.Debtor))});
        if (CurrentContract.DocNumber != '') $("#DocNumber").jqxInput('val', CurrentContract.DocNumber);
        if (CurrentContract.PaymentTypeName != '') $("#PaymentTypeName").jqxInput('val', CurrentContract.PaymentTypeName);
        if (CurrentContract.Price != '') $("#Price").jqxNumberInput('val', CurrentContract.Price);
        if (CurrentContract.CalcSum != '') $("#CalcSum").jqxNumberInput('val', CurrentContract.CalcSum);
        if (CurrentContract.PrePayment != '') $("#PrePayment").jqxNumberInput('val', CurrentContract.PrePayment);
        if (CurrentContract.summa != '') $("#summa").jqxNumberInput('val', CurrentContract.summa);
        if (CurrentContract.empl_name != '') $("#empl_name").jqxInput('val', CurrentContract.empl_name);
        if (CurrentContract.dmnd_id != '') $("#dmnd_id").jqxInput('val', CurrentContract.dmnd_id);
        if (CurrentContract.SpecialCondition != '') $("#SpecialCondition1").jqxTextArea('val', CurrentContract.SpecialCondition);
        if (CurrentContract.FIO != '') $("#FIO").jqxInput('val', CurrentContract.FIO);
        if (CurrentContract.ExecDay != '') $("#ExecDay").jqxNumberInput('val', CurrentContract.ExecDay);
        if (CurrentContract.Garant != '') $("#Garant").jqxNumberInput('val', CurrentContract.Garant);
        if (CurrentContract.Note != '') $("#Note").jqxTextArea('val', CurrentContract.Note);
        if (CurrentContract.user_checkup != '') $("#user_checkup").jqxInput('val', CurrentContract.user_checkup);

        $("#EditContract").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#PrintContract").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#CheckupContract").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#CheckupContract').jqxButton({disabled: (CurrentContract.user_checkup != '')});
        
        $("#CheckupContract").on('click', function () {
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('Documents/Checkup');?>",
                type: 'POST',
                async: false,
                data: { ContrS_id: CurrentContract.ContrS_id },
                success: function(Res) {
                    if (Res == '1') {
                        location.reload();
                    }
                }
            });
        });
        
        $('#EditContractDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '620px', width: '870'}));
        
        $('#EditContractDialog').jqxWindow({initContent: function() {
            $("#ContractBtnOk").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#ContractBtnCancel").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        }});
        
        $("#ContractBtnCancel").on('click', function () {
            $('#EditContractDialog').jqxWindow('close');
        });
        
        
        var SendFormContract = function(Form) {
            var Data;
            if (Form == undefined)
                Data = $('#Documents').serialize();
            else Data = Form;
                
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('Documents/Update');?>",
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    if (Res == '1' || Res == 1) {
                        $('#EditContractDialog').jqxWindow('close');
                        location.reload();
                    } else {
                        $('#ContractBodyDialog').html(Res);
                    }
                }
            });
        }

        $("#ContractBtnOk").on('click', function () {
            SendFormContract();
        });
        
    
        $("#EditContract").on('click', function ()
        {
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('Documents/Update');?>",
                type: 'POST',
                async: false,
                data: { 
                    ContrS_id: CurrentContract.ContrS_id,
                    ObjectGr_id: CurrentContract.ObjectGr_id 
                },
                success: function(Res) {
                    $('#ContractBodyDialog').html(Res);
                }
            });
            $('#EditContractDialog').jqxWindow('open');
        });
        
        
        $.get('<?php echo Yii::app()->createUrl('ContractsDetails_v/index', array('ContrS_id' => $model->ContrS_id)) ?>', function (data) {
                $('#contentContractDetails2').html(data);
        });
        
        
    });
    
        
</script>

<div style="background-color: #F2F2F2;">
    <div class="row">
        <div class="row-column">Номер: <input readonly id="ContrNumS7" type="text"></div>
        <div class="row-column" style="padding-top: 3px;">Дата: </div><div class="row-column"><div id="ContrDateS" type="text"></div></div>
        <div class="row-column" style="padding-top: 3px;">Дата выполнения работ по акту: </div><div class="row-column"><div id="date_doc" type="text"></div></div>
        <div class="row-column" style="padding-top: 3px;">Долг: </div><div class="row-column"><div id="Debtor" type="checkbox"></div></div>
    </div>

    <div class="row">
        <div class="row-column">Юр. лицо: <input readonly id="JuridicalPerson" type="text"></div>
        <div class="row-column">Тип контракта: <input readonly id="crtp_name" type="text"></div>
        <div class="row-column" style="padding-top: 3px;">Приложение: </div><div class="row-column"><div id="Annex" type="checkbox"></div></div>
    </div>
    
    <div class="row">
        <div class="row-column">Номер договора: <input readonly id="DocNumber" type="text"></div>
        <div class="row-column" style="padding-top: 3px;">Дата договора: </div><div class="row-column"><div id="DocDate"></div></div>
        <div class="row-column">Вид оплаты: <input readonly id="PaymentTypeName" type="text"></div>
    </div>
    
    <div class="row">
        <div class="row-column">Сумма начисления: </div><div class="row-column"><div id="Price" type="text"></div></div>
        <div class="row-column">Предварительная сумма: </div><div class="row-column"><div id="CalcSum" type="text"></div></div>
        <div class="row-column">Аванс: </div><div class="row-column"><div id="PrePayment" type="text"></div></div>
    </div>
    
    <div class="row">
        <div class="row-column">Оплачено: </div><div class="row-column"><div id="summa" type="text"></div></div>
        <div class="row-column">Менеджер: <input readonly id="empl_name" type="text"></div>
    </div>
    
    <div class="row" style="padding: 0 10px 10px 10px; width: 815px; border: 1px solid #ddd; background-color: #eee;">
        <div style="overflow: hidden;">
            <div class="row-column" style="margin: 0 0 10px 0; width: 100%; font-weight: 500;">Выполненные работы</div>
            <div class="row-column">Заявка: <input readonly id="dmnd_id" type="text"></div>
            <div class="row-column" style="padding-top: 3px;">Дата выполнения работ: </div><div class="row-column"><div id="DateExec"></div></div>
            <div class="row-column" style="padding-top: 3px;">Дата прихода оригинала акта: </div><div class="row-column"><div id="date_act"></div></div>
            <div class="row-column" style="padding-top: 10px;">Перечень работ: <textarea readonly id="SpecialCondition1" ></textarea></div>
       
            <div class="row-column" style="padding-top: 10px;">Контактное лицо: <br><input readonly id="FIO" type="text"></div>
            
            <div class="row-column" style="padding-top: 18px; ">
                <div class="row-column">Срок: </div><div class="row-column"><div id="ExecDay" type="text"></div></div>
                <div class="row-column">Гарантия: </div><div class="row-column"><div id="Garant" type="text"></div></div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="row-column">Примечание: <textarea readonly id="Note" ></textarea></div>
    </div>

    <div class="row">
        <div class="row-column"><input type="button" value="Изменить" id='EditContract' /></div>
        <div class="row-column" style="padding-top: 3px;">Дата утв-я: </div><div class="row-column"><div id="date_checkup"></div></div>
        <div class="row-column">Утвердил: <input readonly id="user_checkup" type="text"></div>
        <div class="row-column"><input type="button" value="Утвердить" id='CheckupContract' /></div>
        <div class="row-column"><input type="button" value="Печатать" id='PrintContract' /></div>
    </div>

    <div class="row" style="padding: 0 10px 10px 10px; border: 1px solid #ddd; background-color: #eee;">
        <div class="row-column" style="margin: 0 0 10px 0; width: 100%; font-weight: 500;">Спецификация</div>
        <div id='contentContractDetails2' style="overflow: hidden; margin-left: 10px; width: 100%; height: 100%"></div>
    </div>
</div>


<div id="EditContractDialog">
    <div id="ContractDialogHeader">
        <span id="ContractHeaderText">Редактирование счета № <?php echo $model->ContrS_id; ?></span>
    </div>
    <div style="overflow: hidden; padding: 10px; background-color: #F2F2F2;" id="ContractDialogContent">
        <div style="overflow: hidden;" id="ContractBodyDialog"></div>
        <div id="ContractBottomDialog">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='ContractBtnOk' /></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='ContractBtnCancel' /></div>
            </div>
        </div>
    </div>
</div>

