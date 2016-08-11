<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
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
            <div style="float: left; margin-right: 6px">Период с</div>
            <div style="float: left; margin-right: 6px">
                <div id='edDateStart' name="Parameters[DateStart]"></div>
            </div>
            <div style="float: left; margin-right: 6px">по</div>
            <div style="float: left; margin-right: 6px">
                <div id='edDateEnd' name="Parameters[DateEnd]"></div>
            </div>
        </div>
        <div style="clear: both; margin-top: 10px;"></div>
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>

