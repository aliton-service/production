<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
            //var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {}));
            //var DataEquips = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEquipsMin, {async: true}));
            var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {async: false}));
            var DataStorages = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceStoragesList, {async: false}));
            var DataPriors = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDemandPriors, {async: false}));
            DataEmployees.dataBind();
            DataEmployees = DataEmployees.records;
            
            var DS = new Date();
            var DE = new Date();
            DS.setMonth(DS.getMonth() - 1);
            
            $("#edMaster").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, width: '300', height: '25px', displayMember: "EmployeeName", valueMember: "Employee_id"}));
            $("#edActMaster").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, width: '300', height: '25px', displayMember: "EmployeeName", valueMember: "Employee_id"}));
            $("#edPrior").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataPriors, width: '300', height: '25px', displayMember: "DemandPrior", valueMember: "DemandPrior_id"}));
            $("#edDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: DS, width: 110, formatString: 'dd.MM.yyyy' }));
            $("#edDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: DE, width: 110, formatString: 'dd.MM.yyyy' }));
            $("#edStrg").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataStorages, width: '150', height: '25px', displayMember: "storage", valueMember: "storage_id"}));
            
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
        <div class="al-row-column" style="width: 150px;">Склад</div>
        <div class="al-row-column"><div name="Parameters[prmStrg]" id="edStrg"></div></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row-column" style="width: 150px;">Затребовал</div>
        <div class="al-row-column"><div name="Parameters[prmMaster]" id="edMaster"></div></div>
        <div style="clear: both"></div>
    </div>
<div class="al-row">
        <div class="al-row-column" style="width: 150px;">Получил</div>
        <div class="al-row-column"><div name="Parameters[prmActMaster]" id="edActMaster"></div></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row-column" style="width: 150px;">Приоритет</div>
        <div class="al-row-column"><div name="Parameters[prmPrior]" id="edPrior"></div></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row-column" style="width: 150px;">Период с</div>
        <div class="al-row-column"><div name="Parameters[prmDateStart]" id="edDateStart"></div></div>
        <div class="al-row-column" >по</div>
        <div class="al-row-column"><div name="Parameters[prmDateEnd]" id="edDateEnd"></div></div>
        <div style="clear: both"></div>
    </div>
        
    <?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>



