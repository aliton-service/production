<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        Repair = {
            Repr_id: <?php echo json_encode($model->Repr_id); ?>,
            Date: Aliton.DateConvertToJs(<?php echo json_encode($model->date); ?>),
            Demand_id: <?php echo json_encode($model->dmnd_id); ?>, 
            Object_id: <?php echo json_encode($model->objc_id); ?>,
            Prior_id: <?php echo json_encode($model->prtp_id); ?>,
            BestDate: Aliton.DateConvertToJs(<?php echo json_encode($model->best_date); ?>),
            Deadline: Aliton.DateConvertToJs(<?php echo json_encode($model->deadline); ?>),
            DatePlan: Aliton.DateConvertToJs(<?php echo json_encode($model->date_plan); ?>),
            Jrdc_id: <?php echo json_encode($model->jrdc_id); ?>,
            Equip_id: <?php echo json_encode($model->eqip_id); ?>,
            Quant: <?php echo json_encode($model->docm_quant); ?>,
            Used: <?php echo json_encode($model->used); ?>,
            SN: <?php echo json_encode($model->SN); ?>,
            RepairPay: Boolean(Number(<?php echo json_encode($model->repair_pay); ?>)),
            Return: Boolean(Number(<?php echo json_encode($model->Return); ?>)),
            WorkOk: Boolean(Number(<?php echo json_encode($model->work_ok); ?>)),
            Wrnt: Boolean(Number(<?php echo json_encode($model->wrnt); ?>)),
            Set: <?php echo json_encode($model->set); ?>,
            Dlrs_id: <?php echo json_encode($model->dlrs_id); ?>,
            Defect: <?php echo json_encode($model->defect); ?>,
            Note: <?php echo json_encode($model->note); ?>,
            Mstr: <?php echo json_encode($model->mstr_empl_id); ?>,
            Engineer: <?php echo json_encode($model->egnr_empl_id); ?>,
            Reg: <?php echo json_encode($model->reg_empl_id); ?>,
            Cur: <?php echo json_encode($model->cur_empl_id); ?>,
        };
        
        $("#edNumberEdit").jqxInput($.extend(true, {}, {height: 25, width: 100, minLength: 1}));
        $("#edDateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Repair.Date, formatString: 'dd.MM.yyyy H:mm', showTimeButton: true, width: 180}));
        var PriorsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceRepairPriors));
        $("#edPriorEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: PriorsDataAdapter, displayMember: "RepairPrior", valueMember: "prtp_id", autoDropDownHeight: true, width: 150 }));
        $("#edDemandEdit").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 140 }));
        $("#edBestDateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, value: Repair.BestDate}));
        $("#edDeadlineEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, value: Repair.Deadline}));
        $("#edDatePlanEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, value: Repair.DatePlan}));
        var DataAddress = new $.jqx.dataAdapter(Sources.SourceListAddresses);
        $("#edAddrEdit").on('bindingComplete', function(){
            $('#btnSaveRepairs').jqxButton({disabled: false});
            if (Repair.Object_id !== null) $("#edAddrEdit").jqxComboBox('val', Repair.Object_id);
        });
        $("#edAddrEdit").jqxComboBox({ source: DataAddress, width: '350', height: '25px', displayMember: "Addr", valueMember: "Object_id"});
        var DataJuridicals = new $.jqx.dataAdapter(Sources.SourceJuridicalsMin);
        $("#edJrdcEdit").jqxComboBox({ source: DataJuridicals, width: '300', height: '25px', displayMember: "JuridicalPerson", valueMember: "Jrdc_Id"});
        var DataEquips = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEquipsMin, {async: true}));
        $("#edEquipEdit").on('select', function(event) {
            var args = event.args;
            if (args) {
                var Item = args.item;
                var Value = Item.value;
                var Row = Aliton.FindArray(DataEquips.records, 'Equip_id', Value);
                if (Row != null)
                    $("#edUmNameEdit").val(Row.NameUM);

            }
        });
        $("#edEquipEdit").on('bindingComplete', function(event){
            if (Repair.Equip_id != '') $("#edEquipEdit").jqxComboBox('val', Repair.Equip_id);
        });
        $("#edEquipEdit").jqxComboBox($.extend(true, {}, { source: DataEquips, width: '250', height: '25px', displayMember: "EquipName", valueMember: "Equip_id"}));
        $("#edSerialNumberEdit").jqxInput($.extend(true, {}, {height: 25, width: 200, minLength: 1}));
        $("#edUmNameEdit").jqxInput($.extend(true, {}, {height: 25, width: 60, minLength: 1}));
        $("#edQuantEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px', value: Repair.Quant, decimalDigits: 0}));
        $("#edUsedEdit").jqxCheckBox($.extend(true, CheckBoxDefaultSettings, {width: 60, checked: Repair.Used}));
        $("#edRepairPayEdit").jqxCheckBox($.extend(true, CheckBoxDefaultSettings, {width: 150, checked: Repair.RepairPay}));
        $("#edReturnEdit").jqxCheckBox($.extend(true, CheckBoxDefaultSettings, {width: 150, checked: Repair.Return}));
        $("#edWorkOkEdit").jqxCheckBox($.extend(true, CheckBoxDefaultSettings, {width: 200, checked: Repair.work_ok}));
        $("#edWrntEdit").jqxCheckBox($.extend(true, CheckBoxDefaultSettings, {width: 220, checked: Repair.Wrnt}));
        $('#edSetEdit').jqxTextArea($.extend(true, TextAreaDefaultSettings, { height: 60, width: '300px', minLength: 1}));
        var DataRepairDelayReasons = new $.jqx.dataAdapter(Sources.SourceRepairDelayReasons);
        $('#edDelayReasonEdit').jqxComboBox($.extend(true, {}, { source: DataRepairDelayReasons, width: '250', height: '25px', displayMember: "DelayReason", valueMember: "Dlrs_id"}));
        $('#FindDemandDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {}));
        $("#edQuantEqipEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px'}));
        $("#edQuantObjectEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px'}));
        $('#edDefectEdit').jqxTextArea($.extend(true, TextAreaDefaultSettings, { height: 60, width: 'calc(100% - 2px)', minLength: 1}));
        $('#edNoteEdit').jqxTextArea($.extend(true, TextAreaDefaultSettings, { height: 60, width: 'calc(100% - 2px)', minLength: 1}));
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {}));
        DataEmployees.dataBind();
        DataEmployees = DataEmployees.records;
        $('#edMstrEdit').jqxComboBox($.extend(true, {}, { source: DataEmployees, width: '250', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}));
        $('#edRegEdit').jqxComboBox($.extend(true, {}, { source: DataEmployees, width: '250', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}));
        $('#edEngineerEdit').jqxComboBox($.extend(true, {}, { source: DataEmployees, width: '250', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}));
        $('#edCurEdit').jqxComboBox($.extend(true, {}, { source: DataEmployees, width: '250', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}));
        $('#btnFindDemand').on('click', function(){
            $('#FindDemandDialog').jqxWindow({width: 800, height: 530, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Demands/FindDemand')) ?>,
                type: 'POST',
                async: false,
                data: {
                    Demand_id: Repair.Demand_id,
                    Object_id: Repair.Object_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyFindDemandDialog").html(Res.html);
                    $('#FindDemandDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        if (Repair.Repr_id != '') $("#edNumberEdit").jqxInput('val', Repair.Repr_id);
        if (Repair.Prior_id != '') $("#edPriorEdit").jqxComboBox('val', Repair.Prior_id);
        if (Repair.Demand_id != '') $("#edDemandEdit").jqxInput('val', Repair.Demand_id);
        if (Repair.Jrdc_id != '') $("#edJrdcEdit").jqxInput('val', Repair.Jrdc_id);
        if (Repair.Quant != '') $("#edQuantEdit").jqxNumberInput('val', Repair.Quant);
        if (Repair.Used != '') $("#edUsedEdit").jqxCheckBox('val', Boolean(Number(Repair.Used)));
        if (Repair.SN != '') $("#edSerialNumberEdit").jqxCheckBox('val', Boolean(Number(Repair.SN)));
        if (Repair.Set != '') $("#edSetEdit").jqxTextArea('val', Repair.Set);
        if (Repair.Defect != '') $("#edDefectEdit").jqxTextArea('val', Repair.Defect);
        if (Repair.Note != '') $("#edNoteEdit").jqxTextArea('val', Repair.Note);
        if (Repair.Mstr != '') $("#edMstrEdit").jqxComboBox('val', Repair.Mstr);
        if (Repair.Engineer != '') $("#edEngineerEdit").jqxComboBox('val', Repair.Engineer);
        if (Repair.Reg != '') $("#edRegEdit").jqxComboBox('val', Repair.Reg);
        if (Repair.Cur != '') $("#edCurEdit").jqxComboBox('val', Repair.Cur);
       
               
        $('#btnSaveRepairs').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('Repair/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('Repair/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#Repairs').serialize() + '&Type=0',
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        if (!StateInsert) {
                            if (typeof(Repairs) != 'undefined')
                                Repairs.Refresh();
                        }
                        if (StateInsert) {
                            if (typeof(Repairs.Repr_id) != 'undefined') {
                                Repairs.Repr_id = Res.id;
                                $('#RepairsGrid').jqxGrid('updatebounddata');
                            }   
                            window.open(<?php echo json_encode(Yii::app()->createUrl('Repair/View'))?> + '&Repr_id=' + Res.id);
                        }
                        if ($('#RepairsDialog').length>0)
                            $('#RepairsDialog').jqxWindow('close');
                        if ($('#CostCalculationsDialog').length>0)
                            $('#CostCalculationsDialog').jqxWindow('close');
                    }
                    else {
                        if ($('#RepairsDialog').length>0)
                            $('#BodyRepairsDialog').html(Res.html);
                        if ($('#CostCalculationsDialog').length>0)
                            $('#BodyCostCalculationsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        $('#btnSaveRepairs').jqxButton($.extend(true, {}, ButtonDefaultSettings, {disabled: true}));
        $('#btnCancelRepairs').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#btnCancelRepairs').on('click', function() {
            if ($('#RepairsDialog').length>0)
                $('#RepairsDialog').jqxWindow('close');
            if ($('#CostCalculationsDialog').length>0)
                $('#CostCalculationsDialog').jqxWindow('close');
        });
        $('#RepairsDialog').on('close', function (event) { 
            if ($('#TabsEdit').length>0)
                $('#TabsEdit').jqxTabs('destroy');
        });
        
        
    });
</script>



<div class="al-row" style="*height: calc(100% - 48px);">
    <div style="padding: 10px; overflow: none;">
        <?php 
            $form=$this->beginWidget('CActiveForm', array(
                'id'=>'Repairs',
                'htmlOptions'=>array(
                    'class'=>'form-inline'
                ),
            )); 
        ?>
        <input type="hidden" name="Repairs[Repr_id]" value="<?php echo $model->Repr_id; ?>"/>

        <div class="al-row">
            <div class="al-row-column">Номер</div>
            <div class="al-row-column"><input type="text" readonly="readonly" id="edNumberEdit" /></div>
            <div class="al-row-column">Дата прих. оборуд.</div>
            <div class="al-row-column"><div id="edDateEdit" name="Repairs[date]"></div></div>
            <div class="al-row-column" id="edServiceEdit"></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column">Срочность</div>
            <div class="al-row-column"><div id="edPriorEdit" name="Repairs[prtp_id]"></div><?php echo $form->error($model, 'prtp_id'); ?></div>
            <div class="al-row-column">
                <div id="edDemandEdit" name="Repairs[dmnd_id]" readonly="readonly">
                    <input type="text" name="Repairs[dmnd_id]" readonly="readonly" />
                    <input type="button" id="btnFindDemand" style="height: 100%; width: 25px;" value="..." />
                </div>
            </div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column">
                <div class="al-row" style="padding: 0px;">Жедаемая дата</div>
                <div style="clear: both"></div>
                <div class="al-row" style="padding: 0px;"><div id="edBestDateEdit" name="Repairs[best_date]"></div></div>
            </div>
            <div class="al-row-column">
                <div class="al-row" style="padding: 0px;">Предельная дата</div>
                <div style="clear: both"></div>
                <div class="al-row" style="padding: 0px;"><div id="edDeadlineEdit" name="Repairs[deadline]"></div></div>
            </div>
            <div class="al-row-column">
                <div class="al-row" style="padding: 0px;">План. дата</div>
                <div style="clear: both"></div>
                <div class="al-row" style="padding: 0px;"><div id="edDatePlanEdit" name="Repairs[DatePlan]"></div></div>
            </div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="padding: 0px;">Адрес</div>
            <div class="al-row-column" style="padding: 0px;"><div id="edAddrEdit" name="Repairs[objc_id]"></div><?php echo $form->error($model, 'objc_id'); ?></div>
            <div class="al-row-column" style="padding: 0px;"><div id="edJrdcEdit" name="Repairs[jrdc_id]"></div></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row" style="padding-bottom: 0px">
            <div class="al-row-column">
                <div class="al-row" style="padding: 0px;">Обрудование</div>
                <div style="clear: both"></div>
                <div class="al-row" style="padding: 0px;"><div id="edEquipEdit" name="Repairs[eqip_id]"></div><?php echo $form->error($model, 'eqip_id'); ?></div>
            </div>
            <div class="al-row-column">
                <div class="al-row" style="padding: 0px;">Серийный номер</div>
                <div style="clear: both"></div>
                <div class="al-row" style="padding: 0px;"><input type="text" id="edSerialNumberEdit"  name="Repairs[SN]"/></div>
            </div>
            <div class="al-row-column">
                <div class="al-row" style="padding: 0px;">Ед. изм.</div>
                <div style="clear: both"></div>
                <div class="al-row" style="padding: 0px;"><input type="text" readonly="readonly" id="edUmNameEdit" /></div>
            </div>
            <div class="al-row-column">
                <div class="al-row" style="padding: 0px;">Количество</div>
                <div style="clear: both"></div>
                <div class="al-row" style="padding: 0px;"><div id="edQuantEdit" name="Repairs[docm_quant]"></div><?php echo $form->error($model, 'docm_quant'); ?></div>
            </div>
            <div class="al-row-column"><div id="edUsedEdit" name="Repairs[used]">Б\У</div></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column"><div id="edRepairPayEdit" name="Repairs[repair_pay]">Платные работы</div></div>
            <div class="al-row-column"><div id="edReturnEdit" name="Repairs[Return]">Требуется возврат</div></div>
            <div class="al-row-column"><div id="edWorkOkEdit" name="Repairs[work_ok]">Оборудование исправное</div></div>
            <div class="al-row-column"><div id="edWrntEdit" name="Repairs[wrnt]">Оборудование на гарантии</div></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column">
                <div class="al-row" style="padding: 0px;">Комплектность</div>
                <div style="clear: both"></div>
                <div class="al-row" style="padding: 0px;"><textarea id="edSetEdit" name="Repairs[set]"></textarea></div>
            </div>
            <div class="al-row-column" style="padding-top: 19px;">
                <div class="al-row" style="padding: 0px;">
                    <div class="al-row-column">Причина просрочки</div>
                    <div class="al-row-column"><div id="edDelayReasonEdit" name="Repairs[dlrs_id]"></div></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column">Кол-во рем. оборуд.</div>
                    <div class="al-row-column"><div id="edQuantEqipEdit"></div></div>
                    <div class="al-row-column">Общее кол-во</div>
                    <div class="al-row-column"><div id="edQuantObjectEdit"></div></div>
                    <div style="clear: both"></div>
                </div>

            </div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 50%">
                <div class="al-row" style="padding: 0px;">Неисправность</div>
                <div style="clear: both"></div>
                <div class="al-row" style="padding: 0px;"><textarea id="edDefectEdit" name="Repairs[defect]"></textarea><?php echo $form->error($model, 'defect'); ?></div>
            </div>
            <div class="al-row-column" style="width: calc(50% - 6px)">
                <div class="al-row" style="padding: 0px;">Примечание</div>
                <div style="clear: both"></div>
                <div class="al-row" style="padding: 0px;"><textarea id="edNoteEdit" name="Repairs[note]"></textarea></div>
            </div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column">
                <div class="al-row" style="padding: 0px;">Сдал в ремонт</div>
                <div class="al-row" style="padding: 0px;"><div id="edMstrEdit" name="Repairs[mstr_empl_id]"></div><?php echo $form->error($model, 'mstr_empl_id'); ?></div>
                <div class="al-row" style="padding: 0px;">Зарегистрировал</div>
                <div class="al-row" style="padding: 0px;"><div id="edRegEdit" name="Repairs[reg_empl_id]"></div><?php echo $form->error($model, 'reg_empl_id'); ?></div>
            </div>
            <div class="al-row-column" style="float: right">
                <div class="al-row" style="padding: 0px;">Инженер ПРЦ</div>
                <div class="al-row" style="padding: 0px;"><div id="edEngineerEdit" name="Repairs[egnr_empl_id]"></div><?php echo $form->error($model, 'egnr_empl_id'); ?></div>
                <div class="al-row" style="padding: 0px;">Доставил в ремонт</div>
                <div class="al-row" style="padding: 0px;"><div id="edCurEdit" name="Repairs[cur_empl_id]"></div></div>
            </div>
            <div style="clear: both"></div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
    <div style="clear: both"></div>
</div>
<div style="clear: both"></div>
    
    
<div class="al-row">
    <div class="al-row-column"><input type="button" id="btnSaveRepairs" value="Сохранить" /></div>
    <div class="al-row-column" style="float: right"><input type="button" id="btnCancelRepairs" value="Закрыть" /></div>
    <div style="clear: both"></div>
</div>
<div id="FindDemandDialog" style="display: none;">
    <div id="FindDemandDialogHeader">
        <span id="FindDemandHeaderText">Поиск заявки</span>
    </div>
    <div style="padding: 10px;" id="DialogFindDemandContent">
        <div style="" id="BodyFindDemandDialog"></div>
    </div>
</div>