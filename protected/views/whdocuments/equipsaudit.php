<script type="text/javascript">
    $(document).ready(function () {
            var Docm_id = <?php echo json_encode($Docm_id); ?>;
            var DataHistory = new $.jqx.dataAdapter($.extend(true, {}, Sources.DocmAchsDetailsAuditSource), { async: false,
                formatData: function (data) {
                            $.extend(data, {
                                Filters: ["d.Docm_id = " + Docm_id]
                            });
                            return data;
                        }
            });
            
            var isnull = function(value, value2) {
                if (value === null)
                    return value2;
                else
                    return value;
            }
            
            var cellclass = function (row, columnfield, value) {
                row = $("#GridHistory").jqxGrid('getrowdata', row);
                if (row['Action'] === 1)
                    return '';
                if (row['Action'] === 3)
                    return 'red_cells';
                if (columnfield == 'EquipName') {
                    if (row['Old' + columnfield] != value)
                        return 'green_cells';
                    return '';
                }
                if (isnull(row['old_' + columnfield], '') != value) 
                    return 'green_cells';
            }
            
            $("#GridHistory").jqxGrid(
                $.extend(true, {}, GridDefaultSettings, {
                    height: 200,
                    width: '800px',
                    showfilterrow: false,
                    filterable: false,
                    sortable: false,
                    pagesize: 200,
                    virtualmode: false,
                    source: DataHistory,
                    columns:
                        [
                            { text: 'Действие', columngroup: 'Action', datafield: 'ActionName', width: 100 },
                            { text: 'Дата', columngroup: 'Action', filtertype: 'date', datafield: 'ActionDate', cellsformat: 'dd.MM.yyyy HH:mm', width: 130 },
                            { text: 'Изменил', columngroup: 'Action', datafield: 'ActionEmpl', width: 100 },
                            { text: 'Оборудование', columngroup: 'After', cellclassname: cellclass, datafield: 'EquipName', width: 200 },
                            { text: 'Кол-во', columngroup: 'After', datafield: 'docm_quant', cellclassname: cellclass, width: 80, cellsformat: 'f2' },
                            { text: 'Факт кол-во', columngroup: 'After', cellclassname: cellclass, datafield: 'fact_quant', width: 100, cellsformat: 'f2' },
                            { text: 'Цена', columngroup: 'After', cellclassname: cellclass, datafield: 'price', width: 120, cellsformat: 'f2' },
                            { text: 'Сумма', columngroup: 'After', cellclassname: cellclass, datafield: 'sum', width: 130, cellsformat: 'f2'},
                            { text: 'Б\\У', columngroup: 'After', cellclassname: cellclass, filtertype: 'checkbox', columntype: 'checkbox', datafield: 'used', width: 50 },
                            { text: 'В производство', columngroup: 'After', cellclassname: cellclass, filtertype: 'checkbox', columntype: 'checkbox', datafield: 'ToProduction', width: 100 },
                            { text: 'Без прайса', columngroup: 'After', cellclassname: cellclass, filtertype: 'checkbox', columntype: 'checkbox', datafield: 'no_price_list', width: 100 },
                            
                            { text: 'Оборудование', columngroup: 'Before', datafield: 'OldEquipName', width: 200 },
                            { text: 'Кол-во', columngroup: 'Before', datafield: 'old_docm_quant', width: 80, cellsformat: 'f2' },
                            { text: 'Факт кол-во', columngroup: 'Before', datafield: 'old_fact_quant', width: 120, cellsformat: 'f2' },
                            { text: 'Цена', columngroup: 'Before', datafield: 'old_price', width: 100, cellsformat: 'f2' },
                            { text: 'Сумма', columngroup: 'Before', datafield: 'old_sum', width: 130, cellsformat: 'f2'},
                            { text: 'Б\\У', columngroup: 'Before', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'old_used', width: 50 },
                            { text: 'В производство', columngroup: 'Before', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'old_ToProduction', width: 100 },
                            { text: 'Без прайса', columngroup: 'Before', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'old_no_price_list', width: 100 },
                        ],
                    columngroups: 
                        [
                          { text: 'Действие', align: 'center', name: 'Action' },
                          { text: 'После изменений', align: 'center', name: 'After' },
                          { text: 'До изменений', align: 'center', name: 'Before' },
                        ],
            }));
            
            $("#btnCloseHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false}));
            $("#btnCloseHistory").on('click', function() {
                $('#WHDocumentsDialog').jqxWindow('close');
            });
    });
</script>    

<style>
    .green_cells {
        color: black;
        background-color: #b6ff00;
    }
    .red_cells {
        color: black;
        background-color: #ff391b;
    }
</style>    

<div class="row">
    <div id="GridHistory"></div>
</div>
<div class="row">
    <div class="row-column" style="background-color: #b6ff00">*Зеленый цвет, означает изменения в полях.</div>
    <div class="row-column" style="background-color: #ff391b">*Красный цвет, означает удаление позиции.</div>
</div>
<div class="row">
    <input type="button" value="Закрыть" style="margin-left: 300px;" id='btnCloseHistory' />
</div>

