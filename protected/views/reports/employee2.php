<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
            $("#edDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: null }));
            $("#edDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: null }));
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
            <div class="row-column">Период с:</div>
            <div class="row-column" ><div id='edDateStart' name="Parameters[prmDateStart]" ></div></div>
            <div class="row-column">по:</div>
            <div class="row-column" ><div id='edDateEnd' name="Parameters[prmDateEnd]" ></div></div>
        </div>
        
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>



