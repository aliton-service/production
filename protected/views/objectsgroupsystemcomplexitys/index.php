<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowDataObjectsGroupSystemComplexitys;
        var Ogst_id = <?php echo json_encode($Ogst_id); ?>;
        var ObjectGr_id = <?php echo json_encode($ObjectGr_id); ?>;
        
        var ObjectsGroupSystemComplexitysDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceObjectsGroupSystemComplexitys), {
            formatData: function (data) {
                        $.extend(data, {
                            Filters: ["s.Ogst_id = " + Ogst_id]
                        });
                        return data;
                    },
        });

        $('#btnAddObjectsGroupSystemComplexity').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditObjectsGroupSystemComplexity').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnRefreshObjectsGroupSystemComplexity').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelObjectsGroupSystemComplexity').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#ObjectsGroupSystemComplexitysDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '200px', width: '400', position: 'center'}));
        $('#btnCloseObjectsGroupSystemComplexity').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        var CheckButton = function() {
            $('#btnEditObjectsGroupSystemComplexity').jqxButton({disabled: !(CurrentRowDataObjectsGroupSystemComplexitys != undefined)})
            $('#btnDelObjectsGroupSystemComplexity').jqxButton({disabled: !(CurrentRowDataObjectsGroupSystemComplexitys != undefined)})
        }
        
        $("#ObjectsGroupSystemComplexitysGrid").on('rowselect', function (event) {
            CurrentRowDataObjectsGroupSystemComplexitys = $('#ObjectsGroupSystemComplexitysGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
        });
        
        $("#ObjectsGroupSystemComplexitysGrid").on('rowdoubleclick', function(){
            $('#btnEditObjectsGroupSystemComplexity').click();
        });
        
        $("#ObjectsGroupSystemComplexitysGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: '100%',
                height: 'calc(100% - 2px)',
                source: ObjectsGroupSystemComplexitysDataAdapter,
                columns: [
                    { text: 'Сложность', datafield: 'SystemComplexitysName', filtercondition: 'CONTAINS', width: 320},    
                ]

        }));
        
        $('#btnCloseObjectsGroupSystemComplexity').on('click', function(){
            if ($('#btnRefreshDetails').length > 0)
                $('#btnRefreshDetails').click();
            if ($('#btnRefreshEquips').length > 0)
                $('#btnRefreshEquips').click();
            
            if ($('#WHDocumentsDialog').length>0)
                $('#WHDocumentsDialog').jqxWindow('close');
            if ($('#SystemDialog').length>0)
                $('#SystemDialog').jqxWindow('close');
            
        });
        
        $('#btnAddObjectsGroupSystemComplexity').on('click', function(){
            $('#ObjectsGroupSystemComplexitysDialog').jqxWindow({width: 400, height: 160, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('ObjectsGroupSystemComplexitys/Create')) ?>,
                type: 'POST',
                data: {
                    Ogst_id: Ogst_id,
                    ObjectGr_id: ObjectGr_id
                },
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyObjectsGroupSystemComplexitysDialog").html(Res.html);
                    $('#ObjectsGroupSystemComplexitysDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnEditObjectsGroupSystemComplexity').on('click', function(){
            if (CurrentRowDataObjectsGroupSystemComplexitys != undefined) {
                $('#ObjectsGroupSystemComplexitysDialog').jqxWindow($.extend(true, DialogDefaultSettings,{width: 400, height: 160, position: 'center'}));
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('ObjectsGroupSystemComplexitys/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Ogsc_id: CurrentRowDataObjectsGroupSystemComplexitys.Ogsc_id,
                        ObjectGr_id: ObjectGr_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyObjectsGroupSystemComplexitysDialog").html(Res.html);
                        $('#ObjectsGroupSystemComplexitysDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnDelObjectsGroupSystemComplexity').on('click', function(){
            if (CurrentRowDataObjectsGroupSystemComplexitys != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('ObjectsGroupSystemComplexitys/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Ogsc_id: CurrentRowDataObjectsGroupSystemComplexitys.Ogsc_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#ObjectsGroupSystemComplexitysGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#ObjectsGroupSystemComplexitysGrid').jqxGrid('getcelltext', RowIndex + 1, "ObjectsGroupSystemComplexity_id");
                            Aliton.SelectRowById('ObjectsGroupSystemComplexity_id', Text, '#ObjectsGroupSystemComplexitysGrid', true);
                            RowIndex = $('#ObjectsGroupSystemComplexitysGrid').jqxGrid('getselectedrowindex');
                            var S = $('#ObjectsGroupSystemComplexitysGrid').jqxGrid('getrowdata', RowIndex);
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshObjectsGroupSystemComplexity').on('click', function(){
            var RowIndex = $('#ObjectsGroupSystemComplexitysGrid').jqxGrid('getselectedrowindex');
            var Val = $('#ObjectsGroupSystemComplexitysGrid').jqxGrid('getcellvalue', RowIndex, "ObjectsGroupSystemComplexity_id");
            Aliton.SelectRowById('ObjectsGroupSystemComplexity_id', Val, '#ObjectsGroupSystemComplexitysGrid', true);
        });
        
        $('#ObjectsGroupSystemComplexitysGrid').jqxGrid('selectrow', 0);
    });
</script>

<div class="al-row" style="height: calc(100% - 100px)">
    <div id="ObjectsGroupSystemComplexitysGrid" class="jqxGridAliton"></div>
</div>
<div class="al-row" style="margin: 0px; padding: 0px;">
    <div class="al-row-column">
        <div class="row">
            <div class="row-column"><input type="button" value="Добавить" id='btnAddObjectsGroupSystemComplexity'/></div>
            <div class="row-column"><input type="button" value="Изменить" id='btnEditObjectsGroupSystemComplexity'/></div>
        </div>
        <div class="row">
            <div class="row-column" style=""><input type="button" value="Удалить" id='btnDelObjectsGroupSystemComplexity'/></div>
            <div class="row-column"><input type="button" value="Обновить" id='btnRefreshObjectsGroupSystemComplexity'/></div>
        </div>
    </div>
    <div class="al-row-column" style="float: right">
        <div class="row-column" style=""><input type="button" value="Закрыть" id='btnCloseObjectsGroupSystemComplexity'/></div>
    </div> 
    <div style="clear: both"></div>
    
</div>    

<div id="ObjectsGroupSystemComplexitysDialog" style="display: none;">
    <div id="ObjectsGroupSystemComplexitysDialogHeader">
        <span id="ObjectsGroupSystemComplexitysHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogObjectsGroupSystemComplexitysContent">
        <div style="" id="BodyObjectsGroupSystemComplexitysDialog"></div>
    </div>
</div>

