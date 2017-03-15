<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var InspectionAct = {
            Inspection_id: <?php echo json_encode($model->Inspection_id); ?>,
            Date: Aliton.DateConvertToJs('<?php echo $model->Date; ?>'),
            Addr: <?php echo json_encode($model->Addr); ?>,
            SystemType_id: <?php echo json_encode($model->SystemType_id); ?>,
            Empl_id: <?php echo json_encode($model->Empl_id); ?>,
            Info_id: <?php echo json_encode($model->Info_id); ?>,
            Territ_id: <?php echo json_encode($model->Territ_id); ?>,
            LiveAreaSize: <?php echo json_encode($model->LiveAreaSize); ?>,
            SystemComplexity_id: <?php echo json_encode($model->SystemComplexity_id); ?>,
            CountEntrance: <?php echo json_encode($model->CountEntrance); ?>,
            CountFloors: <?php echo json_encode($model->CountFloors); ?>,
            CountApartments: <?php echo json_encode($model->CountApartments); ?>,
            Perimetr: <?php echo json_encode($model->Perimetr); ?>,
            Feature: <?php echo json_encode($model->Feature); ?>,
            ServiceCompetitor_id: <?php echo json_encode($model->ServiceCompetitor_id); ?>,
            MontageCompetitor_id: <?php echo json_encode($model->MontageCompetitor_id); ?>,
            Claims: <?php echo json_encode($model->Claims); ?>,
            DateMontage: Aliton.DateConvertToJs('<?php echo $model->DateMontage; ?>'),
            Documentations: <?php echo json_encode($model->Documentations); ?>,
            CountRiser: <?php echo json_encode($model->Documentations); ?>,
            PreparationVideo: <?php echo json_encode($model->PreparationVideo); ?>,
            StateTrails: <?php echo json_encode($model->StateTrails); ?>,
            BoxInfo: <?php echo json_encode($model->BoxInfo); ?>,
            ResultEngineer: <?php echo json_encode($model->ResultEngineer); ?>,
            ResultHead: <?php echo json_encode($model->ResultHead); ?>,
        };
        
        var DataEmployees;
        var DataSystemTypes;
        var DataContactInfo = <?php echo json_encode($DataContactInfo); ?>;
        var DataTerritory;
        var DataSystemComplexitys;
        var DataCompetitors;
        var DataSystemStatements;
        
        $.ajax({
            url: <?php echo json_encode(Yii::app()->createUrl('AjaxData/DataJQXSimpleList'))?>,
            type: 'POST',
            async: false,
            data: {
                Models: ['ListEmployees', 'SystemTypes', 'Territory', 'SystemComplexitys', 'Competitors', 'SystemStatements']
            },
            success: function(Res) {
                Res = JSON.parse(Res);
                DataEmployees = Res[0].Data;
                DataSystemTypes = Res[1].Data;
                DataTerritory = Res[2].Data;
                DataSystemComplexitys = Res[3].Data;
                DataCompetitors = Res[4].Data;
                DataSystemStatements = Res[5].Data;
            }
        });
        
        $("#edInspDateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: InspectionAct.Date, width: 130, formatString: 'dd.MM.yyyy'}));
        $("#edInspAddrEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 400, value: InspectionAct.Addr}));
        $("#edInspSystemEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSystemTypes, width: '200', height: '25px', displayMember: "SystemTypeName", valueMember: "SystemType_Id"}));
        $("#edInspEmplEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, width: '220', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}));
        $("#edInspInfoEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataContactInfo, width: '270', height: '25px', displayMember: "FIO", valueMember: "Info_id"}));
        $("#edInspTerritEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataTerritory, width: '150', height: '25px', displayMember: "Territ_Name", valueMember: "Territ_Id"}));
        $("#edInspLiveAreaSizeEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: 110, value: InspectionAct.LiveAreaSize}));
        $("#edInspSystemComplexityEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSystemComplexitys, width: '350', height: '25px', displayMember: "SystemComplexitysName", valueMember: "SystemComplexitys_id"}));
        $("#edInspEntranceEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: 130, value: InspectionAct.CountEntrance, decimalDigits: 0}));
        $("#edInspFloorsEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: 130, value: InspectionAct.CountFloors, decimalDigits: 0}));
        $("#edInspApartmentsEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: 130, value: InspectionAct.CountApartments, decimalDigits: 0}));
        $("#edInspPerimetrEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: 130, value: InspectionAct.Perimetr, decimalDigits: 0}));
        $('#edInspFeatureEdit').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { placeHolder: '', height: 50, width: 'calc(100% - 2px)', minLength: 1}));
        $("#edInspServiceCompetitorEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataCompetitors, width: '150', height: '25px', displayMember: "Competitor", valueMember: "cmtr_id"}));
        $("#edInspMontageCompetitorEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataCompetitors, width: '150', height: '25px', displayMember: "Competitor", valueMember: "cmtr_id"}));
        $("#edInspClaimsEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 300, value: InspectionAct.Claims}));
        $("#edInspDateMontageEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: InspectionAct.DateMontage, width: 130, formatString: 'dd.MM.yyyy'}));
        $("#edInspDocumentationsEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 150, value: InspectionAct.Documentations}));
        $("#edInspStatementEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSystemStatements, width: '150', height: '25px', displayMember: "SystemStatementsName", valueMember: "SystemStatements_id"}));
        $("#edInspCountRiserEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: 130, value: InspectionAct.CountRiser, decimalDigits: 0}));
        $("#edInspPreparationVideoEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 130, value: InspectionAct.PreparationVideo}));
        $("#edInspStateTrailsEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 130, value: InspectionAct.StateTrails}));
        $("#edInspBoxInfoEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 130, value: InspectionAct.BoxInfo}));
        $('#edInspResultEngineerEdit').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { placeHolder: '', height: 50, width: 'calc(100% - 2px)', minLength: 1}));
        $('#edInspResultHeadEdit').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { placeHolder: '', height: 50, width: 'calc(100% - 2px)', minLength: 1}));
        
        
        $("#edInspSystemEdit").jqxComboBox('val', InspectionAct.SystemType_id);
        $("#edInspEmplEdit").jqxComboBox('val', InspectionAct.Empl_id);
        $("#edInspInfoEdit").jqxComboBox('val', InspectionAct.Info_id);
        $("#edInspTerritEdit").jqxComboBox('val', InspectionAct.Territ_id);
        $("#edInspSystemComplexityEdit").jqxComboBox('val', InspectionAct.SystemComplexity_id);
        $("#edInspFeatureEdit").jqxTextArea('val', InspectionAct.Feature);
        $("#edInspServiceCompetitorEdit").jqxComboBox('val', InspectionAct.ServiceCompetitor_id);
        $("#edInspMontageCompetitorEdit").jqxComboBox('val', InspectionAct.MontageCompetitor_id);
        $("#edInspStatementEdit").jqxComboBox('val', InspectionAct.Statement_id);
        
        
        $('#btnSaveEmpl').jqxButton({ width: 120, height: 30 });
        $('#btnCancelEmpl').jqxButton({ width: 120, height: 30 });
        
        $('#btnCancelEmpl').on('click', function(){
            if ($('#CostCalculationsDialog').length>0)
                $('#CostCalculationsDialog').jqxWindow('close');
            if ($('#InspectionActDialog').length>0)
                $('#InspectionActDialog').jqxWindow('close');
        });
        $('#btnSaveEmpl').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('InspectionActs/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('InspectionActs/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#InspectionActs').serialize(),
                type: 'POST',
                success: function(Res) {
                    Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        if ($('#CostCalculationsDialog').length>0)
                            $('#CostCalculationsDialog').jqxWindow('close');
                        if ($('#InspectionActDialog').length>0) {
                            $('#InspectionActDialog').jqxWindow('close');
                            InspAct.Refresh();
                        }
                        
                    }
                    else {
                        if ($('#CostCalculationsDialog').length>0)
                            $('#BodyCostCalculationsDialog').html(Res.html);
                        if ($('#InspectionActDialog').length>0) {
                            $('#InspectionActDialog').jqxWindow('close');
                            InspAct.Refresh();
                        }
                    }
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
    });
</script>

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'InspectionActs',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<input type="hidden" name="InspectionActs[Inspection_id]" value="<?php echo $model->Inspection_id; ?>"/>
<input type="hidden" name="InspectionActs[ObjectGr_id]" value="<?php echo $model->ObjectGr_id; ?>"/>
<input type="hidden" name="InspectionActs[Demand_id]" value="<?php echo $model->Demand_id; ?>"/>

<div class="al-row">
    <div class="al-row-column">
        <div>Дата</div>
        <div><div id='edInspDateEdit' name="InspectionActs[Date]"></div><?php echo $form->error($model, 'Date'); ?></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row-column">
        <div>Адрес</div>
        <div><input id='edInspAddrEdit' readonly="readonly" /></div>
        <div style="clear: both"></div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row" style="padding: 0px">
    <div class="al-row-column">
        <div>Система</div>
        <div><div id='edInspSystemEdit' name="InspectionActs[SystemType_id]"></div><?php echo $form->error($model, 'SystemType_id'); ?></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row-column">
        <div>Инженер</div>
        <div><div id='edInspEmplEdit' name="InspectionActs[Empl_id]"></div><?php echo $form->error($model, 'Empl_id'); ?></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row-column">
        <div>Представитель клиента</div>
        <div><div id='edInspInfoEdit' name="InspectionActs[Info_id]"></div></div>
        <div style="clear: both"></div>
    </div>
    <div style="clear: both"></div>
</div>    
<div class="al-row" style="padding: 0px">
    <div class="al-row-column">
        <div>Сервисное отделение</div>
        <div><div id='edInspTerritEdit' name="InspectionActs[Territ_id]"></div></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row-column">
        <div>Жилая площадь</div>
        <div><div id='edInspLiveAreaSizeEdit' name="InspectionActs[LiveAreaSize]"></div></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row-column">
        <div>Коэффициент сложности</div>
        <div><div id='edInspSystemComplexityEdit' name="InspectionActs[SystemComplexity_id]"></div></div>
        <div style="clear: both"></div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row" style="padding: 0px">
    <div class="al-row-column">
        <div>Кол-во подъездов</div>
        <div><div id='edInspEntranceEdit' name="InspectionActs[CountEntrance]"></div></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row-column">
        <div>Кол-во этажей</div>
        <div><div id='edInspFloorsEdit' name="InspectionActs[CountFloors]"></div></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row-column">
        <div>Кол-во квартир</div>
        <div><div id='edInspApartmentsEdit' name="InspectionActs[CountApartments]"></div></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row-column">
        <div>Периметр</div>
        <div><div id='edInspPerimetrEdit' name="InspectionActs[Perimetr]"></div></div>
        <div style="clear: both"></div>
    </div>
    <div style="clear: both"></div>
</div>   
<div class="al-row" style="padding: 0px">
    <div>Особенности</div>
    <div><textarea id='edInspFeatureEdit' name="InspectionActs[Feature]"></textarea></div>
    <div style="clear: both"></div>
</div>
<div class="al-row" style="padding: 0px">
    <div class="al-row-column">
        <div>Пред. обсл. орг.</div>
        <div><div id='edInspServiceCompetitorEdit' name="InspectionActs[ServiceCompetitor_id]"></div></div>
    </div>
    <div class="al-row-column">
        <div>Монтажная орг.</div>
        <div><div id='edInspMontageCompetitorEdit' name="InspectionActs[MontageCompetitor_id]"></div></div>
    </div>
    <div class="al-row-column">
        <div>Претензии клиента</div>
        <div><input id='edInspClaimsEdit' name="InspectionActs[Claims]" /></div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row" style="padding: 0px">
    <div class="al-row-column">
        <div>Дата монтажа</div>
        <div><div id='edInspDateMontageEdit' name="InspectionActs[DateMontage]"></div></div>
    </div>
    <div class="al-row-column">
        <div>Наличие техн. док-ии</div>
        <div><input id='edInspDocumentationsEdit' name="InspectionActs[Documentations]" /></div>
    </div>
    <div class="al-row-column">
        <div>Состояние</div>
        <div><div id='edInspStatementEdit' name="InspectionActs[Statement_id]"></div></div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row" style="padding: 0px">
    <div class="al-row-column">
        <div>Кол-во стояков</div>
        <div><div id='edInspCountRiserEdit' name="InspectionActs[CountRiser]"></div></div>
    </div>
    <div class="al-row-column">
        <div>Подготовка видео</div>
        <div><input id='edInspPreparationVideoEdit' name="InspectionActs[PreparationVideo]" /></div>
    </div>
    <div class="al-row-column">
        <div>Состояние каб. трас</div>
        <div><input id='edInspStateTrailsEdit' name="InspectionActs[StateTrails]" /></div>
    </div>
    <div class="al-row-column">
        <div>Наличие м\этажных распр. коробок</div>
        <div><input id='edInspBoxInfoEdit' name="InspectionActs[BoxInfo]" /></div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row" style="padding: 0px">
    <div class="al-row-column" style="width: 50%">
        <div>Заключение инженера</div>
        <div><textarea id='edInspResultEngineerEdit' name="InspectionActs[ResultEngineer]"></textarea></div>
    </div>
    <div class="al-row-column" style="width: calc(50% - 6px)">
        <div>Заключение руководителя отдела</div>
        <div><textarea id='edInspResultHeadEdit' name="InspectionActs[ResultHead]"></textarea></div>
    </div>
    <div style="clear: both"></div>
</div>    
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Сохранить" id='btnSaveEmpl'/></div>
    <div class="al-row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelEmpl'/></div>
    <div style="clear: both"></div>
</div>
   
<?php $this->endWidget(); ?>