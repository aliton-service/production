<script>
    function SaveClick() {
        
            $("#Repairs").submit();
        
    }
    
    $(document).ready(function(){
        //GetInfo();
    });
    
    function RepOpen() {
        $("#Parameters").submit();
    }
    
    function AddrChange() {
        if (alcomboboxajaxSettings["cmbAddress"].CurrentRow != null) {
            $("#RepObject_id").val(alcomboboxajaxSettings["cmbAddress"].CurrentRow["Object_id"]);
        }
        else
            $("#RepObject_id").val('');
    }
    
    function GetInfo() {
        var Data = {
            Params: {
                Repr_id: null,
                Object_id: null,
                Equip_id: null,
                SN: null,
                Storage_id: null,
            },
        };
        
        Data.Params.Object_id = <?php echo $model->Objc_id; ?>;
        
        if (alcomboboxajaxSettings['cmbEquip'].CurrentRow != null)
            Data.Params.Equip_id = alcomboboxajaxSettings['cmbEquip'].CurrentRow['Equip_id'];
        else
            Data.Params.Equip_id = 'null';
        
        Data.Params.Storage_id = "<?php echo $model->Storage_id; ?>";
            
        Data.Params.Repr_id = aleditSettings['edRepr_id'].Value;
        Data.Params.SN = aleditSettings['edSN'].Value;
        
        
        
        $.ajax({
            url: '/index.php?r=Repair/GetInfo',
            type: 'POST',
            data: Data, 
            async: true,
            success: function(Res){
                Res = JSON.parse(Res);
                
                if (parseInt(Res[0].ExternalGuarantee) == 1)
                    $("#ExternalGuarantee").html('Есть');
                else
                    $("#ExternalGuarantee").html('Нет');
                
                if (parseInt(Res[0].InternalGuarantee) == 1)
                    $("#InternalGuarantee").html('Есть');
                else
                    $("#InternalGuarantee").html('Нет');
                
                if (Res[0].LastDatePurchase !=  '' && Res[0].LastDatePurchase != null)
                    $("#LastDatePurchase").html(Res[0].LastDatePurchase);
                
                if (Res[0].LastSupplierPurchase !=  '' && Res[0].LastSupplierPurchase != null)
                    $("#LastSupplierPurchase").html(Res[0].LastSupplierPurchase);
                else
                    $("#LastSupplierPurchase").html('');
                
                if (Res[0].PriceLow !=  '' && Res[0].PriceLow != null)
                    $("#PriceLow").html(parseFloat(Res[0].PriceLow).toFixed(2));
                else
                    $("#PriceLow").html('');
                
                if (Res[0].PriceLowWHDoc !=  '' && Res[0].PriceLowWHDoc != null)
                    $("#PriceLowWHDoc").html(parseFloat(Res[0].PriceLowWHDoc).toFixed(2));
                else
                    $("#PriceLowWHDoc").html('');
                
                if (Res[0].LastDateMonitoring !=  '' && Res[0].LastDateMonitoring != null)
                    $("#LastDateMonitoring").html(Res[0].LastDateMonitoring);
                else
                    $("#LastDateMonitoring").html('');
                
                if (Res[0].EquipRepeated !=  '' && Res[0].EquipRepeated != null)
                    $("#EquipRepeated").html(Res[0].EquipRepeated);
                else
                    $("#EquipRepeated").html('');
                
                if (Res[0].AddrRepeated !=  '' && Res[0].AddrRepeated != null)
                    $("#AddrRepeated").html(Res[0].AddrRepeated);
                else
                    $("#AddrRepeated").html('');
                
                if (Res[0].EquipQuant !=  '' && Res[0].EquipQuant != null)
                    $("#EquipQuant").html(parseFloat(Res[0].EquipQuant).toFixed(2));
                else
                    $("#EquipQuant").html('');
                
                if (Res[0].EquipQuantUsed !=  '' && Res[0].EquipQuantUsed != null)
                    $("#EquipQuantUsed").html(parseFloat(Res[0].EquipQuantUsed).toFixed(2));
                else
                    $("#EquipQuantUsed").html('');
                
                if (Res[0].EquipReserv !=  '' && Res[0].EquipReserv != null)
                    $("#EquipReserv").html(parseFloat(Res[0].EquipReserv).toFixed(2));
                else
                    $("#EquipReserv").html('');
                
                if (Res[0].EquipReady !=  '' && Res[0].EquipReady != null)
                    $("#EquipReady").html(parseFloat(Res[0].EquipReady).toFixed(2));
                else
                    $("#EquipReady").html('');
                
            }
        });
        
    };
    
    
    function ChangeMaster() {
        if (alcomboboxajaxSettings["cmbRepairMstrEmpl"].CurrentRow != null && alcomboboxajaxSettings["cmbRepairMstrEmpl"].CurrentRow != '') {
            var TerritName =  alcomboboxajaxSettings["cmbRepairMstrEmpl"].CurrentRow["Territ_Name"];
            if (TerritName != 'null' && TerritName != '' && TerritName !== null)
                $("#edTerrit").html("<b>" + TerritName + "</b>");
            else
                $("#edTerrit").html("");
                    
        }
    };
    
    function GET_ExecTime() {
        var Equip_id = '';
        var Defect_id = '';
        
        if (alcomboboxajaxSettings['cmbEquip'].CurrentRow != null)
            Equip_id = alcomboboxajaxSettings['cmbEquip'].CurrentRow['Equip_id'];
        if (alcomboboxajaxSettings['cmbRepairDefects'].CurrentRow != null)
            Defect_id = alcomboboxajaxSettings['cmbRepairDefects'].CurrentRow['RepairDefect_id'];
        
        console.log(Equip_id);
        
        $.ajax({
            url: '/index.php?r=Repair/GetDefectExecTime&Equip_id=' + Equip_id + '&Defect_id=' + Defect_id,
            type: 'GET',
            async: true,
            success: function(Res){
                if (Res != '-1') {
                    var CurrentValue = aleditSettings['edPlanExecHours'].Value;
                    if (CurrentValue == '' || CurrentValue == null)
                        $('#edPlanExecHours').aledit('SetValue', Res);
                        
                }
            },
        });
    };
    
    Aliton.Links.push({
        Out: "cmbEquip",
        In: "edUmName",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "NameUnitMeasurement",
        Name: "Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: true
    });
</script>

<style>
    .data-form {
        float: left;
        width: 1024px;
    }
    
       
    .data-row {
        float: left;
        width: 1024px;
        margin-bottom: 8px;
    }
    
    .data-row:first-child {
        margin-top: 20px;
    }
    
    .data-column {
        float: left;
        margin-left: 12px;
    }
    
    .data-column:first-child {
        margin-left: 0px;
    }
    
</style>  

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Repairs',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'edRepr_id',
        'Width' => 100,
        'Type' => 'String',
        'Name' => 'Repairs[Repr_id]',
        'Value' => $model->Repr_id,
        'ReadOnly' => true,
        'Visible' => false,
    ));
    
?>

<div class="data-form">
    <div class="data-row">
        <div class="data-column">Номер</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edNumber',
                    'Width' => 100,
                    'Type' => 'String',
                    'Name' => 'Repairs[number]',
                    'Value' => $model->Number,
                    'ReadOnly' => true,
                    'PlaceHolder' => '-НОМЕР-'
                ));
            ?>
        </div>
        <div class="data-column">Дата прих. оборудования</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                    'id' => 'edDate',
                    'Width' => 130,
                    'Value' => DateTimeManager::YiiDateToAliton($model->Date),
                    'ReadOnly' => true,
                ));
            ?>
            <?php echo $form->error($model, 'Date'); ?>
        </div>
    </div>
    <div class="data-row">
        <div class="data-column">Срочность</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edPriorName',
                    'Width' => 130,
                    'Value' => $model->RepairPrior,
                    'ReadOnly' => true,
                ));
            ?>
            <?php echo $form->error($model, 'Prtp_id'); ?>
        </div>
        <div class="data-column">Заявка №</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edDemand_id',
                    'Width' => 130,
                    'Value' => $model->Demand_id,
                    'ReadOnly' => true,
                ));
            ?>
        </div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                        'id' => 'cbRepairPay',
                        'Label' => 'Ремонт платный',
                        'Checked' => $model->RepairPay,
                ));
            ?>
        </div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                        'id' => 'cbRepairPayByCompany',
                        'Label' => 'Платный ремонт за счет Эльтона',
                        'Checked' => $model->RepairPayByCompany,
                ));
            ?>
        </div>
    </div>
    <div class="data-row">
        <div class="data-column">Желаемая дата</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edDateBest',
                    'Name' => 'Repairs[DateBest]',
                    'Width' => 130,
                    'Value' => DateTimeManager::YiiDateToAliton($model->DateBest),
                    'ReadOnly' => true,
                ));
            ?>
        </div>
        <div class="data-column">Предельная дата</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edDeadline',
                    'Name' => 'Repairs[Deadline]',
                    'Width' => 130,
                    'Value' => DateTimeManager::YiiDateToAliton($model->Deadline),
                    'ReadOnly' => true,
                ));
            ?>
        </div>
        <div class="data-column">Склад</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edStorages',
                    'Name' => 'Repairs[Storage]',
                    'Width' => 130,
                    'Value' => $model->Storage,
                    'ReadOnly' => true,
                ));
            ?>
        </div>
    </div>
    <div class="data-row">
        <div class="data-column">Адрес объекта</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edAddress',
                    'Name' => 'Repairs[Addr]',
                    'Width' => 300,
                    'Value' => $model->Addr,
                    'ReadOnly' => true,
                ));
            ?>
            <?php echo $form->error($model, 'Objc_id'); ?>
        </div>
        <div class="data-column">Юр. лицо</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edJuridical',
                    'Name' => 'Repairs[Juridical]',
                    'Width' => 130,
                    'Value' => $model->JuridicalPerson,
                    'ReadOnly' => true,
                ));
            ?>
        </div>
        <div class="data-column">Участок:</div>
        <div id="edTerrit" class="data-column"></div>
    </div>
    <div class="data-row">
        <div class="data-column">Оборудование</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbEquip',
                        'ModelName' => 'Equips',
                        'FieldName' => 'EquipName',
                        'Name' => 'Repairs[Eqip_id]',
                        'KeyField' => 'Equip_id',
                        'KeyValue' => $model->Eqip_id,
                        'Type' => array(
                                'Mode' => 'Filter',
                                'Condition' => "e.EquipName like ':Value%'",
                        ),
                        'Width' => 300,
                        'Columns' => array(
                                'Address' => array(
                                        'Name' => 'Оборудование',
                                        'Width' => 240,
                                        'FieldName' => 'EquipName',
                                ),
                        ),
                ));

            ?>
            <?php echo $form->error($model, 'Eqip_id'); ?>
        </div>
        <div class="data-column">Ед. изм</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edUmName',
                    'Width' => 100,
                    'Type' => 'String',
                    'ReadOnly' => true,
                ));
            ?>
        </div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                    'id' => 'cbUsed',
                    'Label' => 'Б\у',
                    'Checked' => $model->Used,
                ));
            ?>
        </div>
    </div>
    <div class="data-row">
        <div class="data-column">Серийный номер</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edSN',
                    'Width' => 300,
                    'Type' => 'String',
                    'Name' => 'Repairs[SN]',
                    'Value' => $model->SN, 
                    'ReadOnly' => false,
                    'OnChange' => 'GetInfo();',
                ));
            ?>
        </div>
        <div class="data-column">Физ. состояние</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edEvaluation',
                    'Width' => 70,
                    'Type' => 'String',
                    'Name' => 'Repairs[Evaluation]',
                    'Value' => $model->Evaluation, 
                    'ReadOnly' => false,
                ));
            ?>
            <?php echo $form->error($model, 'Evaluation'); ?>
        </div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbEvaluations',
                        'ModelName' => 'RepairEvaluations',
                        'FieldName' => 'RepairEvaluation',
                        'KeyField' => 'RepairEvaluation_id',
                        'Type' => array(
                                'Mode' => 'Filter',
                                'Condition' => "r.RepairEvaluation like ':Value%'",
                        ),
                        'Width' => 22,
                        'Columns' => array(
                                'RepairEvaluation' => array(
                                        'Name' => 'Оценка',
                                        'Width' => 140,
                                        'FieldName' => 'RepairEvaluation',
                                ),
                                'Evaluation' => array(
                                        'Name' => 'Средний балл',
                                        'Width' => 110,
                                        'FieldName' => 'Evaluation',
                                ),
                            
                                'Desc' => array(
                                        'Name' => 'Хар-ка',
                                        'Width' => 310,
                                        'FieldName' => 'Desc',
                                ),
                        ),
                ));

            ?>
        </div>
        <div class="data-column">(Подсказка по оценкам)</div>
    </div>
    <div class="data-row" style="border: 1px solid #e5e5e5; padding: 4px;">
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                    'id' => 'cbSubstitution',
                    'Label' => 'Обор. с подмены',
                    'Name' => 'Repairs[Substitution]',
                    'Checked' => $model->Substitution,
                ));
            ?>
        </div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                    'id' => 'cbNoService',
                    'Label' => 'Обор. не на обслуж.',
                    'Checked' => false,
                ));
            ?>
        </div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                    'id' => 'cbEquipReturn',
                    'Label' => 'Требуется возврат',
                    'Name' => 'Repairs[EquipReturn]',
                    'Checked' => $model->EquipReturn,
                ));
            ?>
        </div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                    'id' => 'cbEquipGood',
                    'Label' => 'Оборудование исправно',
                    'Name' => 'Repairs[EquipGood]',
                    'Checked' => $model->EquipGood,
                ));
            ?>
        </div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                    'id' => 'cbEquipWrnt',
                    'Label' => 'Оборудование на гарантии',
                    'Name' => 'Repairs[EquipWrnt]',
                    'Checked' => $model->EquipWrnt,
                ));
            ?>
        </div>
        
    </div>
    <div class="data-row">
        <div class="data-column">Комплектность</div>
        <div class="data-column" style="margin-left: 50px;">Плановая времязатратность</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edPlanExecHours',
                    'Width' => 100,
                    'Type' => 'String',
                    'Name' => 'Repairs[PlanExecHours]',
                    'Value' => $model->PlanExecHours,
                    'ReadOnly' => false,
                ));
            ?>
        </div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbRepairIncorrects',
                        'ModelName' => 'RepairIncorrects',
                        'FieldName' => 'IncorrectName',
                        'KeyField' => 'Incorrect_id',
                        'Type' => array(
                                'Mode' => 'Filter',
                                'Condition' => "ri.IncorrectName like ':Value%'",
                        ),
                        'Width' => 220,
                        'Columns' => array(
                            'IncorrectName' => array(
                                    'Name' => 'Некорректная сдача',
                                    'Width' => 200,
                                    'FieldName' => 'IncorrectName',
                            ),
                        ),
                        'ReadOnly' => true,
                ));

            ?>
        </div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                    'id' => 'Incorrect',
                    'Label' => 'Некорректная сдача в ремонт',
                    'OnChange' => 'alcomboboxajaxSettings[\'cmbRepairIncorrects\'].ReadOnly = !alcheckboxSettings[\'Incorrect\'].Checked;',
                ));
            ?>
        </div>
    </div>
    <div class="data-row">
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                    'id' => 'cbEquipSet',
                    'Name' => 'Repairs[EquipSet]',
                    'Value' => $model->EquipSet,
                    'Width' => 1000,
                    'Height' => 70,
                    
                ));
            ?>
        </div>
    </div>
    <div class="data-row">
        <div class="data-column">Неисправность</div>
        <div class="data-column" style="margin-left: 50px;">Неисправность из справочника</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbRepairDefects',
                        'ModelName' => 'RepairDefects',
                        'FieldName' => 'RepairDefect',
                        'Name' => 'Repairs[Defect_id]',
                        'KeyField' => 'RepairDefect_id',
                        'KeyValue' => $model->Defect_id,
                        'Type' => array(
                                'Mode' => 'Filter',
                                'Condition' => "rd.RepairDefect like ':Value%'",
                        ),
                        'OnAfterChange' => 'GET_ExecTime();',
                        'Width' => 220,
                        'Columns' => array(
                                'RepairDefect' => array(
                                        'Name' => 'Неисправность',
                                        'Width' => 200,
                                        'FieldName' => 'RepairDefect',
                                ),
                        ),
                ));

            ?>
        </div>
        <div class="data-column"><b>Рез-т диагностики</b></div>
        <div class="data-column">
            <?php
                $ReadOnly = false;
                if ($model->Status_id > 2)
                    $ReadOnly = true;
                
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbRepairResult',
                        'ModelName' => 'RepairResults',
                        'FieldName' => 'ResultName',
                        'Name' => 'Repairs[Rslt_id]',
                        'KeyField' => 'rslt_id',
                        'KeyValue' => $model->Rslt_id,
                        'ReadOnly' => $ReadOnly,
                        'Type' => array(
                                'Mode' => 'Filter',
                                'Condition' => "rr.ResultName like ':Value%'",
                        ),
                        'Width' => 280,
                        'Columns' => array(
                                'Resultname' => array(
                                        'Name' => 'Результат',
                                        'Width' => 250,
                                        'FieldName' => 'ResultName',
                                ),
                        ),
                ));

            ?>
        </div>
    </div>
    <div class="data-row">
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                    'id' => 'cbEquipDefects',
                    'Name' => 'Repairs[EquipDefects]',
                    'Value' => $model->EquipDefects,
                    'Width' => 1000,
                    'Height' => 70,
                    
                ));
            ?>
            <?php echo $form->error($model, 'EquipDefects'); ?>
        </div>
    </div>
    <div class="data-row">
        <div class="data-column">Неисправность 2</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                    'id' => 'edDefectsConfirm',
                    'Name' => 'Repairs[DefectsConfirm]',
                    'Label' => 'Неисправность подверждена',
                    'Checked' => $model->DefectsConfirm,
                ));
            ?>
        </div>
    </div>
    <div class="data-row">
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                    'id' => 'cbEquipDefects2',
                    'Name' => 'Repairs[EquipDefects2]',
                    'Value' => $model->EquipDefects2,
                    'Width' => 1000,
                    'Height' => 70,
                    
                ));
            ?>
            <?php echo $form->error($model, 'EquipDefects'); ?>
        </div>
    </div>
    <div class="data-row">
        <div class="data-column">Примечание</div>
    </div>
    <div class="data-row">
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                    'id' => 'cbNote',
                    'Name' => 'Repairs[Note]',
                    'Value' => $model->Note,
                    'Width' => 1000,
                    'Height' => 70,
                    
                ));
            ?>
        </div>
    </div>
    <div class="data-row">
        <div class="data-column" style="width: 120px;">Сдал в ремонт</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbRepairMstrEmpl',
                        'ModelName' => 'Employees',
                        'FieldName' => 'ShortName',
                        'Name' => 'Repairs[Mstr_Empl_id]',
                        'KeyField' => 'Employee_id',
                        'KeyValue' => $model->Mstr_Empl_id,
                        'Type' => array(
                                'Mode' => 'Filter',
                                'Condition' => "e.EmployeeName like ':Value%'",
                        ),
                        'Width' => 200,
                        'OnAfterChange' => 'ChangeMaster();',
                        'Columns' => array(
                                'EmployeeName' => array(
                                    'Name' => 'ФИО',
                                    'FieldName' => 'EmployeeName',
                                    'Width' => 250,
                                ),
                        ),
                ));
            ?>
            <?php echo $form->error($model, 'Mstr_Empl_id'); ?>
        </div>
        <div class="data-column" style="width: 120px;">Инженер ПРЦ</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbRepairEngrEmpl',
                        'ModelName' => 'Employees',
                        'FieldName' => 'ShortName',
                        'Name' => 'Repairs[Engr_Empl_id]',
                        'KeyField' => 'Employee_id',
                        'KeyValue' => $model->Engr_Empl_id,
                        'Type' => array(
                                'Mode' => 'Filter',
                                'Condition' => "e.EmployeeName like ':Value%'",
                        ),
                        'Width' => 200,
                        'Columns' => array(
                                'EmployeeName' => array(
                                    'Name' => 'ФИО',
                                    'FieldName' => 'EmployeeName',
                                    'Width' => 250,
                                ),
                        ),
                ));
            ?>
        </div>
    </div>
    <div class="data-row">
        <div class="data-column" style="width: 120px;">Зарегистрировал</div>
        <div class="data-column">
            <?php
                
                
                        
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbRepairRegEmpl',
                        'ModelName' => 'Employees',
                        'FieldName' => 'ShortName',
                        'Name' => 'Repairs[Reg_Empl_id]',
                        'KeyField' => 'Employee_id',
                        'KeyValue' => $model->Reg_Empl_id,
                        'Type' => array(
                                'Mode' => 'Filter',
                                'Condition' => "e.EmployeeName like ':Value%'",
                        ),
                        'Width' => 200,
                        'Columns' => array(
                                'EmployeeName' => array(
                                    'Name' => 'ФИО',
                                    'FieldName' => 'EmployeeName',
                                    'Width' => 250,
                                ),
                        ),
                ));
            ?>
            <?php echo $form->error($model, 'Reg_Empl_id'); ?>
        </div>
        <div class="data-column" style="width: 120px;">Доставл в ремонт</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbRepairCurEmpl',
                        'ModelName' => 'Employees',
                        'FieldName' => 'ShortName',
                        'Name' => 'Repairs[Cur_Empl_id]',
                        'KeyField' => 'Employee_id',
                        'KeyValue' => $model->Cur_Empl_id,
                        'Type' => array(
                                'Mode' => 'Filter',
                                'Condition' => "e.EmployeeName like ':Value%'",
                        ),
                        'Width' => 200,
                        'Columns' => array(
                                'EmployeeName' => array(
                                    'Name' => 'ФИО',
                                    'FieldName' => 'EmployeeName',
                                    'Width' => 250,
                                ),
                        ),
                ));
            ?>
        </div>
    </div>
</div>
<div style="float: left;">
    <table style="border: 1px solid #e5e5e5; width: 400px;">
        <tbody>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Внешняя гарантия:</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="ExternalGuarantee"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Внутренняя гарантия:</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="InternalGuarantee"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Дата закупки:</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="LastDatePurchase"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Поставщик:</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="LastSupplierPurchase"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Цена из прайса:</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="PriceLow"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Цена из  послед. прих. накладной:</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="PriceLowWHDoc"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Дата послед. обновл. цены:</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="LastDateMonitoring"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Повторный ремонт оборуд.:</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="EquipRepeated"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Повторный ремонт на адресе:</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="AddrRepeated"></td>
            </tr>
            <tr>
                <td colspan="2" style="width: 200px; border: 1px solid #e5e5e5;">Наличие на складе:</td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Новое</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="EquipQuant"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Б\У</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="EquipQuantUsed"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Зарезервированно</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="EquipReserv"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Готово к выдаче</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="EquipReady"></td>
            </tr>

        </tbody>
    </table>
</div>    
<div style="clear: both; margin-top: 6px"></div>

<div style="float: left">
    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'SaveRepair',
            'Width' => 124,
            'Height' => 30,
            'Text' => 'Сохранить',
            //'FormName' => 'Repairs',
            'Type' => 'None',
            'OnAfterClick' => 'SaveClick();',
        ));
    ?>
</div>

<div style="float: left; margin-left: 50px">
    <?php 
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'Report',
            'Width' => 184,
            'Height' => 30,
            'Text' => 'Выданное оборуд.',
            'Type' => 'None',
            'OnAfterClick' => 'RepOpen();',
            
        ));
    ?>
</div>

<?php


$this->endWidget(); 

?>

