<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var InventoriesDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceInventories));

        $('#btnAddInventory').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnEditInventory').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnRefreshInventory').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnPrintInventory').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnAcceptInventory').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnEditTime').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 180}));
        $('#btnDelInventory').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#InventoriesDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 320, width: 310, position: 'center'}));
        $('#EditTimeDialog').on('open', function() {
            var D = new Date(CurrentRowData.date);
            var Min = new Date(D.getFullYear(), D.getMonth(), D.getDate(), 0, 0);
            var Max = new Date(Min.getFullYear(), Min.getMonth(), Min.getDate(), 23, 59);
            
            $("#edTime").jqxDateTimeInput({value: D, min: Min, max: Max});
        });
        $('#EditTimeDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 180, width: 310, position: 'center', initContent: function() {
                $("#edTime").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CurrentRowData.date, formatString: 'dd.MM.yyyy HH:mm', showCalendarButton: false, showTimeButton: true, width: 180}));
                $('#btnTimeSave').jqxButton($.extend(true, {}, ButtonDefaultSettings));
                $('#btnTimeCancel').jqxButton($.extend(true, {}, ButtonDefaultSettings));
                
                $('#btnTimeCancel').on('click', function() {
                    $('#EditTimeDialog').jqxWindow('close');
                });
                
                $('#btnTimeSave').on('click', function(){
                    $.ajax({
                        url: <?php echo json_encode(Yii::app()->createUrl('Inventories/ChangeTime')) ?>,
                        type: 'POST',
                        async: false,
                        data: {
                            Inventories: {
                                Invn_id: CurrentRowData.invn_id,
                                Date: $("#edTime").val(),
                            }
                        },
                        success: function(Res) {
                            Res = JSON.parse(Res);
                            if (Res.result == 1) {
                                $('#btnRefreshInventory').click();
                                $('#btnTimeCancel').click();
                            }
                            else
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                            
                            
                        },
                        error: function(Res) {
                            Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                        }
                    });
                });
            }
        }));
        
        $('#btnEditTime').on('click', function() {
            $('#EditTimeDialog').jqxWindow('open');
        });
        
        
        var CheckButton = function() {
            $('#btnEditInventory').jqxButton({disabled: !(CurrentRowData != undefined)})
            $('#btnDelInventory').jqxButton({disabled: !(CurrentRowData != undefined)})
        }
        
        $("#InventoriesGrid").on('rowselect', function (event) {
            CurrentRowData = $('#InventoriesGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
        });
        
        
        $("#InventoriesGrid").on('rowdoubleclick', function(){
            $('#btnEditInventory').click();
        });
        
        $("#InventoriesGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: 'calc(100% - 2px)',
                height: 'calc(100% - 2px)',
                source: InventoriesDataAdapter,
                columns: [
                    { text: 'Склад', datafield: 'storage', filtercondition: 'CONTAINS', width: 150},
                    { text: 'Дата', dataField: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'Принято', dataField: 'closed', columntype: 'checkbox', filtercondition: 'STARTS_WITH', width: 80 },
                ]

        }));
        
        $('#btnAddInventory').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Inventories/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyInventoriesDialog").html(Res.html);
                    $('#InventoriesDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#btnAcceptInventory').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Inventories/Accept')) ?>,
                type: 'POST',
                async: false,
                data: {
                    invn_id: CurrentRowData.invn_id
                },
                success: function(Res) {
                    $("#InventoriesGrid").jqxGrid('updatebounddata');
                    $("#InventoriesGrid").jqxGrid('selectrow', 0);
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        
        $('#btnEditInventory').on('click', function(){
            var invDate = CurrentRowData.date
            var invDateStr = ('0' + invDate.getDate()).slice(-2) + '.' + ('0' + (invDate.getMonth() + 1)).slice(-2) + '.' + invDate.getFullYear() 

            window.open('/index.php?r=InventoryDetails/Index&invn_id=' + CurrentRowData.invn_id + '&date=' + invDateStr);
        });
        
        $('#btnDelInventory').on('click', function(){
            if (CurrentRowData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Inventories/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        invn_id: CurrentRowData.invn_id
                    },
                    success: function(Res) {
                        $("#InventoriesGrid").jqxGrid('updatebounddata');
                        $('#InventoriesGrid').jqxGrid('selectrow', 0);
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshInventory').on('click', function(){
            var RowIndex = $('#InventoriesGrid').jqxGrid('getselectedrowindex');
            var Val = $('#InventoriesGrid').jqxGrid('getcellvalue', RowIndex, "invn_id");
            Aliton.SelectRowById('invn_id', Val, '#InventoriesGrid', true);
        });
        
        $('#btnPrintInventory').on('click', function(){
            var invDate = CurrentRowData.date;
            var invDateStr = ('0' + invDate.getDate()).slice(-2) + '.' + ('0' + (invDate.getMonth() + 1)).slice(-2) + '.' + invDate.getFullYear();
            window.open(<?php echo json_encode(Yii::app()->createUrl('Reports/ReportOpen', array(
                'ReportName' => '/Склад/Остатки на складе',
                'Ajax' => false,
                'Render' => true,
            ))); ?> + '&Parameters[prmDate]=' + invDateStr);
        });
        
        $('#InventoriesGrid').jqxGrid('selectrow', 0);
        
      
    });
</script>

<?php $this->setPageTitle('Реестр остатков на складе'); ?>

<?php
    $this->breadcrumbs=array(
        'Склад'=>array('#'),
        'Реестр остатков на складе'=>array('index'),
    );
?>


<div class="al-row" style="height: calc(100% - 84px)">
    <div id="InventoriesGrid" class="jqxGridAliton"></div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Рассчитать" id='btnAddInventory'/></div>
    <div class="al-row-column"><input type="button" value="Просмотр" id='btnEditInventory'/></div>
    <div class="al-row-column"><input type="button" value="Принять" id='btnAcceptInventory'/></div>
    <div class="al-row-column"><input type="button" value="Изменить время расчета" id='btnEditTime'/></div>
    <div style="clear: both"></div>
</div>    
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Удалить" id='btnDelInventory'/></div>
    <div class="al-row-column"><input type="button" value="Обновить" id='btnRefreshInventory'/></div>
    <div class="al-row-column"><input type="button" value="Печатать" id='btnPrintInventory'/></div>
    <div style="clear: both"></div>
</div>   


<div id="InventoriesDialog" style="display: none;">
    <div id="InventoriesDialogHeader">
        <span id="InventoriesHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogInventoriesContent">
        <div style="" id="BodyInventoriesDialog"></div>
    </div>
</div>


<div id="EditTimeDialog" style="display: none;">
    <div id="EditTimeDialogHeader">
        <span id="EditTimeHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogEditTimeContent">
        <div style="" id="BodyEditTimeDialog">
            <div class="al-row">Выберите время</div>
            <div class="al-row"><div id="edTime"></div></div>
            <div class="al-row">
                <div class="al-row-column"><input type="button" id="btnTimeSave" value="Сохранить"/></div>
                <div class="al-row-column"><input type="button" id="btnTimeCancel" value="Отмена"/></div>
            </div>
        </div>
    </div>
</div>