<script type="text/javascript">
    var CostCalculations = {};
    $(document).ready(function () {
        var CurrentRowDataCCE;
        var CurrentRowDataCCW;
        var CurrentRowDataCCD;
        var CurrentRowDataCCS;
        
        CostCalculations = {
            calc_id: '<?php echo $model->calc_id; ?>',
            type: <?php echo json_encode($model->type); ?>,
            ObjectGr_id: '<?php echo $model->ObjectGr_id; ?>',
            cgrp_id: <?php echo json_encode($model->cgrp_id); ?>,
            wrtp_id: <?php echo json_encode($model->wrtp_id); ?>,
            date: Aliton.DateConvertToJs('<?php echo $model->date; ?>'),
            group_name: '<?php echo $model->group_name; ?>',
            PaymentType_id: <?php echo json_encode($model->PaymentType_id); ?>,
            workname: '<?php echo $model->workname; ?>',
            empl_name: '<?php echo $model->empl_name; ?>',
            empl_id: <?php echo json_encode($model->empl_id); ?>,
            Jrdc_id: <?php echo json_encode($model->jrdc_id); ?>,
            jrdc_name: '<?php echo $model->jrdc_name; ?>',
            RegistrationName: '<?php echo $model->RegistrationName; ?>',
            best_date: Aliton.DateConvertToJs('<?php echo $model->best_date; ?>'),
            Demand_id: '<?php echo $model->Demand_id; ?>',
            sum_materials_low: <?php echo json_encode($model->sum_materials_low); ?>,
            date_ready: Aliton.DateConvertToJs('<?php echo $model->date_ready; ?>'),
            date_agreed: Aliton.DateConvertToJs('<?php echo $model->date_agreed; ?>'),
            spec_condt: <?php echo json_encode($model->spec_condt); ?>,
            note: <?php echo json_encode($model->note); ?>,
            EmplAgreed: <?php echo json_encode($model->EmplAgreed); ?>,
            count_type0: <?php echo json_encode($count_type0); ?>,
            count_type1: <?php echo json_encode($count_type1); ?>,
            Object_id: <?php echo json_encode($model->Object_id); ?>,
            Addr: <?php echo json_encode($model->Addr); ?>,
            FullName: <?php echo json_encode($model->FullName); ?>,
            Form_id: <?php echo json_encode($model->Form_id); ?>,
            Name: <?php echo json_encode($model->name); ?>,
            Info_id: <?php echo json_encode($model->info_id); ?>,
            ContrNumS: <?php echo json_encode($model->ContrNumS); ?>,
            ContrDateS: <?php echo json_encode($model->ContrDateS); ?>,
            Position_id: <?php echo json_encode(Yii::app()->user->Position_id); ?>,
            ccwt_proc: <?php echo json_encode($model->ccwt_proc); ?>,
            koef_indirect: <?php echo json_encode($model->koef_indirect); ?>,
            GarantMail: Boolean(Number(<?php echo json_encode($model->GarantMail); ?>))
        };

        var Administrator = <?php echo json_encode(Yii::app()->user->checkAccess('Administrator')); ?>;
        var CurrentUser = <?php echo json_encode(Yii::app()->user->Employee_id); ?>;
        
        CostCalcDetails = {
            StartingWork: 0,
            Expences: 0,
            TotalWork: 0,
            StartingWorkLow: 0,
            Koef: 0,
            SumLowFull: 0,
            SumHighFull: 0,
            Discount: 0,
            SumMarj: 0,
            ProcMarj: 0,
            SumPayNoAvans: 0
        };

        var SetValueControls = function() {
            if (CostCalculations.date != null) $("#DateCCDetails").jqxDateTimeInput('val', CostCalculations.date);
            if (CostCalculations.group_name != null) $("#group_name").jqxInput('val', CostCalculations.group_name);
            if (CostCalculations.workname != null) $("#workname").jqxInput('val', CostCalculations.workname);
            if (CostCalculations.empl_name != null) $("#empl_name").jqxInput('val', CostCalculations.empl_name);
            if (CostCalculations.RegistrationName != null) $("#RegistrationName").jqxInput('val', CostCalculations.RegistrationName);
            if (CostCalculations.best_date != null) $("#best_date").jqxDateTimeInput('val', CostCalculations.best_date);
            if (CostCalculations.Demand_id != null) $("#Demand_id").jqxInput('val', CostCalculations.Demand_id);
            if (CostCalculations.sum_materials_low != null) $("#sum_materials_low").jqxNumberInput('val', CostCalculations.sum_materials_low);
            if (CostCalculations.date_ready != null) $("#date_ready").jqxDateTimeInput('val', CostCalculations.date_ready);
            if (CostCalculations.spec_condt != null) $("#spec_condt").jqxTextArea('val', CostCalculations.spec_condt);
            if (CostCalculations.note != null) $("#note").jqxTextArea('val', CostCalculations.note);
            if (CostCalculations.EmplAgreed != null) $("#EmplAgreed").jqxInput('val', CostCalculations.EmplAgreed);
            $("#chbGarantMail").jqxCheckBox({checked: CostCalculations.GarantMail});
        };
        
        CostCalculations.Refresh = function() {
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalculations/GetModel'))?>,
                type: 'POST',
                data: {
                    Calc_id: CostCalculations.calc_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    CostCalculations.calc_id = Res.calc_id;
                    CostCalculations.date = Aliton.DateConvertToJs(Res.date);
                    CostCalculations.group_name = Res.group_name;
                    CostCalculations.workname = Res.workname;
                    CostCalculations.empl_name = Res.empl_name;
                    CostCalculations.jrdc_name = Res.jrdc_name;
                    CostCalculations.RegistrationName = Res.RegistrationName;
                    CostCalculations.best_date = Aliton.DateConvertToJs(Res.best_date);
                    CostCalculations.Demand_id = Res.Demand_id;
                    CostCalculations.sum_materials_low = Res.sum_materials_low;
                    CostCalculations.date_ready = Aliton.DateConvertToJs(Res.date_ready);
                    CostCalculations.date_agreed = Aliton.DateConvertToJs(Res.date_agreed);
                    CostCalculations.spec_condt = Res.spec_condt;
                    CostCalculations.note = Res.note;
                    CostCalculations.EmplAgreed = Res.EmplAgreed;
                    CostCalculations.koef_indirect = Res.koef_indirect;
                    CostCalculations.count_type0 = parseInt(Res.count_type0);
                    CostCalculations.count_type1 = parseInt(Res.count_type1);
                    CostCalculations.GarantMail = Boolean(Number(parseInt(Res.GarantMail)));
                    SetValueControls();
                    SetStateButtons();
                    $('#RefreshCostCalcEquips').click();
                    $('#RefreshCostCalcWorks').click();
                    CostCalcDetails.DetailsRefresh();
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        };
        CostCalcDetails.SetValue = function() {
            $("#edIntogoStartingWork").val(CostCalcDetails.StartingWork);
            $("#edItogoExpences").val(CostCalcDetails.Expences);
            $("#edItogoTotalWork").val(CostCalcDetails.TotalWork);
            $("#edIntogoStartingWorkLow").val(CostCalcDetails.StartingWorkLow);
            $("#edIntogoKoef").val(CostCalcDetails.Koef);
            $("#edSumLowFull").val(CostCalcDetails.SumLowFull);
            $("#edSumHightFull").val(CostCalcDetails.SumHighFull);
            $("#edDiscount").val(CostCalcDetails.Discount);
            $("#edSumMarj").val(CostCalcDetails.SumMarj);
            $("#edProcMarj").val(CostCalcDetails.ProcMarj);
        };
        
        CostCalcDetails.DetailsRefresh = function() {
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalculations/GetDetails'))?>,
                type: 'POST',
                data: {
                    calc_id: CostCalculations.calc_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    
                    CostCalcDetails.StartingWork = parseFloat(Res.StartingWork),
                    CostCalcDetails.Expences =  parseFloat(Res.Expences),
                    CostCalcDetails.TotalWork = parseFloat(Res.TotalWork);
                    CostCalcDetails.StartingWorkLow = parseFloat(Res.StartingWorkLow);
                    CostCalcDetails.Koef = parseFloat(Res.Koef);
                    CostCalcDetails.SumLowFull = parseFloat(Res.SumLowFull);
                    CostCalcDetails.SumHighFull = parseFloat(Res.SumHighFull);
                    CostCalcDetails.Discount = parseFloat(Res.Discount);
                    CostCalcDetails.SumMarj = parseFloat(Res.SumMarj);
                    CostCalcDetails.ProcMarj = parseFloat(Res.ProcMarj);
                    CostCalcDetails.SumEquipsLow = parseFloat(Res.SumEquipsLow);
                    CostCalcDetails.SumEquipsHigh = parseFloat(Res.SumEquipsHigh);
                    CostCalcDetails.SumEquipsHighDefault = parseFloat(Res.SumEquipsHighDefault);
                    CostCalcDetails.SumWorkLow = parseFloat(Res.SumWorkLow);
                    CostCalcDetails.SumWorkHigh = parseFloat(Res.SumWorkHigh);
                    CostCalcDetails.SumMaterialsLow = parseFloat(Res.SumMaterialsLow);
                    CostCalcDetails.SumMaterialsHigh = parseFloat(Res.SumMaterialsHigh);
                    CostCalcDetails.SumPay = parseFloat(Res.SumPay);
                    CostCalcDetails.SumPayNoAvans = parseFloat(Res.SumPayNoAvans);
                    CostCalcDetails.SetValue();
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        };
        
        var CostCalcDocumentsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceCostCalcDocuments), {
            data: {
                calc_id: CostCalculations.calc_id
            },
        });
        CostCalcDocumentsDataAdapter.dataBind();
        
        $("#CostCalcDocumentsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: false,
                width: '99%',
                height: 'calc(100% - 52px)',
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
                
        
        $("#DateCCDetails").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CostCalculations.date, formatString: 'dd.MM.yyyy H:mm', readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 130}));
        $("#group_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 210 }));
        $("#workname").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 180 }));
        $("#empl_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 150 }));
        $("#jrdc_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 250 }));
        $("#RegistrationName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 160 }));
        $("#best_date").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CostCalculations.best_date, formatString: 'dd.MM.yyyy H:mm', readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 130}));
        $("#Demand_id").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 75 }));
        $("#sum_materials_low").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 80, readOnly: true, spinButtonsStep: 0 }));
        $("#date_ready").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: CostCalculations.date_ready, formatString: 'dd.MM.yyyy H:mm', readonly: true, showCalendarButton: false, allowKeyboardDelete: false, width: 130}));
        $("#spec_condt").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: '350px', height: 42 }));
        $("#note").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: '350px', height: 42 }));
        $("#EmplAgreed").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 180 }));
        $("#chbGarantMail").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 140, checked: CostCalculations.GarantMail}));
        
        
        $("#edIntogoStartingWork").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 150, readOnly: true, spinButtonsStep: 0 }));
        $("#edItogoExpences").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 150, readOnly: true, spinButtonsStep: 0 }));
        $("#edItogoTotalWork").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 150, readOnly: true, spinButtonsStep: 0 }));
        $("#edIntogoStartingWorkLow").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 150, readOnly: true, spinButtonsStep: 0 }));
        $("#edIntogoKoef").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 150, readOnly: true, spinButtonsStep: 0 }));
        $('#btnEditDetailsCostCalc').jqxButton($.extend(true, {}, ButtonDefaultSettings, { imgSrc: '/images/4.png', disabled: !(CostCalculations.date_agreed == null && CostCalculations.date_ready == null)}));
        $("#edSumLowFull").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 150, readOnly: true, spinButtonsStep: 0 }));
        $("#edSumHightFull").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 150, readOnly: true, spinButtonsStep: 0 }));
        $("#edDiscount").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 150, readOnly: true, spinButtonsStep: 0 }));
        $("#edSumMarj").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 150, readOnly: true, spinButtonsStep: 0 }));
        $("#edProcMarj").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 150, readOnly: true, spinButtonsStep: 0 }));
        $('#btnAutoMarj').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: '200px', imgSrc: '/images/1.png', disabled: !(CostCalculations.date_agreed == null && CostCalculations.date_ready == null) }));
        $('#btnEditCostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings, { imgSrc: '/images/4.png', disabled: !(CostCalculations.date_agreed == null && CostCalculations.date_ready == null)}));
        $('#btnVDemand').jqxButton($.extend(true, {}, ButtonDefaultSettings, {}));
        $("#btnVDemand").on('click', function() {
            if (CostCalculations.Demand_id != null)
                Aliton.ViewDemand(CostCalculations.Demand_id, true);
        });
        
        $('#btnSendAgreedCostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: '256px'}));
        $('#btnAgreedCostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: '256px', imgSrc: '/images/1.png' }));
        $('#btnUndoAgreedCostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: '100%', imgSrc: '/images/3.png' }));
        $('#btnReadyCostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: '100%', imgSrc: '/images/1.png' }));
        $('#btnUndoReadyCostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: '100%', imgSrc: '/images/3.png' }));
        var CheckBtnDocuments = function(){
            $('#btnAddDocTreb').jqxButton({disabled: (CostCalculations.date_ready == null || parseInt(CostCalculations.type == 0))});
            $('#btnAddDocContract1').jqxButton({disabled: (parseInt(CostCalculations.type) == 0)});
            $('#btnAddDocContract2').jqxButton({disabled: (parseInt(CostCalculations.type) == 0)});
            $('#btnAddDocAct').jqxButton({disabled: ( CostCalculations.date_ready == null || parseInt(CostCalculations.type) == 0)});
            $('#btnAddDocDelivery').jqxButton({disabled: (parseInt(CostCalculations.type) == 0)});
            $('#btnAddDocContract3').jqxButton({disabled: (parseInt(CostCalculations.type) == 0)});
            $('#btnAddDocBuhAct').jqxButton({disabled: (parseInt(CostCalculations.type) == 0)});
        };
        $("#ddbtnDocuments").on('open', function(){
            CheckBtnDocuments();
        });
        
    
        $("#ddbtnDocuments").jqxDropDownButton({initContent: function(){
            $('#btnAddDocSmets').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: '256px'}));
            $('#btnAddDocDopSmets').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: '256px'}));
            $('#btnAddDocTreb').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: '256px'}));
            $('#btnAddDocMonitoring').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: '256px'}));
            $('#btnAddDocContract1').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: '256px'}));
            $('#btnAddDocContract2').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: '256px'}));
            $('#btnAddDocAct').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: '256px'}));
            $('#btnAddDocDelivery').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: '256px'}));
            $('#btnAddDocBuhAct').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: '256px'}));
            $('#btnAddDocContract3').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: '256px'}));
            
            var currentDocType;
            $('#IsDocExistDialog').jqxWindow(
                $.extend(true, DialogDefaultSettings, {
                    width: 540,
                    height: 130,
                    initContent: function () {
                        $("#IsDocExistDialogYes").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                        $("#IsDocExistDialogCancel").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                        var customCostCalcType;
                        console.log('CostCalculations.type = ' + CostCalculations.type);
                        switch (Number(CostCalculations.type)) {
                            case 0:
                                customCostCalcType = 'этом КП';
                                break;
                            case 1:
                                customCostCalcType = 'этой смете';
                                break;
                            case 2:
                                customCostCalcType = 'этой доп. смете';
                                break;
                        }
                         console.log('customCostCalcType = ' + customCostCalcType);
                         
                        $("#customCostCalcType").html(customCostCalcType);

                        $("#IsDocExistDialogCancel").on('click', function () {
                            $('#IsDocExistDialog').jqxWindow('Close');
                        });

                        $("#IsDocExistDialogYes").on('click', function () {
                            $('#IsDocExistDialog').jqxWindow('Close');
                            switch (currentDocType) {
                                case 0:
                                    addDocMonitoring();
                                    break;
                                case 1:
                                    addDocTreb();
                                    break;
                                case 4:
                                    addDocContract1();
                                    break;
                                case 3:
                                    addDocContract2();
                                    break;
                                case 2:
                                    addDocAct();
                                    break;
                                case 5:
                                    addDocDelivery();
                                    break;
                                case 6:
                                    addDocBuhAct();
                                    break;
                                case 7:
                                    addDocContract3();
                                    break;
                            }
                        });
                    }
                })
            );
    
    
            $('#btnAddDocSmets').on('click', function(){
                
                if ((CostCalculations.count_type0 > 0) && (CostCalculations.count_type1 == 0)) {
                    $.ajax({
                        url: <?php echo json_encode(Yii::app()->createUrl('CostCalculations/Add')) ?>,
                        type: 'POST',
                        async: false,
                        data: {
                            Params: {
                                cgrp_id: CostCalculations.cgrp_id,
                                type: 1
                            }
                        },
                        success: function(Res) {
                            Res = JSON.parse(Res);
                            if (Res.result == 1)
                                location.href =<?php echo json_encode(Yii::app()->createUrl('CostCalculations/Index')); ?> + '&calc_id=' + Res.id;
                            else
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                            
                        },
                        error: function(Res) {
                            Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                        }
                    });
                } else {
                    if (CostCalculations.count_type0 == 0) 
                        Aliton.ShowErrorMessage('Ошибка', 'В этом проекте нет подтвержденного коммерческого предложения');
                    if (CostCalculations.count_type1 > 0) 
                        Aliton.ShowErrorMessage('Ошибка', 'В этом проекте уже создана смета');
                }
                
            });
            
            $('#btnAddDocDopSmets').on('click', function(){
                if ((CostCalculations.count_type1 == 1)) {
                    $.ajax({
                        url: <?php echo json_encode(Yii::app()->createUrl('CostCalculations/Add')) ?>,
                        type: 'POST',
                        async: false,
                        data: {
                            Params: {
                                cgrp_id: CostCalculations.cgrp_id,
                                type: 2
                            }
                        },
                        success: function(Res) {
                            Res = JSON.parse(Res);
                            if (Res.result == 1)
                                location.href =<?php echo json_encode(Yii::app()->createUrl('CostCalculations/Index')); ?> + '&calc_id=' + Res.id;
                            else
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                            
                        },
                        error: function(Res) {
                            Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                        }
                    });
                } else {
                    if (CostCalculations.count_type1 == 0) 
                        Aliton.ShowErrorMessage('Ошибка', 'В этом нет сметы');
                }
                
            });
            
            var addDocTreb = function () {
                $('#CostCalculationsDialog').jqxWindow({width: 750, height: 530, position: 'center', isModal: true});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('WHDocuments/Create')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Dctp_id: 4,
                        DialogId: 'CostCalculationsDialog',
                        BodyDialogId: 'BodyCostCalculationsDialog',
                        Params: {
                            objc_id: CostCalculations.Object_id,
                            calc_id: CostCalculations.calc_id,
                            date: CostCalculations.date,
                            wrtp_id: CostCalculations.wrtp_id,
                            prty_id: 8,
                            rcrs_id: 2,
                            ReceiptDate: CostCalculations.date,
                            ReceiptNumber: CostCalculations.calc_id,
                            dmnd_empl_id: CostCalculations.empl_id,
                            prms_empl_id: CostCalculations.empl_id,
                            empl_id: CurrentUser,
                            Address: CostCalculations.Addr
                        },
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyCostCalculationsDialog").html(Res.html);
                        $('#CostCalculationsDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            };
            
            $('#btnAddDocTreb').on('click', function() {
                var docExist = Aliton.CheckToCostCalcDocs(CostCalcDocumentsDataAdapter.records, 1);
                if (docExist) {
                    currentDocType = 1;
                    $('#IsDocExistDialog').jqxWindow('open');
                    $("#customDoc").html('требование на выдачу');
                }
                else if (!docExist) {
                    addDocTreb();
                }
            });
            
            
            var addDocMonitoring = function () {
                $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '330px', width: '640'}));
                $.ajax({
                    url: "<?php echo Yii::app()->createUrl('MonitoringDemands/Insert');?>",
                    type: 'POST',
                    async: false,
                    data: {
                        DialogId: 'CostCalculationsDialog',
                        BodyDialogId: 'BodyCostCalculationsDialog',
                        Params: {
                            Calc_id: CostCalculations.calc_id,
                            Prior: 1,
                            Note: CostCalculations.note
                        }
                    },
                    success: function(Res) {
                        $('#BodyCostCalculationsDialog').html(Res);
                        $('#CostCalculationsDialog').jqxWindow('open');
                    }
                });
            };
            
            $('#btnAddDocMonitoring').on('click', function(){
            console.log(CostCalcDocumentsDataAdapter.records);
                var docExist = Aliton.CheckToCostCalcDocs(CostCalcDocumentsDataAdapter.records, 0);
                if (docExist) {
                    currentDocType = 0;
                    $('#IsDocExistDialog').jqxWindow('open');
                    $("#customDoc").html('заявка на мониторинг');
                }
                else if (!docExist) {
                    addDocMonitoring();
                }
            });
            
            
            var addDocContract1 = function () {
                $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: false, height: '630px', width: '870'}));
                $.ajax({
                    url: "<?php echo Yii::app()->createUrl('Documents/Insert');?>",
                    type: 'POST',
                    async: false,
                    data: {
                        DialogId: 'CostCalculationsDialog',
                        BodyDialogId: 'BodyCostCalculationsDialog',
                        ObjectGr_id: CostCalculations.ObjectGr_id,
                        DocType_Name: 'Счет',
                        Params: {
                            Calc_id: CostCalculations.calc_id,
                            ContrDateS: CostCalculations.date,
                            ContrSDateStart: CostCalculations.date,
                            ContrSDateEnd: CostCalculations.date,
                            PaymentType_id: CostCalculations.PaymentType_id,
                            PaymentPeriod_id: 1,
                            CalcSum: CostCalcDetails.SumHighFull,
                            discount: CostCalcDetails.Discount,
                            Jrdc_id: CostCalculations.Jrdc_id,
                            SpecialCondition: CostCalculations.Name,
                            dmnd_id: CostCalculations.Demand_id,
                            Info: CostCalculations.Info_id,
                            DocNumber: CostCalculations.ContrNumS,
                            DocDate: CostCalculations.ContrDateS, 
                            ObjectGr_id: CostCalculations.ObjectGr_id,
                            WorkText: CostCalculations.Name,
                            empl_id: CurrentUser,
                        }
                    },
                    success: function(Res) {
                        $('#BodyCostCalculationsDialog').html(Res);
                        $('#CostCalculationsDialog').jqxWindow('open');
                    }
                });
            };
            
            $('#btnAddDocContract1').on('click', function() {
                var docExist = Aliton.CheckToCostCalcDocs(CostCalcDocumentsDataAdapter.records, 4);
                if (docExist) {
                    currentDocType = 4;
                    $('#IsDocExistDialog').jqxWindow('open');
                    $("#customDoc").html('счет');
                }
                else if (!docExist) {
                    addDocContract1();
                }
            });
            
            
            
            var addDocContract2 = function () {
                $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: false, height: '630px', width: '870'}));
                $.ajax({
                    url: "<?php echo Yii::app()->createUrl('Documents/Insert');?>",
                    type: 'POST',
                    async: false,
                    data: {
                        DialogId: 'CostCalculationsDialog',
                        BodyDialogId: 'BodyCostCalculationsDialog',
                        ObjectGr_id: CostCalculations.ObjectGr_id,
                        DocType_Name: 'Доп.соглашение',
                        Params: {
                            Calc_id: CostCalculations.calc_id,
                            ContrDateS: CostCalculations.date,
                            ContrSDateStart: CostCalculations.date,
                            ContrSDateEnd: CostCalculations.date,
                            PaymentType_id: CostCalculations.PaymentType_id,
                            PaymentPeriod_id: 1,
                            CalcSum: CostCalcDetails.SumHighFull,
                            discount: CostCalcDetails.Discount,
                            Jrdc_id: CostCalculations.Jrdc_id,
                            SpecialCondition: CostCalculations.Name,
                            dmnd_id: CostCalculations.Demand_id,
                            Info: CostCalculations.Info_id,
                            DocNumber: CostCalculations.ContrNumS,
                            DocDate: CostCalculations.ContrDateS, 
                            ObjectGr_id: CostCalculations.ObjectGr_id,
                            WorkText: CostCalculations.Name,
                            empl_id: CurrentUser,
                        }
                    },
                    success: function(Res) {
                        $('#BodyCostCalculationsDialog').html(Res);
                        $('#CostCalculationsDialog').jqxWindow('open');
                    }
                });
            };
            
            $('#btnAddDocContract2').on('click', function() {
                var docExist = Aliton.CheckToCostCalcDocs(CostCalcDocumentsDataAdapter.records, 3);
                if (docExist) {
                    currentDocType = 3;
                    $('#IsDocExistDialog').jqxWindow('open');
                    $("#customDoc").html('доп. соглашение');
                }
                else if (!docExist) {
                    addDocContract2();
                }
            });
            
            
            
            var addDocAct = function () {
                var SumHightFullValue = $('#edSumHightFull').jqxNumberInput('val');
                $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: false, height: '520', width: '990'}));
                $.ajax({
                    url: "<?php echo Yii::app()->createUrl('WHActs/Insert');?>",
                    type: 'POST',
                    async: false,
                    data: {
                        Params: {
                            calc_id: CostCalculations.calc_id,
                            objc_id: CostCalculations.Object_id,
                            jrdc_id: CostCalculations.Jrdc_id,
                            sum: SumHightFullValue,
                        }
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $('#BodyCostCalculationsDialog').html(Res.html);
                        $('#CostCalculationsDialog').jqxWindow('open');
                    }
                });
            };
            
            $('#btnAddDocAct').on('click', function(){
                var docExist = Aliton.CheckToCostCalcDocs(CostCalcDocumentsDataAdapter.records, 2);
                if (docExist) {
                    currentDocType = 2;
                    $('#IsDocExistDialog').jqxWindow('open');
                    $("#customDoc").html('внутренний акт');
                }
                else if (!docExist) {
                    addDocAct();
                }
            });
            
            var addDocDelivery = function () {
                $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: false, height: '470', width: '800'}));
                $.ajax({
                    url: "<?php echo Yii::app()->createUrl('Delivery/Insert');?>",
                    type: 'POST',
                    async: false,
                    data: {
                        DialogId: 'CostCalculationsDialog',
                        BodyDialogId: 'BodyCostCalculationsDialog',
                        Params: {
                            calc_id: CostCalculations.calc_id,
                            prty_id: 1,
                            objc_id: CostCalculations.Object_id,
                            Addr: CostCalculations.Addr,
                        }
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $('#BodyCostCalculationsDialog').html(Res.html);
                        $('#CostCalculationsDialog').jqxWindow('open');
                    }
                });
            };
            
            $('#btnAddDocDelivery').on('click', function(){
                var docExist = Aliton.CheckToCostCalcDocs(CostCalcDocumentsDataAdapter.records, 5);
                if (docExist) {
                    currentDocType = 5;
                    $('#IsDocExistDialog').jqxWindow('open');
                    $("#customDoc").html('заявка на доставку');
                }
                else if (!docExist) {
                    addDocDelivery();
                }
            });
            
            
            var addDocBuhAct = function () {
                $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 540, width: 750}));
                $.ajax({
                    url: "<?php echo Yii::app()->createUrl('WHBuhActs/Create');?>",
                    type: 'POST',
                    async: false,
                    data: {
                        DialogId: 'CostCalculationsDialog',
                        BodyDialogId: 'BodyCostCalculationsDialog',
                        Params: {
                            date: CostCalculations.date,
                            objc_id: CostCalculations.Object_id,
                            ObjectGr_id: CostCalculations.ObjectGr_id,
                            jrdc_id: CostCalculations.Jrdc_id,
                            wrtp_id: CostCalculations.wrtp_id,
                            calc_id: CostCalculations.calc_id,
                            sum: CostCalcDetails.SumHighFull,
                            org_name: CostCalculations.FullName,
                            Form_id: CostCalculations.Form_id
                        }
                    },
                    success: function(Res) {
                        $('#CostCalculationsDialog').jqxWindow('open');
                        $('#BodyCostCalculationsDialog').html(Res);
                    }
                });
            };
            
            $('#btnAddDocBuhAct').on('click', function(){
                var docExist = Aliton.CheckToCostCalcDocs(CostCalcDocumentsDataAdapter.records, 6);
                if (docExist) {
                    currentDocType = 6;
                    $('#IsDocExistDialog').jqxWindow('open');
                    $("#customDoc").html('бухгалтерский акт');
                }
                else if (!docExist) {
                    addDocBuhAct();
                }
            });
            
            
            var addDocContract3 = function () {
                $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: false, height: '450px', width: '810'}));
                $.ajax({
                    url: "<?php echo Yii::app()->createUrl('Documents/Insert');?>",
                    type: 'POST',
                    async: false,
                    data: {
                        DialogId: 'CostCalculationsDialog',
                        BodyDialogId: 'BodyCostCalculationsDialog',
                        ObjectGr_id: CostCalculations.ObjectGr_id,
                        DocType_Name: 'Счет-заказ',
                        Params: {
                            Calc_id: CostCalculations.calc_id,
                            ContrDateS: CostCalculations.date,
                            ContrSDateStart: CostCalculations.date,
                            ContrSDateEnd: CostCalculations.date,
                            PaymentType_id: CostCalculations.PaymentType_id,
                            PaymentPeriod_id: 1,
                            CalcSum: CostCalcDetails.SumHighFull,
                            Price: CostCalcDetails.SumHighFull,
                            discount: CostCalcDetails.Discount,
                            Jrdc_id: CostCalculations.Jrdc_id,
                            SpecialCondition: CostCalculations.Name,
                            dmnd_id: CostCalculations.Demand_id,
                            Info: CostCalculations.Info_id,
                            DocNumber: CostCalculations.ContrNumS,
                            DocDate: CostCalculations.ContrDateS, 
                            ObjectGr_id: CostCalculations.ObjectGr_id,
                            WorkText: CostCalculations.Name,
                            empl_id: CurrentUser
                        }
                    },
                    success: function(Res) {
                        $('#BodyCostCalculationsDialog').html(Res);
                        $('#CostCalculationsDialog').jqxWindow('open');
                    }
                });
            };
            
            $('#btnAddDocContract3').on('click', function() {
                var docExist = Aliton.CheckToCostCalcDocs(CostCalcDocumentsDataAdapter.records, 7);
                if (docExist) {
                    currentDocType = 7;
                    $('#IsDocExistDialog').jqxWindow('open');
                    $("#customDoc").html('счет-заказ');
                }
                else if (!docExist) {
                    addDocContract3();
                }
            });
        }});
        
        $("#ddbtnDocuments").jqxDropDownButton($.extend(true, {}, DropDownButtonDefaultSettings, { autoOpen: false, width: 260, height: 28 }));
        var ddbtnDocuments = '<div style="position: relative; margin-left: 3px; text-align: center; margin-top: 6px;">Документ</div>';
        $("#ddbtnDocuments").jqxDropDownButton('setContent', ddbtnDocuments);
        
        var SetStateButtons = function() {
            $('#btnEditCostCalculations').jqxButton({disabled: !(CostCalculations.date_agreed == null && CostCalculations.date_ready == null)});
            $('#btnAgreedCostCalculations').jqxButton({disabled: !(CostCalculations.date_agreed == null)});
            $('#btnUndoAgreedCostCalculations').jqxButton({disabled: !(CostCalculations.date_agreed != null && CostCalculations.date_ready == null)});
            $('#btnReadyCostCalculations').jqxButton({disabled: !(CostCalculations.date_ready == null && CostCalculations.date_agreed != null)});
            $('#btnUndoReadyCostCalculations').jqxButton({disabled: !(CostCalculations.date_ready != null)});
            $('#btnEditDetailsCostCalc').jqxButton({disabled: !(CostCalculations.date_agreed == null && CostCalculations.date_ready == null)});
            $('#btnAutoMarj').jqxButton({disabled: !(CostCalculations.date_agreed == null && CostCalculations.date_ready == null)});
        };
        
        $("#dropDownBtnCostCalculations").on('open', function(){
            SetStateButtons();
        });
        
        $("#dropDownBtnCostCalculations").jqxDropDownButton({initContent: function(){
                var CheckAgreed = function() {
                    if (Administrator || (parseInt(CostCalculations.Position_id) == 150)) return true;
                    var Type = parseInt(CostCalculations.type);
                    var Chief = false;
                    var PM = false;
                    var RSC = false;
                    var ROPR = false;
                    var God = false;
                    if (parseInt(CostCalculations.Position_id) == 151)
                        God = true;
                    if (parseInt(CostCalculations.Position_id) == 37)
                        RSC = true;
                    if (parseInt(CostCalculations.Position_id) == 86)
                        PM = true;
                    if (parseInt(CostCalculations.Position_id) == 31)
                        ROPR = true;
                    
                    if (God) return true;
                    
                    if ((parseInt(CostCalculations.Position_id) == 37) || (parseInt(CostCalculations.Position_id) == 152))
                        Chief = true;
                    //var Chief = (find([37, 152], parseFloat(CostCalculations.Position_id)) != -1);
                    var Marj = (parseFloat(CostCalcDetails.ProcMarj) >= parseFloat(CostCalculations.ccwt_proc));
                    var Discount15 = (parseFloat(CostCalcDetails.Discount) > 15);
                    var Discount5 = (parseFloat(CostCalcDetails.Discount) > 5);
                    var Marj20 = (parseFloat(CostCalcDetails.ProcMarj) >= 20);
                    var Marj30 = (parseFloat(CostCalcDetails.ProcMarj) >= 30);
                    var NotWorks = (parseFloat(CostCalcDetails.SumWorkLow) == 0);
                    var CheckEquips = (parseFloat(CostCalcDetails.SumEquipsHigh) >= parseFloat(CostCalcDetails.SumEquipsHighDefault));
                    var Discount0 = (parseFloat(CostCalcDetails.Discount) == 0);
                    var SumNoAvans = parseFloat(CostCalcDetails.SumPayNoAvans) + CostCalcDetails.SumHighFull;
                    var GarantMail = CostCalculations.GarantMail;
                    
                    var ProcPay = 0;
                    if (CostCalcDetails.SumHighFull > 0)
                        ProcPay = (parseFloat(CostCalcDetails.SumPay)*100)/CostCalcDetails.SumHighFull;
                    var Pay50 = (parseFloat(ProcPay) >= 50);
                    
                    if (Type == 0) {// КП
                        if (ROPR) {
                            if (!Marj20 && !NotWorks) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Маржинальная прибыль должна быть больше 20%');
                                return false;
                            }
                            if (!CheckEquips && NotWorks && Discount0) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Требуется увеличить стоимость оборудования');
                                return false;
                            }
                        }
                        else if (PM) {
                            if (!Marj30 && !NotWorks) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Маржинальная прибыль должна быть больше 30%');
                                return false;
                            }
                            if (Discount5 && !Marj30) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Скидка не может быть больше 5%');
                                return false;
                            }
                            if (!CheckEquips && NotWorks && Discount0) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Требуется увеличить стоимость оборудования');
                                return false;
                            }
                        }
                        else if (RSC) {
                            if (!Marj20 && !NotWorks) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Маржинальная прибыль должна быть больше 20%');
                                return false;
                            }
                            if (Discount15) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Скидка не может быть больше 15%');
                                return false;
                            }
                            if (!CheckEquips && NotWorks && Discount0) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Требуется увеличить стоимость оборудования');
                                return false;
                            }
                        }
                        else if (Chief) {
                            if (Discount15 && !Marj20) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Маржинальная прибыль должна быть больше 20%, а скидка не привышать 15%');
                                return false;
                            }
                            if (!Marj30 && !NotWorks) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Маржинальная прибыль должна быть больше 30%');
                                return false;
                            }
                            if (!CheckEquips && NotWorks && Discount0) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Требуется увеличить стоимость оборудования');
                                return false;
                            }
                            
                        } else {
                            
                            if (!Marj && !NotWorks) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Маржинальная прибыль должна быть больше ' + parseFloat(CostCalculations.ccwt_proc) + '%');
                                return false;
                            }
                            if (!CheckEquips && NotWorks && Discount0) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Требуется увеличить стоимость оборудования');
                                return false;
                            }
                        }
                        
                    }
                    if (Type == 1 || Type == 2) { // Смета
                        if (ROPR) {
                            if (!Marj20 && !NotWorks) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Маржинальная прибыль должна быть больше 20%');
                                return false;
                            }
                            if (!CheckEquips && NotWorks && Discount0) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Требуется увеличить стоимость оборудования');
                                return false;
                            }
                            
                            if (parseFloat(CostCalcDetails.SumHighFull) >= 10000 && !Pay50) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Если сумма сметы больше 10000р., счет должен быть оплачен на 50% или более.');
                                return false;
                            }
                        } else if (PM) {
                            if (!Marj30 && !NotWorks) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Маржинальная прибыль должна быть больше 30%');
                                return false;
                            }
                            if (Discount5) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Скидка не может быть больше 5%');
                                return false;
                            }
                            if (!CheckEquips && NotWorks && Discount0) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Требуется увеличить стоимость оборудования');
                                return false;
                            }
                            if (!Pay50) {
                                if (SumNoAvans >= 50000) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Требуется аванс более 50%, лимит в 50000р. превышен.');
                                    return false;
                                }
                                else {
                                    console.log(GarantMail);
                                    if (GarantMail && CostCalcDetails.SumHighFull >= 20000) {
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Без 50% аванса и с гарантийным письмом, можно согласовать смету только если сумма не превышает 20000р.');
                                        return false;
                                    }
                                    if (!GarantMail && CostCalcDetails.SumHighFull >= 10000) {
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Без 50% аванса и без гарантийного письма, можно согласовать смету только если сумма не превышает 10000р.');
                                        return false;
                                    }
                                }
                            }
                        }
                        else if (RSC) {
                            if (!Marj20 && !NotWorks) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Маржинальная прибыль должна быть больше 20%');
                                return false;
                            }
                            if (Discount15) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Скидка не может быть больше 15%');
                                return false;
                            }
                            if (!CheckEquips && NotWorks && Discount0) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Требуется увеличить стоимость оборудования');
                                return false;
                            }
                            
                            if (!Pay50) {
                                if (SumNoAvans >= 200000) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Требуется аванс более 50%, лимит в 200000р. превышен.');
                                    return false;
                                }
                                else {
                                    console.log(GarantMail);
                                    if (GarantMail && CostCalcDetails.SumHighFull >= 50000) {
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Без 50% аванса и с гарантийным письмом, можно согласовать смету только если сумма не превышает 50000р.');
                                        return false;
                                    }
                                    if (!GarantMail && CostCalcDetails.SumHighFull >= 30000) {
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Без 50% аванса и без гарантийного письма, можно согласовать смету только если сумма не превышает 30000р.');
                                        return false;
                                    }
                                }
                            }
                                    
                            
                        }
                        else if (Chief) {
                            if (Discount15 && !Marj20) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Маржинальная прибыль должна быть больше 20%, а скидка не привышать 15%');
                                return false;
                            }
                            if (!Marj30 && !NotWorks) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Маржинальная прибыль должна быть больше 30%');
                                return false;
                            }
                            if (!CheckEquips && NotWorks && Discount0) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Требуется увеличить стоимость оборудования');
                                return false;
                            }
                            if (parseFloat(CostCalcDetails.SumHighFull) > 15000 && !Pay50) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Если сумма сметы больше 15000р., счет должен быть оплачен на 50% или более.');
                                return false;
                            }
                            
                        } else {
                            if (!Marj && !NotWorks) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Маржинальная прибыль должна быть больше ' + parseFloat(CostCalculations.ccwt_proc) + '%');
                                return false;
                            }
                            if (!CheckEquips && NotWorks && Discount0) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Требуется увеличить стоимость оборудования');
                                return false;
                            }
                            
                            if (parseFloat(CostCalcDetails.SumHighFull) >= 10000 && !Pay50) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_AGREED_COSTCALC'], 'Если сумма сметы больше 10000р., счет должен быть оплачен на 50% или более.');
                                return false;
                            }
                        }
                    }
                    return true;
                };
                
                
                $('#btnSendAgreedCostCalculations').on('click', function() {
                    $.ajax({
                        url: <?php echo json_encode(Yii::app()->createUrl('CostCalculations/SendAgreed')) ?>,
                        type: 'POST',
                        async: false,
                        data: {
                            Calc_id: CostCalculations.calc_id,
                        },
                        success: function(Res) {
                            
                        },
                        error: function(Res) {
                            Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                        }
                    });   
                });
                
                $('#btnAgreedCostCalculations').on('click', function(){
                    if (!CheckAgreed()) return;
                    $.ajax({
                        url: <?php echo json_encode(Yii::app()->createUrl('CostCalculations/Agreed')) ?>,
                        type: 'POST',
                        async: false,
                        data: {
                            Calc_id: CostCalculations.calc_id,
                        },
                        success: function(Res) {
                            CostCalculations.Refresh();
                        },
                        error: function(Res) {
                            Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                        }
                    });
                });
                $('#btnUndoAgreedCostCalculations').on('click', function(){
                    $.ajax({
                        url: <?php echo json_encode(Yii::app()->createUrl('CostCalculations/UndoAgreed')) ?>,
                        type: 'POST',
                        async: false,
                        data: {
                            Calc_id: CostCalculations.calc_id,
                        },
                        success: function(Res) {
                            CostCalculations.Refresh();
                        },
                        error: function(Res) {
                            Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                        }
                    });
                });
                $('#btnReadyCostCalculations').on('click', function(){
                    $.ajax({
                        url: <?php echo json_encode(Yii::app()->createUrl('CostCalculations/Ready')) ?>,
                        type: 'POST',
                        async: false,
                        data: {
                            Calc_id: CostCalculations.calc_id,
                        },
                        success: function(Res) {
                            CostCalculations.Refresh();
                        },
                        error: function(Res) {
                            Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                        }
                    });
                });
                $('#btnUndoReadyCostCalculations').on('click', function(){
                    $.ajax({
                        url: <?php echo json_encode(Yii::app()->createUrl('CostCalculations/UndoReady')) ?>,
                        type: 'POST',
                        async: false,
                        data: {
                            Calc_id: CostCalculations.calc_id,
                        },
                        success: function(Res) {
                            CostCalculations.Refresh();
                        },
                        error: function(Res) {
                            Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                        }
                    });
                });
            }
        });
       
        
        $("#dropDownBtnCostCalculations").jqxDropDownButton($.extend(true, {}, DropDownButtonDefaultSettings, { autoOpen: false, width: 260, height: 28 }));
        var dropDownBtnCostCalculations = '<div style="position: relative; margin-left: 3px; text-align: center; margin-top: 6px;">Согласовать</div>';
        $("#dropDownBtnCostCalculations").jqxDropDownButton('setContent', dropDownBtnCostCalculations);
        
        $('#btnPrint1CostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnPrint2CostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 100 }));
        
        $('#btnPrint1CostCalculations').on('click', function() {
            window.open(<?php echo json_encode(Yii::app()->createUrl('Reports/ReportOpen', array(
                            'ReportName' => '/Сметы/Смета 2',
                            'Ajax' => false,
                            'Render' => true,
                        ))); ?> + '&Parameters[pCalc_id]=' + CostCalculations.calc_id + '&FileName=' + <?php echo json_encode($model->group_name)?>);
        });
        $('#btnPrint2CostCalculations').on('click', function() {
            window.open(<?php echo json_encode(Yii::app()->createUrl('Reports/ReportOpen', array(
                            'ReportName' => '/Сметы/Смета (для нас)',
                            'Ajax' => false,
                            'Render' => true,
                            'FileName' => json_encode($model->group_name),
                        ))); ?> + '&Parameters[pCalc_id]=' + CostCalculations.calc_id);
        });
        
        
        $('#btnEditCostCalculations').on('click', function(){
            if ($('#btnEditCostCalculations').jqxButton('disabled')) return;
            $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 640, width: 635, position: 'center' }));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalculations/Update')) ?>,
                type: 'POST',
                async: false,
                data: {
                    calc_id: CostCalculations.calc_id,
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyCostCalculationsDialog").html(Res.html);
                    $('#CostCalculationsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#btnEditDetailsCostCalc').on('click', function(){
            if ($('#btnEditDetailsCostCalc').jqxButton('disabled')) return;
            $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 390, width: 680, position: 'center' }));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalculations/UpdateDetails')) ?>,
                type: 'POST',
                async: false,
                data: {
                    calc_id: CostCalculations.calc_id,
                    sum_full: CostCalcDetails.SumHighFull,
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyCostCalculationsDialog").html(Res.html);
                    $('#CostCalculationsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        $('#btnAutoMarj').on('click', function(){
            if ($('#btnAutoMarj').jqxButton('disabled')) return;
            var Sum = parseFloat(CostCalcDetails.SumLowFull)*1.538;
            Sum = Sum - (parseFloat(CostCalcDetails.SumEquipsHigh) + parseFloat(CostCalcDetails.SumMaterialsHigh));
            var Koef = Sum/parseFloat(CostCalcDetails.SumWorkLow);
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('CostCalculations/UpdateKoef')) ?>,
                type: 'POST',
                async: false,
                data: {
                    calc_id: CostCalculations.calc_id,
                    koef: Koef,
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    if (Res.result == 1)
                        CostCalcDetails.DetailsRefresh();
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        
        if (CostCalculations.group_name !== '') $("#group_name").jqxInput('val', CostCalculations.group_name);
        if (CostCalculations.workname !== '') $("#workname").jqxInput('val', CostCalculations.workname);
        if (CostCalculations.empl_name !== '') $("#empl_name").jqxInput('val', CostCalculations.empl_name);
        if (CostCalculations.jrdc_name !== '') $("#jrdc_name").jqxInput('val', CostCalculations.jrdc_name);
        if (CostCalculations.RegistrationName !== '') $("#RegistrationName").jqxInput('val', CostCalculations.RegistrationName);
        if (CostCalculations.Demand_id !== '') $("#Demand_id").jqxInput('val', CostCalculations.Demand_id);
        if (CostCalculations.sum_materials_low !== '') $("#sum_materials_low").jqxNumberInput('val', CostCalculations.sum_materials_low);
        if (CostCalculations.spec_condt !== '') $("#spec_condt").jqxTextArea('val', CostCalculations.spec_condt);
        if (CostCalculations.note !== '') $("#note").jqxTextArea('val', CostCalculations.note);
        if (CostCalculations.EmplAgreed !== '') $("#EmplAgreed").jqxInput('val', CostCalculations.EmplAgreed);
        
        CostCalcDetails.DetailsRefresh();
        
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    /* Оборудование и расходные материалы */
                    var CostCalcEquipsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceCostCalcEquips), {
                        formatData: function (data) {
                            $.extend(data, {
                                Filters: ["t.calc_id = " + CostCalculations.calc_id],
                            });
                            return data;
                        },
                    });
                    
                    var CheckButtonCCE = function() {
                        $('#AddCostCalcEquips').jqxButton({disabled: !(CostCalculations.date_agreed == null && CostCalculations.date_ready == null)})
                        $('#EditCostCalcEquips').jqxButton({disabled: !(CurrentRowDataCCE != undefined && CostCalculations.date_agreed == null && CostCalculations.date_ready == null)})
                        $('#AddWorkCostCalcEquips').jqxButton({disabled: !(CurrentRowDataCCE != undefined && CostCalculations.date_agreed == null && CostCalculations.date_ready == null)})
                        $('#DelCostCalcEquips').jqxButton({disabled: !(CurrentRowDataCCE != undefined && CostCalculations.date_agreed == null && CostCalculations.date_ready == null)})
                    };
                    
                    $("#CostCalcEquipsGrid").on('rowselect', function (event) {
                        CurrentRowDataCCE = $('#CostCalcEquipsGrid').jqxGrid('getrowdata', event.args.rowindex);
                        CheckButtonCCE();
                    });
                    
                    $('#CostCalcEquipsGrid').on('rowdoubleclick', function (event) { 
                        $("#EditCostCalcEquips").click();
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
                            height: 'calc(100% - 52px)',
                            source: CostCalcEquipsDataAdapter,
                            columns: [
                                { text: 'Наименование', datafield: 'eqip_name', columngroup: 'Equips', filtercondition: 'CONTAINS', width: 250},    
                                { text: 'Ед.изм', datafield: 'um_name', columngroup: 'Equips', filtercondition: 'CONTAINS', width: 60},    
                                { text: 'Кол-во', datafield: 'quant', columngroup: 'Equips', filtercondition: 'CONTAINS', width: 60, cellsformat: 'f2'},    
                                { text: 'Цена за единицу', datafield: 'price', columngroup: 'Equips', filtercondition: 'CONTAINS', width: 130, cellsformat: 'f2'},    
                                { text: 'Стоимость', datafield: 'sum_price', columngroup: 'Equips', filtercondition: 'CONTAINS', cellsformat: 'f2', width: 110, aggregates: [
                                      { 'Сумма':
                                        function (aggregatedValue, currentValue) {
                                            return aggregatedValue + currentValue;
                                        }
                                      }
                                  ]},

                                { text: 'Цена за единицу', datafield: 'price_low', columngroup: 'WorkPrice', filtercondition: 'CONTAINS', width: 130, cellsformat: 'f2'},
                                { text: 'Стоимость', datafield: 'sum_low', columngroup: 'WorkPrice', filtercondition: 'CONTAINS', width: 110, cellsformat: 'f2', aggregates: [
                                      { 'Сумма':
                                        function (aggregatedValue, currentValue) {
                                            return aggregatedValue + currentValue;
                                        }
                                      }
                                  ]},

                                { text: 'Себест.', datafield: 'work_price', columngroup: 'FOT', filtercondition: 'CONTAINS', width: 80, cellsformat: 'f2'},    
                                { text: 'Итого', datafield: 'work_sum', columngroup: 'FOT', filtercondition: 'CONTAINS', width: 80, cellsformat: 'f2'},    
                            ],
                            columngroups: [
                                { text: 'Оборудование', align: 'center', name: 'Equips' },
                                { text: 'Себестоимость', align: 'center', name: 'WorkPrice' },
                                { text: 'ФОТ', align: 'center', name: 'FOT' },
                            ]
                        })
                    );

                    $('#AddCostCalcEquips').on('click', function(){
                        $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 390, width: 610, position: 'center'}));
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('CostCalcEquips/Create')) ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                calc_id: CostCalculations.calc_id
                            },
                            success: function(Res) {
                                Res = JSON.parse(Res);
                                $("#BodyCostCalculationsDialog").html(Res.html);
                                $('#CostCalculationsDialog').jqxWindow('open');
                            },
                            error: function(Res) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                            }
                        });
                    });



                    $('#EditCostCalcEquips').on('click', function(){
                        $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 390, width: 610, position: 'center'}));
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('CostCalcEquips/Update')) ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                cceq_id: CurrentRowDataCCE.cceq_id,
                                calc_id: CostCalculations.calc_id
                            },
                            success: function(Res) {
                                Res = JSON.parse(Res);
                                $("#BodyCostCalculationsDialog").html(Res.html);
                                $('#CostCalculationsDialog').jqxWindow('open');
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
                                var Val = $('#CostCalcEquipsGrid').jqxGrid('getcellvalue', (RowIndex + 1), "cceq_id");
                                Aliton.SelectRowById('cceq_id', Val, '#CostCalcEquipsGrid', true);
                                CostCalcDetails.DetailsRefresh();
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
                        $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 500, width: 640, position: 'center'}));
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('CostCalcWorks/Create')) ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                calc_id: CostCalculations.calc_id,
                                cceq_id: CurrentRowDataCCE.cceq_id,
                                eqip_name: CurrentRowDataCCE.eqip_name,
                                quant: CurrentRowDataCCE.quant,
                                koef_indirect: CostCalculations.koef_indirect,
                            },
                            success: function(Res) {
                                Res = JSON.parse(Res);
                                $("#BodyCostCalculationsDialog").html(Res.html);
                                $('#CostCalculationsDialog').jqxWindow('open');
                            },
                            error: function(Res) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                            }
                        });
                    });

                    $('#AddCostCalcEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings));
                    $('#EditCostCalcEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
                    $('#RefreshCostCalcEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings));
                    $('#AddWorkCostCalcEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
                    $('#DelCostCalcEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
                    
                    $('#CostCalcEquipsGrid').jqxGrid('selectrow', 0);
                break;
                case 1:
                    var CostCalcWorksDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceCostCalcWorks), {
                        formatData: function (data) {
                            $.extend(data, {
                                Filters: ["t.calc_id = " + CostCalculations.calc_id],
                            });
                            return data;
                        },
                    });
                    
                    $("#CostCalcWorksGrid").on('rowselect', function (event) {
                        CurrentRowDataCCW = $('#CostCalcWorksGrid').jqxGrid('getrowdata', event.args.rowindex);
                        CheckButtonCCW();
                    });
                    
                    $('#CostCalcWorksGrid').on('rowdoubleclick', function (event) { 
                        $("#EditCostCalcWorks").click();
                    });
                    
                    $('#AddCostCalcWorks').jqxButton($.extend(true, {}, ButtonDefaultSettings));
                    $('#EditCostCalcWorks').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
                    $('#RefreshCostCalcWorks').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
                    $('#btnPrintCostCalcWorks').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true, width: 140 }));
                    $('#btnPrintForUsCostCalcWorks').jqxButton($.extend(true, {}, ButtonDefaultSettings));
                    $('#DelCostCalcWorks').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true }));
                    
                    var CheckButtonCCW = function() {
                        $('#AddCostCalcWorks').jqxButton({disabled: !(CostCalculations.date_agreed == null && CostCalculations.date_ready == null)})
                        $('#EditCostCalcWorks').jqxButton({disabled: !(CurrentRowDataCCW != undefined && CostCalculations.date_agreed == null && CostCalculations.date_ready == null)})
                        $('#RefreshCostCalcWorks').jqxButton({disabled: false})
                        $('#btnPrintCostCalcWorks').jqxButton({disabled: !(CurrentRowDataCCW != undefined)})
                        $('#btnPrintForUsCostCalcWorks').jqxButton({disabled: !(CurrentRowDataCCW != undefined)})
                        $('#DelCostCalcWorks').jqxButton({disabled: !(CurrentRowDataCCW != undefined && CostCalculations.date_agreed == null && CostCalculations.date_ready == null)})
                    };
                    
                    $("#CostCalcWorksGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            pagesizeoptions: ['10', '200', '500', '1000'],
                            pagesize: 200,
                            sortable: true,
                            showstatusbar: true,
                            showaggregates: true,
                            showfilterrow: false,
                            width: '99%',
                            height: 'calc(100% - 52px)',
                            source: CostCalcWorksDataAdapter,
                            columns: [
                                { text: 'Вид работ', datafield: 'cwrt_name', columngroup: 'Works', filtercondition: 'CONTAINS', width: 250},
                                { text: 'Коэф.', datafield: 'koef', columngroup: 'Works', cellsformat: 'f2', filtercondition: 'CONTAINS', width: 60},
                                { text: 'Оборудование', datafield: 'EquipName', columngroup: 'Works', filtercondition: 'CONTAINS', width: 250},
                                { text: 'Кол-во', datafield: 'quant', columngroup: 'Works', filtercondition: 'CONTAINS', width: 60},
                                { text: 'Цена', datafield: 'price', columngroup: 'Works', cellsformat: 'f2', filtercondition: 'CONTAINS', width: 70},
                                { text: 'Сумма', datafield: 'sum_high', columngroup: 'Works', cellsformat: 'f2', filtercondition: 'CONTAINS', width: 110, aggregates: [
                                      { 'Сумма':
                                        function (aggregatedValue, currentValue) {
                                            return aggregatedValue + currentValue;
                                        }
                                      }
                                  ]},

                                { text: 'Цена', datafield: 'price_low', columngroup: 'WorkPrice', cellsformat: 'f2', filtercondition: 'CONTAINS', width: 130},
                                { text: 'Итого', datafield: 'sum_low', columngroup: 'WorkPrice', cellsformat: 'f2', filtercondition: 'CONTAINS', width: 110, aggregates: [
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
            
                    $('#AddCostCalcWorks').on('click', function(){
                        $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 460, width: 640, position: 'center'}));
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('CostCalcWorks/Create')) ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                calc_id: CostCalculations.calc_id,
                                koef_indirect: CostCalculations.koef_indirect,
                            },
                            success: function(Res) {
                                Res = JSON.parse(Res);
                                $("#BodyCostCalculationsDialog").html(Res.html);
                                $('#CostCalculationsDialog').jqxWindow('open');
                            },
                            error: function(Res) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                            }
                        });
                    });

                    $('#EditCostCalcWorks').on('click', function(){
                        $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 500, width: 640, position: 'center'}));
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('CostCalcWorks/Update')) ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                ccwr_id: CurrentRowDataCCW.ccwr_id,
                                calc_id: CostCalculations.calc_id,
                            },
                            success: function(Res) {
                                Res = JSON.parse(Res);
                                $("#BodyCostCalculationsDialog").html(Res.html);
                                $('#CostCalculationsDialog').jqxWindow('open');
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
                                CostCalcDetails.DetailsRefresh();
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
                            'ReportName' => '/Сметы/Смета - работы',
                            'Ajax' => false,
                            'Render' => true,
                        ))); ?> + '&Parameters[p_calc_id]=' + CostCalculations.calc_id);
                    });

                    $('#btnPrintForUsCostCalcWorks').on('click', function(){
                        window.open(<?php echo json_encode(Yii::app()->createUrl('Reports/ReportOpen', array(
                            'ReportName' => '/Сметы/Смета - работы (для нас)',
                            'Ajax' => false,
                            'Render' => true,
                        ))); ?> + '&Parameters[calc_id]=' + CostCalculations.calc_id);
                    });

                    $('#CostCalcWorksGrid').jqxGrid('selectrow', 0);
                break;
                case 2:
//                    var CostCalcDocumentsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceCostCalcDocuments), {
//                        data: {
//                            calc_id: CostCalculations.calc_id
//                        },
//                    });
                    
                    $('#CostCalcDocumentsGrid').on('rowdoubleclick', function (event) { 
                        $("#MoreInfoCostCalcDocuments").click();
                    });
                    
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
//                        console.log(CurrentRowDataCCD);
                        if (CurrentRowDataCCD.DocType_id == 6) {
                            $('#DelCostCalcDocuments').jqxButton({ disabled: false })
                        } else {
                            $('#DelCostCalcDocuments').jqxButton({ disabled: true })
                        }
                    });
                    $('#MoreInfoCostCalcDocuments').on('click', function(){
//                        console.log(CurrentRowDataCCD.DocType_id);
                        if (CurrentRowDataCCD != undefined) {
                            var Type = parseInt(CurrentRowDataCCD.DocType_id);
                            if (Type == 0)
                                window.open(<?php echo json_encode(Yii::app()->createUrl('MonitoringDemands/Index')); ?> + "&mndm_id=" + CurrentRowDataCCD.Docid);
                            if (Type == 1)
                                window.open(<?php echo json_encode(Yii::app()->createUrl('WHDocuments/View')); ?> + "&Docm_id=" + CurrentRowDataCCD.Docid);
                            if (Type === 2)
                                window.open(<?php echo json_encode(Yii::app()->createUrl('WHActs/View')); ?> + "&docm_id=" + CurrentRowDataCCD.Docid);
                            if (Type == 3)
                                window.open(<?php echo json_encode(Yii::app()->createUrl('Documents/Index')); ?> + "&ContrS_id=" + CurrentRowDataCCD.Docid);
                            if (Type === 4)
                                window.open(<?php echo json_encode(Yii::app()->createUrl('Documents/Index')); ?> + "&ContrS_id=" + CurrentRowDataCCD.Docid);
                            if (Type == 5)
                                window.open(<?php echo json_encode(Yii::app()->createUrl('Delivery/View')); ?> + "&Dldm_id=" + CurrentRowDataCCD.Docid);
                            if (Type == 6)
                                window.open(<?php echo json_encode(Yii::app()->createUrl('WHBuhActs/Index')); ?> + "&docm_id=" + CurrentRowDataCCD.Docid);
                            if (Type === 7)
                                window.open(<?php echo json_encode(Yii::app()->createUrl('Documents/Index')); ?> + "&ContrS_id=" + CurrentRowDataCCD.Docid);
                        }
                    });

                    $('#DelCostCalcDocuments').on('click', function(){
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('CostCalcDocuments/Delete')) ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                docm_id: CurrentRowDataCCD.Docid,
                                DocType_id: CurrentRowDataCCD.DocType_id
                            },
                            success: function(Res) {
                                var RowIndex = $('#CostCalcDocumentsGrid').jqxGrid('getselectedrowindex');
                                var Val = $('#CostCalcDocumentsGrid').jqxGrid('getcellvalue', RowIndex, "Docid");
                                Aliton.SelectRowById('Docid', Val, '#CostCalcDocumentsGrid', true);
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


//                    $('#CostCalcDocumentsGrid').jqxGrid('selectrow', 0);
                break;
                case 3:
                    var CostCalcSalarysDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceCostCalcSalarys), {
                        formatData: function (data) {
                            $.extend(data, {
                                Filters: ["c.calc_id = " + CostCalculations.calc_id],
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
                            height: 'calc(100% - 52px)',
                            source: CostCalcSalarysDataAdapter,
                            columns: [
                                { text: 'Сотрудник', datafield: 'EmployeeName', filtercondition: 'CONTAINS', width: 300},
                                { text: 'Сумма', datafield: 'price', cellsformat: 'f2', filtercondition: 'CONTAINS', width: 100},
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
                        $('#DelCostCalcSalarys').jqxButton({disabled: !(CurrentRowDataCCS != undefined)});
                    };
                    var CheckButtonAcceptCCS = function() {
                        if (CurrentRowDataCCS != undefined && CurrentRowDataCCS.date_accept == null) {
                            $('#AcceptCostCalcSalarys').jqxButton({disabled: false});
                            $('#EditCostCalcSalarys').jqxButton({disabled: !(CurrentRowDataCCS != undefined)});
                        } else {
                            $('#AcceptCostCalcSalarys').jqxButton({disabled: true});
                            $('#EditCostCalcSalarys').jqxButton({disabled: !(CurrentRowDataCCS != undefined)});
                        }
                    };

                    $("#CostCalcSalarysGrid").on('rowselect', function (event) {
                        CurrentRowDataCCS = $('#CostCalcSalarysGrid').jqxGrid('getrowdata', event.args.rowindex);
                        CheckButtonCCS();
                        CheckButtonAcceptCCS();
//                        console.log(CurrentRowDataCCS);
//                        console.log(CurrentRowDataCCS.date_accept);
                    });

                    $('#AddCostCalcSalarys').on('click', function(){
                        $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 180, width: 500, position: 'center'}));
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('CostCalcSalarys/Create')) ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                calc_id: CostCalculations.calc_id
                            },
                            success: function(Res) {
                                Res = JSON.parse(Res);
                                $("#BodyCostCalculationsDialog").html(Res.html);
                                $('#CostCalculationsDialog').jqxWindow('open');
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
                        $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 180, width: 500, position: 'center'}));
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('CostCalcSalarys/Update')) ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                ccsl_id: CurrentRowDataCCS.ccsl_id,
                                calc_id: CostCalculations.calc_id,
                            },
                            success: function(Res) {
                                Res = JSON.parse(Res);
                                $("#BodyCostCalculationsDialog").html(Res.html);
                                $('#CostCalculationsDialog').jqxWindow('open');
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
                                $('#CostCalcSalarysGrid').jqxGrid('updatebounddata');
                                $('#CostCalcSalarysGrid').jqxGrid('selectrow', RowIndex -1);
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
                break;
            }
        };

        $('#jqxTabsCostCalculations').jqxTabs({ width: '99.5%', height: '99.5%', initTabContent: initWidgets});

        
        
        
        
    });
</script>


<?php $this->setPageTitle($model->CostCalcType); ?>

<?php echo $model->group_name; ?>

<?php
    $this->breadcrumbs=array(
        'Список объектов'=>array('/object/index'),
        'Карточка объекта'=>array('/objectsgroup/index&ObjectGr_id=' . $model->ObjectGr_id),
        $model->CostCalcType,
    );
?>


<div class="row" style="margin: 0; padding: 0;">    
    <div class="row-column" style="margin: 0;">
        <div class="row">
            <div class="row-column" style="margin-top: 2px;">Дата: </div><div class="row-column"><div id='DateCCDetails'></div></div>
            <div class="row-column">Наименование: <input readonly id='group_name' type="text"></div>
        </div>

        <div class="row" style="margin-top: 5px;">
            <div class="row-column">Вид работ: <input readonly id='workname' type="text"></div>
            <div class="row-column">Сотрудник: <input readonly id='empl_name' type="text"></div>
        </div>
    </div>
    <div class="row-column" style="margin: 0 0 0 5px;">
        <div><div class="row-column">Техническое задание:</div></div>
        <div style="clear: both"></div>
        <div><div class="row-column"><textarea readonly id="spec_condt"></textarea></div></div>
        
    </div>
</div>    
<div class="row" style="margin: 0; padding: 0">
    <div class="row-column" style="margin: 0;">
        <div class="row">
            <div class="row-column">Юр. лицо: <input readonly id='jrdc_name' type="text"></div>
            <div class="row-column"><input readonly id='RegistrationName' type="text"></div>
        </div>
        <div class="row" style="margin-top: 5px;">
            <div class="row-column" style="margin-top: 2px;">Желаемая дата получения: </div><div class="row-column"><div id='best_date'></div></div>
            <div class="row-column">Номер заявки: <input readonly id='Demand_id' type="text"></div>
        </div>
    </div>
    <div class="row-column" style="margin: 0 0 0 5px;">
        <div><div class="row-column">Примечание:</div></div>
        <div style="clear: both"></div>
        <div><div class="row-column" ><textarea readonly id="note"></textarea></div></div>
    </div>
</div>
<div class="row">
    <div class="row-column" style="margin-top: 2px; margin-right: 5px;">Расход. материалы:</div>
    <div class="row-column"><div id='sum_materials_low' readonly="readonly"></div></div>
    <div class="row-column" style="margin-top: 2px; margin-right: 5px;">Дата согл. с рук.: </div><div class="row-column"><div id='date_ready'></div></div>
    <div class="row-column" style="margin-top: 2px;">Согласовал: <input readonly id='EmplAgreed' type="text"></div>
    <div class="row-column" style="margin-top: 2px;"><div id="chbGarantMail">Гарант. письмо</div></div>
</div>
<div class="row" style="margin-top: 3px;">
    <div class="row-column" style="margin: 0 5px 0 0"><input type="button" value="Изменить" id='btnEditCostCalculations'/></div>
    <div style='float: left;' id="dropDownBtnCostCalculations">
        <div style="padding: 2px"><input type="button" value="Отправить на согл." id='btnSendAgreedCostCalculations'/></div>
        <div style="clear: both"></div>
        <div style="padding: 2px"><input type="button" value="Согласовано с рук." id='btnAgreedCostCalculations'/></div>
        <div style="clear: both"></div>
        <div style="padding: 2px"><input type="button" value="Отмена согл. рук." id='btnUndoAgreedCostCalculations'/></div>
        <div style="clear: both"></div>
        <div style="padding: 2px"><input type="button" value="Согласовано с клиентом" id='btnReadyCostCalculations'/></div>
        <div style="clear: both"></div>
        <div style="padding: 2px"><input type="button" value="Отмена согл. клиента" id='btnUndoReadyCostCalculations'/></div>
    </div>
    <div style='float: left; margin-left: 5px;' id="ddbtnDocuments">
        <div style="padding: 2px"><input type="button" value="Смета" id='btnAddDocSmets'/></div>
        <div style="clear: both"></div>
        <div style="padding: 2px"><input type="button" value="Доп. смета" id='btnAddDocDopSmets'/></div>
        <div style="clear: both"></div>
        <div style="padding: 2px"><input type="button" value="Требование" id='btnAddDocTreb'/></div>
        <div style="clear: both"></div>
        <div style="padding: 2px"><input type="button" value="Мониторинг" id='btnAddDocMonitoring'/></div>
        <div style="clear: both"></div>
        <div style="padding: 2px"><input type="button" value="Счет" id='btnAddDocContract1'/></div>
        <div style="clear: both"></div>
        <div style="padding: 2px"><input type="button" value="Дополнительное соглашение" id='btnAddDocContract2'/></div>
        <div style="clear: both"></div>
        <div style="padding: 2px"><input type="button" value="Внутренний акт" id='btnAddDocAct'/></div>
        <div style="clear: both"></div>
        <div style="padding: 2px"><input type="button" value="Заявка на доставку" id='btnAddDocDelivery'/></div>
        <div style="clear: both"></div>
        <div style="padding: 2px"><input type="button" value="Бухгалтерский акт" id='btnAddDocBuhAct'/></div>
        <div style="clear: both"></div>
        <div style="padding: 2px"><input type="button" value="Счет-заказ" id='btnAddDocContract3'/></div>
    </div>
    <div class="row-column" style="margin: 0 0px 0 5px"><input type="button" value="Заявка" id='btnVDemand'/></div>
    <div>
        <div class="row-column" style="float: right; margin: 0 0 0 5px;"><input type="button" value="Печатать" id='btnPrint2CostCalculations'/></div>
        <div class="row-column" style="float: right;"><input type="button" value="Для заказчика" id='btnPrint1CostCalculations'/></div>
    </div>
</div>   
<div id='jqxWidgetCostCalculations' style="margin-top: 5px; min-height: 310px; height: calc(100% - 430px); ">
    <div id='jqxTabsCostCalculations'>
        <ul>
            <li style="margin-left: 20px;">
                <div style="height: 15px;  margin-top: 3px;">
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
            <div id="CostCalcEquipsGrid" class="jqxGridAliton" style="margin-right: 10px; margin-top: 5px;"></div>
            <div class="row" style="margin-top: 5px; padding-left: 0;">
                <div class="row-column"><input type="button" value="Добавить" id='AddCostCalcEquips' /></div>
                <div class="row-column"><input type="button" value="Изменить" id='EditCostCalcEquips' /></div>
                <div class="row-column"><input type="button" value="Обновить" id='RefreshCostCalcEquips'/></div>
                <div class="row-column"><input type="button" value="Работа" id='AddWorkCostCalcEquips'/></div>
                <div class="row-column" style="float: right; margin-right: 10px"><input type="button" value="Удалить" id='DelCostCalcEquips' /></div>
            </div>
        </div>

        <div id='contentCostCalcWorks' style="overflow: hidden; margin-left: 5px; width: 100%; height: 100%">
            <div id="CostCalcWorksGrid" class="jqxGridAliton" style="margin-right: 10px; margin-top: 5px;"></div>
            <div class="row" style="margin-top: 3px; padding-left: 0;">
                <div class="row-column"><input type="button" value="Добавить" id='AddCostCalcWorks' /></div>
                <div class="row-column"><input type="button" value="Изменить" id='EditCostCalcWorks' /></div>
                <div class="row-column"><input type="button" value="Обновить" id='RefreshCostCalcWorks'/></div>
                <div class="row-column"><input type="button" value="Для заказчика" id='btnPrintCostCalcWorks'/></div>
                <div class="row-column"><input type="button" value="Для нас" id='btnPrintForUsCostCalcWorks'/></div>
                <div class="row-column" style="float: right; margin-right: 10px"><input type="button" value="Удалить" id='DelCostCalcWorks' /></div>
            </div>
        </div>

        <div id='contentCostCalcDocuments' style="overflow: hidden; margin-left: 5px; width: 100%; height: 100%">
            <div id="CostCalcDocumentsGrid" class="jqxGridAliton" style="margin-right: 10px; margin-top: 5px;"></div>
            <div class="row" style="margin-top: 3px; padding-left: 0;">
                <div class="row-column"><input type="button" value="Инфо" id='MoreInfoCostCalcDocuments' /></div>
                <div class="row-column"><input type="button" value="Обновить" id='RefreshCostCalcDocuments'/></div>
                <div class="row-column" style="float: right; margin-right: 10px"><input type="button" value="Удалить" id='DelCostCalcDocuments' /></div>
            </div>
        </div>

        <div id='contentCostCalcSalarys' style="overflow: hidden; margin-left: 5px; width: 100%; height: 100%">
            <div id="CostCalcSalarysGrid" class="jqxGridAliton" style="margin-right: 10px; margin-top: 5px;"></div>
            <div class="row" style="margin-top: 3px; padding-left: 0;">
                <div class="row-column"><input type="button" value="Добавить" id='AddCostCalcSalarys' /></div>
                <div class="row-column"><input type="button" value="Изменить" id='EditCostCalcSalarys' /></div>
                <div class="row-column"><input type="button" value="Обновить" id='RefreshCostCalcSalarys'/></div>
                <div class="row-column"><input type="button" value="Подтвердить" id='AcceptCostCalcSalarys'/></div>
                <div class="row-column" style="float: right; margin-right: 10px"><input type="button" value="Удалить" id='DelCostCalcSalarys' /></div>
            </div>
        </div>

    </div>
</div>
<div class="row" style="margin-top: 5px; max-width: 1024px">
    <div class="row-column">
        <div>
            <div class="row-column" style="width: 280px">Пусконаладочные работы для клиента</div>
            <div class="row-column"><div id="edIntogoStartingWork"></div></div>
        </div>
        <div style="clear: both"></div>
        <div>
            <div class="row-column" style="width: 280px">Накладные и транспортные расходы</div>
            <div class="row-column"><div id="edItogoExpences"></div></div>
        </div>
        <div style="clear: both"></div>
        <div>
            <div class="row-column" style="width: 280px">Монтажные работы</div>
            <div class="row-column"><div id="edItogoTotalWork"></div></div>
        </div>
        <div>
            <div class="row-column" style="width: 280px">Пусконаладочные работы (себестоимость)</div>
            <div class="row-column"><div id="edIntogoStartingWorkLow"></div></div>
        </div>
        <div>
            <div class="row-column" style="width: 280px">Коэф. наценки на ФОТ</div>
            <div class="row-column"><div id="edIntogoKoef"></div></div>
        </div>
        <div>
            <div class="row-column" style="float: right; margin-top: 5px;"><input id="btnEditDetailsCostCalc" value="Изменить"/></div>
        </div>
    </div>
    <div class="row-column" style="float: right; width: 415px">
        <div>
            <div class="row-column">Себестоимость</div>
            
            <div class="row-column" style="float: right"><div id="edSumLowFull"></div></div>
        </div>
        <div style="clear: both"></div>
        <div>
            <div class="row-column">Стоимость договора</div>
            <style>
                #edSumHightFull input {
                        font-weight: 600;
                }
            </style>
            <div class="row-column" style="float: right"><div id="edSumHightFull"></div></div>
        </div>
        <div style="clear: both"></div>
        <div>
            <div class="row-column">Скидка</div>
            <div class="row-column" style="float: right"><div id="edDiscount"></div></div>
        </div>
        <div style="clear: both"></div>
        <div>
            <div class="row-column">Общехозяйственные расходы (ОХР)</div>
            <div class="row-column" style="float: right"><div id="edSumMarj"></div></div>
        </div>
        <div style="clear: both"></div>
        <div>
            <div class="row-column">% (ОХР)</div>
            <div class="row-column" style="float: right"><div id="edProcMarj"></div></div>
        </div>
        <div style="clear: both"></div>
        <div>
            <div class="row-column"><input id="btnAutoMarj" value="Подогнать под 35%"/></div>
        </div>
    </div>
</div>




<div id="CostCalculationsDialog" style="display: none;">
    <div id="CostCalculationsDialogHeader">
        <span id="CostCalculationsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogCostCalculationsContent">
        <div style="" id="BodyCostCalculationsDialog"></div>
    </div>
</div>


<div id="IsDocExistDialog" style="display: none">
    <div id="customWindowHeader">
        <span id="captureContainer" style="float: left">Внимание! </span>
    </div>
    <div id="customWindowContent" style="overflow: hidden">
        <div style="margin: 10px">
            <div>В <span id="customCostCalcType"></span> уже есть <span id="customDoc" style="font-weight: bold;"></span>, создать еще?</div>
            <div style="margin-top: 25px">
                <div style="float: left"><input type="button" value="Да" id='IsDocExistDialogYes' /></div>
                <div style="float: right"><input type="button" value="Отмена" id='IsDocExistDialogCancel' /></div>
            </div>
        </div>
    </div>
</div>