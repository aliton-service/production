<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var PositionsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourcePositions));

        $('#btnAddPosition').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditPosition').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnRefreshPosition').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelPosition').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#PositionsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '200px', width: '400', position: 'center'}));
        
        var CheckButton = function() {
            $('#btnEditPosition').jqxButton({disabled: !(CurrentRowData != undefined)})
            $('#btnDelPosition').jqxButton({disabled: !(CurrentRowData != undefined)})
        }
        
        $("#PositionsGrid").on('rowselect', function (event) {
            CurrentRowData = $('#PositionsGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
        });
        
        $("#PositionsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: '100%',
                height: '300',
                source: PositionsDataAdapter,
                columns: [
                    { text: 'Наименование', datafield: 'PositionName', filtercondition: 'CONTAINS', width: 320},    
                ]

        }));
        
        $('#btnAddPosition').on('click', function(){
            $('#PositionsDialog').jqxWindow({width: 400, height: 160, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Positions/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyPositionsDialog").html(Res.html);
                    $('#PositionsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnEditPosition').on('click', function(){
            if (CurrentRowData != undefined) {
                $('#PositionsDialog').jqxWindow({width: 400, height: 160, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Positions/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Position_id: CurrentRowData.Position_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyPositionsDialog").html(Res.html);
                        $('#PositionsDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnDelPosition').on('click', function(){
            if (CurrentRowData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Positions/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Position_id: CurrentRowData.Position_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#PositionsGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#PositionsGrid').jqxGrid('getcelltext', RowIndex + 1, "Position_id");
                            Aliton.SelectRowById('Position_id', Text, '#PositionsGrid', true);
                            RowIndex = $('#PositionsGrid').jqxGrid('getselectedrowindex');
                            var S = $('#PositionsGrid').jqxGrid('getrowdata', RowIndex);
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshPosition').on('click', function(){
            var RowIndex = $('#PositionsGrid').jqxGrid('getselectedrowindex');
            var Val = $('#PositionsGrid').jqxGrid('getcellvalue', RowIndex, "Position_id");
            Aliton.SelectRowById('Position_id', Val, '#PositionsGrid', true);
        });
        
        $('#PositionsGrid').jqxGrid('selectrow', 0);
    });
</script>

<?php $this->setPageTitle('Должности'); ?>

<?php
    $this->breadcrumbs=array(
            'Кадры'=>array('/Employees/index'),
            'Должности'=>array('index'),
    );
?>


<div class="row">
    <div id="PositionsGrid" class="jqxGridAliton"></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Добавить" id='btnAddPosition'/></div>
    <div class="row-column"><input type="button" value="Изменить" id='btnEditPosition'/></div>
    <div class="row-column"><input type="button" value="Обновить" id='btnRefreshPosition'/></div>
    <div class="row-column" style="float: right; margin: 0px"><input type="button" value="Удалить" id='btnDelPosition'/></div>
</div>    

<div id="PositionsDialog" style="display: none;">
    <div id="PositionsDialogHeader">
        <span id="PositionsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogPositionsContent">
        <div style="" id="BodyPositionsDialog"></div>
    </div>
</div>