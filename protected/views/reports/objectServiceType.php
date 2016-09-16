<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
            var DataServiceType = new $.jqx.dataAdapter(Sources.SourceServiceTypes);
            var DataTerritory = new $.jqx.dataAdapter(Sources.SourceTerritory);
            var DataSystemTypes = new $.jqx.dataAdapter(Sources.SourceSystemTypesMin);
            
            $("#ServiceType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataServiceType, displayMember: "ServiceType", valueMember: "ServiceType_id", width: 300 }));
            $("#Territory").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataTerritory, displayMember: "Territ_Name", valueMember: "Territ_Id", width: 285 }));
            $("#SystemTypes").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSystemTypes, displayMember: "SystemTypeName", valueMember: "SystemType_Id", width: 280 }));
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
    <div class="row">
        <div style="float: left; margin-right: 6px">Тариф</div>
        <div style="float: left; margin-right: 6px">
            <div id='ServiceType' name="Parameters[ServiceType_id]"></div>
        </div>
    </div>

    <div class="row">
        <div style="float: left; margin-right: 6px">Участок</div>
        <div style="float: left; margin-right: 6px">
            <div id='Territory' name="Parameters[Territ_id]"></div>
        </div>
    </div>

    <div class="row">
        <div style="float: left; margin-right: 6px">Система</div>
        <div style="float: left; margin-right: 6px">
            <div id='SystemTypes' name="Parameters[p_SystemType]"></div>
        </div>
    </div>
</div>
<div style="clear: both; margin-top: 10px;"></div>
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>





