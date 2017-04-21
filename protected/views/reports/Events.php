<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
            var DS = new Date();
            var DE = new Date();
            DS.setMonth(DS.getMonth()-1);
            var DataEventTypes = new $.jqx.dataAdapter(Sources.SourceEventTypes);
            $("#cmbEventType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEventTypes, displayMember: "EventType", valueMember: "evtp_id", width: 200 }));
            var DataEmployees = new $.jqx.dataAdapter(Sources.SourceListEmployees);
            $("#cmbExecutor").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, displayMember: "ShortName", valueMember: "Employee_id", width: 200 }));
            var DataTerrit = new $.jqx.dataAdapter(Sources.SourceTerritory);
            $("#cmbTerrit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataTerrit, displayMember: "Territ_Name", valueMember: "Territ_Id", width: 200 }));
            $("#cmbVIP").on('select', function(event) {
                var args = event.args;
                if (args) {
                    var item = args.item;
                    var value = item.value;
                    if (value == 0) {
                        $('#edSum1').val('');
                        $('#edSum2').val('');
                    }
                    if (value == 1) {
                        console.log('!!!');
                        $('#edSum1').val(7500);
                        $('#edSum2').val('');
                    }
                    
                    if (value == 2) {
                        $('#edSum1').val();
                        $('#edSum2').val(7500);
                    }
                }
            });
            $("#cmbVIP").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: [{id: 0, name: 'Все'}, {id: 1, name: 'ВИП'}, {id: 2, name: 'Не ВИП'}], displayMember: "name", valueMember: "id", width: 200 }));
            $("#DateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, value: DS, formatString: 'dd.MM.yyyy' }));
            $("#DateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, value: DE, formatString: 'dd.MM.yyyy' }));
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

<div class="al-row" style="height: 35px;">
    <div class="al-row-column">Направление:</div>
    <div class="al-row-column"><div id='cmbEventType' name="Parameters[p_evtp]"></div></div>
</div>
<div class="al-row" style="height: 35px;">
    <div class="al-row-column">Исполнитель:</div>
    <div class="al-row-column"><div id='cmbExecutor' name="Parameters[p_empl]"></div></div>
</div>
<div class="al-row" style="height: 35px;">
    <div class="al-row-column">Участок:</div>
    <div class="al-row-column"><div id='cmbTerrit' name="Parameters[p_territ]"></div></div>
</div>
<div class="al-row" style="height: 35px;">
    <div class="al-row-column">ВИП:</div>
    <div class="al-row-column"><div id='cmbVIP'></div></div>
    <input type="hidden" id="edSum1" name="Parameters[p_sum1]" />
    <input type="hidden" id="edSum2" name="Parameters[p_sum2]" />
</div>
    
<div class="al-row" style="height: 35px;">
    <div class="al-row-column">Период с</div>
    <div class="al-row-column"><div id='DateStart' name="Parameters[p_datestart]"></div></div>
    <div class="al-row-column">по</div>
    <div class="row-column"><div id='DateEnd' name="Parameters[p_dateend]"></div></div>
</div>
    
   
    





<div style="clear: both; margin-top: 10px;"></div>
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>


