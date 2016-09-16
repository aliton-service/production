<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
                     
            var DataTerritory = new $.jqx.dataAdapter(Sources.SourceTerritory);
            
            $("#DateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', value: null }));
            $("#DateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', value: null }));
            
            $("#Territory").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataTerritory, displayMember: "Territ_Name", valueMember: "Territ_Id", width: 220 }));
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
    <div class="row" style="padding: 10px; width: 450px; border: 1px solid #ddd; background-color: #F2F2F2;">
        <div class="row" style="margin: 0 0 15px 0; width: 100%;">Клиенты с которыми был расторгнут договор за период:</div>
        <div class="row">
            <div class="row-column" style="margin-top: 2px;">За период </div>
            <div class="row-column" style="margin-top: 2px;">с </div><div class="row-column"><div id='DateStart' name="Parameters[DateStart]"></div></div>
            <div class="row-column" style="margin-top: 2px;">по </div><div class="row-column"><div id='DateEnd' name="Parameters[DateEnd]"></div></div>
        </div>
    </div>
    
    <div class="row">
        <div class="row" style="margin-left: 15px;">
            <div class="row-column">Участок</div>
            <div class="row-column">
                <div id='Territory' name="Parameters[Territ]"></div>
            </div>
        </div>
    </div>
</div>
<div style="clear: both; margin-top: 10px;"></div>
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>





