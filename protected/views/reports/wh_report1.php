<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
            var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {}));
            var DataEquips = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEquipsMin, {async: true}));
            var DataTerrits = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceTerritory, {async: true}));
            
            $("#edMaster").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, width: '290', height: '25px', displayMember: "EmployeeName", valueMember: "Employee_id"}));
            $("#edEquip").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEquips, width: '290', height: '25px', displayMember: "EquipName", valueMember: "Equip_id"}));
            $("#edDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: null }));
            $("#edTop").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, decimalDigits: 0, value: 1000, max: 2000, min: 1}));
            $("#edTerrit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataTerrits, width: '200', height: '25px', displayMember: "Territ_Name", valueMember: "Territ_Id"}));
            $("#edPriceStart").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, decimalDigits: 0}));
            $("#edPriceEnd").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, decimalDigits: 0 }));
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
        <div class="al-row">
            <div class="al-row-column">Первые</div>
            <div class="al-row-column"><div id="edTop" name="Parameters[p_top]"></div></div>
            <div class="al-row-column">записей</div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 130px">Затребовал:</div>
            <div class="al-row-column"><div id="edMaster" name="Parameters[p_empl_id]"></div></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 130px">Участок:</div>
            <div class="al-row-column"><div id="edTerrit" name="Parameters[p_territ_id]"></div></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 130px">Оборудование:</div>
            <div class="al-row-column"><div id="edEquip" name="Parameters[prmEquip]"></div></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 130px">Стоимость от:</div>
            <div class="al-row-column"><div id="edPriceStart" name="Parameters[p_pricelow_start]"></div></div>
            <div class="al-row-column" >до</div>
            <div class="al-row-column"><div id="edPriceEnd" name="Parameters[p_pricelow_end]"></div></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 130px">Основание:</div>
            <div class="al-row-column"><div id="edEquip" name="Parameters[prmEquip]"></div></div>
            <div style="clear: both"></div>
        </div>
        <div class="row">
            <div class="row-column">На дату:</div>
            <div class="row-column" ><div id='edDateEnd' name="Parameters[prmDateEnd]" ></div></div>
        </div>
        <div style="clear: both; margin-top: 10px;"></div>
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>



