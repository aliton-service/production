<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var ReadOnly = (<?php echo json_encode($ReadOnly); ?>);
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
            ExecOther: '<?php echo $model->ExecOther; ?>',
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

        var DataDemandTypesRecords;
        var DataSystemTypesRecords;
        var DataEquipTypesRecords;
        var DataMalfunctionsRecords;
        var DataPriorsRecords;
        var DataDelayedClosureReasons;
        var DataTransferReasons;
        var DataCloseReasons;
        var DataDelayReasons;
        var DataDemandResults;
        var DataEmployees;
        //var DataNewDemandPriors;
        var ListModels;
        
//        if (StateInsert)
//            ListModels = ['DSystemsNew', 'DEquipsNew', 'DMalfunctionsNew', 'DPriorsNew', 'DTypesNew', 'DelayedClosureReasons', 'TransferReasons', 'CloseReasons', 'DelayReasons', 'DemandResults', 'ListEmployees'];
//        else
            ListModels = ['DSystems', 'DEquips', 'DMalfunctions', 'DPriors', 'DTypes', 'DelayedClosureReasons', 'TransferReasons', 'CloseReasons', 'DelayReasons', 'DemandResults', 'ListEmployees'];
        
        $.ajax({
            url: <?php echo json_encode(Yii::app()->createUrl('AjaxData/DataJQXSimpleList'))?>,
            type: 'POST',
            async: false,
            data: {
                Models: ListModels
            },
            success: function(Res) {
                Res = JSON.parse(Res);
                DataSystemTypesRecords = Res[0].Data;
                DataEquipTypesRecords = Res[1].Data;
                DataMalfunctionsRecords = Res[2].Data;
                DataPriorsRecords = Res[3].Data;
                DataDemandTypesRecords = Res[4].Data;
                DataDelayedClosureReasons = Res[5].Data;
                DataTransferReasons = Res[6].Data;
                DataCloseReasons = Res[7].Data;
                DataDelayReasons = Res[8].Data;
                DataDemandResults = Res[9].Data;
                DataEmployees = Res[10].Data;
                
            }
        });

        
        // Инициализация источников данных
//        var DataEmployees = new $.jqx.dataAdapter(Sources.SourceListEmployees);
        var DataContactInfo = new $.jqx.dataAdapter(Sources.SourceContactInfo, {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["ci.ObjectGr_id = <?php echo $model->ObjectGr_id; ?>"],
                });
                return data;
            }
        });
        // Инициализируем контроды
        $("#btnSave").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true, imgSrc: '/images/onebit.png' }));
        $("#btnCancelSave").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false }));
        
        $("#edDemand_id").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "-НОМЕР-", width: 100}));
        $("#edAddr").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Адрес", width: 300, value: Demand.Address}));
        $("#edDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Demand.DateReg, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edServiceType").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Тариф обслуживания", value: Demand.ServiceType}));
        $("#chbDateMaster").jqxCheckBox({ width: 160, height: 25 });
        $("#cmbExecutor").jqxComboBox({ source: DataEmployees, width: '180', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"});
        $("#cmbDemandType").jqxComboBox({ source: DataDemandTypesRecords, width: '300', height: '25px', displayMember: "DemandType", valueMember: "DType_id"});
        $("#cmbSystemType").jqxComboBox({ disabled: false, source: DataSystemTypesRecords, promptText: "Выберите тип заявки...", width: '300', height: '25px', displayMember: "SystemType", valueMember: "DSystem_id"});
        $("#cmbEquipType").jqxComboBox({ disabled: false, source: DataEquipTypesRecords, promptText: "Выберите тип системы...", width: '182', height: '25px', displayMember: "EquipType", valueMember: "DEquip_id"});
        $("#cmbMalfunction").jqxComboBox({ disabled: false, source: DataMalfunctionsRecords, promptText: "Выберите тип оборудования...", width: '280', height: '25px', displayMember: "Malfunction", valueMember: "DMalfunction_id"});
        $("#cmbPrior").jqxComboBox({ source: DataPriorsRecords, promptText: "Выберите приоритет...", width: '220', height: '25px', displayMember: "DemandPrior", valueMember: "DPrior_id", autoDropDownHeight: false });
        $("#edDeadline").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '150px', value: Demand.Deadline, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
        $("#edAgreeDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '150px', value: Demand.AgreeDate, }));
        $("#edContacts").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Контактное лицо", width: 500}));
        $("#cmbContactInfo").jqxComboBox({ source: DataContactInfo, width: '330', height: '25px', displayMember: "contact", valueMember: "Info_id"});
        $('#edRefusers').jqxTextArea({ disabled: true, placeHolder: '', height: 50, width: 800, minLength: 1});
        $('#edDemandText').jqxTextArea({ placeHolder: '', height: 50, width: 800, minLength: 1});
        $("#btnClient").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false }));
        
        if (!StateInsert) {
            $('#edRepMaster').jqxTextArea({ placeHolder: '', height: 50, width: 800, minLength: 1});
            $("#edDateMaster").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Demand.DateMaster, width: 160, dropDownVerticalAlignment: 'top' }));
            $("#edDateExec").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Demand.DateExec, width: 160 }));
            $("#edDateOfHelpRequest").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Demand.DateOfHelpRequest, width: 160 }));
            $("#edDateOfTransfer").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Demand.DateOfTransfer, width: 145 }));
            $("#cmbDelayedClosureReason").jqxComboBox({ source: DataDelayedClosureReasons, width: '260', height: '25px', displayMember: "Name", valueMember: "DelayedClosureReason_id", autoDropDownHeight: true });
            $("#cmbTransferReason").jqxComboBox({ source: DataTransferReasons, width: '250', height: '25px', displayMember: "TransferReason", valueMember: "TransferReason_id", autoDropDownHeight: true });
            $("#cmbCloseReason").jqxComboBox({ source: DataCloseReasons, width: '220', height: '25px', displayMember: "CloseReason", valueMember: "CloseReason_id", autoDropDownHeight: true });
            $("#cmbDelayReason").jqxComboBox({ source: DataDelayReasons, width: '420', height: '25px', displayMember: "name", valueMember: "dlrs_id"});
            $("#cmbDemandResult").jqxComboBox({ source: DataDemandResults, width: '140', height: '25px', displayMember: "ResultName", valueMember: "Result_id", autoDropDownHeight: true});
            //$("#cmbPrior").jqxComboBox({disabled: ReadOnly});
            // Проставляем знаячение
            if (Demand.DelayedClosureReason_id != '') $("#cmbDelayedClosureReason").jqxComboBox('val', Demand.DelayedClosureReason_id);
            if (Demand.TransferReason != '') $("#cmbTransferReason").jqxComboBox('val', Demand.TransferReason);
            if (Demand.Clrs_id != '') $("#cmbCloseReason").jqxComboBox('val', Demand.Clrs_id);
            if (Demand.Dlrs_id != '') $("#cmbDelayReason").jqxComboBox('val', Demand.Dlrs_id);
            if (Demand.Rslt_id != '') $("#cmbDemandResult").jqxComboBox('val', Demand.Rslt_id);
        }
        // Проставляем знаячение
        if (StateInsert) {
            if (Demand.Master != '') $("#cmbExecutor").jqxComboBox('val', Demand.Master);
        }
        
        // Инициализация событий
        $("#cmbDemandType").bind('select', function(event) {
            if (event.args) {
                $("#cmbSystemType").jqxComboBox({ disabled: false, selectedIndex: -1});		
                var value = event.args.item.value;
                var SystemSource = [];
                for (var i = 0; i < DataSystemTypesRecords.length; i++) {
                    if (DataSystemTypesRecords[i].DType_id == value)
                        SystemSource.push(DataSystemTypesRecords[i]);
                }
                $("#cmbSystemType").jqxComboBox({source: SystemSource, autoDropDownHeight: SystemSource.length > 10 ? false : true});
                $("#cmbSystemType").jqxComboBox('selectIndex', 0);
            }
        });  
        
        $("#cmbSystemType").bind('select', function(event)
        {
            if (event.args) {
                $("#cmbEquipType").jqxComboBox({ disabled: false, selectedIndex: -1});		
                if (event.args.item !== null) {
                    var value = event.args.item.value;
                    var EquipsSource = [];
                    for (var i = 0; i < DataEquipTypesRecords.length; i++) {
                        if (DataEquipTypesRecords[i].DSystem_id == value)
                            EquipsSource.push(DataEquipTypesRecords[i]);
                    }
                    $("#cmbEquipType").jqxComboBox({source: EquipsSource, autoDropDownHeight: EquipsSource.length > 10 ? false : true});
                    $("#cmbEquipType").jqxComboBox('selectIndex', 0);
                }
            }
        }); 
        
        $("#cmbEquipType").bind('select', function(event) {
            if (event.args) {
                $("#cmbMalfunction").jqxComboBox({ disabled: false, selectedIndex: -1});		
                if (event.args.item !== null) {
                    var value = event.args.item.value;
                    var MalfunctionsSource = [];
                    for (var i = 0; i < DataMalfunctionsRecords.length; i++) {
                        if (DataMalfunctionsRecords[i].DEquip_id == value)
                            MalfunctionsSource.push(DataMalfunctionsRecords[i]);
                    }
                    $("#cmbMalfunction").jqxComboBox({source: MalfunctionsSource, autoDropDownHeight: MalfunctionsSource.length > 10 ? false : true});
                    $("#cmbMalfunction").jqxComboBox('selectIndex', 0);
                }
            }
        }); 
        
        $("#cmbMalfunction").bind('select', function(event) {
            if (event.args) {
                $("#cmbPrior").jqxComboBox({ disabled: false, selectedIndex: -1});		
                if (event.args.item !== null) {
                    var value = event.args.item.value;
                    var PriorsSource = [];
                    for (var i = 0; i < DataPriorsRecords.length; i++) {
                        if (StateInsert || (ReadOnly == false)) {
                            if (DataPriorsRecords[i].DMalfunction_id == value)
                                PriorsSource.push(DataPriorsRecords[i]);
                        }
                        else {
                            if ((DataPriorsRecords[i].DMalfunction_id == value) && (DataPriorsRecords[i].DemandPrior_id == 10 || DataPriorsRecords[i].DemandPrior_id == 11 || DataPriorsRecords[i].DPrior_id == Demand.DPrior_id))
                                PriorsSource.push(DataPriorsRecords[i]);
                        }
                        
                        
                    }
                    
                    $("#cmbPrior").jqxComboBox({source: PriorsSource, autoDropDownHeight: false});
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
        
        
        
        if (Demand.DType_id != '') $("#cmbDemandType").jqxComboBox('val', Demand.DType_id);
        if (Demand.DSystem_id !== '') { $("#cmbSystemType").jqxComboBox('val', Demand.DSystem_id); } else { $("#cmbSystemType").jqxComboBox({disabled: true}); }
        if (Demand.DEquip_id != '') $("#cmbEquipType").jqxComboBox('val', Demand.DEquip_id); else $("#cmbEquipType").jqxComboBox({disabled: false});
        if (Demand.DMalfunction_id != '') $("#cmbMalfunction").jqxComboBox('val', Demand.DMalfunction_id); else $("#cmbMalfunction").jqxComboBox({disabled: false});
        if (Demand.DPrior_id != '') { $("#cmbPrior").jqxComboBox('val', Demand.DPrior_id); $("#btnSave").jqxButton({ disabled: false });} else $("#cmbPrior").jqxComboBox({disabled: false});
        
        
            
        
        if (!StateInsert) {
            $("#cmbMalfunction").select();
            $("#cmbExecutor").jqxComboBox({disabled: true});
            $("#cmbDemandType").jqxComboBox({disabled: ReadOnly});
            $("#cmbSystemType").jqxComboBox({disabled: ReadOnly});
            $("#cmbEquipType").jqxComboBox({disabled: ReadOnly});
            $("#cmbMalfunction").jqxComboBox({disabled: ReadOnly});
        }
        
        
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
        
        $("#btnCancelSave").on('click', function () {
            history.back();
        });
        
        $("#btnSave").on('click', function () {
            if ($("#btnSave").jqxButton('disabled'))
                return;
            $("#btnSave").jqxButton({disabled: true});
            
            var State = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
            var url = '';
//            console.log($("#chbDateMaster").jqxCheckBox('val'));
            if (State)
                url = <?php echo json_encode(Yii::app()->createUrl('Demands/Create')) ?> 
                    + '&ToMaster=' + $("#chbDateMaster").jqxCheckBox('val') 
                    + '&ExecutorId=' + $("#cmbExecutor").jqxComboBox('val');
            else
                url = <?php echo json_encode(Yii::app()->createUrl('Demands/Update')) ?> 
                    + '&id=' + $("#edDemand_id").val() 
                    + '&ToMaster=' + $("#chbDateMaster").jqxCheckBox('val') 
                    + '&ExecutorId=' + $("#cmbExecutor").jqxComboBox('val');
            $.ajax({
                url: url,
                type: 'POST',
                async: false,
                data: $("#Demands").serialize(),
                success: function(Res) {

                    Res = JSON.parse(Res);
                    if (Res.result === 1) {
                        document.location = <?php echo json_encode(Yii::app()->createUrl('Demands/View')); ?> + '&Demand_id=' + Res.id;
                    } else {
                        $("#body-form").html(Res.html);
                    }
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], 'Попробуйте повторить попытку позже');
                    $("#btnSave").jqxButton({disabled: false});
                }
            });
        });
        
        $("#btnClient").on('click', function(){
            Aliton.ViewClient(Demand.ObjectGr_id);
        });
        
        if (StateInsert)
            $("#cmbDemandType").jqxComboBox('selectIndex', 0);
    });
</script>    

<style>
    .row {
        overflow: hidden;
    }
    
    .row-column {
        float: left;
        margin-right: 10px;
    }
</style>

<div id="body-form">

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

<div class="row" style="margin-top: 0;">
    <div class="row-column">Номер: <input  name="Demands[Demand_id]" type="text" id="edDemand_id" value="<?php echo $model->Demand_id; ?>"/></div>
    <div class="row-column">Адрес: <input type="text" id="edAddr" /></div>
    <div class="row-column">Особые условия: <b><?php echo $Objects->Condition; ?></b></div>
</div>
<div class="row" style="margin-top: 7px;">
    <div class="row-column" style="width: 210px;">Дата и время заявки:</div>
    <div class="row-column" style="width: 200px;">Тариф обслуживания:</div>
    <div class="row-column" style="width: 200px;">Исполнитель:</div>
    <div class="row-column" style="margin-left: 30px;"><div id='chbDateMaster'>Передать мастеру</div></div>
</div>
<div class="row" style="margin-top: 0px;">
    <div class="row-column"><div id='edDate' name="Demands[DateReg]"></div></div>
    <div class="row-column"><input name="Demands[ServiceType]" type="text" id="edServiceType"/></div>
    <div class="row-column"><div id='cmbExecutor' name="Demands[ExecOther]"></div></div>
</div>
<div class="row" style="margin-top: 5px;">
    <div class="row-column" style="width: 303px;">Тип заявки:</div>
    <div class="row-column" style="width: 303px;">Тип системы:</div>
    <div class="row-column" style="width: 180px;">Тип оборудования:</div>
</div>
<div class="row" style="margin-top: 0px;">
    <div class="row-column"><div id='cmbDemandType' name="Demands[DType_id]"><?php echo $model->DType_id; ?></div></div>
    <div class="row-column"><div id='cmbSystemType' name="Demands[DSystem_id]"></div></div>
    <div class="row-column"><div id='cmbEquipType' name="Demands[DEquip_id]"></div></div>
</div>
<div class="row" style="margin-top: 5px;">
    <div class="row-column" style="width: 285px;">Неисправность:</div>
    <div class="row-column" style="width: 220px;">Приоритет:</div>
    <div class="row-column" style="width: 150px;">Предельная дата:</div>
    <div class="row-column" style="width: 150px;">Согласованная дата:</div>
    
</div>
<div class="row" style="margin: 0px;">
    <div class="row-column"><div id='cmbMalfunction' name="Demands[DMalfunction_id]"></div></div>
    <div class="row-column"><div id='cmbPrior' name="Demands[DPrior_id]"></div><div><?php echo $form->error($model, 'DPrior_id'); ?></div></div>
    <div class="row-column"><div id='edDeadline' name="Demands[Deadline]"></div></div>
    <div class="row-column"><div id='edAgreeDate' name="Demands[AgreeDate]"></div></div>
</div>
<div class="row" style="margin-top: 5px;">
    <div class="row-column" style="width: 502px;">Контактное лицо:</div>
    <div class="row-column" style="width: 293px;">Из карточки клиента:</div>
</div>
<div class="row" style="margin-bottom: 0px; margin-top: 0px;">
    <div class="row-column" style="margin-right: 2px;"><input autocomplete="off" type="text" id="edContacts" name="Demands[Contacts]" value="<?php echo $model->Contacts; ?>" /><div><?php echo $form->error($model, 'Contacts'); ?></div></div>
    <div class="row-column" style="margin-right: 2px;"><div id='cmbContactInfo'></div></div>
</div>
<!--
    Если мы редактируем, то выводим поля: Дата доклада помощи, Дата перевода заявки,
    Причина несв. закрытия заявки, Причина перевода заявки,
    Причина закрытия, Причина просрочки, Результат заявки
-->
<?php if (Yii::app()->controller->action->id == 'Update') { ?>
    <div class="row" style="margin-top: 5px;">
        <div class="row-column">Дата доклада о помощи: <div id='edDateOfHelpRequest' name="Demands[DateOfHelpRequest]"></div></div>
        <div class="row-column">Дата перевода заявки: <div id='edDateOfTransfer' name="Demands[DateOfTransfer]"></div></div>
        <div class="row-column">Причина несв. закрытия заявки: <div id='cmbDelayedClosureReason' name="Demands[DelayedClosureReason_id]"></div></div>
        <div class="row-column">Причина перевода заявки: <div id='cmbTransferReason' name="Demands[TransferReason]"></div><div><?php echo $form->error($model, 'TransferReason'); ?></div></div>
    </div>
    <div class="row" style="margin-top: 5px;">
        <div class="row-column">Причина закрытия: <div id='cmbCloseReason' name="Demands[clrs_id]"></div></div>
        <div class="row-column">Причина просрочки: <div id='cmbDelayReason' name="Demands[dlrs_id]"></div><div><?php echo $form->error($model, 'dlrs_id'); ?></div></div>
        <div class="row-column">Результат заявки: <div id='cmbDemandResult' name="Demands[rslt_id]"></div><div><?php echo $form->error($model, 'rslt_id'); ?></div></div>
    </div>
<?php } ?>

<div class="row" style="margin-top: 0;">
    <div class="row-column">Отказники: <textarea id="edRefusers" name="Demands[Refusers]"><?php echo $ObjectsGroup->Refusers; ?></textarea></div>
</div>    
<div class="row" style="margin-top: 0;">
    <div class="row-column">Неисправность: <textarea id="edDemandText" name="Demands[DemandText]"><?php echo $model->DemandText; ?></textarea></div>
</div>

<!-- Если мы редактируем, то выводим поля: Отчет мастера, Дата передач, Дата выполнения -->
<?php if (Yii::app()->controller->action->id == 'Update') { ?>
    <div class="row" style="margin-top: 0px;">
        <div class="row-column">Отчет мастера <textarea id="edRepMaster" name="Demands[RepMaster]"><?php echo $model->RepMaster; ?></textarea></div>
    </div>
    <div class="row" style="margin-top: 5px; width: 800px">
        <div class="row-column">Передано</div>
        <div class="row-column"><div id='edDateMaster' name="Demands[DateMaster]"></div><div><?php echo $form->error($model, 'DateMaster'); ?></div></div>
        <div class="row-column" style="float: right; margin: 0;"><div id='edDateExec' name="Demands[DateExec]"></div><div><?php echo $form->error($model, 'DateExec'); ?></div></div>
        <div class="row-column" style="float: right; margin-right: 5px;">Выполнено </div>
    </div>
<?php } ?>

<div class="row" style="margin-top: 5px; width: 800px">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSave' /></div>
    <div class="row-column" style="margin-left: 80px;"><input type="button" value="Карточка" id='btnClient' /></div>
    <div class="row-column" style="float: right"><input type="button" value="Отмена" id='btnCancelSave' /></div>
</div>

<?php $this->endWidget(); ?>

</div>
