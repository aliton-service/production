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
            spec_condt: <?php echo json_encode($model->spec_condt); ?>,
            note: <?php echo json_encode($model->note); ?>,
            EmplAgreed: '<?php echo $model->EmplAgreed; ?>',
        };
        
        $("#DateCCDetails").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CostCalcDetails.date, formatString: 'dd.MM.yyyy H:mm', readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 130}));
        $("#group_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 210 }));
        $("#workname").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 180 }));
        $("#empl_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 150 }));
        $("#jrdc_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 250 }));
        $("#RegistrationName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 160 }));
        $("#best_date").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CostCalcDetails.best_date, formatString: 'dd.MM.yyyy H:mm', readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 130}));
        $("#Demand_id").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 75 }));
        $("#sum_materials_low").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 87 }));
        $("#date_ready").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CostCalcDetails.date_ready, formatString: 'dd.MM.yyyy H:mm', readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 130}));
        
        $("#spec_condt").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 550, height: 55 }));
        $("#note").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 550, height: 55 }));
        $("#EmplAgreed").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 200 }));
        
        $('#btnEditCostCalcDetails').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnAcceptCostCalcDetails').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 250 }));
        $('#btnCancelAcceptCostCalcDetails').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#btnEditCostCalcDetails').on('click', function(){
            $('#CostCalcDetailsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 730, width: 635, position: 'center' }));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalculationDetails/Update')) ?>,
                type: 'POST',
                async: false,
                data: {
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
        
        $('#btnAcceptCostCalcDetails').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalculationDetails/Accept')) ?>,
                type: 'POST',
                async: false,
                data: {
                    calc_id: CostCalcDetails.calc_id,
                },
                success: function(Res) {
                    
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        
        $('#btnCancelAcceptCostCalcDetails').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalculationDetails/Cancelaccept')) ?>,
                type: 'POST',
                async: false,
                data: {
                    calc_id: CostCalcDetails.calc_id,
                },
                success: function(Res) {
                    
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
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
        
        
        
        $('#jqxTabsCostCalcDetails').jqxTabs({ width: '99%', height: 287 });
//        $('#jqxTabsCostCalcDetails').jqxTabs({ selectedItem: 2 }); 
        



        /* Оборудование и расходные материалы */
        
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
                    var Val = $('#CostCalcEquipsGrid').jqxGrid('getcellvalue', RowIndex, "cceq_id");
                    Aliton.SelectRowById('cceq_id', Val, '#CostCalcEquipsGrid', true);
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#RefreshCostCalcEquips').on('click', function(){
            var RowIndex = $('#CostCalcEquipsGrid').jqxGrid('getselectedrowindex');
            var Val = $('#CostCalcEquipsGrid').jqxGrid('getcellvalue', RowIndex, "cceq_id");
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
        
        
        
        
        
        /* Перечень работ */
        
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
        $('#RefreshCostCalcWorks').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
        $('#btnPrintCostCalcWorks').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true, width: 140 }));
        $('#btnPrintForUsCostCalcWorks').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#DelCostCalcWorks').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
        
        var CheckButtonCCW = function() {
            $('#EditCostCalcWorks').jqxButton({disabled: !(CurrentRowDataCCW != undefined)})
            $('#RefreshCostCalcWorks').jqxButton({disabled: !(CurrentRowDataCCW != undefined)})
            $('#btnPrintCostCalcWorks').jqxButton({disabled: !(CurrentRowDataCCW != undefined)})
            $('#btnPrintForUsCostCalcWorks').jqxButton({disabled: !(CurrentRowDataCCW != undefined)})
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
                    var Val = $('#CostCalcWorksGrid').jqxGrid('getcellvalue', RowIndex, "cceq_id");
                    Aliton.SelectRowById('cceq_id', Val, '#CostCalcWorksGrid', true);
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#RefreshCostCalcWorks').on('click', function(){
            var RowIndex = $('#CostCalcWorksGrid').jqxGrid('getselectedrowindex');
            var Val = $('#CostCalcWorksGrid').jqxGrid('getcellvalue', RowIndex, "cceq_id");
            Aliton.SelectRowById('cceq_id', Val, '#CostCalcWorksGrid', true);
        });
        
        $('#btnPrintCostCalcWorks').on('click', function(){
            window.open(<?php echo json_encode(Yii::app()->createUrl('Reports/ReportOpen', array(
                'ReportName' => '/Сметы/Смета - оборудование',
                'Ajax' => false,
                'Render' => true,
            ))); ?> + '&Parameters[p_calc_id]=' + CostCalcDetails.calc_id);
        });
        
        $('#btnPrintForUsCostCalcWorks').on('click', function(){
            window.open(<?php echo json_encode(Yii::app()->createUrl('Reports/ReportOpen', array(
                'ReportName' => '/Сметы/Смета - оборудование (Для нас)',
                'Ajax' => false,
                'Render' => true,
            ))); ?> + '&Parameters[calc_id]=' + CostCalcDetails.calc_id);
        });
        
        $('#CostCalcWorksGrid').jqxGrid('selectrow', 0);
        
        
        
        
        
        
        /* Документы */
        
        /* Текущая выбранная строка данных */
        var CurrentRowDataCCD;
        
        var CostCalcDocumentsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceCostCalcDocuments), {
            data: {
                calc_id: CostCalcDetails.calc_id
            },
        });
        
        $("#CostCalcDocumentsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: false,
                width: '99%',
                height: '200',
                source: CostCalcDocumentsDataAdapter,
                columns: [
                    { text: 'Наименование', datafield: 'DocName',  filtercondition: 'CONTAINS', width: 190},
                    { text: 'Номер', datafield: 'DocNumber',  filtercondition: 'CONTAINS', width: 70},
                    { text: 'Дата док-та', datafield: 'DocDate', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 130 },
                    { text: 'Сумма', datafield: 'DocSum', filtercondition: 'CONTAINS', width: 70 },
                    { text: 'Статус', datafield: 'DocState', filtercondition: 'CONTAINS', width: 90 },
                    { text: 'Дата статуса', datafield: 'DocDateState', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 130 },
                    { text: 'Вид работ', datafield: 'DocWrtpName', filtercondition: 'CONTAINS', width: 120 },
                    { text: 'Приоритет', datafield: 'DocPrior', filtercondition: 'CONTAINS', width: 90 },
                    { text: 'Предельная дата', datafield: 'DocDeadline', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 130 },
                    { text: 'Дата принятия', datafield: 'DocAccept', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 130 },
                    { text: 'Создал', datafield: 'DocUserCreate', filtercondition: 'CONTAINS', width: 180 },
                    { text: 'Юр. лицо', datafield: 'DocJuridicalPerson', filtercondition: 'CONTAINS', width: 180 },
                ]
            })
        );
        
        $('#AddCostCalcDocuments').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#MoreInfoCostCalcDocuments').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
        $('#RefreshCostCalcDocuments').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
        $('#DelCostCalcDocuments').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
        
        var CheckButtonCCD = function() {
            $('#MoreInfoCostCalcDocuments').jqxButton({disabled: !(CurrentRowDataCCD != undefined)})
            $('#RefreshCostCalcDocuments').jqxButton({disabled: !(CurrentRowDataCCD != undefined)})
            $('#DelCostCalcDocuments').jqxButton({disabled: !(CurrentRowDataCCD != undefined)})
        };
        
        $("#CostCalcDocumentsGrid").on('rowselect', function (event) {
            CurrentRowDataCCD = $('#CostCalcDocumentsGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButtonCCD();
        });
        
        $('#AddCostCalcDocuments').on('click', function(){
            $('#CostCalcDetailsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 500, width: 640, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalcDocuments/Create')) ?>,
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
        
        $('#CostCalcDocumentsGrid').on('rowdoubleclick', function (event) { 
            $("#MoreInfoCostCalcDocuments").click();
        });
        
        $('#MoreInfoCostCalcDocuments').on('click', function(){
            $('#CostCalcDetailsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 500, width: 640, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalcDocuments/Update')) ?>,
                type: 'POST',
                async: false,
                data: {
                    ccwr_id: CurrentRowDataCCD.ccwr_id,
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
        
        $('#DelCostCalcDocuments').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalcDocuments/Delete')) ?>,
                type: 'POST',
                async: false,
                data: {
                    ccwr_id: CurrentRowDataCCD.ccwr_id,
                },
                success: function(Res) {
                    var RowIndex = $('#CostCalcDocumentsGrid').jqxGrid('getselectedrowindex');
                    var Val = $('#CostCalcDocumentsGrid').jqxGrid('getcellvalue', RowIndex, "cceq_id");
                    Aliton.SelectRowById('cceq_id', Val, '#CostCalcDocumentsGrid', true);
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#RefreshCostCalcDocuments').on('click', function(){
            var RowIndex = $('#CostCalcDocumentsGrid').jqxGrid('getselectedrowindex');
            var Val = $('#CostCalcDocumentsGrid').jqxGrid('getcellvalue', RowIndex, "cceq_id");
            Aliton.SelectRowById('cceq_id', Val, '#CostCalcDocumentsGrid', true);
        });
        
        
        $('#CostCalcDocumentsGrid').jqxGrid('selectrow', 0);
        
        
        
        
        
        
        /* Заработная плата */
        
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
                showfilterrow: false,
                width: '99%',
                height: '200',
                source: CostCalcSalarysDataAdapter,
                columns: [
                    { text: 'Сотрудник', datafield: 'EmployeeName', filtercondition: 'CONTAINS', width: 300},
                    { text: 'Сумма', datafield: 'price', filtercondition: 'CONTAINS', width: 100},
                    { text: 'Утвержден', dataField: 'date_accept', columntype: 'date', cellsformat: 'dd.MM.yyyy H:mm', filtercondition: 'STARTS_WITH', width: 140 },
                ]
            })
        );
        
        $('#AddCostCalcSalarys').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#EditCostCalcSalarys').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
        $('#RefreshCostCalcSalarys').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#AcceptCostCalcSalarys').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#DelCostCalcSalarys').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
        
        var CheckButtonCCS = function() {
            $('#EditCostCalcSalarys').jqxButton({disabled: !(CurrentRowDataCCS != undefined)})
            $('#DelCostCalcSalarys').jqxButton({disabled: !(CurrentRowDataCCS != undefined)})
        };
        var CheckButtonAcceptCCS = function() {
            if (CurrentRowDataCCS != undefined && CurrentRowDataCCS.date_accept != undefined) {
                $('#AcceptCostCalcSalarys').jqxButton({disabled: false})
                $('#EditCostCalcSalarys').jqxButton({disabled: false})
            } else {
                $('#AcceptCostCalcSalarys').jqxButton({disabled: true})
                $('#EditCostCalcSalarys').jqxButton({disabled: true})
            }
        };
        
        $("#CostCalcSalarysGrid").on('rowselect', function (event) {
            CurrentRowDataCCS = $('#CostCalcSalarysGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButtonCCS();
            CheckButtonAcceptCCS();
        });
        
        $('#AddCostCalcSalarys').on('click', function(){
            $('#CostCalcDetailsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 180, width: 500, position: 'center'}));
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
            $('#CostCalcDetailsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 180, width: 500, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalcSalarys/Update')) ?>,
                type: 'POST',
                async: false,
                data: {
                    ccsl_id: CurrentRowDataCCS.ccsl_id,
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
                    ccsl_id: CurrentRowDataCCS.ccsl_id,
                },
                success: function(Res) {
                    var RowIndex = $('#CostCalcSalarysGrid').jqxGrid('getselectedrowindex');
                    var Val = $('#CostCalcSalarysGrid').jqxGrid('getcellvalue', RowIndex, "ccsl_id");
                    Aliton.SelectRowById('ccsl_id', Val, '#CostCalcSalarysGrid', true);
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#RefreshCostCalcSalarys').on('click', function(){
            var RowIndex = $('#CostCalcSalarysGrid').jqxGrid('getselectedrowindex');
            var Val = $('#CostCalcSalarysGrid').jqxGrid('getcellvalue', RowIndex, "ccsl_id");
            Aliton.SelectRowById('ccsl_id', Val, '#CostCalcSalarysGrid', true);
        });
        
        $('#AcceptCostCalcSalarys').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalcSalarys/Accept')) ?>,
                type: 'POST',
                async: false,
                data: {
                    ccsl_id: CurrentRowDataCCS.ccsl_id,
                },
                success: function(Res) {
                    var RowIndex = $('#CostCalcSalarysGrid').jqxGrid('getselectedrowindex');
                    var Val = $('#CostCalcSalarysGrid').jqxGrid('getcellvalue', RowIndex, "ccsl_id");
                    Aliton.SelectRowById('ccsl_id', Val, '#CostCalcSalarysGrid', true);
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
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

<div style="margin: 0; padding: 0; background-color: #F2F2F2;">
    <div class="row-column" style="margin: 0;">
        <div class="row">
            <div class="row-column" style="margin-top: 2px;">Дата: </div><div class="row-column"><div id='DateCCDetails'></div></div>
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

    <div class="row" style="margin: 0; padding-top: 10px;"><div class="row-column">Техническое задание: <textarea readonly id="spec_condt"></textarea></div></div>
    <div class="row" style="margin: 0;"><div class="row-column">Примечание: <textarea readonly id="note"></textarea></div></div>
    <div class="row"><div class="row-column">Согласовал: <input readonly id='EmplAgreed' type="text"></div></div>

    <div class="row">
        <div class="row-column"><input type="button" value="Изменить" id='btnEditCostCalcDetails'/></div>
        <div class="row-column"><input type="button" value="Согласовано с руководителем" id='btnAcceptCostCalcDetails'/></div>
        <div class="row-column"><input type="button" value="Отмена согл." id='btnCancelAcceptCostCalcDetails'/></div>
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
                        <div class="row-column" style="margin-left: 350px;"><input type="button" value="Удалить" id='DelCostCalcEquips' /></div>
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
                        <div class="row-column"><input type="button" value="Для заказчика" id='btnPrintCostCalcWorks'/></div>
                        <div class="row-column"><input type="button" value="Для нас" id='btnPrintForUsCostCalcWorks'/></div>
                        <div class="row-column" style="margin-left: 480px;"><input type="button" value="Удалить" id='DelCostCalcWorks' /></div>
                    </div>
                </div>
            </div>

            <div id='contentCostCalcDocuments' style="overflow: hidden; margin-left: 5px; width: 100%; height: 100%">
                <div style="margin-top: 5px;">
                    <div id="CostCalcDocumentsGrid" class="jqxGridAliton" style="margin-right: 10px"></div>
                    <div class="row" style="margin-top: 3px; padding-left: 0;">
                        <div class="row-column"><input type="button" value="Добавить" id='AddCostCalcDocuments' /></div>
                        <div class="row-column"><input type="button" value="Инфо" id='MoreInfoCostCalcDocuments' /></div>
                        <div class="row-column"><input type="button" value="Обновить" id='RefreshCostCalcDocuments'/></div>
                        <div class="row-column" style="margin-left: 350px;"><input type="button" value="Удалить" id='DelCostCalcDocuments' /></div>
                    </div>
                </div>
            </div>

            <div id='contentCostCalcSalarys' style="overflow: hidden; margin-left: 5px; width: 100%; height: 100%">
                <div style="margin-top: 5px;">
                    <div id="CostCalcSalarysGrid" class="jqxGridAliton" style="margin-right: 10px"></div>
                    <div class="row" style="margin-top: 3px; padding-left: 0;">
                        <div class="row-column"><input type="button" value="Добавить" id='AddCostCalcSalarys' /></div>
                        <div class="row-column"><input type="button" value="Изменить" id='EditCostCalcSalarys' /></div>
                        <div class="row-column"><input type="button" value="Обновить" id='RefreshCostCalcSalarys'/></div>
                        <div class="row-column"><input type="button" value="Подтвердить" id='AcceptCostCalcSalarys'/></div>
                        <div class="row-column" style="margin-left: 350px;"><input type="button" value="Удалить" id='DelCostCalcSalarys' /></div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>



<div id="CostCalcDetailsDialog" style="display: none;">
    <div id="CostCalcDetailsDialogHeader">
        <span id="CostCalcDetailsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px; background-color: #F2F2F2;" id="DialogCostCalcDetailsContent">
        <div style="" id="BodyCostCalcDetailsDialog"></div>
    </div>
</div>