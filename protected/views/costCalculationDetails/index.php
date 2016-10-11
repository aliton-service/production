<script type="text/javascript">
    $(document).ready(function () {

        var CostCalcDetails = {
            calc_id: '<?php echo $model->calc_id; ?>',
            date: Aliton.DateConvertToJs('<?php echo $model->date; ?>'),
            group_name: '<?php echo $model->group_name; ?>',
            workname: '<?php echo $model->workname; ?>',
            empl_name: '<?php echo $model->empl_name; ?>',
            jrdc_name: '<?php echo $model->jrdc_name; ?>',
            RegistrationName: '<?php echo $model->RegistrationName; ?>',
            best_date: Aliton.DateConvertToJs('<?php echo $model->best_date; ?>'),
            Demand_id: '<?php echo $model->Demand_id; ?>',
            sum_materials_low: '<?php echo $model->sum_materials_low; ?>',
            date_ready: Aliton.DateConvertToJs('<?php echo $model->date_ready; ?>'),
            spec_condt: '<?php echo $model->spec_condt; ?>',
            note: '<?php echo $model->note; ?>',
            EmplAgreed: '<?php echo $model->EmplAgreed; ?>',
//            CostCalcType: '<?php // echo $model->CostCalcType; ?>',
        };
        
        $("#DateCC").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CostCalcDetails.date, formatString: 'dd.MM.yyyy', readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 90}));
        $("#group_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 220 }));
        $("#workname").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 150 }));
        $("#empl_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 150 }));
        $("#jrdc_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 220 }));
        $("#RegistrationName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 160 }));
        $("#best_date").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CostCalcDetails.best_date, formatString: 'dd.MM.yyyy', readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 90}));
        $("#Demand_id").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 87 }));
        $("#sum_materials_low").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 100 }));
        $("#date_ready").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CostCalcDetails.date_ready, formatString: 'dd.MM.yyyy', readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 90}));
        
        $("#spec_condt").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 500, height: 55 }));
        $("#note").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 500, height: 55 }));
        $("#EmplAgreed").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 200 }));
        
        $('#btnEditCostCalcDetails').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        if (CostCalcDetails.group_name !== '') $("#group_name").jqxInput('val', CostCalcDetails.group_name);
        if (CostCalcDetails.workname !== '') $("#workname").jqxInput('val', CostCalcDetails.workname);
        if (CostCalcDetails.empl_name !== '') $("#empl_name").jqxInput('val', CostCalcDetails.empl_name);
        if (CostCalcDetails.jrdc_name !== '') $("#jrdc_name").jqxInput('val', CostCalcDetails.jrdc_name);
        if (CostCalcDetails.RegistrationName !== '') $("#RegistrationName").jqxInput('val', CostCalcDetails.RegistrationName);
        if (CostCalcDetails.Demand_id !== '') $("#Demand_id").jqxInput('val', CostCalcDetails.Demand_id);
        if (CostCalcDetails.sum_materials_low !== '') $("#sum_materials_low").jqxInput('val', CostCalcDetails.sum_materials_low);
        
        if (CostCalcDetails.spec_condt !== '') $("#spec_condt").jqxTextArea('val', CostCalcDetails.spec_condt);
        if (CostCalcDetails.note !== '') $("#note").jqxTextArea('val', CostCalcDetails.note);
        
        if (CostCalcDetails.EmplAgreed !== '') $("#EmplAgreed").jqxInput('val', CostCalcDetails.EmplAgreed);
        
        
        
        $('#jqxTabsCostCalcDetails').jqxTabs({ width: '99%', height: 290 });
        $('#jqxTabsCostCalcDetails').jqxTabs({ selectedItem: 3 }); 
        



        
        
        /* Текущая выбранная строка данных */
        var CurrentRowDataCCE;
        
        var CostCalcEquipsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceCostCalcEquips), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["t.calc_id = " + CostCalcDetails.calc_id],
                });
                return data;
            },
        });
        
        $("#CostCalcEquipsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showstatusbar: true,
                showaggregates: true,
                showfilterrow: false,
                width: '99%',
                height: '200',
                source: CostCalcEquipsDataAdapter,
                columns: [
                    { text: 'Наименование', datafield: 'eqip_name', columngroup: 'Equips', filtercondition: 'CONTAINS', width: 250},    
                    { text: 'Ед.изм', datafield: 'um_name', columngroup: 'Equips', filtercondition: 'CONTAINS', width: 60},    
                    { text: 'Кол-во', datafield: 'quant', columngroup: 'Equips', filtercondition: 'CONTAINS', width: 60},    
                    { text: 'Цена за единицу', datafield: 'price', columngroup: 'Equips', filtercondition: 'CONTAINS', width: 130},    
                    { text: 'Стоимость', datafield: 'sum_price', columngroup: 'Equips', filtercondition: 'CONTAINS', width: 110, aggregates: [
                          { 'Сумма':
                            function (aggregatedValue, currentValue) {
                                return aggregatedValue + currentValue;
                            }
                          }
                      ]},
                    
                    { text: 'Цена за единицу', datafield: 'price_low', columngroup: 'WorkPrice', filtercondition: 'CONTAINS', width: 130},
                    { text: 'Стоимость', datafield: 'sum_low', columngroup: 'WorkPrice', filtercondition: 'CONTAINS', width: 110, aggregates: [
                          { 'Сумма':
                            function (aggregatedValue, currentValue) {
                                return aggregatedValue + currentValue;
                            }
                          }
                      ]},
                    
                    { text: 'Себест.', datafield: 'work_price', columngroup: 'FOT', filtercondition: 'CONTAINS', width: 80},    
                    { text: 'Итого', datafield: 'work_sum', columngroup: 'FOT', filtercondition: 'CONTAINS', width: 80},    
                ],
                columngroups: [
                    { text: 'Оборудование', align: 'center', name: 'Equips' },
                    { text: 'Себестоимость', align: 'center', name: 'WorkPrice' },
                    { text: 'ФОТ', align: 'center', name: 'FOT' },
                ]
            })
        );
        
        $('#AddCostCalcEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#EditCostCalcEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
        $('#RefreshCostCalcEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#AddWorkCostCalcEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
        $('#DelCostCalcEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
        
        var CheckButtonCCE = function() {
            $('#EditCostCalcEquips').jqxButton({disabled: !(CurrentRowDataCCE != undefined)})
            $('#AddWorkCostCalcEquips').jqxButton({disabled: !(CurrentRowDataCCE != undefined)})
            $('#DelCostCalcEquips').jqxButton({disabled: !(CurrentRowDataCCE != undefined)})
        };
        
        $("#CostCalcEquipsGrid").on('rowselect', function (event) {
            CurrentRowDataCCE = $('#CostCalcEquipsGrid').jqxGrid('getrowdata', event.args.rowindex);
//            console.log(CurrentRowDataCCE);
            CheckButtonCCE();
        });
        
        $('#AddCostCalcEquips').on('click', function(){
            $('#CostCalcDetailsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 390, width: 610, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalcEquips/Create')) ?>,
                type: 'POST',
                async: false,
                data: {
                    calc_id: CostCalcDetails.calc_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyCostCalcDetailsDialog").html(Res.html);
                    $('#CostCalcDetailsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#CostCalcEquipsGrid').on('rowdoubleclick', function (event) { 
            $("#EditCostCalcEquips").click();
        });
        
        $('#EditCostCalcEquips').on('click', function(){
            $('#CostCalcDetailsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 390, width: 610, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalcEquips/Update')) ?>,
                type: 'POST',
                async: false,
                data: {
                    cceq_id: CurrentRowDataCCE.cceq_id,
                    calc_id: CostCalcDetails.calc_id,
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyCostCalcDetailsDialog").html(Res.html);
                    $('#CostCalcDetailsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#DelCostCalcEquips').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalcEquips/Delete')) ?>,
                type: 'POST',
                async: false,
                data: {
                    cceq_id: CurrentRowDataCCE.cceq_id,
                },
                success: function(Res) {
                    var RowIndex = $('#CostCalcEquipsGrid').jqxGrid('getselectedrowindex');
                    var Val = $('#CostCalcEquipsGrid').jqxGrid('getcellvalue', RowIndex, "prlt_id");
                    Aliton.SelectRowById('cceq_id', Val, '#CostCalcEquipsGrid', true);
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#RefreshCostCalcEquips').on('click', function(){
            var RowIndex = $('#CostCalcEquipsGrid').jqxGrid('getselectedrowindex');
            var Val = $('#CostCalcEquipsGrid').jqxGrid('getcellvalue', RowIndex, "prlt_id");
            Aliton.SelectRowById('cceq_id', Val, '#CostCalcEquipsGrid', true);
        });
        
        
        $('#AddWorkCostCalcEquips').on('click', function(){
            $('#CostCalcDetailsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 500, width: 640, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalcWorks/Create')) ?>,
                type: 'POST',
                async: false,
                data: {
                    calc_id: CostCalcDetails.calc_id,
                    cceq_id: CurrentRowDataCCE.cceq_id,
                    eqip_name: CurrentRowDataCCE.eqip_name,
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyCostCalcDetailsDialog").html(Res.html);
                    $('#CostCalcDetailsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        
        $('#CostCalcEquipsGrid').jqxGrid('selectrow', 0);
        
        
        
        
        
        
        
        /* Текущая выбранная строка данных */
        var CurrentRowDataCCW;
        
        var CostCalcWorksDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceCostCalcWorks), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["t.calc_id = " + CostCalcDetails.calc_id],
                });
                return data;
            },
        });
        
        $("#CostCalcWorksGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showstatusbar: true,
                showaggregates: true,
                showfilterrow: false,
                width: '99%',
                height: '200',
                source: CostCalcWorksDataAdapter,
                columns: [
                    { text: 'Вид работ', datafield: 'cwrt_name', columngroup: 'Works', filtercondition: 'CONTAINS', width: 250},
                    { text: 'Коэф.', datafield: 'koef', columngroup: 'Works', filtercondition: 'CONTAINS', width: 60},
                    { text: 'Оборудование', datafield: 'EquipName', columngroup: 'Works', filtercondition: 'CONTAINS', width: 250},
                    { text: 'Кол-во', datafield: 'quant', columngroup: 'Works', filtercondition: 'CONTAINS', width: 60},
                    { text: 'Цена', datafield: 'price', columngroup: 'Works', filtercondition: 'CONTAINS', width: 60},
                    { text: 'Сумма', datafield: 'sum_high', columngroup: 'Works', filtercondition: 'CONTAINS', width: 110, aggregates: [
                          { 'Сумма':
                            function (aggregatedValue, currentValue) {
                                return aggregatedValue + currentValue;
                            }
                          }
                      ]},

                    { text: 'Цена', datafield: 'price_low', columngroup: 'WorkPrice', filtercondition: 'CONTAINS', width: 130},
                    { text: 'Итого', datafield: 'sum_low', columngroup: 'WorkPrice', filtercondition: 'CONTAINS', width: 110, aggregates: [
                          { 'Сумма':
                            function (aggregatedValue, currentValue) {
                                return aggregatedValue + currentValue;
                            }
                          }
                      ]},
                ],
                columngroups: [
                    { text: 'Работы', align: 'center', name: 'Works' },
                    { text: 'Себестоимость', align: 'center', name: 'WorkPrice' },
                ]
            })
        );
        
        $('#AddCostCalcWorks').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#EditCostCalcWorks').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
        $('#RefreshCostCalcWorks').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#DelCostCalcWorks').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
        
        var CheckButtonCCW = function() {
            $('#EditCostCalcWorks').jqxButton({disabled: !(CurrentRowDataCCW != undefined)})
            $('#DelCostCalcWorks').jqxButton({disabled: !(CurrentRowDataCCW != undefined)})
        };
        
        $("#CostCalcWorksGrid").on('rowselect', function (event) {
            CurrentRowDataCCW = $('#CostCalcWorksGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButtonCCW();
        });
        
        $('#AddCostCalcWorks').on('click', function(){
            $('#CostCalcDetailsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 500, width: 640, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalcWorks/Create')) ?>,
                type: 'POST',
                async: false,
                data: {
                    calc_id: CostCalcDetails.calc_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyCostCalcDetailsDialog").html(Res.html);
                    $('#CostCalcDetailsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#CostCalcWorksGrid').on('rowdoubleclick', function (event) { 
            $("#EditCostCalcWorks").click();
        });
        
        $('#EditCostCalcWorks').on('click', function(){
            $('#CostCalcDetailsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 500, width: 640, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalcWorks/Update')) ?>,
                type: 'POST',
                async: false,
                data: {
                    ccwr_id: CurrentRowDataCCW.ccwr_id,
                    calc_id: CostCalcDetails.calc_id,
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyCostCalcDetailsDialog").html(Res.html);
                    $('#CostCalcDetailsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#DelCostCalcWorks').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalcWorks/Delete')) ?>,
                type: 'POST',
                async: false,
                data: {
                    ccwr_id: CurrentRowDataCCW.ccwr_id,
                },
                success: function(Res) {
                    var RowIndex = $('#CostCalcWorksGrid').jqxGrid('getselectedrowindex');
                    var Val = $('#CostCalcWorksGrid').jqxGrid('getcellvalue', RowIndex, "prlt_id");
                    Aliton.SelectRowById('cceq_id', Val, '#CostCalcWorksGrid', true);
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#RefreshCostCalcWorks').on('click', function(){
            var RowIndex = $('#CostCalcWorksGrid').jqxGrid('getselectedrowindex');
            var Val = $('#CostCalcWorksGrid').jqxGrid('getcellvalue', RowIndex, "prlt_id");
            Aliton.SelectRowById('cceq_id', Val, '#CostCalcWorksGrid', true);
        });
        
        
        $('#CostCalcWorksGrid').jqxGrid('selectrow', 0);
        
        
        
        
        
        /* Текущая выбранная строка данных */
        var CurrentRowDataCCS;
        
        var CostCalcSalarysDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceCostCalcSalarys), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["c.calc_id = " + CostCalcDetails.calc_id],
                });
                return data;
            },
        });
        
        $("#CostCalcSalarysGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showstatusbar: true,
                showaggregates: true,
                showfilterrow: false,
                width: '99%',
                height: '200',
                source: CostCalcSalarysDataAdapter,
                columns: [
                    { text: 'Сотрудник', datafield: 'EmployeeName', filtercondition: 'CONTAINS', width: 300},
                    { text: 'Сумма', datafield: 'price', filtercondition: 'CONTAINS', width: 100},
                    { text: 'Утвержден', dataField: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 100 },
                ]
            })
        );
        
        $('#AddCostCalcSalarys').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#EditCostCalcSalarys').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
        $('#RefreshCostCalcSalarys').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#DelCostCalcSalarys').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
        
        var CheckButtonCCS = function() {
            $('#EditCostCalcSalarys').jqxButton({disabled: !(CurrentRowDataCCS != undefined)})
            $('#DelCostCalcSalarys').jqxButton({disabled: !(CurrentRowDataCCS != undefined)})
        };
        
        $("#CostCalcSalarysGrid").on('rowselect', function (event) {
            CurrentRowDataCCS = $('#CostCalcSalarysGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButtonCCS();
        });
        
        $('#AddCostCalcSalarys').on('click', function(){
            $('#CostCalcDetailsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 500, width: 640, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalcSalarys/Create')) ?>,
                type: 'POST',
                async: false,
                data: {
                    calc_id: CostCalcDetails.calc_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyCostCalcDetailsDialog").html(Res.html);
                    $('#CostCalcDetailsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#CostCalcSalarysGrid').on('rowdoubleclick', function (event) { 
            $("#EditCostCalcSalarys").click();
        });
        
        $('#EditCostCalcSalarys').on('click', function(){
            $('#CostCalcDetailsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 500, width: 640, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalcSalarys/Update')) ?>,
                type: 'POST',
                async: false,
                data: {
                    ccwr_id: CurrentRowDataCCS.ccwr_id,
                    calc_id: CostCalcDetails.calc_id,
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyCostCalcDetailsDialog").html(Res.html);
                    $('#CostCalcDetailsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#DelCostCalcSalarys').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalcSalarys/Delete')) ?>,
                type: 'POST',
                async: false,
                data: {
                    ccwr_id: CurrentRowDataCCS.ccwr_id,
                },
                success: function(Res) {
                    var RowIndex = $('#CostCalcSalarysGrid').jqxGrid('getselectedrowindex');
                    var Val = $('#CostCalcSalarysGrid').jqxGrid('getcellvalue', RowIndex, "prlt_id");
                    Aliton.SelectRowById('cceq_id', Val, '#CostCalcSalarysGrid', true);
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#RefreshCostCalcSalarys').on('click', function(){
            var RowIndex = $('#CostCalcSalarysGrid').jqxGrid('getselectedrowindex');
            var Val = $('#CostCalcSalarysGrid').jqxGrid('getcellvalue', RowIndex, "prlt_id");
            Aliton.SelectRowById('cceq_id', Val, '#CostCalcSalarysGrid', true);
        });
        
        
        $('#CostCalcSalarysGrid').jqxGrid('selectrow', 0);
        
        
        
        
        
        
        
        
        
        
    });
</script>

<?php $this->setPageTitle($model->CostCalcType); ?>

<?php
    $this->breadcrumbs=array(
        'Список объектов'=>array('/object/index'),
        'Карточка объекта'=>array('/objectsgroup/index&ObjectGr_id=' . $model->ObjectGr_id),
        $model->CostCalcType,
    );
?>

<div class="row-column" style="margin: 0;">
    <div class="row">
        <div class="row-column" style="margin-top: 2px;">Дата: </div><div class="row-column"><div id='DateCC'></div></div>
        <div class="row-column">Наименование: <input readonly id='group_name' type="text"></div>
    </div>

    <div class="row">
        <div class="row-column">Вид работ: <input readonly id='workname' type="text"></div>
        <div class="row-column">Сотрудник: <input readonly id='empl_name' type="text"></div>
    </div>

    <div class="row">
        <div class="row-column">Юр. лицо: <input readonly id='jrdc_name' type="text"></div>
        <div class="row-column"><input readonly id='RegistrationName' type="text"></div>
    </div>

    <div class="row">
        <div class="row-column" style="margin-top: 2px;">Желаемая дата получения: </div><div class="row-column"><div id='best_date'></div></div>
        <div class="row-column">Номер заявки: <input readonly id='Demand_id' type="text"></div>
    </div>
    
    <div class="row">
        <div class="row-column">Расходные материалы: <input readonly id='sum_materials_low' type="text"></div>
        <div class="row-column" style="margin-top: 2px;">Дата согл. с рук.: </div><div class="row-column"><div id='date_ready'></div></div>
    </div>
</div>

<div class="row" style="margin-top: 7px;"><div class="row-column">Техническое задание: <textarea readonly id="spec_condt"></textarea></div></div>
<div class="row" style="margin-top: 0;"><div class="row-column">Примечание: <textarea readonly id="note"></textarea></div></div>
<div class="row"><div class="row-column">Согласовал: <input readonly id='EmplAgreed' type="text"></div></div>

<div class="row">
    <div class="row-column"><input type="button" value="Изменить" id='btnEditCostCalcDetails'/></div>
</div>   




<div id='jqxWidgetCostCalcDetails' style="margin-top: 5px;">
    <div id='jqxTabsCostCalcDetails'>
        <ul>
            <li>
                <div style="height: 15px; margin-top: 3px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                        Оборудование и расходные материалы
                    </div>
                </div>
            </li>
            <li>
                <div style="height: 15px; margin-top: 3px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                        Перечень работ
                    </div>
                </div>
            </li>
            <li>
                <div style="height: 15px; margin-top: 3px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                        Документы
                    </div>
                </div>
            </li>
            <li>
                <div style="height: 15px; margin-top: 3px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                        Заработная плата
                    </div>
                </div>
            </li>
        </ul>
        
        
        <div id='contentCostCalcEquips' style="overflow: hidden; margin-left: 5px; width: 100%; height: 100%">
            <div style="margin-top: 5px;">
                <div id="CostCalcEquipsGrid" class="jqxGridAliton" style="margin-right: 10px"></div>
                <div class="row" style="margin-top: 3px; padding-left: 0;">
                    <div class="row-column"><input type="button" value="Добавить" id='AddCostCalcEquips' /></div>
                    <div class="row-column"><input type="button" value="Изменить" id='EditCostCalcEquips' /></div>
                    <div class="row-column"><input type="button" value="Обновить" id='RefreshCostCalcEquips'/></div>
                    <div class="row-column"><input type="button" value="Работа" id='AddWorkCostCalcEquips'/></div>
                    <div class="row-column"><input type="button" value="Удалить" id='DelCostCalcEquips' /></div>
                </div>
            </div>
        </div>
        
        <div id='contentCostCalcWorks' style="overflow: hidden; margin-left: 5px; width: 100%; height: 100%">
            <div style="margin-top: 5px;">
                <div id="CostCalcWorksGrid" class="jqxGridAliton" style="margin-right: 10px"></div>
                <div class="row" style="margin-top: 3px; padding-left: 0;">
                    <div class="row-column"><input type="button" value="Добавить" id='AddCostCalcWorks' /></div>
                    <div class="row-column"><input type="button" value="Изменить" id='EditCostCalcWorks' /></div>
                    <div class="row-column"><input type="button" value="Обновить" id='RefreshCostCalcWorks'/></div>
                    <div class="row-column"><input type="button" value="Удалить" id='DelCostCalcWorks' /></div>
                </div>
            </div>
        </div>
        
        <div id='' style="overflow: hidden; margin-left: 5px; width: 100%; height: 100%">
            
        </div>
        
        
        <div id='contentCostCalcSalarys' style="overflow: hidden; margin-left: 5px; width: 100%; height: 100%">
            <div style="margin-top: 5px;">
                <div id="CostCalcSalarysGrid" class="jqxGridAliton" style="margin-right: 10px"></div>
                <div class="row" style="margin-top: 3px; padding-left: 0;">
                    <div class="row-column"><input type="button" value="Добавить" id='AddCostCalcSalarys' /></div>
                    <div class="row-column"><input type="button" value="Изменить" id='EditCostCalcSalarys' /></div>
                    <div class="row-column"><input type="button" value="Обновить" id='RefreshCostCalcSalarys'/></div>
                    <div class="row-column"><input type="button" value="Удалить" id='DelCostCalcSalarys' /></div>
                </div>
            </div>
        </div>
        
    </div>
</div>




<div id="CostCalcDetailsDialog" style="display: none;">
    <div id="CostCalcDetailsDialogHeader">
        <span id="CostCalcDetailsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogCostCalcDetailsContent">
        <div style="" id="BodyCostCalcDetailsDialog"></div>
    </div>
</div>