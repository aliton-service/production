<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var AreaPricesDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceAreaPrices));

        $('#btnAddAreaPrice').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditAreaPrice').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnRefreshAreaPrice').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelAreaPrice').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#AreaPricesDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '200px', width: '400', position: 'center'}));
        
        var CheckButton = function() {
            $('#btnEditAreaPrice').jqxButton({disabled: !(CurrentRowData != undefined)})
            $('#btnDelAreaPrice').jqxButton({disabled: !(CurrentRowData != undefined)})
        }
        
        $("#AreaPricesGrid").on('rowselect', function (event) {
            CurrentRowData = $('#AreaPricesGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
        });
        
        $("#AreaPricesGrid").on('rowdoubleclick', function(){
            $('#btnEditAreaPrice').click();
        });
        
        $("#AreaPricesGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: 'calc(100% - 2px)',
                height: 'calc(100% - 2px)',
                source: AreaPricesDataAdapter,
                columns: [
                    { text: 'От', datafield: 'StartArea', columngroup: 'Area', filtercondition: 'CONTAINS', width: 100},
                    { text: 'До', datafield: 'EndArea', columngroup: 'Area', filtercondition: 'CONTAINS', width: 100},    
                    { text: 'Цена', datafield: 'Price', columngroup: 'Price', filtercondition: 'CONTAINS', width: 130},    
                ],
                columngroups: [
                    { text: 'Площаль', align: 'center', name: 'Area' },
                    { text: '', align: 'center', name: 'Price' },
                ]

        }));
        
        $('#btnAddAreaPrice').on('click', function(){
            $('#AreaPricesDialog').jqxWindow({width: 400, height: 160, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('AreaPrices/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyAreaPricesDialog").html(Res.html);
                    $('#AreaPricesDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnEditAreaPrice').on('click', function(){
            if (CurrentRowData != undefined) {
                $('#AreaPricesDialog').jqxWindow({width: 400, height: 160, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('AreaPrices/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        AreaPrice_id: CurrentRowData.AreaPrice_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyAreaPricesDialog").html(Res.html);
                        $('#AreaPricesDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnDelAreaPrice').on('click', function(){
            if (CurrentRowData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('AreaPrices/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        AreaPrice_id: CurrentRowData.AreaPrice_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#AreaPricesGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#AreaPricesGrid').jqxGrid('getcelltext', RowIndex + 1, "AreaPrice_id");
                            Aliton.SelectRowById('AreaPrice_id', Text, '#AreaPricesGrid', true);
                            RowIndex = $('#AreaPricesGrid').jqxGrid('getselectedrowindex');
                            var S = $('#AreaPricesGrid').jqxGrid('getrowdata', RowIndex);
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshAreaPrice').on('click', function(){
            var RowIndex = $('#AreaPricesGrid').jqxGrid('getselectedrowindex');
            var Val = $('#AreaPricesGrid').jqxGrid('getcellvalue', RowIndex, "AreaPrice_id");
            Aliton.SelectRowById('AreaPrice_id', Val, '#AreaPricesGrid', true);
        });
        
        $('#AreaPricesGrid').jqxGrid('selectrow', 0);
    });
</script>

<?php $this->setPageTitle('Должности'); ?>

<?php
    $this->breadcrumbs=array(
            'Кадры'=>array('/Employees/index'),
            'Подразделения'=>array('index'),
    );
?>


<div class="al-row" style="height: calc(100% - 58px); width: 100%">
    <div id="AreaPricesGrid" class="jqxGridAliton"></div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Добавить" id='btnAddAreaPrice'/></div>
    <div class="al-row-column"><input type="button" value="Изменить" id='btnEditAreaPrice'/></div>
    <div class="al-row-column"><input type="button" value="Обновить" id='btnRefreshAreaPrice'/></div>
    <div class="al-row-column" style="float: right; margin: 0px"><input type="button" value="Удалить" id='btnDelAreaPrice'/></div>
</div>    

<div id="AreaPricesDialog" style="display: none;">
    <div id="AreaPricesDialogHeader">
        <span id="AreaPricesHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogAreaPricesContent">
        <div style="" id="BodyAreaPricesDialog"></div>
    </div>
</div>