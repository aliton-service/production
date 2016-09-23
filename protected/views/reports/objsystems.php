<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
            var DataSystemTypes = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceSystemTypesMin));
            var DataTerrits = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceTerritory));

            $("#edSystemType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSystemTypes, width: '290', height: '25px', displayMember: "SystemTypeName", valueMember: "SystemType_Id"}));
            $("#edTerrit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataTerrits, width: '290', height: '25px', displayMember: "Territ_Name", valueMember: "Territ_Id"}));
            $("#edDetails").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: '250'}));
            $("#edDetails").jqxCheckBox({checked: true});
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
        <div class="row">
            <div class="row-column" style="width: 130px">Системы:</div>
            <div class="row-column"><div id="edSystemType" name="Parameters[prmSystemType]"></div></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 130px">Участок:</div>
            <div class="row-column"><div id="edTerrit" name="Parameters[prmTerrit]"></div></div>
        </div>
        
        <div class="row">
            <div class="row-column" style="width: 130px"><div id='edDetails' name="Parameters[prmDetails]" >Детализация</div></div>
        </div>
        
        <div style="clear: both; margin-top: 10px;"></div>
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>

