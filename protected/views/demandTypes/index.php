<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var DemandTypesDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDemandTypesList));

        $('#btnAddDemandType').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditDemandType').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnRefreshDemandType').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelDemandType').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#DemandTypesDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '250', width: '400', position: 'center'}));
        
        var CheckButton = function() {
            $('#btnEditDemandType').jqxButton({disabled: !(CurrentRowData != undefined)})
            $('#btnDelDemandType').jqxButton({disabled: !(CurrentRowData != undefined)})
        }
        
        $("#DemandTypesGrid").on('rowselect', function (event) {
            CurrentRowData = $('#DemandTypesGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
        });
        
        $("#DemandTypesGrid").on('rowdoubleclick', function(){
            $('#btnEditDemandType').click();
        });
        
        $("#DemandTypesGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: '100%',
                height: '500',
                source: DemandTypesDataAdapter,
                columns: [
                    { text: 'Тип заявки', datafield: 'DemandType', filtercondition: 'CONTAINS', width: 320},
                    { text: 'Заявки', dataField: 'd', columntype: 'checkbox', filtercondition: 'STARTS_WITH', width: 60 },
                    { text: 'Заявки на доставку', dataField: 'dd', columntype: 'checkbox', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'Внутренние заявки', dataField: 'id', columntype: 'checkbox', filtercondition: 'STARTS_WITH', width: 150 },
                ]

        }));
        
        $('#btnAddDemandType').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('DemandTypes/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyDemandTypesDialog").html(Res.html);
                    $('#DemandTypesDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnEditDemandType').on('click', function(){
            if (CurrentRowData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('DemandTypes/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        DemandType_id: CurrentRowData.DemandType_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyDemandTypesDialog").html(Res.html);
                        $('#DemandTypesDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnDelDemandType').on('click', function(){
            if (CurrentRowData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('DemandTypes/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        DemandType_id: CurrentRowData.DemandType_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#DemandTypesGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#DemandTypesGrid').jqxGrid('getcelltext', RowIndex + 1, "DemandType_id");
                            Aliton.SelectRowById('DemandType_id', Text, '#DemandTypesGrid', true);
                            RowIndex = $('#DemandTypesGrid').jqxGrid('getselectedrowindex');
                            var S = $('#DemandTypesGrid').jqxGrid('getrowdata', RowIndex);
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshDemandType').on('click', function(){
            var RowIndex = $('#DemandTypesGrid').jqxGrid('getselectedrowindex');
            var Val = $('#DemandTypesGrid').jqxGrid('getcellvalue', RowIndex, "DemandType_id");
            Aliton.SelectRowById('DemandType_id', Val, '#DemandTypesGrid', true);
        });
        
        $('#DemandTypesGrid').jqxGrid('selectrow', 0);
    });
</script>

<?php $this->setPageTitle('Типы заявок'); ?>

<?php
    $this->breadcrumbs=array(
        'Заявки'=>array('/demands&status[nofinish]=on'),
        'Типы заявок'=>array('index'),
    );
?>


<div class="row">
    <div id="DemandTypesGrid" class="jqxGridAliton"></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Добавить" id='btnAddDemandType'/></div>
    <div class="row-column"><input type="button" value="Изменить" id='btnEditDemandType'/></div>
    <div class="row-column"><input type="button" value="Обновить" id='btnRefreshDemandType'/></div>
    <div class="row-column" style="float: right; margin: 0px"><input type="button" value="Удалить" id='btnDelDemandType'/></div>
</div>    

<div id="DemandTypesDialog" style="display: none;">
    <div id="DemandTypesDialogHeader">
        <span id="DemandTypesHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogDemandTypesContent">
        <div style="" id="BodyDemandTypesDialog"></div>
    </div>
</div>