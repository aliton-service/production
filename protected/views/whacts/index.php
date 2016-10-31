<script>
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
        
        $("#ActsGrid").on('rowselect', function (event) {
            CurrentRowData = $('#ActsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (CurrentRowData != undefined) {
                $("#edWorkList").jqxTextArea('val', CurrentRowData.work_list);
                $("#edNote").jqxTextArea('val', CurrentRowData.note);
            }
            if (!First) SetStateButton();
        });
        
        $("#ActsGrid").on('bindingcomplete', function(){
            var Docm_id;
            if (CurrentRowData != undefined) {
                if (NextDocm_id != null) Docm_id = NextDocm_id; else Docm_id = CurrentRowData.docm_id;
                Aliton.SelectRowByIdVirtual('docm_id', Docm_id, '#ActsGrid', false);
            }
            else
                Aliton.SelectRowByIdVirtual('docm_id', null, '#ActsGrid', false);
            
            First = false;
            NextDocm_id = null;
        });
        
        $("#ActsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: 'calc(100% - 12px)',
                width: '100%',
                showfilterrow: false,
                autoshowfiltericon: true,
                //source: WHActsForReestrAdapter,
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                virtualmode: true,
                columns:
                    [
                        { text: 'Дата работ', filtertype: 'date', datafield: 'date', width: 150, cellsformat: 'dd.MM.yyyy HH:mm'},
                        { text: 'Исполнитель', datafield: 'master', width: 130},
                        { text: 'Адрес', datafield: 'Address', width: 200},
                        { text: 'Дата оплаты', filtertype: 'date', datafield: 'date_payment', width: 120, cellsformat: 'dd.MM.yyyy'},
                        { text: 'Сумма по акту', datafield: 'sum', width: 110, cellsformat: 'f2'},
                        { text: 'Подписан', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'signed_yn', width: 80 },
                        { text: 'Подтвержден', filtertype: 'date', datafield: 'ac_date', width: 150, cellsformat: 'dd.MM.yyyy HH:mm'},
                        { text: 'Клиент', datafield: 'cstn_name', width: 150},
                        { text: 'Дата отмены', filtertype: 'date', datafield: 'c_date', width: 150, cellsformat: 'dd.MM.yyyy HH:mm'},
                        { text: 'Отменил', datafield: 'c_name', width: 130},
                        { text: 'Основание', datafield: 'c_confirmname', width: 150},
                        { text: 'Дата рег.', filtertype: 'date', datafield: 'date_create', width: 150, cellsformat: 'dd.MM.yyyy HH:mm'},
                        { text: 'Создал', datafield: 'user_create', width: 150},
                    ]
        }));
        
        $('#edWorkList').jqxTextArea({ height: 42, width: 'calc(100% - 2px)', minLength: 1 });
        $('#edNote').jqxTextArea({ height: 42, width: 'calc(100% - 2px)', minLength: 1 });
        $('#btnInfo').jqxButton({ width: 150, height: 30 });
        $('#btnRefresh').jqxButton({ width: 150, height: 30 });
        $('#btnAdd').jqxButton({ width: 120, height: 30 });
        $('#btnExport').jqxButton({ width: 120, height: 30 });
        $('#btnDel').jqxButton({ width: 150, height: 30 });
        $('#btnUndo').jqxButton({ width: 150, height: 30 });
        
        $('#btnRefresh').on('click', function(){
           $('#edFiltering').click(); 
        });
        $('#btnUndo').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('WhActs/Undo')) ?>,
                type: 'POST',
                async: false,
                data: {
                    Docm_id: CurrentRowData.docm_id,
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
            var Idx = $('#ActsGrid').jqxGrid('selectedrowindex');
            NextDocm_id = $('#ActsGrid').jqxGrid('getcellvalue', (Idx + 1), 'docm_id');
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('WhActs/Delete')) ?>,
                type: 'POST',
                async: false,
                data: {
                    Docm_id: CurrentRowData.docm_id,
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
            var url = <?php echo json_encode(Yii::app()->createUrl('WHActs/View')); ?>;
            if (CurrentRowData != undefined) 
                window.open(url + '&docm_id=' + CurrentRowData.docm_id);
                
        });
    });
</script>

<div id="GridContainer" style="float: left; width: 100%; height: calc(100% - 200px)">
    <div id="ActsGrid"></div>
</div>    
<div style="clear: both;"></div>
<div style="float: left; width: 100%; height: 200px; overflow: hidden;">
    <div style="float: left; width: 100%; height: 64px">
        <div>Перечень работ</div>
        <div style="clear: both;"></div>
        <div><textarea id="edWorkList"></textarea></div>
    </div>
    <div style="clear: both;"></div>
    <div style="float: left; width: 100%; height: 64px">
        <div>Примечание</div>
        <div style="clear: both;"></div>
        <div><textarea id="edNote"></textarea></div>
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



