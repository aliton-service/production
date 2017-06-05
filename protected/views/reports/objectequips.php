<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
            var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees));
            var DataAddress = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListAddresses));
            var DataTerrits = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceTerritory));
            var DataEquips = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEquipsMin, {async: true}));
            var DataSuppliers = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListSuppliersMin));
            
            $("#edMaster").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, width: '290', height: '25px', displayMember: "EmployeeName", valueMember: "Employee_id"}));
            $("#edAddress").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataAddress, width: '290', height: '25px', displayMember: "Addr", valueMember: "Address_id"}));
            $("#edTerrit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataTerrits, width: '290', height: '25px', displayMember: "Territ_Name", valueMember: "Territ_Id"}));
            $("#edInv").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: '250'}));
            $("#edInv").jqxCheckBox({checked: false});
            $("#edDoorway").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: '250'}));
            $("#edDoorway").jqxCheckBox({checked: true});
            $("#edEquipName").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 200}));
            $("#edEquip").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEquips, width: '290', height: '25px', displayMember: "EquipName", valueMember: "Equip_id"}));
            $("#edSupplier").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSuppliers, width: '290', height: '25px', displayMember: "NameSupplier", valueMember: "Supplier_id"}));
        }
    });
</script>    

<?php
    $this->ReportName = $ReportName;
?>

<div id="panel_controls">

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
            <div class="row-column" style="width: 130px">Мастер:</div>
            <div class="row-column"><div id="edMaster" name="Parameters[prmMaster]"></div></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 130px">Объект:</div>
            <div class="row-column"><div id="edAddress" name="Parameters[prmAddress]"></div></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 130px">Участок:</div>
            <div class="row-column"><div id="edTerrit" name="Parameters[prmTerrit]"></div></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 130px"><div id='edInv' name="Parameters[prmInventory]" >Для инвентаризации</div></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 130px"><div id='edDoorway' name="Parameters[prmDoorway]" >Учитывать общедомовое оборудование</div></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 230px">Поиск по наименованию оборудования:</div>
            <div class="row-column"><input id="edEquipName" name="Parameters[prmEquipName]" /></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 130px">Оборудование:</div>
            <div class="row-column"><div id="edEquip" name="Parameters[prmEquip]"></div></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 130px">Производитель:</div>
            <div class="row-column"><div id="edSupplier" name="Parameters[prmSupplier]"></div></div>
        </div>
        <div style="clear: both; margin-top: 10px;"></div>
    
<?php        
        $this->endWidget();
    }
    echo '</div>';
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>



