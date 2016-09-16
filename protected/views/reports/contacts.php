<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
                     
            $("#Email1").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 300, height: 30 }));
            $("#Email2").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 300, height: 30 }));
            $("#Demands").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 300, height: 30 }));
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
    <div class="row-column"><div id='Email1' name="Parameters[p_param1]">E-mail пред. не указан</div></div>
</div>
<div class="row">
    <div class="row-column"><div id='Email2' name="Parameters[p_param2]">E-mail упр. не указан</div></div>
</div>
<div class="row">
    <div class="row-column"><div id='Demands' >Нет невыполненных заявок</div></div>
</div>
<div style="clear: both; margin-top: 10px;"></div>
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>





