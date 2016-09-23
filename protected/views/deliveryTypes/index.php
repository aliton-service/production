<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var DeliveryTypesDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDeliveryTypes));

        $('#btnAddDeliveryType').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditDeliveryType').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnRefreshDeliveryType').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelDeliveryType').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#DeliveryTypesDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '200px', width: '400', position: 'center'}));
        
        var CheckButton = function() {
            $('#btnEditDeliveryType').jqxButton({disabled: !(CurrentRowData != undefined)})
            $('#btnDelDeliveryType').jqxButton({disabled: !(CurrentRowData != undefined)})
        }
        
        $("#DeliveryTypesGrid").on('rowselect', function (event) {
            CurrentRowData = $('#DeliveryTypesGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
        });
        
        $("#DeliveryTypesGrid").on('rowdoubleclick', function(){
            $('#btnEditDeliveryType').click();
        });
        
        $("#DeliveryTypesGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: '100%',
                height: '300',
                source: DeliveryTypesDataAdapter,
                columns: [
                    { text: 'Вид доставки', datafield: 'DeliveryType', filtercondition: 'CONTAINS', width: 320},    
                ]

        }));
        
        $('#btnAddDeliveryType').on('click', function(){
            $('#DeliveryTypesDialog').jqxWindow({width: 400, height: 160, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('DeliveryTypes/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyDeliveryTypesDialog").html(Res.html);
                    $('#DeliveryTypesDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnEditDeliveryType').on('click', function(){
            if (CurrentRowData != undefined) {
                $('#DeliveryTypesDialog').jqxWindow({width: 400, height: 160, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('DeliveryTypes/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        dltp_id: CurrentRowData.dltp_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyDeliveryTypesDialog").html(Res.html);
                        $('#DeliveryTypesDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnDelDeliveryType').on('click', function(){
            if (CurrentRowData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('DeliveryTypes/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        dltp_id: CurrentRowData.dltp_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#DeliveryTypesGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#DeliveryTypesGrid').jqxGrid('getcelltext', RowIndex + 1, "dltp_id");
                            Aliton.SelectRowById('dltp_id', Text, '#DeliveryTypesGrid', true);
                            RowIndex = $('#DeliveryTypesGrid').jqxGrid('getselectedrowindex');
                            var S = $('#DeliveryTypesGrid').jqxGrid('getrowdata', RowIndex);
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshDeliveryType').on('click', function(){
            var RowIndex = $('#DeliveryTypesGrid').jqxGrid('getselectedrowindex');
            var Val = $('#DeliveryTypesGrid').jqxGrid('getcellvalue', RowIndex, "dltp_id");
            Aliton.SelectRowById('dltp_id', Val, '#DeliveryTypesGrid', true);
        });
        
        $('#DeliveryTypesGrid').jqxGrid('selectrow', 0);
    });
</script>

<?php $this->setPageTitle('Виды доставок'); ?>

<?php
    $this->breadcrumbs=array(
        'Заявки на доставку'=>array('#'),
        'Виды доставок'=>array('index'),
    );
?>


<div class="row">
    <div id="DeliveryTypesGrid" class="jqxGridAliton"></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Добавить" id='btnAddDeliveryType'/></div>
    <div class="row-column"><input type="button" value="Изменить" id='btnEditDeliveryType'/></div>
    <div class="row-column"><input type="button" value="Обновить" id='btnRefreshDeliveryType'/></div>
    <div class="row-column" style="float: right; margin: 0px"><input type="button" value="Удалить" id='btnDelDeliveryType'/></div>
</div>    

<div id="DeliveryTypesDialog" style="display: none;">
    <div id="DeliveryTypesDialogHeader">
        <span id="DeliveryTypesHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogDeliveryTypesContent">
        <div style="" id="BodyDeliveryTypesDialog"></div>
    </div>
</div>