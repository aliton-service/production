<script type="text/javascript">
        $(document).ready(function () {
            var OGSystems = {
                SystemType_Id: '<?php echo $model->Sttp_id; ?>',
                Availability: '<?php echo $model->Availability_id; ?>',
                Count: '<?php echo $model->Count; ?>',
            };
            
            var DataSystemTypes = new $.jqx.dataAdapter(Sources.SourceSystemTypesMin);
            var DataSystemAvailabilitys = new $.jqx.dataAdapter(Sources.SourceSystemAvailabilitys);
            
            $("#SystemType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSystemTypes, displayMember: "SystemTypeName", valueMember: "SystemType_Id", width:300 }));;
            $("#Availability").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSystemAvailabilitys, displayMember: "availability", valueMember: "code_id", width:200, autoDropDownHeight: true }));;
            $("#Count").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 100}));
            
            
            var countries = new Array("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic", "Congo, Republic of the", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Greenland", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Mongolia", "Morocco", "Monaco", "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Samoa", "San Marino", " Sao Tome", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe");
            // Create a jqxComboBox
            $("#jqxComboBox").jqxComboBox({source: countries, multiSelect: true, width: 350, height: 25});           
            $("#jqxComboBox").jqxComboBox('selectItem', 'United States');
            $("#jqxComboBox").jqxComboBox('selectItem', 'Germany');
            $("#arrow").jqxButton({  });
            $("#arrow").click(function () {
                $("#jqxComboBox").jqxComboBox({ showArrow: false });
            });

                
            if (OGSystems.SystemType_Id != '') $("#SystemType").jqxComboBox('val', OGSystems.SystemType_Id);
            if (OGSystems.Availability != '') $("#Availability").jqxComboBox('val', OGSystems.Availability);
            if (OGSystems.Count != '') $("#Count").jqxInput('val', OGSystems.Count);
            
            
        });
</script>        
<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'ObjectsGroupSystems',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>
  
<div class="row"><div class="row-column">Тип системы: <div id='SystemType' name="ObjectsGroupSystems[Sttp_id]"></div><?php echo $form->error($model, 'Sttp_id'); ?></div></div>  
<div class="row">
    <div class="row-column">Наличие: <div id='Availability' name="ObjectsGroupSystems[Availability_id]"></div><?php echo $form->error($model, 'Availability_id'); ?></div>  
    <div class="row-column">Кол-во систем: <br><input id="Count" name="ObjectsGroupSystems[Count]" type="text"><?php echo $form->error($model, 'Count'); ?></div>
</div>  

<?php $this->endWidget(); ?>