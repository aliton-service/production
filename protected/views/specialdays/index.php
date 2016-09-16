<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var SpecialDaysDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceSpecialDays));

        $('#btnAddSpecialDay').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditSpecialDay').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnRefreshSpecialDay').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelSpecialDay').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: true }));
        $('#SpecialDaysDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '200px', width: '400', position: 'center'}));
        
        var CheckButton = function() {
            $('#btnEditSpecialDay').jqxButton({disabled: !(CurrentRowData != undefined)})
            //$('#btnDelSpecialDay').jqxButton({disabled: !(CurrentRowData != undefined)})
        }
        
        $("#SpecialDaysGrid").on('rowselect', function (event) {
            CurrentRowData = $('#SpecialDaysGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
        });
        
        $("#SpecialDaysGrid").on('rowdoubleclick', function(){
            $('#btnEditSpecialDay').click();
        });
        
        $("#SpecialDaysGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: '100%',
                height: '300',
                source: SpecialDaysDataAdapter,
                columns: [
                    { text: 'Дата', filtercondition: 'GREATER_THAN', filtertype: 'date', datafield: 'date', width: 130, cellsformat: 'dd.MM.yyyy'},
                    { text: 'Тип дня', datafield: 'datp_name', filtercondition: 'CONTAINS', width: 320},    
                ]

        }));
        
        $('#btnAddSpecialDay').on('click', function(){
            $('#SpecialDaysDialog').jqxWindow({width: 560, height: 180, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('SpecialDays/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodySpecialDaysDialog").html(Res.html);
                    $('#SpecialDaysDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnEditSpecialDay').on('click', function(){
            if (CurrentRowData != undefined) {
                $('#SpecialDaysDialog').jqxWindow({width: 560, height: 180, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('SpecialDays/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        sday_id: CurrentRowData.sday_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodySpecialDaysDialog").html(Res.html);
                        $('#SpecialDaysDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnDelSpecialDay').on('click', function(){
            if (CurrentRowData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('SpecialDays/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        sday_id: CurrentRowData.sday_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#SpecialDaysGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#SpecialDaysGrid').jqxGrid('getcelltext', RowIndex + 1, "sday_id");
                            Aliton.SelectRowById('sday_id', Text, '#SpecialDaysGrid', true);
                            RowIndex = $('#SpecialDaysGrid').jqxGrid('getselectedrowindex');
                            var S = $('#SpecialDaysGrid').jqxGrid('getrowdata', RowIndex);
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshSpecialDay').on('click', function(){
            var RowIndex = $('#SpecialDaysGrid').jqxGrid('getselectedrowindex');
            var Val = $('#SpecialDaysGrid').jqxGrid('getcellvalue', RowIndex, "sday_id");
            Aliton.SelectRowById('sday_id', Val, '#SpecialDaysGrid', true);
        });
        
        $('#SpecialDaysGrid').jqxGrid('selectrow', 0);
    });
</script>

<?php $this->setPageTitle('Праздники'); ?>

<?php
    $this->breadcrumbs=array(
            'Кадры'=>array('/Employees/index'),
            'Праздничные дни'=>array('index'),
    );
?>


<div class="row">
    <div id="SpecialDaysGrid" class="jqxGridAliton"></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Добавить" id='btnAddSpecialDay'/></div>
    <div class="row-column"><input type="button" value="Изменить" id='btnEditSpecialDay'/></div>
    <div class="row-column"><input type="button" value="Обновить" id='btnRefreshSpecialDay'/></div>
    <div class="row-column" style="float: right; margin: 0px"><input type="button" value="Удалить" id='btnDelSpecialDay'/></div>
</div>    

<div id="SpecialDaysDialog" style="display: none;">
    <div id="SpecialDaysDialogHeader">
        <span id="SpecialDaysHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogSpecialDaysContent">
        <div style="" id="BodySpecialDaysDialog"></div>
    </div>
</div>