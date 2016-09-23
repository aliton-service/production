<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
            var DataEmpl = new $.jqx.dataAdapter(Sources.SourceListEmployees);
            var DataTerritory = new $.jqx.dataAdapter(Sources.SourceTerritory);
            var DataPriors = new $.jqx.dataAdapter(Sources.SourceDemandPriors);
            
            $("#Master").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmpl, displayMember: "ShortName", valueMember: "Employee_id", width: 200 }));
            $("#Territory").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataTerritory, displayMember: "Territ_Name", valueMember: "Territ_Id", width: 200 }));
            $("#DemandPrior").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataPriors, displayMember: "DemandPrior", valueMember: "DemandPrior_id", width: 280 }));
            
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
        <div class="row-column">Мастер: </div>
        <div class="row-column"><div id='Master' name="Parameters[prmMaster]"></div></div>
    </div>
    
    <div class="row">
        <div class="row-column">Участок: </div>
        <div class="row-column"><div id='Territory' name="Parameters[prmTerrit1]"></div></div>
    </div>
    
    <div class="row">
        <div class="row-column">Приоритет: </div>
        <div class="row-column"><div id='DemandPrior' name="Parameters[prmDemandPrior]"></div></div>
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

</div>
<div style="clear: both; margin-top: 10px;"></div>
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>



