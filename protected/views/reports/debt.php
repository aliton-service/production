<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
            var DataDocTypes = [{id: 1, name: 'Все'}, {id: 2, name: 'Договора'}, {id: 3, name: 'Счета и счет-заказы'}];
            var DataTerritory = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceTerritory));
            $("#edDocType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataDocTypes, width: '200', height: '25px', displayMember: "name", valueMember: "id"}));
            $("#edTerrit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataTerritory, width: '200', height: '25px', displayMember: "Territ_Name", valueMember: "Territ_Id"}));
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
            <div class="row-column">Тип документа:</div>
            <div class="row-column"><div id="edDocType" name="Parameters[prmDocType]"></div></div>
        </div>
        <div class="row">
            <div class="row-column">Участок:</div>
            <div class="row-column"><div id="edTerrit" name="Parameters[prmTerrit]"></div></div>
        </div>
        <div style="clear: both; margin-top: 10px;"></div>
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>


