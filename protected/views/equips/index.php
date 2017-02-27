<script type="text/javascript">
    var EquipsInfo = {};
    $(document).ready(function () {
        var Change = false;
        var CurrentRowData;
        var First = true;
        var DataEquipGroups = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEquipGroups));
        DataEquipGroups.dataBind();
        var Records = DataEquipGroups.records;
        var DataTreeEquipGroups = DataEquipGroups.getRecordsHierarchy('group_id', 'parent_group_id', 'items', [{name: 'group_id', map: 'value'}, { name: 'group_name', map: 'label'}]);
        $('#EquipGroupsGrid').jqxTree($.extend({}, TreeDefaultSettings, { source: DataTreeEquipGroups, height: 'calc(100% - 2px)', width: 'calc(100% - 2px)'}));
        
        var items = $('#EquipGroupsGrid').jqxTree('getItems');
        $("#EquipGroupsGrid").jqxTree('expandItem', items[0]);
        $('#EquipGroupsGrid').jqxTree('selectItem', items[0]);
        
        var DataEquips = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEquips, {
            filter: function () {
                $("#EquipsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#EquipsGrid").jqxGrid('updatebounddata', 'sort');
            },
        }));
        
        EquipsInfo.GetInventory = function(Equip_id) {
            if (Equip_id == CurrentRowData.Equip_id) 
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Equips/EquipInfoStorage')); ?>,
                    type: 'POST',
                    async: true,
                    data: {
                        Equip_id: CurrentRowData.Equip_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#edStorage1InvQuant").val(Res.Storage1Quant);
                        $("#edStorage1InvQuantUsed").val(Res.Storage1QuantUsed);
                        $("#edStorage2InvQuant").val(Res.Storage2Quant);
                        $("#edStorage2InvQuantUsed").val(Res.Storage2QuantUsed);
                    }
                });
        };
        
        $("#EquipsGrid").on('rowselect', function (event) {
            CurrentRowData = $('#EquipsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (CurrentRowData != undefined) {
                $("#edDescription").jqxInput('val', CurrentRowData.Description); 
                window.setTimeout("EquipsInfo.GetInventory(" + CurrentRowData.Equip_id + ")", 600);
                
                if (CurrentRowData.EmplChangeInventory != null) {
                    $("#edStorage1InvQuant input").css({'background-color': '#00FF00'});
                    $("#edStorage1InvQuantUsed input").css({'background-color': '#00FF00'});
                }
                else {
                    $("#edStorage1InvQuant input").css({'background-color': 'white'});
                    $("#edStorage1InvQuantUsed input").css({'background-color': 'white'});
                }
            }
        });
        
        $("#EquipsGrid").on('bindingcomplete', function(){
            if (CurrentRowData != undefined) { 
                Aliton.SelectRowByIdVirtual('Equip_id', CurrentRowData.Equip_id, '#EquipsGrid', false);
            }
            else Aliton.SelectRowByIdVirtual('Equip_id', null, '#EquipsGrid', false);
            
        });
        
        $("#EquipsGrid").on('dblclick', function() {
            $("#btnEditEquip").click();
        });
        
        $("#EquipsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: true,
                width: 'calc(100% - 2px)',
                height: 'calc(100% - 2px)',
                columns: [
                    { text: 'Артикул', columngroup: 'Generals', datafield: 'Equip_id', filtercondition: 'CONTRAINS', width: 100 },
                    { text: 'Оборудование', columngroup: 'Generals', datafield: 'EquipName', filtercondition: 'CONTRAINS', width: 170 },
                    { text: 'Ветка', columngroup: 'Generals', datafield: 'full_group_name', filtercondition: 'STARTS_WITH', width: 170 },
                    { text: 'Ед. изм.', columngroup: 'Generals', datafield: 'NameUnitMeasurement', filtercondition: 'STARTS_WITH', width: 80 },
                    { text: 'Производитель', columngroup: 'Generals', datafield: 'NameSupplier', filtercondition: 'STARTS_WITH', width: 110 },
                    { text: 'Снят с производства', columngroup: 'Generals', datafield: 'discontinued', filtertype: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 120 },
                    { text: 'Тип учета', columngroup: 'Generals', datafield: 'actp_name', filtercondition: 'STARTS_WITH', width: 110 },
                    { text: 'Категория', columngroup: 'Generals', datafield: 'ctgr_name', filtercondition: 'STARTS_WITH', width: 110 },
                    { text: 'Группа', columngroup: 'Generals', datafield: 'grp_name', filtercondition: 'STARTS_WITH', width: 110 },
                    { text: 'Подгруппа', columngroup: 'Generals', datafield: 'sgrp_name', filtercondition: 'STARTS_WITH', width: 110 },
                    { text: 'Тип системы', columngroup: 'Generals', datafield: 'SystemTypeName', filtercondition: 'STARTS_WITH', width: 110 },
                    { text: 'Время ТО', columngroup: 'Generals', datafield: 'ServicingTime', filtercondition: 'STARTS_WITH', width: 110 },
                    { text: 'Адрес', columngroup: 'Generals', datafield: 'AddressedStorage', filtercondition: 'STARTS_WITH', width: 110,
                        cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
                                return '<div style=\'float: left; width: 80%; height: 100%;\'>' + value + ' </div>\n\
                                            <div style=\'float: left; width: 20%\'>\n\
                                                <button onclick=\'EquipsInfo.AddressStorage();\' style=\'float: right; margin-top: 4px;\'>...</button>\n\
                                            </div>';
                            }
                    },
                    { text: 'Аналоги', columngroup: 'Generals', datafield: 'Analogs', filtercondition: 'STARTS_WITH', width: 110 },
                    { text: 'Замена', columngroup: 'Generals', datafield: 'Replacement', filtercondition: 'STARTS_WITH', width: 110 },
                    { text: 'Комплект', columngroup: 'Generals', datafield: 'Sets', filtercondition: 'STARTS_WITH', width: 110 },
                    { text: 'Нужна', columngroup: 'Instructions', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'must_instruction', width: 100 },
                    { text: 'Есть', columngroup: 'Instructions', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'there_instruction', width: 100 },
                    { text: 'Нужна', columngroup: 'Photo', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'must_photo', width: 100 },
                    { text: 'Есть', columngroup: 'Photo', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'there_photo', width: 100 },
                    { text: 'Нужна', columngroup: 'Analog', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'must_analog', width: 100 },
                    { text: 'Есть', columngroup: 'Analog', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'there_analog', width: 100 },
                    { text: 'Нужен', columngroup: 'Producer', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'must_producer', width: 100 },
                    { text: 'Есть', columngroup: 'Producer', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'there_producer', width: 100 },
                    { text: 'Нужен', columngroup: 'Supplier', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'must_supplier', width: 100 },
                    { text: 'Есть', columngroup: 'Supplier', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'there_supplier', width: 100 },
                ],
                columngroups: 
                [
                  { text: 'Оборудование', align: 'center', name: 'Generals' },
                  { text: 'Инструкция', align: 'center', name: 'Instructions' },
                  { text: 'Фотография', align: 'center', name: 'Photo' },
                  { text: 'Аналог', align: 'center', name: 'Analog' },
                  { text: 'Производитель', align: 'center', name: 'Producer' },
                  { text: 'Поставщик', align: 'center', name: 'Supplier' },
                ]
                
            })
        );
        
        $("#edStorage1InvQuant").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px'}));
        $("#edStorage1InvQuantUsed").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px'}));
        $("#edStorage2InvQuant").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px'}));
        $("#edStorage2InvQuantUsed").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px'}));
        $("#edDescription").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 'calc(100% - 2px)'}));
        
        $("#btnAddEquip").jqxButton($.extend(true, {}, ButtonDefaultSettings, {}));
        $("#btnEditEquip").jqxButton($.extend(true, {}, ButtonDefaultSettings, {}));
        $("#btnHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings, {}));
        $("#btnMerge").jqxButton($.extend(true, {}, ButtonDefaultSettings, {}));
        
        $("#btnHistory").on('click', function() {
            $('#EquipsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {width: 970, resizable: true, height: 713, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Equips/History')); ?>,
                type: 'POST',
                async: false,
                data: {
                    Equip_id: CurrentRowData.Equip_id,
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyEquipsDialog").html(Res.html);
                    $('#EquipsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $("#btnAddEquip").on('click', function() {
            $('#EquipsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {width: 780, height: 600, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Equips/Create')); ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyEquipsDialog").html(Res.html);
                    $('#EquipsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $("#btnEditEquip").on('click', function() {
            $('#EquipsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {width: 780, height: 600, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Equips/Update')); ?>,
                type: 'POST',
                async: false,
                data: {
                    Equip_id: CurrentRowData.Equip_id, 
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyEquipsDialog").html(Res.html);
                    $('#EquipsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        var Refresh = function() {
            var CurrentItem = $("#EquipGroupsGrid").jqxTree('getSelectedItem');
            var Code = '';
            for (var i=0; i <= Records.length; i++)
                if (Records[i].group_id == CurrentItem.value) {
                    Code = Records[i].code;
                    break;
                }
            var GroupFilterGroup = new $.jqx.filter();
            if (Code != '') {
                var FilterGroup = GroupFilterGroup.createfilter('stringfilter', Code, 'STARTS_WITH');
                GroupFilterGroup.addfilter(1, FilterGroup);
            }
            $('#EquipsGrid').jqxGrid('removefilter', 'full_group_name', false);
            if (Code != '') $("#EquipsGrid").jqxGrid('addfilter', 'full_group_name', GroupFilterGroup);
            $('#EquipsGrid').jqxGrid({source: DataEquips});
        };
        
        $('#btnRefresh').jqxButton($.extend(true, {}, ButtonDefaultSettings, {}));
        $('#btnRefresh').on('click', function() {
            Refresh();
        });
        
        $('#EquipGroupsGrid').on('select',function (event) {
            Refresh();
        });
        
        EquipsInfo.AddressStorage = function() {
            if (CurrentRowData !== undefined) {
                $('#EquipsDialog').jqxWindow({width: 600, height: 440, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('AddressedStorage/Index')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Equip_id: CurrentRowData.Equip_id,
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyEquipsDialog").html(Res.html);
                        $('#EquipsDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        };
        
        Refresh();
        
    });
</script>

<div class="al-row">
    <div class="al-row-column" style="height: calc(100% - 116px); width: calc(30%)">
        <div id="EquipGroupsGrid"></div>
    </div>
    <div class="al-row-column" style="height: calc(100% - 116px); width: calc(70% - 12px)">
        <div id="EquipsGrid"></div>
    </div>
    <div style="clear: both;"></div>
</div>
<div class="al-row">
    <div class="al-row-column">Главный склад: Новое</div>
    <div class="al-row-column"><div id="edStorage1InvQuant"></div></div>
    <div class="al-row-column">Б\У</div>
    <div class="al-row-column"><div id="edStorage1InvQuantUsed"></div></div>
    <div class="al-row-column">Южный склад: Новое</div>
    <div class="al-row-column"><div id="edStorage2InvQuant"></div></div>
    <div class="al-row-column">Б\У</div>
    <div class="al-row-column"><div id="edStorage2InvQuantUsed"></div></div>
    <div style="clear: both;"></div>
</div>
<div class="al-row">
    <div class="al-row-column">Описание</div>
    <div class="al-row-column" style="width: calc(100% - 100px)"><input type="text" id="edDescription" /></div>
    <div style="clear: both;"></div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" id="btnAddEquip" value="Добавить"/></div>
    <div class="al-row-column"><input type="button" id="btnEditEquip" value="Изменить"/></div>
    <div class="al-row-column"><input type="button" id="btnRefresh" value="Обновить"/></div>
    <div class="al-row-column"><input type="button" id="btnHistory" value="История"/></div>
    <div class="al-row-column"><input type="button" id="btnMerge" value="Объединить"/></div>
    <div style="clear: both;"></div>
</div>

<div id="EquipsDialog" style="display: none;">
    <div id="EquipsDialogHeader">
        <span id="EquipsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogEquipsContent">
        <div style="" id="BodyEquipsDialog"></div>
    </div>
</div>

