<script type="text/javascript">
    $(document).ready(function () {
        
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        var CurrentRowDataDetails;
        
        var PriceMarkupsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourcePriceMarkups, {}));
        

        $('#btnNewPriceMarkups').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 95 }));
        $('#btnEditPriceMarkups').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 95 }));
        $('#btnCopyPriceMarkups').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 95 }));
        $('#btnDelPriceMarkups').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 95 }));
        $('#btnRefreshPriceMarkups').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 95 }));
        
        $('#btnNewPriceMarkupDetails').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 95 }));
        $('#btnEditPriceMarkupDetails').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 95 }));
        $('#btnDelPriceMarkupDetails').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 95 }));
        $('#btnRefreshPriceMarkupDetails').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 95 }));
        
        $('#PriceMarkupsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '170px', width: '320', position: 'center'}));
        
        var CheckButton = function() {
            $('#btnEditPriceMarkups').jqxButton({disabled: !(CurrentRowData != undefined)})
            $('#btnCopyPriceMarkups').jqxButton({disabled: !(CurrentRowData != undefined)})
            $('#btnDelPriceMarkups').jqxButton({disabled: !(CurrentRowData != undefined)})
        };
        
        $("#PriceMarkupsGrid").on('rowselect', function (event) {
            CurrentRowData = $('#PriceMarkupsGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
            
            console.log(CurrentRowData.mrkp_id);
            
            var PriceMarkupDetailsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourcePriceMarkupDetails, {}), {
                formatData: function (data) {
                    $.extend(data, {
                        Filters: ["d.mrkp_id = " + CurrentRowData.mrkp_id],
                    });
                    return data;
                },
            });
            $("#PriceMarkupDetailsGrid").jqxGrid({ source: PriceMarkupDetailsDataAdapter });
        });
        
        $("#PriceMarkupsGrid").on('rowdoubleclick', function(){
            $('#btnEditPriceMarkups').click();
        });
        
        $("#PriceMarkupsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: false,
                width: '200',
                height: '500',
                source: PriceMarkupsDataAdapter,
                columns: [
                    { text: 'с', dataField: 'date_start', align: 'center', columngroup: 'Period', filtertype: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'по', dataField: 'date_end', align: 'center', columngroup: 'Period', filtertype: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 100 },
                ],
                columngroups: [
                    { text: 'Период действия', align: 'center', name: 'Period' },
                ]
        }));
        
        
        var CheckButtonDetails = function() {
            $('#btnEditPriceMarkupDetails').jqxButton({disabled: !(CurrentRowDataDetails != undefined)})
            $('#btnDelPriceMarkupDetails').jqxButton({disabled: !(CurrentRowDataDetails != undefined)})
        };
        
        $("#PriceMarkupDetailsGrid").on('rowselect', function (event) {
            CurrentRowDataDetails = $('#PriceMarkupDetailsGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButtonDetails();
        });
        
        $("#PriceMarkupDetailsGrid").on('rowdoubleclick', function(){
            $('#btnEditPriceMarkupDetails').click();
        });
        
        $("#PriceMarkupDetailsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: false,
                width: '910',
                height: '500',
                columns: [
                    { text: 'Закупка', dataField: 'MarkupLow', columngroup: 'MarkUp', columntype: 'textbox', filtercondition: 'STARTS_WITH', align: 'center', width: 80 },
                    { text: 'Розница', dataField: 'MarkupHigh', columngroup: 'MarkUp', columntype: 'textbox', filtercondition: 'STARTS_WITH', align: 'center', width: 80 },
                    { text: 'Группа', dataField: 'grp_name', columngroup: 'Conditions', columntype: 'textbox', filtercondition: 'STARTS_WITH', align: 'center', width: 120 },
                    { text: 'Поставщик', dataField: 'NameSupplier', columngroup: 'Conditions', columntype: 'textbox', filtercondition: 'STARTS_WITH', align: 'center', width: 130 },
                    { text: 'Оборудование', dataField: 'EquipName', columngroup: 'Conditions', columntype: 'textbox', filtercondition: 'STARTS_WITH', align: 'center', width: 400 },
                    { text: 'Цена от', dataField: 'Price', columngroup: 'Conditions', columntype: 'numberinput', filtercondition: 'STARTS_WITH', align: 'center', width: 100 },
                ],
                columngroups: [
                    { text: 'Наценка', align: 'center', name: 'MarkUp' },
                    { text: 'Условия применения', align: 'center', name: 'Conditions' },
                ]
        }));
        
        $('#btnNewPriceMarkups').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('PriceMarkups/Create')) ?>,
                type: 'POST',
                async: false,
                data: {
                    
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyPriceMarkupsDialog").html(Res.html);
                    $('#PriceMarkupsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#btnEditPriceMarkups').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('PriceMarkups/Update')) ?>,
                type: 'POST',
                async: false,
                data: {
                    mrkp_id: CurrentRowData.mrkp_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyPriceMarkupsDialog").html(Res.html);
                    $('#PriceMarkupsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#btnCopyPriceMarkups').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('PriceMarkups/Copy')) ?>,
                type: 'POST',
                async: false,
                data: {
                    mrkp_id: CurrentRowData.mrkp_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyPriceMarkupsDialog").html(Res.html);
                    $('#PriceMarkupsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#btnDelPriceMarkups').on('click', function(){
            if (CurrentRowData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('PriceMarkups/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        mrkp_id: CurrentRowData.mrkp_id
                    },
                    success: function(Res) {
                        $("#PriceMarkupsGrid").jqxGrid('updatebounddata');
                        $('#PriceMarkupsGrid').jqxGrid('selectrow', 0);
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshPriceMarkups').on('click', function(){
            var RowIndex = $('#PriceMarkupsGrid').jqxGrid('getselectedrowindex');
            var Val = $('#PriceMarkupsGrid').jqxGrid('getcellvalue', RowIndex, "mrkp_id");
            Aliton.SelectRowById('mrkp_id', Val, '#PriceMarkupsGrid', true);
        });
        
        
        
        
        $('#btnNewPriceMarkupDetails').on('click', function(){
            $('#PriceMarkupsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '380px', width: '600', position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('PriceMarkupDetails/Create')) ?>,
                type: 'POST',
                async: false,
                data: {
                    mrkp_id: CurrentRowData.mrkp_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyPriceMarkupsDialog").html(Res.html);
                    $('#PriceMarkupsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        
        $('#btnEditPriceMarkupDetails').on('click', function(){
            $('#PriceMarkupsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '380px', width: '600', position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('PriceMarkupDetails/Update')) ?>,
                type: 'POST',
                async: false,
                data: {
                    mrkp_id: CurrentRowData.mrkp_id,
                    mrdt_id: CurrentRowDataDetails.mrdt_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyPriceMarkupsDialog").html(Res.html);
                    $('#PriceMarkupsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#btnDelPriceMarkupDetails').on('click', function(){
            if (CurrentRowData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('PriceMarkupDetails/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        mrdt_id: CurrentRowDataDetails.mrdt_id
                    },
                    success: function(Res) {
                        $("#PriceMarkupDetailsGrid").jqxGrid('updatebounddata');
                        $('#PriceMarkupDetailsGrid').jqxGrid('selectrow', 0);
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshPriceMarkupDetails').on('click', function(){
            var RowIndex = $('#PriceMarkupDetailsGrid').jqxGrid('getselectedrowindex');
            var Val = $('#PriceMarkupDetailsGrid').jqxGrid('getcellvalue', RowIndex, "mrdt_id");
            Aliton.SelectRowById('mrdt_id', Val, '#PriceMarkupDetailsGrid', true);
        });
        
        $('#PriceMarkupsGrid').jqxGrid('selectrow', 0);
        $('#PriceMarkupDetailsGrid').jqxGrid('selectrow', 0);
    });
</script>

<?php $this->setPageTitle('Остатки на складе'); ?>

<?php
    $this->breadcrumbs=array(
        'Склад'=>array('#'),
        'Остатки на складе'=>array('index'),
    );
?>


<div class="row">
    <div class="row-column"><div id="PriceMarkupsGrid" class="jqxGridAliton"></div></div>
    <div class="row-column"><div id="PriceMarkupDetailsGrid" class="jqxGridAliton"></div></div>
</div>
<div class="row" style="margin: 0; padding: 0;">
    <div class="row-column"  style="margin: 0; padding: 0;">
        <div class="row">
            <div class="row-column"><input type="button" value="Создать" id='btnNewPriceMarkups'/></div>
            <div class="row-column"><input type="button" value="Изменить" id='btnEditPriceMarkups'/></div>
        </div>    
        <div class="row">
            <div class="row-column"><input type="button" value="Копировать" id='btnCopyPriceMarkups'/></div>
            <div class="row-column"><input type="button" value="Обновить" id='btnRefreshPriceMarkups'/></div>
        </div>    
        <div class="row">
            <div class="row-column"><input type="button" value="Удалить" id='btnDelPriceMarkups'/></div>
        </div>
    </div>
    
    <div class="row-column" style="margin: 0 0 0 70px; padding: 0;">
        <div class="row">
            <div class="row-column"><input type="button" value="Создать" id='btnNewPriceMarkupDetails'/></div>
            <div class="row-column"><input type="button" value="Изменить" id='btnEditPriceMarkupDetails'/></div>
        </div>    
        <div class="row">
            <div class="row-column"><input type="button" value="Удалить" id='btnDelPriceMarkupDetails'/></div>
            <div class="row-column"><input type="button" value="Обновить" id='btnRefreshPriceMarkupDetails'/></div>
        </div>
    </div>
</div>

<div id="PriceMarkupsDialog" style="display: none;">
    <div id="PriceMarkupsDialogHeader">
        <span id="PriceMarkupsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogPriceMarkupsContent">
        <div style="" id="BodyPriceMarkupsDialog"></div>
    </div>
</div>