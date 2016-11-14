<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowSupplierData;
        
        var SuppliersDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceSuppliers /*, {async: true, id: 'id'} */));

        $('#btnAddSupplier').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditSupplier').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnRefreshSupplier').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelSupplier').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#SuppliersDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '200px', width: '400', position: 'center'}));
        $('#edSupplierFullName').jqxInput($.extend(true, {}, InputDefaultSettings, {width: 'calc(100% - 12px)'}));
        $('#edSupplierNote').jqxInput($.extend(true, {}, InputDefaultSettings, {width: 'calc(100% - 12px)'}));
        $('#edSupplierBank').jqxInput($.extend(true, {}, InputDefaultSettings, {width: 'calc(100% - 12px)'}));
        $('#edSupplierBik').jqxInput($.extend(true, {}, InputDefaultSettings, {width: 'calc(100% - 12px)'}));
        $('#edSupplierCorAccount').jqxInput($.extend(true, {}, InputDefaultSettings, {width: 'calc(100% - 2px)'}));
        
        var CheckButton = function() {
            $('#btnEditSupplier').jqxButton({disabled: !(CurrentRowSupplierData != undefined)})
            $('#btnDelSupplier').jqxButton({disabled: !(CurrentRowSupplierData != undefined)})
        }
        
        $("#SuppliersGrid").on('rowselect', function (event) {
            CurrentRowSupplierData = $('#SuppliersGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (CurrentRowSupplierData != undefined) {
                $('#edSupplierFullName').jqxInput('val', CurrentRowSupplierData.FullName);
                $('#edSupplierNote').jqxInput('val', CurrentRowSupplierData.Note);
                $('#edSupplierBank').jqxInput('val', CurrentRowSupplierData.bank_name);
                $('#edSupplierBik').jqxInput('val', CurrentRowSupplierData.bik);
                $('#edSupplierCorAccount').jqxInput('val', CurrentRowSupplierData.cor_account);
            }
                
            CheckButton();
        });
        
        $("#SuppliersGrid").on('rowdoubleclick', function(){
            $('#btnEditSupplier').click();
        });
        
        $("#SuppliersGrid").on('bindingcomplete', function(){
            if (CurrentRowSupplierData != undefined) 
                Aliton.SelectRowByIdVirtual('Supplier_id', CurrentRowSupplierData.Supplier_id, '#SuppliersGrid', false);
            else
                Aliton.SelectRowByIdVirtual('Supplier_id', null, '#SuppliersGrid', false);
        });
        
        $("#SuppliersGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: '100%',
                height: 'calc(100% - 2px)',
                source: SuppliersDataAdapter,
                columns: [
                    { text: 'Наименование', datafield: 'NameSupplier', filtercondition: 'CONTAINS', width: 320},    
                    { text: 'Адрес', datafield: 'Adress', filtercondition: 'CONTAINS', width: 150},    
                    { text: 'Телефон', datafield: 'Tel', filtercondition: 'CONTAINS', width: 150},    
                    { text: 'Контактное лицо', datafield: 'ContactFace', filtercondition: 'CONTAINS', width: 150},
                    { text: 'Поставщик', columntype: 'checkbox', filtertype: 'bool', datafield: 'Supplier', width: 80},    
                    { text: 'Производитель', columntype: 'checkbox', filtertype: 'bool', datafield: 'Producer', width: 80},    
                    { text: 'СРМ', columntype: 'checkbox', filtertype: 'bool', datafield: 'Repair', width: 80},
                    { text: 'Дата послед. контакта', filtertype: 'date', datafield: 'DateLastContact', width: 120, cellsformat: 'dd.MM.yyyy'},
                    { text: 'Дата послед. закупки', filtertype: 'date', datafield: 'DateLastPurchase', width: 120, cellsformat: 'dd.MM.yyyy'},
                    { text: 'ИНН', datafield: 'inn', width: 120, filtercondition: 'CONTAINS'},
                    { text: 'КПП', datafield: 'kpp', width: 120, filtercondition: 'CONTAINS'},
                    { text: 'Р/Счет', datafield: 'account', width: 120, filtercondition: 'CONTAINS'}
                ]

        }));
        
        $('#btnAddSupplier').on('click', function(){
            $('#SuppliersDialog').jqxWindow({width: 800, height: 460, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Suppliers/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodySuppliersDialog").html(Res.html);
                    $('#SuppliersDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnEditSupplier').on('click', function(){
            if (CurrentRowSupplierData != undefined) {
                $('#SuppliersDialog').jqxWindow({width: 800, height: 480, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Suppliers/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Supplier_id: CurrentRowSupplierData.Supplier_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodySuppliersDialog").html(Res.html);
                        $('#SuppliersDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnDelSupplier').on('click', function(){
            if (CurrentRowSupplierData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Suppliers/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Supplier_id: CurrentRowSupplierData.Supplier_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#SuppliersGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#SuppliersGrid').jqxGrid('getcelltext', RowIndex + 1, "Supplier_id");
                            Aliton.SelectRowById('Supplier_id', Text, '#SuppliersGrid', true);
                            RowIndex = $('#SuppliersGrid').jqxGrid('getselectedrowindex');
                            var S = $('#SuppliersGrid').jqxGrid('getrowdata', RowIndex);
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshSupplier').on('click', function(){
            $('#SuppliersGrid').jqxGrid('updatebounddata');
        });
        
        $('#SuppliersGrid').jqxGrid('selectrow', 0);
    });
</script>

<?php $this->setPageTitle('Должности'); ?>

<?php
    $this->breadcrumbs=array(
            'Кадры'=>array('/Employees/index'),
            'Подразделения'=>array('index'),
    );?>


<div class="al-row" style="height: calc(100% - 164px)">
    <div class="al-row-column" style="width: 100%">
        <div id="SuppliersGrid" class="jqxGridAliton"></div>
    </div>
</div>
<div class="al-row" style="">
    <div class="al-row-column" style="width: calc(50% - 6px)">
        <div class="al-row" style="padding: 0px">Полное наименование</div>
        <div class="al-row"><input type="text" readonly="readonly" id="edSupplierFullName" /></div>
        <div class="al-row" style="padding: 0px">Примечание</div>
        <div class="al-row"><input type="text" readonly="readonly" id="edSupplierNote" /></div>
    </div>
    <div class="al-row-column" style="width: 50%">
        <div class="al-row" style="padding: 0px">Банк</div>
        <div class="al-row"><input type="text" readonly="readonly" id="edSupplierBank" /></div>
        <div class="al-row" style="padding: 0px">
            <div class="al-row-column" style="width: 50%">
                <div class="al-row" style="padding: 0px">БИК</div>
                <div class="al-row"><input type="text" readonly="readonly" id="edSupplierBik" /></div>
            </div>
            <div class="al-row-column" style="width: calc(50% - 12px)">
                <div class="al-row" style="padding: 0px">Кор/Счет</div>
                <div class="al-row"><input type="text" readonly="readonly" id="edSupplierCorAccount" /></div>
            </div>
        </div>
    </div>
    <div style="clear: both"></div>
</div>

<div class="al-row">
    <div class="al-row-column"><input type="button" value="Добавить" id='btnAddSupplier'/></div>
    <div class="al-row-column"><input type="button" value="Изменить" id='btnEditSupplier'/></div>
    <div class="al-row-column"><input type="button" value="Обновить" id='btnRefreshSupplier'/></div>
    <div class="al-row-column" style="float: right; margin: 0px"><input type="button" value="Удалить" id='btnDelSupplier'/></div>
    <div style="clear: both"></div>
</div>    

<div id="SuppliersDialog" style="display: none;">
    <div id="SuppliersDialogHeader">
        <span id="SuppliersHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogSuppliersContent">
        <div style="" id="BodySuppliersDialog"></div>
    </div>
</div>