<script>
    $(document).ready(function () {
        // Инициализация источников данных
        var DataEmployees = new $.jqx.dataAdapter(Sources.SourceListEmployees);
        var DataDemandTypes = new $.jqx.dataAdapter(Sources.SourceDemandTypes);
        var DataStreets = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceStreets, {async: false}));
        var DataTerritory = new $.jqx.dataAdapter(Sources.SourceTerritory);
        
        // Инициализируем контролы фильтров
        $("#cmbMaster").jqxComboBox({ source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}); // Фильтр по мастеру
        $("#chbNotDateExec").jqxCheckBox({ width: 160, height: 25, checked: true}); // Фильтр невыполненные
        $("#chbNotDateMaster").jqxCheckBox({ width: 160, height: 25, checked: false}); // Фильтр непереданные
        $("#chbNotWorkedOut").jqxCheckBox({ width: 160, height: 25, checked: false}); // Фильтр неотработанные
        $("#edDemand_id").jqxInput({height: 25, width: 200, minLength: 1}); // Фильтр номер
        $("#edDate").jqxDateTimeInput({ width: '180px', height: '25px', formatString: 'dd.MM.yyyy HH:mm', value: null, readonly: false}); // Фильтр дата регистрации
        $("#cmbDemandType").jqxComboBox({ source: DataDemandTypes, width: '200', height: '25px', displayMember: "DemandType", valueMember: "DemandType_id"}); // Фильтр тип заявки
        $("#cmbExecutor").jqxComboBox({ source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}); // Фильтр исполнитель
        $("#edAddr").jqxInput({height: 25, width: 200, minLength: 1}); // Фильтр по адресу
        $("#cmbTerrit").jqxComboBox({ source: DataTerritory, width: '200', height: '25px', displayMember: "Territ_Name", valueMember: "Territ_Id"}); // Фильтр участок
        $("#cmbStreet").jqxComboBox({ source: DataStreets, width: '200', height: '25px', displayMember: "StreetName", valueMember: "Street_id"}); // Фильтр улицы
        $("#edHouse").jqxInput({height: 25, width: 60, minLength: 1}); // Фильтр ДОМ
        $("#edDateStart").jqxDateTimeInput({ width: '180px', height: '25px', formatString: 'dd.MM.yyyy', value: null, readonly: false}); // Фильтр дата рег.
        $("#edDateEnd").jqxDateTimeInput({ width: '180px', height: '25px', formatString: 'dd.MM.yyyy', value: null, readonly: false}); // Фильтр дата рег
        
    });
</script>

<div>Мастер</div>
<div><div id='cmbMaster'><?php echo $Filters2['Master']; ?></div></div>
<div id='chbNotDateMaster'>Непереданные</div>
<div id='chbNotDateExec'>Невыполненные</div>
<div id='chbNotWorkedOut'>Неотработанные</div>
<div>Номер</div>
<div><input name="Demands[Demand_id]" id="edDemand_id" type="text" value="<?php echo $Filters2['Demand_id'];?>"/></div>
<div>Дата регистрации</div>
<div><div id='edDate' name="Demands[DateReg]"></div></div>
<div>Тип заявки</div>
<div id='cmbDemandType' name="Demands[DType_id]"><?php echo $Filters2['DemandType_id']; ?></div>
<div>Исполнитель</div>
<div><div id='cmbExecutor'><?php echo $Filters2['Executor']; ?></div></div>
<div>Адрес</div>
<div><input id="edAddr" type="text" /></div>
<div>Участок</div>
<div><div id='cmbTerrit'></div></div>
<div>Улица</div>
<div><div id='cmbStreet'></div></div>
<div>Дом</div>
<div><input name="Demands[Demand_id]" id="edHouse" type="text" value="<?php echo $Filters2['House'];?>"/></div>
<div>Период с</div>
<div><div id='edDateStart'></div></div>
<div>по</div>
<div><div id='edDateEnd'></div></div>
