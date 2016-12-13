<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowDataSNSN;
        var Equip_id = <?php echo json_encode($Equip_id); ?>;
        
        var AddressedStorageDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceAddressedStorage), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["ads.Equip_id = " + Equip_id]
                });
                return data;
            },
        });

        $('#btnAddAddressedStorage').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditAddressedStorage').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnRefreshAddressedStorage').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelAddressedStorage').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#AddressedStorageDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '200px', width: '400', position: 'center'}));
        $('#btnCloseAddressedStorage').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        var CheckButton = function() {
            $('#btnEditAddressedStorage').jqxButton({disabled: !(CurrentRowDataSN != undefined)})
            $('#btnDelAddressedStorage').jqxButton({disabled: !(CurrentRowDataSN != undefined)})
        }
        
        $("#AddressedStorageGrid").on('rowselect', function (event) {
            CurrentRowDataSN = $('#AddressedStorageGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
        });
        
        $("#AddressedStorageGrid").on('rowdoubleclick', function(){
            $('#btnEditAddressedStorage').click();
        });
        
        $("#AddressedStorageGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: '100%',
                height: '300',
                source: AddressedStorageDataAdapter,
                columns: [
                    { text: 'Адрес', datafield: 'AddressSystem', filtercondition: 'CONTAINS', width: 320},    
                ]

        }));
        
        $('#btnCloseAddressedStorage').on('click', function(){
            if ($('#btnRefreshDetails').length > 0)
                $('#btnRefreshDetails').click();
            if ($('#btnRefreshEquips').length > 0)
                $('#btnRefreshEquips').click();
            if ($('#btnRefresh').length > 0)
                $('#btnRefresh').click();
            
            if ($('#WHDocumentsDialog').length>0)
                $('#WHDocumentsDialog').jqxWindow('close');
            if ($('#EquipsDialog').length>0)
                $('#EquipsDialog').jqxWindow('close');
            
        });
        
        $('#btnAddAddressedStorage').on('click', function(){
            $('#AddressedStorageDialog').jqxWindow({width: 400, height: 160, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('AddressedStorage/Create')) ?>,
                type: 'POST',
                data: {Equip_id: Equip_id},
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyAddressedStorageDialog").html(Res.html);
                    $('#AddressedStorageDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnEditAddressedStorage').on('click', function(){
            if (CurrentRowDataSN != undefined) {
                $('#AddressedStorageDialog').jqxWindow({width: 400, height: 160, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('AddressedStorage/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        srnm_id: CurrentRowDataSN.srnm_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyAddressedStorageDialog").html(Res.html);
                        $('#AddressedStorageDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnDelAddressedStorage').on('click', function(){
            if (CurrentRowDataSN != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('AddressedStorage/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        srnm_id: CurrentRowDataSN.srnm_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#AddressedStorageGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#AddressedStorageGrid').jqxGrid('getcelltext', RowIndex + 1, "srnm_id");
                            Aliton.SelectRowById('srnm_id', Text, '#AddressedStorageGrid', true);
                            RowIndex = $('#AddressedStorageGrid').jqxGrid('getselectedrowindex');
                            var S = $('#AddressedStorageGrid').jqxGrid('getrowdata', RowIndex);
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshAddressedStorage').on('click', function(){
            var RowIndex = $('#AddressedStorageGrid').jqxGrid('getselectedrowindex');
            var Val = $('#AddressedStorageGrid').jqxGrid('getcellvalue', RowIndex, "srnm_id");
            Aliton.SelectRowById('srnm_id', Val, '#AddressedStorageGrid', true);
        });
        
        $('#AddressedStorageGrid').jqxGrid('selectrow', 0);
    });
</script>

<div class="row">
    <div id="AddressedStorageGrid" class="jqxGridAliton"></div>
</div>
<div class="row" style="margin: 0px; padding: 0px;">
    <div style="float: left">
        <div class="row">
            <div class="row-column"><input type="button" value="Добавить" id='btnAddAddressedStorage'/></div>
            <div class="row-column"><input type="button" value="Изменить" id='btnEditAddressedStorage'/></div>
        </div>
        <div class="row">
            <div class="row-column" style=""><input type="button" value="Удалить" id='btnDelAddressedStorage'/></div>
            <div class="row-column"><input type="button" value="Обновить" id='btnRefreshAddressedStorage'/></div>
        </div>
    </div>
    <div style="float: right">
        <div class="row-column" style=""><input type="button" value="Закрыть" id='btnCloseAddressedStorage'/></div>
    </div> 
    
    
</div>    

<div id="AddressedStorageDialog" style="display: none;">
    <div id="AddressedStorageDialogHeader">
        <span id="AddressedStorageHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogAddressedStorageContent">
        <div style="" id="BodyAddressedStorageDialog"></div>
    </div>
</div>

