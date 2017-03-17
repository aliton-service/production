<script type="text/javascript">
    $(document).ready(function () {
        var Form_id = <?php echo json_encode($Form_id); ?>;
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    var CurrentRowData;
                    
                    var HistoryDemandsAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceClientDemands, {
                        filter: function () {
                            $("#HistoryDemandsGrid").jqxGrid('updatebounddata', 'filter');
                        },
                        sort: function () {
                            $("#HistoryDemandsGrid").jqxGrid('updatebounddata', 'sort');
                        },
                    }), {
                        formatData: function (data) {
                            $.extend(data, {
                                Filters: ["d.PropForm_id = " + Form_id],
                            });
                            return data;
                        },
                    });
                    
                    $("#HistoryDemandsGrid").on('rowselect', function (event) {
                        CurrentRowData = $('#HistoryDemandsGrid').jqxGrid('getrowdata', event.args.rowindex);
                    });
                    
                    $("#HistoryDemandsGrid").on('rowdoubleclick', function(){
                        window.open(<?php echo json_encode(Yii::app()->createUrl('Demands/SalesView')); ?> + '&Demand_id=' + CurrentRowData.Demand_id);
                    });
                    
                    $("#HistoryDemandsGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 2px)',
                            width: 'calc(100% - 2px)',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesizeoptions: ['10', '200', '500', '1000'],
                            pagesize: 200,
                            virtualmode: true,
                            source: HistoryDemandsAdapter,
                            columns:
                                [
                                    { text: 'Дата посл. действия', filtertype: 'date', datafield: 'Date', width: 110, cellsformat: 'dd.MM.yyyy'},
                                    { text: 'Номер', datafield: 'Demand_id', width: 100},
                                    { text: 'Адрес', datafield: 'Address', width: 350},
                                    { text: 'Тип', datafield: 'DemandType', width: 150},
                                    { text: 'Этап', datafield: 'StageName', width: 150},
                                    { text: 'Действие', datafield: 'ActionOperationName', width: 150},
                                    { text: 'Администрирующий', datafield: 'EmplName', width: 150},
                                    { text: 'Результат', datafield: 'ActionResultName', width: 100},
                                    { text: 'Контактное лицо', datafield: 'FIO', width: 150},
                                    { text: 'План. действие', filtertype: 'date', datafield: 'NextDate', width: 110, cellsformat: 'dd.MM.yyyy'},
                                    { text: 'Посл. комметарий', datafield: 'Report', width: 150},
                                    { text: 'Исполнители', datafield: 'OtherName', width: 150},
                                ]
                    }));
                    break;
                case 1:
                    break;
            };
        };
        $('#ClientHistoryTabs').jqxTabs({ width: 'calc(100% - 2px)', height: 'calc(100% - 2px)', initTabContent: initWidgets});
    });
</script>

<div class="al-row" style="height: calc(100% - 20px)">
    <div id='ClientHistoryTabs'>
        <ul>
            <li style="margin-left: 30px;">
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Заявки</div>
                </div>
            </li>
            <li style="">
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Графический вид</div>
                </div>
            </li>
        </ul>    
        <div style="overflow: hidden; padding: 10px;">
            <div style="height: calc(100% - 20px)">
                <div id="HistoryDemandsGrid"></div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px;">123</div>
        </div>
    </div>
</div>    
