<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var InventoriesDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceInventories));

        $('#btnAddInventory').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditInventory').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnRefreshInventory').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnPrintInventory').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnAcceptInventory').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelInventory').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#InventoriesDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 320, width: 310, position: 'center'}));
        
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
                width: '100%',
                height: '500',
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
            var invDate = CurrentRowData.date
            var invDateStr = ('0' + invDate.getDate()).slice(-2) + '.' + ('0' + (invDate.getMonth() + 1)).slice(-2) + '.' + invDate.getFullYear() 
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


<div class="row">
    <div id="InventoriesGrid" class="jqxGridAliton"></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Рассчитать" id='btnAddInventory'/></div>
    <div class="row-column"><input type="button" value="Просмотр" id='btnEditInventory'/></div>
    <div class="row-column"><input type="button" value="Принять" id='btnAcceptInventory'/></div>
</div>    
<div class="row">
    <div class="row-column"><input type="button" value="Удалить" id='btnDelInventory'/></div>
    <div class="row-column"><input type="button" value="Обновить" id='btnRefreshInventory'/></div>
    <div class="row-column"><input type="button" value="Печатать" id='btnPrintInventory'/></div>
</div>   


<div id="InventoriesDialog" style="display: none;">
    <div id="InventoriesDialogHeader">
        <span id="InventoriesHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogInventoriesContent">
        <div style="" id="BodyInventoriesDialog"></div>
    </div>
</div>