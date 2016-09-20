<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var DemandsExecTimeDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDemandsExecTime));

        $('#btnAddSection').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditSection').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnRefreshSection').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelSection').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: true }));
        $('#DemandsExecTimeDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '200px', width: '400', position: 'center'}));
        
        var CheckButton = function() {
            $('#btnEditSection').jqxButton({disabled: !(CurrentRowData != undefined)})
            //$('#btnDelSection').jqxButton({disabled: !(CurrentRowData != undefined)})
        }
        
        $("#DemandsExecTimeGrid").on('rowselect', function (event) {
            CurrentRowData = $('#DemandsExecTimeGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
        });
        
        $("#DemandsExecTimeGrid").on('rowdoubleclick', function(){
            $('#btnEditSection').click();
        });
        
        $("#DemandsExecTimeGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: '100%',
                height: '300',
                source: DemandsExecTimeDataAdapter,
                columns: [
                    { text: 'Тип заявки', filtertype: 'checkedlist', datafield: 'DemandType', filtercondition: 'CONTAINS', width: 280},    
                    { text: 'Тип системы', filtertype: 'checkedlist', datafield: 'SystemTypeName', filtercondition: 'CONTAINS', width: 120},
                    { text: 'Тип оборудования', filtertype: 'checkedlist', datafield: 'EquipType', filtercondition: 'CONTAINS', width: 120},
                    { text: 'Неисправность', filtertype: 'checkedlist', datafield: 'Malfunction', filtercondition: 'CONTAINS', width: 200},
                    { text: 'Приоритет', filtertype: 'checkedlist', datafield: 'DemandPrior', filtercondition: 'CONTAINS', width: 120},
                    { text: 'Срок', filtertype: 'checkedlist', datafield: 'ExceedTypeName', filtercondition: 'CONTAINS', width: 150},
                    { text: 'Учет вых. дней', columntype: 'checkbox', filtertype: 'bool', datafield: 'DayOff', filtercondition: 'CONTAINS', width: 100},
                    { text: 'Кол-во', filtertype: 'number', datafield: 'ExceedDays', width: 150},
                ]

        }));
        
        $('#btnAddSection').on('click', function(){
            $('#DemandsExecTimeDialog').jqxWindow({width: 500, height: 360, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('DemandsExecTime/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyDemandsExecTimeDialog").html(Res.html);
                    $('#DemandsExecTimeDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnEditSection').on('click', function(){
            if (CurrentRowData != undefined) {
                $('#DemandsExecTimeDialog').jqxWindow({width: 500, height: 360, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('DemandsExecTime/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        DPrior_id: CurrentRowData.DPrior_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyDemandsExecTimeDialog").html(Res.html);
                        $('#DemandsExecTimeDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnDelSection').on('click', function(){
            if (CurrentRowData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('DemandsExecTime/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        DPrior_id: CurrentRowData.DPrior_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#DemandsExecTimeGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#DemandsExecTimeGrid').jqxGrid('getcelltext', RowIndex + 1, "DPrior_id");
                            Aliton.SelectRowById('DPrior_id', Text, '#DemandsExecTimeGrid', true);
                            RowIndex = $('#DemandsExecTimeGrid').jqxGrid('getselectedrowindex');
                            var S = $('#DemandsExecTimeGrid').jqxGrid('getrowdata', RowIndex);
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshSection').on('click', function(){
            var RowIndex = $('#DemandsExecTimeGrid').jqxGrid('getselectedrowindex');
            var Val = $('#DemandsExecTimeGrid').jqxGrid('getcellvalue', RowIndex, "DPrior_id");
            Aliton.SelectRowById('DPrior_id', Val, '#DemandsExecTimeGrid', true);
        });
        
        $('#DemandsExecTimeGrid').jqxGrid('selectrow', 0);
    });
</script>

<?php $this->setPageTitle('Приоритеты'); ?>

<?php
    $this->breadcrumbs=array(
            'Главная'=>array('/Site/index'),
            'Приоритеты'=>array('index'),
    );
?>


<div class="row">
    <div id="DemandsExecTimeGrid" class="jqxGridAliton"></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Добавить" id='btnAddSection'/></div>
    <div class="row-column"><input type="button" value="Изменить" id='btnEditSection'/></div>
    <div class="row-column"><input type="button" value="Обновить" id='btnRefreshSection'/></div>
    <div class="row-column" style="float: right; margin: 0px"><input type="button" value="Удалить" id='btnDelSection'/></div>
</div>    

<div id="DemandsExecTimeDialog" style="display: none;">
    <div id="DemandsExecTimeDialogHeader">
        <span id="DemandsExecTimeHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogDemandsExecTimeContent">
        <div style="" id="BodyDemandsExecTimeDialog"></div>
    </div>
</div>