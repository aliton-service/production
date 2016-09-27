<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
            var DataForms = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceOrganizationsVMin));
            $("#edForm").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataForms, width: '290', height: '25px', displayMember: "FullName", valueMember: "Form_id"}));
            $("#edFullName").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 200}));
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
            <div class="row-column" style="width: 130px">Организация:</div>
            <div class="row-column"><div id="edForm" name="Parameters[prmForm]"></div></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 230px">Поиск по наименованию орг:</div>
            <div class="row-column"><input id="edFullName" name="Parameters[prmFullName]" /></div>
        </div>
        <div style="clear: both; margin-top: 10px;"></div>
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>





