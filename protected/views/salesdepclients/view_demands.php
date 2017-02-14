<script>
    var Form_id;
    $(document).ready(function () {
        var CurrentRowData;
        Form_id = <?php echo json_encode($Form_id); ?>;
        var LastContact = {
            Date: Aliton.DateConvertToJs('<?php echo $LastContact['Date']; ?>'),
            ActionOperationName: <?php echo json_encode($LastContact['ActionOperationName']); ?>,
            ActionResultName: <?php echo json_encode($LastContact['ActionResultName']); ?>,
            NextAction: <?php echo json_encode($LastContact['NextAction']); ?>,
            NextDate: Aliton.DateConvertToJs('<?php echo $LastContact['NextDate']; ?>'),
            OtherName: <?php echo json_encode($LastContact['OtherName']); ?>,
            Report: <?php echo json_encode($LastContact['Report']); ?>,
        };
        
        $("#edDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '110px', formatString: 'dd.MM.yyyy', value: LastContact.Date })); 
        $("#edOperation").jqxInput({height: 25, width: 150, minLength: 1, value: LastContact.ActionOperationName});
        $("#edResult").jqxInput({height: 25, width: 150, minLength: 1, value: LastContact.ActionResultName});
        $("#edNextDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '110px', formatString: 'dd.MM.yyyy', value: LastContact.NextDate })); 
        $("#edOtherName").jqxInput({height: 25, width: 150, minLength: 1, value: LastContact.OtherName});
        $("#edReport").jqxInput({height: 25, width: 350, minLength: 1, value: LastContact.Report});
        $("#edNexAction").jqxInput({height: 25, width: 350, minLength: 1, value: LastContact.NextAction});
        $('#btnDemandView').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 180 }));
        $('#btnClientView').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 180 }));
        
        $('#btnDemandView').on('click', function(){
            if (CurrentRowData != undefined)
                window.open(<?php echo json_encode(Yii::app()->createUrl('Demands/SalesView')); ?> + '&Demand_id=' + CurrentRowData.Demand_id );
        });
        $('#btnClientView').on('click', function(){
            if (CurrentRowData != undefined)
                window.open(<?php echo json_encode(Yii::app()->createUrl('ObjectsGroup/Index')); ?> + '&ObjectGr_id=' + CurrentRowData.ObjectGr_id );
        });
        
        $("#DemandsGrid").on('rowselect', function (event) {
            CurrentRowData = $('#DemandsGrid').jqxGrid('getrowdata', event.args.rowindex);
        });

        $("#DemandsGrid").on('rowdoubleclick', function(){
            $('#btnDemandView').click();
        });
        
        $("#DemandsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: 'calc(100% - 2px)',
                width: 'calc(100% - 2px)',
                showfilterrow: false,
                autoshowfiltericon: true,
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                virtualmode: true,
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
    });
</script>

<?php $this->setPageTitle('Заявки клиента ' . $FullName); ?>

<div class="al-row" style="padding: 0px">
    <div class="al-row">Последнее действие по клиенту</div>
    <div class="al-row">
        <div class="al-row-column">Дата</div>
        <div class="al-row-column"><div id="edDate"></div></div>
        <div class="al-row-column">Действие</div>
        <div class="al-row-column"><input id="edOperation" /></div>
        <div class="al-row-column">Результат</div>
        <div class="al-row-column"><input id="edResult" /></div>
        
        <div class="al-row-column">Дата план. действия</div>
        <div class="al-row-column"><div id="edNextDate"></div></div>
        <div class="al-row-column">Исполнитель</div>
        <div class="al-row-column"><input id="edOtherName" /></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row-column">Комментарий</div>
        <div class="al-row-column"><input id="edReport" /></div>
        <div class="al-row-column">Планируемое действие</div>
        <div class="al-row-column"><input id="edNexAction" /></div>
        <div style="clear: both"></div>
    </div>
</div>
<div class="al-row" style="height: calc(100% - 140px)">
    <div id="DemandsGrid"></div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" id="btnDemandView" value="Карточка заявки"/></div>
    <div class="al-row-column"><input type="button" id="btnClientView" value="Карточка клиента"/></div>
</div>
