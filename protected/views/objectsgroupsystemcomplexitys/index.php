<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowDataSystemCompetitors;
        var ObjectsGroupSystem_id = <?php echo json_encode($ObjectsGroupSystem_id); ?>;
        
        var SystemCompetitorsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceSystemCompetitors), {
            formatData: function (data) {
                        $.extend(data, {
                            Filters: ["sc.Ogst = " + ObjectsGroupSystem_id]
                        });
                        return data;
                    },
        });

        $('#btnAddSystemCompetitor').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditSystemCompetitor').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnRefreshSystemCompetitor').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelSystemCompetitor').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#SystemCompetitorsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '200px', width: '400', position: 'center'}));
        $('#btnCloseSystemCompetitor').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        var CheckButton = function() {
            $('#btnEditSystemCompetitor').jqxButton({disabled: !(CurrentRowDataSystemCompetitors != undefined)})
            $('#btnDelSystemCompetitor').jqxButton({disabled: !(CurrentRowDataSystemCompetitors != undefined)})
        }
        
        $("#SystemCompetitorsGrid").on('rowselect', function (event) {
            CurrentRowDataSystemCompetitors = $('#SystemCompetitorsGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
        });
        
        $("#SystemCompetitorsGrid").on('rowdoubleclick', function(){
            $('#btnEditSystemCompetitor').click();
        });
        
        $("#SystemCompetitorsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: '100%',
                height: 'calc(100% - 2px)',
                source: SystemCompetitorsDataAdapter,
                columns: [
                    { text: 'Организация', datafield: 'Competitor', filtercondition: 'CONTAINS', width: 320},    
                ]

        }));
        
        $('#btnCloseSystemCompetitor').on('click', function(){
            if ($('#btnRefreshDetails').length > 0)
                $('#btnRefreshDetails').click();
            if ($('#btnRefreshEquips').length > 0)
                $('#btnRefreshEquips').click();
            
            if ($('#WHDocumentsDialog').length>0)
                $('#WHDocumentsDialog').jqxWindow('close');
            if ($('#SystemDialog').length>0)
                $('#SystemDialog').jqxWindow('close');
            
        });
        
        $('#btnAddSystemCompetitor').on('click', function(){
            $('#SystemCompetitorsDialog').jqxWindow({width: 400, height: 160, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('SystemCompetitors/Create')) ?>,
                type: 'POST',
                data: {ObjectsGroupSystem_id: ObjectsGroupSystem_id},
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodySystemCompetitorsDialog").html(Res.html);
                    $('#SystemCompetitorsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnEditSystemCompetitor').on('click', function(){
            if (CurrentRowDataSystemCompetitors != undefined) {
                $('#SystemCompetitorsDialog').jqxWindow($.extend(true, DialogDefaultSettings,{width: 400, height: 160, position: 'center'}));
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('SystemCompetitors/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        SystemCompetitor_id: CurrentRowDataSystemCompetitors.SystemCompetitor_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodySystemCompetitorsDialog").html(Res.html);
                        $('#SystemCompetitorsDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnDelSystemCompetitor').on('click', function(){
            if (CurrentRowDataSystemCompetitors != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('SystemCompetitors/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        SystemCompetitor_id: CurrentRowDataSystemCompetitors.SystemCompetitor_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#SystemCompetitorsGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#SystemCompetitorsGrid').jqxGrid('getcelltext', RowIndex + 1, "SystemCompetitor_id");
                            Aliton.SelectRowById('SystemCompetitor_id', Text, '#SystemCompetitorsGrid', true);
                            RowIndex = $('#SystemCompetitorsGrid').jqxGrid('getselectedrowindex');
                            var S = $('#SystemCompetitorsGrid').jqxGrid('getrowdata', RowIndex);
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshSystemCompetitor').on('click', function(){
            var RowIndex = $('#SystemCompetitorsGrid').jqxGrid('getselectedrowindex');
            var Val = $('#SystemCompetitorsGrid').jqxGrid('getcellvalue', RowIndex, "SystemCompetitor_id");
            Aliton.SelectRowById('SystemCompetitor_id', Val, '#SystemCompetitorsGrid', true);
        });
        
        $('#SystemCompetitorsGrid').jqxGrid('selectrow', 0);
    });
</script>

<div class="al-row" style="height: calc(100% - 100px)">
    <div id="SystemCompetitorsGrid" class="jqxGridAliton"></div>
</div>
<div class="al-row" style="margin: 0px; padding: 0px;">
    <div class="al-row-column">
        <div class="row">
            <div class="row-column"><input type="button" value="Добавить" id='btnAddSystemCompetitor'/></div>
            <div class="row-column"><input type="button" value="Изменить" id='btnEditSystemCompetitor'/></div>
        </div>
        <div class="row">
            <div class="row-column" style=""><input type="button" value="Удалить" id='btnDelSystemCompetitor'/></div>
            <div class="row-column"><input type="button" value="Обновить" id='btnRefreshSystemCompetitor'/></div>
        </div>
    </div>
    <div class="al-row-column" style="float: right">
        <div class="row-column" style=""><input type="button" value="Закрыть" id='btnCloseSystemCompetitor'/></div>
    </div> 
    <div style="clear: both"></div>
    
</div>    

<div id="SystemCompetitorsDialog" style="display: none;">
    <div id="SystemCompetitorsDialogHeader">
        <span id="SystemCompetitorsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogSystemCompetitorsContent">
        <div style="" id="BodySystemCompetitorsDialog"></div>
    </div>
</div>

