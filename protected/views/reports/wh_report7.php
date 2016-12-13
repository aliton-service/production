<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
            //var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {}));
            var DataEquips = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEquipsMin, {async: true}));
            var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {async: false}));
            var Empl_id = <?php echo json_encode(Yii::app()->user->Employee_id); ?>;
            DataEmployees.dataBind();
            DataEmployees = DataEmployees.records;
            
            var DS = new Date();
            var DE = new Date();
            DS.setMonth(DS.getMonth() - 1);
            
            $("#edMaster").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, width: '300', height: '25px', displayMember: "EmployeeName", valueMember: "Employee_id"}));
            $("#edEquip").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEquips, width: '300', height: '25px', displayMember: "EquipName", valueMember: "Equip_id"}));
            $("#edDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: DS, width: 110, formatString: 'dd.MM.yyyy' }));
            $("#edDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: DE, width: 110, formatString: 'dd.MM.yyyy' }));
            $("#edMaster").val(Empl_id);
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
        <div class="al-row-column" style="width: 150px;">Затребовал</div>
        <div class="al-row-column"><div name="Parameters[prmMaster]" id="edMaster"></div></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row-column" style="width: 150px;">Оборудование</div>
        <div class="al-row-column"><div name="Parameters[prmEquip]" id="edEquip"></div></div>
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



