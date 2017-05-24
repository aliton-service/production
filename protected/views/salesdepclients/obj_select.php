<script>
    $(document).ready(function () {
        var Form_id = <?php echo json_encode($Form_id) ?>;
        
        
        var ObjectsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListObjectsMin, {id: 'id', url: '/index.php?r=AjaxData/DataJQX&ModelName=ListObjectsMin',
            filter: function () {
                $("#ObjsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#ObjsGrid").jqxGrid('updatebounddata', 'sort');
            }
        }));
        $("#ObjsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: 'calc(100% - 2px)',
                width: 'calc(100% - 2px)',
                showfilterrow: true,
                autoshowfiltericon: true,
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                virtualmode: true,
                selectionmode: 'checkbox',
                source: ObjectsDataAdapter,
                columns:
                    [
                        { text: 'Адрес', datafield: 'Addr', width: 300},
                        { text: 'Наименование', datafield: 'FullName', width: 250},
                        { text: 'Тариф', datafield: 'ServiceType', width: 100},
                    ]
        }));
        
        $('#btnAttach').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160}));
        $('#btnCloseDialog').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120}));
        
        var Attach = function(ObjectGr_id) {
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('SalesDepClients/AttachObjects')); ?>,
                type: 'POST',
                data: {
                    Params: {
                        Form_id: Form_id,
                        ObjectGr_id: ObjectGr_id
                    }
                },
                succes: function(Res) {
                    Res = JSON.parse(Res);
                    
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        };
        
        $('#btnAttach').on('click', function() {
            var Rows = $('#ObjsGrid').jqxGrid('getselectedrowindexes');
            var Row;
            if (typeof(Prop) != 'undefined')
                Prop.SelectObject = [];
            
            for (var i = 0; i <= Rows.length-1; i++) {
                Row = $('#ObjsGrid').jqxGrid('getrowdata', Rows[i]);
                if (typeof(Prop) != 'undefined')
                    Prop.SelectObject[i] = Row.ObjectGr_id;
                else
                    Attach(Row.ObjectGr_id);
            }
            $("#ObjsGrid").jqxGrid('updatebounddata');
            $('#ObjsGrid').jqxGrid('clearselection');
        });
        
        $('#btnCloseDialog').on('click', function() {
            if ($("#FindBanksDialog").length>0) {
                $("#FindBanksDialog").jqxWindow('close');
                return;
            }
            if ($("#EditFormDialog").length>0)
                $("#EditFormDialog").jqxWindow('close');
            
        });
    });
</script>    

<div class="al-row" style="height: calc(100% - 48px)">
    <div id="ObjsGrid"></div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" id="btnAttach" value="Привязать объекты" /></div>
    <div class="al-row-column" style="float: right"><input type="button" id="btnCloseDialog" value="Отмена" /></div>
</div>    


