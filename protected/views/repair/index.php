<script>
    Repairs = {};
    Repairs.Repr_id = 0;
    $(document).ready(function () {
        var CurrentRowData;
        var First = true;
        var NextDocm_id = null;
        var SetStateButton = function() {
            $("#btnRefresh").jqxButton({disabled: false});
            $("#edFiltering").jqxButton({disabled: false});
            $('#btnAdd').jqxButton({disabled: false});
            $('#btnExport').jqxButton({disabled: false});
            
            var AcDate = '';
            if (CurrentRowData != undefined)
                AcDate = CurrentRowData.ac_date;
            
            $("#btnInfo").jqxButton({disabled: (CurrentRowData == undefined)});
            $('#btnDel').jqxButton({disabled: (CurrentRowData == undefined || AcDate != null)});
            $('#btnUndo').jqxButton({disabled: (CurrentRowData == undefined || AcDate == null)});
        };
        
        $("#RepairsGrid").on('rowselect', function (event) {
            CurrentRowData = $('#RepairsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (CurrentRowData != undefined) {
                $("#edMasterName").jqxInput('val', CurrentRowData.mstr_empl_name);
                $("#edEngineerName").jqxInput('val', CurrentRowData.egnr_empl_name);
                $("#edDefect").jqxTextArea('val', CurrentRowData.defect);
            }
            if (!First) SetStateButton();
        });
        
        $("#RepairsGrid").on('bindingcomplete', function(){
            var Repr_id;
            if (Repairs.Repr_id != 0)
                NextDocm_id = Repairs.Repr_id;
            
            if (CurrentRowData != undefined) {
                if (NextDocm_id != null) Repr_id = NextDocm_id; else Repr_id = CurrentRowData.Repr_id;
                Aliton.SelectRowByIdVirtual('Repr_id', Repr_id, '#RepairsGrid', false);
            }
            else {
                if (Repairs.Repr_id != 0)
                    Aliton.SelectRowByIdVirtual('Repr_id', Repairs.Repr_id, '#RepairsGrid', false);
                else
                    Aliton.SelectRowByIdVirtual('Repr_id', null, '#RepairsGrid', false);
            }
            
            First = false;
            NextDocm_id = null;
            Repairs.Repr_id = 0;
        });
        
        $('#RepairsGrid').on('rowdoubleclick', function (event) { 
            $('#btnInfo').click();
        });
        
        $("#RepairsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: 'calc(100% - 12px)',
                width: '100%',
                showfilterrow: false,
                autoshowfiltericon: true,
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                virtualmode: true,
                columns:
                    [
                        { text: 'Статус', datafield: 'status_name', width: 130},
                        { text: 'Номер', datafield: 'number', width: 130},
                        { text: 'Дата пол. оборуд.', filtertype: 'date', datafield: 'date', width: 110, cellsformat: 'dd.MM.yyyy'},
                        { text: 'Дата рег.', filtertype: 'date', datafield: 'date_create', width: 150, cellsformat: 'dd.MM.yyyy HH:mm'},
                        { text: 'Оборудование', datafield: 'EquipName', width: 150},
                        { text: 'Адрес', datafield: 'Addr', width: 150},
                        { text: 'Начало диагн.', filtertype: 'date', datafield: 'date_accept', width: 150, cellsformat: 'dd.MM.yyyy HH:mm'},
                        { text: 'Результат диагн.', datafield: 'resultname', width: 150},
                        { text: 'Приоритет', datafield: 'RepairPrior', width: 110},
                        { text: 'Предельная дата', filtertype: 'date', datafield: 'deadline', width: 130, cellsformat: 'dd.MM.yyyy HH:mm'},
                        { text: 'Пр-ка', datafield: 'overday', width: 80},
                        { text: 'Зарегистрировал', datafield: 'reg_empl_name', width: 110},
                        { text: 'Серийный номер', datafield: 'SN', width: 110},
                        { text: 'Возврат', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'Return', width: 80 },
                        { text: 'СРМ', datafield: 'NameSupplier', width: 110},
                        { text: 'План. дата', filtertype: 'date', datafield: 'DatePlan', width: 110, cellsformat: 'dd.MM.yyyy'},
                        { text: 'Мастер', datafield: 'mstr_empl_name', width: 110},
                        { text: 'Инженер', datafield: 'egnr_empl_name', width: 110},
                        { text: 'Гарантия', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'wrnt', width: 80 },
                        { text: 'Неисправность', datafield: 'defect', width: 110},
                        { text: 'Причина просрочки', datafield: 'delayreason', width: 110},
                        { text: 'Дата вып. ремонта', filtertype: 'date', datafield: 'date_ready', width: 110, cellsformat: 'dd.MM.yyyy'},
                        { text: 'Дата закрытия', filtertype: 'date', datafield: 'date_exec', width: 110, cellsformat: 'dd.MM.yyyy'},
                    ]
        }));
        
        $("#edMasterName").jqxInput($.extend(true, {}, {height: 25, width: 200, minLength: 1})); 
        $("#edEngineerName").jqxInput($.extend(true, {}, {height: 25, width: 200, minLength: 1})); 
        $('#edDefect').jqxTextArea({ height: 42, width: 'calc(100% - 2px)', minLength: 1 });
        $('#btnInfo').jqxButton({ width: 150, height: 30 });
        $('#btnRefresh').jqxButton({ width: 150, height: 30 });
        $('#btnAdd').jqxButton({ width: 120, height: 30 });
        $('#btnExport').jqxButton({ width: 120, height: 30 });
        $('#btnDel').jqxButton({ width: 150, height: 30 });
        $('#btnUndo').jqxButton({ width: 150, height: 30 });
        $('#btnExport').jqxButton({ width: 150, height: 30 });
        
        $('#btnExport').on('click', function() {
                $("#RepairsGrid").jqxGrid('exportdata', 'xls', 'Ремонт', true, null, true, <?php echo json_encode(Yii::app()->createUrl('Reports/UpLoadFileGrid'))?>);
            });
        
        $('#btnRefresh').on('click', function(){
           $('#edFiltering').click(); 
        });
        $('#btnUndo').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('WhActs/Undo')) ?>,
                type: 'POST',
                async: false,
                data: {
                    Repr_id: CurrentRowData.Repr_id,
                    Achs_id: CurrentRowData.achs_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    if (Res.result === 1) {
                        $("#btnRefresh").click();
                    }
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        $('#btnDel').on('click', function(){
            var Idx = $('#RepairsGrid').jqxGrid('selectedrowindex');
            NextDocm_id = $('#RepairsGrid').jqxGrid('getcellvalue', (Idx + 1), 'Repr_id');
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('WhActs/Delete')) ?>,
                type: 'POST',
                async: false,
                data: {
                    Repr_id: CurrentRowData.Repr_id,
                    Achs_id: CurrentRowData.achs_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    if (Res.result === 1) {
                        $("#btnRefresh").click();
                    }
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        $('#btnInfo').on('click', function() {
            var url = <?php echo json_encode(Yii::app()->createUrl('Repair/View')); ?>;
            if (CurrentRowData != undefined) 
                window.open(url + '&Repr_id=' + CurrentRowData.Repr_id);
                
        });
        
        $('#btnAdd').on('click', function() {
            if ($('#btnAdd').jqxButton('disabled')) return;
            $('#RepairsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 640, width: 780, position: 'center' }));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Repair/Create')) ?>,
                type: 'POST',
                async: false,
                data: {
                    Repr_id: CurrentRowData.Repr_id,
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyRepairsDialog").html(Res.html);
                    $('#RepairsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
    });
</script>

<div id="GridContainer" style="float: left; width: 100%; height: calc(100% - 178px)">
    <div id="RepairsGrid"></div>
</div>    
<div style="clear: both;"></div>
<div style="float: left; width: 100%; height: 172px; overflow: hidden;">
    <div style="float: left; width: 100%; height: 30px">
        <div class="al-row-column">Мастер</div>
        <div class="al-row-column"><input type="text" id="edMasterName" /></div>
        <div class="al-row-column">Инженер ПРЦ</div>
        <div class="al-row-column"><input type="text" id="edEngineerName" /></div>
    </div>
    <div style="clear: both;"></div>
    <div style="float: left; width: 100%; height: 70px">
        <div>Неисправность</div>
        <div style="clear: both;"></div>
        <div><textarea id="edDefect"></textarea></div>
    </div>
    <div style="clear: both;"></div>
    <div style="float: left; height: 72px">
        <div style="float: left">
            <div style="height: 36px">
                <div style="float: left; margin-right: 6px;"><input type="button" id="btnInfo" value="Дополнительно"/></div>
                <div style="float: left"><input type="button" id="btnAdd" value="Создать"/></div>
            </div>
            <div style="clear: both;"></div>
            <div style="height: 36px">
                <div style="float: left; margin-right: 6px;"><input type="button" id="btnRefresh" value="Обновить"/></div>
                <div style="float: left"><input type="button" id="btnExport" value="Экспорт"/></div>
                
            </div>
        </div>    
    </div>
    <div style="float: right; height: 72px">
        <div style="float: left">
            <div style="height: 36px">
                <div style="float: left;"><input type="button" id="btnDel" value="Удалить"/></div>
            </div>
            <div style="clear: both;"></div>
            <div style="height: 36px">
                <div style="float: left;"><input type="button" id="btnUndo" value="Отменить подтв."/></div>
            </div>
        </div>    
    </div>
</div>
<div id="RepairsDialog" style="display: none;">
    <div id="RepairsDialogHeader">
        <span id="WHDocumentsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogWHDocumentsContent">
        <div style="" id="BodyRepairsDialog"></div>
    </div>
</div>





