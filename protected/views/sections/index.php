<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var SectionsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceSections));

        $('#btnAddSection').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditSection').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnRefreshSection').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelSection').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#SectionsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '200px', width: '400', position: 'center'}));
        
        var CheckButton = function() {
            $('#btnEditSection').jqxButton({disabled: !(CurrentRowData != undefined)})
            $('#btnDelSection').jqxButton({disabled: !(CurrentRowData != undefined)})
        }
        
        $("#SectionsGrid").on('rowselect', function (event) {
            CurrentRowData = $('#SectionsGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
        });
        
        $("#SectionsGrid").on('rowdoubleclick', function(){
            $('#btnEditSection').click();
        });
        
        $("#SectionsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: '100%',
                height: '300',
                source: SectionsDataAdapter,
                columns: [
                    { text: 'Наименование', datafield: 'SectionName', filtercondition: 'CONTAINS', width: 320},    
                ]

        }));
        
        $('#btnAddSection').on('click', function(){
            $('#SectionsDialog').jqxWindow({width: 400, height: 160, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Sections/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodySectionsDialog").html(Res.html);
                    $('#SectionsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnEditSection').on('click', function(){
            if (CurrentRowData != undefined) {
                $('#SectionsDialog').jqxWindow({width: 400, height: 160, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Sections/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Section_id: CurrentRowData.Section_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodySectionsDialog").html(Res.html);
                        $('#SectionsDialog').jqxWindow('open');
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
                    url: <?php echo json_encode(Yii::app()->createUrl('Sections/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Section_id: CurrentRowData.Section_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#SectionsGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#SectionsGrid').jqxGrid('getcelltext', RowIndex + 1, "Section_id");
                            Aliton.SelectRowById('Section_id', Text, '#SectionsGrid', true);
                            RowIndex = $('#SectionsGrid').jqxGrid('getselectedrowindex');
                            var S = $('#SectionsGrid').jqxGrid('getrowdata', RowIndex);
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshSection').on('click', function(){
            var RowIndex = $('#SectionsGrid').jqxGrid('getselectedrowindex');
            var Val = $('#SectionsGrid').jqxGrid('getcellvalue', RowIndex, "Section_id");
            Aliton.SelectRowById('Section_id', Val, '#SectionsGrid', true);
        });
        
        $('#SectionsGrid').jqxGrid('selectrow', 0);
    });
</script>

<?php $this->setPageTitle('Подразделения'); ?>

<?php
    $this->breadcrumbs=array(
            'Кадры'=>array('/Employees/index'),
            'Подразделения'=>array('index'),
    );
?>


<div class="row">
    <div id="SectionsGrid" class="jqxGridAliton"></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Добавить" id='btnAddSection'/></div>
    <div class="row-column"><input type="button" value="Изменить" id='btnEditSection'/></div>
    <div class="row-column"><input type="button" value="Обновить" id='btnRefreshSection'/></div>
    <div class="row-column" style="float: right; margin: 0px"><input type="button" value="Удалить" id='btnDelSection'/></div>
</div>    

<div id="SectionsDialog" style="display: none;">
    <div id="SectionsDialogHeader">
        <span id="SectionsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogSectionsContent">
        <div style="" id="BodySectionsDialog"></div>
    </div>
</div>