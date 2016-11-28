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
            DateExecuting: Aliton.DateConvertToJs('<?php echo $model->DateExecuting; ?>'),
            DatePay: Aliton.DateConvertToJs('<?php echo $model->DatePay; ?>'),
            crtp_name: '<?php echo $model->crtp_name; ?>',
            Prolong: <?php echo json_encode($model->Prolong); ?>,
            Debtor: <?php echo json_encode($model->Debtor); ?>,
            PaymentTypeName: '<?php echo $model->PaymentTypeName; ?>',
            Price: '<?php echo $model->Price; ?>',
            PriceMonth: '<?php echo $model->PriceMonth; ?>',
            empl_name: '<?php echo $model->empl_name; ?>',
            SpecialCondition: <?php echo json_encode($model->SpecialCondition); ?>,
            Note: <?php echo json_encode($model->Note); ?>,
            date_checkup: Aliton.DateConvertToJs('<?php echo $model->date_checkup; ?>'),
            user_checkup: '<?php echo $model->user_checkup; ?>',
            EmplChange: '<?php echo $model->EmplChange; ?>',
            ContrSDateStart: '<?php echo $model->ContrSDateStart; ?>',
            ContrSDateEnd: '<?php echo $model->ContrSDateEnd; ?>',
            PaymentName: '<?php echo $model->PaymentName; ?>',
            MasterName: '<?php echo $model->MasterName; ?>',
            ServiceType: '<?php echo $model->ServiceType; ?>',
            date_doc: Aliton.DateConvertToJs('<?php echo $model->date_doc; ?>'),
        };
            
        
        $("#ContrNumS").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#JuridicalPerson").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 260 }));
        $("#ContrDateS").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.ContrDateS, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 80}));
        $("#DateExecuting2").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.DateExecuting, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 80}));
        $("#DatePay").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.DatePay, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 80}));
        $("#ContrSDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Document.ContrSDateStart, width: 102, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 80}));
        $("#date_doc").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.date_doc, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 80}));
        $("#ContrSDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Document.ContrSDateEnd, width: 102, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 80}));
        $("#PaymentName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#crtp_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#Prolong").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {}));
        $("#Debtor").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {}));
        $("#PaymentTypeName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#Price").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, readOnly: true, symbol: "р.", symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#PriceMonth").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, readOnly: true, symbol: "р.", symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#empl_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 270 }));
        $("#SpecialCondition1").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 830 }));
        $("#Note").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 830 }));
        $("#date_checkup").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.date_checkup, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 83}));
        $("#user_checkup").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 180 }));
        $("#MasterName2").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 300 }));
        $("#ServiceType").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 300 }));
        
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
        if (CurrentContract.MasterName != '') $("#MasterName2").jqxInput('val', CurrentContract.MasterName);
        if (CurrentContract.ServiceType != '') $("#ServiceType").jqxInput('val', CurrentContract.ServiceType);
        
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
                width: '100%',
                height: '170',
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
        
        $('#MastersEditDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '240px', width: '370'}));

        $('#MastersGrid').on('rowdoubleclick', function (event) { 
            $("#EditContractsMasters").click();
        });
        
        $("#NewContractsMasters").on('click', function () {
            console.log('CurrentContract.ContrS_id = ' + CurrentContract.ContrS_id);
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('ContractMasterHistory/Insert');?>",
                type: 'POST',
                async: false,
                data: { 
                    ContrS_id: CurrentContract.ContrS_id
                },
                success: function(Res) {
                    $('#MastersBodyDialog').html(Res);
                    $('#MastersEditDialog').jqxWindow('open');
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
                }
            });
        });
           
        $("#DelContractsMasters").on('click', function () {
            $.ajax({
                type: "POST",
                url: "/index.php?r=ContractMasterHistory/Delete",
                data: { 
                    History_id: CurrentRowData.History_id
                },
                success: function(){
                    $("#MastersGrid").jqxGrid('updatebounddata');
                    $("#MastersGrid").jqxGrid('selectrow', 0);
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
        $("#MastersGrid").jqxGrid('selectrow', 0);
    });
    
        
</script>

<div style="background-color: #F2F2F2;">
    <div class="row">
        <div class="row-column">Номер: <input readonly id="ContrNumS" type="text"></div>
        <div class="row-column" style="padding-top: 3px;">Дата: </div><div class="row-column"><div id="ContrDateS" type="text"></div></div>
        <div class="row-column" style="padding-top: 3px;">Дата проводки через ВЦКП: </div><div class="row-column"><div id="DateExecuting2" type="text"></div></div>
    </div>
    
    <div class="row">
        <div class="row-column" style="padding-top: 3px;">Срок действия с: </div><div class="row-column"><div id="ContrSDateStart" name="Documents[ContrSDateStart]" type="text"></div></div>
        <div class="row-column" style="padding-top: 3px;">по: </div><div class="row-column"><div id="ContrSDateEnd" name="Documents[ContrSDateEnd]" type="text"></div></div>
        <div class="row-column" style="padding-top: 3px;">Пролонгация: </div><div class="row-column"><div id="Prolong" type="checkbox"></div></div>
        <div class="row-column" style="padding-top: 3px;">Долг: </div><div class="row-column"><div id="Debtor" type="checkbox"></div></div>
    </div>

    <div class="row">
        <div class="row-column">Юр. лицо: <input readonly id="JuridicalPerson" type="text"></div>
        <div class="row-column">Тип контракта: <input readonly id="crtp_name" type="text"></div>
    </div>

    <div class="row">
        <div class="row-column">Периодичность оплаты: <input readonly id="PaymentName" type="text"></div>
        <div class="row-column">Вид оплаты: <input readonly id="PaymentTypeName" type="text"></div>
    </div>
    
    <div class="row">
        <div class="row-column">Ежемесячные начисления: </div><div class="row-column"><div id="PriceMonth" type="text"></div></div>
        <div class="row-column">Расценка: </div><div class="row-column"><div id="Price" type="text"></div></div>
        <div class="row-column">Оплачено по: </div><div class="row-column"><div id="DatePay" type="text"></div></div>
    </div>
    
    <div class="row">
        <div class="row-column">Мастер: <input readonly id="MasterName2" type="text"></div>
        <div class="row-column">Тариф: <input readonly id="ServiceType" type="text"></div>
    </div>
        
    <div class="row">
        <div class="row-column" style="padding-top: 10px;">Особые договоренности: <textarea readonly id="SpecialCondition1" ></textarea></div>
    </div>
    
    <div class="row">
        <div class="row-column">Менеджер: <input readonly id="empl_name" type="text"></div>
        <div class="row-column" style="padding-top: 3px;">Дата прихода оригинала документа: </div><div class="row-column"><div id="date_doc" type="text"></div></div>
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

    <div class="row" style="padding: 0 10px 10px 10px; width: 815px; border: 1px solid #ddd; background-color: #eee;">
        <div class="row-column" style="margin: 0 0 10px 0; width: 100%; font-weight: 500;">Мастера</div>
        <div id="MastersGrid" class="jqxGridAliton"></div>
    </div>
    <div class="row">
        <div class="row-column"><input type="button" value="Добавить" id='NewContractsMasters' /></div>
        <div class="row-column"><input type="button" value="Изменить" id='EditContractsMasters' /></div>
        <div class="row-column"><input type="button" value="Обновить" id='ReloadContractsMasters' /></div>
        <div class="row-column" style="margin-left: 310px;"><input type="button" value="Удалить" id='DelContractsMasters' /></div>
    </div>
</div>


<div id="EditContractDialog">
    <div id="EditContractDialogHeader">
        <span id="EditContractHeaderText">Редактирование записи</span>
    </div>
    <div style="overflow: hidden; padding: 10px; background-color: #F2F2F2;" id="EditContractDialogContent">
        <div style="overflow: hidden;" id="EditContractBodyDialog"></div>
    </div>
</div>


<div id="MastersEditDialog">
    <div id="MastersDialogHeader">
        <span id="MastersHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="overflow: hidden; padding: 10px;" id="MastersDialogContent">
        <div style="overflow: hidden;" id="MastersBodyDialog"></div>
        <div id="MastersBottomDialog">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='MastersBtnOk' /></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='MastersBtnCancel' /></div>
            </div>
        </div>
    </div>
</div>