<script type="text/javascript">
    $(document).ready(function () {
        
        var CurrentContract = {
            ContrS_id: <?php echo json_encode($model->ContrS_id); ?>,
            ContrNumS: <?php echo json_encode($model->ContrNumS); ?>,
            ObjectGr_id: <?php echo json_encode($model->ObjectGr_id); ?>,
            JuridicalPerson: <?php echo json_encode($model->JuridicalPerson); ?>,
            Jrdc_id: <?php echo json_encode($model->Jrdc_id); ?>,
            PropForm_id: <?php echo json_encode($model->PropForm_id); ?>,
            ContrDateS: Aliton.DateConvertToJs(<?php echo json_encode($model->ContrDateS); ?>),
            date_doc: Aliton.DateConvertToJs(<?php echo json_encode($model->date_doc); ?>),
            crtp_name: <?php echo json_encode($model->crtp_name); ?>,
            Annex: <?php echo json_encode($model->Annex); ?>,
            Debtor: <?php echo json_encode($model->Debtor); ?>,
            DocNumber: <?php echo json_encode($model->DocNumber); ?>,
            DocDate: Aliton.DateConvertToJs(<?php echo json_encode($model->DocDate); ?>),
            PaymentTypeName: <?php echo json_encode($model->PaymentTypeName); ?>,
            Price: <?php echo json_encode($model->Price); ?>,
            CalcSum: <?php echo json_encode($model->CalcSum); ?>,
            PrePayment: <?php echo json_encode($model->PrePayment); ?>,
            summa: <?php echo json_encode($model->summa); ?>,
            empl_name: <?php echo json_encode($model->empl_name); ?>,
            dmnd_id: <?php echo json_encode($model->dmnd_id); ?>,
            DateExec: Aliton.DateConvertToJs(<?php echo json_encode($model->DateExec); ?>),
            date_act: Aliton.DateConvertToJs(<?php echo json_encode($model->date_act); ?>),
            SpecialCondition: <?php echo json_encode($model->SpecialCondition); ?>,
            FIO: <?php echo json_encode($model->FIO); ?>,
            ExecDay: <?php echo json_encode($model->ExecDay); ?>,
            Garant: <?php echo json_encode($model->Garant); ?>,
            Note: <?php echo json_encode($model->Note); ?>,
            date_checkup: Aliton.DateConvertToJs(<?php echo json_encode($model->date_checkup); ?>),
            user_checkup: <?php echo json_encode($model->user_checkup); ?>,
            EmplChange: <?php echo json_encode($model->EmplChange); ?>,
        };
            
        
        $("#ContrNumS7").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 100 }));
        $("#JuridicalPerson").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 200 }));
        $("#ContrDateS").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.ContrDateS, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 83}));
        $("#date_doc").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.date_doc, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 83}));
        $("#crtp_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 120 }));
        $("#Annex").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { disabled: true }));
        $("#Debtor").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { disabled: true }));
        $("#DocNumber").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 90 }));
        $("#DocDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.DocDate, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 83}));
        $("#PaymentTypeName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 60 }));
        $("#Price").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 90, readOnly: true, symbol: "р.", symbolPosition: 'right', min: 0, decimalDigits: 2 }));
        $("#CalcSum").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 90, readOnly: true, symbol: "р.", symbolPosition: 'right', min: 0, decimalDigits: 2 }));
        $("#PrePayment").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 90, readOnly: true, symbol: "р.", symbolPosition: 'right', min: 0, decimalDigits: 2 }));
        $("#summa").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 90, readOnly: true, symbol: "р.", symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#empl_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 120 }));
        $("#dmnd_id").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 112 }));
        $("#DateExec").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.DateExec, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 83}));
        $("#date_act").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.date_act, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 83}));
        $("#SpecialCondition1").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 420, height: 57 }));
        $("#FIO").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 360 }));
        $("#ExecDay").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 65, readOnly: true, symbol: "", symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
        $("#Garant").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 65, readOnly: true, symbol: "", symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
        $("#Note").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 'calc(100% - 2px)', height: 45 }));
        $("#date_checkup").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.date_checkup, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 83}));
        $("#user_checkup").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 180 }));
        $("#btnDemandView").jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 60}));
        $("#btnDemandView").on('click', function() {
            if (CurrentContract.dmnd_id != null)
                Aliton.ViewDemand(CurrentContract.dmnd_id, true);
        });
        
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

        $("#EditContract").jqxButton($.extend(true, {}, ButtonDefaultSettings, { imgSrc: '/images/4.png' }));
        $("#PrintContract").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#CheckupContract").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#CheckupContract').jqxButton({disabled: (CurrentContract.user_checkup != null)});
        
        $('#PrintContract').on('click', function() {
            window.open(<?php echo json_encode(Yii::app()->createUrl('Reports/ReportOpen', array(
                'ReportName' => '/Договора/Счет',
                'Ajax' => false,
                'Render' => true,
            ))); ?> + '&Parameters[ContrS_id]=' + CurrentContract.ContrS_id);
        });
        
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
        
        $('#NewContractDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: 570, width: 870}));
        
        $("#EditContract").on('click', function () {
            $('#NewContractDialog').jqxWindow({resizable: true, height: 600, width: 870});
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('Documents/Update');?>",
                type: 'POST',
                async: false,
                data: { 
                    ContrS_id: CurrentContract.ContrS_id,
                    ObjectGr_id: CurrentContract.ObjectGr_id 
                },
                success: function(Res) {
                    $('#NewContractBodyDialog').html(Res);
                }
            });
            $('#NewContractDialog').jqxWindow('open');
        });
        
        var loadPage = function (url, index) {
            $.get(url, function (data) {
                if (index == 0)
                    $('#contentContractDetails').html(data);
                if (index == 1)
                    $('#contentContractEquips').html(data);
            });
        };
        
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    loadPage('<?php echo Yii::app()->createUrl('ContractsDetails_v/index', array('ContrS_id' => $model->ContrS_id)) ?>', 0);
                    break;
            }
        };
        $('#jqxTabsCurrentContract').jqxTabs({ width: 'calc(100% - 2px)', height: 'calc(100% - 2px)', initTabContent: initWidgets });
        
    });
    
        
</script>

<div class="al-row">
    <div class="al-row-column">Номер: <input readonly id="ContrNumS7" type="text"></div>
    <div class="al-row-column" style="padding: 3px 0 0 5px;">Дата: </div><div class="al-row-column"><div id="ContrDateS" type="text"></div></div>
    <div class="al-row-column" style="padding: 3px 5px 0 5px;">Дата вып. работ по акту: </div><div class="row-column"><div id="date_doc" type="text"></div></div>
    <div class="al-row-column" style="padding-top: 3px;">Долг: </div><div class="al-row-column"><div id="Debtor" type="checkbox"></div></div>
    <div class="al-row-column" style="padding-top: 3px;">Приложение: </div><div class="al-row-column"><div id="Annex" type="checkbox"></div></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column">Юр. лицо:</div><div class="al-row-column"><input readonly id="JuridicalPerson" type="text"></div>
    <div class="al-row-column">Тип контракта:</div><div class="al-row-column"><input readonly id="crtp_name" type="text"></div>
    <div class="al-row-column">Договор №:</div><div class="al-row-column"><input readonly id="DocNumber" type="text"></div>
    <div class="al-row-column">Дата: </div><div class="al-row-column"><div id="DocDate"></div></div>
    <div class="al-row-column">Оплата:</div><div class="al-row-column"><input readonly id="PaymentTypeName" type="text"></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column">Сумма нач.:</div>
    <div class="al-row-column"><div id="Price" type="text"></div></div>
    <div class="al-row-column">Предв. сумма:</div>
    <div class="al-row-column"><div id="CalcSum" type="text"></div></div>
    <div class="al-row-column">Аванс:</div>
    <div class="al-row-column"><div id="PrePayment" type="text"></div></div>
    <div class="al-row-column">Оплата:</div>
    <div class="al-row-column"><div id="summa" type="text"></div></div>
    <div class="al-row-column">Менеджер:</div><div class="al-row-column"><input readonly id="empl_name" type="text"></div>
    <div style="clear: both"></div>
</div>
<div class="al-data" style="padding: 7px; margin: 5px 0;">
    <div class="al-row" style="padding-bottom: 2px;">
        <div class="al-row-column" style="font-weight: 500;">Выполненные работы</div>
        <div class="al-row-column" style="margin-right: 3px;">Заявка: <input readonly id="dmnd_id" type="text"></div>
        <div class="al-row-column" style="padding-right: 3px;">Дата вып. работ: </div><div class="row-column"><div id="DateExec"></div></div>
        <div class="al-row-column" style="padding-right: 3px;">Дата прихода ориг. акта: </div><div class="row-column"><div id="date_act"></div></div>
        <div class="al-row-column"><input type="button" value="Заявка" id='btnDemandView' /></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row" style="padding: 0;">
        <div class="al-row-column" >
            <div>Перечень работ:</div>
            <div><textarea readonly id="SpecialCondition1" ></textarea></div>
        </div>
        <div class="al-row-column">
            <div>Контактное лицо:</div>
            <div><input readonly id="FIO" type="text"></div>
            <div style="padding-top: 5px;">
                <div class="al-row-column">Срок:</div>
                <div class="al-row-column"><div id="ExecDay" type="text"></div></div>
                <div class="al-row-column">Гарантия:</div>
                <div class="al-row-column"><div id="Garant" type="text"></div></div>       
                <div style="clear: both"></div>
            </div>
        </div>
    </div>
    <div style="clear: both"></div>
</div>

<div class="al-row">
    <div class="al-row-column">Примечание:</div>
    <div class="al-row-column" style="width: calc(100% - 92px)"><textarea readonly id="Note" ></textarea></div>
    <div style="clear: both"></div>
</div>

<div class="al-row">
    <div class="al-row-column"><input type="button" value="Изменить" id='EditContract' /></div>
    <div class="al-row-column" style="padding: 3px 3px 0 0;">Дата утв-я: </div><div class="row-column"><div id="date_checkup"></div></div>
    <div class="al-row-column">Утвердил: <input readonly id="user_checkup" type="text"></div>
    <div class="al-row-column"><input type="button" value="Утвердить" id='CheckupContract' /></div>
    <div class="al-row-column" style="float: right"><input type="button" value="Печатать" id='PrintContract' /></div>
    <div style="clear: both"></div>
</div>

<div class="al-row" style="height: calc(100% - 362px); ">
    <div id='jqxTabsCurrentContract'>
        <ul style="margin-left: 20px">
            <li>
                <div style="height: 15px; margin-top: 3px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                        Спецификация
                    </div>
                </div>
            </li>
        </ul>
        <div id='contentContractDetails' style="overflow: hidden; padding: 0px 10px 0px 10px; height: 100%">
                
        </div>
    </div>
</div>

<div id="NewContractDialog" style="display: none">
    <div id="NewContractDialogHeader">
        <span id="NewContractHeaderText">Редактирование счета № <?php echo $model->ContrS_id; ?></span>
    </div>
    <div style="overflow: hidden; padding: 10px; background-color: #F2F2F2;" id="NewContractDialogContent">
        <div style="overflow: hidden;" id="NewContractBodyDialog"></div>
    </div>
</div>

