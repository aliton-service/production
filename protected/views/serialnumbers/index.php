<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowDataSNSN;
        var Dadt_id = <?php echo json_encode($dadt_id); ?>;
        
        var SerialNumbersDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceSerialNumbers), {
            formatData: function (data) {
                        $.extend(data, {
                            Filters: ["s.dadt_id = " + Dadt_id]
                        });
                        return data;
                    },
        });

        $('#btnAddSerialNumber').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditSerialNumber').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnRefreshSerialNumber').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelSerialNumber').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#SerialNumbersDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '200px', width: '400', position: 'center'}));
        $('#btnCloseSerialNumber').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        var CheckButton = function() {
            $('#btnEditSerialNumber').jqxButton({disabled: !(CurrentRowDataSN != undefined)})
            $('#btnDelSerialNumber').jqxButton({disabled: !(CurrentRowDataSN != undefined)})
        }
        
        $("#SerialNumbersGrid").on('rowselect', function (event) {
            CurrentRowDataSN = $('#SerialNumbersGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
        });
        
        $("#SerialNumbersGrid").on('rowdoubleclick', function(){
            $('#btnEditSerialNumber').click();
        });
        
        $("#SerialNumbersGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: '100%',
                height: '300',
                source: SerialNumbersDataAdapter,
                columns: [
                    { text: 'Серийный номер', datafield: 'SN', filtercondition: 'CONTAINS', width: 320},    
                ]

        }));
        
        $('#btnCloseSerialNumber').on('click', function(){
            $('#btnRefreshDetails').click();
            $('#WHDocumentsDialog').jqxWindow('close');
            
        });
        
        $('#btnAddSerialNumber').on('click', function(){
            $('#SerialNumbersDialog').jqxWindow({width: 400, height: 160, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('SerialNumbers/Create')) ?>,
                type: 'POST',
                data: {dadt_id: Dadt_id},
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodySerialNumbersDialog").html(Res.html);
                    $('#SerialNumbersDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnEditSerialNumber').on('click', function(){
            if (CurrentRowDataSN != undefined) {
                $('#SerialNumbersDialog').jqxWindow({width: 400, height: 160, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('SerialNumbers/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        srnm_id: CurrentRowDataSN.srnm_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodySerialNumbersDialog").html(Res.html);
                        $('#SerialNumbersDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnDelSerialNumber').on('click', function(){
            if (CurrentRowDataSN != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('SerialNumbers/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        srnm_id: CurrentRowDataSN.srnm_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#SerialNumbersGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#SerialNumbersGrid').jqxGrid('getcelltext', RowIndex + 1, "srnm_id");
                            Aliton.SelectRowById('srnm_id', Text, '#SerialNumbersGrid', true);
                            RowIndex = $('#SerialNumbersGrid').jqxGrid('getselectedrowindex');
                            var S = $('#SerialNumbersGrid').jqxGrid('getrowdata', RowIndex);
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshSerialNumber').on('click', function(){
            var RowIndex = $('#SerialNumbersGrid').jqxGrid('getselectedrowindex');
            var Val = $('#SerialNumbersGrid').jqxGrid('getcellvalue', RowIndex, "srnm_id");
            Aliton.SelectRowById('srnm_id', Val, '#SerialNumbersGrid', true);
        });
        
        $('#SerialNumbersGrid').jqxGrid('selectrow', 0);
    });
</script>

<div class="row">
    <div id="SerialNumbersGrid" class="jqxGridAliton"></div>
</div>
<div class="row" style="margin: 0px; padding: 0px;">
    <div style="float: left">
        <div class="row">
            <div class="row-column"><input type="button" value="Добавить" id='btnAddSerialNumber'/></div>
            <div class="row-column"><input type="button" value="Изменить" id='btnEditSerialNumber'/></div>
        </div>
        <div class="row">
            <div class="row-column" style=""><input type="button" value="Удалить" id='btnDelSerialNumber'/></div>
            <div class="row-column"><input type="button" value="Обновить" id='btnRefreshSerialNumber'/></div>
        </div>
    </div>
    <div style="float: right">
        <div class="row-column" style=""><input type="button" value="Закрыть" id='btnCloseSerialNumber'/></div>
    </div> 
    
    
</div>    

<div id="SerialNumbersDialog" style="display: none;">
    <div id="SerialNumbersDialogHeader">
        <span id="SerialNumbersHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogSerialNumbersContent">
        <div style="" id="BodySerialNumbersDialog"></div>
    </div>
</div>

