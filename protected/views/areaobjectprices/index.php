<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var AreaObjectPricesDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceAreaObjectPrices));

        $('#btnAddAreaObjectPrice').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditAreaObjectPrice').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnRefreshAreaObjectPrice').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelAreaObjectPrice').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#AreaObjectPricesDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '200px', width: '400', position: 'center'}));
        
        var CheckButton = function() {
            $('#btnEditAreaObjectPrice').jqxButton({disabled: !(CurrentRowData != undefined)})
            $('#btnDelAreaObjectPrice').jqxButton({disabled: !(CurrentRowData != undefined)})
        }
        
        $("#AreaObjectPricesGrid").on('rowselect', function (event) {
            CurrentRowData = $('#AreaObjectPricesGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
        });
        
        $("#AreaObjectPricesGrid").on('rowdoubleclick', function(){
            $('#btnEditAreaObjectPrice').click();
        });
        
        $("#AreaObjectPricesGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: 'calc(100% - 2px)',
                height: 'calc(100% - 2px)',
                source: AreaObjectPricesDataAdapter,
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
        
        $('#btnAddAreaObjectPrice').on('click', function(){
            $('#AreaObjectPricesDialog').jqxWindow({width: 400, height: 160, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('AreaObjectPrices/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyAreaObjectPricesDialog").html(Res.html);
                    $('#AreaObjectPricesDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnEditAreaObjectPrice').on('click', function(){
            if (CurrentRowData != undefined) {
                $('#AreaObjectPricesDialog').jqxWindow({width: 400, height: 160, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('AreaObjectPrices/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        AreaObjectPrice_id: CurrentRowData.AreaObjectPrice_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyAreaObjectPricesDialog").html(Res.html);
                        $('#AreaObjectPricesDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnDelAreaObjectPrice').on('click', function(){
            if (CurrentRowData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('AreaObjectPrices/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        AreaObjectPrice_id: CurrentRowData.AreaObjectPrice_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#AreaObjectPricesGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#AreaObjectPricesGrid').jqxGrid('getcelltext', RowIndex + 1, "AreaObjectPrice_id");
                            Aliton.SelectRowById('AreaObjectPrice_id', Text, '#AreaObjectPricesGrid', true);
                            RowIndex = $('#AreaObjectPricesGrid').jqxGrid('getselectedrowindex');
                            var S = $('#AreaObjectPricesGrid').jqxGrid('getrowdata', RowIndex);
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshAreaObjectPrice').on('click', function(){
            var RowIndex = $('#AreaObjectPricesGrid').jqxGrid('getselectedrowindex');
            var Val = $('#AreaObjectPricesGrid').jqxGrid('getcellvalue', RowIndex, "AreaObjectPrice_id");
            Aliton.SelectRowById('AreaObjectPrice_id', Val, '#AreaObjectPricesGrid', true);
        });
        
        $('#AreaObjectPricesGrid').jqxGrid('selectrow', 0);
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
    <div id="AreaObjectPricesGrid" class="jqxGridAliton"></div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Добавить" id='btnAddAreaObjectPrice'/></div>
    <div class="al-row-column"><input type="button" value="Изменить" id='btnEditAreaObjectPrice'/></div>
    <div class="al-row-column"><input type="button" value="Обновить" id='btnRefreshAreaObjectPrice'/></div>
    <div class="al-row-column" style="float: right; margin: 0px"><input type="button" value="Удалить" id='btnDelAreaObjectPrice'/></div>
</div>    

<div id="AreaObjectPricesDialog" style="display: none;">
    <div id="AreaObjectPricesDialogHeader">
        <span id="AreaObjectPricesHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogAreaObjectPricesContent">
        <div style="" id="BodyAreaObjectPricesDialog"></div>
    </div>
</div>