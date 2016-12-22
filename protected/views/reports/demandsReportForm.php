<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
            var DataAddresses = new $.jqx.dataAdapter(Sources.SourceListAddresses);
            var DataEmpl = new $.jqx.dataAdapter(Sources.SourceListEmployees);
            var DataDemandType = new $.jqx.dataAdapter(Sources.SourceDemandTypesList);
            var DataSystemType = new $.jqx.dataAdapter(Sources.SourceSystemTypesMin);
            var DataEquipType = new $.jqx.dataAdapter(Sources.SourceEquipTypesList);
            var DataMalfunction = new $.jqx.dataAdapter(Sources.SourceMalfunctionsOld);
            
            var DataServiceType = new $.jqx.dataAdapter(Sources.SourceServiceTypes);
            var DataTerritory = new $.jqx.dataAdapter(Sources.SourceTerritory);
            var DataExec = [
                {id: 1, name: 'Все'},
                {id: 2, name: 'Непереданные'},
                {id: 3, name: 'Невыполненные'},
            ];
            
            $("#Address").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataAddresses, displayMember: "Addr", valueMember: "ObjectGr_id", width: 400 }));
            $("#Master").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmpl, displayMember: "ShortName", valueMember: "Employee_id", width: 200 }));
            $("#DemandType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataDemandType, displayMember: "DemandType", valueMember: "DemandType_id", width: 280 }));
            $("#SystemType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSystemType, displayMember: "SystemTypeName", valueMember: "SystemType_Id", width: 280 }));
            $("#EquipType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEquipType, displayMember: "EquipType", valueMember: "EquipType_id", width: 280 }));
            $("#Malfunction").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataMalfunction, displayMember: "Malfunction", valueMember: "Malfunction_id", width: 280 }));
            $("#Exec").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataExec, displayMember: "name", valueMember: "id", width: 280, autoDropDownHeight:true }));
            
            $("#ServiceType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataServiceType, displayMember: "ServiceType", valueMember: "ServiceType_id", width: 280 }));
            $("#Territory").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataTerritory, displayMember: "Territ_Name", valueMember: "Territ_Id", width: 200 }));
            
            $("#DateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', value: null }));
            $("#DateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy' }));
            
            $("#DateExecStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', value: null }));
            $("#DateExecEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy' }));
            
            
            $("#AllPeriod").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings));
            $("#AllExecPeriod").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings));
            
             
            var NewDate = new Date();
            var Month = NewDate.getMonth();
            var Year = NewDate.getFullYear();
            var NewDate = new Date(Year, Month, 1);
            $('#DateStart').jqxDateTimeInput('val', NewDate);
            $('#DateExecStart').jqxDateTimeInput('val', NewDate);
            $("#Exec").jqxComboBox('val', 1);
        }
    });
</script>    

<?php
    $this->ReportName = $ReportName;
?>
<?php
    if (!$Ajax) {
        $this->beginWidget('CActiveForm', array(
            'id' => 'Parameters',
            'htmlOptions'=>array(
                'class'=>'form-inline'
            ),
        ));
?>        

<div class="al-row">
    <div class="al-row-column">Адрес объекта: </div>
    <div class="al-row-column"><div id='Address' name="Parameters[prmObjectGr]"></div></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column">Мастер: </div>
    <div class="al-row-column"><div id='Master' name="Parameters[prmMaster]"></div></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column">Тип заявки: </div>
    <div class="al-row-column"><div id='DemandType' name="Parameters[prmDemandType]"></div></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column">Тип системы: </div>
    <div class="al-row-column"><div id='SystemType' name="Parameters[prmSystemType]"></div></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column">Тип оборудования: </div>
    <div class="al-row-column"><div id='EquipType' name="Parameters[prmEquipType]"></div></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column">Неисправность: </div>
    <div class="al-row-column"><div id='Malfunction' name="Parameters[prmMalfunction]"></div></div>
    <div style="clear: both"></div>
</div>

<div class="al-row">
    <div class="al-row-column">Тариф: </div>
    <div class="al-row-column"><div id='ServiceType' name="Parameters[prmServiceType]"></div></div>
    <div style="clear: both"></div>
</div>

<div class="al-row">
    <div class="al-row-column">Выполнение: </div>
    <div class="al-row-column"><div id='Exec' name="Parameters[prmExec]"></div></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column">Участок: </div>
    <div class="al-row-column"><div id='Territory' name="Parameters[prmTerrit1]"></div></div>
    <div style="clear: both"></div>
</div>

    
    
    
    
    


    <div class="row" style="padding: 10px; width: 400px; border: 1px solid #ddd; background-color: #F2F2F2;">
        <div class="row">
            <div class="row-column" id="AllPeriod" name="Parameters[prmAllPeriod]"></div>
            <div class="row-column" style="margin-top: 2px;">Учитывать дату регистрации заявки за период:</div>
        </div>
        <div class="row" style="margin-left: 35px;">
            <div class="row-column" style="margin-top: 2px;">с </div><div class="row-column"><div id='DateStart' name="Parameters[prmDateStart]"></div></div>
            <div class="row-column" style="margin-top: 2px;">по </div><div class="row-column"><div id='DateEnd' name="Parameters[prmDateEnd]"></div></div>
        </div>
    </div>

    <div class="row" style="padding: 10px; width: 400px; border: 1px solid #ddd; background-color: #F2F2F2;">
        <div class="row">
            <div class="row-column" id="AllExecPeriod" name="Parameters[prmAllExecPeriod]"></div>
            <div class="row-column" style="margin-top: 2px;">Учитывать дату выполнения заявки за период:</div>
        </div>
        <div class="row" style="margin-left: 35px;">
            <div class="row-column" style="margin-top: 2px;">с </div><div class="row-column"><div id='DateExecStart' name="Parameters[prmDateExecStart]"></div></div>
            <div class="row-column" style="margin-top: 2px;">по </div><div class="row-column"><div id='DateExecEnd' name="Parameters[prmDateExecEnd]"></div></div>
        </div>
    </div>


<div style="clear: both; margin-top: 10px;"></div>
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>

