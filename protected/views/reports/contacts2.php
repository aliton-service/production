<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
            var DataKinds = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContactKinds));
            var DataContactTypes = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContactTypes));
            var DataPropForms = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceOrganizationsVMin));
            var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees));
            var DataAddress = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListAddresses));
            
            
            
            NewDate = new Date();
            var Month = NewDate.getMonth();
            var Year = NewDate.getFullYear();
            var NewDate = new Date(Year, Month, 1);
            
            $("#edKind").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataKinds, width: '290', height: '25px', displayMember: "Kind_name", valueMember: "Kind_id"}));
            $("#edCntp").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataContactTypes, width: '290', height: '25px', displayMember: "ContactName", valueMember: "Contact_id"}));
            $("#edDebt").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: '250', checked: true}));
            $("#edForm").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataPropForms, width: '290', height: '25px', displayMember: "FullName", valueMember: "Form_id"}));
            $("#edEmpl").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, width: '290', height: '25px', displayMember: "EmployeeName", valueMember: "Employee_id"}));
            $("#edAddress").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataAddress, width: '290', height: '25px', displayMember: "Addr", valueMember: "Address_id"}));
            
            $("#edDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: NewDate, formatString: 'dd.MM.yyyy'}));
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
        <div class="row">
            <div class="row-column" style="width: 130px">Тема:</div>
            <div class="row-column"><div id="edKind" name="Parameters[prmKind]"></div></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 130px">Тип:</div>
            <div class="row-column"><div id="edCntp" name="Parameters[prmCntp]"></div></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 130px"><div id='edDebt' name="Parameters[prmDebt]" >Только должники</div></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 130px">Организация:</div>
            <div class="row-column"><div id="edForm" name="Parameters[prmForm]"></div></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 130px">Сотрудник:</div>
            <div class="row-column"><div id="edEmpl" name="Parameters[prmEmpl]"></div></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 130px">Адрес:</div>
            <div class="row-column"><div id="edAddress" name="Parameters[prmAddress]"></div></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 130px">Период:</div>
        </div>
        <div class="row">
            <div class="row-column">от:</div>
            <div class="row-column" ><div id='edDateStart' name="Parameters[prmDateStart]" ></div></div>
            <div class="row-column">до:</div>
            <div class="row-column" ><div id='edDateEnd' name="Parameters[prmDateEnd]" ></div></div>
        </div>
        
        <div style="clear: both; margin-top: 10px;"></div>
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>

