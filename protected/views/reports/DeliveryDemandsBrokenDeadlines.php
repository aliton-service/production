<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
            var DataEmpl = new $.jqx.dataAdapter(Sources.SourceListEmployees);
            var DataPriors = new $.jqx.dataAdapter(Sources.SourceDemandPriors);
            var DataSection = new $.jqx.dataAdapter(Sources.SourceSections);
            var DataExec = [
                {id: 1, name: 'Все'},
                {id: 2, name: 'Выполненные'},
                {id: 3, name: 'Невыполненные'},
            ];
            
            $("#Master").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmpl, displayMember: "ShortName", valueMember: "Employee_id", width: 200 }));
            $("#Deliveryman").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmpl, displayMember: "ShortName", valueMember: "Employee_id", width: 200 }));
            $("#DemandPrior").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataPriors, displayMember: "DemandPrior", valueMember: "DemandPrior_id", width: 240 }));
            $("#Section").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSection, displayMember: "SectionName", valueMember: "Section_id", width: 320 }));
            $("#Exec").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataExec, displayMember: "name", valueMember: "id", width: 170, autoDropDownHeight:true }));
            
            $("#DateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', value: null }));
            $("#DateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy' }));
            
            $("#AllPeriod").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { checked: true }));
            
             
            var NewDate = new Date();
            var Month = NewDate.getMonth();
            var Year = NewDate.getFullYear();
            var NewDate = new Date(Year, Month, 1);
            $('#DateStart').jqxDateTimeInput('val', NewDate);
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

<div class="row" style="margin-left: 20px;">
    
    <div class="row">
        <div class="row-column">Мастер: </div>
        <div class="row-column"><div id='Master' name="Parameters[prmMaster]"></div></div>
    </div>
    
    <div class="row">
        <div class="row-column">Исполнитель: </div>
        <div class="row-column"><div id='Deliveryman' name="Parameters[prmDeliveryman]"></div></div>
    </div>
    
    <div class="row">
        <div class="row-column">Приоритет: </div>
        <div class="row-column"><div id='DemandPrior' name="Parameters[prmPrior]"></div></div>
    </div>
    
    <div class="row">
        <div class="row-column">Выполнение: </div>
        <div class="row-column"><div id='Exec' name="Parameters[prmExec]"></div></div>
    </div>
    
    <div class="row">
        <div class="row-column">Департамент: </div>
        <div class="row-column"><div id='Section' name="Parameters[prmSection]"></div></div>
    </div>

    <div class="row" style="padding: 10px; width: 400px; border: 1px solid #ddd; background-color: #F2F2F2;">
        <div class="row" style="margin: 0;">
            <div class="row-column" id="AllPeriod" name="Parameters[prmAllPeriod]"></div>
            <div class="row-column" style="margin-top: 2px;">Учитывать дату выполнения заявки за период:</div>
        </div>
        <div class="row" style="margin-left: 35px;">
            <div class="row-column" style="margin-top: 2px;">с </div><div class="row-column"><div id='DateStart' name="Parameters[prmDateStart]"></div></div>
            <div class="row-column" style="margin-top: 2px;">по </div><div class="row-column"><div id='DateEnd' name="Parameters[prmDateEnd]"></div></div>
        </div>
    </div>


</div>
<div style="clear: both; margin-top: 10px;"></div>
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>

