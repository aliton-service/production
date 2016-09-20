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
            
            $("#Address").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataAddresses, displayMember: "Addr", valueMember: "Address_id", width: 400 }));
            $("#Master").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmpl, displayMember: "ShortName", valueMember: "Employee_id", width: 200 }));
            $("#DemandType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataDemandType, displayMember: "DemandType", valueMember: "DemandType_id", width: 280 }));
            $("#SystemType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSystemType, displayMember: "SystemTypeName", valueMember: "SystemType_Id", width: 280 }));
            $("#EquipType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEquipType, displayMember: "EquipType", valueMember: "EquipType_id", width: 280 }));
            $("#Malfunction").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataMalfunction, displayMember: "Malfunction", valueMember: "Malfunction_id", width: 280 }));
            
            $("#ServiceType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataServiceType, displayMember: "ServiceType", valueMember: "ServiceType_id", width: 280 }));
            $("#Territory").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataTerritory, displayMember: "Territ_Name", valueMember: "Territ_Id", width: 200 }));
            
            $("#DateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', value: null }));
            $("#DateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy' }));
            
            $("#DateExecStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', value: null }));
            $("#DateExecEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy' }));
            
             
            var NewDate = new Date();
            var Month = NewDate.getMonth();
            var Year = NewDate.getFullYear();
            var NewDate = new Date(Year, Month, 1);
            $('#DateStart').jqxDateTimeInput('val', NewDate);
            $('#DateExecStart').jqxDateTimeInput('val', NewDate);
            
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

<div class="row" style="margin-left: 20px;">
    <div class="row">
        <div class="row-column">Адрес объекта: </div>
        <div class="row-column"><div id='Address' name="Parameters[prmObjectGr]"></div></div>
    </div>
    
    <div class="row">
        <div class="row-column">Мастер: </div>
        <div class="row-column"><div id='Master' name="Parameters[prmMaster]"></div></div>
    </div>
    
    <div class="row">
        <div class="row-column">Тип заявки: </div>
        <div class="row-column"><div id='DemandType' name="Parameters[prmDemandType]"></div></div>
    </div>
    
    <div class="row">
        <div class="row-column">Тип системы: </div>
        <div class="row-column"><div id='SystemType' name="Parameters[prmSystemType]"></div></div>
    </div>
    
    <div class="row">
        <div class="row-column">Тип оборудования: </div>
        <div class="row-column"><div id='EquipType' name="Parameters[prmEquipType]"></div></div>
    </div>
    
    <div class="row">
        <div class="row-column">Неисправность: </div>
        <div class="row-column"><div id='Malfunction' name="Parameters[prmMalfunction]"></div></div>
    </div>
    
    <div class="row">
        <div class="row-column">Тариф: </div>
        <div class="row-column"><div id='ServiceType' name="Parameters[prmServiceType]"></div></div>
    </div>
    
<!--    <div class="row">
        <div class="row-column">Выполнение: </div>
        <div class="row-column"><div id='' name="Parameters[]"></div></div>
    </div>-->

    <div class="row">
        <div class="row-column">Участок: </div>
        <div class="row-column"><div id='Territory' name="Parameters[prmTerrit1]"></div></div>
    </div>

    <div class="row" style="padding: 10px; width: 300px; border: 1px solid #ddd; background-color: #F2F2F2;">
        <div class="row" style="margin: 0 0 15px 0; width: 100%;">Дата регистрации заявки за период:</div>
        <div class="row">
            <div class="row-column" style="margin-top: 2px;">с </div><div class="row-column"><div id='DateStart' name="Parameters[prmDateStart]"></div></div>
            <div class="row-column" style="margin-top: 2px;">по </div><div class="row-column"><div id='DateEnd' name="Parameters[prmDateEnd]"></div></div>
        </div>
    </div>

    <div class="row" style="padding: 10px; width: 300px; border: 1px solid #ddd; background-color: #F2F2F2;">
        <div class="row" style="margin: 0 0 15px 0; width: 100%;">Дата выполнения заявки за период:</div>
        <div class="row">
            <div class="row-column" style="margin-top: 2px;">с </div><div class="row-column"><div id='DateExecStart' name="Parameters[prmDateStart]"></div></div>
            <div class="row-column" style="margin-top: 2px;">по </div><div class="row-column"><div id='DateExecEnd' name="Parameters[prmDateEnd]"></div></div>
        </div>
    </div>

</div>
<div style="clear: both; margin-top: 10px;"></div>
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>





