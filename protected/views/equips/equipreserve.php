<script type="text/javascript">
    $(document).ready(function () {
            var Equip_id = <?php echo json_encode($Equip_id); ?>;
            var DataReserve = new $.jqx.dataAdapter($.extend(true, {}, Sources.DocmAchsDetailsReservSource), { async: false,
                formatData: function (data) {
                            $.extend(data, {
                                Filters: ["dt.Eqip_id = " + Equip_id]
                            });
                            return data;
                        }
            });
            
            $("#GridReserve").jqxGrid(
                $.extend(true, {}, GridDefaultSettings, {
                    height: 200,
                    width: '800px',
                    showstatusbar: true,
                    showfilterrow: false,
                    filterable: false,
                    showaggregates: true,
                    sortable: false,
                    pagesize: 200,
                    virtualmode: false,
                    source: DataReserve,
                    columns:
                        [
                            { text: 'Номер', datafield: 'number', width: 100 },
                            { text: 'Оборудование', datafield: 'EquipName', width: 200 },
                            { text: 'Ед. изм.', datafield: 'NameUnitMeasurement', width: 80 },
                            { text: 'Кол-во', datafield: 'docm_quant', width: 120, cellsformat: 'f2', aggregates: [{ 'Всего':
                                function (aggregatedValue, currentValue) {
                                    return aggregatedValue + currentValue;
                                }
                              }]},
                            { text: 'Факт кол-во', datafield: 'fact_quant', width: 120, cellsformat: 'f2' },
                            { text: 'Цена', datafield: 'price', width: 120, cellsformat: 'f2' },
                            { text: 'Сумма', datafield: 'sum', width: 180, cellsformat: 'f2'},
                            { text: 'Б\\У', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'used', width: 50 },
                            { text: 'В производство', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'ToProduction', width: 100 },
                            { text: 'Серийные номера', datafield: 'SN', width: 150 },
                            { text: 'Без прайса', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'no_price_list', width: 100 },
                            
                        ],
                    
            }));
            
            $("#btnCloseReserve").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false}));
            $("#btnCloseReserve").on('click', function() {
                $('#WHDocumentsDialog').jqxWindow('close');
            });
    });
</script>    

  

<div class="row">
    <div id="GridReserve"></div>
</div>
<div class="row">
    <input type="button" value="Закрыть" style="margin-left: 300px;" id='btnCloseReserve' />
</div>




