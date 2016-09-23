<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
            var DataAddressList = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListAddresses));
            var DataServiceTypes = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceServiceTypes));
            var DataExec = [{id: 1, name: 'Все'}, {id: 2, name: 'Проводились по ВЦКП'}, {id: 3, name: 'Не проводились'}];
            var DateStart = new Date();
            var Month = DateStart.getMonth();
            var Year = DateStart.getFullYear();
            var DateStart = new Date(Year, Month, 1);
            var CheckBox1Change = function(Checked) {
                $("#edDateStart").jqxDateTimeInput({readonly: true, showCalendarButton: false, allowKeyboardDelete: false, value: null});
                $("#edDateEnd").jqxDateTimeInput({readonly: true, showCalendarButton: false, allowKeyboardDelete: false, value: null});
                if (Checked) {
                    $("#edDateStart").jqxDateTimeInput({readonly: false, showCalendarButton: true, allowKeyboardDelete: true, value: null});
                    $("#edDateEnd").jqxDateTimeInput({readonly: false, showCalendarButton: true, allowKeyboardDelete: true, value: null});
                }
            };
            
            $('#edAllDateStart').on('change', function (event) {
                var Checked = event.args.checked;
                CheckBox1Change(Checked);
            });
            
            $("#edAddress").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataAddressList, width: '290', height: '25px', displayMember: "Addr", valueMember: "Address_id"}));
            $("#edServiceType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataServiceTypes, width: '290', height: '25px', displayMember: "ServiceType", valueMember: "ServiceType_id"}));
            $("#edNumber").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 100}));
            $("#edExec").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataExec, width: '190', height: '25px', displayMember: "name", valueMember: "id"}));
            $("#edAllDateStart").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: '250'}));
            $("#edDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: null, formatString: 'dd.MM.yyyy' }));
            $("#edDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: null, formatString: 'dd.MM.yyyy' }));
            $("#edAllDateStart").jqxCheckBox({checked: true});
            $("#edDateStart").jqxDateTimeInput('val', DateStart);
            $("#edDateEnd").jqxDateTimeInput('val', Date());
           // CheckBox1Change(true);
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
            <div class="row-column" style="width: 130px">Объект:</div>
            <div class="row-column"><div id="edAddress" name="Parameters[prmAddress]"></div></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 130px">Тариф:</div>
            <div class="row-column"><div id="edServiceType" name="Parameters[prmServiceType]"></div></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 130px">Номер:</div>
            <div class="row-column"><input id="edNumber" name="Parameters[prmContrNumS]" /></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 130px">Проведение по ВЦКП:</div>
            <div class="row-column"><div id="edExec" name="Parameters[prmDateExec]"></div></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 130px"><div id='edAllDateStart' name="Parameters[prmAllDate]" >Учитывать дату приема</div></div>
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

