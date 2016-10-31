<script type="text/javascript">
    var SN = {};
    var WHBuhActs = {};
    $(document).ready(function () {
        var CurrentRowEquips;
        
        /* Текущая выбранная строка данных */
        
        var WHBuhActs = {
            docm_id: '<?php echo $model->docm_id; ?>',
            objc_id: '<?php echo $model->objc_id; ?>',
            number: <?php echo json_encode($model->number); ?>,
            org_name: <?php echo json_encode($model->org_name); ?>,
            Address: <?php echo json_encode($model->Address); ?>,
            JuridicalPerson: <?php echo json_encode($model->JuridicalPerson); ?>,
            rcrs_name: <?php echo json_encode($model->rcrs_name); ?>,
            ReceiptNumber: <?php echo json_encode($model->ReceiptNumber); ?>,
            wrtp_name: <?php echo json_encode($model->wrtp_name); ?>,
            jbtp_name: <?php echo json_encode($model->jbtp_name); ?>,
            work_list: <?php echo json_encode($model->work_list); ?>,
            signed_yn: <?php echo json_encode($model->signed_yn); ?>,
            FIO: <?php echo json_encode($model->FIO); ?>,
            sum: <?php echo json_encode($model->sum); ?>,
            achs_id: <?php echo json_encode($model->achs_id); ?>,
            
            date: Aliton.DateConvertToJs('<?php echo $model->date; ?>'),
            date_act: Aliton.DateConvertToJs('<?php echo $model->date_act; ?>'),
            ReceiptDate: Aliton.DateConvertToJs('<?php echo $model->ReceiptDate; ?>'),
        };
            
        $("#numberWHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 120 }));
        $("#org_nameWHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 350 }));
        $("#AddressWHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 350 }));
        $("#JuridicalPersonWHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 220 }));
        $("#ReceiptReasonsWHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 250 }));
        $("#ReceiptNumberWHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 75 }));
        $("#wrtp_nameWHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 250 }));
        $("#jbtp_nameWHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 250 }));
        $("#FIO_WHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 250 }));
        $("#sumWHBA").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, inputMode: 'simple'}));
        
        $("#signed_ynWHBA").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { disabled: true }));
        
        $("#dateWHBA").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 140, formatString: 'dd.MM.yyyy H:mm', readonly: true, showCalendarButton: false, allowKeyboardDelete: false }));
        $("#date_actWHBA").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', readonly: true, showCalendarButton: false, allowKeyboardDelete: false }));
        $("#ReceiptDateWHBA").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', readonly: true, showCalendarButton: false, allowKeyboardDelete: false }));
        
        $("#work_listWHBA").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 800 }));
        
        if (WHBuhActs.number !== '') $("#numberWHBA").jqxInput('val', WHBuhActs.number);
        if (WHBuhActs.org_name !== '') $("#org_nameWHBA").jqxInput('val', WHBuhActs.org_name);
        if (WHBuhActs.Address !== '') $("#AddressWHBA").jqxInput('val', WHBuhActs.Address);
        if (WHBuhActs.JuridicalPerson !== '') $("#JuridicalPersonWHBA").jqxInput('val', WHBuhActs.JuridicalPerson);
        if (WHBuhActs.rcrs_name !== '') $("#ReceiptReasonsWHBA").jqxInput('val', WHBuhActs.rcrs_name);
        if (WHBuhActs.ReceiptNumber !== '') $("#ReceiptNumberWHBA").jqxInput('val', WHBuhActs.ReceiptNumber);
        if (WHBuhActs.wrtp_name !== '') $("#wrtp_nameWHBA").jqxInput('val', WHBuhActs.wrtp_name);
        if (WHBuhActs.jbtp_name !== '' && WHBuhActs.jbtp_name !== 'null') $("#jbtp_nameWHBA").jqxInput('val', WHBuhActs.jbtp_name);
        if (WHBuhActs.FIO !== '' && WHBuhActs.FIO !== 'null') $("#FIO_WHBA").jqxInput('val', WHBuhActs.FIO);
        
        if (WHBuhActs.sum !== '' && WHBuhActs.sum !== 'null') $("#sumWHBA").jqxNumberInput('val', WHBuhActs.sum);
        
        if (WHBuhActs.work_list !== '' && WHBuhActs.work_list !== 'null') $("#work_listWHBA").jqxTextArea('val', WHBuhActs.work_list);
        
        if (WHBuhActs.signed_yn !== '' && WHBuhActs.signed_yn !== 'null') $("#signed_ynWHBA").jqxCheckBox('val', Boolean(parseInt(WHBuhActs.signed_yn)));
        
        if (WHBuhActs.date !== '') $("#dateWHBA").jqxDateTimeInput('val', WHBuhActs.date);
        if (WHBuhActs.date_act !== '') $("#date_actWHBA").jqxDateTimeInput('val', WHBuhActs.date_act);
        if (WHBuhActs.ReceiptDate !== '') $("#ReceiptDateWHBA").jqxDateTimeInput('val', WHBuhActs.ReceiptDate);
        
        $('#btnEditWHBuhActs').jqxButton($.extend(true, {}, ButtonDefaultSettings, { imgSrc: '/images/4.png' }));
        $('#btnAcceptWHBuhActs').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 140, imgSrc: '/images/8.png' }));
        $('#btnCancelAcceptWHBuhActs').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160, imgSrc: '/images/3.png' }));
        $('#btnPrintWHBuhActs').jqxButton($.extend(true, {}, ButtonDefaultSettings, { imgSrc: '/images/5.png' }));
        
        if (WHBuhActs.achs_id === null) {
            $('#btnCancelAcceptWHBuhActs').jqxButton({ disabled: true });
        } else {
            $('#btnAcceptWHBuhActs').jqxButton({ disabled: true });
        }
        
        $('#btnEditWHBuhActs').on('click', function(){
            $('#WHDocumentsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 600, width: 760, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('WHBuhActs/Update')) ?>,
                type: 'POST',
                async: false,
                data: {
                    docm_id: WHBuhActs.docm_id,
                    DialogId: 'WHDocumentsDialog',
                    BodyDialogId: 'BodyWHDocumentsDialog'
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyWHDocumentsDialog").html(Res.html);
                    $('#WHDocumentsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        
        $('#btnAcceptWHBuhActs').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('WHBuhActs/Accept')) ?>,
                type: 'POST',
                async: false,
                data: {
                    docm_id: WHBuhActs.docm_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    if(Res === '1' || Res === 1) {
                        location.reload();
                    }
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#btnCancelAcceptWHBuhActs').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('WHBuhActs/CancelAccept')) ?>,
                type: 'POST',
                async: false,
                data: {
                    docm_id: WHBuhActs.docm_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    if(Res === '1' || Res === 1) {
                        location.reload();
                    }
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#btnPrintWHBuhActs').on('click', function() {
            window.open(<?php echo json_encode(Yii::app()->createUrl('Reports/ReportOpen', array(
                'ReportName' => '/Сметы/Бухгалтерский акт',
                'Ajax' => false,
                'Render' => true,
            ))); ?> + '&Parameters[docm_id]=' + WHBuhActs.docm_id);
        });
        
        
        SN.Add = function() {
            if (CurrentRowEquips !== undefined) {
                $('#WHDocumentsDialog').jqxWindow({width: 600, height: 460, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('SerialNumbers/Index')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        dadt_id: CurrentRowEquips.dadt_id,
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyWHDocumentsDialog").html(Res.html);
                        $('#WHDocumentsDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        };
        
        var WHBuhActsEquipsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceWHBuhActsEquips, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["d.docm_id = " + WHBuhActs.docm_id],
                });
                return data;
            },
        });
        
        $("#GridDetails").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: '200',
                width: '100%',
                source: WHBuhActsEquipsDataAdapter,
                showstatusbar: true,
                statusbarheight: 29,
                showaggregates: true,
                showfilterrow: false,
                autoshowfiltericon: true,
                pagesize: 200,
                virtualmode: false,
                columns: [
                    { text: 'Оборудование', datafield: 'EquipName', width: 200 },
                    { text: 'Ед. изм.', datafield: 'NameUnitMeasurement', width: 80 },
                    { text: 'Кол-во', datafield: 'docm_quant', width: 120, cellsformat: 'f2' },
                    { text: 'Б\\У', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'used', width: 50 },
                    { text: 'Серийные номера', datafield: 'SN', width: 150,
                        cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
                            return '<div style=\'float: left; width: 80%\'>' + value + '</div>\n\
                                        <div style=\'float: left; width: 20%\'>\n\
                                            <button onclick=\'SN.Add();\' style=\'float: right; margin-top: 4px;\'>...</button>\n\
                                        </div>';
                        }   
                    },
                    { text: 'Номер требования', datafield: 'number', width: 150 },
                    { text: 'Дата требования', filtertype: 'date', datafield: 'date', width: 150, cellsformat: 'dd.MM.yyyy' },
                ],
        }));
        
        
        $('#btnAddEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { imgSrc: '/images/6.png' }));
        $('#btnEditEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { imgSrc: '/images/4.png' }));
        $('#btnFindTreb').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 180, imgSrc: '/images/9.png' }));
        $('#btnRefreshEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { imgSrc: '/images/11.png' }));
        $('#btnDelEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { imgSrc: '/images/7.png' }));
        
        $('#WHDocumentsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 350, width: 380, position: 'center'}));
        $('#FindTrebsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings));
        
        var CheckButton = function() {
            $('#btnDelEquips').jqxButton({disabled: !(CurrentRowEquips != undefined)})
            $('#btnEditEquips').jqxButton({disabled: !(CurrentRowEquips != undefined)})
        }
        
        $("#GridDetails").on('rowselect', function (event) {
            CurrentRowEquips = $('#GridDetails').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
//            console.log(CurrentRowEquips.prlt_id);
        });
        
        
        
        $("#btnAddEquips").on('click', function(){
            if ($("#btnAddEquips").jqxButton('disabled')) return;
            if (WHBuhActs.docm_id !== null) {
                $('#WHDocumentsDialog').jqxWindow({width: 660, height: 255, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('DocmAchsDetails/Create')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Docm_id: WHBuhActs.docm_id,
                        Dctp_id: 5
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyWHDocumentsDialog").html(Res.html);
                        $('#WHDocumentsDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });

        $("#btnEditEquips").on('click', function(){
            if ($("#btnEditEquips").jqxButton('disabled')) return;
            if (WHBuhActs.docm_id !== null) {
                $('#WHDocumentsDialog').jqxWindow({width: 640, height: 255, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('DocmAchsDetails/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Dadt_id: CurrentRowEquips.dadt_id,
                        Docm_id: WHBuhActs.docm_id,
                        Dctp_id: 5
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyWHDocumentsDialog").html(Res.html);
                        $('#WHDocumentsDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });

        $("#btnRefreshEquips").on('click', function() {
            if ($("#btnRefreshEquips").jqxButton('disabled')) return;
            if (CurrentRowEquips != undefined) {
                var Dadt_id = CurrentRowEquips.dadt_id
                CurrentRowEquips = undefined;
                Aliton.SelectRowById('dadt_id', Dadt_id, '#GridDetails', true);
            }
            else
                Aliton.SelectRowById('dadt_id', null, '#GridDetails', true);

        });

        $("#btnDelEquips").on('click', function(){
            if ($("#btnDelEquips").jqxButton('disabled')) return;
            if (WHBuhActs.docm_id !== null && CurrentRowEquips !== undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('DocmAchsDetails/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Dadt_id: CurrentRowEquips.dadt_id,
                        Docm_id: WHBuhActs.docm_id,
                        Dctp_id: 5
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result === 1) {
                            CurrentRowEquips = undefined;
                            $("#btnRefreshEquips").click();
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });

        $('#btnFindTreb').on('click', function(){
            $('#FindTrebsDialog').jqxWindow({width: 900, height: 800, position: 'center'});
            var objc_id = WHBuhActs.objc_id;
            var Address = WHBuhActs.Address;
            if (objc_id == '') return;
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('WHDocumentsFind/FindTreb')) ?>,
                type: 'POST',
                async: false,
                data: {
                    Object_id: objc_id,
                    Address: Address
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyFindTrebsDialog").html(Res.html);
                    $('#FindTrebsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        
        
        $('#GridDetails').jqxGrid('selectrow', 0);
        
      
    });
</script>

<?php $this->setPageTitle('Бухгалтерский акт'); ?>


<div class="row">
    <div class="row-column">Номер: <input readonly type="text" id="numberWHBA"></div>
    <div class="row-column" style="margin-top: 2px;">Дата: </div><div class="row-column"><div id="dateWHBA"></div></div>
    <div class="row-column" style="margin: 2px 0 0 40px; font-weight: 500;"><?php echo $model->state; ?></div>
</div>

<div class="row">
    <div class="row-column">Клиент: <input readonly type="text" id="org_nameWHBA"></div>
</div>

<div class="row">
    <div class="row-column">Адрес: <input readonly type="text" id="AddressWHBA"></div>
</div>

<div class="row">
    <div class="row-column">Юр.лицо: <input readonly type="text" id="JuridicalPersonWHBA"></div>
    <div class="row-column" style="margin-top: 2px;">Дата прихода оригинала акта: </div><div class="row-column"><div id="date_actWHBA"></div></div>
</div>

<div class="row">
    <div class="row-column">Основание: <input readonly type="text" id="ReceiptReasonsWHBA"></div>
    <div class="row-column" style="margin-top: 2px;">Дата: </div><div class="row-column"><div id="ReceiptDateWHBA"></div></div>
    <div class="row-column">Номер: <input readonly type="text" id="ReceiptNumberWHBA"></div>
</div>

<div class="row" style="padding-bottom: 5px; border: 1px solid #ddd;">
    <div style="font-size: 1em; margin: 0 10px 0 5px;">Выполненные работы:</div>

    <div class="row">
        <div class="row-column">Тип работ: <input readonly type="text" id="wrtp_nameWHBA"></div>
        <div class="row-column">Вид работ: <input readonly type="text" id="jbtp_nameWHBA"></div>
    </div>

    <div class="row">
        <div class="row-column">Перечень работ: <textarea readonly type="text" id="work_listWHBA"></textarea></div>
    </div>

    <div class="row">
        <div class="row-column" style="margin: 0;"><div id="signed_ynWHBA"></div></div>
        <div class="row-column" style="margin-top: 2px;">Подписан</div>
        <div class="row-column"><input readonly type="text" id="FIO_WHBA"></div>
        <div class="row-column" style="margin-top: 2px;">Сумма: </div><div class="row-column"><div id="sumWHBA"></div></div>
    </div>

</div>

<div class="row" style="margin-top: 5px;">
    <div class="row-column"><input type="button" value="Изменить" id='btnEditWHBuhActs'/></div>
    <div class="row-column"><input type="button" value="Подтвердить" id='btnAcceptWHBuhActs'/></div>
    <div class="row-column" style="float: right; margin: 0 0 0 10px;"><input type="button" value="Печатать" id='btnPrintWHBuhActs'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отменить подтв." id='btnCancelAcceptWHBuhActs'/></div>
</div>   

<div class="row" style="margin: 0;">
    <div id="GridDetails" class="jqxGridAliton"></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Добавить" id='btnAddEquips'/></div>
    <div class="row-column"><input type="button" value="Изменить" id='btnEditEquips'/></div>
    <div class="row-column"><input type="button" value="Найти требование" id='btnFindTreb'/></div>
    <div class="row-column"><input type="button" value="Обновить" id='btnRefreshEquips'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Удалить" id='btnDelEquips'/></div>
</div>   


<div id="WHDocumentsDialog" style="display: none;">
    <div id="WHDocumentsDialogHeader">
        <span id="WHDocumentsDialogHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogWHDocumentsContent">
        <div style="" id="BodyWHDocumentsDialog"></div>
    </div>
</div>

<div id="FindTrebsDialog" style="display: none;">
    <div id="FindTrebsDialogHeader">
        <span id="FindTrebsHeaderText">Поиск требования</span>
    </div>
    <div style="padding: 10px;" id="DialogFindTrebsContent">
        <div style="" id="BodyFindTrebsDialog"></div>
    </div>
</div> 