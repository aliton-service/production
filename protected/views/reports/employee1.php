<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
            var DataPositions = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourcePositions));
            var DataMonths = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceMonths));
            var DataJuridicals = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceJuridicalsMin));
            var DataDepartments = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDepartments));
            
            var CheckBox1Change = function(Checked) {
                $("#edDateStart").jqxDateTimeInput({readonly: true, showCalendarButton: false, allowKeyboardDelete: false, value: null});
                $("#edDateEnd").jqxDateTimeInput({readonly: true, showCalendarButton: false, allowKeyboardDelete: false, value: null});
                if (Checked) {
                    $("#edDateStart").jqxDateTimeInput({readonly: false, showCalendarButton: true, allowKeyboardDelete: true, value: null});
                    $("#edDateEnd").jqxDateTimeInput({readonly: false, showCalendarButton: true, allowKeyboardDelete: true, value: null});
                }
            };
            
            var CheckBox2Change = function(Checked) {
                $("#edDismissalFrom").jqxDateTimeInput({readonly: true, showCalendarButton: false, allowKeyboardDelete: false, value: null});
                $("#edDismissalTo").jqxDateTimeInput({readonly: true, showCalendarButton: false, allowKeyboardDelete: false, value: null});
                if (Checked) {
                    $("#edDismissalFrom").jqxDateTimeInput({readonly: false, showCalendarButton: true, allowKeyboardDelete: true, value: null});
                    $("#edDismissalTo").jqxDateTimeInput({readonly: false, showCalendarButton: true, allowKeyboardDelete: true, value: null});
                }
            };
            
            $("#edPosition").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataPositions, width: '290', height: '25px', displayMember: "PositionName", valueMember: "Position_id"}));
            $("#edMonth").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataMonths, width: '150', height: '25px', displayMember: "Month_name", valueMember: "Month_id"}));
            $("#edJuridical").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataJuridicals, width: '150', height: '25px', displayMember: "JuridicalPerson", valueMember: "Jrdc_Id"}));
            $("#edDep").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataDepartments, width: '150', height: '25px', displayMember: "DepName", valueMember: "Dep_id"}));
            $("#edAllDateStart").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: '250'}));
            $("#edDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: null }));
            $("#edDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: null }));
            $("#edAllDismissal").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: '250'}));
            $("#edDismissalFrom").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: null }));
            $("#edDismissalTo").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: null }));
            $('#edAllDateStart').on('change', function (event) {
                var Checked = event.args.checked;
                CheckBox1Change(Checked);
            });
            $('#edAllDismissal').on('change', function (event) {
                var Checked = event.args.checked;
                CheckBox2Change(Checked);
            });
            
            CheckBox1Change(false);
            CheckBox2Change(false);

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
            <div class="row-column" style="width: 130px">Должность:</div>
            <div class="row-column"><div id="edPosition" name="Parameters[prmPosition]"></div></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 130px">Дата рождения:</div>
            <div class="row-column"><div id="edMonth" name="Parameters[prmMonth]"></div></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 130px">Юр. лицо:</div>
            <div class="row-column"><div id="edJuridical" name="Parameters[prmJuridical]"></div></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 130px">Отдел:</div>
            <div class="row-column"><div id="edDep" name="Parameters[prmDep]"></div></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 130px"><div id='edAllDateStart' name="Parameters[prmAllDateStart]" >Учитывать дату приема</div></div>
        </div>
        <div class="row">
            <div class="row-column">от:</div>
            <div class="row-column" ><div id='edDateStart' name="Parameters[prmDateStart]" ></div></div>
            <div class="row-column">до:</div>
            <div class="row-column" ><div id='edDateEnd' name="Parameters[prmDateEnd]" ></div></div>
        </div>
        <div class="row">
            <div class="row-column" style="width: 130px"><div id='edAllDismissal' name="Parameters[prmAllDismissal]" >Учитывать дату увольнения</div></div>
        </div>
        <div class="row">
            <div class="row-column">от:</div>
            <div class="row-column" ><div id='edDismissalFrom' name="Parameters[prmDismissalFrom]" ></div></div>
            <div class="row-column">до:</div>
            <div class="row-column" ><div id='edDismissalTo' name="Parameters[prmDismissalTo]" ></div></div>
        </div>
        <div style="clear: both; margin-top: 10px;"></div>
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>

