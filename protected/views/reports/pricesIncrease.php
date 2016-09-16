<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
                     
            var DataTerritory = new $.jqx.dataAdapter(Sources.SourceTerritory);
            
            $("#Date").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', value: null }));
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
    <div class="row" style="padding: 10px; width: 490px; border: 1px solid #ddd; background-color: #F2F2F2;">
        <div class="row">
            <div class="row-column" style="margin-top: 2px;">Выберите дату, с которой не повышались расценки:</div>
            <div class="row-column"><div id='Date' name="Parameters[pDate]"></div></div>
        </div>
    </div>
</div>
<div style="clear: both; margin-top: 10px;"></div>
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>


