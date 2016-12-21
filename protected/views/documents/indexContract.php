<script type="text/javascript">
    $(document).ready(function () {
        
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var CurrentContract = {
            ContrS_id: <?php echo json_encode($model->ContrS_id); ?>,
            ContrNumS: <?php echo json_encode($model->ContrNumS); ?>,
            ObjectGr_id: <?php echo json_encode($model->ObjectGr_id); ?>,
            JuridicalPerson: <?php echo json_encode($model->JuridicalPerson); ?>,
            ContrDateS: Aliton.DateConvertToJs(<?php echo json_encode($model->ContrDateS); ?>),
            DateExecuting: Aliton.DateConvertToJs(<?php echo json_encode($model->DateExecuting); ?>),
            DatePay: Aliton.DateConvertToJs(<?php echo json_encode($model->DatePay); ?>),
            crtp_name: <?php echo json_encode($model->crtp_name); ?>,
            Prolong: <?php echo json_encode($model->Prolong); ?>,
            Debtor: <?php echo json_encode($model->Debtor); ?>,
            PaymentTypeName: <?php echo json_encode($model->PaymentTypeName); ?>,
            Price: <?php echo json_encode($model->Price); ?>,
            PriceMonth: <?php echo json_encode($model->PriceMonth); ?>,
            empl_name: <?php echo json_encode($model->empl_name); ?>,
            SpecialCondition: <?php echo json_encode($model->SpecialCondition); ?>,
            Note: <?php echo json_encode($model->Note); ?>,
            date_checkup: Aliton.DateConvertToJs('<?php echo $model->date_checkup; ?>'),
            user_checkup: <?php echo json_encode($model->user_checkup); ?>,
            EmplChange: <?php echo json_encode($model->EmplChange); ?>,
            ContrSDateStart: Aliton.DateConvertToJs(<?php echo json_encode($model->ContrSDateStart); ?>),
            ContrSDateEnd: Aliton.DateConvertToJs(<?php echo json_encode($model->ContrSDateEnd); ?>),
            PaymentName: <?php echo json_encode($model->PaymentName); ?>,
            MasterName: <?php echo json_encode($model->MasterName); ?>,
            ServiceType: <?php echo json_encode($model->ServiceType); ?>,
            date_doc: Aliton.DateConvertToJs(<?php echo json_encode($model->date_doc); ?>),
        };
            
        
        $("#ContrNumS").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#JuridicalPerson").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 150 }));
        $("#ContrDateS").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.ContrDateS, width: 85, readonly: true, showCalendarButton: false, allowKeyboardDelete: false,  formatString: 'dd.MM.yyyy' }));
        $("#DateExecuting2").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.DateExecuting, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 80 }));
        $("#DatePay").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.DatePay, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 80}));
        $("#ContrSDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.ContrSDateStart, width: 85, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, formatString: 'dd.MM.yyyy' }));
        $("#ContrSDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.ContrSDateEnd, width: 85, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, formatString: 'dd.MM.yyyy' }));
        $("#date_doc").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.date_doc, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 80}));
        $("#PaymentName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 100 }));
        $("#crtp_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#Prolong").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { disabled: true }));
        $("#Debtor").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { disabled: true }));
        $("#PaymentTypeName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 100 }));
        $("#Price").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, readOnly: true, symbol: "р.", symbolPosition: 'right', min: 0, decimalDigits: 2 }));
        $("#PriceMonth").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, readOnly: true, symbol: "р.", symbolPosition: 'right', min: 0, decimalDigits: 2 }));
        $("#empl_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 150 }));
        $("#SpecialCondition1").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 430, height: 70 }));
        $("#Note").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 430, height: 70 }));
        $("#date_checkup").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.date_checkup, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 83}));
        $("#user_checkup").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 180 }));
        //$("#MasterName2").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 120 }));
        $("#ServiceType").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 150 }));
        
        if (CurrentContract.ContrNumS != '') $("#ContrNumS").jqxInput('val', CurrentContract.ContrNumS);
        if (CurrentContract.JuridicalPerson != '') $("#JuridicalPerson").jqxInput('val', CurrentContract.JuridicalPerson);
        if (CurrentContract.crtp_name != '') $("#crtp_name").jqxInput('val', CurrentContract.crtp_name);
        if (CurrentContract.PaymentName != '') $("#PaymentName").jqxInput('val', CurrentContract.PaymentName);
        if (CurrentContract.Prolong != '') $("#Prolong").jqxCheckBox({checked: Boolean(Number(CurrentContract.Prolong))});
        if (CurrentContract.Debtor != '') $("#Debtor").jqxCheckBox({checked: Boolean(Number(CurrentContract.Debtor))});
        if (CurrentContract.PaymentTypeName != '') $("#PaymentTypeName").jqxInput('val', CurrentContract.PaymentTypeName);
        if (CurrentContract.Price != '') $("#Price").jqxNumberInput('val', CurrentContract.Price);
        if (CurrentContract.PriceMonth != '') $("#PriceMonth").jqxNumberInput('val', CurrentContract.PriceMonth);
        if (CurrentContract.empl_name != '') $("#empl_name").jqxInput('val', CurrentContract.empl_name);
        if (CurrentContract.SpecialCondition != '') $("#SpecialCondition1").jqxTextArea('val', CurrentContract.SpecialCondition);
        if (CurrentContract.Note != '') $("#Note").jqxTextArea('val', CurrentContract.Note);
        if (CurrentContract.user_checkup != '') $("#user_checkup").jqxInput('val', CurrentContract.user_checkup);
//        if (CurrentContract.MasterName != '') $("#MasterName2").jqxInput('val', CurrentContract.MasterName);
        if (CurrentContract.ServiceType != '') $("#ServiceType").jqxInput('val', CurrentContract.ServiceType);
        
        $('#jqxTabsCurrentContract').jqxTabs({ width: 'calc(100% - 2px)', height: 'calc(100% - 2px)' });
        
        var MastersDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContractMasterHistory, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["c.ContrS_id = " + CurrentContract.ContrS_id],
                });
                return data;
            },
        });
        
        $("#MastersGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: false,
                width: 'calc(100% - 2px)',
                height: 'calc(100% - 2px)',
                source: MastersDataAdapter,
                columns: [
                    { text: 'Сотрудник', dataField: 'EmployeeName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 400 },
                    { text: 'Дата с', dataField: 'WorkDateStart', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Дата по', dataField: 'WorkDateEnd', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 100 },
                ]
            })
        );

        
        $("#MastersGrid").on('rowselect', function (event) {
            var Temp = $('#MastersGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null};
            
//            console.log(CurrentRowData.csdt_id);
            if (CurrentRowData != null) {
                $("#EditContractsMasters").jqxButton({ disabled: false });
                $("#DelContractsMasters").jqxButton({ disabled: false });
            }
        });
        
        $("#EditContract").jqxButton($.extend(true, {}, ButtonDefaultSettings, { imgSrc: '/images/4.png' }));
        $("#PrintContract").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#CheckupContract").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#CheckupContract').jqxButton({disabled: (CurrentContract.user_checkup != null)});
        
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
        
        $('#EditContractDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: 580, width: 870}));
        
    
        $("#EditContract").on('click', function () {
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('Documents/Update');?>",
                type: 'POST',
                async: false,
                data: { 
                    ContrS_id: CurrentContract.ContrS_id,
                    ObjectGr_id: CurrentContract.ObjectGr_id,
                    DialogId: 'EditContractDialog',
                    BodyDialogId: 'EditContractBodyDialog'
                },
                success: function(Res) {
                    $('#EditContractBodyDialog').html(Res);
                }
            });
            $('#EditContractDialog').jqxWindow('open');
        });
        
        
        $("#NewContractsMasters").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#EditContractsMasters").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
        $("#ReloadContractsMasters").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelContractsMasters").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
        
        $('#MastersEditDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: 220, width: 370}));

        $('#MastersGrid').on('rowdoubleclick', function () { 
            $("#EditContractsMasters").click();
        });
        
        $("#NewContractsMasters").on('click', function () {
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('ContractMasterHistory/Insert');?>",
                type: 'POST',
                async: false,
                data: { 
                    ContrS_id: CurrentContract.ContrS_id
                },
                success: function(Res) {
                    $('#MastersEditDialog').jqxWindow('open');
                    $('#MastersBodyDialog').html(Res);
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        $("#EditContractsMasters").on('click', function () {
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('ContractMasterHistory/Update');?>",
                type: 'POST',
                async: false,
                data: { 
                    History_id: CurrentRowData.History_id
                },
                success: function(Res) {
                    $('#MastersBodyDialog').html(Res);
                    $('#MastersEditDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
           
        $("#DelContractsMasters").on('click', function () {
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('ContractMasterHistory/Delete');?>",
                data: { 
                    History_id: CurrentRowData.History_id
                },
                success: function(){
                    $("#MastersGrid").jqxGrid('updatebounddata');
                    $("#MastersGrid").jqxGrid('selectrow', 0);
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        $("#ReloadContractsMasters").on('click', function () {
            $.ajax({
                type: "POST",
                url: "/index.php?r=Documents/Index",
                success: function(){
                    $("#MastersGrid").jqxGrid('updatebounddata');
                    $("#MastersGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
        $("#MastersGrid").on('bindingcomplete', function () {
            $("#MastersGrid").jqxGrid('selectrow', 0);
        });
    });
    
</script>

<div class="al-row">
    <div class="al-row-column">Номер: <input readonly id="ContrNumS" type="text"></div>
    <div class="al-row-column" style="padding: 3px 5px 0 0;">Дата: </div><div class="row-column"><div id="ContrDateS" type="text"></div></div>
    <div class="al-row-column" style="padding: 3px 5px 0 0;">Дата проводки через ВЦКП: </div><div class="row-column"><div id="DateExecuting2" type="text"></div></div>
    <div class="al-row-column" style="padding: 3px 3px 0 0;">Пролонгация: </div><div class="row-column"><div id="Prolong" type="checkbox"></div></div>
    <div class="al-row-column" style="padding: 3px 3px 0 0;">Долг: </div><div class="row-column"><div id="Debtor" type="checkbox"></div></div>
    <div style="clear: both"></div>
</div>

<div class="al-row">
    <div class="al-row-column" style="padding: 3px 3px 0 0;">Срок действия с: </div>
    <div class="al-row-column"><div id="ContrSDateStart" name="Documents[ContrSDateStart]" type="text"></div></div>
    <div class="al-row-column" style="padding: 3px 5px 0 0;">по: </div><div class="row-column"><div id="ContrSDateEnd" name="Documents[ContrSDateEnd]" type="text"></div></div>
    <div class="al-row-column">Юр. лицо: <input readonly id="JuridicalPerson" type="text"></div>
    <div class="al-row-column">Тип контракта: <input readonly id="crtp_name" type="text"></div>
    <div style="clear: both"></div>
</div>

<div class="al-row">
    <div class="al-row-column">Период. оплаты: <input readonly id="PaymentName" type="text"></div>
    <div class="al-row-column">Вид оплаты: <input readonly id="PaymentTypeName" type="text"></div>
    <div class="al-row-column" style="padding: 3px 5px 0 0;">Ежем. начисления: </div><div class="row-column"><div id="PriceMonth" type="text"></div></div>
    <div class="al-row-column" style="padding: 3px 5px 0 0;">Расценка: </div><div class="row-column"><div id="Price" type="text"></div></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="padding: 3px 5px 0 0;">Оплачено по: </div><div class="row-column"><div id="DatePay" type="text"></div></div>
    <!--<div class="al-row-column">Мастер: <input readonly id="MasterName2" type="text"></div>-->
    <div class="al-row-column">Тариф: <input readonly id="ServiceType" type="text"></div>
    <div class="al-row-column">Менеджер: <input readonly id="empl_name" type="text"></div>
    <div class="al-row-column" style="padding-top: 3px;">Дата прихода ориг. док.: </div>
    <div class="al-row-column"><div id="date_doc" type="text"></div></div>
    <div style="clear: both"></div>
</div>

<div class="al-row">
    <div class="al-row-column">Особые договоренности: <textarea readonly id="SpecialCondition1" ></textarea></div>
    <div class="al-row-column">Примечание: <textarea readonly id="Note" ></textarea></div>
    <div style="clear: both"></div>
</div>

<div class="al-row">
    <div class="al-row-column"><input type="button" value="Изменить" id='EditContract' /></div>
    <div class="al-row-column">Дата утв-я: </div>
    <div class="row-column"><div id="date_checkup"></div></div>
    <div class="al-row-column">Утвердил: <input readonly id="user_checkup" type="text"></div>
    <div class="al-row-column"><input type="button" value="Утвердить" id='CheckupContract' /></div>
    <div class="al-row-column" style="float: right;"><input type="button" value="Печатать" id='PrintContract' /></div>
    <div style="clear: both"></div>
</div>


<div class="al-row" style="height: calc(100% - 285px);">
    <div id='jqxTabsCurrentContract'>
        <ul style="margin-left: 20px">
            <li>
                <div style="height: 15px; margin-top: 3px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                        Мастера
                    </div>
                </div>
            </li>
        </ul>
        <div id='contentContractDetails' style="overflow: hidden;">
            <div style="padding: 10px; height: 100%">
                <div class="al-row" style="height: calc(100% - 62px);">
                    <div id="MastersGrid" class="jqxGridAliton"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column"><input type="button" value="Добавить" id='NewContractsMasters' /></div>
                    <div class="al-row-column"><input type="button" value="Изменить" id='EditContractsMasters' /></div>
                    <div class="al-row-column"><input type="button" value="Обновить" id='ReloadContractsMasters' /></div>
                    <div class="al-row-column" style="float: right;"><input type="button" value="Удалить" id='DelContractsMasters' /></div>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="EditContractDialog" style="display: none;">
    <div id="EditContractDialogHeader">
        <span id="EditContractHeaderText">Редактирование записи</span>
    </div>
    <div style="overflow: hidden; padding: 10px; background-color: #F2F2F2;" id="EditContractDialogContent">
        <div style="overflow: hidden;" id="EditContractBodyDialog"></div>
    </div>
</div>


<div id="MastersEditDialog" style="display: none;">
    <div id="MastersDialogHeader">
        <span id="MastersHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="overflow: hidden; padding: 10px;" id="MastersDialogContent">
        <div style="overflow: hidden;" id="MastersBodyDialog"></div>
    </div>
</div>