<script>
    var WHControls = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceWHControls), {
            formatData: function (data) {
                var Empl = 0;
                if ($("#edEmpl").length>0)
                    if ($("#edEmpl").val() != '')
                        Empl = $("#edEmpl").val();  
                
                $.extend(data, {
                    Filters: ["d.Employee_id = " + Empl],
                });
                return data;
            }});
    
    $(document).ready(function() {
        
        var groupsrenderer = function (text, group, expanded, data) 
        {
            if (data.subItems.length > 0) {
                var EquipName =  data.subItems[0]['EquipName'];
                return '<div class="jqx-grid-groups-row" style="position: absolute;"><span>' + EquipName + '</span></div>';
            }
        };
        
        $("#GridControls").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: 'calc(100% - 2px)',
                width: 'calc(100% - 2px)',
                showfilterrow: false,
                autoshowfiltericon: true,
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                virtualmode: false,
                groupable: true,
                source: WHControls,
                groupsrenderer: groupsrenderer,
                columns:
                    [
                        { text: 'Тип документа', datafield: 'DocTypeName', width: 180},
                        { text: 'Номер', datafield: 'number', width: 110},
                        { text: 'Адрес', datafield: 'Addr', width: 410},
                        { text: 'Количество', datafield: 'Quant', width: 150, cellsalign: 'right', cellsformat: 'f2'},
                        { text: 'Цена', datafield: 'Price', width: 150, cellsalign: 'right', cellsformat: 'f4'},
                        { text: 'Сумма', datafield: 'SumPrice', width: 150, cellsalign: 'right', cellsformat: 'f4'},
                        { text: 'Оборудование', datafield: 'Equip_id', width: 410},
                        { text: 'Сотрудник', datafield: 'MasterName', width: 130},
                        
                    ],
                groups: ['Equip_id']
                    
        }));
        
    });
</script>   

<style>
    #GridControls .jqx-grid-group-cell {
        border-width:0 1px 1px 0;
    }
</style>    

<div class="al-row" style="height: calc(100% - 50px)">
    <div id="GridControls" class="jqxGridAliton"></div>
</div>