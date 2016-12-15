<script type="text/javascript">
    var Indt_id = 0;
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var InventoryDetails = {
            invn_id: '<?php echo $invn_id; ?>',
        };

        var InventoryDetailsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceInventoryDetails, {async: true}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["id.invn_id = " + InventoryDetails.invn_id],
                });
                return data;
            },
        });
        

        $('#btnEditInventoryDetails').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnPrintInventoryDetails').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnRefreshInventoryDetails').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#InventoryDetailsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '200px', width: '400', position: 'center'}));
        
        var CheckButton = function() {
            $('#btnEditInventoryDetails').jqxButton({disabled: !(CurrentRowData != undefined)})
        }
        
        $("#InventoryDetailsGrid").on('rowselect', function (event) {
            CurrentRowData = $('#InventoryDetailsGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
        });
        
        $("#InventoryDetailsGrid").on('rowdoubleclick', function(){
            $('#btnEditInventoryDetails').click();
        });
        
        $("#InventoryDetailsGrid").on("bindingcomplete", function (event) {
            if (Indt_id > 0) {
                Aliton.SelectRowByIdVirtual('indt_id', Indt_id, '#InventoryDetailsGrid', false);
                Indt_id = 0;
            }
        });
        
        $("#InventoryDetailsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: 'calc(100% - 2px)',
                height: 'calc(100% - 2px)',
                source: InventoryDetailsDataAdapter,
                columns: [
                    { text: 'Оборудование', datafield: 'EquipName', filtercondition: 'CONTAINS', width: 300},
                    { text: 'Ед.изм.', datafield: 'NameUnitMeasurement', filtercondition: 'CONTAINS', width: 100},
                    { text: 'Кол-во нового', datafield: 'quant', filtercondition: 'CONTAINS', width: 120},
                    { text: 'Кол-во Б/У', datafield: 'quant_used', filtercondition: 'CONTAINS', width: 120},
                ]

        }));
        
        $('#btnEditInventoryDetails').on('click', function(){
            $('#InventoryDetailsDialog').jqxWindow({width: 320, height: 250, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('InventoryDetails/Update')) ?>,
                type: 'POST',
                async: false,
                data: {
                    indt_id: CurrentRowData.indt_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyInventoryDetailsDialog").html(Res.html);
                    $('#InventoryDetailsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#btnRefreshInventoryDetails').on('click', function(){
            var RowIndex = $('#InventoryDetailsGrid').jqxGrid('getselectedrowindex');
            var Val = $('#InventoryDetailsGrid').jqxGrid('getcellvalue', RowIndex, "invn_id");
            Aliton.SelectRowById('invn_id', Val, '#InventoryDetailsGrid', true);
        });
        
        $('#InventoryDetailsGrid').jqxGrid('selectrow', 0);
    });
</script>

<?php $this->setPageTitle('Остатки на складе'); ?>

<?php
    $this->breadcrumbs=array(
        'Склад'=>array('#'),
        'Остатки на складе'=>array('index'),
    );
?>


<div class="al-row" style="height: calc(100% - 46px)">
    <div id="InventoryDetailsGrid" class="jqxGridAliton"></div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Изменить" id='btnEditInventoryDetails'/></div>
    <div class="al-row-column"><input type="button" value="Обновить" id='btnRefreshInventoryDetails'/></div>
    <div class="al-row-column"><input type="button" value="Печатать" id='btnPrintInventoryDetails'/></div>
    <div style="clear: both"></div>
</div>    

<div id="InventoryDetailsDialog" style="display: none;">
    <div id="InventoryDetailsDialogHeader">
        <span id="InventoryDetailsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogInventoryDetailsContent">
        <div style="" id="BodyInventoryDetailsDialog"></div>
    </div>
</div>