<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
            var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees));
            
            $("#edMaster").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, width: '290', height: '25px', displayMember: "EmployeeName", valueMember: "Employee_id"}));
            $("#edDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Date(), formatString: 'dd.MM.yyyy'}));
            $("#edDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Date(), formatString: 'dd.MM.yyyy'}));
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
        <div style="float: left;">
            <div class="al-row">
                <div class="al-row-column" style="width: 130px">Сотрудник:</div>
                <div class="al-row-column"><div id="edMaster" name="Parameters[prmMaster]"></div></div>
                <div style="clear: both"></div>
            </div>
            <div class="al-row">
                <div class="al-row-column">Период с</div>
                <div class="al-row-column"><div id='edDateStart' name="Parameters[DateStart]"></div></div>
                <div class="al-row-column">по</div>
                <div class="al-row-column"><div id='edDateEnd' name="Parameters[DateEnd]"></div></div>
            </div>
        </div>
        <div style="clear: both; margin-top: 10px;"></div>
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>

