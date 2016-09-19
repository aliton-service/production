<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var MalfunctionsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceMalfunctionsOld));

        $('#btnAddMalfunction').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditMalfunction').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnRefreshMalfunction').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelMalfunction').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#MalfunctionsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '200px', width: '400', position: 'center'}));
        
        var CheckButton = function() {
            $('#btnEditMalfunction').jqxButton({disabled: !(CurrentRowData != undefined)})
            $('#btnDelMalfunction').jqxButton({disabled: !(CurrentRowData != undefined)})
        }
        
        $("#MalfunctionsGrid").on('rowselect', function (event) {
            CurrentRowData = $('#MalfunctionsGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
        });
        
        $("#MalfunctionsGrid").on('rowdoubleclick', function(){
            $('#btnEditMalfunction').click();
        });
        
        $("#MalfunctionsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: '100%',
                height: '500',
                source: MalfunctionsDataAdapter,
                columns: [
                    { text: 'Неистправность', datafield: 'Malfunction', filtercondition: 'CONTAINS', width: 320},    
                ]

        }));
        
        $('#btnAddMalfunction').on('click', function(){
            $('#MalfunctionsDialog').jqxWindow({width: 400, height: 160, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Malfunctions/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyMalfunctionsDialog").html(Res.html);
                    $('#MalfunctionsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnEditMalfunction').on('click', function(){
            if (CurrentRowData != undefined) {
                $('#MalfunctionsDialog').jqxWindow({width: 400, height: 160, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Malfunctions/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Malfunction_id: CurrentRowData.Malfunction_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyMalfunctionsDialog").html(Res.html);
                        $('#MalfunctionsDialog').jqxWindow('open');
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
                    url: <?php echo json_encode(Yii::app()->createUrl('Malfunctions/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Malfunction_id: CurrentRowData.Malfunction_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#MalfunctionsGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#MalfunctionsGrid').jqxGrid('getcelltext', RowIndex + 1, "Malfunction_id");
                            Aliton.SelectRowById('Malfunction_id', Text, '#MalfunctionsGrid', true);
                            RowIndex = $('#MalfunctionsGrid').jqxGrid('getselectedrowindex');
                            var S = $('#MalfunctionsGrid').jqxGrid('getrowdata', RowIndex);
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshMalfunction').on('click', function(){
            var RowIndex = $('#MalfunctionsGrid').jqxGrid('getselectedrowindex');
            var Val = $('#MalfunctionsGrid').jqxGrid('getcellvalue', RowIndex, "Malfunction_id");
            Aliton.SelectRowById('Malfunction_id', Val, '#MalfunctionsGrid', true);
        });
        
        $('#MalfunctionsGrid').jqxGrid('selectrow', 0);
    });
</script>

<?php $this->setPageTitle('Неисправность'); ?>

<?php
    $this->breadcrumbs=array(
        'Заявки'=>array('/demands&status[nofinish]=on'),
        'Неисправность'=>array('index'),
    );
?>


<div class="row">
    <div id="MalfunctionsGrid" class="jqxGridAliton"></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Добавить" id='btnAddMalfunction'/></div>
    <div class="row-column"><input type="button" value="Изменить" id='btnEditMalfunction'/></div>
    <div class="row-column"><input type="button" value="Обновить" id='btnRefreshMalfunction'/></div>
    <div class="row-column" style="float: right; margin: 0px"><input type="button" value="Удалить" id='btnDelMalfunction'/></div>
</div>    

<div id="MalfunctionsDialog" style="display: none;">
    <div id="MalfunctionsDialogHeader">
        <span id="MalfunctionsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogMalfunctionsContent">
        <div style="" id="BodyMalfunctionsDialog"></div>
    </div>
</div>