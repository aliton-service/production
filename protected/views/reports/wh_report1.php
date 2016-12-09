<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
            var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {}));
            var DataEquips = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEquipsMin, {async: true}));
            var DataTerrits = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceTerritory, {async: true}));
            var DataAddress = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListAddresses, {async: true}));
            
            var DS = new Date();
            var DE = new Date();
            DS.setMonth(DS.getMonth()-1);
            
            $("#edMaster").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, width: '290', height: '25px', displayMember: "EmployeeName", valueMember: "Employee_id"}));
            $("#edEquip").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEquips, width: '290', height: '25px', displayMember: "EquipName", valueMember: "Equip_id"}));
            $("#edTop").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, decimalDigits: 0, value: 1000, max: 2000, min: 1}));
            $("#edTerrit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataTerrits, width: '200', height: '25px', displayMember: "Territ_Name", valueMember: "Territ_Id"}));
            $("#edPriceStart").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, decimalDigits: 0}));
            $("#edPriceEnd").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {value: 9999999, width: 100, decimalDigits: 0 }));
            $("#edReceiptNumber").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 200 }));
            $("#edReceiptDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: null, width: 110, formatString: 'dd.MM.yyyy' }));
            $("#edReceiptDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: null, width: 110, formatString: 'dd.MM.yyyy' }));
            $("#edAddress").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataAddress, width: '350', height: '25px', displayMember: "Addr", valueMember: "Object_id"}));
            $("#edAcDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: DS, width: 110, formatString: 'dd.MM.yyyy' }));
            $("#edAcDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: DE, width: 110, formatString: 'dd.MM.yyyy' }));
            
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
        <input type="hidden" name="Parameters[p_quant]" value="1"/>
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
            <div class="al-row-column"><div id="edEquip" name="Parameters[p_eqip_id]"></div></div>
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
            <div class="al-row-column"><input id="edReceiptNumber" name="Parameters[p_receiptnum]"/></div>
            <div class="al-row-column">Дата с:</div>
            <div class="al-row-column" ><div id='edReceiptDateStart' name="Parameters[p_receiptdate_start]" ></div></div>
            <div class="al-row-column">по:</div>
            <div class="al-row-column" ><div id='edReceiptDateEnd' name="Parameters[p_receiptdate_end]" ></div></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 130px">Объект:</div>
            <div class="al-row-column"><div id="edAddress" name="Parameters[p_object_id]"></div></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 130px">Период с:</div>
            <div class="al-row-column"><div id="edAcDateStart" name="Parameters[p_acdate_start]"></div></div>
            <div class="al-row-column" >по</div>
            <div class="al-row-column"><div id="edAcDateEnd" name="Parameters[p_acdate_end]"></div></div>
            <div style="clear: both"></div>
        </div>
        <div style="clear: both; margin-top: 10px;"></div>
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>



