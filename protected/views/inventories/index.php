<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var InventoriesDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceInventories));

        $('#btnAddMalfunction').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditMalfunction').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnRefreshMalfunction').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelMalfunction').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#InventoriesDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '200px', width: '400', position: 'center'}));
        
        var CheckButton = function() {
            $('#btnEditMalfunction').jqxButton({disabled: !(CurrentRowData != undefined)})
            $('#btnDelMalfunction').jqxButton({disabled: !(CurrentRowData != undefined)})
        }
        
        $("#InventoriesGrid").on('rowselect', function (event) {
            CurrentRowData = $('#InventoriesGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
        });
        
        $("#InventoriesGrid").on('rowdoubleclick', function(){
            $('#btnEditMalfunction').click();
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
        
        $('#btnAddMalfunction').on('click', function(){
            $('#InventoriesDialog').jqxWindow({width: 400, height: 160, position: 'center'});
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

        $('#btnEditMalfunction').on('click', function(){
            if (CurrentRowData != undefined) {
                $('#InventoriesDialog').jqxWindow({width: 400, height: 160, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Inventories/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Malfunction_id: CurrentRowData.Malfunction_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyInventoriesDialog").html(Res.html);
                        $('#InventoriesDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnDelMalfunction').on('click', function(){
            if (CurrentRowData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Inventories/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Malfunction_id: CurrentRowData.Malfunction_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#InventoriesGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#InventoriesGrid').jqxGrid('getcelltext', RowIndex + 1, "Malfunction_id");
                            Aliton.SelectRowById('Malfunction_id', Text, '#InventoriesGrid', true);
                            RowIndex = $('#InventoriesGrid').jqxGrid('getselectedrowindex');
                            var S = $('#InventoriesGrid').jqxGrid('getrowdata', RowIndex);
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshMalfunction').on('click', function(){
            var RowIndex = $('#InventoriesGrid').jqxGrid('getselectedrowindex');
            var Val = $('#InventoriesGrid').jqxGrid('getcellvalue', RowIndex, "Malfunction_id");
            Aliton.SelectRowById('Malfunction_id', Val, '#InventoriesGrid', true);
        });
        
        $('#InventoriesGrid').jqxGrid('selectrow', 0);
    });
</script>

<?php $this->setPageTitle('Неисправность'); ?>

<?php
    $this->breadcrumbs=array(
        'Склад'=>array('#'),
        'Реестр остатков по складу'=>array('index'),
    );
?>


<div class="row">
    <div id="InventoriesGrid" class="jqxGridAliton"></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Рассчитать" id='btnAddMalfunction'/></div>
    <div class="row-column"><input type="button" value="Просмотр" id='btnEditMalfunction'/></div>
</div>    
<div class="row">
    <div class="row-column"><input type="button" value="Удалить" id='btnDelMalfunction'/></div>
    <div class="row-column"><input type="button" value="Обновить" id='btnRefreshMalfunction'/></div>
</div>    

<div id="InventoriesDialog" style="display: none;">
    <div id="InventoriesDialogHeader">
        <span id="InventoriesHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogInventoriesContent">
        <div style="" id="BodyInventoriesDialog"></div>
    </div>
</div>