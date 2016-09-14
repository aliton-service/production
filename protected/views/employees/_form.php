<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var Employee = {
            Employee_id: <?php echo json_encode($model->Employee_id); ?>,
            EmployeeName: <?php echo json_encode($model->EmployeeName); ?>,
            Position_id: <?php echo json_encode($model->Position_id); ?>,
            DateEnd: Aliton.DateConvertToJs('<?php echo $model->DateEnd; ?>'),
            DateStart: Aliton.DateConvertToJs('<?php echo $model->DateStart; ?>'),
            Birthday: Aliton.DateConvertToJs('<?php echo $model->Birthday; ?>'),
            CerDateIn: Aliton.DateConvertToJs('<?php echo $model->CerDateIn; ?>'),
            CerDateOut: Aliton.DateConvertToJs('<?php echo $model->CerDateOut; ?>'),
            DateBegin: Aliton.DateConvertToJs('<?php echo $model->DateBegin; ?>'),
            Jrdc_id: <?php echo json_encode($model->Jrdc_id); ?>,
            Section_id: <?php echo json_encode($model->Section_id); ?>,
            Dep_id: <?php echo json_encode($model->Dep_id); ?>,
            Territ_Id: <?php echo json_encode($model->Territ_Id); ?>,
            Region_id: <?php echo json_encode($model->Region_id); ?>,
            Tel_home: <?php echo json_encode($model->Tel_home); ?>,
            Tel_other: <?php echo json_encode($model->Tel_other); ?>,
            Tel_work: <?php echo json_encode($model->Tel_work); ?>,
            WorkEmail: <?php echo json_encode($model->WorkEmail); ?>,
            Email: <?php echo json_encode($model->Email); ?>,
            DateTrial: Aliton.DateConvertToJs('<?php echo $model->DateTrial; ?>'),
            Address: <?php echo json_encode($model->Address); ?>,
            Prior_result: Aliton.DateConvertToJs('<?php echo $model->Prior_result; ?>'),
            BypassList: Aliton.DateConvertToJs('<?php echo $model->BypassList; ?>'),
            Date_motivation: Aliton.DateConvertToJs('<?php echo $model->Date_motivation; ?>'),
            Area_id: <?php echo json_encode($model->Area_id); ?>,
            Street_id: <?php echo json_encode($model->Street_id); ?>,
            House: <?php echo json_encode($model->House); ?>,
            Corp: <?php echo json_encode($model->Corp); ?>,
            Apartment: <?php echo json_encode($model->Apartment); ?>,
            Documents: <?php echo json_encode($model->Documents); ?>,
            Note: <?php echo json_encode($model->Note); ?>,
            Information: <?php echo json_encode($model->Information); ?>,
        };
        
        var DataPositions = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourcePositions));
        var DataJuridiclas = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceJuridicalsMin));
        var DataSections = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceSections));
        var DataDepartments = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDepartments));
        var DataTerritory = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceTerritory, {async: false}));
        var DataRegions = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListRegionsMin));
        var DataAreas = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceAreas));
        var DataStreets = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceStreets, {async: false}), {
            beforeLoadComplete: function (records) {
                var value = Employee.Region_id;
                var filteredRecords = new Array();
                for (var i = 0; i < records.length; i++) {
                    if (records[i].Region_id == parseInt(value)) 
                        filteredRecords.push(records[i]);
                }
                return filteredRecords;
            }
        });
        
        $("#edEmployeeName").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "ФИО", width: 400}));
        $("#edPosition").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataPositions, width: '290', height: '25px', displayMember: "PositionName", valueMember: "Position_id"}));
        $("#edDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Employee.DateEnd, formatString: 'dd.MM.yyyy',}));
        $("#edDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Employee.DateStart, formatString: 'dd.MM.yyyy',}));
        $("#edBirthday").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Employee.Birthday, formatString: 'dd.MM.yyyy',}));
        $("#edJuridicalPerson").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataJuridiclas, width: '290', height: '25px', displayMember: "JuridicalPerson", valueMember: "Jrdc_Id"}));
        $("#edCerDateIn").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Employee.CerDateIn, formatString: 'dd.MM.yyyy',}));
        $("#edDateBegin").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Employee.DateBegin, formatString: 'dd.MM.yyyy',}));
        $("#edCerDateOut").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Employee.CerDateOut, formatString: 'dd.MM.yyyy',}));
        $("#edSection").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSections, width: '180', height: '25px', displayMember: "SectionName", valueMember: "Section_id"}));
        $("#edDepartment").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataDepartments, width: '180', height: '25px', displayMember: "DepName", valueMember: "Dep_id"}));
        $("#edTerrit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataTerritory, width: '180', height: '25px', displayMember: "Territ_Name", valueMember: "Territ_Id"}));
        $("#edTelHomeEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Дом. тел.", width: 200}));
        $("#edTelOtherEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Другие тел.", width: 200}));
        $("#edTelWorkEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Рабочий тел.", width: 200}));
        $("#edWorkEmailEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Рабочий E-mail", width: 200}));
        $("#edEmailEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Личный E-mail", width: 200}));
        $("#edDateTrial").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Employee.DateTrial, formatString: 'dd.MM.yyyy',}));
        $("#edAddressEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Адрес", width: 335}));
        $("#edPriorResult").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Employee.Prior_result, formatString: 'dd.MM.yyyy',}));
        $("#edBypassList").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Employee.BypassList, formatString: 'dd.MM.yyyy',}));
        $("#edDate_motivation").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Employee.Date_motivation, formatString: 'dd.MM.yyyy',}));
        $("#edRegion").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataRegions, width: '100', height: '25px', displayMember: "RegionName", valueMember: "Region_id"}));
        $("#edArea").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataAreas, width: '100', height: '25px', displayMember: "AreaName", valueMember: "Area_id"}));
        $("#edStreet").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataStreets, width: '180', height: '25px', displayMember: "StreetName", valueMember: "Street_id"}));
        $("#edHouse").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Дом", width: 80}));
        $("#edCorp").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Корпус", width: 80}));
        $("#edApartment").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Помещение", width: 80}));
        $('#edNoteEdit').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { placeHolder: '', height: 50, width: 230, minLength: 1}));
        $('#edDocumentsEdit').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { placeHolder: '', height: 50, width: 580, minLength: 1}));
        $('#edInformationEdit').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { placeHolder: '', height: 50, width: 230, minLength: 1}));
        $('#btnSaveEmpl').jqxButton({ width: 120, height: 30 });
        $('#btnCancelEmpl').jqxButton({ width: 120, height: 30 });
        
        if (Employee.EmployeeName != '') $("#edEmployeeName").jqxInput('val', Employee.EmployeeName);
        if (Employee.Position_id != '') $("#edPosition").jqxComboBox('val', Employee.Position_id);
        if (Employee.Jrdc_id != '') $("#edJuridicalPerson").jqxComboBox('val', Employee.Jrdc_id);
        if (Employee.Section_id != '') $("#edSection").jqxComboBox('val', Employee.Section_id);
        if (Employee.Dep_id != '') $("#edDepartment").jqxComboBox('val', Employee.Dep_id);
        if (Employee.Territ_Id != '') $("#edTerrit").jqxComboBox('val', Employee.Territ_Id);
        if (Employee.Tel_home != '') $("#edTelHomeEdit").jqxInput('val', Employee.Tel_home);
        if (Employee.Tel_other != '') $("#edTelOtherEdit").jqxInput('val', Employee.Tel_other);
        if (Employee.Tel_work != '') $("#edTelWorkEdit").jqxInput('val', Employee.Tel_work);
        if (Employee.WorkEmail != '') $("#edWorkEmailEdit").jqxInput('val', Employee.WorkEmail);
        if (Employee.Email != '') $("#edEmailEdit").jqxInput('val', Employee.Email);
        if (Employee.Address != '') $("#edAddressEdit").jqxInput('val', Employee.Address);
        if (Employee.Region_id != '') $("#edRegion").jqxComboBox('val', Employee.Region_id);
        if (Employee.Area_id != '') $("#edArea").jqxComboBox('val', Employee.Area_id);
        if (Employee.Street_id != '') $("#edStreet").jqxComboBox('val', Employee.Street_id);
        if (Employee.House != '') $("#edHouse").jqxInput('val', Employee.House);
        if (Employee.Corp != '') $("#edCorp").jqxInput('val', Employee.Corp);
        if (Employee.Apartment != '') $("#edApartment").jqxInput('val', Employee.Apartment);
        if (Employee.Documents != '') $("#edDocumentsEdit").jqxTextArea('val', Employee.Documents);
        if (Employee.Note != '') $("#edNoteEdit").jqxTextArea('val', Employee.Note);
        if (Employee.Information != '') $("#edInformationEdit").jqxTextArea('val', Employee.Information);
        
        $("#edRegion").bind('select', function(event)
        {
            if (event.args) {
                $("#edStreet").jqxComboBox({ disabled: false, selectedIndex: -1});		
                if (event.args.item !== null) {
                    var value = event.args.item.value;
                    //Sources.SourceSystemTypes.data = {DSystem_id: value};
                    DataStreets = new $.jqx.dataAdapter(Sources.SourceStreets, {
                        beforeLoadComplete: function (records) {
                            var filteredRecords = new Array();
                            for (var i = 0; i < records.length; i++) {
                                if (records[i].Region_id == value)
                                    filteredRecords.push(records[i]);
                            }
                            return filteredRecords;
                        }
                    });
                    $("#edStreet").jqxComboBox({source: DataStreets, autoDropDownHeight: false});
                    $("#edStreet").jqxComboBox('selectIndex', 0);
                }
            }
        }); 
        $('#btnCancelEmpl').on('click', function(){
            $('#EmployeesDialog').jqxWindow('close');
        });
        $('#btnSaveEmpl').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('Employees/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('Employees/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#Employees').serialize(),
                type: 'POST',
                success: function(Res) {
                    if (Res == '1') {
                        $('#EmployeesDialog').jqxWindow('close');
                        $('#btnRefreshEmpl').click();
                    }
                    else
                        $('#BodyEmployeesDialog').html(Res);
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
    });
</script>

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'Employees',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<input type="hidden" name="Employees[Employee_id]" value="<?php echo $model->Employee_id; ?>"/>

<div class="row">
    <div class="row-column">Сотрудник (ФИО):</div>
    <div class="row-column"><input type="text" name="Employees[EmployeeName]" id="edEmployeeName"/><?php echo $form->error($model, 'EmployeeName'); ?></div>
</div>
<div class="row">
    <div class="row-column">Должность:</div>
    <div class="row-column"><div name="Employees[Position_id]" id="edPosition"></div></div>
    <div class="row-column" style="float: right;"><div name="Employees[DateEnd]" id="edDateEnd"></div></div>
    <div class="row-column" style="float: right;">Дата увольнения:</div>
</div>
<div class="row">
    <div class="row-column">Дата приема:</div>
    <div class="row-column"><div name="Employees[DateStart]" id="edDateStart"></div></div>
    <div class="row-column" style="float: right;"><div name="Employees[Birthday]" id="edBirthday"></div></div>
    <div class="row-column" style="float: right;">Дата рождения:</div>
</div>
<div class="row">
    <div class="row-column">Юр. лицо:</div>
    <div class="row-column"><div name="Employees[Jrdc_id]" id="edJuridicalPerson"></div></div>
    <div class="row-column" style="float: right;"><div name="Employees[CerDateIn]" id="edCerDateIn"></div></div>
    <div class="row-column" style="float: right;">Дата выдачи удост.:</div>
</div>
<div class="row">
    <div class="row-column">Дата приема на постоянную работу:</div>
    <div class="row-column"><div name="Employees[DateBegin]" id="edDateBegin"></div></div>
    <div class="row-column" style="float: right;"><div name="Employees[CerDateOut]" id="edCerDateOut"></div></div>
    <div class="row-column" style="float: right;">Дата сдачи удост.:</div>
</div>    
<div class="row">
    <div class="row-column">Служба:</div>
    <div class="row-column"><div name="Employees[Section_id]" id="edSection"></div></div>
    <div class="row-column">Отдел:</div>
    <div class="row-column"><div name="Employees[Dep_id]" id="edDepartment"></div></div>
</div>
<div class="row">
    <div class="row-column">Участок:</div>
    <div class="row-column"><div name="Employees[Territ_Id]" id="edTerrit"></div></div>
    <div class="row-column">Дом. тел.:</div>
    <div class="row-column"><input type="text" name="Employees[Tel_home]" id="edTelHomeEdit"/></div>
</div>
<div class="row">
    <div class="row-column">Другие тел.:</div>
    <div class="row-column"><input name="Employees[Tel_other]" id="edTelOtherEdit" /></div>
    <div class="row-column">Раб. тел.:</div>
    <div class="row-column"><input name="Employees[Tel_work]" id="edTelWorkEdit" /></div>
</div>
<div class="row">
    <div class="row-column">Раб. E-mail:</div>
    <div class="row-column"><input name="Employees[WorkEmail]" id="edWorkEmailEdit" /></div>
    <div class="row-column">Личный E-mail:</div>
    <div class="row-column"><input name="Employees[Email]" id="edEmailEdit" /></div>
</div>
<div class="row">
    <div class="row-column">Дата окон. исп. срока:</div>
    <div class="row-column"><div name="Employees[DateTrial]" id="edDateTrial"></div></div>
    <div class="row-column">Адрес</div>
    <div class="row-column"><input name="Employees[Address]" id="edAddressEdit" /></div>
</div>
<div class="row">
    <div class="row-column" style="width: 220px;">Предварительные итоги</div>
    <div class="row-column" style="width: 220px;">Подписание обходного листа</div>
    <div class="row-column" style="width: 220px; float: right;">Система мотивации</div>
</div>
<div class="row" style="margin: 0px;">
    <div class="row-column" style="width: 220px;"><div name="Employees[Prior_result]" id="edPriorResult"></div></div>
    <div class="row-column" style="width: 220px;"><div name="Employees[BypassList]" id="edBypassList"></div></div>
    <div class="row-column" style="width: 220px; float: right;"><div name="Employees[Date_motivation]" id="edDate_motivation"></div></div>
</div> 
<div class="row" style="margin: 0px;">
    <div class="row-column" style="width: 100px;">Регион</div>
    <div class="row-column" style="width: 100px;">Район</div>
    <div class="row-column" style="width: 180px;">Улица</div>
    <div class="row-column" style="width: 80px;">Дом</div>
    <div class="row-column" style="width: 80px;">Корпус</div>
    <div class="row-column" style="width: 80px;">Помещение</div>
</div>
<div class="row" style="margin: 0px;">
    <div class="row-column" style="width: 100px;"><div name="Employees[Region_id]" id="edRegion"></div></div>
    <div class="row-column" style="width: 100px;"><div name="Employees[Area_id]" id="edArea"></div></div>
    <div class="row-column" style="width: 180px;"><div name="Employees[Street_id]" id="edStreet"></div></div>
    <div class="row-column" style="width: 80px;"><input name="Employees[House]" id="edHouse" /></div>
    <div class="row-column" style="width: 80px;"><input name="Employees[Corp]" id="edCorp" /></div>
    <div class="row-column" style="width: 80px;"><input name="Employees[Apartment]" id="edApartment" /></div>
</div>
<div class="row">
    <div class="row-column" style="width: 100px;">Документы:</div>
    <div class="row-column"><textarea id="edDocumentsEdit" name="Employees[Documents]"></textarea></div>
</div> 
<div class="row" style="margin: 0px;">
    <div class="row-column" style="width: 100px;">Примечание:</div>
    <div class="row-column"><textarea id="edNoteEdit" name="Employees[Note]"></textarea></div>
    <div class="row-column" style="width: 100px;">Информация:</div>
    <div class="row-column"><textarea id="edInformationEdit" name="Employees[Information]"></textarea></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveEmpl'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelEmpl'/></div>
</div>
<?php $this->endWidget(); ?>