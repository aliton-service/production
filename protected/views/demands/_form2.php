<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
                
        // Присваиваем значения по умолчанию
        var Demand = {
            Demand_id: '<?php echo $model->Demand_id; ?>',
            ObjectGr_id: '<?php echo $model->ObjectGr_id; ?>',
            DateReg: Aliton.DateConvertToJs('<?php echo $model->DateReg; ?>'),
            Deadline: Aliton.DateConvertToJs('<?php echo $model->Deadline; ?>'),
            DType_id: '<?php echo $model->DType_id; ?>',
            DSystem_id: '<?php echo $model->DSystem_id; ?>',
            DEquip_id: '<?php echo $model->DEquip_id; ?>',
            DMalfunction_id: '<?php echo $model->DMalfunction_id; ?>',
            DPrior_id: '<?php echo $model->DPrior_id; ?>',
            Address: '<?php echo $model->Address; ?>',
            ServiceType: '<?php echo $model->ServiceType; ?>',
            Master: '<?php echo $model->Master; ?>',
            AgreeDate: Aliton.DateConvertToJs('<?php echo $model->AgreeDate; ?>'),
            RepMaster: '<?php echo $model->RepMaster; ?>',
            DateMaster: Aliton.DateConvertToJs('<?php echo $model->DateMaster; ?>'),
            DateExec: Aliton.DateConvertToJs('<?php echo $model->DateExec; ?>'),
            DateOfHelpRequest: Aliton.DateConvertToJs('<?php echo $model->DateOfHelpRequest; ?>'),
            DateOfTransfer: Aliton.DateConvertToJs('<?php echo $model->DateOfTransfer; ?>'),
            DelayedClosureReason_id: '<?php echo $model->DelayedClosureReason_id; ?>',
            TransferReason: '<?php echo $model->TransferReason; ?>',
            Clrs_id: '<?php echo $model->clrs_id; ?>',
            Dlrs_id: '<?php echo $model->dlrs_id; ?>',
            Rslt_id: '<?php echo $model->rslt_id; ?>',
    
        };
        
        if (StateInsert) {
            Demand.DateReg = new Date();
        };

        // Инициализация источников данных
        var DataEmployees = new $.jqx.dataAdapter(Sources.SourceListEmployees);
        var DataDemandTypes = new $.jqx.dataAdapter(Sources.SourceDemandTypes);
        var DataDelayedClosureReasons = new $.jqx.dataAdapter(Sources.SourceDelayedClosureReasons);
        var DataTransferReasons = new $.jqx.dataAdapter(Sources.SourceTransferReasons);
        var DataCloseReasons = new $.jqx.dataAdapter(Sources.SourceCloseReasons);
        var DataDelayReasons = new $.jqx.dataAdapter(Sources.SourceDelayReasons);
        var DataDemandResults = new $.jqx.dataAdapter(Sources.SourceDemandResults);
        
        var DataSystemTypes = new $.jqx.dataAdapter(Sources.SourceSystemTypes, {
            beforeLoadComplete: function (records) {
                var value = Demand.DType_id;
                var filteredRecords = new Array();
                for (var i = 0; i < records.length; i++) {
                    if (records[i].DType_id == parseInt(value)) 
                        filteredRecords.push(records[i]);
                }
                return filteredRecords;
            }
        });
        var DataEquipTypes = new $.jqx.dataAdapter(Sources.SourceEquipTypes, {
            beforeLoadComplete: function (records) {
                var value = Demand.DSystem_id;
                var filteredRecords = new Array();
                for (var i = 0; i < records.length; i++) {
                    if (records[i].DSystem_id == parseInt(value)) 
                        filteredRecords.push(records[i]);
                }
                return filteredRecords;
            }
        });
        var DataMalfunctions = new $.jqx.dataAdapter(Sources.SourceMalfunctions, {
            beforeLoadComplete: function (records) {
                var value = Demand.DEquip_id;
                var filteredRecords = new Array();
                for (var i = 0; i < records.length; i++) {
                    if (records[i].DEquip_id == parseInt(value)) 
                        filteredRecords.push(records[i]);
                }
                return filteredRecords;
            }
        });
        var DataPriors = new $.jqx.dataAdapter(Sources.SourcePriors, {
            beforeLoadComplete: function (records) {
                var value = Demand.DMalfunction_id;;
                var filteredRecords = new Array();
                for (var i = 0; i < records.length; i++) {
                    if (records[i].DMalfunction_id == parseInt(value))
                        filteredRecords.push(records[i]);
                }
                return filteredRecords;
            }
        });
        var DataContactInfo = new $.jqx.dataAdapter(Sources.SourceContactInfo, {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["ci.ObjectGr_id = <?php echo $model->ObjectGr_id; ?>"],
                });
                return data;
            }
        });
        // Инициализируем контроды
        $("#edDemand_id").jqxInput({placeHolder: "-НОМЕР-", height: 25, width: 100, minLength: 1});
        $("#edAddr").jqxInput({placeHolder: "Адрес", height: 25, width: 300, minLength: 1, value: Demand.Address});
        $("#edDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Demand.DateReg, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edServiceType").jqxInput({placeHolder: "Тариф обслуживания", height: 25, width: 200, minLength: 1, value: Demand.ServiceType});
        $("#chbDateMaster").jqxCheckBox({ width: 160, height: 25 });
        $("#chbOtherExecutor").jqxCheckBox({ width: 160, height: 25 });
        $("#cmbExecutor").jqxComboBox({ source: DataEmployees, width: '300', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"});
        $("#cmbDemandType").jqxComboBox({ source: DataDemandTypes, width: '300', height: '25px', displayMember: "DemandType", valueMember: "DType_id"});
        $("#cmbSystemType").jqxComboBox({ disabled: false, source: DataSystemTypes, promptText: "Выберите тип заявки...", width: '300', height: '25px', displayMember: "SystemType", valueMember: "DSystem_id"});
        $("#cmbEquipType").jqxComboBox({ disabled: false, source: DataEquipTypes, promptText: "Выберите тип системы...", width: '182', height: '25px', displayMember: "EquipType", valueMember: "DEquip_id"});
        $("#cmbMalfunction").jqxComboBox({ disabled: false, source: DataMalfunctions, promptText: "Выберите тип оборудования...", width: '300', height: '25px', displayMember: "Malfunction", valueMember: "DMalfunction_id"});
        $("#cmbPrior").jqxComboBox({ source: DataPriors, promptText: "Выберите приоритет...", width: '300', height: '25px', displayMember: "DemandPrior", valueMember: "DPrior_id"});
        $("#edDeadline").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '182px', value: Demand.Deadline, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edAgreeDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '182px', value: Demand.AgreeDate, }));
        $("#edContacts").jqxInput({placeHolder: "Контактное лицо", height: 25, width: 300, minLength: 1});
        $("#cmbContactInfo").jqxComboBox({ source: DataContactInfo, width: '300', height: '25px', displayMember: "contact", valueMember: "Info_id"});
        $('#edRefusers').jqxTextArea({ disabled: true, placeHolder: '', height: 50, width: 800, minLength: 1});
        $('#edDemandText').jqxTextArea({ placeHolder: '', height: 50, width: 800, minLength: 1});
        $("#btnSave").jqxButton({ width: 120, height: 30, disabled: true });
        $("#btnClient").jqxButton({ width: 120, height: 30, disabled: false });
        
        if (!StateInsert) {
            $('#edRepMaster').jqxTextArea({ placeHolder: '', height: 50, width: 800, minLength: 1});
            $("#edDateMaster").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Demand.DateMaster}));
            $("#edDateExec").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Demand.DateExec}));
            $("#edDateOfHelpRequest").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Demand.DateOfHelpRequest}));
            $("#edDateOfTransfer").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Demand.DateOfTransfer}));
            $("#cmbDelayedClosureReason").jqxComboBox({ source: DataDelayedClosureReasons, width: '220', height: '25px', displayMember: "Name", valueMember: "DelayedClosureReason_id"});
            $("#cmbTransferReason").jqxComboBox({ source: DataTransferReasons, width: '220', height: '25px', displayMember: "TransferReason", valueMember: "TransferReason_id"});
            $("#cmbCloseReason").jqxComboBox({ source: DataCloseReasons, width: '220', height: '25px', displayMember: "CloseReason", valueMember: "CloseReason_id"});
            $("#cmbDelayReason").jqxComboBox({ source: DataDelayReasons, width: '290', height: '25px', displayMember: "name", valueMember: "dlrs_id"});
            $("#cmbDemandResult").jqxComboBox({ source: DataDemandResults, width: '250', height: '25px', displayMember: "ResultName", valueMember: "Result_id"});
            
            // Проставляем знаячение
            if (Demand.DelayedClosureReason_id != '') $("#cmbDelayedClosureReason").jqxComboBox('val', Demand.DelayedClosureReason_id);
            if (Demand.TransferReason != '') $("#cmbTransferReason").jqxComboBox('val', Demand.TransferReason);
            if (Demand.Clrs_id != '') $("#cmbCloseReason").jqxComboBox('val', Demand.Clrs_id);
            if (Demand.Dlrs_id != '') $("#cmbDelayReason").jqxComboBox('val', Demand.Dlrs_id);
            if (Demand.Rslt_id != '') $("#cmbDemandResult").jqxComboBox('val', Demand.Rslt_id);
        }
        // Проставляем знаячение
        if (Demand.Master != '') $("#cmbExecutor").jqxComboBox('val', Demand.Master);
        if (Demand.DType_id != '') $("#cmbDemandType").jqxComboBox('val', Demand.DType_id);
        if (Demand.DSystem_id !== '') { $("#cmbSystemType").jqxComboBox('val', Demand.DSystem_id); } else { $("#cmbSystemType").jqxComboBox({disabled: true}); }
        if (Demand.DEquip_id != '') $("#cmbEquipType").jqxComboBox('val', Demand.DEquip_id); else $("#cmbEquipType").jqxComboBox({disabled: false});
        if (Demand.DMalfunction_id != '') $("#cmbMalfunction").jqxComboBox('val', Demand.DMalfunction_id); else $("#cmbMalfunction").jqxComboBox({disabled: false});
        if (Demand.DPrior_id != '') { $("#cmbPrior").jqxComboBox('val', Demand.DPrior_id); $("#btnSave").jqxButton({ disabled: false });} else $("#cmbPrior").jqxComboBox({disabled: false});
        
        // Инициализация событий
        $("#cmbDemandType").bind('select', function(event) {
            if (event.args) {
                $("#cmbSystemType").jqxComboBox({ disabled: false, selectedIndex: -1});		
                var value = event.args.item.value;
                Sources.SourceSystemTypes.data = {DType_id: value};
                DataSystemTypes = new $.jqx.dataAdapter(Sources.SourceSystemTypes, {
                    beforeLoadComplete: function (records) {
                        var filteredRecords = new Array();
                        for (var i = 0; i < records.length; i++) {
                            if (records[i].DType_id == value)
                                filteredRecords.push(records[i]);
                        }
                        return filteredRecords;
                    }
                });
                $("#cmbSystemType").jqxComboBox({source: DataSystemTypes, autoDropDownHeight: DataSystemTypes.records.length > 10 ? false : true});
                $("#cmbSystemType").jqxComboBox('selectIndex', 0);
            }
        });  
        
        $("#cmbSystemType").bind('select', function(event)
        {
            if (event.args) {
                $("#cmbEquipType").jqxComboBox({ disabled: false, selectedIndex: -1});		
                if (event.args.item !== null) {
                    var value = event.args.item.value;
                    Sources.SourceSystemTypes.data = {DSystem_id: value};
                    DataEquipTypes = new $.jqx.dataAdapter(Sources.SourceEquipTypes, {
                        beforeLoadComplete: function (records) {
                            var filteredRecords = new Array();
                            for (var i = 0; i < records.length; i++) {
                                if (records[i].DSystem_id == value)
                                    filteredRecords.push(records[i]);
                            }
                            return filteredRecords;
                        }
                    });
                    $("#cmbEquipType").jqxComboBox({source: DataEquipTypes, autoDropDownHeight: DataEquipTypes.records.length > 10 ? false : true});
                    $("#cmbEquipType").jqxComboBox('selectIndex', 0);
                }
            }
        }); 
        
        $("#cmbEquipType").bind('select', function(event) {
            if (event.args) {
                $("#cmbMalfunction").jqxComboBox({ disabled: false, selectedIndex: -1});		
                if (event.args.item !== null) {
                    var value = event.args.item.value;
                    Sources.SourceMalfunctions.data = {DEquip_id: value};
                    DataMalfunctions = new $.jqx.dataAdapter(Sources.SourceMalfunctions, {
                        beforeLoadComplete: function (records) {
                            var filteredRecords = new Array();
                            for (var i = 0; i < records.length; i++) {
                                if (records[i].DEquip_id == value) 
                                    filteredRecords.push(records[i]);
                            }
                            return filteredRecords;
                        }
                    });
                    $("#cmbMalfunction").jqxComboBox({source: DataMalfunctions, autoDropDownHeight: DataEquipTypes.records.length > 10 ? false : true});
                    $("#cmbMalfunction").jqxComboBox('selectIndex', 0);
                }
            }
        }); 
        
        $("#cmbMalfunction").bind('select', function(event) {
            if (event.args) {
                $("#cmbPrior").jqxComboBox({ disabled: false, selectedIndex: -1});		
                if (event.args.item !== null) {
                    var value = event.args.item.value;
                    Sources.SourcePriors.data = {DMalfunction_id: value};
                    DataPriors= new $.jqx.dataAdapter(Sources.SourcePriors, {
                        beforeLoadComplete: function (records) {
                            var filteredRecords = new Array();
                            for (var i = 0; i < records.length; i++) {
                                if (records[i].DMalfunction_id == value) {

                                    filteredRecords.push(records[i]);
                                }
                            }
                            return filteredRecords;
                        }
                    });
                    $("#cmbPrior").jqxComboBox({source: DataPriors, autoDropDownHeight: DataEquipTypes.records.length > 10 ? false : true});
                    $("#cmbPrior").jqxComboBox('selectIndex', 0);
                }
            }
        });
        $("#cmbPrior").bind('change', function(event) {
            $("#btnSave").jqxButton({disabled: true});
            if (event.args) {
                if (event.args.item !== null) {
                    var value = event.args.item.value;
                    
                    $("#btnSave").jqxButton({disabled: false});
                }
            }
        });
        $('#cmbContactInfo').on('change', function (event) {
            var args = event.args;
            if (args) {
                var item = args.item;
                var label = item.label;
                if (label !== '') {
                    var val = $('#edContacts').jqxInput('val');
                    val = val + label;
                    $('#edContacts').jqxInput('val', val);
                }
            }
        });
        
        $("#btnSave").on('click', function () {
            $("#Demands").submit();
        });
        
        $("#btnClient").on('click', function(){
            Aliton.ViewClient(Demand.ObjectGr_id);
        });
    });
</script>    

<style>
    .row {
        margin: 0px 0px 0px 0px;
        overflow: hidden;
    }
    
    .row-column {
        float: left;
        margin-right: 10px;
    }
</style>

<?php
    $form = $this->beginWidget('CActiveForm', array(
            'id' => 'Demands',
            'htmlOptions'=>array(
                    'class'=>'form-inline'
                    ),
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
     )); 

?>

<input  name="Demands[ObjectGr_id]" type="hidden" id="edObjectGr_id" value="<?php echo $model->ObjectGr_id; ?>"/>
<input  name="Demands[Object_id]" type="hidden" id="edObject_id" value="<?php echo $model->Object_id; ?>"/>
<input  name="Demands[ContrS_id]" type="hidden" id="edContrS_id" value="<?php echo $model->ContrS_id; ?>"/>

<div class="row">
    <div class="row-column">Номер: <input  name="Demands[Demand_id]" type="text" id="edDemand_id" value="<?php echo $model->Demand_id; ?>"/></div>
    <div class="row-column">Адрес: <input type="text" id="edAddr" /></div>
    <div class="row-column">Особые условия: <b><?php echo $Objects->Condition; ?></b></div>
</div>
<div class="row" style="margin-bottom: 0px;">
    <div class="row-column" style="width: 180px;">Дата и время заявки</div>
    <div class="row-column" style="width: 200px;">Тариф обслуживания</div>
    <div class="row-column" style="width: 160px;"><div id='chbDateMaster'>Передача мастеру</div></div>
    <div class="row-column" style="width: 160px;"><div id='chbOtherExecutor'>Другой исполнитель</div></div>
</div>
<div class="row" style="margin-top: 0px;">
    <div class="row-column"><div id='edDate' name="Demands[DateReg]"></div></div>
    <div class="row-column"><input name="Demands[ServiceType]" type="text" id="edServiceType"/></div>
    <div class="row-column"><div id='cmbExecutor' name='Demands[ExecOther]'><?php echo $model->Master; ?></div></div>
</div>
<div class="row" style="margin-bottom: 0px;">
    <div class="row-column" style="width: 300px;">Тип <?php echo $model->DType_id; ?></div>
    <div class="row-column" style="width: 300px;">Тип системы</div>
    <div class="row-column" style="width: 180px;">Тип оборудования</div>
</div>
<div class="row" style="margin-top: 0px;">
    <div class="row-column"><div id='cmbDemandType' name="Demands[DType_id]"><?php echo $model->DType_id; ?></div></div>
    <div class="row-column"><div id='cmbSystemType' name="Demands[DSystem_id]"></div></div>
    <div class="row-column"><div id='cmbEquipType' name="Demands[DEquip_id]"></div></div>
</div>
<div class="row" style="margin-bottom: 0px;">
    <div class="row-column" style="width: 300px;">Неисправность</div>
    <div class="row-column" style="width: 300px;">Приоритет</div>
    <div class="row-column" style="width: 180px;">Предельная дата</div>
    
</div>
<div class="row" style="margin-bottom: 0px;">
    <div class="row-column" style="width: 300px;"><div id='cmbMalfunction' name="Demands[DMalfunction_id]"></div></div>
    <div class="row-column" style="width: 300px;"><div id='cmbPrior' name="Demands[DPrior_id]"></div><div><?php echo $form->error($model, 'DPrior_id'); ?></div></div>
    <div class="row-column" style="width: 180px;"><div id='edDeadline' name="Demands[Deadline]"></div></div>
</div>
<div class="row" style="margin-bottom: 0px; margin-top: 0px;">
    <div class="row-column" style="width: 300px;">Контактное лицо</div>
    <div class="row-column" style="width: 300px;">Из карточки клиента</div>
    <div class="row-column" style="width: 180px;">Согласованная дата</div>
</div>
<div class="row" style="margin-bottom: 0px; margin-top: 0px;">
    <div class="row-column" style="width: 300px;"><input type="text" id="edContacts" name="Demands[Contacts]" value="<?php echo $model->Contacts; ?>" /><div><?php echo $form->error($model, 'Contacts'); ?></div></div>
    <div class="row-column" style="width: 300px;"><div id='cmbContactInfo'></div></div>
    <div class="row-column" style="width: 180px;"><div id='edAgreeDate' name="Demands[AgreeDate]"></div></div>
</div>
<!--
    Если мы редактируем, то выводим поля: Дата доклада помощи, Дата перевода заявки,
    Причина несв. закрытия заявки, Причина перевода заявки,
    Причина закрытия, Причина просрочки, Результат заявки
-->
<?php if (Yii::app()->controller->action->id == 'Update') { ?>
    <div class="row" style="margin-bottom: 0px; margin-top: 0px;">
        <div class="row-column" style="width: 160px;">Дата доклада о помощи</div>
        <div class="row-column" style="width: 160px;">Дата перевода заявки</div>
        <div class="row-column" style="width: 220px;">Причина несв. закрытия заявки </div>
        <div class="row-column" style="width: 220px;">Причина перевода заявки</div>
    </div>
    <div class="row" style="margin-bottom: 0px; margin-top: 0px;">
        <div class="row-column" style="width: 160px;"><div id='edDateOfHelpRequest' name="Demands[DateOfHelpRequest]"></div></div>
        <div class="row-column" style="width: 160px;"><div id='edDateOfTransfer' name="Demands[DateOfTransfer]"></div></div>
        <div class="row-column" style="width: 220px;"><div id='cmbDelayedClosureReason' name="Demands[DelayedClosureReason_id]"></div></div>
        <div class="row-column" style="width: 220px;"><div id='cmbTransferReason' name="Demands[TransferReason]"></div><div><?php echo $form->error($model, 'TransferReason'); ?></div></div>
    </div>
    <div class="row" style="margin-bottom: 0px; margin-top: 0px;">
        <div class="row-column" style="width: 220px;">Причина закрытия</div>
        <div class="row-column" style="width: 290px;">Причина просрочки</div>
        <div class="row-column" style="width: 250px;">Результат заявки</div>
    </div>
    <div class="row" style="margin-bottom: 0px; margin-top: 0px;">
        <div class="row-column" style="width: 220px;"><div id='cmbCloseReason' name="Demands[clrs_id]"></div></div>
        <div class="row-column" style="width: 290px;"><div id='cmbDelayReason' name="Demands[dlrs_id]"></div><div><?php echo $form->error($model, 'dlrs_id'); ?></div></div>
        <div class="row-column" style="width: 250px;"><div id='cmbDemandResult' name="Demands[rslt_id]"></div><div><?php echo $form->error($model, 'rslt_id'); ?></div></div>
    </div>
<?php } ?>

<div class="row" style="margin-bottom: 0px; margin-top: 0px;">
    <div class="row-column" style="width: 300px;">Отказники</div>
</div>
<div class="row" style="margin-bottom: 0px; margin-top: 0px;">
    <div class="row-column" style="width: 300px;"><textarea id="edRefusers" name="Demands[Refusers]"><?php echo $ObjectsGroup->Refusers; ?></textarea></div>
</div>    
<div class="row" style="margin-bottom: 0px; margin-top: 0px;">
    <div class="row-column" style="width: 300px;">Неисправность</div>
</div>
<div class="row" style="margin-bottom: 0px; margin-top: 0px;">
    <div class="row-column" style="width: 300px;"><textarea id="edDemandText" name="Demands[DemandText]"><?php echo $model->DemandText; ?></textarea></div>
</div>

<!-- Если мы редактируем, то выводим поля: Отчет мастера, Дата передач, Дата выполнения -->
<?php if (Yii::app()->controller->action->id == 'Update') { ?>
    <div class="row" style="margin-bottom: 0px; margin-top: 0px;">
        <div class="row-column" style="width: 300px;">Отчет мастера</div>
    </div>
    <div class="row" style="margin-bottom: 0px; margin-top: 0px;">
        <div class="row-column" style="width: 300px;"><textarea id="edRepMaster" name="Demands[RepMaster]"><?php echo $model->RepMaster; ?></textarea></div>
    </div>
    <div class="row" style="margin-bottom: 0px; margin-top: 0px; width: 800px">
        <div class="row-column">Передано</div>
        <div class="row-column"><div id='edDateMaster' name="Demands[DateMaster]"></div><div><?php echo $form->error($model, 'DateMaster'); ?></div></div>
        <div class="row-column" style="float: right;"><div id='edDateExec' name="Demands[DateExec]"></div><div><?php echo $form->error($model, 'DateExec'); ?></div></div>
        <div class="row-column" style="float: right;">Выполнено</div>
    </div>
<?php } ?>

<div class="row" style="margin-bottom: 0px; margin-top: 0px;">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSave' /></div>
    <div class="row-column"><input type="button" value="Карточка" id='btnClient' /></div>
</div>

<?php $this->endWidget(); ?>

