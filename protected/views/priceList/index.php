<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var PriceListDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourcePriceList));

        $('#btnAddPriceList').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnRefreshPriceList').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnPrintPriceList').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnDelPriceList').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#PriceListDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 350, width: 380, position: 'center'}));
        
        var CheckButton = function() {
            $('#btnDelPriceList').jqxButton({disabled: !(CurrentRowData != undefined)})
        }
        
        $("#PriceListGrid").on('rowselect', function (event) {
            CurrentRowData = $('#PriceListGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
            console.log(CurrentRowData.prlt_id);
        });
        
        $("#PriceListGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: '100%',
                height: '300',
                source: PriceListDataAdapter,
                columns: [
                    { text: 'Дата', dataField: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'Примечание', datafield: 'note', filtercondition: 'CONTAINS', width: 300},
                ]
        }));
        
        $('#btnAddPriceList').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('PriceList/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyPriceListDialog").html(Res.html);
                    $('#PriceListDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnDelPriceList').on('click', function(){
            console.log(CurrentRowData.prlt_id);
            
            if (CurrentRowData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('PriceList/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        prlt_id: CurrentRowData.prlt_id
                    },
                    success: function(Res) {
                        $("#PriceListGrid").jqxGrid('updatebounddata');
                        $('#PriceListGrid').jqxGrid('selectrow', 0);
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshPriceList').on('click', function(){
            var RowIndex = $('#PriceListGrid').jqxGrid('getselectedrowindex');
            var Val = $('#PriceListGrid').jqxGrid('getcellvalue', RowIndex, "prlt_id");
            Aliton.SelectRowById('prlt_id', Val, '#PriceListGrid', true);
        });
        
        $('#btnPrintPriceList').on('click', function(){
            var invDate = CurrentRowData.date
            var invDateStr = ('0' + invDate.getDate()).slice(-2) + '.' + ('0' + (invDate.getMonth() + 1)).slice(-2) + '.' + invDate.getFullYear() 
            window.open(<?php echo json_encode(Yii::app()->createUrl('Reports/ReportOpen', array(
                'ReportName' => '/Склад/Остатки на складе',
                'Ajax' => false,
                'Render' => true,
            ))); ?> + '&Parameters[prmDate]=' + invDateStr);
        });
        
        $('#PriceListGrid').jqxGrid('selectrow', 0);
        
      
    });
</script>

<?php $this->setPageTitle('Прайс-лист'); ?>

<?php
    $this->breadcrumbs=array(
        'Склад'=>array('#'),
        'Прайс-лист'=>array('index'),
    );
?>


<div class="row">
    <div id="PriceListGrid" class="jqxGridAliton"></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Рассчитать" id='btnAddPriceList'/></div>
    <div class="row-column"><input type="button" value="Печатать" id='btnPrintPriceList'/></div>
</div>    
<div class="row">
    <div class="row-column"><input type="button" value="Удалить" id='btnDelPriceList'/></div>
    <div class="row-column"><input type="button" value="Обновить" id='btnRefreshPriceList'/></div>
</div>   


<div id="PriceListDialog" style="display: none;">
    <div id="PriceListDialogHeader">
        <span id="PriceListHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogPriceListContent">
        <div style="" id="BodyPriceListDialog"></div>
    </div>
</div>