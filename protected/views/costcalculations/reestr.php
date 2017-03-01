<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    $('#btnInfo').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnClient').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnDemand').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnRefresh').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnExport').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    
                    
                    $('#btnInfo').on('click', function() {
                        if (CurrentRowData != undefined)
                            window.open(<?php echo json_encode(Yii::app()->createUrl('CostCalculations/Index'))?> + '&calc_id=' + CurrentRowData.Calc_id);
                    });
                    
                    $('#btnClient').on('click', function() {
                        if (CurrentRowData != undefined)
                            window.open(<?php echo json_encode(Yii::app()->createUrl('Objectsgroup/index'))?> + '&ObjectGr_id=' + CurrentRowData.ObjectGr_id);
                    });
                    
                    $('#btnDemand').on('click', function() {
                        if (CurrentRowData != undefined)
                            window.open(<?php echo json_encode(Yii::app()->createUrl('Demands/View'))?> + '&Demand_id=' + CurrentRowData.Demand_id);
                    });
                    
                    $('#btnExport').on('click', function() {
                        $("#CostCalcGrid").jqxGrid('exportdata', 'xls', 'Сметы', true, null, true, <?php echo json_encode(Yii::app()->createUrl('Reports/UpLoadFileGrid'))?>);
                    });
                    
                    $('#btnRefresh').on('click', function() {
                        $('#edFiltering').click();
                    });
                    
                    $("#CostCalcGrid").on('rowselect', function (event) {
                        CurrentRowData = $('#CostCalcGrid').jqxGrid('getrowdata', event.args.rowindex);
                    });
                    
                    $("#CostCalcGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            pagesizeoptions: ['10', '200', '500', '1000'],
                            pagesize: 200,
                            showfilterrow: false,
                            virtualmode: true,
                            width: 'calc(100% - 2px)',
                            height: 'calc(100% - 2px)',
                            columns: [
                                { text: 'Номер', datafield: 'Calc_id', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 90 },
                                { text: 'Дата', datafield: 'Date', filtertype: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 110 },
                                { text: 'Наименование', datafield: 'Name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 },
                                { text: 'Адрес', datafield: 'Addr', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                                { text: 'Менеджер', datafield: 'MngrShortName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 120 },
                                { text: 'Заявка №', datafield: 'Demand_id', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 90 },
                                { text: 'Выполнение заявки', datafield: 'DateExec', filtertype: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 110 },
                                { text: 'Сумма', datafield: 'Sum_High_Full', cellsformat: 'f2', filtercondition: 'STARTS_WITH', width: 110, cellsalign: 'right' },
                                { text: 'Оплата', datafield: 'SumPay', cellsformat: 'f2', filtercondition: 'STARTS_WITH', width: 110, cellsalign: 'right' },
                                { text: 'Оплата %', datafield: 'ProcPay', cellsformat: 'f2', filtercondition: 'STARTS_WITH', width: 110, cellsalign: 'right' },
                                { text: 'Отправил в работу', datafield: 'TrebShortName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 110 },
                                { text: 'Дата треб.', datafield: 'TrebDate', filtertype: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 110 },
                                { text: 'Номер треб.', datafield: 'Number', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 110 },
                                { text: 'Юр. лицо', datafield: 'JuridicalPerson', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 120 },
                                { text: 'Вид оплаты', datafield: 'PaymentTypeName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 60 },
                                { text: 'Себест. ФОТ', datafield: 'Sum_Works_Low', cellsformat: 'f2', filtercondition: 'STARTS_WITH', width: 110, cellsalign: 'right' },
                                { text: 'Согл. с рук.', datafield: 'AgreedShortName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 120 },
                                { text: 'Дата согл. с рук.', datafield: 'Date_Agreed', filtertype: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 110 },
                                { text: 'Участок', datafield: 'Territ_id', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 90, hidden: true },
                            ]
                        })
                    );
                    
                    $('#CostCalcGrid').on('rowdoubleclick', function (event) { 
                        $("#btnInfo").click();
                    });
                    break;
            }
        };
        
        $('#jqxTabs').jqxTabs({ width: 'calc(100% - 2px)', height: 'calc(100% - 2px)',  initTabContent: initWidgets });
        
        
        
    });
</script>
<div class="al-row" style="height: calc(100% - 20px)">
    <div id='jqxTabs' style="">
        <ul>
            <li style="margin-left: 20px;">
                <div style="height: 15px; margin-top: 3px;">
                    <div style="vertical-align: middle; text-align: center; float: left; margin-left: 4px">
                        Сметы
                    </div>
                </div>
            </li>
            <li>
                <div style="height: 15px; margin-top: 3px;">
                    <div style="vertical-align: middle; text-align: center; float: left; margin-left: 4px">
                        Документы
                    </div>
                </div>
            </li>
        </ul>
        <div style="overflow: auto; height: calc(100% - 2px); background-color: #F2F2F2;">
            <div style="overflow: auto; padding: 10px;">
                <div class="al-row" style="height: calc(100% - 74px)">
                    <div id="CostCalcGrid" class="jqxGridAliton"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column"><input type="button" id="btnInfo" value="Доп-но" /></div>
                    <div class="al-row-column"><input type="button" id="btnClient" value="Карточка" /></div>
                    <div class="al-row-column"><input type="button" id="btnDemand" value="Заявка" /></div>
                    <div class="al-row-column"><input type="button" id="btnRefresh" value="Обновить" /></div>
                    <div class="al-row-column"><input type="button" id="btnExport" value="Экспорт" /></div>
                </div>
            </div>
        </div>
        <div style="overflow: auto; height: calc(100% - 2px); background-color: #F2F2F2;">
            <div style="overflow: auto; padding: 10px;"></div>
        </div>
    </div>
</div>

<?php 

    $m = new CostCalculations_v();
    
    //$Res = $m->Find();

?>

