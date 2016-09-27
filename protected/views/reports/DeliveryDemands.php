<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
            var DataEmpl = new $.jqx.dataAdapter(Sources.SourceListEmployees);
            
            $("#Courier").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmpl, displayMember: "ShortName", valueMember: "Employee_id", width: 200 }));
            
            $("#DateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy' }));
            $("#DateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy' }));
            
            $("#DateReg").jqxRadioButton($.extend(true, {}, RadioButtonDefaultSettings, { checked: true}));
            $("#DateExec").jqxRadioButton($.extend(true, {}, RadioButtonDefaultSettings));
            $("#DatePlan").jqxRadioButton($.extend(true, {}, RadioButtonDefaultSettings));
            
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
        <div class="row-column">Курьер: </div>
        <div class="row-column"><div id='Courier' name="Parameters[prmEmpl]"></div></div>
    </div>
    
    <div class="row" style="padding: 10px; width: 200px; border: 1px solid #ddd; background-color: #F2F2F2;">
        <div class="row">
            <div class="row-column" id="DateReg" name="Parameters[p_date_reg]"></div><div class="row-column">Дата регистрации</div>
        </div>
        <div class="row">
            <div class="row-column" id="DateExec" name="Parameters[p_date_exec]"></div><div class="row-column">Дата выполнения</div>
        </div>
        <div class="row">
            <div class="row-column" id="DatePlan" name="Parameters[p_date_plan]"></div><div class="row-column">Планируемая дата</div>
        </div>
    </div>
    
    <div class="row" style="padding: 10px; width: 320px; border: 1px solid #ddd; background-color: #F2F2F2;">
        <div class="row" style="margin: 0;">
            <div class="row-column" style="margin-top: 2px;">Выберите период:</div>
        </div>
        <div class="row">
            <div class="row-column" style="margin-top: 2px;">с </div><div class="row-column"><div id='DateStart' name="Parameters[p_datestart]"></div></div>
            <div class="row-column" style="margin-top: 2px;">по </div><div class="row-column"><div id='DateEnd' name="Parameters[p_dateend]"></div></div>
        </div>
    </div>


</div>
<div style="clear: both; margin-top: 10px;"></div>
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>

