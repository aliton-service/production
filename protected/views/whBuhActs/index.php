<script type="text/javascript">
    $(document).ready(function () {
        
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var WHBuhActs = {
            docm_id: '<?php echo $model->docm_id; ?>',
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
            
            date: Aliton.DateConvertToJs('<?php echo $model->date; ?>'),
            date_act: Aliton.DateConvertToJs('<?php echo $model->date_act; ?>'),
            ReceiptDate: Aliton.DateConvertToJs('<?php echo $model->ReceiptDate; ?>'),
        };
            
        $("#numberWHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 120 }));
        $("#org_nameWHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 350 }));
        $("#AddressWHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 350 }));
        $("#JuridicalPersonWHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 220 }));
        $("#rcrs_nameWHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 220 }));
        $("#ReceiptNumberWHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 75 }));
        $("#wrtp_nameWHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 250 }));
        $("#jbtp_nameWHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 250 }));
        $("#FIO_WHBA").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 250 }));
        $("#sumWHBA").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 120, inputMode: 'simple'}));
        
        $("#signed_ynWHBA").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { disabled: true }));
        
        $("#dateWHBA").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 140, formatString: 'dd.MM.yyyy H:mm', readonly: true, showCalendarButton: false, allowKeyboardDelete: false }));
        $("#date_actWHBA").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', readonly: true, showCalendarButton: false, allowKeyboardDelete: false }));
        $("#ReceiptDateWHBA").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', readonly: true, showCalendarButton: false, allowKeyboardDelete: false }));
        
        $("#work_listWHBA").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 800 }));
        
        if (WHBuhActs.number !== '') $("#numberWHBA").jqxInput('val', WHBuhActs.number);
        if (WHBuhActs.org_name !== '') $("#org_nameWHBA").jqxInput('val', WHBuhActs.org_name);
        if (WHBuhActs.Address !== '') $("#org_nameWHBA").jqxInput('val', WHBuhActs.Address);
        if (WHBuhActs.JuridicalPerson !== '') $("#JuridicalPersonWHBA").jqxInput('val', WHBuhActs.JuridicalPerson);
        if (WHBuhActs.rcrs_name !== '') $("#rcrs_nameWHBA").jqxInput('val', WHBuhActs.rcrs_name);
        if (WHBuhActs.ReceiptNumber !== '') $("#ReceiptNumberWHBA").jqxInput('val', WHBuhActs.ReceiptNumber);
        if (WHBuhActs.wrtp_name !== '') $("#wrtp_nameWHBA").jqxInput('val', WHBuhActs.wrtp_name);
        if (WHBuhActs.jbtp_name !== '' && WHBuhActs.jbtp_name !== 'null') $("#jbtp_nameWHBA").jqxInput('val', WHBuhActs.jbtp_name);
        if (WHBuhActs.FIO !== '' && WHBuhActs.FIO !== 'null') $("#FIO_WHBA").jqxInput('val', WHBuhActs.FIO);
        
        if (WHBuhActs.sum !== '' && WHBuhActs.sum !== 'null') $("#sumWHBA").jqxNumberInput('val', WHBuhActs.sum);
        
        if (WHBuhActs.work_list !== '' && WHBuhActs.work_list !== 'null') $("#work_listWHBA").jqxTextArea('val', WHBuhActs.work_list);
        
        if (WHBuhActs.signed_yn !== '' && WHBuhActs.signed_yn !== 'null') $("#signed_ynWHBA").jqxCheckBox('val', WHBuhActs.signed_yn);
        
        if (WHBuhActs.date !== '') $("#dateWHBA").jqxDateTimeInput('val', WHBuhActs.date);
        if (WHBuhActs.date_act !== '') $("#date_actWHBA").jqxDateTimeInput('val', WHBuhActs.date_act);
        if (WHBuhActs.ReceiptDate !== '') $("#ReceiptDateWHBA").jqxDateTimeInput('val', WHBuhActs.ReceiptDate);
        
        var WHBuhActsEquipsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceWHBuhActsEquips, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["d.docm_id = " + WHBuhActs.docm_id],
                });
                return data;
            },
        });
        
        $("#WHBuhActsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: false,
                width: '100%',
                height: '200',
                source: WHBuhActsEquipsDataAdapter,
                columns: [
                    { text: 'Оборудование', datafield: 'EquipName', filtercondition: 'CONTAINS', width: 300},
                    { text: 'Ед.изм.', datafield: 'NameUnitMeasurement', filtercondition: 'CONTAINS', width: 60},
                    { text: 'Кол-во', datafield: 'docm_quant', filtercondition: 'CONTAINS', width: 60},
                    { text: 'Б\У', dataField: 'used', columntype: 'checkbox', filtercondition: 'STARTS_WITH', width: 50 },
                    { text: 'Серийные номера', datafield: 'SN', filtercondition: 'CONTAINS', width: 150},
                    { text: 'Номер требования', datafield: 'in_number', filtercondition: 'CONTAINS', width: 150},
                    { text: 'Дата требования', dataField: 'in_date', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 150 },
                ]
        }));
        
        $('#btnEditWHBuhActs').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#btnEditWHBuhActs').on('click', function(){
            $('#WHBuhActsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 600, width: 800, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('WHBuhActs/Update')) ?>,
                type: 'POST',
                async: false,
                data: {
                    docm_id: WHBuhActs.docm_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyWHBuhActsDialog").html(Res.html);
                    $('#WHBuhActsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#btnAddWHBuhActsEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnRefreshWHBuhActsEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnEditWHBuhActsEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnDelWHBuhActsEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#btnAddWHBuhActsEquips').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('WHBuhActs/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyWHBuhActsDialog").html(Res.html);
                    $('#WHBuhActsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#WHBuhActsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 350, width: 380, position: 'center'}));
        
        var CheckButton = function() {
            $('#btnDelWHBuhActsEquips').jqxButton({disabled: !(CurrentRowData != undefined)})
            $('#btnEditWHBuhActsEquips').jqxButton({disabled: !(CurrentRowData != undefined)})
        }
        
        $("#WHBuhActsGrid").on('rowselect', function (event) {
            CurrentRowData = $('#WHBuhActsGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
//            console.log(CurrentRowData.prlt_id);
        });
        
        $('#btnAddWHBuhActsEquips').on('click', function(){
            $('#WHBuhActsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 350, width: 380, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('PriceList/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyWHBuhActsDialog").html(Res.html);
                    $('#WHBuhActsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#btnEditWHBuhActsEquips').on('click', function(){
            $('#WHBuhActsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 350, width: 380, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('PriceList/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyWHBuhActsDialog").html(Res.html);
                    $('#WHBuhActsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnDelWHBuhActsEquips').on('click', function(){
//            console.log(CurrentRowData.prlt_id);
            
            if (CurrentRowData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('WHBuhActs/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        prlt_id: CurrentRowData.prlt_id
                    },
                    success: function(Res) {
                        $("#WHBuhActsGrid").jqxGrid('updatebounddata');
                        $('#WHBuhActsGrid').jqxGrid('selectrow', 0);
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshWHBuhActsEquips').on('click', function(){
            var RowIndex = $('#WHBuhActsGrid').jqxGrid('getselectedrowindex');
            var Val = $('#WHBuhActsGrid').jqxGrid('getcellvalue', RowIndex, "prlt_id");
            Aliton.SelectRowById('prlt_id', Val, '#WHBuhActsGrid', true);
        });
        
        
        
        $('#WHBuhActsGrid').jqxGrid('selectrow', 0);
        
      
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
    <div class="row-column">Основание: <input readonly type="text" id="rcrs_nameWHBA"></div>
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
        <div class="row-column"><div id="signed_ynWHBA"></div></div>
        <div class="row-column" style="margin-top: 2px;">Подписан</div>
        <div class="row-column"><input readonly type="text" id="FIO_WHBA"></div>
        <div class="row-column" style="margin-top: 2px;">Сумма: </div><div class="row-column"><div id="sumWHBA"></div></div>
    </div>

</div>

<div class="row" style="margin-top: 5px;">
    <div class="row-column"><input type="button" value="Изменить" id='btnEditWHBuhActs'/></div>
</div>   

<div class="row" style="margin: 0;">
    <div id="WHBuhActsGrid" class="jqxGridAliton"></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Добавить" id='btnAddWHBuhActsEquips'/></div>
    <div class="row-column"><input type="button" value="Изменить" id='btnEditWHBuhActsEquips'/></div>
    <div class="row-column"><input type="button" value="Обновить" id='btnRefreshWHBuhActsEquips'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Удалить" id='btnDelWHBuhActsEquips'/></div>
</div>   


<div id="WHBuhActsDialog" style="display: none;">
    <div id="WHBuhActsDialogHeader">
        <span id="WHBuhActsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogWHBuhActsContent">
        <div style="" id="BodyWHBuhActsDialog"></div>
    </div>
</div>