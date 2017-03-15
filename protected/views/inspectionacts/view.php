<script type="text/javascript">
    var InspAct = {};
    $(document).ready(function () {
        InspAct = {
            Inspection_id: <?php echo json_encode($model->Inspection_id); ?>,
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
        
        var initWidgets = function() {
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
            <div style="padding: 10px; height: calc(100% - 20px)">
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: calc(100% - 20px)">
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: calc(100% - 20px)">
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 10px; height: calc(100% - 20px)">
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