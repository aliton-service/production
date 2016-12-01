<script type="text/javascript">
    $(document).ready(function () {
        var DataEquipGroups = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEquipGroups));
        DataEquipGroups.dataBind();
        DataEquipGroups = DataEquipGroups.getRecordsHierarchy('group_id', 'parent_group_id', 'items', [{name: 'group_id', map: 'value'}, { name: 'group_name', map: 'label'}]);
        $('#EquipGroupsGrid').jqxTree($.extend({}, TreeDefaultSettings, { source: DataEquipGroups, height: 'calc(100% - 2px)', width: 'calc(100% - 2px)'}));
        var items = $('#EquipGroupsGrid').jqxTree('getItems');
        $("#EquipGroupsGrid").jqxTree('expandItem', items[0]);
        $('#EquipGroupsGrid').jqxTree('selectItem', items[0]);
        var DataEquips = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEquips), {
            filter: function () {
                $("#EquipsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#EquipsGrid").jqxGrid('updatebounddata', 'sort');
            },
            formatData: function (data) {
                var Filters = [];
                var CurrentItem = $("#EquipGroupsGrid").jqxTree('getSelectedItem');
                if (CurrentItem != undefined)
                    Filters[0] = "and eg.code like " + CurrentItem.code;
                
                $.extend(data, {
                    Filters: Filters,
                });
                return data;
            },
        });
        $("#EquipsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: true,
                source: DataEquips,
                width: 'calc(100% - 2px)',
                height: 'calc(100% - 2px)',
                columns: [
                    { text: 'Оборудование', datafield: 'EquipName', filtercondition: 'CONTRAINS', width: 170 },
                    //{ text: 'Запланированная дата', datafield: 'next_date', filtertype: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 170 },
                ]
            })
        );
    });
</script>

<div class="al-row">
    <div class="al-row-column" style="height: calc(100% - 100px); width: calc(30%)">
        <div id="EquipGroupsGrid"></div>
    </div>
    <div class="al-row-column" style="height: calc(100% - 100px); width: calc(70% - 12px)">
        <div id="EquipsGrid"></div>
    </div>
    <div style="clear: both;"></div>
</div>

