<script type="text/javascript">
    $(document).ready(function () {
        
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        
        
        
        
        var WHBuhActsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceWHBuhActs));
        
        $("#WHBuhActsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: '100%',
                height: '200',
                source: WHBuhActsDataAdapter,
                columns: [
                    { text: 'Дата', dataField: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'Примечание', datafield: 'note', filtercondition: 'CONTAINS', width: 300},
                ]
        }));
        
        $('#btnAddWHBuhActs').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('WHBuhActs/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyWHBuhActsDialog").html(Res.html);
                    $('#WHBuhActsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#btnAddWHBuhActs').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnRefreshWHBuhActs').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnPrintWHBuhActs').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnDelWHBuhActs').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#WHBuhActsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 350, width: 380, position: 'center'}));
        
        var CheckButton = function() {
            $('#btnDelWHBuhActs').jqxButton({disabled: !(CurrentRowData != undefined)})
        }
        
        $("#WHBuhActsGrid").on('rowselect', function (event) {
            CurrentRowData = $('#WHBuhActsGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
//            console.log(CurrentRowData.prlt_id);
        });

        $('#btnDelWHBuhActs').on('click', function(){
//            console.log(CurrentRowData.prlt_id);
            
            if (CurrentRowData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('WHBuhActs/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        prlt_id: CurrentRowData.prlt_id
                    },
                    success: function(Res) {
                        $("#WHBuhActsGrid").jqxGrid('updatebounddata');
                        $('#WHBuhActsGrid').jqxGrid('selectrow', 0);
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshWHBuhActs').on('click', function(){
            var RowIndex = $('#WHBuhActsGrid').jqxGrid('getselectedrowindex');
            var Val = $('#WHBuhActsGrid').jqxGrid('getcellvalue', RowIndex, "prlt_id");
            Aliton.SelectRowById('prlt_id', Val, '#WHBuhActsGrid', true);
        });
        
        $('#btnPrintWHBuhActs').on('click', function(){
            window.open(<?php echo json_encode(Yii::app()->createUrl('Reports/ReportOpen', array(
                'ReportName' => '/Склад/Прайс-лист',
                'Ajax' => false,
                'Render' => true,
            ))); ?> + '&Parameters[prltId]=' + CurrentRowData.prlt_id);
        });
        
        $('#WHBuhActsGrid').jqxGrid('selectrow', 0);
        
      
    });
</script>

<?php $this->setPageTitle('Бухгалтерский акт'); ?>


<div class="row" style="margin: 0;">
    <div id="WHBuhActsGrid" class="jqxGridAliton"></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Рассчитать" id='btnAddWHBuhActs'/></div>
    <div class="row-column"><input type="button" value="Просмотр" id='btnPrintWHBuhActs'/></div>
</div>    
<div class="row">
    <div class="row-column"><input type="button" value="Удалить" id='btnDelWHBuhActs'/></div>
    <div class="row-column"><input type="button" value="Обновить" id='btnRefreshWHBuhActs'/></div>
</div>   


<div id="WHBuhActsDialog" style="display: none;">
    <div id="WHBuhActsDialogHeader">
        <span id="WHBuhActsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogWHBuhActsContent">
        <div style="" id="BodyWHBuhActsDialog"></div>
    </div>
</div>