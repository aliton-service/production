<script>
    $(document).ready(function () {
        var Filters = {
            NoDateMaster: Boolean(<?php echo json_encode($filterDefaultValues['NoDateMaster'])?>),
            NoDateExec: Boolean(<?php echo json_encode($filterDefaultValues['NoDateExec'])?>),
            Object_id: <?php echo json_encode($filterDefaultValues['Object_id'])?>,
            ObjectGr_id: <?php echo json_encode($filterDefaultValues['ObjectGr_id'])?>,
            Master: <?php echo json_encode($filterDefaultValues['Master'])?>,
            Demand_id: <?php echo json_encode($filterDefaultValues['Demand_id'])?>,
            DateReg: Aliton.DateConvertToJs('<?php echo $filterDefaultValues['DateReg']?>'),
            DemandType_id: <?php echo json_encode($filterDefaultValues['DemandType_id'])?>,
            Executor: <?php echo json_encode($filterDefaultValues['Executor'])?>,
            Street_id: <?php echo json_encode($filterDefaultValues['Street_id'])?>,
            House: <?php echo json_encode($filterDefaultValues['House'])?>,
        };

        var DemandsAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.DemandsSource, {
            filter: function () {
                $("#DemandsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#DemandsGrid").jqxGrid('updatebounddata', 'sort');
            }
        }));
        
        // Инициализация источников данных
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {async: false}));
        DataEmployees.dataBind();
        DataEmployees = DataEmployees.records;
        var DataDemandTypes = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDemandTypes, {asnc: false}));
        var DataStreets = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceStreets, {async: false}));
        var DataTerritory = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceTerritory, {async: false}));
        
        // Инициализируем контролы фильтров
        $("#cmbMaster").jqxComboBox({ source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}); // Фильтр по мастеру
        $("#chbNotDateExec").jqxCheckBox({ width: 160, height: 25, checked: true}); // Фильтр невыполненные
        $("#chbNotDateMaster").jqxCheckBox({ width: 160, height: 25, checked: Filters.NoDateMaster}); // Фильтр непереданные
        $("#chbNotWorkedOut").jqxCheckBox({ width: 160, height: 25, checked: false}); // Фильтр неотработанные
        $("#edDemand_id").jqxInput({height: 25, width: 200, minLength: 1, value: Filters.Demand_id}); // Фильтр номер
        $("#cmbDemandType").jqxComboBox({ source: DataDemandTypes, width: '200', height: '25px', displayMember: "DemandType", valueMember: "DemandType_id"}); // Фильтр тип заявки
        $("#cmbExecutor").jqxComboBox({ source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}); // Фильтр исполнитель
        $("#edAddr").jqxInput({height: 25, width: 200, minLength: 1}); // Фильтр по адресу
        $("#cmbTerrit").jqxComboBox({ source: DataTerritory, width: '200', height: '25px', displayMember: "Territ_Name", valueMember: "Territ_Id"}); // Фильтр участок
        $("#cmbStreet").jqxComboBox({ source: DataStreets, width: '200', height: '25px', displayMember: "StreetName", valueMember: "Street_id"}); // Фильтр улицы
        $("#edHouse").jqxInput({height: 25, width: 60, minLength: 1, value: Filters.House}); // Фильтр ДОМ
        
        $("#edDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '180px', formatString: 'dd.MM.yyyy', value: Filters.DateReg })); // Фильтр дата регистрации
        $("#edDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '180px', formatString: 'dd.MM.yyyy', value: null, dropDownVerticalAlignment: 'top' })); // Фильтр дата рег
        $("#edDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '180px', formatString: 'dd.MM.yyyy', value: null, dropDownVerticalAlignment: 'top' })); // Фильтр дата рег

        $('#edFiltering').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#edFiltering').on('click', function(){
            Find();
        });
        
        $("#chbNotDateExec").on('change', function() {
            Find();
        });
        
        if (Filters.Master != null) $("#cmbMaster").val(Filters.Master);
        if (Filters.DemandType_id != null) $("#cmbDemandType").val(Filters.DemandType_id);
        if (Filters.Executor != null) $("#cmbExecutor").val(Filters.Executor);
        if (Filters.Street_id != null) $("#cmbStreet").val(Filters.Street_id);
        
        var Find = function(){
            var MasterFilterGroup = new $.jqx.filter();
            if ($("#cmbMaster").val() != '') {
                var FilterMaster = MasterFilterGroup.createfilter('numericfilter', $("#cmbMaster").val(), 'EQUAL');
                MasterFilterGroup.addfilter(1, FilterMaster);
            }
            
            var NotDateMasterFilterGroup = new $.jqx.filter();
            if ($("#chbNotDateMaster").val() != '') {
                var FilterNotDateMaster = NotDateMasterFilterGroup.createfilter('datefilter', Date(), 'NULL');
                NotDateMasterFilterGroup.addfilter(1, FilterNotDateMaster);
            }
            
            var NotDateExecFilterGroup = new $.jqx.filter();
            if ($("#chbNotDateExec").val() != '') {
                var FilterNotDateExec = NotDateExecFilterGroup.createfilter('datefilter', Date(), 'NULL');
                NotDateExecFilterGroup.addfilter(1, FilterNotDateExec);
            }
            
            var NotWorkedOutFilterGroup = new $.jqx.filter();
            if ($("#chbNotWorkedOut").val() != '') {
                var FilterNotWorkedOut = NotWorkedOutFilterGroup.createfilter('datefilter', Date(), 'NULL');
                NotWorkedOutFilterGroup.addfilter(1, FilterNotWorkedOut);
            }
            
            var NumberFilterGroup = new $.jqx.filter();
            if ($("#edDemand_id").val() != '') {
                var FilterNumber = NumberFilterGroup.createfilter('numericfilter', $("#edDemand_id").val(), 'EQUAL');
                NumberFilterGroup.addfilter(1, FilterNumber);
            }
            
            var DateRegFilterGroup = new $.jqx.filter();
            if ($("#edDate").val() != '') {
                var FilterDateExec = DateRegFilterGroup.createfilter('datefilter', $("#edDate").val(), 'DATE_EQUAL');   
                DateRegFilterGroup.addfilter(1, FilterDateExec);
            }
            
            var DemandTypeFilterGroup = new $.jqx.filter();
            if ($("#cmbDemandType").val() != '') {
                var FilterDemandType = DemandTypeFilterGroup.createfilter('numericfilter', $("#cmbDemandType").val(), 'EQUAL');
                DemandTypeFilterGroup.addfilter(1, FilterDemandType);
            }
            
            var ExecutorFilterGroup = new $.jqx.filter();
            if ($("#cmbExecutor").val() != '') {
                var FilterExecutor = ExecutorFilterGroup.createfilter('stringfilter', '#' + $("#cmbExecutor").val() + '#', 'CONTAINS');
                ExecutorFilterGroup.addfilter(1, FilterExecutor);
            }
            
            var AddressFilterGroup = new $.jqx.filter();
            if ($("#edAddr").val() != '') {
                var FilterAddress = AddressFilterGroup.createfilter('stringfilter', $("#edAddr").val(), 'CONTAINS');
                AddressFilterGroup.addfilter(1, FilterAddress);
            }
            
            var TerritFilterGroup = new $.jqx.filter();
            if ($("#cmbTerrit").val() != '') {
                var FilterTerrit = TerritFilterGroup.createfilter('numericfilter', $("#cmbTerrit").val(), 'EQUAL');
                TerritFilterGroup.addfilter(1, FilterTerrit);
            }
            
            var StreetFilterGroup = new $.jqx.filter();
            if ($("#cmbStreet").val() != '') {
                var FilterStreet = StreetFilterGroup.createfilter('numericfilter', $("#cmbStreet").val(), 'EQUAL');
                StreetFilterGroup.addfilter(1, FilterStreet);
            }
            
            var HouseFilterGroup = new $.jqx.filter();
            if ($("#edHouse").val() != '') {
                var FilterHouse = HouseFilterGroup.createfilter('stringfilter', $("#edHouse").val(), 'STR_EQUAL');
                HouseFilterGroup.addfilter(1, FilterHouse);
            }
            
            var DateFilterGroup = new $.jqx.filter();
            if ($("#edDateStart").val() != '') {
                var FilterDateStart = DateFilterGroup.createfilter('datefilter', $("#edDateStart").val(), 'DATE_GREATER_THAN_OR_EQUAL');   
                DateFilterGroup.addfilter(1, FilterDateStart);
            }
            if ($("#edDateEnd").val() != '') {
                var FilterDateEnd = DateFilterGroup.createfilter('datefilter', $("#edDateEnd").val(), 'DATE_LESS_THAN_OR_EQUAL');   
                DateFilterGroup.addfilter(1, FilterDateEnd);
            }
            
            var ObjectFilterGroup = new $.jqx.filter();
            if (Filters.Object_id != '' && Filters.Object_id != null) {
                var FilterObject = ObjectFilterGroup.createfilter('numericfilter', Filters.Object_id, 'EQUAL');
                ObjectFilterGroup.addfilter(1, FilterObject);
            }
            
            var ObjectGrFilterGroup = new $.jqx.filter();
            if (Filters.ObjectGr_id != '' && Filters.ObjectGr_id != null) {
                var FilterObjectGr = ObjectGrFilterGroup.createfilter('numericfilter', Filters.ObjectGr_id, 'EQUAL');
                ObjectGrFilterGroup.addfilter(1, FilterObjectGr);
            }
            
            
            $('#DemandsGrid').jqxGrid('removefilter', 'MasterName', false);
            if ($("#cmbMaster").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'MasterName', MasterFilterGroup);
            
            $('#DemandsGrid').jqxGrid('removefilter', 'DateMaster', false);
            if ($("#chbNotDateMaster").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'DateMaster', NotDateMasterFilterGroup);
            
            $('#DemandsGrid').jqxGrid('removefilter', 'DateExec', false);
            if ($("#chbNotDateExec").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'DateExec', NotDateExecFilterGroup);
            
            $('#DemandsGrid').jqxGrid('removefilter', 'WorkedOut', false);
            if ($("#chbNotWorkedOut").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'WorkedOut', NotWorkedOutFilterGroup);
            
            $('#DemandsGrid').jqxGrid('removefilter', 'Demand_id', false);
            if ($("#edDemand_id").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'Demand_id', NumberFilterGroup);
            
            $('#DemandsGrid').jqxGrid('removefilter', 'DateReg', false);
            if ($("#edDate").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'DateReg', DateRegFilterGroup);
            
            $('#DemandsGrid').jqxGrid('removefilter', 'DemandType', false);
            if ($("#cmbDemandType").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'DemandType', DemandTypeFilterGroup);
            
            $('#DemandsGrid').jqxGrid('removefilter', 'ExecutorsName', false);
            if ($("#cmbExecutor").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'ExecutorsName', ExecutorFilterGroup);
            
            $('#DemandsGrid').jqxGrid('removefilter', 'Address', false);
            if ($("#edAddr").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'Address', AddressFilterGroup);
            
            $('#DemandsGrid').jqxGrid('removefilter', 'Territ_id', false);
            if ($("#cmbTerrit").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'Territ_id', TerritFilterGroup);
            
            $('#DemandsGrid').jqxGrid('removefilter', 'Street_id', false);
            if ($("#cmbStreet").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'Street_id', StreetFilterGroup);
            
            $('#DemandsGrid').jqxGrid('removefilter', 'House', false);
            if ($("#edHouse").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'House', HouseFilterGroup);
            
            if ($("#edDate").val() == '') $('#DemandsGrid').jqxGrid('removefilter', 'DateReg', false);
            if ($("#edDateStart").val() != '' || $("#edDateEnd").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'DateReg', DateFilterGroup);
            
            $('#DemandsGrid').jqxGrid('removefilter', 'Object_id', false);
            if (Filters.Object_id != '' && Filters.Object_id != null) $("#DemandsGrid").jqxGrid('addfilter', 'Object_id', ObjectFilterGroup);
            
            $('#DemandsGrid').jqxGrid('removefilter', 'ObjectGr_id', false);
            if (Filters.ObjectGr_id != '' && Filters.ObjectGr_id != null) $("#DemandsGrid").jqxGrid('addfilter', 'ObjectGr_id', ObjectGrFilterGroup);
            
                        
            $('#DemandsGrid').jqxGrid({source: DemandsAdapter});
        };
        
        Find();
    });
</script>

<div>Мастер</div>
<div><div id='cmbMaster'><?php echo $filterDefaultValues['Master']; ?></div></div>
<div id='chbNotDateMaster' style="color: white;">Непереданные</div>
<div id='chbNotDateExec' style="color: white;">Невыполненные</div>
<div id='chbNotWorkedOut' style="color: white;">Неотработанные</div>
<div>Номер</div>
<div><input name="Demands[Demand_id]" id="edDemand_id" type="text" value="<?php echo $filterDefaultValues['Demand_id'];?>"/></div>
<div>Дата регистрации</div>
<div><div id='edDate' name="Demands[DateReg]"></div></div>
<div>Тип заявки</div>
<div id='cmbDemandType' name="Demands[DType_id]"><?php echo $filterDefaultValues['DemandType_id']; ?></div>
<div>Исполнитель</div>
<div><div id='cmbExecutor'><?php echo $filterDefaultValues['Executor']; ?></div></div>
<div>Адрес</div>
<div><input id="edAddr" type="text" /></div>
<div>Участок</div>
<div><div id='cmbTerrit'></div></div>
<div>Улица</div>
<div><div id='cmbStreet'></div></div>
<div>Дом</div>
<div><input name="Demands[Demand_id]" id="edHouse" type="text" value="<?php echo $filterDefaultValues['House'];?>"/></div>
<div>Период с</div>
<div><div id='edDateStart'></div></div>
<div>по</div>
<div><div id='edDateEnd'></div></div>
<div style="margin-top: 4px;"><input type="button" value="Фильтр" id="edFiltering"/></div>
