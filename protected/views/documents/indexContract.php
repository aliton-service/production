<script type="text/javascript">
    $(document).ready(function () {
        
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var CurrentContract = {
            ContrS_id: '<?php echo $model->ContrS_id; ?>',
            ObjectGr_id: '<?php echo $model->ObjectGr_id; ?>',
            JuridicalPerson: '<?php echo $model->JuridicalPerson; ?>',
            ContrDateS: Aliton.DateConvertToJs('<?php echo $model->ContrDateS; ?>'),
            DateExecuting2: Aliton.DateConvertToJs('<?php echo $model->DateExecuting; ?>'),
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
            
        
        $("#ContrS_id").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#JuridicalPerson").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 260 }));
        $("#ContrDateS").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.ContrDateS, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 83}));
        $("#DateExecuting2").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.DateExecuting2, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 83}));
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
        
        
        if (CurrentContract.ContrS_id != '') $("#ContrS_id").jqxInput('val', CurrentContract.ContrS_id);
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
        
        var ContractsDetails_vDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContractsDetails_v, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["c.ContrS_id = " + CurrentContract.ContrS_id],
                });
                return data;
            },
        });
        
        $("#CDetailsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: false,
                width: '100%',
                height: '170',
                source: ContractsDetails_vDataAdapter,
                columns: [
                    { text: 'Наименование', dataField: 'ItemName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 400 },
                    { text: 'Количество', dataField: 'Quant', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Цена', dataField: 'price', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 120, decimalDigits: 2 },
                    { text: 'Сумма', dataField: 'sum', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 120 },
                ]
            })
        );
        var summaryData = $("#CDetailsGrid").jqxGrid('getcolumnaggregateddata', 'sum', ['sum']);
        
        $("#GridSum").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, readOnly: true, symbol: "р.", symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        if (summaryData.sum != '') $("#GridSum").jqxNumberInput('val', summaryData.sum);
        
        $("#CDetailsGrid").on('rowselect', function (event) {
            var Temp = $('#CDetailsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null};
            
//            console.log(CurrentRowData.csdt_id);
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
        
        
        
        
        
        $("#NewContractsDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#EditContractsDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#ReloadContractsDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#PrintContractsDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelContractsDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
        $('#CDetailsEditDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '360px', width: '700'}));
        
        $('#CDetailsEditDialog').jqxWindow({initContent: function() {
            $("#CDetailsBtnOk").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#CDetailsBtnCancel").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        }});

        $("#CDetailsBtnCancel").on('click', function () {
            $('#CDetailsEditDialog').jqxWindow('close');
        });
        
        var SendFormCDetails = function(Mode, Form) {
            var Url;
            if (Mode == 'Insert')
                Url = "<?php echo Yii::app()->createUrl('ContractsDetails_v/Insert');?>";
            if (Mode == 'Update')
                Url = "<?php echo Yii::app()->createUrl('ContractsDetails_v/Update');?>";
            
            var Data;
            if (Form == undefined)
                Data = $('#ContractsDetails_v').serialize();
            else Data = Form;
                
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    if (Res == '1' || Res == 1) {
                        $('#CDetailsEditDialog').jqxWindow('close');
                        $("#CDetailsGrid").jqxGrid('updatebounddata');
//                        $('#CDetailsGrid').jqxGrid({source: LoadData(CurrentContractDataAdapter)});
                    } else {
                        $('#CDetailsBodyDialog').html(Res);
                    }

                }
            });
        }

        $("#CDetailsBtnOk").on('click', function () {
            SendFormCDetails(Mode);
        });
        
        var LoadFormCDetails = function(Mode, id) {
            var Url;
            var Data;
            if (Mode == 'Insert') {
                Url = "<?php echo Yii::app()->createUrl('ContractsDetails_v/Insert');?>";
                Data = { ContrS_id: id };
            }
            if (Mode == 'Update') {
                Url = "<?php echo Yii::app()->createUrl('ContractsDetails_v/Update');?>";
                Data = { csdt_id: id };
            }
            
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    $('#CDetailsBodyDialog').html(Res);
                }
            });
        };
        
        
        $('#CDetailsGrid').on('rowdoubleclick', function (event) { 
            $("#EditContractsDetails").click();
        });
        
        $("#NewContractsDetails").on('click', function ()
        {
            Mode = 'Insert';
            LoadFormCDetails(Mode, CurrentContract.ContrS_id);
            $('#CDetailsEditDialog').jqxWindow('open');
        });
        
        $("#EditContractsDetails").on('click', function ()
        {
            Mode = 'Update';
            LoadFormCDetails(Mode, CurrentRowData.csdt_id);
            $('#CDetailsEditDialog').jqxWindow('open');
        });
           
        $("#DelContractsDetails").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=ContractsDetails_v/Delete",
                data: { csdt_id: CurrentRowData.csdt_id},
                success: function(){
                    $("#CDetailsGrid").jqxGrid('updatebounddata');
                    $("#CDetailsGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
        $("#ReloadContractsDetails").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=Documents/Index",
                success: function(){
                    $("#CDetailsGrid").jqxGrid('updatebounddata');
                    $("#CDetailsGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
    });
    
        
</script>

<div style="background-color: #F2F2F2;">
    <div class="row">
        <div class="row-column">Номер: <input readonly id="ContrS_id" type="text"></div>
        <div class="row-column" style="padding-top: 3px;">Дата: </div><div class="row-column"><div id="ContrDateS" type="text"></div></div>
        <div class="row-column" style="padding-top: 3px;">Дата проводки через ВЦКП: </div><div class="row-column"><div id="DateExecuting2" type="text"></div></div>
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

    <div class="row" style="padding: 0 10px 10px 10px; width: 815px; border: 1px solid #ddd; background-color: #eee;">
        <div class="row-column" style="margin: 0 0 10px 0; width: 100%; font-weight: 500;">Спецификация</div>
        <div id="CDetailsGrid" class="jqxGridAliton"></div>
    </div>
    <div class="row">
        <div class="row-column"><input type="button" value="Добавить" id='NewContractsDetails' /></div>
        <div class="row-column"><input type="button" value="Изменить" id='EditContractsDetails' /></div>
        <div class="row-column"><input type="button" value="Обновить" id='ReloadContractsDetails' /></div>
        <div class="row-column"><input type="button" value="Печатать" id='PrintContractsDetails' /></div>
        <div class="row-column" style="padding-top: 5px;">Сумма: </div><div class="row-column"><div id="GridSum"></div></div>
        <div class="row-column"><input type="button" value="Удалить" id='DelContractsDetails' /></div>
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


<div id="CDetailsEditDialog">
    <div id="CDetailsDialogHeader">
        <span id="CDetailsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="overflow: hidden; padding: 10px;" id="CDetailsDialogContent">
        <div style="overflow: hidden;" id="CDetailsBodyDialog"></div>
        <div id="CDetailsBottomDialog">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='CDetailsBtnOk' /></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='CDetailsBtnCancel' /></div>
            </div>
        </div>
    </div>
</div>