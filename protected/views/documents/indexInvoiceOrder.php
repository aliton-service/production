<script type="text/javascript">
    $(document).ready(function () {
        
        var CurrentContract = {
            ContrS_id: <?php echo json_encode($model->ContrS_id); ?>,
            ContrNumS: <?php echo json_encode($model->ContrNumS); ?>,
            WorkText: <?php echo json_encode($model->WorkText); ?>,
            ObjectGr_id: <?php echo json_encode($model->ObjectGr_id); ?>,
            JuridicalPerson: <?php echo json_encode($model->JuridicalPerson); ?>,
            ContrDateS: Aliton.DateConvertToJs(<?php echo json_encode($model->ContrDateS); ?>),
            PaymentTypeName: <?php echo json_encode($model->PaymentTypeName); ?>,
            Price: <?php echo json_encode($model->Price); ?>,
            discount: <?php echo json_encode($model->discount); ?>,
            SpecialCondition: <?php echo json_encode($model->SpecialCondition); ?>,
            FIO: <?php echo json_encode($model->FIO); ?>,
            Note: <?php echo json_encode($model->Note); ?>,
            date_checkup: Aliton.DateConvertToJs(<?php echo json_encode($model->date_checkup); ?>),
            user_checkup: <?php echo json_encode($model->user_checkup); ?>,
            EmplChange: <?php echo json_encode($model->EmplChange); ?>,
        };
        
        $("#ContrNumS").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#WorkText").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 335 }));
        $("#JuridicalPerson").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 150 }));
        $("#ContrDateS").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.ContrDateS, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 83}));
        $("#PaymentTypeName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#Price").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, readOnly: true, symbol: "р.", symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#discount").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, readOnly: true, symbol: "р.", symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#SpecialCondition1").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 'calc(100% - 2px)' }));
        $("#FIO").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 300 }));
        $("#Note").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 'calc(100% - 2px)' }));
        $("#date_checkup").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.date_checkup, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 83}));
        $("#user_checkup").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 180 }));
        
        
        if (CurrentContract.ContrNumS != '') $("#ContrNumS").jqxInput('val', CurrentContract.ContrNumS);
        if (CurrentContract.WorkText != '') $("#WorkText").jqxInput('val', CurrentContract.WorkText);
        if (CurrentContract.JuridicalPerson != '') $("#JuridicalPerson").jqxInput('val', CurrentContract.JuridicalPerson);
        if (CurrentContract.PaymentTypeName != '') $("#PaymentTypeName").jqxInput('val', CurrentContract.PaymentTypeName);
        if (CurrentContract.Price != '') $("#Price").jqxNumberInput('val', CurrentContract.Price);
        if (CurrentContract.discount != '') $("#discount").jqxNumberInput('val', CurrentContract.discount);
        if (CurrentContract.SpecialCondition != '') $("#SpecialCondition1").jqxTextArea('val', CurrentContract.SpecialCondition);
        if (CurrentContract.FIO != '') $("#FIO").jqxInput('val', CurrentContract.FIO);
        if (CurrentContract.Note != '') $("#Note").jqxTextArea('val', CurrentContract.Note);
        if (CurrentContract.user_checkup != '') $("#user_checkup").jqxInput('val', CurrentContract.user_checkup);
        
        
        $("#EditContract").jqxButton($.extend(true, {}, ButtonDefaultSettings, { imgSrc: '/images/4.png' }));
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
        
        $('#NewContractDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: 450, width: 810}));
        
        $('#PrintContract').on('click', function() {
            window.open(<?php echo json_encode(Yii::app()->createUrl('Reports/ReportOpen', array(
                'ReportName' => '/Договора/Счет-заказ',
                'Ajax' => false,
                'Render' => true,
            ))); ?> + '&Parameters[ContrS_id]=' + CurrentContract.ContrS_id);
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
                case 1:
                    loadPage('<?php echo Yii::app()->createUrl('ContractEquips/index', array('contrs_id' => $model->ContrS_id)) ?>', 1);
                    break;
            }
        };
        $('#jqxTabsCurrentContract').jqxTabs({ width: 'calc(100% - 2px)', height: 'calc(100% - 2px)', initTabContent: initWidgets });
    });
</script>

<div class="al-row">
    <div class="al-row-column">Номер: <input readonly id="ContrNumS" type="text"></div>
    <div class="al-row-column" style="padding-top: 3px;">Дата: </div><div class="row-column"><div id="ContrDateS" type="text"></div></div>
    <div class="al-row-column">Юр. лицо: <input readonly id="JuridicalPerson" type="text"></div>
    <div class="al-row-column">Вид оплаты: <input readonly id="PaymentTypeName" type="text"></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column">Наименование вида работ: <input readonly id="WorkText" type="text"></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column">Контактное лицо: <input readonly id="FIO" type="text"></div>
    <div class="al-row-column">Сумма: </div><div class="row-column"><div id="Price" type="text"></div></div>
    <div class="al-row-column">Скидка: </div><div class="row-column"><div id="discount" type="text"></div></div>
    <div style="clear: both"></div>
</div>

<div class="al-row">
    <div class="al-row-column" style="width: 50%">
        <div>Особые договоренности:</div>
        <div><textarea readonly id="SpecialCondition1" ></textarea></div>
    </div>
    <div class="al-row-column" style="width: calc(50% - 6px)">
        <div>Примечание:</div>
        <div><textarea readonly id="Note" ></textarea></div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Изменить" id='EditContract' /></div>
    <div class="al-row-column" style="padding-top: 3px;">Дата утв-я: </div><div class="row-column"><div id="date_checkup"></div></div>
    <div class="al-row-column">Утвердил: <input readonly id="user_checkup" type="text"></div>
    <div class="al-row-column"><input type="button" value="Утвердить" id='CheckupContract' /></div>
    <div class="al-row-column" style="float: right"><input type="button" value="Печатать" id='PrintContract' /></div>
    <div style="clear: both"></div>
</div>

<div id='jqxWidgetCurrentContract' style="height: calc(100% - 250px);">
    <div id='jqxTabsCurrentContract'>
        <ul style="margin-left: 20px">
            <li>
                <div style="height: 15px; margin-top: 3px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                        Спецификация
                    </div>
                </div>
            </li>
            <li>
                <div style="height: 15px; margin-top: 3px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                        Оборудование
                    </div>
                </div>
            </li>
        </ul>
        <div id='contentContractDetails' style="overflow: hidden; padding: 0px 10px 0px 10px; height: 100%;"></div>
        <div id='contentContractEquips' style="overflow: hidden; padding: 0px 10px 0px 10px; height: 100%;"></div>
    </div>
</div>
    
        
<div id="NewContractDialog">
    <div id="NewContractDialogHeader">
        <span id="NewContractHeaderText">Редактирование счета № <?php echo $model->ContrS_id; ?></span>
    </div>
    <div style="overflow: hidden; padding: 10px; background-color: #F2F2F2;" id="NewContractDialogContent">
        <div style="overflow: hidden;" id="NewContractBodyDialog"></div>
    </div>
</div>

