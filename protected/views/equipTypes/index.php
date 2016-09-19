<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var EquipTypesDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEquipTypesList));

        $('#btnAddEquipType').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditEquipType').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnRefreshEquipType').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelEquipType').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#EquipTypesDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '200px', width: '400', position: 'center'}));
        
        var CheckButton = function() {
            $('#btnEditEquipType').jqxButton({disabled: !(CurrentRowData != undefined)})
            $('#btnDelEquipType').jqxButton({disabled: !(CurrentRowData != undefined)})
        }
        
        $("#EquipTypesGrid").on('rowselect', function (event) {
            CurrentRowData = $('#EquipTypesGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
        });
        
        $("#EquipTypesGrid").on('rowdoubleclick', function(){
            $('#btnEditEquipType').click();
        });
        
        $("#EquipTypesGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: '100%',
                height: '500',
                source: EquipTypesDataAdapter,
                columns: [
                    { text: 'Тип', datafield: 'EquipType', filtercondition: 'CONTAINS', width: 320},    
                ]

        }));
        
        $('#btnAddEquipType').on('click', function(){
            $('#EquipTypesDialog').jqxWindow({width: 400, height: 160, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('EquipTypes/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyEquipTypesDialog").html(Res.html);
                    $('#EquipTypesDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnEditEquipType').on('click', function(){
            if (CurrentRowData != undefined) {
                $('#EquipTypesDialog').jqxWindow({width: 400, height: 160, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('EquipTypes/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        EquipType_id: CurrentRowData.EquipType_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyEquipTypesDialog").html(Res.html);
                        $('#EquipTypesDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnDelEquipType').on('click', function(){
            if (CurrentRowData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('EquipTypes/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        EquipType_id: CurrentRowData.EquipType_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#EquipTypesGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#EquipTypesGrid').jqxGrid('getcelltext', RowIndex + 1, "EquipType_id");
                            Aliton.SelectRowById('EquipType_id', Text, '#EquipTypesGrid', true);
                            RowIndex = $('#EquipTypesGrid').jqxGrid('getselectedrowindex');
                            var S = $('#EquipTypesGrid').jqxGrid('getrowdata', RowIndex);
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshEquipType').on('click', function(){
            var RowIndex = $('#EquipTypesGrid').jqxGrid('getselectedrowindex');
            var Val = $('#EquipTypesGrid').jqxGrid('getcellvalue', RowIndex, "EquipType_id");
            Aliton.SelectRowById('EquipType_id', Val, '#EquipTypesGrid', true);
        });
        
        $('#EquipTypesGrid').jqxGrid('selectrow', 0);
    });
</script>

<?php $this->setPageTitle('Тип оборудования'); ?>

<?php
    $this->breadcrumbs=array(
            'Заявки'=>array('/demands&status[nofinish]=on'),
            'Тип оборудования'=>array('index'),
    );
?>


<div class="row">
    <div id="EquipTypesGrid" class="jqxGridAliton"></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Добавить" id='btnAddEquipType'/></div>
    <div class="row-column"><input type="button" value="Изменить" id='btnEditEquipType'/></div>
    <div class="row-column"><input type="button" value="Обновить" id='btnRefreshEquipType'/></div>
    <div class="row-column" style="float: right; margin: 0px"><input type="button" value="Удалить" id='btnDelEquipType'/></div>
</div>    

<div id="EquipTypesDialog" style="display: none;">
    <div id="EquipTypesDialogHeader">
        <span id="EquipTypesHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogEquipTypesContent">
        <div style="" id="BodyEquipTypesDialog"></div>
    </div>
</div>