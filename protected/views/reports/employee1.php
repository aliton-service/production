<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
            var DataPositions = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourcePositions));
            
            $("#edPosition").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataPositions, width: '290', height: '25px', displayMember: "PositionName", valueMember: "Position_id"}));
            //$("#edDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Date(), formatString: 'dd.MM.yyyy'}));
            //$("#edDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Date(), formatString: 'dd.MM.yyyy'}));
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
            <div class="row-column">Должность</div>
            <div class="row-column"><div id="edPosition" name="Parameters[prmPosition]"></div></div>
        </div>
        <input name="Parameters[prmMonth]" value="0" />
        <input name="Parameters[prmJuridical]" value="0" />
        <input name="Parameters[prmDep]" value="0" />
        
        <input name="Parameters[prmDateStart]" value="01.08.2016" />
        <input name="Parameters[prmDateStart]" value="31.08.2016" />
        <input name="Parameters[prmDismissalFrom]" value="31.08.2016" />
        <input name="Parameters[prmDismissalTo]" value="31.08.2016" />
        <input name="Parameters[prmYears]" value="31.08.2016" />
        <div style="clear: both; margin-top: 10px;"></div>
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>

