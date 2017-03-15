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
        };
        
        var DataEmployees;
        var DataSystemTypes;
        var DataContactInfo = <?php echo json_encode($DataContactInfo); ?>;
        var DataTerritory;
        var DataSystemComplexitys;
        
        $.ajax({
            url: <?php echo json_encode(Yii::app()->createUrl('AjaxData/DataJQXSimpleList'))?>,
            type: 'POST',
            async: false,
            data: {
                Models: ['ListEmployees', 'SystemTypes', 'Territory', 'SystemComplexitys']
            },
            success: function(Res) {
                Res = JSON.parse(Res);
                DataEmployees = Res[0].Data;
                DataSystemTypes = Res[1].Data;
                DataTerritory = Res[2].Data;
                DataSystemComplexitys = Res[3].Data;
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
        $("#edInspEntranceEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: 110, value: InspectionAct.CountEntrance}));
        $("#edInspFloorsEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: 110, value: InspectionAct.CountFloors}));
        $("#edInspApartmentsEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: 110, value: InspectionAct.CountApartments}));
        
        
        $("#edInspSystemEdit").jqxComboBox('val', InspectionAct.SystemType_id);
        $("#edInspEmplEdit").jqxComboBox('val', InspectionAct.Empl_id);
        $("#edInspInfoEdit").jqxComboBox('val', InspectionAct.Info_id);
        $("#edInspTerritEdit").jqxComboBox('val', InspectionAct.Territ_id);
        $("#edInspSystemComplexityEdit").jqxComboBox('val', InspectionAct.SystemComplexity_id);
        
        
        $('#btnSaveEmpl').jqxButton({ width: 120, height: 30 });
        $('#btnCancelEmpl').jqxButton({ width: 120, height: 30 });
        
        $('#btnCancelEmpl').on('click', function(){
            if ($('#CostCalculationsDialog').length>0)
                $('#CostCalculationsDialog').jqxWindow('close');
        });
        $('#btnSaveEmpl').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('Employees/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('Employees/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#Employees').serialize(),
                type: 'POST',
                success: function(Res) {
                    if (Res == '1') {
                         if ($('#CostCalculationsDialog').length>0)
                            $('#CostCalculationsDialog').jqxWindow('close');
                        
                    }
                    else
                        if ($('#CostCalculationsDialog').length>0)
                            $('#BodyCostCalculationsDialog').html(Res);
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

<div class="al-row">
    <div class="al-row-column">
        <div>Дата</div>
        <div><div id='edInspDateEdit' name="InspectionActs[Date]"></div></div>
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
        <div><div id='edInspSystemEdit' name="InspectionActs[SystemType_id]"></div></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row-column">
        <div>Инженер</div>
        <div><div id='edInspEmplEdit' name="InspectionActs[Empl_id]"></div></div>
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
    <div style="clear: both"></div>
</div>   
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Сохранить" id='btnSaveEmpl'/></div>
    <div class="al-row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelEmpl'/></div>
    <div style="clear: both"></div>
</div>
<?php $this->endWidget(); ?>