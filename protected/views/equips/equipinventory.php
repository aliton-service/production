<script type="text/javascript">
    $(document).ready(function () {
            var Equip_id = <?php echo json_encode($Equip_id); ?>;
            var DataInventory = new $.jqx.dataAdapter($.extend(true, {}, Sources.InventoryEquipsSource), { async: false,
                formatData: function (data) {
                            $.extend(data, {
                                Filters: ["e.Equip_id = " + Equip_id]
                            });
                            return data;
                        }
            });
            
            $("#GridInventory").jqxGrid(
                $.extend(true, {}, GridDefaultSettings, {
                    height: 200,
                    width: '800px',
                    showfilterrow: false,
                    filterable: false,
                    sortable: false,
                    pagesize: 200,
                    virtualmode: false,
                    source: DataInventory,
                    columns:
                        [
                            { text: 'Оборудование', columngroup: 'Group1', datafield: 'EquipName', width: 350 },
                            { text: 'Склад', columngroup: 'Group1', datafield: 'Storage', width: 150 },
                            { text: 'Новое', columngroup: 'Group2', filtertype: 'number', datafield: 'quant', cellsformat: 'f2', width: 130 },
                            { text: 'Б\\У', columngroup: 'Group2', filtertype: 'number', datafield: 'quant_used', cellsformat: 'f2', width: 130 },
                            
                        ],
                    columngroups: 
                        [
                          { text: '', align: 'center', name: 'Group1' },
                          { text: 'Наличие', align: 'center', name: 'Group2' },
                        ],
            }));
            
            $("#btnCloseInventory").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false}));
            $("#btnCloseInventory").on('click', function() {
                $('#WHDocumentsDialog').jqxWindow('close');
            });
    });
</script>    

<style>
    .green_cells {
        color: black;
        background-color: #b6ff00;
    }
</style>    

<div class="row">
    <div id="GridInventory"></div>
</div>
<div class="row">
    <input type="button" value="Закрыть" style="margin-left: 300px;" id='btnCloseInventory' />
</div>



