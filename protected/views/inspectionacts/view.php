<script type="text/javascript">
    var InspAct = {};
    var Characteristics = {};
    $(document).ready(function () {
        InspAct = {
            Inspection_id: <?php echo json_encode($model->Inspection_id); ?>,
            ObjectGr_id: <?php echo json_encode($model->ObjectGr_id); ?>,
            Demand_id: <?php echo json_encode($model->Demand_id); ?>,
            Date: Aliton.DateConvertToJs('<?php echo $model->Date; ?>'),
            Addr: <?php echo json_encode($model->Addr); ?>,
            SystemTypeName: <?php echo json_encode($model->SystemTypeName); ?>,
            EmployeeName: <?php echo json_encode($model->EmployeeName); ?>,
            FIO: <?php echo json_encode($model->FIO); ?>,
            Territ_Name: <?php echo json_encode($model->Territ_Name); ?>,
            LiveAreaSize: <?php echo json_encode($model->LiveAreaSize); ?>,
            SystemComplexitysName: <?php echo json_encode($model->SystemComplexitysName); ?>,
            CountEntrance: <?php echo json_encode($model->CountEntrance); ?>,
            CountFloors: <?php echo json_encode($model->CountFloors); ?>,
            CountApartments: <?php echo json_encode($model->CountApartments); ?>,
            Perimetr: <?php echo json_encode($model->Perimetr); ?>,
            Feature: <?php echo json_encode($model->Feature); ?>,
            ServiceCompetitor: <?php echo json_encode($model->ServiceCompetitor); ?>,
            MontageCompetitor: <?php echo json_encode($model->MontageCompetitor); ?>,
            Claims: <?php echo json_encode($model->Claims); ?>,
            DateMontage: Aliton.DateConvertToJs('<?php echo $model->DateMontage; ?>'),
            Documentations: <?php echo json_encode($model->Documentations); ?>,
            SystemStatementsName: <?php echo json_encode($model->SystemStatementsName); ?>,
            CountRiser: <?php echo json_encode($model->CountRiser); ?>,
            PreparationVideo: <?php echo json_encode($model->PreparationVideo); ?>,
            StateTrails: <?php echo json_encode($model->StateTrails); ?>,
            BoxInfo: <?php echo json_encode($model->BoxInfo); ?>,
            ResultEngineer: <?php echo json_encode($model->ResultEngineer); ?>,
            ResultHead: <?php echo json_encode($model->ResultHead); ?>,
            DateAgreeROMTO: Aliton.DateConvertToJs('<?php echo $model->DateAgreeROMTO; ?>'),
            DateAgreeRGI: Aliton.DateConvertToJs('<?php echo $model->DateAgreeRGI; ?>'),
            ActEquip_id: 0,
            AgreeShortName: <?php echo json_encode($model->AgreeShortName); ?>
        };

        var SetValueControls = function() {
            $("#edDate").val(InspAct.Date);
            $("#edAddr").val(InspAct.Addr);
            $("#edSystem").val(InspAct.SystemTypeName);
            $("#edEmpl").val(InspAct.EmployeeName);
            $("#edFIO").val(InspAct.FIO);
            $("#edTerrit").val(InspAct.Territ_Name);
            $("#edLiveAreaSize").val(InspAct.LiveAreaSize);
            $("#edSystemComplexitysName").val(InspAct.SystemComplexitysName);
            $("#edCountEntrance").val(InspAct.CountEntrance);
            $("#edCountFloors").val(InspAct.CountFloors);
            $("#edCountApartments").val(InspAct.CountApartments);
            $("#edPerimetr").val(InspAct.Perimetr);
            $("#edFeature").val(InspAct.Feature);
            $("#edServiceCompetitor").val(InspAct.ServiceCompetitor);
            $("#edMontageCompetitor").val(InspAct.MontageCompetitor);
            $("#edClaims").val(InspAct.Claims);
            $("#edDateMontage").val(InspAct.DateMontage);
            $("#edDocumentations").val(InspAct.Documentations);
            $("#edSystemStatementsName").val(InspAct.SystemStatementsName);
            $("#edCountRiser").val(InspAct.CountRiser);
            $("#edPreparationVideo").val(InspAct.PreparationVideo);
            $("#edStateTrails").val(InspAct.StateTrails);
            $("#edBoxInfo").val(InspAct.BoxInfo);
            $("#edResultEngineer").val(InspAct.ResultEngineer);
            $("#edResultHead").val(InspAct.ResultHead);
            $("#chbROMTO").jqxCheckBox('checked', (InspAct.DateAgreeROMTO != null))
//            $("#chbRGI").jqxCheckBox('checked', (InspAct.DateAgreeRGI != null))
            
            
        };
        
        InspAct.Refresh = function() {
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('InspectionActs/GetModel'))?>,
                type: 'POST',
                data: {
                    Inspection_id: InspAct.Inspection_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    InspAct.Date = Aliton.DateConvertToJs(Res.Date);
                    InspAct.Addr = Res.Addr;
                    InspAct.SystemTypeName = Res.SystemTypeName;
                    InspAct.EmployeeName = Res.EmployeeName;
                    InspAct.FIO = Res.FIO;
                    InspAct.Territ_Name = Res.Territ_Name;
                    InspAct.LiveAreaSize = Res.LiveAreaSize;
                    InspAct.SystemComplexitysName = Res.SystemComplexitysName;
                    InspAct.CountEntrance = Res.CountEntrance;
                    InspAct.CountFloors = Res.CountFloors;
                    InspAct.CountApartments = Res.CountApartments;
                    InspAct.Perimetr = Res.Perimetr;
                    InspAct.Feature = Res.Feature;
                    InspAct.ServiceCompetitor = Res.ServiceCompetitor;
                    InspAct.MontageCompetitor = Res.MontageCompetitor;
                    InspAct.Claims = Res.Claims;
                    InspAct.DateMontage = Aliton.DateConvertToJs(Res.DateMontage);
                    InspAct.Documentations = Res.Documentations;
                    InspAct.SystemStatementsName = Res.SystemStatementsName;
                    InspAct.CountRiser = Res.CountRiser;
                    InspAct.PreparationVideo = Res.PreparationVideo;
                    InspAct.StateTrails = Res.StateTrails;
                    InspAct.BoxInfo = Res.BoxInfo;
                    InspAct.ResultHead = Res.ResultHead;
                    InspAct.ResultEngineer = Res.ResultEngineer;
                    InspAct.DateAgreeROMTO = Aliton.DateConvertToJs(Res.DateAgreeROMTO);
                    InspAct.DateAgreeRGI = Aliton.DateConvertToJs(Res.DateAgreeRGI);
                    InspAct.AgreeShortName = Aliton.AgreeShortName;
                    
                    SetValueControls();
//                    $("#btnRefreshDetails").click();
//                    SetStateButtons();
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        };

        $("#edDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, value: InspAct.Date, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edAddr").jqxInput({height: 25, width: 300, minLength: 1, value: InspAct.Addr});
        $("#edSystem").jqxInput({height: 25, width: 150, minLength: 1, value: InspAct.SystemTypeName});
        $("#edEmpl").jqxInput({height: 25, width: 150, minLength: 1, value: InspAct.EmployeeName});
        $("#edFIO").jqxInput({height: 25, width: 250, minLength: 1, value: InspAct.FIO});
        $("#edTerrit").jqxInput({height: 25, width: 100, minLength: 1, value: InspAct.Territ_Name});
        $("#edLiveAreaSize").jqxInput({height: 25, width: 100, minLength: 1, value: InspAct.LiveAreaSize});
        $("#edSystemComplexitysName").jqxInput({height: 25, width: 100, minLength: 1, value: InspAct.SystemComplexitysName});
        $("#edCountEntrance").jqxInput({height: 25, width: 100, minLength: 1, value: InspAct.CountEntrance});
        $("#edCountFloors").jqxInput({height: 25, width: 100, minLength: 1, value: InspAct.CountFloors});
        $("#edCountApartments").jqxInput({height: 25, width: 100, minLength: 1, value: InspAct.CountApartments});
        $("#edPerimetr").jqxInput({height: 25, width: 100, minLength: 1, value: InspAct.CountApartments});
        $('#edFeature').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { placeHolder: '', height: 50, width: 'calc(100% - 2px)', minLength: 1}));
        $("#edServiceCompetitor").jqxInput({height: 25, width: 150, minLength: 1, value: InspAct.ServiceCompetitor});
        $("#edMontageCompetitor").jqxInput({height: 25, width: 150, minLength: 1, value: InspAct.MontageCompetitor});
        $("#edClaims").jqxInput({height: 25, width: 150, minLength: 1, value: InspAct.MontageCompetitor});
        $("#edDateMontage").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, value: InspAct.DateMontage, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edDocumentations").jqxInput({height: 25, width: 150, minLength: 1, value: InspAct.Documentations});
        $("#edSystemStatementsName").jqxInput({height: 25, width: 150, minLength: 1, value: InspAct.SystemStatementsName});
        $("#edCountRiser").jqxInput({height: 25, width: 150, minLength: 1, value: InspAct.CountRiser});
        $("#edPreparationVideo").jqxInput({height: 25, width: 150, minLength: 1, value: InspAct.PreparationVideo});
        $("#edStateTrails").jqxInput({height: 25, width: 150, minLength: 1, value: InspAct.StateTrails});
        $("#edBoxInfo").jqxInput({height: 25, width: 150, minLength: 1, value: InspAct.BoxInfo});
        $('#edResultEngineer').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { placeHolder: '', height: 50, width: 'calc(100% - 2px)', minLength: 1}));
        $('#edResultHead').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { placeHolder: '', height: 50, width: 'calc(100% - 2px)', minLength: 1}));
        
        $('#btnEdit').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $("#chbROMTO").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 160, height: 25, locked :true }));
        $("#edAgreeShortName").jqxInput({height: 25, width: 200, minLength: 1, value: InspAct.AgreeShortName});
        
//        $("#chbRGI").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 160, height: 25, locked :true }));
        $('#btnPrint').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnROMTO').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160, height: 30 }));
//        $('#btnRGI').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160, height: 30 }));
        $('#btnSpec').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnTransfer').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 220, height: 30 }));
        $('#btnTransfer').on('click', function(){
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('InspectionActs/Transfer')) ?>,
                type: 'POST',
                async: false,
                data: {
                    Inspection_id: InspAct.Inspection_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    if (Res.result != 1) 
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.html);
                        
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        var initTrabsfer = function() {
            
        };
        
        $("#chbROMTO").jqxCheckBox('checked', (InspAct.DateAgreeROMTO != null));
//        $("#chbRGI").jqxCheckBox('checked', (InspAct.DateAgreeRGI != null));
        $('#edResultEngineer').jqxTextArea('val', InspAct.ResultEngineer);
        $('#edResultHead').jqxTextArea('val', InspAct.ResultHead);
        
        $('#btnSpec').on('click', function() {
            window.open(<?php echo json_encode(Yii::app()->createUrl('Reports/ReportOpen', array(
                            'ReportName' => '/Акт обследования/Спецификация',
                            'Ajax' => false,
                            'Render' => true,
                        ))); ?> + '&Parameters[Inspection_id]=' + InspAct.Inspection_id + '&FileName=Акт_обследования_' + InspAct.SystemTypeName + '_Спецификация');
        });
        
        $('#btnPrint').on('click', function() {
            window.open(<?php echo json_encode(Yii::app()->createUrl('Reports/ReportOpen', array(
                            'ReportName' => '/Акт обследования/Акт обследования',
                            'Ajax' => false,
                            'Render' => true,
                        ))); ?> + '&Parameters[Inspection_id]=' + InspAct.Inspection_id + '&FileName=Акт_обследования_' + InspAct.SystemTypeName);
        });
        
        $('#btnROMTO').on('click', function() {
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('InspectionActs/Agreed')) ?>,
                type: 'POST',
                async: false,
                data: {
                    InspectionActs: {
                        Inspection_id: InspAct.Inspection_id,
                        Type: 0,
                    },
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        InspAct.Refresh();
                    }
                    else
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.html);
                        
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
//        $('#btnRGI').on('click', function() {
//            $.ajax({
//                url: <?php echo json_encode(Yii::app()->createUrl('InspectionActs/Agreed')) ?>,
//                type: 'POST',
//                async: false,
//                data: {
//                    InspectionActs: {
//                        Inspection_id: InspAct.Inspection_id,
//                        Type: 1,
//                    },
//                },
//                success: function(Res) {
//                    Res = JSON.parse(Res);
//                    if (Res.result == 1) {
//                        InspAct.Refresh();
//                    }
//                    else
//                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.html);
//                        
//                },
//                error: function(Res) {
//                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
//                }
//            });
//        });
        
        $("#btnEdit").on('click', function(){
            if ($("#btnEdit").jqxButton('disabled')) return;
            $('#InspectionActDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 560, width: 735, position: 'center' }));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('InspectionActs/Update')) ?>,
                type: 'POST',
                async: false,
                data: {
                    Inspection_id: InspAct.Inspection_id,
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyInspectionActDialog").html(Res.html);
                    $('#InspectionActDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        var initWidgets = function(tab) {
            switch (tab) {
                case 0:
                    var CurrentRowEquips;
                    var FirstStartEquips = true;
                    
                    var DisabledEquipsControls = function() {
                        $('#btnAddEquips').jqxButton({disabled: true});
                        $('#btnEditEquips').jqxButton({disabled: true});
                        $('#btnRefreshEquips').jqxButton({disabled: true});
                        $('#btnDelEquips').jqxButton({disabled: true});
                    };
                    
                    var CheckEquipsButton = function() {
                        $('#btnAddEquips').jqxButton({disabled: false});
                        $('#btnEditEquips').jqxButton({disabled: (CurrentRowEquips == undefined)});
                        $('#btnRefreshEquips').jqxButton({disabled: false});
                        $('#btnDelEquips').jqxButton({disabled: (CurrentRowEquips == undefined)});
                    };
            
                    $('#btnAddEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnEditEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnRefreshEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnDelEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnExportEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnMonitoringEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    
                    $('#btnMonitoringEquips').on('click', function(){
                        $('#InspectionActDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '330px', width: '640'}));
                        $.ajax({
                            url: "<?php echo Yii::app()->createUrl('MonitoringDemands/Insert');?>",
                            type: 'POST',
                            async: false,
                            data: {
                                DialogId: 'InspectionActDialog',
                                BodyDialogId: 'BodyInspectionActDialog',
                                Params: {
                                    Demand_id: InspAct.Demand_id,
                                    Prior: 1,
                                }
                            },
                            success: function(Res) {
                                $('#BodyInspectionActDialog').html(Res);
                                $('#InspectionActDialog').jqxWindow('open');
                            }
                        });
                    });
                    
                    
                    
                    $('#btnExportEquips').on('click', function() {
                        $("#GridEquips").jqxGrid('exportdata', 'xls', 'Акт_обледования_оборудование', true, null, true, <?php echo json_encode(Yii::app()->createUrl('Reports/UpLoadFileGrid'))?>);
                    });
                    
                    var DataActEquips = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceInspectionActEquips), { async: true,
                        formatData: function (data) {
                                    $.extend(data, {
                                        Filters: ["a.Inspection_id = " + InspAct.Inspection_id]
                                    });
                                    return data;
                                },
                        beforeSend: function(jqXHR, settings) {
                            DisabledEquipsControls();
                        }
                    });
                    
                    $("#GridEquips").on('rowselect', function (event) {
                        CurrentRowEquips = $('#GridEquips').jqxGrid('getrowdata', event.args.rowindex);
                        CheckEquipsButton();
                    });
                    
                    $("#GridEquips").on("bindingcomplete", function (event) {
                        if (InspAct.ActEquip_id !== 0) {
                            Aliton.SelectRowById('ActEquip_id', InspAct.ActEquip_id, '#GridEquips', false);
                            return;
                        }
                        
                        if (CurrentRowEquips != undefined) {
                            Aliton.SelectRowById('ActEquip_id', CurrentRowEquips.ActEquip_id, '#GridEquips', false);
                        }
                        else {
                            if (FirstStartEquips) {
                                $('#GridEquips').jqxGrid('selectrow', 0);
                                $('#GridEquips').jqxGrid('ensurerowvisible', 0);
                                FirstStartEquips = false;
                                
                            }
                        }
                        
                        var DataInformation = $('#GridEquips').jqxGrid('getdatainformation');
                        if (DataInformation.rowscount == 0)
                            CheckEquipsButton();
                    });
                    
                    Characteristics.Add = function() {
                        if (CurrentRowEquips !== undefined) {
                            $('#InspectionActDialog').jqxWindow({width: 600, height: 440, position: 'center'});
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('InspActEquipCharacteristics/Index')) ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    ActEquip_id: CurrentRowEquips.ActEquip_id,
                                },
                                success: function(Res) {
                                    Res = JSON.parse(Res);
                                    $("#BodyInspectionActDialog").html(Res.html);
                                    $('#InspectionActDialog').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });
                        }
                    };
                    
                    $("#GridEquips").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 2px)',
                            width: 'calc(100% - 2px)',
                            showfilterrow: false,
                            source: DataActEquips, 
                            autoshowfiltericon: true,
                            pagesizeoptions: ['10', '200', '500', '1000'],
                            pagesize: 200,
                            virtualmode: true,
                            columns:
                                [
                                    { text: 'Подъезд', datafield: 'Doorway', width: 100},
                                    { text: 'Наименование', datafield: 'EquipName', width: 350},
                                    { text: 'Ед. изм.', datafield: 'UmName', width: 60},
                                    { text: 'Кол-во', datafield: 'Quant', width: 110, cellsformat: 'f2'},
                                    { text: 'Характеристики', datafield: 'Characteristics', width: 150,
                                        cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
                                            return '<div style=\'float: left; width: 80%\'>' + value + '</div>\n\
                                                        <div style=\'float: left; width: 20%\'>\n\
                                                            <button onclick=\'Characteristics.Add();\' style=\'float: right; margin-top: 4px;\'>...</button>\n\
                                                        </div>';
                                        }   
                                    },
                                ]
                    }));
                    
                    $("#btnAddEquips").on('click', function(){
                        if ($("#btnAddEquips").jqxButton('disabled')) return;
                        if (InspAct.Inspection_id !== null) {
                            $('#InspectionActDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 345, width: 500, position: 'center' }));
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('InspectionActEquips/Create')) ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    Inspection_id: InspAct.Inspection_id,
                                    ObjectGr_id: InspAct.ObjectGr_id,
                                },
                                success: function(Res) {
                                    Res = JSON.parse(Res);
                                    $("#BodyInspectionActDialog").html(Res.html);
                                    $('#InspectionActDialog').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });
                        }
                    });
                    
                    $("#btnEditEquips").on('click', function(){
                        if ($("#btnEditEquips").jqxButton('disabled')) return;
                        if (CurrentRowEquips !== undefined) {
                            $('#InspectionActDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 345, width: 500, position: 'center' }));
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('InspectionActEquips/Update')) ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    ActEquip_id: CurrentRowEquips.ActEquip_id,
                                    ObjectGr_id: InspAct.ObjectGr_id
                                },
                                success: function(Res) {
                                    Res = JSON.parse(Res);
                                    $("#BodyInspectionActDialog").html(Res.html);
                                    $('#InspectionActDialog').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });
                        }
                    });
                    
                    $("#btnRefreshEquips").on('click', function() {
                        $("#GridEquips").jqxGrid('updatebounddata');
                    });
                    
                    $("#btnDelEquips").on('click', function(){
                        if ($("#btnDelEquips").jqxButton('disabled')) return;
                        if (CurrentRowEquips !== undefined) {
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('InspectionActEquips/Delete')) ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    ActEquip_id: CurrentRowEquips.ActEquip_id,
                                },
                                success: function(Res) {
                                    Res = JSON.parse(Res);
                                    if (Res.result == 1) {
                                        CurrentRowEquips = undefined;
                                        FirstStartEquips = true;
                                        $("#btnRefreshEquips").click();
                                    }
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });
                        }
                    });
                    
                    break;
                    case 1:
                        var CurrentRowRemarks;
                        var FirstStartRemarks = true;

                        var DisabledRemarksControls = function() {
                            $('#btnAddRemarks').jqxButton({disabled: true});
                            $('#btnEditRemarks').jqxButton({disabled: true});
                            $('#btnRefreshRemarks').jqxButton({disabled: true});
                            $('#btnDelRemarks').jqxButton({disabled: true});
                        };

                        var CheckRemarksButton = function() {
                            $('#btnAddRemarks').jqxButton({disabled: false});
                            $('#btnEditRemarks').jqxButton({disabled: (CurrentRowRemarks == undefined)});
                            $('#btnRefreshRemarks').jqxButton({disabled: false});
                            $('#btnDelRemarks').jqxButton({disabled: (CurrentRowRemarks == undefined)});
                        };

                        $('#btnAddRemarks').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                        $('#btnEditRemarks').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                        $('#btnRefreshRemarks').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                        $('#btnDelRemarks').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                        
                        var DataActRemarks = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceInspActRemarks), { async: true,
                            formatData: function (data) {
                                        $.extend(data, {
                                            Filters: ["r.Inspection_id = " + InspAct.Inspection_id]
                                        });
                                        return data;
                                    },
                            beforeSend: function(jqXHR, settings) {
                                DisabledRemarksControls();
                            }
                        });

                        $("#GridRemarks").on('rowselect', function (event) {
                            CurrentRowRemarks = $('#GridRemarks').jqxGrid('getrowdata', event.args.rowindex);
                            CheckRemarksButton();
                        });

                        $("#GridRemarks").on("bindingcomplete", function (event) {
                            if (InspAct.Remark_id !== 0) {
                                Aliton.SelectRowById('Remark_id', InspAct.Remark_id, '#GridRemarks', false);
                                return;
                            }

                            if (CurrentRowRemarks != undefined) {
                                Aliton.SelectRowById('Remark_id', CurrentRowRemarks.Remark_id, '#GridRemarks', false);
                            }
                            else {
                                if (FirstStartRemarks) {
                                    $('#GridRemarks').jqxGrid('selectrow', 0);
                                    $('#GridRemarks').jqxGrid('ensurerowvisible', 0);
                                    FirstStartRemarks = false;

                                }
                            }

                            var DataInformation = $('#GridRemarks').jqxGrid('getdatainformation');
                            if (DataInformation.rowscount == 0)
                                CheckRemarksButton();
                        });

                        $("#GridRemarks").jqxGrid(
                            $.extend(true, {}, GridDefaultSettings, {
                                height: 'calc(100% - 2px)',
                                width: 'calc(100% - 2px)',
                                showfilterrow: false,
                                source: DataActRemarks, 
                                autoshowfiltericon: true,
                                pagesizeoptions: ['10', '200', '500', '1000'],
                                pagesize: 200,
                                virtualmode: true,
                                columns:
                                    [
                                        { text: 'Номер', datafield: 'Remark_id', width: 100},
                                        { text: 'Дата', filtertype: 'range', datafield: 'DateCreate', width: 130, cellsformat: 'dd.MM.yyyy HH:mm' },
                                        { text: 'Сотрудник', datafield: 'ShortName', width: 150},
                                        { text: 'Замечание', datafield: 'Remark', width: 400},
                                    ]
                        }));

                        $("#btnAddRemarks").on('click', function(){
                            if ($("#btnAddRemarks").jqxButton('disabled')) return;
                            if (InspAct.Inspection_id !== null) {
                                $('#InspectionActDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 165, width: 500, position: 'center' }));
                                $.ajax({
                                    url: <?php echo json_encode(Yii::app()->createUrl('InspActRemarks/Create')) ?>,
                                    type: 'POST',
                                    async: false,
                                    data: {
                                        Inspection_id: InspAct.Inspection_id
                                    },
                                    success: function(Res) {
                                        Res = JSON.parse(Res);
                                        $("#BodyInspectionActDialog").html(Res.html);
                                        $('#InspectionActDialog').jqxWindow('open');
                                    },
                                    error: function(Res) {
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                    }
                                });
                            }
                        });

                        $("#btnEditRemarks").on('click', function(){
                            if ($("#btnEditRemarks").jqxButton('disabled')) return;
                            if (CurrentRowRemarks !== undefined) {
                                $('#InspectionActDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 165, width: 500, position: 'center' }));
                                $.ajax({
                                    url: <?php echo json_encode(Yii::app()->createUrl('InspActRemarks/Update')) ?>,
                                    type: 'POST',
                                    async: false,
                                    data: {
                                        Remark_id: CurrentRowRemarks.Remark_id
                                    },
                                    success: function(Res) {
                                        Res = JSON.parse(Res);
                                        $("#BodyInspectionActDialog").html(Res.html);
                                        $('#InspectionActDialog').jqxWindow('open');
                                    },
                                    error: function(Res) {
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                    }
                                });
                            }
                        });

                        $("#btnRefreshRemarks").on('click', function() {
                            $("#GridRemarks").jqxGrid('updatebounddata');
                        });

                        $("#btnDelRemarks").on('click', function(){
                            if ($("#btnDelRemarks").jqxButton('disabled')) return;
                            if (CurrentRowRemarks !== undefined) {
                                $.ajax({
                                    url: <?php echo json_encode(Yii::app()->createUrl('InspActRemarks/Delete')) ?>,
                                    type: 'POST',
                                    async: false,
                                    data: {
                                        Remark_id: CurrentRowRemarks.Remark_id,
                                    },
                                    success: function(Res) {
                                        Res = JSON.parse(Res);
                                        if (Res.result == 1) {
                                            CurrentRowRemarks = undefined;
                                            FirstStartRemarks = true;
                                            $("#btnRefreshRemarks").click();
                                        }
                                    },
                                    error: function(Res) {
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                    }
                                });
                            }
                        });
                    break
                    case 2:
                        var CurrentRowRecommendations;
                        var FirstStartRecommendations = true;

                        var DisabledRecommendationsControls = function() {
                            $('#btnAddRecommendations').jqxButton({disabled: true});
                            $('#btnEditRecommendations').jqxButton({disabled: true});
                            $('#btnRefreshRecommendations').jqxButton({disabled: true});
                            $('#btnDelRecommendations').jqxButton({disabled: true});
                        };

                        var CheckRecommendationsButton = function() {
                            $('#btnAddRecommendations').jqxButton({disabled: false});
                            $('#btnEditRecommendations').jqxButton({disabled: (CurrentRowRecommendations == undefined)});
                            $('#btnRefreshRecommendations').jqxButton({disabled: false});
                            $('#btnDelRecommendations').jqxButton({disabled: (CurrentRowRecommendations == undefined)});
                        };

                        $('#btnAddRecommendations').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                        $('#btnEditRecommendations').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                        $('#btnRefreshRecommendations').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                        $('#btnDelRecommendations').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                        
                        var DataActRecommendations = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceInspActRecommendations), { async: true,
                            formatData: function (data) {
                                        $.extend(data, {
                                            Filters: ["r.Inspection_id = " + InspAct.Inspection_id]
                                        });
                                        return data;
                                    },
                            beforeSend: function(jqXHR, settings) {
                                DisabledRecommendationsControls();
                            }
                        });

                        $("#GridRecommendations").on('rowselect', function (event) {
                            CurrentRowRecommendations = $('#GridRecommendations').jqxGrid('getrowdata', event.args.rowindex);
                            CheckRecommendationsButton();
                        });

                        $("#GridRecommendations").on("bindingcomplete", function (event) {
                            if (InspAct.Recommendation_id !== 0) {
                                Aliton.SelectRowById('Recommendation_id', InspAct.Recommendation_id, '#GridRecommendations', false);
                                return;
                            }

                            if (CurrentRowRecommendations != undefined) {
                                Aliton.SelectRowById('Recommendation_id', CurrentRowRecommendations.Recommendation_id, '#GridRecommendations', false);
                            }
                            else {
                                if (FirstStartRecommendations) {
                                    $('#GridRecommendations').jqxGrid('selectrow', 0);
                                    $('#GridRecommendations').jqxGrid('ensurerowvisible', 0);
                                    FirstStartRecommendations = false;

                                }
                            }

                            var DataInformation = $('#GridRecommendations').jqxGrid('getdatainformation');
                            if (DataInformation.rowscount == 0)
                                CheckRecommendationsButton();
                        });

                        $("#GridRecommendations").jqxGrid(
                            $.extend(true, {}, GridDefaultSettings, {
                                height: 'calc(100% - 2px)',
                                width: 'calc(100% - 2px)',
                                showfilterrow: false,
                                source: DataActRecommendations, 
                                autoshowfiltericon: true,
                                pagesizeoptions: ['10', '200', '500', '1000'],
                                pagesize: 200,
                                virtualmode: true,
                                columns:
                                    [
                                        { text: 'Номер', datafield: 'Recommendation_id', width: 100},
                                        { text: 'Дата', filtertype: 'range', datafield: 'DateCreate', width: 130, cellsformat: 'dd.MM.yyyy HH:mm' },
                                        { text: 'Сотрудник', datafield: 'ShortName', width: 150},
                                        { text: 'Рекомендация', datafield: 'Recommendation', width: 400},
                                    ]
                        }));

                        $("#btnAddRecommendations").on('click', function(){
                            if ($("#btnAddRecommendations").jqxButton('disabled')) return;
                            if (InspAct.Inspection_id !== null) {
                                $('#InspectionActDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 165, width: 500, position: 'center' }));
                                $.ajax({
                                    url: <?php echo json_encode(Yii::app()->createUrl('InspActRecommendations/Create')) ?>,
                                    type: 'POST',
                                    async: false,
                                    data: {
                                        Inspection_id: InspAct.Inspection_id
                                    },
                                    success: function(Res) {
                                        Res = JSON.parse(Res);
                                        $("#BodyInspectionActDialog").html(Res.html);
                                        $('#InspectionActDialog').jqxWindow('open');
                                    },
                                    error: function(Res) {
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                    }
                                });
                            }
                        });

                        $("#btnEditRecommendations").on('click', function(){
                            if ($("#btnEditRecommendations").jqxButton('disabled')) return;
                            if (CurrentRowRecommendations !== undefined) {
                                $('#InspectionActDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 165, width: 500, position: 'center' }));
                                $.ajax({
                                    url: <?php echo json_encode(Yii::app()->createUrl('InspActRecommendations/Update')) ?>,
                                    type: 'POST',
                                    async: false,
                                    data: {
                                        Recommendation_id: CurrentRowRecommendations.Recommendation_id
                                    },
                                    success: function(Res) {
                                        Res = JSON.parse(Res);
                                        $("#BodyInspectionActDialog").html(Res.html);
                                        $('#InspectionActDialog').jqxWindow('open');
                                    },
                                    error: function(Res) {
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                    }
                                });
                            }
                        });

                        $("#btnRefreshRecommendations").on('click', function() {
                            $("#GridRecommendations").jqxGrid('updatebounddata');
                        });

                        $("#btnDelRecommendations").on('click', function(){
                            if ($("#btnDelRecommendations").jqxButton('disabled')) return;
                            if (CurrentRowRecommendations !== undefined) {
                                $.ajax({
                                    url: <?php echo json_encode(Yii::app()->createUrl('InspActRecommendations/Delete')) ?>,
                                    type: 'POST',
                                    async: false,
                                    data: {
                                        Recommendation_id: CurrentRowRecommendations.Recommendation_id,
                                    },
                                    success: function(Res) {
                                        Res = JSON.parse(Res);
                                        if (Res.result == 1) {
                                            CurrentRowRecommendations = undefined;
                                            FirstStartRecommendations = true;
                                            $("#btnRefreshRecommendations").click();
                                        }
                                    },
                                    error: function(Res) {
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                    }
                                });
                            }
                        });
                    break;
                    case 3:
                        var CurrentRowOptions;
                        var FirstStartOptions = true;

                        var DisabledOptionsControls = function() {
                            $('#btnAddOptions').jqxButton({disabled: true});
                            $('#btnEditOptions').jqxButton({disabled: true});
                            $('#btnRefreshOptions').jqxButton({disabled: true});
                            $('#btnDelOptions').jqxButton({disabled: true});
                        };

                        var CheckOptionsButton = function() {
                            $('#btnAddOptions').jqxButton({disabled: false});
                            $('#btnEditOptions').jqxButton({disabled: (CurrentRowOptions == undefined)});
                            $('#btnRefreshOptions').jqxButton({disabled: false});
                            $('#btnDelOptions').jqxButton({disabled: (CurrentRowOptions == undefined)});
                        };

                        $('#btnAddOptions').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                        $('#btnEditOptions').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                        $('#btnRefreshOptions').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                        $('#btnDelOptions').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                        
                        var DataActOptions = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceInspActOptions), { async: true,
                            formatData: function (data) {
                                        $.extend(data, {
                                            Filters: ["r.Inspection_id = " + InspAct.Inspection_id]
                                        });
                                        return data;
                                    },
                            beforeSend: function(jqXHR, settings) {
                                DisabledOptionsControls();
                            }
                        });

                        $("#GridOptions").on('rowselect', function (event) {
                            CurrentRowOptions = $('#GridOptions').jqxGrid('getrowdata', event.args.rowindex);
                            CheckOptionsButton();
                        });

                        $("#GridOptions").on("bindingcomplete", function (event) {
                            if (InspAct.Option_id !== 0) {
                                Aliton.SelectRowById('Option_id', InspAct.Option_id, '#GridOptions', false);
                                return;
                            }

                            if (CurrentRowOptions != undefined) {
                                Aliton.SelectRowById('Option_id', CurrentRowOptions.Option_id, '#GridOptions', false);
                            }
                            else {
                                if (FirstStartOptions) {
                                    $('#GridOptions').jqxGrid('selectrow', 0);
                                    $('#GridOptions').jqxGrid('ensurerowvisible', 0);
                                    FirstStartOptions = false;

                                }
                            }

                            var DataInformation = $('#GridOptions').jqxGrid('getdatainformation');
                            if (DataInformation.rowscount == 0)
                                CheckOptionsButton();
                        });

                        $("#GridOptions").jqxGrid(
                            $.extend(true, {}, GridDefaultSettings, {
                                height: 'calc(100% - 2px)',
                                width: 'calc(100% - 2px)',
                                showfilterrow: false,
                                source: DataActOptions, 
                                autoshowfiltericon: true,
                                pagesizeoptions: ['10', '200', '500', '1000'],
                                pagesize: 200,
                                virtualmode: true,
                                columns:
                                    [
                                        { text: 'Номер', datafield: 'Option_id', width: 100},
                                        { text: 'Дата', filtertype: 'range', datafield: 'DateCreate', width: 130, cellsformat: 'dd.MM.yyyy HH:mm' },
                                        { text: 'Сотрудник', datafield: 'ShortName', width: 150},
                                        { text: 'Варианты модернизаций', datafield: 'Option', width: 400},
                                    ]
                        }));

                        $("#btnAddOptions").on('click', function(){
                            if ($("#btnAddOptions").jqxButton('disabled')) return;
                            if (InspAct.Inspection_id !== null) {
                                $('#InspectionActDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 165, width: 500, position: 'center' }));
                                $.ajax({
                                    url: <?php echo json_encode(Yii::app()->createUrl('InspActOptions/Create')) ?>,
                                    type: 'POST',
                                    async: false,
                                    data: {
                                        Inspection_id: InspAct.Inspection_id
                                    },
                                    success: function(Res) {
                                        Res = JSON.parse(Res);
                                        $("#BodyInspectionActDialog").html(Res.html);
                                        $('#InspectionActDialog').jqxWindow('open');
                                    },
                                    error: function(Res) {
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                    }
                                });
                            }
                        });

                        $("#btnEditOptions").on('click', function(){
                            if ($("#btnEditOptions").jqxButton('disabled')) return;
                            if (CurrentRowOptions !== undefined) {
                                $('#InspectionActDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, { height: 165, width: 500, position: 'center' }));
                                $.ajax({
                                    url: <?php echo json_encode(Yii::app()->createUrl('InspActOptions/Update')) ?>,
                                    type: 'POST',
                                    async: false,
                                    data: {
                                        Option_id: CurrentRowOptions.Option_id
                                    },
                                    success: function(Res) {
                                        Res = JSON.parse(Res);
                                        $("#BodyInspectionActDialog").html(Res.html);
                                        $('#InspectionActDialog').jqxWindow('open');
                                    },
                                    error: function(Res) {
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                    }
                                });
                            }
                        });

                        $("#btnRefreshOptions").on('click', function() {
                            $("#GridOptions").jqxGrid('updatebounddata');
                        });

                        $("#btnDelOptions").on('click', function(){
                            if ($("#btnDelOptions").jqxButton('disabled')) return;
                            if (CurrentRowOptions !== undefined) {
                                $.ajax({
                                    url: <?php echo json_encode(Yii::app()->createUrl('InspActOptions/Delete')) ?>,
                                    type: 'POST',
                                    async: false,
                                    data: {
                                        Option_id: CurrentRowOptions.Option_id,
                                    },
                                    success: function(Res) {
                                        Res = JSON.parse(Res);
                                        if (Res.result == 1) {
                                            CurrentRowOptions = undefined;
                                            FirstStartOptions = true;
                                            $("#btnRefreshOptions").click();
                                        }
                                    },
                                    error: function(Res) {
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                    }
                                });
                            }
                        });
                    break;
            };
                    
        };
        
        $('#Tabs').jqxTabs({ width: '100%', height: '100%', keyboardNavigation: false, initTabContent: initWidgets});
        
    });
</script>    

<div class="al-data" style="height: 135px; overflow-y: scroll;">
    <div class="al-row">
        <div class="al-row-column">Дата</div>
        <div class="al-row-column"><div id="edDate"></div></div>
        <div class="al-row-column">Адрес</div>
        <div class="al-row-column"><input id="edAddr" readonly="readonly" /></div>
        <div class="al-row-column">Система</div>
        <div class="al-row-column"><input id="edSystem" readonly="readonly" /></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row-column">Инженер</div>
        <div class="al-row-column"><input id="edEmpl" readonly="readonly" /></div>
        <div class="al-row-column">Представитель клиента</div>
        <div class="al-row-column"><input id="edFIO" readonly="readonly" /></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row-column">Сервисное отделение</div>
        <div class="al-row-column"><input id="edTerrit" readonly="readonly" /></div>
        <div class="al-row-column">Жилая площадь</div>
        <div class="al-row-column"><input id="edLiveAreaSize" readonly="readonly" /></div>
        <div class="al-row-column">Коэф. сложности</div>
        <div class="al-row-column"><input id="edSystemComplexitysName" readonly="readonly" /></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row-column">Кол-во подъездов</div>
        <div class="al-row-column"><input id="edCountEntrance" readonly="readonly" /></div>
        <div class="al-row-column">Кол-во этажей</div>
        <div class="al-row-column"><input id="edCountFloors" readonly="readonly" /></div>
        <div class="al-row-column">Кол-во квартир</div>
        <div class="al-row-column"><input id="edCountApartments" readonly="readonly" /></div>
        <div class="al-row-column">Периметр</div>
        <div class="al-row-column"><input id="edPerimetr" readonly="readonly" /></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div>Особенности</div>
        <div><textarea id='edFeature'></textarea></div>
    </div>
    <div class="al-row">
        <div class="al-row-column">Пред. обсл. орг.</div>
        <div class="al-row-column"><input id="edServiceCompetitor" readonly="readonly" /></div>
        <div class="al-row-column">Монтажная орг.</div>
        <div class="al-row-column"><input id="edMontageCompetitor" readonly="readonly" /></div>
        <div class="al-row-column">Претензии клиента</div>
        <div class="al-row-column"><input id="edClaims" readonly="readonly" /></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row-column">Дата монтажа</div>
        <div class="al-row-column"><div id="edDateMontage"></div></div>
        <div class="al-row-column">Наличие техн. док-ии</div>
        <div class="al-row-column"><input id="edDocumentations" readonly="readonly" /></div>
        <div class="al-row-column">Общее состояние оборудования</div>
        <div class="al-row-column"><input id="edSystemStatementsName" readonly="readonly" /></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row-column">Кол-во стояков</div>
        <div class="al-row-column"><input id="edCountRiser" readonly="readonly" /></div>
        <div class="al-row-column">Подготовка видео</div>
        <div class="al-row-column"><input id="edPreparationVideo" readonly="readonly" /></div>
        <div class="al-row-column">Состояние каб. трас</div>
        <div class="al-row-column"><input id="edStateTrails" readonly="readonly" /></div>
        <div class="al-row-column">Наличие м\этажных распред. коробок</div>
        <div class="al-row-column"><input id="edBoxInfo" readonly="readonly" /></div>
        <div style="clear: both"></div>
    </div>
</div>
<div style="clear: both"></div>
<div class="al-row" style="padding: 0px">
    <div class="al-row-column" style="width: 50%">
        <div>Заключение инженера</div>
        <div><textarea id='edResultEngineer' name="InspActs[ResultEngineer]"></textarea></div>
    </div>
    <div class="al-row-column" style="width: calc(50% - 6px)">
        <div>Заключение руководителя отдела</div>
        <div><textarea id='edResultHead' name="InspActs[ResultHead]"></textarea></div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" id='btnEdit' value='Изменить'/></div>
    <div class="al-row-column"><div id='chbROMTO' >Согласовано руководителем</div></div>
    <div class="al-row-column"><input id='edAgreeShortName' /></div>
    <div class="al-row-column" style="float: right">
        <div class="al-row-column"><input type="button" id='btnTransfer' value='Перенос в карточку'/></div>
        <div class="al-row-column"><input type="button" id='btnSpec' value='Спецификация'/></div>
        <div class="al-row-column"><input type="button" id='btnPrint' value='Печать'/></div>
        <div class="al-row-column"><input type="button" id='btnROMTO' value='Согласовано руководителем'/></div>
        <!--<div class="al-row-column"><input type="button" id='btnRGI' value='Согласовано РГИ'/></div>-->
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row" style="height: calc(100% - 286px)">
    <div id='Tabs'>
        <ul>
            <li style="margin-left: 20px;">
                <div style="height: 15px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Оборудование</div>
                </div>
            </li>
            <li>
                <div style="height: 15px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Замечания</div>
                </div>
            </li>
            <li>
                <div style="height: 15px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Рекомендации менеджеру ДП</div>
                </div>
            </li>
            <li>
                <div style="height: 15px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Варианты модернизаций</div>
                </div>
            </li>
        </ul>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: 100%">
                <div class="al-row" style="height: calc(100% - 62px)">
                    <div id="GridEquips"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column"><input type="button" id="btnAddEquips" value="Добавить"/></div>
                    <div class="al-row-column"><input type="button" id="btnEditEquips" value="Изменить"/></div>
                    <div class="al-row-column"><input type="button" id="btnRefreshEquips" value="Обновить"/></div>
                    <div class="al-row-column"><input type="button" id="btnExportEquips" value="Экспорт"/></div>
                    <div class="al-row-column"><input type="button" id="btnMonitoringEquips" value="Мониторинг"/></div>
                    <div class="al-row-column" style="float: right"><input type="button" id="btnDelEquips" value="Удалить"/></div>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: 100%">
                <div class="al-row" style="height: calc(100% - 62px)">
                    <div id="GridRemarks"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column"><input type="button" id="btnAddRemarks" value="Добавить"/></div>
                    <div class="al-row-column"><input type="button" id="btnEditRemarks" value="Изменить"/></div>
                    <div class="al-row-column"><input type="button" id="btnRefreshRemarks" value="Обновить"/></div>
                    <div class="al-row-column" style="float: right"><input type="button" id="btnDelRemarks" value="Удалить"/></div>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: 100%">
                <div class="al-row" style="height: calc(100% - 62px)">
                    <div id="GridRecommendations"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column"><input type="button" id="btnAddRecommendations" value="Добавить"/></div>
                    <div class="al-row-column"><input type="button" id="btnEditRecommendations" value="Изменить"/></div>
                    <div class="al-row-column"><input type="button" id="btnRefreshRecommendations" value="Обновить"/></div>
                    <div class="al-row-column" style="float: right"><input type="button" id="btnDelRecommendations" value="Удалить"/></div>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: 100%">
                <div class="al-row" style="height: calc(100% - 62px)">
                    <div id="GridOptions"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column"><input type="button" id="btnAddOptions" value="Добавить"/></div>
                    <div class="al-row-column"><input type="button" id="btnEditOptions" value="Изменить"/></div>
                    <div class="al-row-column"><input type="button" id="btnRefreshOptions" value="Обновить"/></div>
                    <div class="al-row-column" style="float: right"><input type="button" id="btnDelOptions" value="Удалить"/></div>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="InspectionActDialog" style="display: none;">
    <div id="InspectionActDialogHeader">
        <span id="InspectionActHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogInspectionActContent">
        <div style="" id="BodyInspectionActDialog"></div>
    </div>
</div>

