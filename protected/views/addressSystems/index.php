<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var AddressSystemsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceAddressSystems));

        $('#btnAddAddressSystem').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditAddressSystem').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnRefreshAddressSystem').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelAddressSystem').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#AddressSystemsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '200px', width: '400', position: 'center'}));
        
        var CheckButton = function() {
            $('#btnEditAddressSystem').jqxButton({disabled: !(CurrentRowData != undefined)})
            $('#btnDelAddressSystem').jqxButton({disabled: !(CurrentRowData != undefined)})
        }
        
        $("#AddressSystemsGrid").on('rowselect', function (event) {
            CurrentRowData = $('#AddressSystemsGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
        });
        
        $("#AddressSystemsGrid").on('rowdoubleclick', function(){
            $('#btnEditAddressSystem').click();
        });
        
        $("#AddressSystemsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: 'calc(100% - 2px)',
                height: 'calc(100% - 2px)',
                source: AddressSystemsDataAdapter,
                columns: [
                    { text: 'Наименование', datafield: 'AddressSystem', filtercondition: 'CONTAINS', width: 320},    
                ]

        }));
        
        $('#btnAddAddressSystem').on('click', function(){
            $('#AddressSystemsDialog').jqxWindow({width: 400, height: 160, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('AddressSystems/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyAddressSystemsDialog").html(Res.html);
                    $('#AddressSystemsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnEditAddressSystem').on('click', function(){
            if (CurrentRowData != undefined) {
                $('#AddressSystemsDialog').jqxWindow({width: 400, height: 160, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('AddressSystems/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        AddressSystem_id: CurrentRowData.AddressSystem_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyAddressSystemsDialog").html(Res.html);
                        $('#AddressSystemsDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnDelAddressSystem').on('click', function(){
            if (CurrentRowData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('AddressSystems/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        AddressSystem_id: CurrentRowData.AddressSystem_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#AddressSystemsGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#AddressSystemsGrid').jqxGrid('getcelltext', RowIndex + 1, "AddressSystem_id");
                            Aliton.SelectRowById('AddressSystem_id', Text, '#AddressSystemsGrid', true);
                            RowIndex = $('#AddressSystemsGrid').jqxGrid('getselectedrowindex');
                            var S = $('#AddressSystemsGrid').jqxGrid('getrowdata', RowIndex);
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshAddressSystem').on('click', function(){
            var RowIndex = $('#AddressSystemsGrid').jqxGrid('getselectedrowindex');
            var Val = $('#AddressSystemsGrid').jqxGrid('getcellvalue', RowIndex, "AddressSystem_id");
            Aliton.SelectRowById('AddressSystem_id', Val, '#AddressSystemsGrid', true);
        });
        
        $('#AddressSystemsGrid').jqxGrid('selectrow', 0);
    });
</script>

<?php $this->setPageTitle('Должности'); ?>

<?php
    $this->breadcrumbs=array(
            'Кадры'=>array('/Employees/index'),
            'Подразделения'=>array('index'),
    );
?>


<div class="row" style="height: calc(100% - 58px);">
    <div id="AddressSystemsGrid" class="jqxGridAliton"></div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Добавить" id='btnAddAddressSystem'/></div>
    <div class="al-row-column"><input type="button" value="Изменить" id='btnEditAddressSystem'/></div>
    <div class="al-row-column"><input type="button" value="Обновить" id='btnRefreshAddressSystem'/></div>
    <div class="al-row-column" style="float: right; margin: 0px"><input type="button" value="Удалить" id='btnDelAddressSystem'/></div>
    <div style="clear: both;"></div>
</div>    

<div id="AddressSystemsDialog" style="display: none;">
    <div id="AddressSystemsDialogHeader">
        <span id="AddressSystemsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogAddressSystemsContent">
        <div style="" id="BodyAddressSystemsDialog"></div>
    </div>
</div>