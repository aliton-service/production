<script type="text/javascript">
    $(document).ready(function () {
        
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var CurrentContract = {
            ContrS_id: '<?php echo $model->ContrS_id; ?>',
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
        };
            
        
        $("#ContrS_id").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#JuridicalPerson").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 260 }));
        $("#ContrDateS").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.ContrDateS, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 80}));
        $("#date_doc").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.date_doc, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 80}));
        $("#crtp_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#Annex").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {}));
        $("#Debtor").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {}));
        $("#DocNumber").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#DocDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.DocDate, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 80}));
        $("#PaymentTypeName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#Price").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, readOnly: true, symbol: "р.", symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#CalcSum").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, readOnly: true, symbol: "р.", symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#PrePayment").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, readOnly: true, symbol: "р.", symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#summa").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, readOnly: true, symbol: "р.", symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#empl_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 270 }));
        $("#dmnd_id").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 112 }));
        $("#DateExec").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.DateExec, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 80}));
        $("#date_act").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.date_act, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 80}));
        $("#SpecialCondition2").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 800 }));
        $("#FIO").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 330 }));
        $("#ExecDay").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 65, readOnly: true, symbol: "", symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
        $("#Garant").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 65, readOnly: true, symbol: "", symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
        $("#Note").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 830 }));
        $("#date_checkup").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentContract.date_checkup, readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 80}));
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
        if (CurrentContract.SpecialCondition != '') $("#SpecialCondition2").jqxTextArea('val', CurrentContract.SpecialCondition);
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
                height: '150',
                source: ContractsDetails_vDataAdapter,
                columns: [
                    { text: 'Наименование', dataField: 'ItemName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 400 },
                    { text: 'Количество', dataField: 'Quant', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Цена', dataField: 'Price', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 120, decimalDigits: 2 },
                    { text: 'Сумма', dataField: 'Sum', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 120 },
                ]
            })
        );
        var summaryData = $("#CDetailsGrid").jqxGrid('getcolumnaggregateddata', 'Sum', ['sum']);
//        console.log(summaryData);
        $("#GridSum").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100 }));
        if (summaryData.sum != '') $("#GridSum").jqxNumberInput('val', summaryData.sum);
        
        $("#CDetailsGrid").on('rowselect', function (event) {
            var Temp = $('#CDetailsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null};
            
            console.log(CurrentRowData.csdt_id);
        });
        
        $("#EditContract").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#PrintContract").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#СonfirmContract").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
        $("#NewContractsDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#EditContractsDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#ReloadContractsDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#PrintContractsDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelContractsDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
        $('#CDetailsEditDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '570px', width: '700'}));
        
        $('#CDetailsEditDialog').jqxWindow({initContent: function() {
            $("#CDetailsBtnOk").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#CDetailsBtnCancel").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        }});

        $("#CDetailsBtnCancel").on('click', function () {
            $('#CDetailsEditDialog').jqxWindow('close');
        });
        
        var SendForm = function(Mode, Form) {
            var Url;
            if (Mode == 'Insert')
                Url = "<?php echo Yii::app()->createUrl('ContractsDetails_v/Insert');?>";
            if (Mode == 'Edit')
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
            SendForm(Mode);
        });
        
        var LoadFormInsert = function(ContrS_id) {
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('ContractsDetails_v/Insert');?>",
                type: 'POST',
                async: false,
                data: {
                    ContrS_id: ContrS_id
                },
                success: function(Res) {
                    $('#CDetailsBodyDialog').html(Res);
                }
            });
        };
        
        var LoadFormUpdate = function(csdt_id) {
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('ContractsDetails_v/Update');?>",
                type: 'POST',
                async: false,
                data: {
                    csdt_id: csdt_id
                },
                success: function(Res) {
                    $('#CDetailsBodyDialog').html(Res);
                }
            });
        };
        
        $('#CDetailsGrid').on('rowdoubleclick', function (event) { 
            $("#EditContract").click();
        });
        
        $("#NewContractsDetails").on('click', function ()
        {
            Mode = 'Insert';
            LoadFormInsert(CurrentContract.ContrS_id);
            $('#CDetailsEditDialog').jqxWindow('open');
        });
        
        $("#EditContractsDetails").on('click', function ()
        {
            Mode = 'Edit';
            LoadFormUpdate(CurrentRowData.csdt_id);
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
                }
            });
        });
        
    });
    
        
</script>


<div style=" width: 850px; background-color: #F2F2F2;">
    <div class="row">
        <div class="row-column">Номер: <input readonly id="ContrS_id" type="text"></div>
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
    
    <div class="row" style="padding: 10px; width: 815px; border: 1px solid #ddd; background-color: #eee;">
        <div style="overflow: hidden;">
            <div class="row-column" style="margin: 0 0 15px 0; width: 100%; font-weight: 500;">Выполненные работы</div>
            <div class="row-column">Заявка: <input readonly id="dmnd_id" type="text"></div>
            <div class="row-column" style="padding-top: 3px;">Дата выполнения работ: </div><div class="row-column"><div id="DateExec"></div></div>
            <div class="row-column" style="padding-top: 3px;">Дата прихода оригинала акта: </div><div class="row-column"><div id="date_act"></div></div>
            <div class="row-column" style="padding-top: 10px;">Перечень работ: <textarea readonly id="SpecialCondition2" ></textarea></div>
        </div>

        <div style="overflow: hidden; margin-top: 10px;">
            <div class="row-column">Контактное лицо: <input readonly id="FIO" type="text"></div>
            <div class="row-column">Срок: </div><div class="row-column"><div id="ExecDay" type="text"></div></div>
            <div class="row-column">Гарантия: </div><div class="row-column"><div id="Garant" type="text"></div></div>
        </div>
    </div>
    
    <div class="row">
        <div class="row-column">Примечание: <textarea readonly id="Note" ></textarea></div>
    </div>

    <div class="row">
        <div class="row-column"><input type="button" value="Изменить" id='EditContract' /></div>
        <div class="row-column" style="padding-top: 3px;">Дата утв-я: </div><div class="row-column"><div id="date_checkup"></div></div>
        <div class="row-column">Утвердил: <input readonly id="user_checkup" type="text"></div>
        <div class="row-column" style="float: right;"><input type="button" value="Печатать" id='PrintContract' /></div>
        <div class="row-column" style="float: right;"><input type="button" value="Утвердить" id='СonfirmContract' /></div>
    </div>

    <div class="row" style="padding: 10px; width: 815px; border: 1px solid #ddd; background-color: #eee;">
        <div class="row-column" style="margin: 0 0 15px 0; width: 100%; font-weight: 500;">Спецификация</div>
        <div id="CDetailsGrid" class="jqxGridAliton"></div>
        <div class="row-column">Сумма: <input readonly id="GridSum" type="text"></div>
    </div>
    <div class="row">
        <div class="row-column"><input type="button" value="Добавить" id='NewContractsDetails' /></div>
        <div class="row-column"><input type="button" value="Изменить" id='EditContractsDetails' /></div>
        <div class="row-column"><input type="button" value="Обновить" id='ReloadContractsDetails' /></div>
        <div class="row-column"><input type="button" value="Печать" id='PrintContractsDetails' /></div>
        <div class="row-column" style="float: right;"><input type="button" value="Удалить" id='DelContractsDetails' /></div>
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